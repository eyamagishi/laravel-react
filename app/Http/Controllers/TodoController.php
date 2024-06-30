<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;

use App\Http\Resources\TodoResource;
use App\Http\Requests\TodoRequest;
use App\Services\TodoService\TodoServiceInterface as TodoService;

class TodoController extends Controller
{
    /**
     * @var TodoService
     */
    protected $todoService;

    /**
     * コンストラクタ
     *
     * @param TodoService $todoService
     */
    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    /**
     * 全てのToDoを取得
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $todos = $this->todoService->getTodos();
        return response()->json(TodoResource::collection($todos), Response::HTTP_OK);
    }

    /**
     * 新しいToDoを作成
     *
     * @param TodoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TodoRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $todo = $this->todoService->createTodo($validatedData);
            return response()->json(new TodoResource($todo), Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Todo creation failed',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 指定されたIDのToDoを取得
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $todo = $this->todoService->findTodoById($id);
        return response()->json(new TodoResource($todo), Response::HTTP_OK);
    }

    /**
     * 指定されたIDのToDoを更新
     *
     * @param TodoRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TodoRequest $request, int $id)
    {
        try {
            $validatedData = $request->validated();
            $todo = $this->todoService->updateTodo($id, $validatedData);
            return response()->json(new TodoResource($todo), Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Todo update failed',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 指定されたIDのToDoを削除
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $this->todoService->deleteTodo($id);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}

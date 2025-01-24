<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;
use App\Services\TodoService\TodoServiceInterface as TodoService;
use Illuminate\Http\JsonResponse;

class TodoController extends Controller
{
    /**
     * @var TodoService
     */
    protected TodoService $todoService;

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
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $todos = $this->todoService->getTodos();
        return response()->json(TodoResource::collection($todos), JsonResponse::HTTP_OK);
    }

    /**
     * 新しいToDoを作成
     *
     * @param TodoRequest $request
     * @return JsonResponse
     */
    public function store(TodoRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $todo = $this->todoService->createTodo($validatedData);
            return response()->json(new TodoResource($todo), JsonResponse::HTTP_CREATED);
        } catch (\Exception $e) {
            $data = [
                'error'   => 'Todo creation failed',
                'message' => $e->getMessage()
            ];
            return response()->json($data, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 指定されたIDのToDoを取得
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $todo = $this->todoService->findTodoById($id);
        return response()->json(new TodoResource($todo), JsonResponse::HTTP_OK);
    }

    /**
     * 指定されたIDのToDoを更新
     *
     * @param TodoRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(TodoRequest $request, int $id): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $todo = $this->todoService->updateTodo($id, $validatedData);
            return response()->json(new TodoResource($todo), JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            $data = [
                'error'   => 'Todo update failed',
                'message' => $e->getMessage()
            ];
            return response()->json($data, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * 指定されたIDのToDoを削除
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $this->todoService->deleteTodo($id);
        return response()->json([], JsonResponse::HTTP_NO_CONTENT);
    }
}

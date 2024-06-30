<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Services\TodoService\TodoServiceInterface as TodoService;

class TodoController extends Controller
{
    protected $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function index()
    {
        $todos = $this->todoService->getTodos();
        // TODO: JsonResource作成
        return response()->json($todos);
    }

    public function store(TodoRequest $request)
    {
        $validatedData = $request->validated();

        $todo = $this->todoService->createTodo($validatedData);
        return response()->json($todo, 201);
    }

    public function show(int $id)
    {
        // TODO: 処理未実装
        // TODO: JsonResource作成
        return response()->json("show");
    }

    public function update(TodoRequest $request, int $id)
    {
        $validatedData = $request->validated();

        $todo = $this->todoService->updateTodo($id, $validatedData);
        // TODO: JsonResource作成
        return response()->json($todo);
    }

    public function destroy(int $id)
    {
        $this->todoService->deleteTodo($id);
        // TODO: JsonResource作成
        return response()->json(['message' => 'Todo deleted successfully']);
    }
}

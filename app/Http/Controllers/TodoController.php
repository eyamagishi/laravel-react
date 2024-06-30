<?php

namespace App\Http\Controllers;

use App\Services\TodoService\TodoServiceInterface as TodoService;
use Illuminate\Http\Request;

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

    public function show(int $id)
    {
        // TODO: 処理未実装
        // TODO: JsonResource作成
        return response()->json([]);
    }

    public function store(Request $request)
    {
        // TODO: リクエスト新規作成
        // TODO: バリデーション作成
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $todo = $this->todoService->createTodo($validatedData);
        return response()->json($todo, 201);
    }

    public function update(Request $request, int $id)
    {
        // TODO: リクエスト新規作成
        // TODO: バリデーション作成
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'required|boolean',
        ]);

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

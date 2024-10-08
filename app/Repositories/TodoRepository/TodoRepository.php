<?php

namespace App\Repositories\TodoRepository;

use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getTodos(): \Illuminate\Database\Eloquent\Collection
    {
        return Todo::all();
    }

    /**
     * @inheritDoc
     */
    public function createTodo(array $data): \App\Models\Todo
    {
        $todo = new Todo();
        $todo->fill($data);
        $todo->save();

        return $todo;
    }

    /**
     * @inheritDoc
     */
    public function findTodoById($id): ?\App\Models\Todo
    {
        return Todo::findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function updateTodo(int $id, array $data): ?\App\Models\Todo
    {
        $todo = $this->findTodoById($id);
        if (!$todo) {
            // idが存在しないとき
            return null;
        }
        $todo->fill($data);
        $todo->save();
        return $todo;
    }

    /**
     * @inheritDoc
     */
    public function deleteTodo(int $id): bool
    {
        $todo = $this->findTodoById($id);
        if (!$todo) {
            // idが存在しないとき
            return false;
        }
        return $todo->delete();
    }
}

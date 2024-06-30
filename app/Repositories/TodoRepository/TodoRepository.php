<?php

namespace App\Repositories\TodoRepository;

use App\Models\Todo;

class TodoRepository implements TodoRepositoryInterface
{
    /**
     * @var Todo
     */
    protected $todo;

    /**
     * コンストラクタ
     *
     * @param Todo $todo
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * @inheritDoc
     */
    public function getTodos(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->todo->all();
    }

    /**
     * @inheritDoc
     */
    public function findTodoById($id): ?\App\Models\Todo
    {
        return $this->todo->findOrFail($id);
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

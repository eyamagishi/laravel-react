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
    public function findTodosById($id): ?\App\Models\Todo
    {
        return $this->todo->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function createTodo(array $data): bool
    {
        return $this->todo->create($data);
    }

    /**
     * @inheritDoc
     */
    public function updateTodo(int $id, array $data): bool
    {
        // TODO: 再考する余地あり
        $this->todo->findOrFail($id);

        if (!$this->todo) {
            return false;
        }

        $this->todo->fill($data);
        $this->todo->save();
        return $this->todo;
    }

    /**
     * @inheritDoc
     */
    public function deleteTodo(int $id): bool
    {
        // TODO: 再考する余地あり
        $this->todo->findOrFail($id);

        if (!$this->todo) {
            return false;
        }

        $this->todo->delete();
        return $this->todo;
    }
}

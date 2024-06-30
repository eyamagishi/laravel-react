<?php

namespace App\Services\TodoService;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Repositories\TodoRepository\TodoRepositoryInterface as TodoRepository;

class TodoService implements TodoServiceInterface
{
    /**
     * @var TodoRepository
     */
    protected $todoRepository;

    /**
     * コンストラクタ
     *
     * @param TodoRepository $todoRepository
     */
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @inheritDoc
     */
    public function getTodos(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->todoRepository->getTodos();
    }

    /**
     * @inheritDoc
     */
    public function findTodosById($id): ?\App\Models\Todo
    {
        return $this->todoRepository->findTodosById($id);
    }

    /**
     * @inheritDoc
     */
    public function createTodo(array $data): bool
    {
        DB::beginTransaction();
        try {
            $attributes = [
                'title' => $data['title']
            ];
            $result = $this->todoRepository->createTodo($attributes);

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function updateTodo(int $id, array $data): bool
    {
        DB::beginTransaction();
        try {
            $attributes = [
                'title' => $data['title']
            ];
            $result = $this->todoRepository->updateTodo($id, $attributes);

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function deleteTodo(int $id): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->todoRepository->deleteTodo($id);

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            throw $e;
        }
    }
}

<?php

namespace App\Services\TodoService;

use Illuminate\Support\Facades\DB;

use App\Helpers\ApiResponseHelper;
use App\Repositories\TodoRepository\TodoRepositoryInterface as TodoRepository;

class TodoService implements TodoServiceInterface
{
    /**
     * @var TodoRepository
     */
    protected TodoRepository $todoRepository;

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
    public function createTodo(array $data): \App\Models\Todo
    {
        DB::beginTransaction();
        try {
            $attributes = self::setAttributes($data);
            $result = $this->todoRepository->createTodo($attributes);

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            ApiResponseHelper::rollback($e);
        }
    }

    /**
     * @inheritDoc
     */
    public function findTodoById($id): ?\App\Models\Todo
    {
        return $this->todoRepository->findTodoById($id);
    }

    /**
     * @inheritDoc
     */
    public function updateTodo(int $id, array $data): ?\App\Models\Todo
    {
        DB::beginTransaction();
        try {
            $attributes = self::setAttributes($data);
            $result = $this->todoRepository->updateTodo($id, $attributes);

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            ApiResponseHelper::rollback($e);
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
            ApiResponseHelper::rollback($e);
        }
    }

    /**
     * 指定されたデータ配列から特定の属性を抽出して返すメソッド。
     * 
     * @param array $data
     * @return array<string, string>
     */
    private static function setAttributes(array $data): array
    {
        return [
            'title'     => $data['title'],
            'completed' => $data['completed'],
        ];
    }
}

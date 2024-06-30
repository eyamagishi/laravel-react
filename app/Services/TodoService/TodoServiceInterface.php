<?php

namespace App\Services\TodoService;

interface TodoServiceInterface
{
    /**
     * 全てのToDoタスクを取得します。
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTodos(): \Illuminate\Database\Eloquent\Collection;

    /**
     * 指定されたIDのToDoタスクを取得します。
     *
     * @param int $id
     * @return \App\Models\Todo|null
     */
    public function findTodoById(int $id): ?\App\Models\Todo;

    /**
     * 新しいToDoタスクを作成します。
     *
     * @param array $data
     * @return \App\Models\Todo
     * @throws \Exception
     */
    public function createTodo(array $data): \App\Models\Todo;

    /**
     * 指定されたIDのToDoタスクを更新します。
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Todo|null
     * @throws \Exception
     */
    public function updateTodo(int $id, array $data): ?\App\Models\Todo;

    /**
     * 指定されたIDのToDoタスクを削除します。
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function deleteTodo(int $id): bool;
}

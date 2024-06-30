<?php

namespace App\Services\TodoService;

interface TodoServiceInterface
{
    /**
     * 全てのToDoを取得
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTodos(): \Illuminate\Database\Eloquent\Collection;

    /**
     * 新しいToDoを作成
     *
     * @param array $data
     * @return \App\Models\Todo
     * @throws \Exception
     */
    public function createTodo(array $data): \App\Models\Todo;

    /**
     * 指定されたIDのToDoを取得
     *
     * @param int $id
     * @return \App\Models\Todo|null
     */
    public function findTodoById(int $id): ?\App\Models\Todo;

    /**
     * 指定されたIDのToDoを更新
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Todo|null
     * @throws \Exception
     */
    public function updateTodo(int $id, array $data): ?\App\Models\Todo;

    /**
     * 指定されたIDのToDoを削除
     *
     * @param int $id
     * @return bool
     * @throws \Exception
     */
    public function deleteTodo(int $id): bool;
}

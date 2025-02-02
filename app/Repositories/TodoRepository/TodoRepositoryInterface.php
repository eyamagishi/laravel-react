<?php

namespace App\Repositories\TodoRepository;

interface TodoRepositoryInterface
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
     */
    public function createTodo(array $data): \App\Models\Todo;

    /**
     * 指定されたIDのToDoを取得
     *
     * @param int $id ToDoID
     * @return \App\Models\Todo|null
     */
    public function findTodoById(int $id): ?\App\Models\Todo;

    /**
     * 指定されたIDのToDoを更新
     *
     * @param int $id ToDoID
     * @param array $data
     * @return \App\Models\Todo|null
     */
    public function updateTodo(int $id, array $data): ?\App\Models\Todo;

    /**
     * 指定されたIDのToDoを削除
     *
     * @param int $id ToDoID
     * @return bool 削除に成功した場合は true、失敗した場合は false
     */
    public function deleteTodo(int $id): bool;
}

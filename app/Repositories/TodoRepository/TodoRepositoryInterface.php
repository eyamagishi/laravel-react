<?php

namespace App\Repositories\TodoRepository;

interface TodoRepositoryInterface
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
     * @param int $id ToDoタスクのID
     * @return \App\Models\Todo|null 指定されたIDのToDoタスクが存在する場合はそのタスク、存在しない場合はnull
     */
    public function findTodosById(int $id): ?\App\Models\Todo;

    /**
     * 
     *
     * @param array $data
     * @return bool
     */
    public function createTodo(array $data): bool;

    /**
     * 指定されたIDのToDoタスクを更新します。
     *
     * @param int $id ToDoタスクのID
     * @param array $data 更新するToDoタスクのデータ
     * @return bool 更新が成功した場合はtrue、失敗した場合はfalse
     */
    public function updateTodo(int $id, array $data): bool;

    /**
     * 指定されたIDのToDoタスクを削除します。
     *
     * @param int $id ToDoタスクのID
     * @return bool 削除が成功した場合はtrue、失敗した場合はfalse
     */
    public function deleteTodo(int $id): bool;
}

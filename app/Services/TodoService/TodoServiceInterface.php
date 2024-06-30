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
     * @param int $id ToDoタスクのID
     * @return \App\Models\Todo|null 指定されたIDのToDoタスクが存在する場合はそのタスク、存在しない場合はnull
     */
    public function findTodosById(int $id): ?\App\Models\Todo;

    /**
     * 新しいToDoタスクを作成します。
     *
     * @param array $data ToDoタスクのデータ
     * @return bool 作成が成功した場合はtrue、失敗した場合はfalse
     * @throws \Exception トランザクション中にエラーが発生した場合
     */
    public function createTodo(array $data): bool;

    /**
     * 指定されたIDのToDoタスクを更新します。
     *
     * @param int $id ToDoタスクのID
     * @param array $data 更新するToDoタスクのデータ
     * @return bool 更新が成功した場合はtrue、失敗した場合はfalse
     * @throws \Exception トランザクション中にエラーが発生した場合
     */
    public function updateTodo(int $id, array $data): bool;

    /**
     * 指定されたIDのToDoタスクを削除します。
     *
     * @param int $id ToDoタスクのID
     * @return bool 削除が成功した場合はtrue、失敗した場合はfalse
     * @throws \Exception トランザクション中にエラーが発生した場合
     */
    public function deleteTodo(int $id): bool;
}

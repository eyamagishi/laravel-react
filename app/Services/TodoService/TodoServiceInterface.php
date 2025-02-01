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
     * @throws \Exception 指定されたIDのToDoが存在しない場合、または更新処理でエラーが発生した場合にスローされる
     */
    public function updateTodo(int $id, array $data): ?\App\Models\Todo;

    /**
     * 指定したIDのToDoを削除する
     *
     * @param int $id 削除するToDoの一意の識別子
     * @return bool 削除に成功した場合は true、失敗した場合は false
     * @throws \Exception 指定されたIDのToDoが存在しない場合、または削除処理でエラーが発生した場合にスローされる
     */
    public function deleteTodo(int $id): bool;
}

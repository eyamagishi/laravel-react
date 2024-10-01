import React, { useEffect } from "react";

import TodoItem from './TodoItem';
import { Todo } from '../../../types/Todo';

const TodoList: React.FC<{ todos: Todo[], fetchTodos: () => void }> = ({ todos, fetchTodos }) => {
    useEffect(() => {
        fetchTodos();
    }, []);

    return (
        <table>
            <tbody>
                {todos.map(todo => (
                    <TodoItem key={todo.id} todo={todo} fetchTodos={fetchTodos} />
                ))}
            </tbody>
        </table>
    );
};

export default TodoList;
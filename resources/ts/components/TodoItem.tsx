import React, { useState } from "react";
import axios from 'axios';

const TodoItem: React.FC<{ todo: any, fetchTodos: () => void }> = ({ todo, fetchTodos }) => {
    const [completed, setCompleted] = useState<boolean>(false);

    const handleCheckboxChange = async (e: React.ChangeEvent<HTMLInputElement>) => {
        const newCompleted = e.target.checked;
        setCompleted(newCompleted);

        try {
            await axios.put(`/api/todos/${todo.id}`, {
                ...todo,
                completed: newCompleted,
            });
            fetchTodos();
        } catch (error) {
            console.error("Failed to update todo", error);
        }
    };

    const deleteTodo = async (id: string) => {
        await axios.delete(`/api/todos/${id}`);
        fetchTodos();
    };

    return (
        <li key={todo.id}>
            <input
                type="checkbox"
                checked={completed}
                onChange={handleCheckboxChange}
            />
            {todo.title}
            <button onClick={() => deleteTodo(todo.id)}>削除</button>
        </li>
    );
};

export default TodoItem;

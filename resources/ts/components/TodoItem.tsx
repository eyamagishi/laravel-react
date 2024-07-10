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
        <tr key={todo.id}>
            <td>
                <input
                    type="checkbox"
                    checked={completed}
                    onChange={handleCheckboxChange}
                    className="todo-checkbox"
                />
            </td>
            <td className="todo-title">{todo.title}</td>
            <td><button onClick={() => deleteTodo(todo.id)} className="todo-delete">削除</button></td>
        </tr>
    );
};

export default TodoItem;

import React from 'react';
import axios from 'axios';

const TodoItem: React.FC<{ todo: any, fetchTodos: () => void }> = ({ todo, fetchTodos }) => {
    const handleDelete = async () => {
        await axios.delete(`/api/todos/${todo.id}`);
        fetchTodos();
    };

    return (
        <li>
            <p>{todo.title}</p>
            <p>{todo.completed ? 'Completed' : 'Not Completed'}</p>
            <button onClick={handleDelete}>削除</button>
        </li>
    );
};

export default TodoItem;

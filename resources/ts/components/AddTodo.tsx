import React, { useState } from 'react';
import axios from 'axios';

import { TODOS_ENDPOINT } from '../constants/api';

const AddTodo: React.FC<{ fetchTodos: () => void }> = ({ fetchTodos }) => {
    const [title, setTitle] = useState('');

    const addTodo = async (e: React.FormEvent) => {
        e.preventDefault();
        await axios.post(TODOS_ENDPOINT, { title, completed: false });
        setTitle('');
        fetchTodos();
    };

    return (
        <form onSubmit={addTodo}>
            <input
                type="text"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
                placeholder="title"
            />
            <button type="submit">追加</button>
        </form>
    );
};

export default AddTodo;

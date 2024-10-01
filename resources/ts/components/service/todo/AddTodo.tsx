import React, { useState } from 'react';
import axios from 'axios';

import { TODOS_ENDPOINT } from '../../../constants/api';

const AddTodo: React.FC<{ fetchTodos: () => void }> = ({ fetchTodos }) => {
    const [title, setTitle] = useState('');

    const addTodo = async () => {
        await axios.post(TODOS_ENDPOINT, { title, completed: false });
        setTitle('');
        fetchTodos();
    };

    return (
        <div>
            <input
                type="text"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
                placeholder="新しいタスクを追加"
            />
            <button onClick={addTodo} className="todo-add">追加</button>
        </div>
    );
};

export default AddTodo;

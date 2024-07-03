import React, { useEffect, useState } from "react";
import axios from "axios";

import { TODO } from '../constants/labels';
import { TODOS_ENDPOINT } from '../constants/api';
import { Todo } from '../types/Todo';

const Todo: React.FC = () => {
    const [todos, setTodos] = useState<Todo[]>([]);

    const fetchTodos = async () => {
        try {
            const res = await axios.get<Todo[]>(TODOS_ENDPOINT);
            setTodos(res.data);
        } catch (error) {
            console.error('Failed to fetch todos:', error);
            return error;
        }
    };

    useEffect(() => {
        fetchTodos();
    }, []);

    return (
        <section id="todo">
            <h2>{TODO}</h2>
            <p>ここはTODOのセクションです。</p>
            {todos.map((todo) => {
                return (
                    <div key={todo.id}>
                        <h1>title:{todo.title}</h1>
                        <p>id:{todo.id}</p>
                        <p>description:{todo.description}</p>
                        <p>completed:{todo.completed}</p>
                    </div>
                );
            })}
        </section>
    );
};

export default Todo;
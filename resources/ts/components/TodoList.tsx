import React, { useEffect, useState } from "react";
import axios from "axios";

import { TODO } from '../constants/labels';
import { TODOS_ENDPOINT } from '../constants/api';
import { Todo } from '../types/Todo';

const TodoList: React.FC = () => {
    const [todos, setTodos] = useState<Todo[]>([]);
    const [isLoading, setIsLoading] = useState<boolean>(false);

    const fetchTodos = async () => {
        try {
            setIsLoading(true);
            const res = await axios.get<Todo[]>(TODOS_ENDPOINT);
            setTodos(res.data);
        } catch (error) {
            console.error('Failed to fetch todos:', error);
            return error;
        } finally {
            setIsLoading(false);
        }
    };

    useEffect(() => {
        fetchTodos();
    }, []);

    return (
        <section id="todo">
            <h2>{TODO}</h2>
            {isLoading ? (
                <p>Loading...</p>
            ) : (
                <ul>
                    {todos.map(todo => (
                        <li key={todo.id}>
                            <h3>{todo.title}</h3>
                            <p>{todo.description}</p>
                            <p>{todo.completed ? 'Completed' : 'Not Completed'}</p>
                        </li>
                    ))}
                </ul>
            )}
        </section>
    );
};

export default TodoList;
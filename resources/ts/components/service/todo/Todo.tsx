import React, { useEffect, useState } from "react";
import axios from "axios";

import './Todo.scss';

import AddTodo from './AddTodo';
import TodoList from './TodoList';

import { TODO_NAME } from '@ts/constants/labels';
import { TODOS_ENDPOINT } from '@ts/constants/api';
import { Todo } from '@ts/types/Todo';

const TODO: React.FC = () => {
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
            <h2>{TODO_NAME}</h2>
            <AddTodo fetchTodos={fetchTodos} />
            <TodoList todos={todos} fetchTodos={fetchTodos} />
        </section>
    );
};

export default TODO;
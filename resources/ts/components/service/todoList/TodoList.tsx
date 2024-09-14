import React, { useEffect, useState } from "react";
import axios from "axios";

import AddTodo from './AddTodo';
import TodoItem from './TodoItem';

import { TODO } from '../../../constants/labels';
import { TODOS_ENDPOINT } from '../../../constants/api';
import { Todo } from '../../../types/Todo';

const TodoList: React.FC = () => {
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
            <AddTodo fetchTodos={fetchTodos} />
            <table>
                <tbody>
                    {todos.map(todo => (
                        <TodoItem key={todo.id} todo={todo} fetchTodos={fetchTodos} />
                    ))}
                </tbody>
            </table>
        </section>
    );
};

export default TodoList;
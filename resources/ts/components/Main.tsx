import React from 'react';
import { Routes, Route } from 'react-router-dom';

import { HOME_PAGE, ABOUT_PAGE, CONTACT_PAGE, SERVICE_PAGE, TODO_PAGE } from '../constants/routes';

import Home from './Home';
import About from './About';
import Contact from './Contact';
import Service from './Service';
import Todo from './todoList/TodoList';

const Main: React.FC = () => (
    <main>
        <Routes>
            <Route path={HOME_PAGE} element={<Home />} />
            <Route path={ABOUT_PAGE} element={<About />} />
            <Route path={CONTACT_PAGE} element={<Contact />} />
            <Route path={SERVICE_PAGE} element={<Service />} />
            <Route path={TODO_PAGE} element={<Todo />} />
        </Routes>
    </main>
);

export default Main;
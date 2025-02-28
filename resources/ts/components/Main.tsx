import React from 'react';
import { Routes, Route } from 'react-router-dom';

import { HOME_PAGE, ABOUT_PAGE, CONTACT_PAGE, SERVICE_PAGE, TODO_PAGE, POKEMON_PAGE, MAHJONG_PAGE } from '@ts/constants/routes';

import Home from './Home';
import About from './About';
import Contact from './Contact';
import Service from './service/Service';
import Todo from './service/todo/Todo';
import Pokemon from './service/pokemon/Pokemon';
import Mahjong from './service/mahjong/Mahjong';

const Main: React.FC = () => (
    <main>
        <Routes>
            <Route path={HOME_PAGE} element={<Home />} />
            <Route path={ABOUT_PAGE} element={<About />} />
            <Route path={CONTACT_PAGE} element={<Contact />} />
            <Route path={SERVICE_PAGE} element={<Service />} />
            <Route path={TODO_PAGE} element={<Todo />} />
            <Route path={POKEMON_PAGE} element={<Pokemon />} />
            <Route path={MAHJONG_PAGE} element={<Mahjong />} />
        </Routes>
    </main>
);

export default Main;
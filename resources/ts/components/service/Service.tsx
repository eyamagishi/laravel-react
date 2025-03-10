import React from 'react';
import { Link } from 'react-router-dom';

import { SERVICE_NAME, TODO_NAME, POKEMON_NAME, MAHJONG_NAME } from '@ts/constants/labels';
import { TODO_PAGE, POKEMON_PAGE, MAHJONG_PAGE } from '@ts/constants/routes';

const Service: React.FC = () => (
    <section id="service">
        <h2>{SERVICE_NAME}</h2>
        <p>ここはサービスのセクションです。</p>
        <nav>
            <ul>
                <li><Link to={TODO_PAGE}>{TODO_NAME}</Link></li>
                <li><Link to={POKEMON_PAGE}>{POKEMON_NAME}</Link></li>
                <li><Link to={MAHJONG_PAGE}>{MAHJONG_NAME}</Link></li>
            </ul>
        </nav>
    </section>
);

export default Service;
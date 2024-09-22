import React from 'react';
import { Link } from 'react-router-dom';

import { SERVICE, TODO, POKEMON } from '../../constants/labels';
import { TODO_PAGE, POKEMON_PAGE } from '../../constants/routes';

const Service: React.FC = () => (
    <section id="service">
        <h2>{SERVICE}</h2>
        <p>ここはサービスのセクションです。</p>
        <nav>
            <ul>
                <li><Link to={TODO_PAGE}>{TODO}</Link></li>
                <li><Link to={POKEMON_PAGE}>{POKEMON}</Link></li>
            </ul>
        </nav>
    </section>
);

export default Service;
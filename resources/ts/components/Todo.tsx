import React from 'react';

import { TODO } from '../config/constants';

const Todo: React.FC = () => (
    <section id="todo">
        <h2>{TODO}</h2>
        <p>ここはTODOのセクションです。</p>
    </section>
);

export default Todo;
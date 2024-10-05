import React from 'react';

import { HOME_NAME } from '@ts/constants/labels';

const Home: React.FC = () => (
    <section id="home">
        <h2>{HOME_NAME}</h2>
        <p>ここはホームページのホームセクションです。</p>
    </section>
);

export default Home;
import React from 'react';

import { ABOUT } from '../constants/labels';

const About: React.FC = () => (
    <section id="about">
        <h2>{ABOUT}</h2>
        <p>ここは私についてのセクションです。</p>
    </section>
);

export default About;
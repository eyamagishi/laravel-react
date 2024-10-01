import React from 'react';

import { ABOUT_NAME } from '../constants/labels';

const About: React.FC = () => (
    <section id="about">
        <h2>{ABOUT_NAME}</h2>
        <p>ここは私についてのセクションです。</p>
    </section>
);

export default About;
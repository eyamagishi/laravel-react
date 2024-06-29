import React from 'react';
import { Link } from 'react-router-dom';

import { HOMEPAGE_NAME, HOME, ABOUT, CONTACT } from '../config/constants';

const Header: React.FC = () => (
    <header>
        <h1>{HOMEPAGE_NAME}</h1>
        <nav>
            <ul>
                <li><Link to="/">{HOME}</Link></li>
                <li><Link to="about">{ABOUT}</Link></li>
                <li><Link to="contact">{CONTACT}</Link></li>
            </ul>
        </nav>
    </header>
);

export default Header;
import React from 'react';
import { Link } from 'react-router-dom';

import { HOMEPAGE_NAME, HOME, ABOUT, CONTACT, SERVICE } from '../config/constants';

const Header: React.FC = () => {
    return (
        <header>
            <h1>{HOMEPAGE_NAME}</h1>
            <nav className='header-menu'>
                <ul>
                    <li><Link to="/">{HOME}</Link></li>
                    <li><Link to="about">{ABOUT}</Link></li>
                    <li><Link to="contact">{CONTACT}</Link></li>
                    <li><Link to="service">{SERVICE}</Link></li>
                </ul>
            </nav>
        </header>
    );
};

export default Header;
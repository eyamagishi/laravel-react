import React from 'react';
import { Link } from 'react-router-dom';

import { HOMEPAGE_NAME, HOME, ABOUT, CONTACT, SERVICE, TODO } from '../constants/labels';
import { HOME_PAGE, ABOUT_PAGE, CONTACT_PAGE, SERVICE_PAGE, TODO_PAGE } from '../constants/routes';

const Header: React.FC = () => {
    return (
        <header>
            <h1>{HOMEPAGE_NAME}</h1>
            <nav>
                <ul>
                    <li><Link to={HOME_PAGE}>{HOME}</Link></li>
                    <li><Link to={ABOUT_PAGE}>{ABOUT}</Link></li>
                    <li><Link to={CONTACT_PAGE}>{CONTACT}</Link></li>
                    <li><Link to={SERVICE_PAGE}>{SERVICE}</Link></li>
                    <li><Link to={TODO_PAGE}>{TODO}</Link></li>
                </ul>
            </nav>
        </header>
    );
};

export default Header;
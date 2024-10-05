import React from 'react';
import { Link } from 'react-router-dom';

import './Header.scss';

import { HOMEPAGE_NAME, HOME_NAME, ABOUT_NAME, CONTACT_NAME, SERVICE_NAME } from '../../constants/labels';
import { HOME_PAGE, ABOUT_PAGE, CONTACT_PAGE, SERVICE_PAGE } from '../../constants/routes';

const Header: React.FC = () => {
    return (
        <header>
            <h1>{HOMEPAGE_NAME}</h1>
            <nav>
                <ul>
                    <li><Link to={HOME_PAGE}>{HOME_NAME}</Link></li>
                    <li><Link to={ABOUT_PAGE}>{ABOUT_NAME}</Link></li>
                    <li><Link to={CONTACT_PAGE}>{CONTACT_NAME}</Link></li>
                    <li><Link to={SERVICE_PAGE}>{SERVICE_NAME}</Link></li>
                </ul>
            </nav>
        </header>
    );
};

export default Header;
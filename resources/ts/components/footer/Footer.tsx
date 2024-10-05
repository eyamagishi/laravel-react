import React from 'react';

import './Footer.scss';

import { HOMEPAGE_NAME } from '../../constants/labels';

const Footer: React.FC = () => (
    <footer>
        <p>&copy; 2024 {HOMEPAGE_NAME}</p>
    </footer>
);

export default Footer;
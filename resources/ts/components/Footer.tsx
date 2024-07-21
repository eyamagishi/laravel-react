import React from 'react';

import '@scss/layout/_footer.scss';

import { HOMEPAGE_NAME } from '../constants/labels';

const Footer: React.FC = () => (
    <footer>
        <p>&copy; 2024 {HOMEPAGE_NAME}</p>
    </footer>
);

export default Footer;
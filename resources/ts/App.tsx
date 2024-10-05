import React from 'react';
import { createRoot } from 'react-dom/client';
import { BrowserRouter } from 'react-router-dom';

import Header from './components/header/Header';
import Main from './components/Main';
import Footer from './components/Footer';

const App: React.FC = () => (
    <React.StrictMode>
        <BrowserRouter>
            <Header />
            <Main />
            <Footer />
        </BrowserRouter>
    </React.StrictMode>
);

const appElement = document.getElementById('app');
if (appElement) {
    const root = createRoot(appElement);
    root.render(<App />);
}

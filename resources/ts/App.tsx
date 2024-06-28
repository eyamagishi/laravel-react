import React from 'react';
import { createRoot } from 'react-dom/client';

const App: React.FC = () => (
    <React.StrictMode>
        <p>Hello React!</p>
    </React.StrictMode>
);

const appElement = document.getElementById('app');
if (appElement) {
    const root = createRoot(appElement);
    root.render(<App />);
}

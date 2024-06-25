import React from 'react'
import { createRoot } from 'react-dom/client'

const App: React.FC = () => {
    return (
        <React.StrictMode>
            <p>Hello React !</p>
        </React.StrictMode>
    );
};

const appElement = document.getElementById('app') as HTMLElement
if (appElement) {
    const root = createRoot(appElement);
    root.render(<App />)
}

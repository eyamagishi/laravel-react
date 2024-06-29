import React from 'react';
import { createRoot } from 'react-dom/client';

const App: React.FC = () => (
    <React.StrictMode>
        <header>
            <h1>私のホームページ</h1>
            <nav>
                <ul>
                    <li><a href="#home">ホーム</a></li>
                    <li><a href="#about">私について</a></li>
                    <li><a href="#contact">連絡先</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section id="home">
                <h2>ホーム</h2>
                <p>ここはホームページのホームセクションです。</p>
            </section>
            <section id="about">
                <h2>私について</h2>
                <p>ここは私についてのセクションです。</p>
            </section>
            <section id="contact">
                <h2>連絡先</h2>
                <p>ここは連絡先のセクションです。</p>
            </section>
        </main>
        <footer>
            <p>&copy; 2024 私のホームページ</p>
        </footer>
    </React.StrictMode>
);

const appElement = document.getElementById('app');
if (appElement) {
    const root = createRoot(appElement);
    root.render(<App />);
}

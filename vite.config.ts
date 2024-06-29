import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import reactRefresh from '@vitejs/plugin-react-refresh';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/ts/App.tsx'
            ],
            refresh: true,
        }),
        reactRefresh(),
    ],
});

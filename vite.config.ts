import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import reactRefresh from '@vitejs/plugin-react-refresh';
import path from 'path';

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
    resolve: {
        alias: {
          '@scss': path.resolve(__dirname, 'resources/scss/'),
          '@ts': path.resolve(__dirname, 'resources/ts/'),
        }
      }
});

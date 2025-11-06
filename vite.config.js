// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/main.css',
                'resources/css/auth.css',
                'resources/css/dashboard.css',
                'resources/js/main.js',
                'resources/js/auth.js',
                'resources/js/dashboard.js',
            ],
            refresh: true,
        }),
    ],
});
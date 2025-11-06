// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/main.css',     // untuk halaman home
                'resources/css/auth.css',     // untuk halaman auth
                'resources/js/main.js',       // untuk halaman home
                'resources/js/auth.js',       // untuk halaman auth
            ],
            refresh: true,
        }),
    ],
});
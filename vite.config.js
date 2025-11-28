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
                'resources/css/history.css',
                'resources/css/marketing.css',
                'resources/css/admin.css',
                'resources/css/admin-histori.css',
                'resources/css/admin-marketing.css',
                'resources/css/app.css',
                'resources/css/testimoni.css',
                'resources/js/main.js',
                'resources/js/auth.js',
                'resources/js/dashboard.js',
                'resources/js/history.js',
                'resources/js/marketing.js',
                'resources/js/admin.js',
                'resources/js/admin-histori.js',
                'resources/js/admin-marketing.js',
                'resources/js/app.js',
                'resources/js/testimoni.js',
            ],
            refresh: true,
        }),
    ],
});
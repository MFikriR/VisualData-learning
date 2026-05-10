import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/variables.css',
                'resources/css/landing.css',
                'resources/css/auth.css',
                'resources/css/dashboard.css',
                'resources/js/app.js',
                'resources/js/simulation.js',
            ],
            refresh: true,
        }),
    ],
});
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/filter-widgets.js',
                'resources/sass/app.scss',
            ],
            refresh: true,
        }),
    ],
});

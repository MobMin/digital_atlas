import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/filter-widgets.js',
                'resources/js/jquery.backstretch.min.js',
            ],
            refresh: true,
        }),
    ],
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';
import { copyFileSync, mkdirSync, readdirSync } from 'fs';

function copyFontAwesomeWebfonts() {
    return {
        name: 'copy-fontawesome-webfonts',
        closeBundle() {
            const src = resolve('node_modules/@fortawesome/fontawesome-free/webfonts');
            const dest = resolve('public/webfonts');
            mkdirSync(dest, { recursive: true });
            readdirSync(src).forEach((file) => {
                copyFileSync(resolve(src, file), resolve(dest, file));
            });
        },
    };
}

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
        copyFontAwesomeWebfonts(),
    ],
});

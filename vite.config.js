import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/css/style.css',
                    'resources/js/app.js',
                    'resources/js/infinite-scroll.js',
                    'resources/js/job-filter.js',
                    'resources/js/lazy-load.js'],
            refresh: true,
        }),
    ],
    build: {
        minify: 'terser', // Minify JS and CSS in production
    },
});

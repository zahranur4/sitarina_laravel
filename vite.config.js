import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/styles.css', 'resources/js/scrollreveal.min.js', 'resources/js/main.js', 'resources/css/profile.css', 'resources/js/profile.js', 'resources/css/profile.css'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

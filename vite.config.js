import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

/*
*   TODO: config Public Folder (path settings in de laravel plugin =W ophalen uit .env)
*/

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            // publicDirectory:  import.meta.env.VITE_PUBLIC_DIRECTORY || 'public', //Todo: dit nodig?
            refresh: true,
        }),
    ],
});

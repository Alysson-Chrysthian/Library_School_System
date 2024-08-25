import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css', 
                'resources/css/dashboard.css',
                'resources/css/components/layouts/app.css',
                'resources/css/livewire/header.css',
                'resources/css/author/add-author-form.css',
                'resources/css/books/index-books.css',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
    }
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.tsx',
            refresh: true,
        }),
        react(),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true
        },
        /**
         * configure for multiple running vite port
         * so we can run multiple laravel project with vite
         * */
        // port: 5174,
    },
});

import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import fs from 'fs';

// default bundles
const bundleInputs = [
    'resources/css/app.css',
    'resources/js/app.js'
];

// theme-playground bundles
if (fs.existsSync('resources-playground/js/app.js')) {
    bundleInputs.push('resources-playground/css/app.css');
    bundleInputs.push('resources-playground/js/app.js');
}

export default defineConfig({
    plugins: [
        laravel({
            input: bundleInputs,
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
    ],
});

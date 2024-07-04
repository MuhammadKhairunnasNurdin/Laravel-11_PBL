import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        require('tailwindcss/plugin')(function ({addBase}) {
            addBase({
                '[type="search"]::-webkit-search-decoration': {display: 'none'},
                '[type="search"]::-webkit-search-cancel-button': {display: 'none'},
                '[type="search"]::-webkit-search-results-button': {display: 'none'},
                '[type="search"]::-webkit-search-results-decoration': {display: 'none'},
            })
        }),
    ],
};

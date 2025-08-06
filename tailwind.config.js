import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                sans: ['source-serif-pro', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
                // // Or keep sans-serif for UI and use Baskerville for content:
                serif: ['source-serif-pro', 'Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
            },
        },
    },

    plugins: [forms],
};

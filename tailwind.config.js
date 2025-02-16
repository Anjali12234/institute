import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                popins:['Poppins 300','sens-serif'],
                slabo:['Slabo ','sens-serif'],
                lora:['Lora','serif']
            },
            spacing: {
                header: '4rem', // Define a valid value for header spacing
              },
        },
    },

    plugins: [forms,
        require('preline/plugin'),

    ],
};

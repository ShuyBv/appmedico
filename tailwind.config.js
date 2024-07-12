import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                colorgob1: '#9D2449',
                blanco: '#ffffff',
                grisgob1: '#6F7271',
                colorgob2: '#13322B',
                colorgob3: '#b38e5d',
              },
        },
    },

    darkMode: false, // Esta línea desactiva el modo oscuro

    plugins: [forms],
};

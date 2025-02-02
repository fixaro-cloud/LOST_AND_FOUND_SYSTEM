import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
         './node_modules/flowbite/**/*.js',
          'node_modules/preline/dist/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                color1 : "#405D72",
                color2 : "#605EA1",
                color3 : "#536493", 
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        require('tailwindcss-motion'),
        require('preline/plugin')
    ],
};

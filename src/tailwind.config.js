const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'lightpink' : '#ffb6c1',
                'lightgreen' : '#90ee90' ,
                'paregreen' : ' #98fb98' ,
                'lavender' : '#e6e6fa' ,
                'lightsteel' : '#b0c4de' ,
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};

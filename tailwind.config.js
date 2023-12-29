import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    important: true,
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        screens: {
            sm: '480px',
            md: '768px',
            lg: '976px',
            xl: '1440px',
        },
        extend: {
            spacing: {
                '128': '32rem',
                '144': '36rem',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            fontFamily: {
                sans: ['Cera Pro', 'sans-serif'],
                serif: ['Merriweather', 'serif'],
            },
            colors: {
                'dm-color-primary': '#643EF3',
                'dm-color-secondary': '#EA7600',
                'dm-color-primary-light': '#F7F5FE',
                'dm-color-primary-light-border': '#C1B2FA',
                'dm-color-secondary-light': '#F7F5FE',
                'dm-bg-color': '#F7F8F8',
                'dm-bg-color-two': '#F2F3F3',
                'dm-border-color': '#E5E6E7',
                'dm-border-color-dark': '#CCCED0',
                'dm-heading-color': '#000913',
                'dm-color-text': '#566474',
                'gray-light': '#d3dce6',
            },
            fontSize: {
                'text-3xl': '2rem',
            }
        }
    },

    // theme: {
    //     extend: {
    //         fontFamily: {
    //             sans: ['Figtree', ...defaultTheme.fontFamily.sans],
    //         },
    //     },
    // },

    plugins: [forms],
};

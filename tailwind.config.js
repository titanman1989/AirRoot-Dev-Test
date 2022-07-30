const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],
    safelist: [
    'w-64',
    'w-1/2',
    'rounded-l-lg',
    'rounded-r-lg',
    'bg-gray-200',
    'grid-cols-4',
    'grid-cols-7',
    'h-6',
    'leading-6',
    'h-9',
    'leading-9',
    'shadow-lg'
  ],
     // enable dark mode via class strategy
  darkMode: 'class',
    theme: {
   mytheme: {
         "primary": "#570DF8",
          "secondary": "#ec4899",
          "accent": "#059669",
          "neutral": "#374151",
          "base-100": "#FFFFFF",
          "info": "#38bdf8",
          "success": "#65a30d",
          "warning": "#fbbf24",
          "error": "#dc2626",
          },
        extend: {
            fontFamily: {
                sans: ['Prompt'],
            },
        },
    },

    plugins: [ require("flowbite/plugin")],
   
    daisyui: {
    styled: true,
    themes: true,
    base: true,
    utils: true,
    logs: true,
    rtl: false,
    prefix: "",
    darkTheme: "dark",
  },
  
};

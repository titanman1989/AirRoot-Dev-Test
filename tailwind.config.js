const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

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

    plugins: [require('@tailwindcss/forms'),require("@tailwindcss/typography"), require("daisyui")],
   
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

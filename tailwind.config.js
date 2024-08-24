/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './resources/js/**/*.jsx',
    './resources/js/**/*.js',
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'custom-white': '#F6F6F6',
        'custom-green': '#0ead69',
        'custom-blue': '#073b4c',
        'custom-red': '#ee4266',
        'custom-yellow': '#ffd23f',
      },
      fontFamily:{
        'urbanist': ["Urbanist", "sans-serif"],
        'manrope': ["Manrope", "sans-serif"],
        'public': ["Public Sans", "sans-serif"],
        'outfit': ["Outfit", "sans-serif"],
        'libreFranklin': ["Libre Franklin", "sans-serif"],
      }
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}


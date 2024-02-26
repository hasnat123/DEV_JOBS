/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

export default {
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      ...colors,
      'laravel': '#ef3b2d',
      'dark': '#1e293b',
      'primary': '#0ea5e9',
      'font-color-primary': '#1f2937',
      'font-color-dark': '#f3f4f6'
    },
    extend: {
      backgroundImage: {
        'hero-pattern': "url('./../../public/images/bg-1.jpg')",
        'hero-pattern-dark': "url('./../../public/images/bg-1-dark.jpg')",
        'hero-grid': "url('./../../public/images/bg-2.svg')",
        'hero-grid-dark': "url('./../../public/images/bg-2-dark.svg')",
      }
    },
  },
  plugins: [],
}
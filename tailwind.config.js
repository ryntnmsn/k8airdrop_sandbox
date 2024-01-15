/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      height: {
        100: '34rem'
      },
      boxShadow: {
        xl: '0 7px 0 0 rgba(110, 102, 255, 0.33), 0 1px 2px -1px rgba(110, 102, 255, 0.33)'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

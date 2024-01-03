/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    extend: {
      colors: {
        primary: {
            '50': '#fffee7',
            '100': '#fffdc1',
            '200': '#fff886',
            '300': '#ffeb41',
            '400': '#ffdb0d',
            '500': '#ffcb00',
            '600': '#d19400',
            '700': '#a66902',
            '800': '#89520a',
            '900': '#74430f',
            '950': '#442304',
          },
        }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}


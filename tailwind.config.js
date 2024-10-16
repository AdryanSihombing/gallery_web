/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            'basic': '#000',
            'primary': '#fff',
            'secondary': '#1F1F1F',
            'tertiary': '#303134',
        }
    },
  },
  plugins: [],
}


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
        colorgob1: '#9D2449',
        blanco: '#ffffff',
        grisgob1: '#6F7271',
        colorgob2: '#0c231e',
        colorgob3: '#b38e5d',
        colorgob4: '#13322b',
        grisgob2: '#f5f5f5',
      },
    },
  },
  plugins: [],
}
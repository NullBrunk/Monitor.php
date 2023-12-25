/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php"],
  theme: {
    extend: {},
  },
  plugins: [],
}

// npx tailwindcss -i ./src/input.css -o ./assets/css/tailwind.css --watch
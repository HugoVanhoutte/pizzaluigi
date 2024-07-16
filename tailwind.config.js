/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./assets/**/*.js",
      "./templates/**/*.{html,twig}",
  ],
  theme: {
    extend: {
        colors: {
            'gold': '#C5AB6B',
            'light': '#FFFCF3',
            'dark': '#1A1C20',
        },

        fontFamily: {
          'title': 'Rouge Script, cursive',
          'sub-title': 'Quintessential, serif',
          'text': 'Raleway, sans-serif',
        }
    },
  },
  plugins: [],
}


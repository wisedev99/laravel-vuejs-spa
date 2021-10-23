const colors = require('tailwindcss/colors');

module.exports = {
  purge: [],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {},
      colors: {
          gray: colors.blueGray,
          indigo: colors.indigo,
          red: colors.rose,
          yellow: colors.yellow,
      }
  },
  variants: {
    extend: {
        backgroundClip: ['hover', 'focus'],
        tableLayout: ['hover', 'focus'],
    },
  },
  plugins: [],
}

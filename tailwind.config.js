//const colors = require('tailwindcss/colors')

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {
      // colors: {
      //   transparent: 'transparent',
      //   current: 'currentColor',
      //   gray: colors.coolGray,
      //   rose: colors.rose
      // }
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
    //require("tailwindcss-brand-colors")
  ]
}

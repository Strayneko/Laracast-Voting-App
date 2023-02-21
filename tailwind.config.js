const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php'
  ],

  theme: {
    extend: {
      container: {
        center: true
      },
      colors: {
        gray: {
          background: '#f7f8fc'
        },
        theme: {
          blue: {
            primary: '#328af1',
            hover: '#2879bd'
          },
          yellow: '#ffc73c',
          red: '#ec454f',
          green: '#1aab8b',
          purple: '#8b60ed'
        }
      },
      boxShadow: {
        card: '4px 4px 15px 0 rgba(36, 37, 38, 0.08)',
        dialog: '3px 4px 15px 0 rgba(36, 37, 38, 0.22)'
      },
      fontFamily: {
        sans: ['Open Sans', ...defaultTheme.fontFamily.sans]
      },
      fontSize: {
        xxs: ['0.625rem', { lineHeight: '1rem' }]
      }
    }
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/line-clamp')]
}

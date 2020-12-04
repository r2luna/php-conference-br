const defaultTheme = require('tailwindcss/defaultTheme')
const colors       = require('tailwindcss/colors')

module.exports = {
    purge      : [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode   : false,
    corePlugins: {
        outline: false,
    },
    theme      : {
        colors,
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {},
    },
    plugins : [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio')
    ],
}

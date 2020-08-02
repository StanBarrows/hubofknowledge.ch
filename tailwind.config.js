const defaultTheme = require('tailwindcss/defaultTheme');


module.exports = {
    purge: {
        content: ['./resources/views/**/*.php'],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [require('@tailwindcss/ui'), require('@tailwindcss/typography')],
};

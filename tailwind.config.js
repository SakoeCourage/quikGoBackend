const colors = require('tailwindcss/colors');
module.exports = {
    mode: 'jit',
    content: [
        "./resources/views/*.blade.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/**/**/*.blade.php",

    ],
    // purge: ["./resources/views/**/*.blade.php", "./resources/css/**/*.css"],
    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                black: colors.black,
                white: colors.white,
                gray: colors.gray,
                emerald: colors.emerald,
                indigo: colors.indigo,
                yellow: colors.yellow,
                fuchsia: colors.fuchsia,
                rink: colors.pink,
                rose: colors.rose,
                sky: colors.sky,
                slate: colors.slate,
                zinc: colors.zinc,
                neutral: colors.neutral,
                cyan: colors.cyan,
                stone: colors.stone,
                lime: colors.lime,
                green: colors.green,
                teal: colors.teal,
                blue: colors.blue,
                voilet: colors.violet,



            },
        },

    },
    variants: {},
    plugins: [require("@tailwindcss/ui"),


    ],
};
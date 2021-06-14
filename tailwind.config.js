const colors = require("tailwindcss/colors");

module.exports = {
    purge: ["./resources/views/**/*.blade.php", "./resources/**/*.js"],
    darkMode: "class", // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                red: {
                    accent: "#800000",
                },
                gray: {
                    "primary-light": "#f2f2f2",
                    "secondary-light": "white",
                    "tertiary-light": "#E5E7EB",
                    "primary-dark": "#292929",
                    "secondary-dark": "#121212",
                    "tertiary-dark": "#1E1E1E",
                },
            },
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            gray: colors.coolGray,
            red: colors.rose,
            black: colors.black,
            white: colors.white,
            green: colors.emerald,
        },
        fontFamily: {
            sans: ["Poppins", "sans-serif"],
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require("@tailwindcss/ui")],
};

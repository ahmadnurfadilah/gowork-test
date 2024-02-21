/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            sans: ["Open Sans", "ui-sans-serif", "system-ui"],
            inter: ["Inter", "ui-sans-serif", "system-ui"],
            display: ["CaslonCP"],
        },
        extend: {
            colors: {
                primary: "#9E7619",
                dark: "#1D2426",
                space: "#243033",
                deepsea: "#0D4759",
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                "gray-custom": "#e2e8f0",
                "orange-custom": "#ED9D06",
                "red-custom": "#FE7935",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    important: true,
    theme: {
        extend: {
            colors: {
                "co-dark-blue": "#263B81",
                "co-pink": "#DB0056",
                "co-light-pink": "#FF73BD",
                "co-lighter-pink": "#FFA8DE",
                "co-sky": "#00CFE2",
            },
        },
    },
    plugins: [],
};

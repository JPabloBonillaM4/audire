import daisyui from "daisyui";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    plugins: [daisyui],

    daisyui: {
        themes: ["light", "dark"],
        logs: false,
    },
};

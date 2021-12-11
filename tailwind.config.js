const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./storage/framework/views/*.php", "./resources/**/*.blade.php", "./resources/**/*.js", "./resources/**/*.vue"],
    darkMode: "class", // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                bgray: colors.slate,
                blue: {
                    light: "#6282D9",
                },
                dark: {
                    bg: "#01051C",
                    menu: "#0C1027",
                    header: "#030B1E",
                    card: "#0D1437",
                },
            },
            borderRadius: {
                half: "50%",
            },
            minHeight: {
                5: "1.25rem",
                8: "2rem",
                10: "2.5rem",
                12: "3rem",
                14: "3.5rem",
                16: "4rem",
                28: "7rem",
                36: "9rem",
                80: "20rem",
            },
            minWidth: {
                8: "2rem",
                14: "3.5rem",
                24: "6rem",
                28: "7rem",
                64: "16rem",
                72: "18rem",
                80: "20rem",
                124: "31rem",
                130: "34rem",
            },
            width: {
                18: "4.5rem",
                100: "27rem",
                124: "31rem",
                128: "32rem",
                130: "34rem",
                134: "36rem",
                138: "38rem",
                180: "42rem",
                184: "44rem",
                188: "46rem",
                192: "48rem",
                194: "49rem",
            },
            zIndex: {
                100: 100,
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};

const mix = require("laravel-mix");
const webpack = require("webpack");
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.ts("resources/js/app.ts", "public/js")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .vue({ version: 3 })
    .sourceMaps()
    .disableNotifications()
    // .browserSync({
    //     proxy: "http://127.0.0.1:8000",
    //     host: "http://127.0.0.1",
    //     port: 8000,
    //     localOnly: true,

    //     // socket: {
    //     //     domain: "127.0.0.1:8000",
    //     // },
    //     notify: false,
    // })
    .webpackConfig({
        devtool: mix.inProduction() ? false : "inline-source-map",
        plugins: [
            new webpack.DefinePlugin({
                // __VUE_OPTIONS_API__: false,
                __VUE_PROD_DEVTOOLS__: false,
            }),
        ],
    });

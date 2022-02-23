const mix = require("laravel-mix");
const webpack = require("webpack");
const BundleAnalyzerPlugin = require("webpack-bundle-analyzer").BundleAnalyzerPlugin;
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
    .vue({ version: 3, runtimeOnly: mix.inProduction() })
    .disableNotifications()
    .webpackConfig({
        devtool: mix.inProduction() ? false : "inline-source-map",
        plugins: [
            new webpack.DefinePlugin({
                // __VUE_OPTIONS_API__: false,
                __VUE_PROD_DEVTOOLS__: false,
                __INTLIFY_PROD_DEVTOOLS__: false,
            }),
            // new BundleAnalyzerPlugin(),
        ],
        stats: {
            children: true,
        },
    });

if (!mix.inProduction()) {
    mix.sourceMaps();
}

if (mix.inProduction()) {
    mix.version();
    // .extract(["vue", "axios"]);
}

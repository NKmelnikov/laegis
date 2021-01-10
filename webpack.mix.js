const mix = require('laravel-mix');
const FilterWarningsPlugin = require('webpack-filter-warnings-plugin');

mix.js('resources/js/app.js', 'public/js').vue({ version: 2 })
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({plugins: [
            new FilterWarningsPlugin({
                exclude: [/Replace fill-available to stretch/, /Can't resolve 'crypto' in/],
            })
        ]});

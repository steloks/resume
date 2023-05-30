const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/front.js', 'public/js/app.js')
    .js('resources/js/pet.js', 'public/js/app.js')
    .js('resources/js/order.js', 'public/js/app.js')
    .js('resources/js/admin.js', 'public/js/app.js')
    .sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/flatpickr/dist/flatpickr.css', 'public/css/flatpickr.css');

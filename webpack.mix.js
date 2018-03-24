let mix = require('laravel-mix');

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

mix.scripts([
    'resources/assets/js/datepicker.min.js',
    'resources/assets/js/owl.carousel.min.js',
    'resources/assets/js/password.strength.js',
    'resources/assets/js/tab.rating.js',
], 'public/js/app.js');

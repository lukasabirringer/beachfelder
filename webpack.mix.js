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

 mix.js('resources/assets/js/app.js', 'public/js')
 	.scripts([ 	'public/js/datepicker.min.js',
 				'public/js/i18n/datepicker.de.js',
 				'public/js/dropzone.js',
 				'public/js/tab.rating.js',
 				],
	'public/js/vendors.js');
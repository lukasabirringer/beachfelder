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
 	.scripts([ 	'resources/assets/js/datepicker.min.js',
 				'resources/assets/js/i18n/datepicker.de.js',
 				'resources/assets/js/dropzone.js',
 				'resources/assets/js/main.js',
 				],
	'public/js/vendors.js')
	.sass('resources/assets/sass/app.scss', 'public/css/app.css')
	.disableNotifications();
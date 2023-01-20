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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/donatur.js', 'public/js')
   .js('resources/js/proker.js', 'public/js')
   .js('resources/js/search.js', 'public/js')
   .js('resources/js/summary.js', 'public/js')
   .js('resources/js/zakat.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/donatur.scss', 'public/css')
   .sass('resources/sass/proker.scss', 'public/css')
   .sass('resources/sass/search.scss', 'public/css')
   .sass('resources/sass/summary.scss', 'public/css')
   .sass('resources/sass/zakat.scss', 'public/css')
   .browserSync({
      proxy: 'localhost:8000',
   });

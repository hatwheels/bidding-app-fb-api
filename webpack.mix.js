const mix = require('laravel-mix');
const postcssImport = require('postcss-import')
const tailwindcss = require('tailwindcss')

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
   //.sass('resources/sass/app.scss', 'public/css');
   .postCss('resources/css/app.css', 'public/css', [
    postcssImport,
    tailwindcss('tailwind.js'),
  ])
  .sourceMaps()

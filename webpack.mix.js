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

mix.js('resources/js/app.js', 'public/js').vue({ version: 2 })
  .sass('resources/sass/app.scss', 'public/css');


var glob = require("glob");
const path = require("path");

//平文CSS
glob("resources/assets/css/**/*", (err, files) => {
  const css_files = files.filter((x) => x.indexOf(".css") !== -1);
  css_files.forEach((file) => {
    var name = file.replace("resources/assets/", "public/");
    mix.styles(file, name);
  });
});

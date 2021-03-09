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
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/admin/css/sb-admin.min.css',
    'resources/admin/css/style.css'],'public/css/all-admin.css');
mix.scripts([
     'resources/admin/js/jquery-easing/jquery.easing.min.js',
     'resources/admin/js/chart.js/Chart.min.js',
     'resources/admin/js/sb-admin.min.js',
      'resources/admin/js/chart.js/chart-area-demo.js',
       ],'public/js/all-admin.js');
mix.scripts('resources/admin/js/jquery-3.5.1.min.js','public/js/jquery-3.5.1.min.js');
mix.styles('resources/admin/css/dropzone.min.css','public/css/dropzone.css');
mix.scripts('resources/admin/js/dropzone.min.js','public/js/dropzone.js');
mix.styles('resources/frontend/css/style.css','public/css/all-frontend.css');
mix.scripts('resources/frontend/js/jquery-3.3.1.min.js','public/js/all-frontend.js');
mix.scripts('resources/frontend/js/buttonComment.js','public/js/comment.js');


/*the solution Error of popper.js.map - Failed to load resource: the server responded with a status of 404 (Not Found)*/
mix.js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();

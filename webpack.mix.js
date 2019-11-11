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
    .scripts([
            'resources/js/queue.js',
            'resources/js/datepicker_ru.js',
            'resources/js/datepicker_init.js'
        ],
        'public/js/all.js')
    .extract([
        'jquery',
        'jquery-ui'
    ])
    .sass('resources/sass/app.scss', 'public/css');

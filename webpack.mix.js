const mix = require('laravel-mix');
mix.css('resources/css/app.css', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/script.js' , 'public/js')
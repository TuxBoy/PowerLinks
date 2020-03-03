const mix = require('laravel-mix');

mix.ts('assets/js/app.js', 'public/assets/js')
    .sass('assets/css/app.scss', 'public/assets/css')


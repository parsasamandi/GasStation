// webpack.mix.js
let mix = require('laravel-mix');



mix.setPublicPath('public');
mix.setResourceRoot('../');

// Mix
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css');


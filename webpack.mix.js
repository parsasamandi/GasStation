// webpack.mix.js
let mix = require('laravel-mix');

mix.setPublicPath('public');
mix.setResourceRoot('../');

// Mix
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    // styles
    .styles('resources/css/style.css','public/css/style.css')
    // Admin
    .styles('resources/css/admin.css','public/css/admin.css')


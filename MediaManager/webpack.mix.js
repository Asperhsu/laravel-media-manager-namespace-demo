const mix = require('laravel-mix');

let public_path = '../public/MediaManager';
mix.setPublicPath(public_path);

// MediaManager
mix.js(__dirname + '/Resources/js/app.js', 'app.js')
    .sass(__dirname + '/Resources/sass/app.scss', 'app.css')
    .copyDirectory(__dirname + '/Resources/vendor/dist', public_path)

if (mix.inProduction()) {
    mix.version();
}



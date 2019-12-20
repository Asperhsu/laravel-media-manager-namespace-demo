const mix = require('laravel-mix');

let public_path = '../public';
mix.setPublicPath(public_path);

// MediaManager
mix.js(__dirname + '/Resources/js/app.js', 'js')
    .sass(__dirname + '/Resources/sass/app.scss', 'assets/vendor/MediaManager/style.css')
    .copyDirectory(__dirname + '/Resources/vendor/dist', public_path + '/assets/vendor/MediaManager')

if (mix.inProduction()) {
    mix.version();
}



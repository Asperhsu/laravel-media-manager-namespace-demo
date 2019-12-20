const mix = require('laravel-mix');

let public_path = '../';
mix.setPublicPath(public_path);

// MediaManager
mix.js(__dirname + '/Resources/js/app.js', 'public/js')
    .sass(__dirname + '/Resources/vendor/sass/manager.scss', 'public/assets/vendor/MediaManager/style.css')
    .copyDirectory(__dirname + '/Resources/vendor/dist', public_path + 'public/assets/vendor/MediaManager')

if (mix.inProduction()) {
    mix.version();
}



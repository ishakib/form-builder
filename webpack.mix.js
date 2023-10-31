const mix = require('laravel-mix');

mix.setPublicPath('public')
    .setResourceRoot('../') // Turns assets paths in css relative to css file
    .sass('resources/sass/style.scss', 'css/app.css')
    .js('resources/js/app.js', 'js/app.js')
    .vue()
    .extract([
        'jquery',
        'bootstrap',
        'popper.js',
        'axios',
        'sweetalert2',
        'lodash'
        ])
    .sourceMaps();

if (mix.inProduction()) {
    mix.version()
        .options({
            // Optimize JS minification process
            terser: {}
        });
} else {
    mix.webpackConfig({
        devtool: 'inline-source-map',
        stats: {
            warnings: false,
        }
    });
}

const mix = require("laravel-mix");

mix.sass('resources/sass/fontawesome.scss', 'public/css/fontawesome.css');
mix.copy('node_modules/@fortawesome/fontawesome-pro/webfonts', 'public/fonts')


mix.postCss('resources/css/tailwind.css', 'public/css/tailwind.css', [
    require('tailwindcss'),
]);

mix.js('resources/js/alpine.js', 'public/js/alpine.js');

if (mix.inProduction()) {
    mix.version()
}


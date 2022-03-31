const mix = require('laravel-mix')

mix
    .copyDirectory('resources/assets/fontawesome', 'public/assets/fontawesome')
    .js('resources/assets/js/main.js', 'public/assets/js/app.js')
    .vue()
    .postCss('resources/assets/css/app.css', 'public/assets/css', [
        require('tailwindcss'),
    ])

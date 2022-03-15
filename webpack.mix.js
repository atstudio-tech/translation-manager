const mix = require('laravel-mix')

mix
    .copyDirectory('resources/assets/fontawesome', 'public/assets/fontawesome')
    .postCss('resources/assets/css/app.css', 'public/assets/css', [
        require('tailwindcss'),
    ])

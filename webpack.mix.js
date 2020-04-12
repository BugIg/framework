let mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')


const publicPath = '../../public/vendor/avored'

// mix.browserSync('avored.test');

mix.copy('resources/images', publicPath + '/images');


mix.setPublicPath(publicPath)
    .js('resources/js/app.js', 'js/app.js')

mix.setPublicPath(publicPath)
    .sass('resources/sass/app.scss', 'css/app.css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('tailwind.config.js') ],
    })

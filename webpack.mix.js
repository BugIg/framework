let mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')


const publicPath = '../../public/vendor/avored'

mix
.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
})
.webpackConfig({
    output: {
        filename: '[name].js',
        chunkFilename: 'js/[name].app.js',
        publicPath: '/vendor/avored/'
    }
})


mix.copy('resources/images', publicPath + '/images');

mix.setPublicPath(publicPath)
    .js('resources/js/app.js', 'js/app.js')

mix.setPublicPath(publicPath)
    .sass('resources/sass/app.scss', 'css/app.css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('tailwind.config.js') ],
    })

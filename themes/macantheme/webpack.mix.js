const mix = require('laravel-mix');

mix.copy('resources/images', 'public/images');

mix.js('resources/js/app.js', 'public/js/app.js');
mix.js('resources/js/homepage/app.js', 'public/js/homepage/app.js');
mix.js('resources/js/landing.js', 'public/js/landing.js');
mix.js('resources/js/blog/app.js', 'public/js/blog/app.js');
mix.js('resources/js/single-blog/app.js', 'public/js/single-blog/app.js');
mix.js('resources/js/single-portfolio/app.js', 'public/js/single-portfolio/app.js');
mix.sass('resources/sass/custom/aboutPage.scss' , 'public/css/aboutPage.css');
mix.sass('resources/sass/custom/single-post.scss' , 'public/css/single-post.css');
mix.sass('resources/sass/custom/blog.scss' , 'public/css/blog.css');
mix.sass('resources/sass/custom/portfolios.scss' , 'public/css/portfolios.css');
mix.sass('resources/sass/ltr.scss', 'public/css')
    .sass('resources/sass/modules/bootstrap-icons.scss' , 'public/css/bootstrap-icons.css')
    .sass('resources/sass/custom.scss', 'public/css/style.css', {}, [
        require("rtlcss")({}),
    ])
    .options({
        processCssUrls: true,
    });

mix.webpackConfig({
    stats: {
        children: true,
    },
});

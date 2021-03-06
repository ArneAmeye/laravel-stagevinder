const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.disableNotifications();

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/ajax.js", "public/js")
    .js("resources/js/upload.js", "public/js")
    .js("resources/js/getTags.js", "public/js")
    .js("resources/js/remove_button.js", "public/js")
    .js("resources/js/distance.js", "public/js")
    .js("resources/js/search.js", "public/js")
    .js("resources/js/unauth.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .sass("resources/sass/authentication.scss", "public/css")
    .options({ processCssUrls: false });

mix.sass("resources/sass/pages/index.scss", "public/css/pages");
mix.sass("resources/sass/pages/student.scss", "public/css/pages");
mix.sass("resources/sass/pages/company.scss", "public/css/pages");
mix.sass("resources/sass/pages/internship.scss", "public/css/pages");
mix.sass("resources/sass/pages/login.scss", "public/css/pages");
mix.sass("resources/sass/pages/upload.scss", "public/css/pages");
mix.sass("resources/sass/pages/register.scss", "public/css/pages");
mix.sass("resources/sass/pages/privacy.scss", "public/css/pages");

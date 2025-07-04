const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |


 <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/carrousel.css">
        <link rel="stylesheet" href="css/contactForm.css">
        <link rel="stylesheet" href="css/cards.css">
 */

 mix.styles([
    'public/css/index.css',
    'public/css/header.css',
    'public/css/footer.css',
    'public/css/carrousel.css',
    'public/css/contactForm.css',
    'public/css/cards.css',
], 'public/build/css/beta.css');

mix.js('resources/js/deleteButton.js', 'public/js')
   .js('resources/js/restorePassword.js', 'public/js')
   .js('resources/js/loginAuth.js', 'public/js')
   .js('resources/js/userForm.js', 'public/js')
   .js('resources/js/userIndex.js', 'public/js')
   .js('resources/js/userShow.js', 'public/js')
   .js('resources/js/locationFetch.js', 'public/js')
   .version();

var elixir = require('laravel-elixir');

require('laravel-elixir-livereload');

elixir(function(mix)
{

    // /resources/js
    mix.scripts([
        '/../bower_components/jquery/dist/jquery.min.js',
        '/../bower_components/bootstrap/dist/js/bootstrap.min.js',
        '/../bower_components/metisMenu/dist/metisMenu.min.js',
        'sb-admin-2.js',
    ], 'public/js/vendor.js');

    mix.livereload();
});
var elixir = require('laravel-elixir');

require('laravel-elixir-livereload');

elixir(function(mix)
{
    mix.scripts([
        '/../bower_components/jquery/dist/jquery.js',
        '/../bower_components/bootstrap/dist/js/bootstrap.js',
        '/../bower_components/metisMenu/dist/metisMenu.js',
        '/../bower_components/select2/select2.js',
        '/../bower_components/select2/select2_locale_pt-BR.js',
        'sb-admin-2.js',
    ], 'public/js/vendor.js');

    mix.scripts('app.js', 'public/js/app.js');

    mix.scripts('categories.js', 'public/js/categories.js');

    mix.scripts('projects.js', 'public/js/projects.js');

    mix.styles([
        '/../bower_components/bootstrap/dist/css/bootstrap.css',
        '/../bower_components/metisMenu/dist/metisMenu.css',
        '/../bower_components/font-awesome/css/font-awesome.css',
        '/../bower_components/select2/select2.css',
        '/../bower_components/select2-bootstrap-css/select2-bootstrap.css',
        'sb-admin-2.css',
    ], 'public/css/vendor.css');

    mix.version(['js/app.js', 'js/categories.js', 'js/projects.js']);

    mix.livereload();
});
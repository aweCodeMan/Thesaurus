var elixir = require('laravel-elixir');
var gulp = require('gulp');
var flatten = require('gulp-flatten');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');

    mix.task('moveTemplates', 'resources/assets/js/**/*.html');
    mix.scripts(['angular-bootstrap/ui-bootstrap-tpls.min.js'], 'public/js/vendor/all.js', 'bower_components');
    mix.scripts(['angular/app.js', 'angular/**/*.js'], 'public/js/app.js', 'resources/assets/js');
});

gulp.task('moveTemplates', function()
{
   gulp.src(['./resources/assets/js/**/*.html'])
     .pipe(flatten())
     .pipe(gulp.dest('./public/templates'));
});
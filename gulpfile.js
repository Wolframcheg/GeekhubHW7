var gulp = require('gulp'),
    less = require('gulp-less'),
    clean = require('gulp-clean'),
    concatJs = require('gulp-concat'),
    minifyJs = require('gulp-uglify');

gulp.task('less', function() {
    return gulp.src(['web-src/less/*.less'])
        .pipe(less({compress: true}))
        .pipe(gulp.dest('web/css/'));
});
gulp.task('images', function () {
    return gulp.src([
            'web-src/images/*'
        ])
        .pipe(gulp.dest('web/images/'))
});
gulp.task('fonts', function () {
    return gulp.src(['bower_components/bootstrap/fonts/*'])
        .pipe(gulp.dest('web/fonts/'))
});

gulp.task('lib-js', function() {
    return gulp.src([
            'bower_components/jquery/dist/jquery.js',
            'bower_components/bootstrap/dist/js/bootstrap.js',
            'bower_components/bootstrap-material-design/dist/js/ripples.js',
            'bower_components/bootstrap-material-design/dist/js/material.js',
            'bower_components/jquery.gracket.js/jquery.gracket.min.js',
        ])
        .pipe(concatJs('app.js'))
        .pipe(minifyJs())
        .pipe(gulp.dest('web/js/'));
});

gulp.task('ias-js-copy', function() {
    return gulp.src([
            'bower_components/infiniteajaxscroll/index.js',
        ])
        .pipe(concatJs('infiniteajaxscroll.js'))
        .pipe(minifyJs())
        .pipe(gulp.dest('web/js/'));
});

gulp.task('gracket-js-copy', function() {
    return gulp.src([
            'bower_components/jquery.gracket.js/jquery.gracket.min.js',
        ])
        .pipe(concatJs('jquery.gracket.min.js'))
        .pipe(minifyJs())
        .pipe(gulp.dest('web/js/'));
});


gulp.task('pages-js', function() {
    return gulp.src([
            'web-src/js/*.js'
        ])
        .pipe(minifyJs())
        .pipe(gulp.dest('web/js/'));
});
gulp.task('clean', function () {
    return gulp.src(['web/css/*', 'web/js/*', 'web/images/*', 'web/fonts/*'])
        .pipe(clean());
});
gulp.task('default', ['clean'], function () {
    var tasks = ['images', 'fonts', 'less', 'lib-js', 'pages-js', 'ias-js-copy', 'gracket-js-copy'];
    tasks.forEach(function (val) {
        gulp.start(val);
    });
});
gulp.task('watch', function () {
    var less = gulp.watch('web-src/less/*.less', ['less']),
        js = gulp.watch('web-src/js/*.js', ['pages-js']);
});

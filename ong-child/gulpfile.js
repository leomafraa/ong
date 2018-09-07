var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    babel = require('gulp-babel'),
    minCSS = require('gulp-clean-css')
    autoPrefixer = require('gulp-autoprefixer');

// Configuration Default
gulp.task('default',['sass', 'js', 'watch']);

// Configuration SASS
gulp.task('sass', () => {
    return gulp.src('assets/src/sass/bootstrap.scss')
        .pipe(concat('style.min.css')) // Concat
        .pipe(sass({outputStyle: 'compressed'})
            .on('error', sass.logError))

        .pipe(autoPrefixer({
            browsers: ['last 2 versions']
        }))
        .pipe(minCSS())
        .pipe(gulp.dest('assets/css'));
});

// Configuration Javascript
gulp.task('js', () => {
    return gulp.src('assets/src/js/**/*.js')
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(uglify())
        .pipe(concat('script.min.js')) // Concat
        .pipe(gulp.dest('assets/js'));
});

// Configuration watch for auto-run
gulp.task('watch', () => {
    gulp.watch('assets/src/sass/**/*.scss', ['sass']);
    gulp.watch('assets/src/js/**/*.js', ['js']);
});

// copy bootstrap files changes
// needed to compile bootstrap assets ('grunt dist')
gulp.task('bootstrap', function () {
    return gulp.src('assets/src/sass/base/bootstrap3/**')
        .pipe(gulp.dest('node_modules/bootstrap3/'));
});

var gulp  = require('gulp'),
    sass  = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifyCss = require('gulp-minify-css'),
    rename = require('gulp-rename')

gulp.task('styles', function() {
  return gulp.src('scss/main.scss')
      	.pipe(sass({ style: 'compact' }))
      	.pipe(autoprefixer('last 2 version', 'safari 10', 'ie 11', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe(gulp.dest('css/'));
});

gulp.task('build', function () {
  return gulp.src('scss/main.scss')
          .pipe(sass({ style: 'compact' }))
          .pipe(rename({
            basename : 'style',
            extname : '.min.css'
          }))
          .pipe(minifyCss())
          .pipe(gulp.dest('css/'));
});

gulp.task('watch', function() {
  gulp.watch('scss/**/*.scss', ['styles']);
});

gulp.task('default', ['styles', 'watch']);

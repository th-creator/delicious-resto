const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// Task to minify aprycot.css and save it as aprycot.min.css
gulp.task('minify-css', () => {
    return gulp.src('aprycot.css') // Path is directly in 'css' folder
        .pipe(cleanCSS())
        .pipe(rename('aprycot.min.css'))
        .pipe(gulp.dest('.')); // Save in the same directory
});

// Watch task to automatically update aprycot.min.css when aprycot.css changes
gulp.task('watch', () => {
    gulp.watch('aprycot.css', gulp.series('minify-css'));
});

// Default task
gulp.task('default', gulp.series('minify-css', 'watch'));

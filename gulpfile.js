var gulp = require('gulp');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

// Html task
gulp.task('html', function(){
    gulp.src('application/views/**/*.php')
        .pipe(reload({stream:true}))
})

// Browser task
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy : 'http://aprdi-elearning.test/',
    });
});

// Watch task
gulp.task('watch', function(){
    gulp.watch('application/views/**/*.php', ['html']);
    gulp.watch('application/controllers/**/*.php', ['html']);
});

gulp.task('default', ['html', 'browser-sync', 'watch']);
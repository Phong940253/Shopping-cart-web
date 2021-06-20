const gulp = require("gulp");
const sass = require("gulp-sass");


gulp.task("styles", function() {
  return gulp.src("/scss/*.scss")
      .pipe(sass().on("error", sass.logError))
      .pipe(gulp.dest("/css/"));
});


// Watch task
gulp.task("default", function() {
  return gulp.watch("/scss/*.scss", gulp.series("styles"));
});

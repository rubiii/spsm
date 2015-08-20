var gulp      = require("gulp"),
    concat    = require("gulp-concat"),
    minifyCSS = require("gulp-minify-css");

gulp.task("css", function() {
  gulp.src([
    "assets/css/reset.css",
    "assets/css/fonts.css",
    "assets/css/style.css",
    "assets/css/font-awesome.css"
  ])
  .pipe(concat("style.min.css"))
  .pipe(minifyCSS())
  .pipe(gulp.dest("assets/css/build"))
});

gulp.task("watch", ["build"], function() {
  gulp.watch("assets/css/*.css", ["css"]);
});

gulp.task("build", ["css"]);

gulp.task("default", ["build"]);

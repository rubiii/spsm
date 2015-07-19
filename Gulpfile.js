var gulp      = require("gulp"),
    concat    = require("gulp-concat"),
    minifyCSS = require("gulp-minify-css");

gulp.task("css", function() {
  gulp.src(["css/reset.css", "css/fonts.css", "css/style.css", "css/font-awesome.css"])
    .pipe(concat("style.min.css"))
    .pipe(minifyCSS())
    .pipe(gulp.dest("css/build"))
});

gulp.task("watch", ["build"], function() {
  gulp.watch("css/*.css", ["css"]);
});

gulp.task("build", ["css"]);

gulp.task("default", ["build"]);
'use strict';

var gulp      = require("gulp"),
    concat    = require("gulp-concat"),
    minifyCSS = require("gulp-minify-css"),
    uglifyJS  = require("gulp-uglify"),
    sass      = require("gulp-sass");

gulp.task("images", function() { 
  gulp.src([
    "assets/images/*"
  ])
  .pipe(gulp.dest("public/images")); 
});

gulp.task("fonts", function() { 
  gulp.src([
    "assets/fonts/*",
    "bower_components/font-awesome/fonts/*"
  ])
  .pipe(gulp.dest("public/fonts")); 
});

gulp.task("css", function() {
  gulp.src([
    "assets/css/reset.scss",
    "assets/css/opensans.scss",
    "assets/css/style.scss",
  ])
  .pipe(concat("application.css"))
  .pipe(sass().on("error", sass.logError))
  .pipe(minifyCSS())
  .pipe(gulp.dest("public/css"))
});

gulp.task("js", function() {
  gulp.src([
    "bower_components/jquery/dist/jquery.js",
    "assets/js/main.js",
  ])
  .pipe(concat("application.js"))
  .pipe(uglifyJS())
  .pipe(gulp.dest("public/js"))
});

gulp.task("watch", ["build"], function() {
  gulp.watch("assets/css/*.scss", ["css"]);
  gulp.watch("assets/js/*.js", ["js"]);
});

gulp.task("build", ["images", "fonts", "css", "js"]);
gulp.task("default", ["build"]);

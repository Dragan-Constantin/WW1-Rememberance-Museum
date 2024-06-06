"use strict";

// Load plugins
const autoprefixer = require("gulp-autoprefixer");
const browsersync = require("browser-sync").create();
const cleanCSS = require("gulp-clean-css");
const del = require("del");
const gulp = require("gulp");
const header = require("gulp-header");
const merge = require("merge-stream");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const sass = require("gulp-sass");
const uglify = require("gulp-uglify");

// Load package.json for banner
const pkg = require('./view/package.json');

// Set the banner content
const banner = ['/*!\n',
  ' * Start Bootstrap - <%= pkg.title %> v<%= pkg.version %> (<%= pkg.homepage %>)\n',
  ' * Copyright 2013-' + (new Date()).getFullYear(), ' <%= pkg.author %>\n',
  ' * Licensed under <%= pkg.license %> (https://github.com/StartBootstrap/<%= pkg.name %>/blob/master/LICENSE)\n',
  ' */\n',
  '\n'
].join('');

// BrowserSync
function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: "./view/"
    },
    port: 3000
  });
  done();
}

// BrowserSync reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

// Clean vendor
function clean() {
  return del(["./view/vendor/"]);
}

// Bring third party dependencies from node_modules into vendor directory
function modules() {
  // Bootstrap JS
  var bootstrapJS = gulp.src('./view/node_modules/bootstrap/dist/js/*')
    .pipe(gulp.dest('./view/vendor/bootstrap/js'));
  // Bootstrap SCSS
  var bootstrapSCSS = gulp.src('./view/node_modules/bootstrap/scss/**/*')
    .pipe(gulp.dest('./view/vendor/bootstrap/scss'));
  // ChartJS
  var chartJS = gulp.src('./view/node_modules/chart.js/dist/*.js')
    .pipe(gulp.dest('./view/vendor/chart.js'));
  // dataTables
  var dataTables = gulp.src([
      './view/node_modules/datatables.net/js/*.js',
      './view/node_modules/datatables.net-bs4/js/*.js',
      './view/node_modules/datatables.net-bs4/css/*.css'
    ])
    .pipe(gulp.dest('./view/vendor/datatables'));
  // Font Awesome
  var fontAwesome = gulp.src('./view/node_modules/@fortawesome/**/*')
    .pipe(gulp.dest('./view/vendor'));
  // jQuery Easing
  var jqueryEasing = gulp.src('./view/node_modules/jquery.easing/*.js')
    .pipe(gulp.dest('./view/vendor/jquery-easing'));
  // jQuery
  var jquery = gulp.src([
      './view/node_modules/jquery/dist/*',
      '!./view/node_modules/jquery/dist/core.js'
    ])
    .pipe(gulp.dest('./view/vendor/jquery'));
  return merge(bootstrapJS, bootstrapSCSS, chartJS, dataTables, fontAwesome, jquery, jqueryEasing);
}

// CSS task
function css() {
  return gulp
    .src("./view/scss/**/*.scss")
    .pipe(plumber())
    .pipe(sass({
      outputStyle: "expanded",
      includePaths: "./view/node_modules",
    }))
    .on("error", sass.logError)
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(header(banner, {
      pkg: pkg
    }))
    .pipe(gulp.dest("./view/css"))
    .pipe(rename({
      suffix: ".min"
    }))
    .pipe(cleanCSS())
    .pipe(gulp.dest("./view/css"))
    .pipe(browsersync.stream());
}

// JS task
function js() {
  return gulp
    .src([
      './view/js/*.js',
      '!./view/js/*.min.js',
    ])
    .pipe(uglify())
    .pipe(header(banner, {
      pkg: pkg
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('./view/js'))
    .pipe(browsersync.stream());
}

// Watch files
function watchFiles() {
  gulp.watch("./view/scss/**/*", css);
  gulp.watch(["./view/js/**/*", "!./view/js/**/*.min.js"], js);
  gulp.watch("./view/**/*.php", browserSyncReload);
}

// Define complex tasks
const vendor = gulp.series(clean, modules);
const build = gulp.series(vendor, gulp.parallel(css, js));
const watch = gulp.series(build, gulp.parallel(watchFiles, browserSync));

// Export tasks
exports.css = css;
exports.js = js;
exports.clean = clean;
exports.vendor = vendor;
exports.build = build;
exports.watch = watch;
exports.default = build;

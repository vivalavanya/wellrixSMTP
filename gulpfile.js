var syntax = 'sass';
var gulpversion = '4';
var plugin_path = './';

var gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	browsersync = require('browser-sync'),
	concat = require('gulp-concat'),
	cache = require('gulp-cache'),
	cleancss = require('gulp-clean-css'),
	ftp = require('vinyl-ftp'),
	imagemin = require('gulp-imagemin'),
	notify = require('gulp-notify'),
	pngquant = require('imagemin-pngquant'),
	gutil = require('gulp-util'),
	rename = require('gulp-rename'),
	rsync = require('gulp-rsync'),
	sass = require('gulp-sass'),
	uglify = require('gulp-uglify');

gulp.task('styles', function () {
	return gulp
		.src([plugin_path + 'assets/scss/style.scss'])

		.pipe(eval('sass')())
		.pipe(concat('app.min.css'))
		.pipe(
			autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true })
		)
		.pipe(cleancss({ level: { 1: { specialComments: 0 } } }))
		.pipe(gulp.dest(plugin_path + 'assets/css'))
		.pipe(browsersync.stream());
});

gulp.task('scripts', function () {
	return gulp
		.src([plugin_path + 'assets/js/common.js'])

		.pipe(concat('app.min.js'))
		.pipe(gulp.dest(plugin_path + 'assets/js'))
		.pipe(browsersync.reload({ stream: true }));
});

if (gulpversion == 4) {
	gulp.task('watch', function () {
		gulp.watch(plugin_path + 'assets/scss/**/*.scss', gulp.parallel('styles'));
		gulp.watch([plugin_path + 'assets/js/common.js'], gulp.parallel('scripts'));
	});
	gulp.task('default', gulp.parallel('styles', 'scripts', 'watch'));
}

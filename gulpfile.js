var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var less = require('gulp-less');
var cleanCSS = require('gulp-clean-css');
var cleanJS = require('gulp-uglify');
var fileInclude = require('gulp-include');
var gcmq = require('gulp-group-css-media-queries');

var fs = require('fs');
var through2 = require('through2');
var touch = () =>
	through2.obj(function (file, enc, cb) {
		if (file.isNull()) {
			return cb(null, file);
		}
		return fs.utimes(file.path, new Date(), new Date(), () => {
			cb(null, file)
		});
	});

var LessPluginAutoPrefix = require('less-plugin-autoprefix');
var autoprefixPlugin = new LessPluginAutoPrefix({ browsers: ["last 5 versions"] });

var path = {
	src: {
		html: './src/html/*.html',
		js: './src/js/*.js',
		less: './src/less/*.less'
	},
	build: {
		html: './build/',
		js: './build/js/',
		css: './build/css/',
		img: './build/img/'
	},
	prod: {
		js: './js/',
		css: './css/',
		fonts: './fonts/',
		img: './img/'
	},
	watch: {
		html: './src/html/**/*.html',
		js: './src/js/**/*.js',
		less: './src/less/**/*.less'
	}
}

const styles = function () {
	return gulp.src(path.src.less)
		.pipe(less({
			plugins: [autoprefixPlugin]
		}).on('error', function (error) {
			console.log(error)
		}))
		.pipe(gcmq())
		.pipe(gulp.dest(path.build.css))
		.pipe(browserSync.stream())
		.pipe(touch());
}

const stylesMin = function () {
	return gulp.src(path.src.less)
		.pipe(less({
			plugins: [autoprefixPlugin]
		}).on('error', function (error) {
			console.log(error)
		}))
		.pipe(cleanCSS({ level: 2 }))
		.pipe(gulp.dest(path.prod.css))
		.pipe(touch());
}

const scripts = function () {
	return gulp.src(path.src.js)
		.pipe(fileInclude())
		.pipe(gulp.dest(path.build.js))
		.pipe(browserSync.stream())
		.pipe(touch());
}

const scriptsMin = function () {
	return gulp.src(path.src.js)
		.pipe(fileInclude())
		// minification js
		// .pipe(cleanJS({
		// 	toplevel: true,
		// 	compress: false, // combining functionality
		// 	mangle: {} // replace variables
		// }))
		.pipe(gulp.dest(path.prod.js))
		.pipe(touch());
}

const html = function () {
	return gulp.src(path.src.html)
		.pipe(fileInclude())
		.pipe(gulp.dest(path.build.html))
		.pipe(browserSync.stream())
		.pipe(touch());
}

const img = function () {
	return gulp.src(path.prod.img)
		.pipe(gulp.symlink(path.build.img))
		.pipe(touch());
}

function watch() {
	browserSync.init({
		server: {
			baseDir: path.build.html
		}
	});
	gulp.watch(path.watch.less, styles);
	gulp.watch(path.watch.js, scripts).on('change', browserSync.reload);
	gulp.watch(path.watch.html, html).on('change', browserSync.reload);
}

exports.default = gulp.series(gulp.parallel(scripts, styles, html, img), watch);
exports.prod = gulp.parallel(scriptsMin, stylesMin);

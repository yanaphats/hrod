import gulp from "gulp";
import concat from "gulp-concat";
import rename from "gulp-rename";
import dartSass from 'sass'
import gulpSass from 'gulp-sass'
import fs from 'fs'
import randomstring from 'randomstring'

const sass = gulpSass(dartSass)
const fileCode = ['production', 'uat'].indexOf(process.env.APP_ENV) > -1 ? randomstring.generate(8) : 'debug'

fs.writeFile('public/manifest.txt', fileCode, function (error) {
	if (error) throw error;
});

if (['production', 'uat'].indexOf(process.env.APP_ENV) > -1) {
	fs.rmSync('public/javascript', { recursive: true, force: true });
	fs.rmSync('public/stylesheet', { recursive: true, force: true });
}



gulp.task('app:style', function () {
	return gulp.src('resources/assets/stylesheet/app.scss')
		.pipe(sass({
			outputStyle: 'compressed',
			includePaths: [
				'node_modules',
				'resources/assets/stylesheet',
			],
		}).on('error', sass.logError))
		.pipe(rename({ suffix: `-${fileCode}.min` }))
		.pipe(gulp.dest('public/stylesheet'));
});


const defaultTasks = [
	'app:style',
	// 'app:script',
]

gulp.task('default', gulp.series(defaultTasks));
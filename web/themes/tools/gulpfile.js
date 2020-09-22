var gulp = require('gulp');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var uglify = require('gulp-uglifyjs');
var jshint = require('gulp-jshint');
var cssnano = require('gulp-cssnano');
var concat = require('gulp-concat');
var htmlImport = require('gulp-html-import');
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var jsFileList = [
    // '../assets/vendor/jquery/dist/jquery.min.js',
    '../assets/vendor/bootstrap/js/transition.js',
    //'../assets/vendor/bootstrap/js/alert.js',
    '../assets/vendor/bootstrap/js/button.js',
    '../assets/vendor/bootstrap/js/carousel.js',
    '../assets/vendor/bootstrap/js/collapse.js',
    '../assets/vendor/bootstrap/js/dropdown.js',
    '../assets/vendor/bootstrap/js/modal.js',
    //'../assets/vendor/bootstrap/js/tooltip.js',
    //'../assets/vendor/bootstrap/js/popover.js',
    //'../assets/vendor/bootstrap/js/scrollspy.js',
    '../assets/vendor/bootstrap/js/tab.js',
    //'../assets/vendor/bootstrap/js/affix.js',
    '../assets/js/owl.carousel.min.js',
    '../assets/js/main.js'
];

gulp.task('less', function() {
    return gulp.src('../assets/less/funny.less') 
    .pipe(less()) 
    .pipe(gulp.dest('../assets/css')) 
})


// Optimization Tasks 
// ------------------ Autoprefixer, cssnano, sourcemaps, ..

gulp.task('optimization', function() {
    return gulp.src('../../assets/css/app.css')
    .pipe(autoprefixer({
        browsers: ['> 1%','last 2 versions', 'ie 9', 'android 2.3', 'android 4', 'opera 12','firefox >= 4','safari 7','safari 8',
                        'IE 8', 'IE 9', 'IE 10','IE 11'],
        cascade: false
    }))
    .pipe(sourcemaps.init())
    .pipe(cssnano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('../../assets/css'))
})

gulp.task('concat', function() {
    return gulp.src(jsFileList)
    .pipe(concat('pkthienhoa.js'))
    .pipe(gulp.dest('../assets/js'))
})

gulp.task('uglify', function() {
    gulp.src('../assets/js/pkthienhoa.js')
    .pipe(uglify('pkthienhoa.min.js', {
      outSourceMap: true
    }))
    .pipe(gulp.dest('../assets/js'))
})

gulp.task('jshint', function() {
    gulp.src('../assets/js/_*.js')
    .pipe(jshint())
    .pipe(jshint.reporter('Bug'))
})


//Watchers
gulp.task('watch', function() {
    gulp.watch('../assets/less/**/*.less', ['less']);
    gulp.watch('../assets/js/_*.js', ['concat']);
})

// ## Globals
const argv         = require('minimist')(process.argv.slice(2));
const browserSync  = require('browser-sync').create();

const gulp         = require('gulp');
const gulpif       = require('gulp-if');
const jshint       = require('gulp-jshint');
const plumber      = require('gulp-plumber');
const sourcemaps   = require('gulp-sourcemaps');
const postcss      = require('gulp-postcss');
const sass         = require('gulp-sass');
const rename       = require("gulp-rename");
const rollup       = require('gulp-better-rollup')
const commonjs     = require('@rollup/plugin-commonjs')
const { babel }    = require('@rollup/plugin-babel')
const { terser }   = require('rollup-plugin-terser')
const { nodeResolve }  = require('@rollup/plugin-node-resolve')
const externalGlobals = require("rollup-plugin-external-globals")

sass.compiler      = require('node-sass');

const config = {
  devUrl: 'http://example.test',
  assets: './assets',
  dist: './dist'
}

// CLI options
const enabled = {
  // Disable source maps when `--production`
  minify: argv.production,
  // Disable source maps when `--production`
  maps: !argv.production,
  // Fail styles task on error when `--production`
  failStyleTask: argv.production,
  // Fail due to JSHint warnings only when `--production`
  failJSHint: argv.production,
};

// Error checking; produce an error rather than crashing.
const onError = function(err) {
  console.error(err.toString());
  this.emit('end');
};

// ### JSHint
// `gulp jshint` - Lints configuration JSON and project JS.
gulp.task('jshint', () => {
  return gulp.src(['gulpfile.js', `${config.assets}/scripts/**/*.js`])
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(gulpif(enabled.failJSHint, jshint.reporter('fail')));
});

// ### Styles
// `gulp styles` - Compiles, combines, and optimize project CSS.
// By default this task will only log a warning if a precompiler error is
// raised. If the `--production` flag is set: this task will fail outright.

gulp.task('styles', () => {
  return gulp.src(`${config.assets}/styles/*.{scss,sass}`)
    .pipe(gulpif(!enabled.failStyleTask, plumber({errorHandler: onError})))
    .pipe(gulpif(enabled.maps, sourcemaps.init()))
    .pipe(sass({
      outputStyle: 'expanded',
      precision: 10,
      includePaths: ['.'],
      errLogToConsole: !enabled.failStyleTask
    }))
    .pipe(postcss([
      require('autoprefixer')(),
      require('cssnano')(),
    ]))
    .pipe(gulpif(enabled.maps, sourcemaps.write('.')))
    .pipe(gulp.dest(`${config.dist}/styles`))
});


// ### Scripts
// `gulp scripts` - Runs combines and optimize all JS needed.
gulp.task('scripts:babel', () => {

  console.log(`Running Gulp in ${argv.production ? 'production' : 'development'} env`)

  return gulp.src([
    `${config.assets}/scripts/**/*.js`
  ])
    .pipe(gulpif(!enabled.failStyleTask, plumber({ errorHandler: onError })))
    .pipe(gulpif(enabled.maps, sourcemaps.init()))
    .pipe(rollup({
      external: [
        /@babel\/runtime/,
      ],
      plugins: [
        nodeResolve({
          browser: true,
          preferBuiltins: true,
          jsnext: true,
          main: true,
        }),
        commonjs(),
        babel({
          babelHelpers: 'bundled',
          exclude: ['node_modules/**'],
          presets: [
            ["@babel/preset-env", {
              "targets": {
                esmodules: false,
                browsers: ">0.25%, not ie 11, not op_mini all",
              },
              bugfixes: true,
              modules: false,
              useBuiltIns: 'usage',
              corejs: {
                version: "3.8",
                proposals: true
              },
              shippedProposals: true
            }]
          ],
        }),
      ]
    }, 'umd'))
    .pipe(gulp.dest(`${config.dist}/scripts`))
    .pipe(rollup({
      plugins: [
        terser()
      ]
    }, 'umd'))
    .pipe(rename({
      extname: ".min.js"
    }))
    .pipe(gulpif(enabled.maps, sourcemaps.write('.')))
    .pipe(gulp.dest(`${config.dist}/scripts`))
});


gulp.task('scripts:jquery', function () {
  return gulp.src([
    './node_modules/jquery/dist/jquery.min.js',
    './node_modules/jquery/dist/jquery.min.map'
  ])
    .pipe(gulp.dest(`${config.dist}/scripts`));
});

gulp.task('scripts:bootstrap', function () {
  return gulp.src([
    './node_modules/bootstrap/dist/js/bootstrap.min.js',
    './node_modules/bootstrap/dist/js/bootstrap.min.js.map'
  ])
    .pipe(gulp.dest(`${config.dist}/scripts`));
});

gulp.task('scripts', gulp.series('scripts:babel', 'scripts:jquery', 'scripts:bootstrap'));

// ### Images
// `gulp images` - Run lossless compression on all the images.
gulp.task('images', () => {
  return gulp.src(`${config.assets}/images/*.{svg,jpg,jpeg,png}`)
    .pipe(gulp.dest(`${config.dist}/images`))
});

// ### Clean
// `gulp clean` - Deletes the build folder entirely.
gulp.task('clean', require('del').bind(null, [config.dist]));

// ### Watch
// `gulp watch` - Use BrowserSync to proxy your dev server and synchronize code
// changes across devices. Specify the hostname of your dev server at
// `manifest.config.devUrl`. When a modification is made to an asset, run the
// build step for that asset and inject the changes into the page.
// See: http://www.browsersync.io
gulp.task('watch', () => {
  browserSync.init({
    files: ['{lib,templates}/**/*.php', '*.php'],
    proxy: config.devUrl,
    snippetOptions: {
      whitelist: ['/wp-admin/admin-ajax.php'],
      blacklist: ['/wp-admin/**'],
    },
  });
  gulp.watch([`${config.assets}/styles/**/*`], gulp.series('styles'));
  gulp.watch([`${config.assets}/scripts/**/*`], gulp.series('scripts'));
  gulp.watch([`${config.assets}/images/**/*`], gulp.series('images'));
});

// ### Build
// `gulp build` - Run all the build tasks but don't clean up beforehand.
// Generally you should be running `gulp` instead of `gulp build`.
gulp.task(
  'build',
  gulp.series('styles', 'jshint', 'scripts', 'images')
);

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', gulp.series('clean', 'build'));

// ### Run a clean bootstrap build
// `gulp clean:bootstrap` - Run a clean bootstrap build.
gulp.task('clean:bootstrap', gulp.series('clean', 'scripts:bootstrap'));

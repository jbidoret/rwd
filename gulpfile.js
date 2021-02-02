/*

---------------------------------------
User settings
---------------------------------------

User settings are set in ./assets/manifest.js

*/



/*

---------------------------------------
Gulp definition
---------------------------------------

By default you don’t have to configure anything to
make Gulp work.

- gulp `default` is `build`.

- gulp `build` runs everything to create all files needed in production.
  The task performs the following instructions: “kirby”, “lint”,
  “sass”, “css” and “scripts”.

- gulp `dev` runs only the essentials to create all files needed for
  development. The task performs the following instructions:
  “kirby”, “lint” and “sass”.

- gulp `sync` task executes “kirby”,
  run “lint”, “scripts” and “sass” watching `assets/manifest.js`,
  run “lint” watching `userScripts` and
  run “sass” watching `userStyles`.

*/



// Helpers function
Array.prototype.unique = function() {
  return this.reduce(function(accum, current) {
    if (accum.indexOf(current) < 0) {
      accum.push(current);
    }
    return accum;
  }, []);
}



// Global variables
var vars = require("./assets/manifest.js");

// Include gulp
const { series, src, dest, watch } = require('gulp');

// Include Our Plugins
var gp_autoprefixer = require('gulp-autoprefixer');
var gp_browserSync  = require('browser-sync').create();
var gp_concat       = require('gulp-concat');
var gp_concatCss    = require('gulp-concat-css');
var gp_fs           = require('fs');
var gp_jshint       = require('gulp-jshint');
var gp_nano         = require('gulp-cssnano');
var gp_plumber      = require('gulp-plumber');
var gp_rename       = require('gulp-rename');
var gp_sass         = require('gulp-sass');
var gp_uglify       = require('gulp-uglify');
var gp_sourcemaps   = require('gulp-sourcemaps');


// Compile our SCSS
function sass() {
  return src( vars.userStyles )
    .pipe(gp_sourcemaps.init())
    .pipe(gp_sass())
    .pipe(gp_autoprefixer({
    	cascade: false
    }))
    .pipe(gp_sourcemaps.write('.'))
    .pipe(dest('assets/css'))
    .pipe(gp_browserSync.stream());   
}


// Prefix & Minify CSS
function css(cb) {

  // get CSS (ordered)
  var styles = vars.userStyles.map(function(path){
    return path.replace(
      /^((.+)\/)?((.+?)(\.[^.]*$|$))$/g,
      "assets/css/$4.css"
    );
  });
  styles = vars.pluginStyles.concat( styles );

  return src( styles, { base: 'assets/production' } )
    .pipe(gp_concatCss('all.min.css', {
      inlineImports: false,
      rebaseUrls: true
    }))
    .pipe(dest('assets/production'))
    .pipe(gp_nano({discardComments: {removeAll: true}, autoprefixer: false}))
    .pipe(dest('assets/production'));
}


// Lint Task
function lint() {
  return src( vars.userScripts )
    .pipe(gp_jshint())
    .pipe(gp_jshint.reporter('default'));
}


// Concatenate JS plugins with user scripts and minify them.
function scripts(cb) {
  var scripts = vars.pluginScripts.concat( vars.userScripts );
  return src( scripts )
    .pipe(gp_sourcemaps.init())
    .pipe(gp_concat('all.min.js'))
    .pipe(gp_uglify({
      compress: {
        drop_debugger : true,
        drop_console : true
      }
    }))
    .pipe(gp_sourcemaps.write('.'))
    .pipe(dest('assets/production'));
}



// Export `manifest.js` vars to PHP through a kirby plugin.
// cf. `snippets/header` and `snippets/footer`
function kirby(done){
  // get CSS (ordered)
  var styles = vars.userStyles.map(function(path){
    return path.replace(
      /^((.+)\/)?((.+?)(\.[^.]*$|$))$/g,
      "assets/css/$4.css"
    );
  });
  styles = vars.pluginStyles.concat( styles );

  // get JS
  var scripts = vars.pluginScripts.concat( vars.userScripts );

  // Create a Kirby plugin that defines asset vars
  var destination = 'site/plugins/assets';
  var assets  = "<?php\n";
      assets += "# Automatically generated file by Gulp for kirby-basic-devkit; DO NOT EDIT.\n";
      assets += "Kirby::plugin('basic-devkit/assets', [\n";
      assets += "  'options' => [\n";
      assets += "    'styles' => " + JSON.stringify(styles) + ",\n";
      assets += "    'scripts' => " + JSON.stringify(scripts) + ",\n";
      assets += "  ]\n";
      assets += "]);";

  if(!gp_fs.existsSync(destination)) {
    gp_fs.mkdirSync(destination);
  }
  gp_fs.writeFileSync(destination + '/index.php', assets );
  done();
}


// Live reload sync on every screen connect to localhost

function sync(){
  gp_browserSync.init({
    proxy: vars.localDevUrl,
    notify: false,
    snippetOptions: {
      ignorePaths: ['panel/**', 'site/accounts/**']
    },
  });

  var scripts_folders = vars.userScripts.map(function(path){
    return path.replace(
      /^((.+)\/)?((.+?)(\.[^.]*$|$))$/g,
      "$1**"
    );
  }).unique();
  var styles_folders = vars.userStyles.map(function(path){
    return path.replace(
      /^((.+)\/)?((.+?)(\.[^.]*$|$))$/g,
      "$1**"
    );
  }).unique();

  watch( './assets/manifest.js', series(kirby, lint, sass));
  watch( scripts_folders, series(lint));
  watch( styles_folders, series(sass));

  // templates & snippets
  watch(["./site/templates/*.php", "./site/snippets/*.php"], { events: 'change' }, function(done) {
    gp_browserSync.reload();
    done();
  });
  
}


/**
 *  Bumping and tagging version, and pushing changes to repository.
 *
 *  You can use the following commands:
 *      gulp release --type=patch   # makes: v1.0.0 → v1.0.1
 *      gulp release --type=minor   # makes: v1.0.0 → v1.1.0
 *      gulp release --type=major   # makes: v1.0.0 → v2.0.0
 *
 *  Please read http://semver.org/ to understand which type to use.
 *
 *  The 'gulp release' task is an example of a release task for a NPM package.
 *  This task will run 'publish' as a dependent and 'bump'.
 **/


var gp_bump = require('gulp-bump');
var gp_git  = require('gulp-git');
var gp_filter = require('gulp-filter');
var argv = require('yargs')
    .option('type', {
        alias: 't',
        choices: ['patch', 'minor', 'major']
    }).argv;
var gp_tag = require('gulp-tag-version');
var gp_push = require('gulp-git-push');

function bump() {
  return src('./package.json')
    // bump package.json and bowser.json version
    .pipe(gp_bump({
        type: argv.type || 'patch'
    }))
    // save the bumped files into filesystem
    .pipe(dest('./'))
    // commit the changed files
    .pipe(gp_git.commit('bump version'))
    // filter one file
    .pipe(gp_filter('package.json'))
    // create tag based on the filtered file
    .pipe(gp_tag())
    // push changes into repository
    .pipe(gp_push({                      
        repository: 'origin',
        refspec: 'HEAD'
    }))
}



exports.sync = series(kirby, sync);
exports.dev = series(kirby, lint, sass);
exports.build = series(kirby, sass, css, lint, scripts);
exports.default = series(kirby, sass, css, lint, scripts);

exports.publish = series(kirby, sass, css, lint, scripts, bump);
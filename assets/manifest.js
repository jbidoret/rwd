/*

---------------------------------------
User settings for GUlp
---------------------------------------

*/

/* List all the JavaScript plugin files you are using in `pluginScripts`
 * to define their loading order.
 */
module.exports.pluginScripts = [
  // 'node_modules/lib/dist/lib.js',
];

/* List all the Styles plugin files you are using in `pluginStyles`
 * to define their loading order.
 */
module.exports.pluginStyles = [
  // 'node_modules/lib/css/lib.css'
];

/* List all your JavaScript file in `userScripts` to define
 * their order of concatenation.
 */
module.exports.userScripts = [
  'assets/js/notes.js',
  'assets/js/main.js',
];

/* Name your LESS config file to load.
 * Managing more than one LESS/CSS should be from @imports in LESS.
 */
module.exports.userStyles = [
  'assets/scss/main.scss'
];

/* To enable automatic reloading on .js and .less files compilation,
 * as well as other niceties from [browser sync](https://www.browsersync.io/)
 * write your local dev url in the localDevUrl variable.
 * module.exports.localDevUrl = 'http://localhost/your-project/';
 */
module.exports.localDevUrl = 'http://localhost/rwd';

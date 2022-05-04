/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './css/app.scss';
require( '@fortawesome/fontawesome-free/css/all.min.css' );
require( '@fortawesome/fontawesome-free/js/all.js' );

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
var $ = require( 'jquery' );
window.$ = window.jQuery = $;

import 'popper.js/dist/popper.js';
var util = require( 'util' ); // https://www.npmjs.com/package/util
import 'bootstrap';

import './css/topbar.css';
import './js/login.js';

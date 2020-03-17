/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

let particles;
if (typeof window == 'undefined') {
	particles = require( 'particles/particles.js');
}

//const window = global;

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
//require( 'jquery/dist/jquery.js' );
//import $ from 'jquery';

// any CSS you import will output into a single css file (app.css in this case)
require( '@fortawesome/fontawesome-free/css/all.min.css' );
require( '@fortawesome/fontawesome-free/js/all.js' );

import 'popper.js/dist/popper.js';
import 'bootstrap';
import 'bootstrap-slider';

//import Worker from 'worker-loader';
require( '../vendor/AlphaTab/swfobject.js' );
require( '../vendor/AlphaTab/AlphaTab.js' );

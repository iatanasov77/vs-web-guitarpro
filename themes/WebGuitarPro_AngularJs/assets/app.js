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

import './js/login.js';
import './js/topbar.js';

require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );
// Need copy of: jquery-easyui/images/*


// Showing the Selected Filename in File Inputs
$( '.custom-file-input' ).on( 'change', function( event )
{
    var inputFile   = event.currentTarget;
    $( inputFile ).parent()
        .find( '.custom-file-label' )
        .html( inputFile.files[0].name );
});
    
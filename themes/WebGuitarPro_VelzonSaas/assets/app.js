/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import './analytics.js';

const $ = require( 'jquery' );
window.$ = $;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

/* Require Global Application Scripts */
window.feather  = require( 'feather-icons' );
window.Waves    = require( 'node-waves' );

import SimpleBar from 'simplebar';
window.SimpleBar    = SimpleBar;

import Choices from 'choices.js';
window.Choices  = Choices;

require( './vendor/Velzon_v4.2.0/js/app.js' );
require( './vendor/Velzon_v4.2.0/js/pages/password-addon.init.js' );

require( './js/includes/main-menu-forms.js' );

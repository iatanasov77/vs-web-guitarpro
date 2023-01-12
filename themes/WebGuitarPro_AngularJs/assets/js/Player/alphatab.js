/**
 * https://alphatab.net/docs/guides/nodejs/
 */
import * as alphaTab from '@coderline/alphatab';
//const alphaTab      = require( "@coderline/alphatab" );
const baseUrl       = $( "#tablatureContainer" ).attr( 'data-base-url' );
    
const element       = $( "#alphaTab" ).get( 0 );

var alphatabApi     = new alphaTab.AlphaTabApi( element, {

    core: {
        logLevel: 'debug',
        engine: 'html5',
        tracks: 0,
        fontDirectory: baseUrl + '/build/web-guitar-pro-angularjs/font/'
    },
    display: {
        layoutMode: 'page',
        staveProfile: 'scoretab'
    },
    notation: {
        rhythmMode: 'ShowWithBars',
        elements: {
            scoreTitle: false,
            scoreSubTitle: false,
            scoreArtist: false,
            scoreAlbum: false,
            scoreWords: false,
            scoreMusic: false,
            scoreWordsAndMusic: false,
            scoreCopyright: false
        }
    },
    player: {
        enablePlayer: true,
        enableUserInteraction: true,
        enableCursor: true,
        soundFont: baseUrl + '/build/web-guitar-pro-angularjs/soundfont/sonivox.sf2'
    },
    logging: 'debug',
});
    
window.alphatabApi = global.alphatabApi = alphatabApi;


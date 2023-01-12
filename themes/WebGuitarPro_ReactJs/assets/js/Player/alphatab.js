/**
 * https://alphatab.net/docs/guides/nodejs/
 */
import * as alphaTab from '@coderline/alphatab';
//const alphaTab      = require( "@coderline/alphatab" );
const element       = $( "#alphaTab" ).get( 0 );
const songDetails   = document.querySelector( '#song-details' );

var api             = new alphaTab.AlphaTabApi( element, {

    core: {
        logLevel: 'debug',
        engine: 'html5',
        tracks: 0
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
        soundFont: $( "#alphaTab" ).attr( 'data-base-url' ) + '/build/web-guitar-pro-reactjs/soundfont/sonivox.sf2'
    },
    logging: 'debug',
});

api.scoreLoaded.on( score => {
    songDetails.querySelector( '.artist' ).innerText    = score.artist;
    songDetails.querySelector( '.title' ).innerText     = score.title;
    songDetails.querySelector( '.album' ).innerText     = score.album;
});

window.api = global.api = api;


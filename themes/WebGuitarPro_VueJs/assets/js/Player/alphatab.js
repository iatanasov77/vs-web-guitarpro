//import * as alphaTab from '@coderline/alphatab';
let alphaTab      = require( "@coderline/alphatab" );

const useCdn    = $( "#alphaTab" ).attr( 'data-use-cdn' ) == 'true' ? true : false;
if ( useCdn ) {
    alphaTab    = window.alphaTab;
}

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
        soundFont: '/build/web-guitar-pro-vuejs/soundfont/sonivox.sf2'
    },
    logging: 'debug',
});

api.scoreLoaded.on( score => {
    songDetails.querySelector( '.artist' ).innerText    = score.artist;
    songDetails.querySelector( '.title' ).innerText     = score.title;
    songDetails.querySelector( '.album' ).innerText     = score.album;
    
})
window.api = global.api = api;


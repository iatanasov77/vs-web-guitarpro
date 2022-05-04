/**
 * https://alphatab.net/docs/guides/nodejs/
 */
const alphaTab      = require( "@coderline/alphatab" );
const element       = $( "#alphaTab" ).get( 0 );
const songDetails   = document.querySelector( '#song-details' );

var api             = new alphaTab.AlphaTabApi( element, {
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
    logging: 'error',
});
api.scoreLoaded.on( score => {
    songDetails.querySelector( '.artist' ).innerText    = score.artist;
    songDetails.querySelector( '.title' ).innerText     = score.title;
    songDetails.querySelector( '.album' ).innerText     = score.album;
    
})
window.api = global.api = api;


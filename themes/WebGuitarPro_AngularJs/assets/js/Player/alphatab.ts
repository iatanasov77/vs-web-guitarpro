/**
 * https://alphatab.net/docs/guides/nodejs/
 */
const alphaTab      = require( "@coderline/alphatab" );
const baseUrl       = $( "#tablatureContainer" ).attr( 'data-base-url' );

declare var $: any;

export function alphatabApi(): any
{
    //alert( baseUrl );
    //alert( $( "#alphaTab" ).attr( 'data-base-url' ) );
    
    const element       = $( "#alphaTab" ).get( 0 );
    
    var alphatabApi     = new alphaTab.AlphaTabApi( element, {
    
        //file: $( "#tablatureContainer" ).attr( 'data-file' ),
        
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
    
    return alphatabApi;
}
//window.alphatabApi = global.alphatabApi = alphatabApi;


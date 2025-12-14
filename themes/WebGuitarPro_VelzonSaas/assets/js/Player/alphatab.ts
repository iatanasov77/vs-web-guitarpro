declare global {
    interface Window {
        alphaTab: any;
    }
}
declare var $: any;

import { LayoutMode, StaveProfile } from '@coderline/alphatab';

//import * as alphaTab from '@coderline/alphatab';
let alphaTab  = require( "@coderline/alphatab" );

const useCdn    = $( "#alphaTab" ).attr( 'data-use-cdn' ) == 'true' ? true : false;
if ( useCdn ) {
    alphaTab    = window.alphaTab;
}

export function alphatabApi(): any
{
    if ( useCdn ) {
        return alphatabApiFromCdn();
    }
    
    return alphatabApiFromNodeModules();
}

function alphatabApiFromCdn(): any
{
    const element       = $( "#alphaTab" ).get( 0 );
    
    let alphatabApi     = new alphaTab.AlphaTabApi( element, {
        core: {
            logLevel: 'debug',
            engine: 'html5',
            tracks: 0,
            fontDirectory: '/build/web-guitar-pro-velzon-saas/js/font/'
        },
        display: {
            layoutMode: LayoutMode.Page,
            staveProfile: StaveProfile.Tab
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
            soundFont: '/build/web-guitar-pro-velzon-saas/js/soundfont/sonivox.sf2'
        },
        logging: 'debug',
    });
    
    return alphatabApi;
}

function alphatabApiFromNodeModules(): any
{
    const element       = $( "#alphaTab" ).get( 0 );
    
    let alphatabApi     = new alphaTab.AlphaTabApi( element, {
        core: {
            logLevel: 'debug',
            engine: 'html5',
            tracks: 0,
        },
        display: {
            layoutMode: LayoutMode.Page,
            staveProfile: StaveProfile.Tab
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
        },
    });
    
    return alphatabApi;
}

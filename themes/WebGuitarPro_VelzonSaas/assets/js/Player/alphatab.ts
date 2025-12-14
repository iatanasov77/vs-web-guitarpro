//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bin/web-guitar-pro fos:js-routing:dump --format=json --target=public/shared_assets/js/fos_js_routes_application.json
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// var routes  = require( '../../../../../public/shared_assets/js/fos_js_routes_application.json' );
// import { VsPath } from '@@/js/includes/fos_js_routes.js';

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
    const element       = $( "#alphaTab" ).get( 0 );
    const tabId       = $( "#alphaTab" ).attr( 'data-tabId' );
    
    let alphatabApi     = new alphaTab.AlphaTabApi( element, {
        core: {
            //file: VsPath( 'tablature_read', {id: tabId}, routes ),
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

import { Component, OnInit, OnDestroy } from '@angular/core';

declare var $: any;

const alphaTab  = require( "@coderline/alphatab" );
/*
declare global {
    interface Window {
        alphaTab: any;
    }
}
*/

@Component({
    selector: 'app-player',
    templateUrl: './player.component.html',
    styleUrls: ['./player.component.scss']
})
export class PlayerComponent implements OnInit, OnDestroy
{
    alphatabApi: any;
    element: any;
    songDetails: any;

    scoreLoaded: boolean = false;
    
    constructor()
    {
        
    }
    
    ngOnInit(): void
    {
        // Change <body> styling
        document.body.classList.add( 'tablature-player' );
        
        this.element        = $( "#alphaTab" ).get( 0 );
        this.songDetails    = document.querySelector( '#song-details' );
        
        this.alphatabInit();
    }
    
    ngOnDestroy()
    {
        // Change <body> styling
        document.body.classList.remove( 'tablature-player' );
    }
    
    alphatabInit(): void
    {
        //this.alphatabApi    = new window.alphaTab.AlphaTabApi( this.element, {
        this.alphatabApi    = new alphaTab.AlphaTabApi( this.element, {
        
            core: {
                logLevel: 'debug',
                engine: 'html5',
                tracks: 0,
                fontDirectory: '/assets/alphatab/font/'
            },
            display: {
                layoutMode: 'page',
                staveProfile: 'scoretab'
            },
            notation: {
                rhythmMode: 'showwithbars',
                elements: {
                    scoreTitle: false,
                    scoreSubTitle: false,
                    scoreArtist: false,
                    scoreAlbum: false,
                    scoreWords: false,
                    scoreMusic: false,
                    scoreWordsAndMusic: false,
                    scoreCopyright: false,
                    guitarTuning: true
                }
            },
            player: {
                enablePlayer: true,
                enableUserInteraction: true,
                enableCursor: true,
                soundFont: '/assets/alphatab/soundfont/sonivox.sf2'
            },
            logging: 'debug',
        });
        
        this.alphatabApi.soundFontLoad.on( (e: any) => {
            console.log( 'soundFont Loading: Loaded(' + e.loaded + '), Total(' + e.total + ')' );
        });
        
        this.alphatabApi.soundFontLoaded.on( () => {
            console.log( 'SoundFont Loaded !!!' );
            //setLoaded( true );
        });
        
        this.alphatabApi.scoreLoaded.on( ( score: any ) => {
            console.log( 'Score Loaded !!!' );
            this.scoreLoaded    = true;
            
            this.songDetails.querySelector( '.artist' ).innerText    = score.artist;
            this.songDetails.querySelector( '.title' ).innerText     = score.title;
            this.songDetails.querySelector( '.album' ).innerText     = score.album;
        });
        
        /**
         * This event is fired when all required data for playback is loaded and ready. The player is ready for playback when 
         * all background workers are started, the audio output is initialized, a soundfont is loaded, and a song was loaded into the player as midi file.
         */
        this.alphatabApi.playerReady.on( () => {
            console.log( 'Player Ready !!!' );
        });
    }
}

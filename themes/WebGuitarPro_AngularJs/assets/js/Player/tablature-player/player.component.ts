import { Component, OnInit, OnDestroy } from '@angular/core';

import { alphatabApi } from '../alphatab'
import templateString from './player.component.html'

declare var $: any;

@Component({
    selector: 'app-player',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './player.component.html',
    
    styleUrls: []
    //styleUrls: ['./player.component.scss']
})
export class PlayerComponent implements OnInit, OnDestroy
{
    alphatabApi: any;
    songDetails: any;

    scoreLoaded: boolean = false;
    
    constructor() { }
    
    ngOnInit(): void
    {
        // Change <body> styling
        document.body.classList.add( 'tablature-player' );
        
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
        this.alphatabApi    = alphatabApi();
        
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

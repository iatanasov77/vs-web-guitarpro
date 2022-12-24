import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'play-pause-button-item',
    templateUrl: './play-pause-button-item.component.html',
    styleUrls: ['../player-controls.component.scss']
})
export class PlayPauseButtonItemComponent implements OnInit
{
    playerState?: number;
    
    @Input() player?: AlphaTabApi;
    
    constructor()
    {
        
    }
    
    ngOnInit(): void
    {
        if ( this.player ) {
            this.player.playerStateChanged.on( ( args: any ) => {
                this.playerState    = args.state;
            });
        }
    }
    
    playPause(): void
    {
        if ( ! this.playerState )
            $( '#btnPlayPause' ).addClass( 'player-control-active  -xl' );
 
        if ( this.player ) {
            this.player.playPause();
        }
    }
}

import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './play-pause-button-item.component.html'

declare var $: any;

@Component({
    selector: 'play-pause-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './play-pause-button-item.component.html',
    
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class PlayPauseButtonItemComponent implements OnInit
{
    playerState?: number;
    
    @Input() player?: AlphaTabApi;
    
    tooltipPlace: string   = "right";
    
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
    
    ngAfterViewInit(): void
    {
        let windowWidth    = $( window ).width();
        let windowHeight    = $( window ).height();
        let contentViewPort = windowHeight - 300;
        let sidebarHeight   = $( '#PlayerControls' ).height();
        
        if ( sidebarHeight > contentViewPort && windowWidth > windowHeight ) {
            this.tooltipPlace   = "bottom";
        }
        
        if ( windowWidth < windowHeight ) {
            this.tooltipPlace   = "left";
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

import { Component, Input, OnInit, OnChanges, SimpleChanges } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './play-pause-button-item.component.html'

declare var $: any;

@Component({
    selector: 'play-pause-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './play-pause-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class PlayPauseButtonItemComponent implements OnInit, OnChanges
{
    playerState?: number;
    
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
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
    
    ngOnChanges( changes: SimpleChanges ): void
    {
        if (
            changes['width'] ||
            changes['height']
        ) {
            this.recalculateGeometry();
        }
    }
    
    recalculateGeometry(): void
    {
        //alert( this.height );
        // let contentViewPort = this.height - 300;
        // let sidebarHeight   = $( '#PlayerControls' ).height();
        
        //alert( sidebarHeight );
        if ( this.width > this.height ) { // sidebarHeight > contentViewPort && 
            this.tooltipPlace   = "bottom";
        }
        
        if ( this.width < this.height ) {
            this.tooltipPlace   = "left";
        }
    }
    
    playPause(): void
    {
        if ( ! this.playerState ) {
            $( '#btnPlayPause' ).addClass( 'player-control-active  -xl' );
        }
        
        if ( this.player ) {
            this.player.playPause();
        }
    }
}

import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './metronome-button-item.component.html'

declare var $: any;

@Component({
    selector: 'metronome-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './metronome-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class MetronomeButtonItemComponent implements OnChanges
{
    metronomeVolume: number;
    
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        this.metronomeVolume   = 0;
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
    
    metronomeHandler():void
    {
        if ( this.player ) {
            this.metronomeVolume    = this.player.metronomeVolume;
            $( '#btnMetronome' ).toggleClass( 'player-control-active  -xl' );
            this.player.metronomeVolume = 1;
         
            if( this.metronomeVolume == 0 ) {
                this.player.metronomeVolume = 4;
            } else {
                this.player.metronomeVolume = 0;
            }
        }
    }
}

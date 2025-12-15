import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './looping-button-item.component.html'

declare var $: any;

@Component({
    selector: 'looping-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './looping-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class LoopingButtonItemComponent implements OnChanges
{
    loopingState: boolean;
    
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        this.loopingState   = false;
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
    
    loopingHandler(): void
    {
        if ( this.player ) {
            this.loopingState        = ! this.player.isLooping;
            
            $( '#btnLooping' ).toggleClass( "player-control-active  -xl" );
            this.player.isLooping    = this.loopingState;
        }
    }
}

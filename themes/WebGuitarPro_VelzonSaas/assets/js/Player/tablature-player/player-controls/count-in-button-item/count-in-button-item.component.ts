import { Component, Inject, Input, OnChanges, SimpleChanges  } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './count-in-button-item.component.html'

declare var $: any;

@Component({
    selector: 'count-in-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    standalone: false
})
export class CountInButtonItemComponent implements OnChanges
{
    countInVolume: number;
    
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
    constructor( @Inject( TranslateService ) private translate: TranslateService )
    {
        this.countInVolume   = 0;
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
    
    countInHandler():void
    {
        if ( this.player ) {
            this.countInVolume    = this.player.countInVolume;
            $( '#btnCountIn' ).toggleClass( 'player-control-active  -xl' );
        
            if( this.countInVolume == 0 ) {
                this.player.countInVolume = 4;
            } else {
                this.player.countInVolume = 0;
            }
        }
    }
}

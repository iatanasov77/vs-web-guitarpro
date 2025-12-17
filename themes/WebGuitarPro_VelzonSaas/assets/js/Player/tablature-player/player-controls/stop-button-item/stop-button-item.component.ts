import { Component, Inject, Input, OnChanges, SimpleChanges } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './stop-button-item.component.html'

declare var $: any;

@Component({
    selector: 'stop-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './stop-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class StopButtonItemComponent implements OnChanges
{
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
    constructor( @Inject( TranslateService ) private translate: TranslateService )
    {
        
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
    
    stop(): void
    {
        if ( this.player ) {
            this.player.stop();
        }
 
        window.scrollTo( 0, 0 );
        $( '#btnPlayPause' ).removeClass( 'player-control-active  -xl' );
    }
}

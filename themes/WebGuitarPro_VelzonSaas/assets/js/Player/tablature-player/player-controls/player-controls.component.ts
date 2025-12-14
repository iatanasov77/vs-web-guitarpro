import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './player-controls.component.html'
import cssString from './player-controls.component.scss'

declare var $: any;

@Component({
    selector: 'player-controls',
    
    template: templateString || 'Template Not Loaded !!!',
    styles: [cssString || 'Template Not Loaded !!!',],
    standalone: false
})
export class PlayerControlsComponent implements OnChanges
{
    @Input() tabId: number = 0;
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    isLoggedIn: boolean     = false;
    navClass: string        = "vertical";
    
    constructor()
    {
        let isLogged        = $( '#alphaTab' ).attr( 'data-user' );
        this.isLoggedIn     = ( String( isLogged ).toLowerCase() == "true" );
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
            this.navClass   = "horizontal";
        }
        
        if ( this.width < this.height ) {
            this.navClass   += " player-controls-mobile";
        }
    }
}

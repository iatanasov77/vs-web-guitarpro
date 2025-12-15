import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';

import templateString from './favorites-button-item.component.html'

declare var $: any;

@Component({
    selector: 'favorites-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './favorites-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class FavoritesButtonItemComponent implements OnChanges
{
    @Input() tabId: number = 0;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
    constructor() {}
    
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
    
    favoriteHandler(): void
    {
        $.get( $( '#alphaTab' ).attr( 'data-add-favorite-url' ), function( data: any ) {
            //alert('This Tab is Added To Favorite List !!!');
            console.log( 'This Tab is Added To Favorite List !!!' );
            document.location.reload();
        });
    }
}

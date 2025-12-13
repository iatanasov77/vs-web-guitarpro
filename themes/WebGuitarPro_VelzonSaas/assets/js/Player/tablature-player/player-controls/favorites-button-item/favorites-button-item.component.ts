import { Component, Input, OnInit } from '@angular/core';

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
export class FavoritesButtonItemComponent implements OnInit
{
    @Input() tabId: number = 0;
    
    tooltipPlace: string   = "right";
    
    constructor() {}
    
    ngOnInit(): void
    {
        
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
    
    favoriteHandler(): void
    {
        $.get( $( '#alphaTab' ).attr( 'data-add-favorite-url' ), function( data: any ) {
            //alert('This Tab is Added To Favorite List !!!');
            console.log( 'This Tab is Added To Favorite List !!!' );
            document.location.reload();
        });
    }
}

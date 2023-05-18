import { Component, Input, OnInit } from '@angular/core';

import templateString from './favorites-button-item.component.html'

declare var $: any;

@Component({
    selector: 'favorites-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './favorites-button-item.component.html',
    
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class FavoritesButtonItemComponent implements OnInit
{
    @Input() tabId: number = 0;
    
    constructor() {}
    
    ngOnInit(): void
    {
        
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

import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './player-controls.component.html'

declare var $: any;

@Component({
    selector: 'player-controls',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './player-controls.component.html',
    
    styleUrls: []
    //styleUrls: ['./player-controls.component.scss']
})
export class PlayerControlsComponent implements OnInit
{
    @Input() tabId: number = 0;
    @Input() player?: AlphaTabApi;
    
    isLoggedIn: boolean     = false;
    
    constructor()
    {
        let isLogged    = $( '#alphaTab' ).attr( 'data-user' );
        this.isLoggedIn = ( String( isLogged ).toLowerCase() == "true" );
    }
    
    ngOnInit(): void
    {
        
    }  
}

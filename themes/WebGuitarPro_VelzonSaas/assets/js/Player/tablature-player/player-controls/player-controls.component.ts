import { Component, Input, OnInit, EventEmitter } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './player-controls.component.html'
import cssString from './player-controls.component.scss'

declare var $: any;

@Component({
    selector: 'player-controls',
    
    template: templateString || 'Template Not Loaded !!!',
    styles: [cssString || 'Template Not Loaded !!!',]
})
export class PlayerControlsComponent implements OnInit
{
    @Input() tabId: number = 0;
    @Input() player?: AlphaTabApi;
    
    isLoggedIn: boolean     = false;
    navClass: string        = "vertical";
    
    //opts?: SlimScrollOptions;
    //scrollEvents: EventEmitter<SlimScrollEvent>;
    
    constructor()
    {
        let isLogged        = $( '#alphaTab' ).attr( 'data-user' );
        this.isLoggedIn     = ( String( isLogged ).toLowerCase() == "true" );
        
        //this.scrollEvents   = new EventEmitter<SlimScrollEvent>();
    }
    
    ngOnInit(): void
    {
        
    }
    
    ngAfterViewInit(): void
    {
        let windowHeight    = $( window ).height();
        let contentViewPort = windowHeight - 300;
        let sidebarHeight   = $( '#PlayerControls' ).height();
        
        if ( sidebarHeight > contentViewPort ) {
            this.navClass   = "horizontal";
        }
    }
}

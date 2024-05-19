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
        /*
         Should Create Horizontal Player Controlls Block on Top of Tablature,
         Because Nothing of Plugins Not Works As Expected
        */
        
        /*
        let windowHeight    = $( window ).height();
        let contentViewPort = windowHeight - 300;
        let sidebarHeight   = $( '#PlayerControls' ).height();
        
        if ( sidebarHeight > contentViewPort ) {
            $( "#PlayerControls" ).css( "height", contentViewPort );
            $( "#PlayerControls" ).css( "overflow-y", "auto" );
            $( "#PlayerControls" ).css( "overflow-x", "hidden" );
        }
        */
        
        /*
        $( '#PlayerControls' ).slimScroll({
            railVisible: false,
            alwaysVisible: false,
            color: '#ffffff',
            height: '300px',
        });
        */
    }
}

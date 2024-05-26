import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './stop-button-item.component.html'

declare var $: any;

@Component({
    selector: 'stop-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './stop-button-item.component.html',
    
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class StopButtonItemComponent implements OnInit
{
    @Input() player?: AlphaTabApi;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        
    }
    
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
    
    stop(): void
    {
        if ( this.player ) {
            this.player.stop();
        }
 
        window.scrollTo( 0, 0 );
        $( '#btnPlayPause' ).removeClass( 'player-control-active  -xl' );
    }
}

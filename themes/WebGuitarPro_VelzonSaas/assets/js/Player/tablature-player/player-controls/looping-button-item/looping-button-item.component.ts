import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './looping-button-item.component.html'

declare var $: any;

@Component({
    selector: 'looping-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './looping-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class LoopingButtonItemComponent implements OnInit
{
    loopingState: boolean;
    
    @Input() player?: AlphaTabApi;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        this.loopingState   = false;
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
    
    loopingHandler(): void
    {
        if ( this.player ) {
            this.loopingState        = ! this.player.isLooping;
            
            $( '#btnLooping' ).toggleClass( "player-control-active  -xl" );
            this.player.isLooping    = this.loopingState;
        }
    }
}

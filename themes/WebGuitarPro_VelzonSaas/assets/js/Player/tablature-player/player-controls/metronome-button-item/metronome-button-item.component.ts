import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './metronome-button-item.component.html'

declare var $: any;

@Component({
    selector: 'metronome-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './metronome-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class MetronomeButtonItemComponent implements OnInit
{
    metronomeVolume: number;
    
    @Input() player?: AlphaTabApi;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        this.metronomeVolume   = 0;
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
    
    metronomeHandler():void
    {
        if ( this.player ) {
            this.metronomeVolume    = this.player.metronomeVolume;
            $( '#btnMetronome' ).toggleClass( 'player-control-active  -xl' );
            this.player.metronomeVolume = 1;
         
            if( this.metronomeVolume == 0 ) {
                this.player.metronomeVolume = 4;
            } else {
                this.player.metronomeVolume = 0;
            }
        }
    }
}

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
    
    constructor()
    {
        
    }
    
    ngOnInit(): void
    {
        
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

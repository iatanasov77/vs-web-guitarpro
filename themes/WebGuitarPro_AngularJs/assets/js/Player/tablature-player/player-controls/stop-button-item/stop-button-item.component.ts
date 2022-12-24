import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'stop-button-item',
    templateUrl: './stop-button-item.component.html',
    styleUrls: ['../player-controls.component.scss']
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

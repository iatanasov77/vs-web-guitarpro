import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'count-in-button-item',
    templateUrl: './count-in-button-item.component.html',
    styleUrls: []
})
export class CountInButtonItemComponent implements OnInit
{
    countInVolume: number;
    
    @Input() player?: AlphaTabApi;
    
    constructor()
    {
        this.countInVolume   = 0;
    }
    
    ngOnInit(): void
    {
        
    }
    
    countInHandler():void
    {
        if ( this.player ) {
            this.countInVolume    = this.player.countInVolume;
            $( '#btnCountIn' ).toggleClass( 'player-control-active  -xl' );
        
            if( this.countInVolume == 0 ) {
                this.player.countInVolume = 4;
            } else {
                this.player.countInVolume = 0;
            }
        }
    }
}

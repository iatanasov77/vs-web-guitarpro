import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './metronome-button-item.component.html'

declare var $: any;

@Component({
    selector: 'metronome-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './metronome-button-item.component.html',
    
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class MetronomeButtonItemComponent implements OnInit
{
    metronomeVolume: number;
    
    @Input() player?: AlphaTabApi;
    
    constructor()
    {
        this.metronomeVolume   = 0;
    }
    
    ngOnInit(): void
    {
        
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

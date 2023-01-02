import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'speed-item',
    templateUrl: './speed-item.component.html',
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class SpeedItemComponent implements OnInit
{
    @Input() player?: AlphaTabApi;
    
    selectedSpeed: any = {
        value: '1',
        text: '100%'
    };
    
    speeds: Array<any>    = [
        {value: '0.25', text: '25%'},
        {value: '0.5', text: '50%'},
        {value: '0.6', text: '60%'},
        {value: '0.7', text: '70%'},
        {value: '0.8', text: '80%'},
        {value: '0.9', text: '90%'},
        {value: '1', text: '100%'},
        {value: '1.1', text: '110%'},
        {value: '1.25', text: '125%'},
        {value: '1.5', text: '150%'},
        {value: '2', text: '200%'},
    ];
    
    constructor()
    {
        
    }
    
    ngOnInit(): void
    {
        
    }

    speedHandler( speed: any, event: any ): void
    {
        if ( speed.value == this.selectedSpeed.value )
            return;

        this.selectedSpeed = speed;
        
        if ( this.player ) {
            this.player.playbackSpeed = speed.value;
        }
        
        $( '#speed-selector-value' ).text( speed.text );
        $( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
    }
}

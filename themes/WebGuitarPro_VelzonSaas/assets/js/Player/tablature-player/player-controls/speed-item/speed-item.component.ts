import { Component, Inject, Input, OnChanges, SimpleChanges } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './speed-item.component.html'

declare var $: any;

@Component({
    selector: 'speed-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './speed-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class SpeedItemComponent implements OnChanges
{
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    ddClass: string        = "player-menu-right";
    tooltipPlace: string   = "right";
    
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
    
    constructor( @Inject( TranslateService ) private translate: TranslateService )
    {
        
    }
    
    ngOnChanges( changes: SimpleChanges ): void
    {
        if (
            changes['width'] ||
            changes['height']
        ) {
            this.recalculateGeometry();
        }
    }
    
    recalculateGeometry(): void
    {
        //alert( this.height );
        // let contentViewPort = this.height - 300;
        // let sidebarHeight   = $( '#PlayerControls' ).height();
        
        //alert( sidebarHeight );
        if ( this.width > this.height ) { // sidebarHeight > contentViewPort && 
            this.tooltipPlace   = "bottom";
        }
        
        if ( this.width < this.height ) {
            this.ddClass   = "";
            this.tooltipPlace   = "left";
        }
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

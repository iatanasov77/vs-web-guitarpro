import { Component, Input, OnChanges, SimpleChanges } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './information-button-item.component.html'

declare var $: any;

@Component({
    selector: 'information-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './information-button-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class InformationButtonItemComponent implements OnChanges
{
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
    constructor()
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
            this.tooltipPlace   = "left";
        }
    }
    
    informationHandler( e: any ): void
    {
        e.preventDefault();
        
        if ( this.player && this.player.score ) {
            $( '#tabInfo' ).find( '.title' ).text( this.player.score.title );
            $( '#tabInfo' ).find( '.subTitle' ).text( this.player.score.subTitle );
            $( '#tabInfo' ).find( '.artist' ).text( this.player.score.artist );
            
            $( '#tabInfo' ).find( '.album' ).text( this.player.score.album );
            $( '#tabInfo' ).find( '.copyright' ).text( this.player.score.copyright );
            $( '#tabInfo' ).find( '.notices' ).text( this.player.score.notices );
            $( '#tabInfo' ).find( '.words' ).text( this.player.score.words );
            $( '#tabInfo' ).find( '.music' ).text( this.player.score.music );
        }
    }
}

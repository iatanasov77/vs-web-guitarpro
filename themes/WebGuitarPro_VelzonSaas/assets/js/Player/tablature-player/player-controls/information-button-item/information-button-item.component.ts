import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './information-button-item.component.html'

declare var $: any;

@Component({
    selector: 'information-button-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './information-button-item.component.html',
    
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class InformationButtonItemComponent implements OnInit
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

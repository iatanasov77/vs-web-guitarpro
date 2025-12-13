import { Component, OnInit } from '@angular/core';

import templateString from './download-button-item.component.html'

declare var $: any;

@Component({
    selector: 'download-button-item',
    template: templateString || 'Template Not Loaded !!!',
    styleUrls: [],
    standalone: false
})
export class DownloadButtonItemComponent implements OnInit
{
    tabUrl: String;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        this.tabUrl = '';
    }
    
    ngOnInit(): void
    {
        this.tabUrl = $( '#tablatureContainer' ).attr( 'data-file' );
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
    
    downloadHandler( e: any ): void
    {
        e.preventDefault();
        e.stopPropagation();
        
        window.location.href = $( '#PlayerDownloadButton' ).attr( 'href' );
    }
}

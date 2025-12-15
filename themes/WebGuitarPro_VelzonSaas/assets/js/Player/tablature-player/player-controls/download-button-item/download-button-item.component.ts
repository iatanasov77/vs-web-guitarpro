import { Component, Input, OnInit, OnChanges, SimpleChanges  } from '@angular/core';

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
    @Input() width: any;
    @Input() height: any;
    
    tabUrl: String;
    
    tooltipPlace: string   = "right";
    
    constructor()
    {
        this.tabUrl = '';
    }
    
    ngOnInit(): void
    {
        this.tabUrl = $( '#alphaTab' ).attr( 'data-file' );
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
    
    downloadHandler( e: any ): void
    {
        e.preventDefault();
        e.stopPropagation();
        
        window.location.href = $( '#PlayerDownloadButton' ).attr( 'href' );
    }
}

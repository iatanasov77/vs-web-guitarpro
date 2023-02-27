import { Component, OnInit } from '@angular/core';

import templateString from './download-button-item.component.html'

declare var $: any;

@Component({
    selector: 'download-button-item',
    template: templateString || 'Template Not Loaded !!!',
    styleUrls: []
})
export class DownloadButtonItemComponent implements OnInit
{
    tabUrl: String;
    
    constructor()
    {
        this.tabUrl = '';
    }
    
    ngOnInit(): void
    {
        this.tabUrl = $( '#tablatureContainer' ).attr( 'data-file' );
    }
    
    downloadHandler( e: any ): void
    {
        e.preventDefault();
        e.stopPropagation();
        
        window.location.href = $( '#PlayerDownloadButton' ).attr( 'href' );
    }
}

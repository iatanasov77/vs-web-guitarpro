import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './print-item.component.html'

declare var $: any;

@Component({
    selector: 'print-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './print-item.component.html',
    
    styleUrls: []
    //styleUrls: ['../player-controls.component.scss']
})
export class PrintItemComponent implements OnInit
{
    @Input() player?: AlphaTabApi;
    
    constructor()
    {
        
    }
    
    ngOnInit(): void
    {
        
    }
    
    printHandler():void
    {
        if ( this.player ) {
            this.player.print();
        }
    }
}

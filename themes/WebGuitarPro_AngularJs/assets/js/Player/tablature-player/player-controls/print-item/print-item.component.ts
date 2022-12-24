import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'print-item',
    templateUrl: './print-item.component.html',
    styleUrls: ['../player-controls.component.scss']
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

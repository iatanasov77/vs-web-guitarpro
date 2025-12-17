import { Component, Inject, Input, OnChanges, SimpleChanges } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { AlphaTabApi } from '@coderline/alphatab';

import templateString from './print-item.component.html'

@Component({
    selector: 'print-item',
    
    template: templateString || 'Template Not Loaded !!!',
    //templateUrl: './print-item.component.html',
    
    styleUrls: [],
    //styleUrls: ['../player-controls.component.scss'],
    standalone: false
})
export class PrintItemComponent implements OnChanges
{
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    tooltipPlace: string   = "right";
    
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
        if ( this.width > this.height ) { // sidebarHeight > contentViewPort && 
            this.tooltipPlace   = "bottom";
        }
        
        if ( this.width < this.height ) {
            this.tooltipPlace   = "left";
        }
    }
    
    printHandler():void
    {
        if ( this.player ) {
            this.player.print();
        }
    }
}

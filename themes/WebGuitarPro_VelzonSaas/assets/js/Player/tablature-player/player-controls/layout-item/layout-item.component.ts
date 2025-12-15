import { Component, Inject, Input, OnChanges, SimpleChanges } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { AlphaTabApi, LayoutMode, StaveProfile } from '@coderline/alphatab';

import templateString from './layout-item.component.html'

@Component({
    selector: 'layout-item',
    
    template: templateString || 'Template Not Loaded !!!',
    styleUrls: [],
    standalone: false
})
export class LayoutItemComponent implements OnChanges
{
    @Input() player?: AlphaTabApi;
    @Input() width: any;
    @Input() height: any;
    
    ddClass: string        = "player-menu-right";
    tooltipPlace: string   = "right";
    
    selectedLayout: any = {
        id: 'page',
        text: 'Page',
        layout: LayoutMode.Page,
        scrollmode: 'vertical'
    };
    
    selectedStaveprofile: any   = {
        staveprofile: StaveProfile.Tab,
        text: 'Tab',
    }
    
    layouts: Array<any>         = [
        {
            id: 'page',
            text: 'Page',
            layout: LayoutMode.Page,
            scrollmode: 'vertical',
        },
        {
            id: 'horizontalBarwise',
            text: 'Horizontal (Barwise)',
            layout: LayoutMode.Horizontal,
            scrollmode: 'horizontal-bar',
        },
        {
            id: 'horizontalOffscreen',
            text: 'Horizontal (Offscreen)',
            layout: LayoutMode.Horizontal,
            scrollmode: 'horizontal-offscreen',
        },
    ];
    
    staveprofiles: Array<any>   =  [
        {
            staveprofile: StaveProfile.Default,
            text: 'Default',
        },
        {
            staveprofile: StaveProfile.ScoreTab,
            text: 'ScoreTab',
        },
        {
            staveprofile: StaveProfile.Score,
            text: 'Score',
        },
        {
            staveprofile: StaveProfile.Tab,
            text: 'Tab',
        },
        {
            staveprofile: StaveProfile.TabMixed,
            text: 'TabMixed',
        }
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
        if ( this.width > this.height ) { // sidebarHeight > contentViewPort && 
            this.tooltipPlace   = "bottom";
        }
        
        if ( this.width < this.height ) {
            this.ddClass   = "";
            this.tooltipPlace   = "left";
        }
    }

    layoutHandler( layout: any, event: any ): void
    {
        if ( layout.id == this.selectedLayout.id )
            return;
            
        this.selectedLayout = layout;

        if ( this.player ) {
            this.player.settings.display.layoutMode = this.selectedLayout.layout;
            this.player.updateSettings();
            this.player.render();
        }
    }
    
    staveprofileHandler(  staveprofile: any, event: any  ): void
    {
        if ( staveprofile.staveprofile == this.selectedStaveprofile.staveprofile )
            return;
            
        this.selectedStaveprofile   = staveprofile;
        
        if ( this.player ) {
            this.player.settings.display.staveProfile = this.selectedStaveprofile.staveprofile;
            this.player.updateSettings();
            this.player.render();
        }
    }
}

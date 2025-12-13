import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi, LayoutMode, StaveProfile } from '@coderline/alphatab';

import templateString from './layout-item.component.html'

declare var $: any;

@Component({
    selector: 'layout-item',
    
    template: templateString || 'Template Not Loaded !!!',
    styleUrls: [],
    standalone: false
})
export class LayoutItemComponent implements OnInit
{
    @Input() player?: AlphaTabApi;
    
    ddClass: string        = "player-menu-right";
    tooltipPlace: string   = "right";
    
    selectedLayout: any = {
        id: 'page',
        text: 'Page',
        layout: LayoutMode.Page,
        scrollmode: 'vertical'
    };
    
    selectedStaveprofile: any   = {
        staveprofile: StaveProfile.ScoreTab,
        text: 'ScoreTab',
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
        //$( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
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
        //$( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
    }
}

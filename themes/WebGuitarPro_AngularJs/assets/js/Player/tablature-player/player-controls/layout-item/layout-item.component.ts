import { Component, Input, OnInit } from '@angular/core';
import { AlphaTabApi, LayoutMode, StaveProfile } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'layout-item',
    templateUrl: './layout-item.component.html',
    styleUrls: ['../player-controls.component.scss']
})
export class LayoutItemComponent implements OnInit
{
    @Input() player?: AlphaTabApi;
    
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

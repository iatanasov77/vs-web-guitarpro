import React, { useState } from 'react';
import * as alphaTab from '@coderline/alphatab';
//const alphaTab  = require( "@coderline/alphatab" );

const LayoutItem = ( {player} ) => {

    const [selectedLayout, setSelectedLayout]               = useState({
        id: 'page',
        text: 'Page',
        layout: 'page',
        scrollmode: 'vertical'
    });
    const [selectedStaveprofile, setSelectedStaveprofile]   = useState({
        staveprofile: alphaTab.StaveProfile.ScoreTab,
        text: 'ScoreTab',
    });
    
    const staveprofiles   =  [
        {
            staveprofile: alphaTab.StaveProfile.Default,
            text: 'Default',
        },
        {
            staveprofile: alphaTab.StaveProfile.ScoreTab,
            text: 'ScoreTab',
        },
        {
            staveprofile: alphaTab.StaveProfile.Score,
            text: 'Score',
        },
        {
            staveprofile: alphaTab.StaveProfile.Tab,
            text: 'Tab',
        },
        {
            staveprofile: alphaTab.StaveProfile.TabMixed,
            text: 'TabMixed',
        }
    ];
    
    const layouts         = [
        {
            id: 'page',
            text: 'Page',
            layout: alphaTab.LayoutMode.Page,
            scrollmode: 'vertical',
        },
        {
            id: 'horizontalBarwise',
            text: 'Horizontal (Barwise)',
            layout: alphaTab.LayoutMode.Horizontal,
            scrollmode: 'horizontal-bar',
        },
        {
            id: 'horizontalOffscreen',
            text: 'Horizontal (Offscreen)',
            layout: alphaTab.LayoutMode.Horizontal,
            scrollmode: 'horizontal-offscreen',
        },
    ];
    
    function setLayout( layout, event )
    {
        if ( layout.id == selectedLayout.id )
            return;
            
        setSelectedLayout( layout );

        player.settings.display.layoutMode = selectedLayout.layout;
        player.updateSettings();
        player.render();
        
        //$( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
    }
    
    function setStaveprofile(  staveprofile, event  )
    {
        if ( staveprofile.staveprofile == selectedStaveprofile.staveprofile )
            return;
            
        setSelectedStaveprofile( staveprofile );
         
        player.settings.display.staveProfile = selectedStaveprofile.staveprofile;
        player.updateSettings();
        player.render();
        
        //$( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
    }


    const layoutsList = layouts.map( ( layout, index ) => (
        <li key={index} className={`${layout.id == selectedLayout.id ? "active" : ""}`}
            onClick={ event => setLayout( layout, event ) }
        >{ layout.text }</li>
    ));
    
    const staveprofilesList = staveprofiles.map( ( staveprofile, index ) => (
        <li key={index} className={`${staveprofile.staveprofile == selectedStaveprofile.staveprofile ? "active" : ""}`}
            onClick={ event => setStaveprofile( staveprofile, event ) }
        >{ staveprofile.text }</li>
    ));
    
    return (
        <div className="player-controls__item">
            <svg className="icon dropdown-toggle" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <use xlinkHref="#icon-layout"></use>
            </svg>
            <div className="dropdown-menu dropdown-menu-right dropright dropup dropdown-layers player-menu-right">
                <div id="layoutSelector" className="dropdown-menu-background">
                
                    <div style={{fontWeight: "bold", paddingLeft: "10px"}}>Layout</div>
                    <ul>{ layoutsList }</ul>
                    
                    <div style={{fontWeight: "bold", paddingLeft: "10px"}}>Stave Profile</div>
                    <ul>{ staveprofilesList }</ul>
                    
                </div>
            </div>
        </div>
    );
}

export default LayoutItem;

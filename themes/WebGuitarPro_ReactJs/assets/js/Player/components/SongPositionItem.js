import React, { useState } from 'react';

const SongPositionItem = ( {player} ) => {

    const [strCurrentTime, setStrCurrentTime]   = useState( '00:00' );
    const [strEndTime, setStrEndTime]           = useState( '00:00' );
    
    const panelStyle = {
        margin: "0 0 15px 0",
        padding: "5px 10px"
    };
    
    const panelTextStyle = {
        fontSize: "12px",
        fontWeight: "bold",
        whiteSpace: "nowrap"
    };
    
    function formatDuration( milliseconds )
    {
        let seconds     = milliseconds / 1000;
        const minutes   = ( seconds / 60 ) | 0;
        seconds         = ( seconds - minutes * 60 ) | 0;
        return (
            String( minutes ).padStart( 2, "0" ) +
            ":" +
            String( seconds ).padStart( 2, "0" )
        );
    }

    player.playerPositionChanged.on( ( e ) => {
        setStrCurrentTime( formatDuration( e.currentTime ) );
        setStrEndTime( formatDuration( e.endTime ) );
    });
    
    return (
        <div className="displayPanel" style={panelStyle}>
            <div id="song-position" style={panelTextStyle}>{strCurrentTime} / {strEndTime}</div>
        </div>
    );
}

export default SongPositionItem;

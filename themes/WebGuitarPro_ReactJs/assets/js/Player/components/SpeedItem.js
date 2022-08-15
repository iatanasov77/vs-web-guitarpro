import React from 'react';

const SpeedItem = ( {player} ) => {

    const speeds    = [
        {value: '0.25', text: '25%'},
        {value: '0.5', text: '50%'},
        {value: '0.6', text: '60%'},
        {value: '0.7', text: '70%'},
        {value: '0.8', text: '80%'},
        {value: '0.9', text: '90%'},
        {value: '1', text: '100%'},
        {value: '1.1', text: '110%'},
        {value: '1.25', text: '125%'},
        {value: '1.5', text: '150%'},
        {value: '2', text: '200%'},
    ];
    
    function setSpeed( speed, event ) {
        player.playbackSpeed = speed.value;
        $( '#speed-selector-value' ).text( speed.text );
        
        $( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
    }
        
    const speedElements = speeds.map( ( speed, index ) => (
        <li key={index} className="active" onClick={ event => setSpeed( speed, event ) }>{ speed.text }</li>
    ));
    
    return (
        <div className="player-controls__item">
            <svg className="icon dropdown-toggle player-button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <use xlinkHref="#speed-selector"></use>
            </svg>
            <div className="dropdown-menu dropdown-menu-right player-menu-right">
                <div id="speedSelector" className="dropdown-menu-background">
                    <ul>
                        { speedElements }
                    </ul>
                </div>
            </div>
        </div>
    );
}

export default SpeedItem;

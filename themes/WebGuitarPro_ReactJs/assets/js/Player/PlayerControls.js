import React, { useEffect, useState } from 'react';

import InformationItem from './components/InformationItem';
import LayoutItem from './components/LayoutItem';
import PrintItem from './components/PrintItem';
import SongPositionItem from './components/SongPositionItem';
import SpeedItem from './components/SpeedItem';
import TracksItem from './components/TracksItem';

const PlayerControls = ( {player, logged} ) => {
    const [playerScoreLoaded, setPlayerScoreLoaded] = useState( false );
    const [playerState, setPlayerState]             = useState( null );
    const [loopingState, setLoopingState]           = useState( null );
    
    let metronomeVolume = null;
    let countInVolume   = null;
    
    useEffect(() => {
        player.playerStateChanged.on( ( args ) => {
            setPlayerState( args.state );
        });
        
        player.scoreLoaded.on( score => {
            setPlayerScoreLoaded( true );
        });
    }, []);
        
    function playPause() {
        if ( ! playerState )
            $( '#btnPlayPause' ).addClass( 'player-control-active  -xl' );
 
        player.playPause();
    }
 
    function stop() {
        player.stop();
 
        $( '#btnPlayPause' ).removeClass( 'player-control-active  -xl' );
    }
    
    function metronome() {
        metronomeVolume    = player.metronomeVolume;
        $( '#btnMetronome' ).toggleClass( 'player-control-active  -xl' );
        player.metronomeVolume = 1;
     
        if( metronomeVolume == 0 ) {
            player.metronomeVolume = 4;
        } else {
            player.metronomeVolume = 0;
        }
    }

    function countIn() {
        countInVolume    = player.countInVolume;
        $( '#btnCountIn' ).toggleClass( 'player-control-active  -xl' );
    
        if( countInVolume == 0 ) {
            player.countInVolume = 4;
        } else {
            player.countInVolume = 0;
        }
    }

    function favorite() {         
        $.get( $( '#alphaTab' ).attr( 'data-add-favorite-url' ), function( data ) {
            //alert('This Tab is Added To Favorite List !!!');
            console.log( 'This Tab is Added To Favorite List !!!' );
            document.location.reload();
        });
    }
    
    function loopingHandler() {
        setLoopingState( ! player.isLooping );

        $( '#btnLooping' ).toggleClass( "player-control-active  -xl" );
        player.isLooping    = loopingState;
    }
    
    return (
        <nav id="sidebar" className="sidebar active">
    
            {/* Display Song Position */}
            <SongPositionItem player={player} />
            
            <div className="player-controls displayPanel" style={{padding: "5px 10px"}}>
                
                {/* PlayPause Button */}
                <div id="btnPlayPause" className="player-controls__item" onClick={playPause}>
                    <svg className="icon" style={{fontSize: "50px"}}>
                        { ( playerState == 1 ) ? (
                            <use xlinkHref="#icon-pause-litle"></use>
                        ) : (
                            <use xlinkHref="#icon-play-litle"></use>
                        ) }
                    </svg>
                </div>
      
                {/* Stop Button */}
                <div id="btnStop" className="player-controls__item" onClick={stop}>
                    <svg className="icon"><use xlinkHref="#icon-stop-new"></use></svg>
                </div>
                
                {/* Looping Button */}
                <div id="btnLooping" className="player-controls__item" onClick={loopingHandler}>
                    <svg className="icon" style={{fontSize: "50px"}}>
                        <use xlinkHref="#icon-looping"></use>
                    </svg>
                </div>
                
                {/* Metronome Button */}
                <div id="btnMetronome" className="player-controls__item" onClick={metronome}>
                    <svg className="icon" style={{fontSize: "50px"}}>
                        <use xlinkHref="#icon-metronome"></use>
                    </svg>
                </div>
                 
                <div id="btnCountIn" className="player-controls__item" onClick={countIn}>
                    <svg className="icon" style={{fontSize: "50px"}}>
                        <use xlinkHref="#icon-countin"></use>
                    </svg>
                </div>
                
                {/* Tracks Button */}
                { ( playerScoreLoaded ) ? (
                    <TracksItem player={player} />
                ) : '' }
                
                {/* Speed Button */}
                <SpeedItem player={player} />
                
                {/* Layout Button */}
                <LayoutItem player={player} />
                
                {/* Print Button */}
                <PrintItem player={player} />
                
                {/* Add to Favorites Button */}
                { ( logged ) ? (
                    <div className="player-controls__item favorite" onClick={favorite}>
                        <svg className="icon">
                            <use xlinkHref="#icon-heart"></use>
                        </svg>
                    </div>
                ) : '' }
                
                {/* Tablature Information Button */}
                <InformationItem player={player} />
                
            </div>
        </nav>
    );
}

export default PlayerControls;

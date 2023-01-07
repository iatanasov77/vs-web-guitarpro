import React, { useState, useEffect } from 'react';
import ReactBootstrapSlider from 'react-bootstrap-slider';

import { TrackActions } from '../Constants';

const TracksItem = ( {player} ) => {

    const [trackVolumes, setTrackVolumes] = useState( [] );
    
    let soloTracks  = [];
    let muteTracks  = [];

    useEffect( () => {
        /** 
         * Setup First Track
         */
        var firstTrack  = $( '#trackList' ).children().first();
        firstTrack.find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
        
        let tv  = [];
        player.score.tracks.forEach( track => {
            tv[track.index] = track.playbackInfo.volume;
        });
        setTrackVolumes( tv );
        
    }, [] );
    
    function resetElements()
    {
        $( '#trackList' ).each( function() {
            $( this ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).removeClass( 'fa-eye' ).addClass( 'fa-eye-slash' );
        });
    }
    
    /*
     * Track Event Handlers
     */
    function onClickTrackTitle( trackIndex, event )
    {
        event.preventDefault();
        
        var track   = player.score.tracks[trackIndex];
        player.renderTracks( [track] );
        
        resetElements();
        if ( $( event.target ).html().length ) {
            var showElement = $( event.target ).find( '.showHide' );
        } else {
            var showElement = $( event.target ).parent().find( '.showHide' );
        } 
        showElement.removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
    }
    
    function onClickTrackSoloMute( action, trackIndex, event )
    {
        var previousState   = Boolean( $( event.target ).data( 'waschecked' ) );
        $( event.target ).data( 'waschecked', ! previousState );
        $( event.target ).prop( "checked", ! previousState );

        soloTracks = soloTracks.filter( el => el.index !== trackIndex );
        muteTracks = muteTracks.filter( el => el.index !== trackIndex );
        
        if ( action == TrackActions.solo ) {
            if ( $( event.target ).prop( "checked" ) ) {
                soloTracks.push( player.score.tracks[trackIndex] );
            } else {
                player.changeTrackSolo( [player.score.tracks[trackIndex]], false );
            }
            
            player.changeTrackSolo( soloTracks, true );
            player.changeTrackMute( soloTracks, false );
        } else if ( action == TrackActions.mute ) {
            if ( $( event.target ).prop( "checked" ) ) {
                muteTracks.push( player.score.tracks[trackIndex] );
            } else {
                player.changeTrackMute( [player.score.tracks[trackIndex]], false );
            }
            
            player.changeTrackMute( muteTracks, true );
            player.changeTrackSolo( muteTracks, false );
        }
    }
    
    function onChangeTrackVolume( trackIndex, event )
    {    
        //alert( 'Track Index: ' + trackIndex + '<br>Volume Value: ' + event.target.value );
        
        let tv  = trackVolumes;
        tv[trackIndex]  = event.target.value;
        setTrackVolumes( tv );
        player.changeTrackVolume(
            [ player.score.tracks[trackIndex] ],
            event.target.value / player.score.tracks[trackIndex].playbackInfo.volume
        );
    }
    
    // Track Elements
    const trackElements = player.score.tracks.map( ( track, index ) => (
        <div key={index} className="track" data-track="index">
            <div className="title trackTitle" onClick={ event => onClickTrackTitle( track.index, event ) }>
                <i className="fa fa-eye-slash mr-2 showHide"></i>
                { track.name }
            </div>
            <div className="btn-group btn-group-xs">
                <div className="form-check">
                    <input type="radio" name={ `track-solo-mute-${track.index}` }
                        data-waschecked="false"
                        className="mr-2"
                        id={ `solo-${track.index}` }
                        onClick={ event => onClickTrackSoloMute( TrackActions.solo, track.index, event ) }
                    />
                    <label className="form-check-label" htmlFor={ `solo-${track.index}` }>Solo</label>
                </div>&nbsp;&nbsp;
                <div className="form-check">
                    <input type="radio" name={ `track-solo-mute-${track.index}` }
                        data-waschecked="false"
                        className="mr-2"
                        id={ `mute-${track.index}` }
                        onClick={ event => onClickTrackSoloMute( TrackActions.mute, track.index, event ) }
                    />
                    <label className="form-check-label" htmlFor={ `mute-${track.index}` }>Mute</label>
                </div>
            </div>
            
            {/* https://www.npmjs.com/package/react-bootstrap-slider */}
            <div className="mt-3">
                { trackVolumes.length > 0 &&
                    <ReactBootstrapSlider isLoggedIn={false}
                        value={ trackVolumes[track.index] }
                        change={ event => onChangeTrackVolume( track.index, event ) }
                        
                        step={1}
                        min={0}
                        max={16}
                    />
                }
            </div>
        
        </div>
    ));
    
    /* Manual:
        https://alphatab.net/docs/tutorial-web/track-selector/
        https://www.alphatab.net/docs/reference/api/changetracksolo/
    */
    return (
        
        <div className="player-controls__item">
            <svg className="icon dropdown-toggle" data-bs-toggle="dropdown" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                <use xlinkHref='#icon-guitar' />
            </svg>
            <div className="dropdown-menu dropdown-menu-right player-menu-right" role="menu" aria-labelledby="dLabel">
                <div id="trackList" className="dropdown-menu-background scrollable-menu-side">
                    { trackElements }
                </div>
            </div>
        </div>
    );
}

export default TracksItem;

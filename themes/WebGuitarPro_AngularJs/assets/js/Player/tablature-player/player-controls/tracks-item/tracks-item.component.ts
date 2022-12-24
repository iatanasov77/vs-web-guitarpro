import { Component, Input, OnInit, Inject } from '@angular/core';
import { DOCUMENT } from '@angular/common';
import { AlphaTabApi } from '@coderline/alphatab';

declare var $: any;

@Component({
    selector: 'tracks-item',
    templateUrl: './tracks-item.component.html',
    styleUrls: ['../player-controls.component.scss']
})
export class TracksItemComponent implements OnInit
{
    @Input() player?: AlphaTabApi;
    
    scoreTracks: Array<any>    = [];
    
    soloTracks: Array<any>    = [];
    muteTracks: Array<any>    = [];
    
    constructor( @Inject(DOCUMENT) private document: Document )
    {
        
    }
    
    ngOnInit(): void
    {
        if ( this.player && this.player.score ) {
            this.scoreTracks    = this.player.score.tracks;
        }
    }
    
    ngAfterViewInit(): void
    {
        /** 
         * Setup First Track
         */
        let firstTrack  = $( '#trackList' ).children().first();
        firstTrack.find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
        
        /**
         * Dont Close TrackList Dropdown on Sliding Volume Control
         */
        $( '#trackList' ).on( 'click', '.slider', function ( e: any )
        {
            e.preventDefault();
            e.stopPropagation();
        });
    }
    
    resetElements(): void
    {
        if ( this.document ) {
            let trlElement  = this.document.getElementById( "trackList" );
            if ( trlElement ) {
                Array.from( trlElement.childNodes ).forEach( function( item )
                {
                    $( item ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).removeClass( 'fa-eye' ).addClass( 'fa-eye-slash' );
                    
                });
            }
        }
    }
    
    clickTrackTitleHandler( track: any, event: any ): void
    {
        event.preventDefault();
        
        if ( this.player && this.player.score ) {
            this.player.renderTracks( [track] );
            
            this.resetElements();
            if ( $( event.target ).html().length ) {
                var showElement = $( event.target ).find( '.showHide' );
            } else {
                var showElement = $( event.target ).parent().find( '.showHide' );
            } 
            showElement.removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
        }
    }
    
    clickTrackSoloMuteHandler( action: any, track: any, event: any ): void
    {
        var previousState   = Boolean( $( event.target ).data( 'waschecked' ) );
        $( event.target ).data( 'waschecked', ! previousState );
        $( event.target ).prop( "checked", ! previousState );

        this.soloTracks = this.soloTracks.filter( el => el.index !== track.index );
        this.muteTracks = this.muteTracks.filter( el => el.index !== track.index );
        
        if ( this.player && this.player.score ) {
            if ( action == 'solo' ) {
                if ( $( event.target ).prop( "checked" ) ) {
                    this.soloTracks.push( track );
                } else {
                    this.player.changeTrackSolo( [track], false );
                }
                
                this.player.changeTrackSolo( this.soloTracks, true );
                this.player.changeTrackMute( this.soloTracks, false );
            } else if ( action == 'mute' ) {
                if ( $( event.target ).prop( "checked" ) ) {
                    this.muteTracks.push( track );
                } else {
                    this.player.changeTrackMute( [track], false );
                }
                
                this.player.changeTrackMute( this.muteTracks, true );
                this.player.changeTrackSolo( this.muteTracks, false );
            }
        }
    }
    
    changeTrackVolumeHandler( track: any, event: any ): void
    {
        if ( this.player && this.player.score ) {
            //console.log( event );
            this.player.changeTrackVolume(
                [ track ],
                event / 16
            );
        }
    }
}

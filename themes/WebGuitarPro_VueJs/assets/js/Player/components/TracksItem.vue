<template>
    <!--
        Manual: https://alphatab.net/docs/tutorial-web/track-selector/
                https://www.alphatab.net/docs/reference/api/changetracksolo/
    -->
    <div class="player-controls__item">
        <svg class="icon dropdown-toggle" data-bs-toggle="dropdown" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
            <use xlink:href="#icon-guitar"></use>
        </svg>
        <div class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dLabel">
            <div id="trackList" class="dropdown-menu-background scrollable-menu-side">
                <div class="track" v-for="(track, index) in this.$parent.player.score.tracks" :data-track="index">
                
                    <!-- Track Item Start -->
                    <div class="title" v-on:click.stop="onClickTrackTitle( track.index, $event )">
                        <i class="fa fa-eye-slash showHide"></i>{{ track.name }}
                    </div>
                    <div class="btn-group btn-group-xs">
                        <div class="form-check">
                            <input type="checkbox"
                                :class="'track-solo-mute-' + track.index"
                                :id="'solo-' + track.index"
                                v-on:click="onClickTrackSolo( track.index, $event )"
                            />
                            <label class="form-check-label" :for="'solo-' + track.index">Solo</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check">
                            <input type="checkbox"
                                :class="'track-solo-mute-' + track.index"
                                :id="'mute-' + track.index"
                                v-on:click="onClickTrackMute( track.index, $event )"
                            />
                            <label class="form-check-label" :for="'mute-' + track.index">Mute</label>
                        </div>
                    </div>
                    <b-form-slider ref="mySlider" :step=1 :min=0 :max=16 :value="track.playbackInfo.volume" @slide-stop="onChangeTrackVolume( track.index, $event )"></b-form-slider>
                    <!-- Track Item End -->
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import bFormSlider from 'vue-bootstrap-slider/es/form-slider';

export default {
    name: 'tracks-item',
    components: {
        'b-form-slider': bFormSlider
    },
    props: {
        tracks: Array,
    },
    data () {
        return {
            soloTracks: [],
            muteTracks: [],
        }
    },
    methods: {
        resetElements: function() {
            $( '#trackList' ).each( function() {
                $( this ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).removeClass( 'fa-eye' ).addClass( 'fa-eye-slash' );
            });
        },
        
        /*
         * Track Event Handlers
         */
        onClickTrackTitle: function( trackIndex, event ) {
            if ( event ) {
                event.preventDefault()
            }
            
            //console.log( this.$parent.player );
            var track   = this.$parent.player.score.tracks[trackIndex];
            this.$parent.player.renderTracks( [track] );
            
            this.resetElements();
            $( event.target ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
        },
        
        onClickTrackSolo: function( trackIndex, event ) {
            $( '.track-solo-mute-' + trackIndex ).not( $( event.target ) ).prop( "checked", false );
            var trackSoloState  = $( event.target ).prop( "checked" );
            
            const obj       = { key: trackIndex, value: this.$parent.player.score.tracks[trackIndex] };
            this.soloTracks = this.soloTracks.filter( el => el.key !== trackIndex );
            this.muteTracks = this.muteTracks.filter( el => el.key !== trackIndex );
            if ( trackSoloState ) {
                this.soloTracks.push( obj );
            }
            
            const pluck = ( arr, key ) => arr.map( i => i[key] );
            this.$parent.player.changeTrackSolo( pluck( this.soloTracks, 'value' ), true );
            this.$parent.player.changeTrackMute( pluck( this.soloTracks, 'value' ), false );
        },
        
        onClickTrackMute: function( trackIndex, event ) {
            $( '.track-solo-mute-' + trackIndex ).not( $( event.target ) ).prop( "checked", false );
            var trackMuteState  = $( event.target ).prop( "checked" );
            
            const obj       = { key: trackIndex, value: this.$parent.player.score.tracks[trackIndex] };
            this.soloTracks = this.soloTracks.filter( el => el.key !== trackIndex );
            this.muteTracks = this.muteTracks.filter( el => el.key !== trackIndex );
            if ( trackMuteState ) {
                this.muteTracks.push( obj );
            }
            
            const pluck = ( arr, key ) => arr.map( i => i[key] );
            this.$parent.player.changeTrackMute( pluck( this.muteTracks, 'value' ), true );
            this.$parent.player.changeTrackSolo( pluck( this.muteTracks, 'value' ), false );
        },
        
        onChangeTrackVolume: function( trackIndex, volumeValue ) {
            //alert( 'Track Index: ' + trackIndex + '<br>Volume Value: ' + volumeValue );
            this.$parent.player.changeTrackVolume( [ this.tracks[trackIndex] ], volumeValue );
        },
    },
    
    /**
     * https://stackoverflow.com/questions/41065194/how-to-implement-a-function-when-a-component-is-created-in-vue
     */
    created: function () {
        
    },
    mounted: function () {
        /** 
         * Setup First Track
         */
        var firstTrack  = $( '#trackList' ).children().first();
        firstTrack.find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
    },
}
</script>

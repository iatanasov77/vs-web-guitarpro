<template>
    <!--
        Manual: https://alphatab.net/docs/tutorial-web/track-selector/
                https://www.alphatab.net/docs/reference/api/changetracksolo/
    -->
    <div class="player-controls__item">
        <svg class="icon dropdown-toggle" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
            <use xlink:href="#icon-guitar"></use>
        </svg>
        <div class="dropdown-menu dropdown-menu-right player-menu-right" role="menu" aria-labelledby="dLabel">
            <div id="trackList" class="dropdown-menu-background scrollable-menu-side">
                <div class="track" v-for="(track, index) in this.$parent.player.score.tracks" :data-track="index">
                
                    <!-- Track Item Start -->
                    <div class="title mb-3" v-on:click.stop="onClickTrackTitle( track.index, $event )">
                        <i class="fa fa-eye-slash showHide"></i>{{ track.name }}
                    </div>
                    <div class="btn-group btn-group-xs">
                        <div class="form-check">
                            <input type="radio" :name="'track-solo-mute-' + track.index"
                                data-waschecked="false"
                                class="mr-2"
                                :id="'solo-' + track.index"
                                v-on:click="onClickTrackSoloMute( 'solo', track.index, $event )"
                            />
                            <label class="form-check-label" :for="'solo-' + track.index">Solo</label>
                        </div>&nbsp;&nbsp;
                        <div class="form-check">
                            <input type="radio" :name="'track-solo-mute-' + track.index"
                                data-waschecked="false"
                                class="mr-2"
                                :id="'mute-' + track.index"
                                v-on:click="onClickTrackSoloMute( 'mute', track.index, $event )"
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
            if ( $( event.target ).html().length ) {
                var showElement = $( event.target ).find( '.showHide' );
            } else {
                //var showElement = $( event.target ).parent().find( '.showHide' );
                var showElement = $( event.target ).parent();
            } 
            showElement.removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
        },
        
        onClickTrackSoloMute: function( action, trackIndex, event )
        {
            var previousState   = Boolean( $( event.target ).data( 'waschecked' ) );
            $( event.target ).data( 'waschecked', ! previousState );
            $( event.target ).prop( "checked", ! previousState );
    
            this.soloTracks = this.soloTracks.filter( el => el.index !== trackIndex );
            this.muteTracks = this.muteTracks.filter( el => el.index !== trackIndex );
            
            if ( action == 'solo' ) {
                if ( $( event.target ).prop( "checked" ) ) {
                    this.soloTracks.push( this.$parent.player.score.tracks[trackIndex] );
                } else {
                    this.$parent.player.changeTrackSolo( [this.$parent.player.score.tracks[trackIndex]], false );
                }
                
                this.$parent.player.changeTrackSolo( this.soloTracks, true );
                this.$parent.player.changeTrackMute( this.soloTracks, false );
            } else if ( action == 'mute' ) {
                if ( $( event.target ).prop( "checked" ) ) {
                    this.muteTracks.push( this.$parent.player.score.tracks[trackIndex] );
                } else {
                    this.$parent.player.changeTrackMute( [this.$parent.player.score.tracks[trackIndex]], false );
                }
                
                this.$parent.player.changeTrackMute( this.muteTracks, true );
                this.$parent.player.changeTrackSolo( this.muteTracks, false );
            }
        },
        
        onChangeTrackVolume: function( trackIndex, volumeValue ) {
            //alert( 'Track Index: ' + trackIndex + '<br>Volume Value: ' + volumeValue );
            this.$parent.player.changeTrackVolume(
                [ this.tracks[trackIndex] ],
                volumeValue / this.$parent.player.score.tracks[trackIndex].playbackInfo.volume
            );
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

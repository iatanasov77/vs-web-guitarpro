<template>    
    <div class="displayPanel" style="margin: 0 0 15px 0; padding: 5px 10px;">
        <div id="song-position" style="font-size: 12px; font-weight: bold; white-space: nowrap;">00:00 / 00:00</div>
    </div>
</template>

<script>
export default {
    name: 'song-position-item',
    data () {
        return {
            previousTime: -1,
        }
    },
    methods: {
        formatDuration:  function( milliseconds ) {
            let seconds     = milliseconds / 1000;
            const minutes   = ( seconds / 60 ) | 0;
            seconds         = ( seconds - minutes * 60 ) | 0;
            return (
                String( minutes ).padStart( 2, "0" ) +
                ":" +
                String( seconds ).padStart( 2, "0" )
            );
        },
      
        onPlayerPositionChanged:  function( currentTime, endTime ) {
            // reduce number of UI updates to second changes.
            const currentSeconds = ( currentTime / 1000 ) | 0;
            if ( currentSeconds == this.previousTime ) {
                return;
            }
    
            $( '#song-position' ).text( this.formatDuration( currentTime ) + " / " + this.formatDuration( endTime ) );
        },
    },
    created() {
        this.$parent.player.playerPositionChanged.on( (e) => {
            this.onPlayerPositionChanged( e.currentTime, e.endTime );
        });
    },
}
</script>

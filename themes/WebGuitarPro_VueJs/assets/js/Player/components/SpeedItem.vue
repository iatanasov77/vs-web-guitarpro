<template>    
    <div class="player-controls__item">
        <svg class="icon dropdown-toggle player-button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
            <use xlink:href="#speed-selector"></use>
        </svg>
        <div class="dropdown-menu dropdown-menu-right player-menu-right">
            <div id="speedSelector" class="dropdown-menu-background">
                <ul>
                    <li class="active"
                        v-for="(speed, index) in this.speeds"
                        v-on:click.stop="setSpeed( speed, $event )"
                    >{{ speed.text }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'speed-item',
    data () {
        return {
            speeds: [
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
            ],
        }
    },
    methods: {
        setSpeed:  function( speed, event ) {
            this.$parent.player.playbackSpeed = speed.value;
            $( '#speed-selector-value' ).text( speed.text );
            
            $( event.target ).closest( ".dropdown-menu" ).toggleClass( 'show' );
        },
    },
}
</script>

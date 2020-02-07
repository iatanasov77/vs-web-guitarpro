var playerControls	= new Vue({
	el: "#player-controls",
	
	data() {
		return {
			player: null,
			
			playerState: null,
			loopingState: null,
			metronomeVolume: null,
		};
	},
	
	methods: {
		playPause() {
			if ( ! this.playerState )
				$( '#btnPlayPause' ).addClass( 'player-control-active  -xl' );
			
			this.player.alphaTab( 'playPause' );
		},
    
		stop() {
			this.player.alphaTab( 'stop' );
			
			$( '#btnPlayPause' ).removeClass( 'player-control-active  -xl' );
		},
		
		speed() {
			var playbackSpeed	= $( this ).data( 'value' );
			this.player.alphaTab( 'playbackSpeed', playbackSpeed );
		    $( '#playbackSpeed' ).text( $( this ).text() );
		},
		
		looping() {
			this.loopingState = ! this.player.alphaTab( 'loop' );
			this.player.alphaTab( 'loop', this.loopingState );
			
			if( this.loopingState ) {
		    	$( '#btnLooping' ).addClass( 'player-control-active  -xl' );
		    }
		    else {
		    	$( '#btnLooping' ).removeClass( 'player-control-active  -xl' );
		    }
		},
		
		metronome() {
			this.metronomeVolume = this.player.alphaTab( 'metronomeVolume' );
			
		    if( this.metronomeVolume == 0 ) {
		    	this.player.alphaTab( 'metronomeVolume', 4 );
		        $( '#btnMetronome' ).addClass( 'player-control-active  -xl' );
		    }
		    else {
		    	this.player.alphaTab( 'metronomeVolume', 0 );
		        $( '#btnMetronome' ).removeClass( 'player-control-active  -xl' );
		    }
		},
		
		print() {
			this.player.alphaTab( 'print' );
		},
		
		favorite() {
			$.get( $( '#add-favorite-url' ).data( 'url' ), function( data ) {
				alert('READY');
				//document.location.reload();
			});
		}
	},
	created() {
		this.player	= $( '#alphaTab' );
		this.player.alphaTab();
	  }
});


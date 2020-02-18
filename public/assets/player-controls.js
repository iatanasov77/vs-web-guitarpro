
function createTrack( scoreTrack )
{
	return `
	<div class="track" data-track="${scoreTrack.Index}">
		<div class="title" v-on:click="onClickTrackTitle"><i class="fa fa-eye-slash showHide"></i>${scoreTrack.Name}</div>
		<div class="btn-group btn-group-xs">

			<button type="button" class="btn btn-default solo" v-on:click="onClickTrackSolo">Solo</button>
			<button type="button" class="btn btn-default mute" v-on:click="onClickTrackMute">Mute</button>

			<!--
			<button type="button" class="btn btn-default solo" v-on:click="onClickTrackSolo">
				<svg class="icon"><use xlink:href="#icon-solo"></use></svg>
			</button>
			<button type="button" class="btn btn-default mute" v-on:click="onClickTrackMute">
				<svg class="icon"><use xlink:href="#icon-mute"></use></svg>
			</button>
			-->
		</div>
		<input id="volume-${scoreTrack.Index}" type="text" />
	</div>
	<script>
		$( "#volume-${scoreTrack.Index}" ).slider({ min: 0, max: 16, step: 1, value: ${scoreTrack.PlaybackInfo.Volume}, handle: "square" });
	</script>
	`;
}

var playerControls	= new Vue({
	delimiters: ['${', '}'],
	el: "#player-controls",
	
	data() {
		return {
			player: null,
			playerState: null,
			loopingState: null,
			metronomeVolume: null,
			
			selectedLayout: null,
			selectedSpeed: null,
			
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
			
			layouts: [
				{
					id: 'page',
					text: 'Page',
					layout: 'page',
					scrollmode: 'vertical',
				},
				{
					id: 'horizontalBarwise',
					text: 'Horizontal (Barwise)',
					layout: 'horizontal',
					scrollmode: 'horizontal-bar',
				},
				{
					id: 'horizontalOffscreen',
					text: 'Horizontal (Offscreen)',
					layout: 'horizontal',
					scrollmode: 'horizontal-offscreen',
				},
			],
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
			var playbackSpeed	= event.target.getAttribute('data-value');
			this.player.alphaTab( 'playbackSpeed', playbackSpeed );
			
		    $( '#speed-selector-value' ).text( event.target.getAttribute('data-text') );
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
		    	alert(this.metronomeVolume);
		    	this.player.alphaTab( 'metronomeVolume', 0 );
		        $( '#btnMetronome' ).removeClass( 'player-control-active  -xl' );
		    }
		},
		
		countIn() {
			
		},
		
		layout: function()
		{
		    var layout		= event.target.getAttribute('data-layout');
		    var scrollmode	= event.target.getAttribute( 'data-scrollmode' );

		    this.player.removeClass( 'horizontal page' );
		    this.player.addClass( layout );
		    
		    // update renderer
		    this.player.alphaTab( 'layout', layout );
		    
		    // update player
		    this.player.alphaTab( 'autoScroll', scrollmode );
		    $( 'body,html' ).animate({
		        scrollTop: 0
		    }, 300);
		},
		
		print() {
			this.player.alphaTab( 'print' );
		},
		
		favorite() {
			$.get( $( '#add-favorite-url' ).data( 'url' ), function( data ) {
				alert('READY');
				//document.location.reload();
			});
		},
		
		// Alphatab Event Handlers
		onSoundFontLoad: function( e, progress ) {
			var percentage = ( ( progress.loaded / progress.total ) * 100 ) | 0;
		    $( '#soundFontProgress' ).css( 'width', percentage + '%' ).text( percentage + '%' );
		    
		    $( '#soundFontProgressMenuItem' ).hide();
		},
		
		onPlayStateChanged: function() {
			this.playerState = this.player.alphaTab( 'playerState' );
		},
		
		onLoaded: function( e, score ) {
			$( '#trackList' ).empty();
			
			for( var i = 0; i < score.Tracks.length; i++) {
				$( '#trackList' ).append( createTrack( score.Tracks[i] ) );
			}
		},
		
		onRendered: function( e, score ) {
			var tracks = this.player.alphaTab( 'tracks' );
			
			for( var i = 0; i < tracks.length; i++ ) {
			   tracks[i] = tracks[i].Index;
			}
			
			// check checkboxes 
			$( '#trackList div.track' ).each( function()
			{
				var track = $( this ).data( 'track' );
				var isSelected = tracks.indexOf( track ) > -1;
				if( isSelected ) {
					$( this ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
				}
				else {
					$( this ).find( '.showHide' ).removeClass( 'fa-eye' ).addClass( 'fa-eye-slash' );
				}
			});
		},
		
		/*
		 * Track Event Handlers
		 */
		onClickTrackTitle: function ( e ) {
			alert('EHO');
			var track = $( this ).closest( 'div.track' ).data( 'track' );
			tracks = [track];
			$( this ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
	     
			console.log( tracks );
			
			// render new tracks
			this.player.alphaTab( 'tracks', tracks );
		},
		
		onClickTrackSolo: function ( e ) {
			$(this).toggleClass('checked');
			var isSolo = $(this).hasClass('checked');
			var track = $(this).closest('div').data('track');
			this.player.alphaTab('soloTrack', track, isSolo);    
		},
		
		onClickTrackMute: function ( e ) {
			$(this).toggleClass('checked');
			var isMute = $(this).hasClass('checked');
			var track = $(this).closest('div').data('track');
			this.player.alphaTab('muteTrack', track, isMute);                    
		},
	},
	created() {
		this.player	= $( '#alphaTab' );
		this.player.alphaTab();
		
		// Alphatab Event Handling
		this.player.on(  'alphaTab.soundFontLoad', this.onSoundFontLoad );
		this.player.on(  'alphaTab.playerStateChanged', this.onPlayStateChanged );
		this.player.on(  'alphaTab.loaded', this.onLoaded );
		this.player.on(  'alphaTab.rendered', this.onRendered );
	  }
});

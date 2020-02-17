/*
 * Track Event Handlers
 */
$( "#trackList" ).on( "click", "div.title", function( e )
{
	var track = $( this ).closest( 'div.track' ).data( 'track' );
	tracks = [track];
	$( this ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
 
	console.log( tracks );
	
	// render new tracks
	playerControls.player.alphaTab( 'tracks', tracks );
});

$( "#trackList" ).on( "click", "button.solo", function( e )
{
	$( this ).toggleClass( 'checked' );
	var isSolo = $( this ).hasClass( 'checked' );
	var track = $( this ).closest( 'div' ).data( 'track' );
	
	playerControls.player.alphaTab( 'soloTrack', track, isSolo );
});

$( "#trackList" ).on( "click", "button.mute", function( e )
{
	$( this ).toggleClass( 'checked' );
	var isMute = $( this ).hasClass( 'checked' );
	var track = $( this ).closest( 'div' ).data( 'track' );
	playerControls.player.alphaTab( 'muteTrack', track, isMute );     
});

function createTrack( scoreTrack )
{
	return `
	<div class="track" data-track="${scoreTrack.index}">
		<div class="title" v-on:click="onClickTrackTitle"><i class="fa fa-eye-slash showHide"></i>${scoreTrack.name}</div>
		<div class="btn-group btn-group-xs">
			<button type="button" class="btn btn-default solo" v-on:click="onClickTrackSolo">
				<svg class="icon"><use xlink:href="#icon-solo"></use></svg>
			</button>
			<button type="button" class="btn btn-default mute" v-on:click="onClickTrackMute">
				<svg class="icon"><use xlink:href="#icon-mute"></use></svg>
			</button>
		</div>
		<input id="volume-${scoreTrack.index}" type="text" />
	</div>
	<script>
		$( "#volume-${scoreTrack.index}" ).slider({ min: 0, max: 16, step: 1, value: ${scoreTrack.playbackInfo.Volume}, handle: "square" });
	</script>
	`;
}

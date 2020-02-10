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

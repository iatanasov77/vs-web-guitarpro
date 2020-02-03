
$( '#playbackSpeedSelector a' ).click( function()
{
    var playbackSpeed = $(this).data('value');
    alert(playbackSpeed);
    playerControls.player.alphaTab( 'playbackSpeed', playbackSpeed );
    $( '#speed-selector-value' ).text( $( this ).text() );
}); 

playerControls.player.on( 'alphaTab.playerStateChanged', function()
{
	playerControls.playerState = playerControls.player.alphaTab( 'playerState' );
});

playerControls.player.on( 'alphaTab.soundFontLoad', function( e, progress )
{
    var percentage = ( ( progress.loaded / progress.total ) * 100 ) | 0;
    $( '#soundFontProgress' ).css( 'width', percentage + '%' ).text( percentage + '%' );
});

playerControls.player.on( 'alphaTab.soundFontLoaded', function()
{
    $( '#soundFontProgressMenuItem' ).hide();
});

var tracks = [];

//keep dropdown open
$( '#trackList' ).on( 'click', function( e )
{
	e.stopPropagation();
});


playerControls.player.on( 'alphaTab.loaded', function( e, score )
{
	var trackList = $( '#trackList' );

	trackList.empty();

	for( var i = 0; i < score.Tracks.length; i++) {
		trackList.append( addTrack( score.Tracks[i] ) );
	} 
});


playerControls.player.on( 'alphaTab.rendered', function( e )
{
	// load track indices
	tracks = playerControls.player.alphaTab( 'tracks' );
	
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
});


function addTrack( scoreTrack )
{
	// build div container item for track
	var trackContainer = $( '<div class="track"></div>' ).data( 'track', scoreTrack.Index );
 
	// show/hide button and track title
	var title = $( '<div class="title"></div>' ).on( 'click', function( e )
	{
		var track = $( this ).closest( 'div.track' ).data( 'track' );
		tracks = [track];
		$( this ).find( '.showHide' ).removeClass( 'fa-eye-slash' ).addClass( 'fa-eye' );
     
		console.log(tracks);
		
		// render new tracks
		playerControls.player.alphaTab( 'tracks', tracks );
	});
	trackContainer.append( title );
 
	var showHide = $( '<i class="fa fa-eye-slash showHide"></i>' );
	title.append( showHide );
	title.append( scoreTrack.Name );
	
 
	// solo and mute buttons
	var soloMute = $( '<div class="btn-group btn-group-xs"></div>' );
	var solo = $( '<button type="button" class="btn btn-default solo">Solo</button>' );
	
	solo.on( 'click', function(e)
	{
		$(this).toggleClass('checked');
		var isSolo = $(this).hasClass('checked');
		var track = $(this).closest('div').data('track');
		playerControls.player.alphaTab('soloTrack', track, isSolo);                    
	});
 
	var mute = $('<button type="button" class="btn btn-default mute">Mute</button>');
	mute.on('click', function(e) {
		$(this).toggleClass('checked');
		var isMute = $(this).hasClass('checked');
		var track = $(this).closest('div').data('track');
		playerControls.player.alphaTab('muteTrack', track, isMute);                    
	});                
	soloMute.append(solo).append(mute);
	trackContainer.append(soloMute);
 
	// volume slider
	var volume = $( '<input type="text" />').on( 'slide', function( e )
	{
         var track = $( this ).closest( 'div' ).data( 'track' );
         playerControls.player.alphaTab( 'trackVolume', track, e.value );
    });
	trackContainer.append( volume );
	
	volume.slider({
		min: 0,
		max: 16,
		step: 1,
		value: scoreTrack.PlaybackInfo.Volume,
		handle: 'square'
	});
	
	return trackContainer;
}

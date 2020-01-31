playerControls.player.on( 'alphaTab.playerStateChanged', function()
{
	playerControls.playerState = playerControls.player.alphaTab( 'playerState' );
});


var tracks = [];
//keep dropdown open
$('#trackList').on('click', function(e) {
 e.stopPropagation();
});


playerControls.player.on( 'alphaTab.loaded', function( e, score )
{
	var trackList = $( '#trackList' );
 
 
	trackList.empty();
 
	for( var i = 0; i < score.Tracks.length; i++) {
		playerControls.tracks.push({
			name: "Mekanın Sahibi",
			artist: "Norm Ender",
			cover: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/img/1.jpg",
			source: "https://raw.githubusercontent.com/muhammederdem/mini-player/master/mp3/1.mp3",
			url: "https://www.youtube.com/watch?v=z3wAjJXbYzA",
			favorited: false
		});
		
		
		
		// build list item for track
		var li = $('<li></li>').data( 'track', score.Tracks[i].Index );
     
		// show/hide button and track title
		var title = $('<div class="title"></div>');
		li.append(title);
     
		var showHide = $('<i class="fa fa-eye-slash showHide"></i>');
		title.append(showHide);
		title.append(score.Tracks[i].Name);
		
		title.on('click', function(e) {
			var track = $(this).closest('li').data('track');
			tracks = [track];
			$(this).find('.showHide').removeClass('fa-eye-slash').addClass('fa-eye');
         
			// render new tracks
			at.alphaTab('tracks', tracks);   
		});
     
		// solo and mute buttons
		var soloMute = $('<div class="btn-group btn-group-xs"></div>');
		var solo = $('<button type="button" class="btn btn-default solo">Solo</button>');
		
		solo.on('click', function(e) {
			$(this).toggleClass('checked');
         var isSolo = $(this).hasClass('checked');
         var track = $(this).closest('li').data('track');
         at.alphaTab('soloTrack', track, isSolo);                    
     });
     
     var mute = $('<button type="button" class="btn btn-default mute">Mute</button>');
     mute.on('click', function(e) {
         $(this).toggleClass('checked');
         var isMute = $(this).hasClass('checked');
         var track = $(this).closest('li').data('track');
         at.alphaTab('muteTrack', track, isMute);                    
     });                
     soloMute.append(solo).append(mute);
     li.append(soloMute);
     
     // volume slider
     var volume = $('<input type="text" />')
         .on('slide', function(e) {
             var track = $(this).closest('li').data('track');
             at.alphaTab('trackVolume', track, e.value);
         });
     li.append(volume);
     volume.slider({
         min: 0,
         max: 16,
         step: 1,
         value: score.Tracks[i].PlaybackInfo.Volume,
         handle: 'square'
     })
     
     trackList.append(li);
 }
});
at.on('alphaTab.rendered', function(e) {
 // load track indices
 tracks = at.alphaTab('tracks');
 for(var i = 0; i < tracks.length; i++) {
     tracks[i] = tracks[i].Index;
 }
 
 // check checkboxes 
 $('#trackList li').each(function() {
     var track = $(this).data('track');
     var isSelected = tracks.indexOf(track) > -1;
     if(isSelected) {
         $(this).find('.showHide').removeClass('fa-eye-slash').addClass('fa-eye');
     }
     else {
         $(this).find('.showHide').removeClass('fa-eye').addClass('fa-eye-slash');
     }
 });       
});


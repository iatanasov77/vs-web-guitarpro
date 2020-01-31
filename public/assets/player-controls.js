var playerControls	= new Vue({
	el: "#player-controls",
	
	
	data() {
		return {
			player: null,
			playerState: null,
			
			tracks: [],
		};
	},
	
	methods: {
		play() {
			this.player.alphaTab( 'playPause' );
		},
    
		favorite() {
//      this.tracks[this.currentTrackIndex].favorited = !this.tracks[
//        this.currentTrackIndex
//      ].favorited;
		}
	},
	created() {
		this.player	= $( '#alphaTab' );
		this.player.alphaTab();
	    
//	    this.currentTrack = this.tracks[0];
//
//	    // this is optional (for preload covers)
//	    for (let index = 0; index < this.tracks.length; index++) {
//	      const element = this.tracks[index];
//	      let link = document.createElement('link');
//	      link.rel = "prefetch";
//	      link.href = element.cover;
//	      link.as = "image"
//	      document.head.appendChild(link)
//	    }
	  }
});

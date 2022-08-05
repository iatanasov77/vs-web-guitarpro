import TracksItem from './components/TracksItem';
import SpeedItem from './components/SpeedItem';
import LayoutItem from './components/LayoutItem';
import PrintItem from './components/PrintItem';
import InformationItem from './components/InformationItem';
import SongPositionItem from './components/SongPositionItem';

export default {
    name: 'PlayerControls',
    components: {
        TracksItem,
        SpeedItem,
        LayoutItem,
        PrintItem,
        InformationItem,
        SongPositionItem,
    },
    data() {
        return {
            user: null,
            
            player: null,
            scoreLoaded: false,
            playerState: null,
            loopingState: null,
            metronomeVolume: null,
            countInVolume: null,
        }
    },
    methods: {
        playPause:  function() {
            if ( ! this.playerState )
                $( '#btnPlayPause' ).addClass( 'player-control-active  -xl' );
            
            this.player.playPause();
        },
    
        stop:  function() {
            this.player.stop();
            
            $( '#btnPlayPause' ).removeClass( 'player-control-active  -xl' );
        },
        
        looping:  function() {
            this.loopingState = ! this.player.isLooping;
   
            $( '#btnLooping' ).toggleClass( "player-control-active  -xl" );
            this.player.isLooping = this.loopingState;
        },
        
        metronome:  function() {
            this.metronomeVolume    = this.player.metronomeVolume;
            $( '#btnMetronome' ).toggleClass( 'player-control-active  -xl' );
            this.player.metronomeVolume = 1;
            
            if( this.metronomeVolume == 0 ) {
                this.player.metronomeVolume = 4;
            }
            else {
                this.player.metronomeVolume = 0;
            }
        },
        
        countIn:  function() {
            this.countInVolume    = this.player.countInVolume;
            $( '#btnCountIn' ).toggleClass( 'player-control-active  -xl' );
           
            if( this.countInVolume == 0 ) {
                this.player.countInVolume = 4;
            }
            else {
                this.player.countInVolume = 0;
            }
        },
        
        favorite() {
            $.get( $( '#add-favorite-url' ).data( 'url' ), function( data ) {
                //alert('This Tab is Added To Favorite List !!!');
                console.log( 'This Tab is Added To Favorite List !!!' );
                document.location.reload();
            });
        },
        
        // Alphatab Event Handlers
        onSoundFontLoaded: function( loaded, total ) {
            //alert( 'SoundFontLoaded' );
            //$( '#soundFontProgressMenuItem' ).hide();
            
            var percentage = ( ( loaded / total ) * 100 ) | 0;
            $( '#soundFontProgress' ).css( 'width', percentage + '%' ).text( percentage + '%' );
            
            $( '#soundFontProgressMenuItem' ).hide();
        },
        
        onPlayerStateChanged: function( state, stopped ) {
            this.playerState = state;
        },
        
        onScoreLoaded: function( score ) {
            console.log( 'Score Loaded !!!' );
            //console.log( this.player.score.tracks );
            this.scoreLoaded = true;
        },
    },
    
    
    created() {
    
        this.user   = $( '#song-details' ).attr( 'data-user' );
        this.player = api;

        /////////////////////////////
        // Alphatab Event Handling
        /////////////////////////////
        this.player.soundFontLoad.on( (e) => {
            console.log( 'soundFont was loaded!', e.loaded );
            this.onSoundFontLoaded( e.loaded, e.total );
        });
        
        this.player.playerStateChanged.on( (args) => {
            this.onPlayerStateChanged( args.state, args.stopped );
        });

        this.player.scoreLoaded.on( (score) => {
            //console.log( 'Score was loaded!', score );
            //console.log( score.tracks );
            
            this.onScoreLoaded( score );
        });
        

        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // This event is fired when all required data for playback is loaded and ready. The player is ready for playback when 
        // all background workers are started, the audio output is initialized, a soundfont is loaded, and a song was loaded into the player as midi file.
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        this.player.playerReady.on( () => {
            console.log( 'Player Ready !!!' );
            //alert( 'Player Ready !!!' );
        });
        
    },
}

require( './styles/navigation.css' );
require( './styles/player-controls.scss' );
require( './styles/tablature-player.css' );
require( 'bootstrap-slider/dist/css/bootstrap-slider.css' );

require( './alphatab.js' );
$( function()
{
    require( './player-controls.js' );
    
    $( '#add-favorite-url' ).attr( 'data-url', $( '#alphaTab' ).attr( 'data-add-favorite-url' ) );
    
    $( '#player-controls' ).on( 'mouseover', '.trackTitle',
        function() {
            $( this ).parent().addClass( "playerTrackHover" );
        }
    );
    
    $( '#player-controls' ).on( 'mouseleave', '.trackTitle',
        function() {
            $( this ).parent().removeClass( "playerTrackHover" );
        }
    );
});

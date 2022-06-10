require( 'bootstrap-submenu' );
require( '../../css/submenu.css' );

$( function()
{
    $( '.dropdown-submenu > a' ).submenupicker();
    
    $( '.dropdown' ).on( 'click', function ( e )
    {
        var target      = $( e.target );
        var dropdown    = target.closest( '.dropdown' );
        
        if( target.hasClass( 'language-submenu' ) ) {
            e.preventDefault();
            e.stopPropagation();
            
            $( dropdown ).addClass( 'keepopen' );
            $( 'ul.submenu' ).toggleClass( "show" );
        } else {
            $( dropdown ).removeClass( 'keepopen' );
        }
    });
    
    $( document ).on( 'hide.bs.dropdown', function ( e )
    {
        var target = $( e.target );
        if ( $( target ).is( '.keepopen' ) ) {
            return false;
        }
    });
    
    $( '.language-submenu' ).click( function()
    {
        $( 'ul.submenu' ).toggleClass( "show" );
    });
});

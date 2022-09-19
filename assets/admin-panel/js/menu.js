$( function()
{
    $( '.main-menu-current-item' ).addClass( 'active' );
    $( '.main-menu-current-item' ).closest( '.submenu' ).addClass( 'show' );
    
    var activePosition  = $( '.main-menu-current-item' ).position();
    $( '.menu-list' ).slimScroll({
        scrollTo: ( activePosition.top - 50 ) + 'px',
    });
});

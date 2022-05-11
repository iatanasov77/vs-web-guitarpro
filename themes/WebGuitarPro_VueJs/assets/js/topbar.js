require( '../css/topbar.css' );

import { VsPath } from './includes/fos_js_routes.js';

$( function()
{
    $( '#formTablatureCategory' ).on( 'submit', function( e )
    {
        e.preventDefault();
        
        var url     = $( this ).attr( "action" );
        var method  = $( this ).attr( "method" );
        var data    = $( this ).serialize();
        
        $.ajax({
            url : url,
            type: method,
            data : data
        }).done( function( response ) {
            document.location = VsPath( 'vs_wgp_tablature_index' )
            //document.location = document.location;
        }).fail( function() {
              alert( 'LOGIN ERROR !!!' );
        }).always( function() {
            //alert( 'always' );
        });
    });
});

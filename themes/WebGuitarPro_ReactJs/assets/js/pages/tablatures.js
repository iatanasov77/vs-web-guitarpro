require( '@kanety/jquery-simple-tree-table/dist/jquery-simple-tree-table.js' );

import { VsFormDlete, onResourceDeleteOk, onResourceDeleteCancel } from '../includes/resource-delete.js';

$( function()
{
    if ( uncategorizedTablatures <= 0 ) {
        $( '#uncategorized-tablatures' ).hide();
    }
    
    $( '#tblTablatures' ).simpleTreeTable({
        opened: [0]
    });
    

    $( ".btnDeleteTablature" ).on( "click", function ( e ) 
    {
        e.preventDefault();

        $( '#deleteForm' ).attr( 'action', $( this ).attr( 'href' ) );
        $( '#resource_delete__token' ).val( $( this ).attr( 'data-csrftoken' ) );
        
        var dialog  = VsFormDlete( onResourceDeleteOk, onResourceDeleteCancel );
    });
    
    
    $( ".btnDeleteCategory" ).on( "click", function ( e ) 
    {
        e.preventDefault();

        $( '#deleteForm' ).attr( 'action', $( this ).attr( 'href' ) );
        $( '#resource_delete__token' ).val( $( this ).attr( 'data-csrftoken' ) );
        
        var dialog  = VsFormDlete( onResourceDeleteOk, onResourceDeleteCancel );
    });
});

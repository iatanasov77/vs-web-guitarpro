require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );
// Need copy of: jquery-easyui/images/*

require( '../includes/clone_preview.js' );
$( function()
{
	$( '#page_form_locale' ).on( 'change', function( e ) {
		var pageId	= $( '#pageFormContainer' ).attr( 'data-pageId' );
		var locale	= $( this ).val()
		
		$.ajax({
            type: 'GET',
            url: '/page-actions/get-form/' + locale + '/' + pageId,
            success: function ( data ) {
                $( '#pageFormContainer' ).html( data );
                $( '#page_form_category_taxon' ).combotree();
            }, 
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert( 'FATAL ERROR!!!' );
            }
        });	
    });
});
 
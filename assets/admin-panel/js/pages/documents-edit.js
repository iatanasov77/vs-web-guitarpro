require( 'bootstrap-gtreetable/dist/bootstrap-gtreetable.css' );
require( 'bootstrap-gtreetable/dist/bootstrap-gtreetable.js' );
require( 'jquery-easyui/css/easyui.css' );
require( '@kanety/jquery-simple-tree-table/dist/jquery-simple-tree-table.js' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );
require( 'ckeditor' );

import { VsPath } from '../includes/fos_js_routes.js';
import { VsFormSubmit } from '../includes/vs_form.js';

$( function()
{
    $( '#tblTocPages' ).simpleTreeTable({
        expander: $( '#expander' ),
        collapser: $( '#collapser' )
    });
    
    $( '#collapsed' ).simpleTreeTable({
        opened: 'all',
    });
    
	$( '.btnTocPage' ).on( 'click', function( e )
	{
		e.preventDefault();
		var documentId    = $( this ).attr( 'data-documentId' );
		var tocPageId     = $( this ).attr( 'data-tocPageId' );
		
		$.ajax({
			type: "GET",
		 	url: VsPath( 'vs_cms_multipage_toc_page_edit', {'documentId': documentId, 'tocPageId': tocPageId} ),
			success: function( response )
			{
				$( '#modalBodyTocPage > div.card-body' ).html( response );
				$( '#multipageTocPageModal' ).modal( 'toggle' );
				//$( '#btnEditInstallManual').show();
			},
			error: function()
			{
				alert( "SYSTEM ERROR!!!" );
			}
		});
	});
	
	$( '#btnSaveTocPage' ).on( 'click', function( e )
	{
		$( '#form_toc_page' ).submit();
	});
	
	$( '#multipageTocPageModal' ).on( 'submit', '#form_toc_page', function( e )
    {
        e.preventDefault();
        e.stopPropagation();
        
        var formData    = new FormData( this );
        var submitUrl   = $( '#form_toc_page' ).attr( 'action' );
        var redirectUrl = VsPath( 'vs_cms_document_update', {'id': $( '#DocumentFormContainer' ).attr( 'data-documentId' )} );
        
        var pageText    = CKEDITOR.instances.toc_page_form_text.getData();
        formData.set( "toc_page_form[text]", pageText );
        
        VsFormSubmit( formData, submitUrl, redirectUrl );
    });
});

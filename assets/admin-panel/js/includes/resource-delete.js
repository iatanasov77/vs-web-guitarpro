// JqueryUi conflicts with JqueryEasyUi
require( 'jquery-ui-dist/jquery-ui.js' );
require( 'jquery-ui-dist/jquery-ui.css' );
require( 'jquery-ui-dist/jquery-ui.theme.css' );

import { VsTranslator, VsLoadTranslations } from '../includes/bazinga_js_translations.js';
VsLoadTranslations(['VSApplicationBundle']);

var onResourceDeleteOk      = function() {
    $( '#deleteForm' ).submit();
}

var onResourceDeleteCancel  = function() {
    $( '#deleteForm' ).attr( 'action', '' );
    $( '#resource_delete__token' ).val( '' );
    
    $( this ).dialog( "close" );
}

export function VsFormDlete( onOk, onCancel )
{
    var myButtons = {};
    var _Translator = VsTranslator( 'VSApplicationBundle' );
    
    //var translatedDialog    = '<div title="DELETE ITEM">Do you want to delete this Item?</div>';
    var translatedDialog    = '<div title="' + _Translator.trans( 'vs_application.form.vs_form_delete.title' ) + '">' + 
                                _Translator.trans( 'vs_application.form.vs_form_delete.message' ) + 
                            '</div>';
    
    myButtons[_Translator.trans( 'vs_application.form.vs_form_delete.btn_ok' )] = onOk;
    myButtons[_Translator.trans( 'vs_application.form.vs_form_delete.btn_cancel' )] = onCancel;
    
    return $( translatedDialog ).dialog( { buttons: myButtons } );
}


/*
 * I'm not sure if this should work. This is an old implementation
 */
$( function()
{
	$( ".btnDelete" ).on( "click", function ( e ) 
	{
	    e.preventDefault();

	    $( '#deleteForm' ).attr( 'action', $( this ).attr( 'href' ) );
	    $( '#resource_delete__token' ).val( $( this ).attr( 'data-csrftoken' ) );
	    
	    var dialog  = VsFormDlete( onResourceDeleteOk, onResourceDeleteCancel );
	});
});

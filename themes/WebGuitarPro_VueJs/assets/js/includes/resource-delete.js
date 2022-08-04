// JqueryUi conflicts with JqueryEasyUi
require( 'jquery-ui-dist/jquery-ui.js' );
require( 'jquery-ui-dist/jquery-ui.css' );
require( 'jquery-ui-dist/jquery-ui.theme.css' );

import { VsTranslator, VsLoadTranslations } from '../includes/bazinga_js_translations.js';
VsLoadTranslations(['VSApplicationBundle']);

export function onResourceDeleteOk() {

    $.ajax({
        type: 'POST',
        url: $( '#deleteForm' ).attr( 'action' ),
        data: $( '#deleteForm' ).serialize()
    })
    .done( function( response )
    {
        document.location.reload();
    })
    .fail( function( XMLHttpRequest, textStatus, errorThrown )
    {
        alert( 'ERROR !!!' );
    });
   
}

export function onResourceDeleteCancel() {
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


$( function()
{
    $( '#modals' ).append("\
        <div style='display: none;'>\
            <form id='deleteForm' method='POST'>\
                <input type='hidden' name='_method' value='DELETE'>\
                <input type='hidden' id='resource_delete__token' name='_csrf_token' value=''>\
            </form>\
        </div>\
    ");
});

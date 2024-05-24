const $ = require( 'jquery' );
window.$ = $;

require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

import { VsTranslator, VsLoadTranslations } from '@/js/includes/bazinga_js_translations.js';
VsLoadTranslations(['WebGuitarPro']);

require( '@/js/includes/resource-delete.js' );

$( function()
{
    $( '.btnEditShare' ).on( 'click', function( e )
    {
        e.preventDefault();
        $( '#editShareName' ).text( $( this ).attr( 'data-shareName' ) );
        
        var _Translator     = VsTranslator( 'WebGuitarPro' );
        $.ajax({
            type: "GET",
            url: $( this ).attr( 'href' ),
            success: function( response )
            {
                $( '#formShareContainer' ).html( response );
                
                /** Bootstrap 5 Modal Toggle */
                const myModal = new bootstrap.Modal( '#edit-share-modal', {
                    keyboard: false
                });
                myModal.show( $( '#edit-share-modal' ).get( 0 ) );
                
                $( '#edit_share_form_targetUsers' ).combotree();
                $( '#edit_share_form_tablatures' ).combotree();
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
    });
    
    $( '#btnSubmitShare' ).on( 'click', function( e )
    {
        $.ajax({
            type: "POST",
            url: $( '#formEditShare' ).attr( 'action' ),
            data: $( '#formEditShare' ).serialize(),
            success: function( response )
            {
                document.location = document.location;
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
        
    });
    
    
});

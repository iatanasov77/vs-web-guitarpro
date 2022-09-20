require( 'bootstrap/js/dist/modal.js' );
require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );

import { VsTranslator, VsLoadTranslations } from '../includes/bazinga_js_translations.js';
VsLoadTranslations(['WebGuitarPro']);

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
                
                $( '#edit_share_form_targetUsers' ).combobox({
                    required: true,
                    multiple: true,
                    prompt: _Translator.trans( 'vs_wgp.form.share_tablature.target_users_placeholder' ),
                    url: $( '#edit_share_form_targetUsers' ).attr( 'data-easyuidata' ),
                    valueField: 'id',
                    textField: 'text',
                    formatter: function( row ) {
                        var opts            = $( this ).combobox( 'options' );
                        return '<input type="checkbox" class="combobox-checkbox mr-1" id="targetUser-' + ( row[opts.valueField] ) + '" >' + row[opts.textField];                          
                    },
                    onLoadSuccess: function() {
                        var opts    = $( this ).combobox( 'options' );
                        var target  = this;
                        var values  = $( target ).combobox( 'getValues' );
                        $.map( values, function( value ) {
                            var el  = opts.finder.getEl( target, value );
                            el.find( 'input.combobox-checkbox' )._propAttr( 'checked', true );
                        })
                    },
                });
                
                $( '#edit_share_form_tablatures' ).combotree({
                    required: true,
                    multiple: true,
                    checkbox: true,
                    onlyLeafCheck: true,
                    prompt: _Translator.trans( 'vs_wgp.form.share_tablature.shared_tablatures_placeholder' ),
                    url: $( '#edit_share_form_tablatures' ).attr( 'data-easyuidata' ),
                });
                
                $( '#edit-share-modal' ).modal( 'toggle' );
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
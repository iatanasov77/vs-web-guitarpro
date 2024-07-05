require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );

import { VsTranslator, VsLoadTranslations } from '@/js/includes/bazinga_js_translations.js';
VsLoadTranslations(['WebGuitarPro']);

$( function()
{
    $( '.btnShareTablature' ).on( 'click', function( e )
    {
        e.preventDefault();
    
        var _Translator     = VsTranslator( 'WebGuitarPro' );
        $.ajax({
            type: "GET",
            url: $( this ).attr( 'href' ),
            success: function( response )
            {
                $( '#formShareContainer' ).html( response );
                                
                $.ajax({
                    type: 'GET',
                    url: $( "#share_tablature_form_name" ).attr( 'data-autocompleteData' ),
                    success: function ( data ) {
                        var availableShares = data;
                        /* 
                        var availableShares = {
                            '1': 'Adfgdg',
                            '2': 'Adgffg',
                            '3': 'Bqwewr',
                            '4': 'Bqtdhyfyt'
                        };
                        */
                        $( "#share_tablature_form_name" ).combobox({
                            data: availableShares,
                            hasDownArrow: false,
                            loadFilter: function( data )
                            {
                                return $.map( data, function( item, key )
                                {
                                    return {
                                        value: key,
                                        text: item
                                    }
                                })
                            },
                            onHidePanel: function()
                            {
                                var currentValue = $( '#share_tablature_form_name' ).combobox( 'getValue' );
                                if ( ! ( currentValue in availableShares ) ) {
                                    $( '#share_tablature_form_name' ).combobox( 'setValue', 0 );
                                    $( '#share_tablature_form_name' ).combobox( 'setText', currentValue );
                                } else {
                                    $( '#share_tablature_form_shareId' ).val( currentValue );
                                }
                            },
                        });
                    }
                });
                
                $( '#share_tablature_form_targetUsers' ).combobox({
                    required: true,
                    multiple: true,
                    prompt: _Translator.trans( 'vs_wgp.form.share_tablature.target_users_placeholder' ),
                    url: $( '#share_tablature_form_targetUsers' ).attr( 'data-easyuidata' ),
                    valueField: 'id',
                    textField: 'text',
                    formatter: function( row ) {
                        var opts = $( this ).combobox( 'options' );
                        return '<input type="checkbox" class="combobox-checkbox mr-1">' + row[opts.textField];
                    },
                });
                
                /** Bootstrap 5 Modal Toggle */
                const myModal = new bootstrap.Modal( '#tablature-share-modal', {
                    keyboard: false
                });
                myModal.show( $( '#tablature-share-modal' ).get( 0 ) );
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
    });
    
    $( '#btnSubmitShare' ).on( 'click', function( e )
    {
        let formData = new FormData( $( '#formShareTablature' )[0] );
        formData.set( 'share_tablature_form[name]', $( '#share_tablature_form_name' ).combobox( 'getText' ) );
        
        $.ajax({
            type: "POST",
            url: $( '#formShareTablature' ).attr( 'action' ),
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
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

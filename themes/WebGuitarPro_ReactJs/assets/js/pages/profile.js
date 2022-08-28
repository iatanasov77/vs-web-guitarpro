require( '../../css/profile.css' );

import { VsDisplayPassword } from '../includes/password-generator.js';
import { VsPath } from '../includes/fos_js_routes.js';
import { VsTranslator, VsLoadTranslations } from '../includes/bazinga_js_translations.js';
VsLoadTranslations(['VSApplicationBundle']);

$( function()
{
    $( '#btnGeneratePassword' ).on( 'click', function ( e )
    {
        $.ajax({
            type: 'GET',
            url: VsPath( 'vs_application_json_get_passwords', { 'quantity': 1 } ),
            success: function ( data )
            {
                if ( data['status'] == 'ok' ) {
                    var password    = data['data']['passwords'][0];
                    
                    $( '#change_password_form_password_first' ).val( password );
                    $( '#change_password_form_password_second' ).val( password );
                    
                    var dialog  = VsDisplayPassword( password );
                } else {
                    alert( 'ERROR !!!' );
                }
            }, 
            error: function( XMLHttpRequest, textStatus, errorThrown )
            {
                alert( 'ERROR !!!' );
            }
        });
    });
});

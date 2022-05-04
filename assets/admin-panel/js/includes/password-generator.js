// JqueryUi conflicts with JqueryEasyUi
require( 'jquery-ui-dist/jquery-ui.js' );
require( 'jquery-ui-dist/jquery-ui.css' );
require( 'jquery-ui-dist/jquery-ui.theme.css' );

import { VsTranslator, VsLoadTranslations } from '../includes/bazinga_js_translations.js';
VsLoadTranslations(['VSApplicationBundle']);

export function VsDisplayPassword( password )
{
    var myButtons = {};
    var _Translator = VsTranslator( 'VSApplicationBundle' );
    
    var translatedDialog    = '<div title="' + _Translator.trans( 'vs_application.form.vs_form_display_password.title' ) + '">' + 
                                '<div style="margin: 0 10px 0 10px; font-weight: bold; text-decoration: underline;">' +
                                    _Translator.trans( 'vs_application.form.vs_form_display_password.message' ) +
                                '</div><br />' +
                                '<span style="margin: 0 10px 0 10px;">' + _Translator.trans( 'vs_application.form.vs_form_display_password.password' ) + ': ' +
                                    '<span style="font-weight: bold;">' + password + '</span>' +
                                '</span>' +
                            '</div>';
    
    myButtons[_Translator.trans( 'vs_application.form.vs_form_display_password.btn_close' )] = function() {
        $( this ).dialog( "close" );
    };
    
    return $( translatedDialog ).dialog( { buttons: myButtons } );
}

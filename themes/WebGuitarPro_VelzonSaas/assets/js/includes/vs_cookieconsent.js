import { VsCookieConsent } from '@/vendor/vs_cookieconsent/cookieconsent.js';
import { VsPath } from '@/js/includes/fos_js_routes.js';

const routes    = require( '../../../../../public/shared_assets/js/fos_js_routes_application.json' );

$( function()
{
    $.ajax({
        type: "GET",
        url: VsPath( 'vs_application_cookie_consent_translations', {}, routes ),
        success: function( response )
        {
            //console.log( response );
            VsCookieConsent( response.response, $( 'html' )[0].lang );
        },
        error: function()
        {
            alert( "SYSTEM ERROR!!!" );
        }
    });
});

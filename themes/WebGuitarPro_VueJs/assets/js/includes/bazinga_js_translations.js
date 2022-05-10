import { VsPath } from '../includes/fos_js_routes.js';

// https://github.com/willdurand/BazingaJsTranslationBundle/blob/master/Resources/doc/index.md
import Translator from 'bazinga-translator';

var jsonTranslations    = {
    'VSApplicationBundle': {}
};

export function VsLoadTranslations( domains )
{
    domains.forEach( function( domain ) {
        $.ajax({
            url: VsPath( 'bazinga_jstranslation_js', { '_format': 'json', 'domain': domain, 'locales': 'en,bg' } ),
            dataType: 'json'
        }).done( function( data ) {
            jsonTranslations[domain]    = data;
        });
    });
}

export function VsTranslator( domain )
{
    return Translator.fromJSON( jsonTranslations[domain] );
}

// Manual: https://github.com/FriendsOfSymfony/FOSJsRoutingBundle/blob/master/Resources/doc/usage.rst
// bin/web-guitar-pro fos:js-routing:dump --format=json --target=public/shared_assets/js/fos_js_routes_application.json
///////////////////////////////////////////////////////////////////////////////////////////////////////////
const routes = require( '../../../../../public/shared_assets/js/fos_js_routes_application.json' );
import Routing from '../../../../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';
Routing.setRoutingData( routes );
    
export function VsPath( route, params )
{
    return Routing.generate( route, params )
}

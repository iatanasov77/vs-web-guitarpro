var Encore = require( '@symfony/webpack-encore' );

if ( ! Encore.isRuntimeEnvironmentConfigured() ) {
    Encore.configureRuntimeEnvironment( process.env.NODE_ENV || 'dev' );
}

/**
 *  AdminPanel Default Theme
 */
const themePath         = './vendor/vankosoft/application/src/Vankosoft/ApplicationBundle/Resources/themes/default';
const adminPanelConfig  = require( themePath + '/webpack.config' );

//=================================================================================================

/**
 *  WebGuitarPro VueJs Theme
 */
// Encore.reset();
// const WebGuitarPro_VueJs_Config   = require('./themes/WebGuitarPro_VueJs/webpack.config');

//=================================================================================================

/**
 *  WebGuitarPro ReactJs Theme
 */
// Encore.reset();
// const WebGuitarPro_ReactJs_Config   = require('./themes/WebGuitarPro_ReactJs/webpack.config');

//=================================================================================================

/**
 *  WebGuitarPro VelzonSaas Theme
 */
Encore.reset();
const WebGuitarPro_VelzonSaas_Config    = require('./themes/WebGuitarPro_VelzonSaas/webpack.config');
//=================================================================================================

module.exports = [
    adminPanelConfig,
    //WebGuitarPro_VueJs_Config,
    //WebGuitarPro_ReactJs_Config,
    WebGuitarPro_VelzonSaas_Config,
];

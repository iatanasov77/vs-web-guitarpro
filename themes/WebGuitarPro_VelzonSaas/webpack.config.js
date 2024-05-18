const Encore    = require('@symfony/webpack-encore');
const webpack   = require('webpack');
const path      = require('path');
const AngularCompilerPlugin = require('@ngtools/webpack').AngularWebpackPlugin;

Encore
    .setOutputPath( 'public/shared_assets/build/web-guitar-pro-velzon-saas/' )
    .setPublicPath( '/build/web-guitar-pro-velzon-saas/' )
  
    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    
    .addAliases({
        '@': path.resolve( __dirname, '../../vendor/vankosoft/application/src/Vankosoft/ApplicationBundle/Resources/themes/default/assets' ),
        '@@': path.resolve( __dirname, '../../vendor/vankosoft/payment-bundle/lib/Resources/assets' )
    })
    
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: true
    })
    
    /**
     * Configure Angular Compiler and Loader
     */
//     .enableTypeScriptLoader()
//     .addPlugin(new AngularCompilerPlugin({
//         "tsConfigPath": './themes/WebGuitarPro_VelzonSaas/assets/js/Player/tsconfig.app.json',
//         "entryModule": './themes/WebGuitarPro_VelzonSaas/assets/js/Player/main.ts',
//     }))
    
    /* Embed Angular Component Templates. */
    .addLoader({
        test: /\.(html)$/,
        use: 'raw-loader',
    })

    /**
     * Add Entries
     */
    .autoProvidejQuery()
    
    .configureFilenames({
        js: '[name].js?[contenthash]',
        css: '[name].css?[contenthash]',
        assets: '[name].[ext]?[hash:8]'
    })
    
    // Coderline AlphaTab
    .copyFiles([
        {from: './node_modules/@coderline/alphatab/dist/font/', to: 'font/[name].[ext]'},
        {from: './node_modules/@coderline/alphatab/dist/soundfont/', to: 'soundfont/[name].[ext]'}
    ])

    .copyFiles({
         from: './themes/WebGuitarPro_VelzonSaas/assets/images',
         to: 'images/[path][name].[ext]',
     })
     
    .copyFiles([
        {from: './themes/WebGuitarPro_VelzonSaas/assets/vendor/Velzon_v4.2.0/images', to: 'images/[path][name].[ext]'},
        {from: './themes/WebGuitarPro_VelzonSaas/assets/vendor/Velzon_v4.2.0/lang', to: 'lang/[path][name].[ext]'}
    ])

    // Global Assets
    .addStyleEntry( 'css/app', './themes/WebGuitarPro_VelzonSaas/assets/css/app.scss' )
    .addEntry( 'js/layout', './themes/WebGuitarPro_VelzonSaas/assets/js/layout.js' )
    .addEntry( 'js/app', './themes/WebGuitarPro_VelzonSaas/assets/app.js' )
    
    // Try Import AlphaTab From node_modules
//     .addEntry('alphatab', './themes/WebGuitarPro_VelzonSaas/assets/js/alphatab.js')
//     .addEntry('tablature-player', './themes/WebGuitarPro_VelzonSaas/assets/js/Player/index.js')
    
    // Pages Assets
    .addEntry( 'js/home', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/home.js' )
//     .addEntry('authentication', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/authentication.js')
//     .addEntry('tablatures', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/tablatures.js')
//     .addEntry('tablatures-ext', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/tablatures-ext.js')
//     .addEntry('tablature-edit', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/tablature-edit.js')
//     
//     .addEntry( 'js/filemanager-file-upload', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/filemanager-file-upload.js' )
//     .addEntry( 'js/profile', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/profile.js' )
//     
//     //.addEntry( 'paymentForm', './themes/WebGuitarPro_AngularJs/assets/js/Stripe/paymentForm.js' )
//     .addEntry( 'js/pricing-plans', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/pricing-plans.js' )
//     
//     .addEntry( 'shared-tablatures', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/shared-tablatures.js' )
//     .addEntry( 'my-shares', './themes/WebGuitarPro_VelzonSaas/assets/js/pages/my-shares.js' )
;

Encore.configureDefinePlugin( ( options ) => {
    options.IS_PRODUCTION = JSON.stringify( Encore.isProduction() );
});

const config = Encore.getWebpackConfig();
config.name = 'WebGuitarPro_VelzonSaas';

config.resolve.extensions = ['.ts', '.js'];

module.exports = config;

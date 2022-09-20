const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath( 'public/shared_assets/build/web-guitar-pro-reactjs/' )
    .setPublicPath( '/build/web-guitar-pro-reactjs/' )
  
    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: true
    })
    
    .enableReactPreset()
    
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
         from: './themes/WebGuitarPro_ReactJs/assets/images',
         to: 'images/[path][name].[ext]',
     })


    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './themes/WebGuitarPro_ReactJs/assets/app.js')
    .addEntry('tablature-player', './themes/WebGuitarPro_ReactJs/assets/js/Player/index.js')
    
    .addEntry('authentication', './themes/WebGuitarPro_ReactJs/assets/js/pages/authentication.js')
    .addEntry('tablatures', './themes/WebGuitarPro_ReactJs/assets/js/pages/tablatures.js')
    .addEntry('tablature-edit', './themes/WebGuitarPro_ReactJs/assets/js/pages/tablature-edit.js')
    
    .addEntry( 'js/filemanager-file-upload', './themes/WebGuitarPro_ReactJs/assets/js/pages/filemanager-file-upload.js' )
    .addEntry( 'js/profile', './themes/WebGuitarPro_ReactJs/assets/js/pages/profile.js' )
    
    .addEntry( 'paymentForm', './themes/WebGuitarPro_ReactJs/assets/js/Stripe/paymentForm.js' )
    
    .addEntry( 'shared-tablatures', './themes/WebGuitarPro_ReactJs/assets/js/pages/shared-tablatures.js' )
    .addEntry( 'my-shares', './themes/WebGuitarPro_ReactJs/assets/js/pages/my-shares.js' )
;

const config = Encore.getWebpackConfig();
config.name = 'WebGuitarPro_ReactJs';

module.exports = config;

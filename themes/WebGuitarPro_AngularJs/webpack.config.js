const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath( 'public/shared_assets/build/web-guitar-pro-angularjs/' )
    .setPublicPath( '/build/web-guitar-pro-angularjs/' )
  
    .disableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: true
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
         from: './themes/WebGuitarPro_AngularJs/assets/images',
         to: 'images/[path][name].[ext]',
     })

    
    .addEntry('app', './themes/WebGuitarPro_AngularJs/assets/js/app.js')
    .addEntry('tablature-player', './themes/WebGuitarPro_AngularJs/assets/js/pages/tablature-player.js')
;

const config = Encore.getWebpackConfig();
config.name = 'WebGuitarPro_AngularJs';

module.exports = config;

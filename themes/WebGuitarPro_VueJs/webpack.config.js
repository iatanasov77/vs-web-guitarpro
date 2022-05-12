const { VueLoaderPlugin } = require('vue-loader');
const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath( 'public/shared_assets/build/web-guitar-pro-vuejs/' )
    .setPublicPath( '/build/web-guitar-pro-vuejs/' )
  
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
     .enableVueLoader()
    
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
         from: './themes/WebGuitarPro_VueJs/assets/images',
         to: 'images/[path][name].[ext]',
     })

    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './themes/WebGuitarPro_VueJs/assets/app.js')
    .addEntry('tablature-player', './themes/WebGuitarPro_VueJs/assets/js/Player/index.js')
    
    .addEntry('authentication', './themes/WebGuitarPro_VueJs/assets/js/pages/authentication.js')
    .addEntry('tablatures', './themes/WebGuitarPro_VueJs/assets/js/pages/tablatures.js')
    .addEntry('tablature-edit', './themes/WebGuitarPro_VueJs/assets/js/pages/tablature-edit.js')
    
    .addEntry( 'js/filemanager-file-upload', './themes/WebGuitarPro_VueJs/assets/js/pages/filemanager-file-upload.js' )
    .addEntry( 'js/profile', './themes/WebGuitarPro_VueJs/assets/js/pages/profile.js' )
;

const config = Encore.getWebpackConfig();
config.name = 'WebGuitarPro';

module.exports = config;

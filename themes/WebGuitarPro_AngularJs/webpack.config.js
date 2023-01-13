const Encore    = require('@symfony/webpack-encore');
const webpack   = require('webpack');
const AngularCompilerPlugin = require('@ngtools/webpack').AngularWebpackPlugin;

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
     * Configure Angular Compiler and Loader
     */
    .enableTypeScriptLoader()
    .addPlugin(new AngularCompilerPlugin({
        "tsConfigPath": './themes/WebGuitarPro_AngularJs/assets/js/Player/tsconfig.app.json',
        "entryModule": './themes/WebGuitarPro_AngularJs/assets/js/Player/main.ts',
    }))
    
    /* Embed Angular Component Templates. */
    .addLoader({
        test: /\.(html)$/,
        use: 'raw-loader',
    })
    
    /* 
    .addLoader({
        test: /\.scss$/,
        loader: 'css-loader',
        options: {
            esModule: false,
        }
    })
    */

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

    
    /*
     * ENTRY CONFIG
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if your JavaScript imports CSS.
     */
    .addEntry('app', './themes/WebGuitarPro_AngularJs/assets/app.js')
    
    //.addEntry('tablature-player', './themes/WebGuitarPro_AngularJs/assets/js/Player/main.ts')
    .addEntry('tablature-player', './themes/WebGuitarPro_AngularJs/assets/js/Player/index.js')
    
    .addEntry('authentication', './themes/WebGuitarPro_AngularJs/assets/js/pages/authentication.js')
    .addEntry('tablatures', './themes/WebGuitarPro_AngularJs/assets/js/pages/tablatures.js')
    .addEntry('tablatures-ext', './themes/WebGuitarPro_AngularJs/assets/js/pages/tablatures-ext.js')
    .addEntry('tablature-edit', './themes/WebGuitarPro_AngularJs/assets/js/pages/tablature-edit.js')
    
    .addEntry( 'js/filemanager-file-upload', './themes/WebGuitarPro_AngularJs/assets/js/pages/filemanager-file-upload.js' )
    .addEntry( 'js/profile', './themes/WebGuitarPro_AngularJs/assets/js/pages/profile.js' )
    
    .addEntry( 'paymentForm', './themes/WebGuitarPro_AngularJs/assets/js/Stripe/paymentForm.js' )
    
    .addEntry( 'shared-tablatures', './themes/WebGuitarPro_AngularJs/assets/js/pages/shared-tablatures.js' )
    .addEntry( 'my-shares', './themes/WebGuitarPro_AngularJs/assets/js/pages/my-shares.js' )
;

const config = Encore.getWebpackConfig();
config.name = 'WebGuitarPro_AngularJs';

config.resolve = {
    extensions: ['.ts', '.js']
};

config.plugins.push(
    new webpack.DefinePlugin({
        PRODUCTION: JSON.stringify( Encore.isProduction() ),
    })
);

module.exports = config;

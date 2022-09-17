var Encore = require( '@symfony/webpack-encore' );

/**
 *  AdminPanel Default Theme
 */
Encore
    .setOutputPath( 'public/admin-panel/build/default/' )
    .setPublicPath( '/build/default/' )

	// FOS CkEditor
	.copyFiles([
		{from: './node_modules/bootstrap-sass/assets/fonts/bootstrap', to: 'fonts/bootstrap/[name].[ext]'},
		
        {from: './node_modules/ckeditor/', to: 'ckeditor/[path][name].[ext]', pattern: /\.(js|css)$/, includeSubdirectories: false},
        {from: './node_modules/ckeditor/adapters', to: 'ckeditor/adapters/[path][name].[ext]'},
        {from: './node_modules/ckeditor/lang', to: 'ckeditor/lang/[path][name].[ext]'},
        {from: './node_modules/ckeditor/plugins', to: 'ckeditor/plugins/[path][name].[ext]'},
        {from: './node_modules/ckeditor/skins', to: 'ckeditor/skins/[path][name].[ext]'}
    ])
    
    // CKeditor 4 Extra Plugins
    .copyFiles([
        {from: './assets/admin-panel/vendor/ckeditor4_plugins', to: 'ckeditor/plugins/[path][name].[ext]'},
    ])
    
    .copyFiles({
         from: './assets/admin-panel/images',
         to: 'images/[path][name].[ext]',
     })
    
    .autoProvidejQuery()
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: true
    })
    .configureFilenames({
        js: '[name].js?[contenthash]',
        css: '[name].css?[contenthash]',
        assets: '[name].[ext]?[hash:8]'
    })
    .enableSingleRuntimeChunk()
    .enableVersioning(Encore.isProduction())
    .enableSourceMaps( !Encore.isProduction() )
    
    //////////////////////////////////////////////////////////////////
    // ASSETS
    //////////////////////////////////////////////////////////////////
    .addEntry( 'js/app', './assets/admin-panel/js/app.js' )
    .addStyleEntry( 'css/global', './assets/admin-panel/css/main.scss' )
    
    .addEntry( 'js/settings', './assets/admin-panel/js/pages/settings.js' )
    .addEntry( 'js/applications', './assets/admin-panel/js/pages/applications.js' )
    .addEntry( 'js/profile', './assets/admin-panel/js/pages/profile.js' )
    .addEntry( 'js/taxonomy-vocabolaries', './assets/admin-panel/js/pages/taxonomy-vocabolaries.js' )
    .addEntry( 'js/taxonomy-vocabolaries-edit', './assets/admin-panel/js/pages/taxonomy-vocabolaries-edit.js' )
    
    .addEntry( 'js/pages-categories', './assets/admin-panel/js/pages/pages_categories.js' )
    .addEntry( 'js/pages-categories-edit', './assets/admin-panel/js/pages/pages_categories_edit.js' )
    .addEntry( 'js/pages-index', './assets/admin-panel/js/pages/pages-index.js' )
    .addEntry( 'js/pages-edit', './assets/admin-panel/js/pages/pages-edit.js' )
    .addEntry( 'js/documents-index', './assets/admin-panel/js/pages/documents-index.js' )
    .addEntry( 'js/documents-edit', './assets/admin-panel/js/pages/documents-edit.js' )
    
    .addEntry( 'js/users-index', './assets/admin-panel/js/pages/users-index.js' )
    .addEntry( 'js/users-edit', './assets/admin-panel/js/pages/users-edit.js' )
    .addEntry( 'js/users-roles-index', './assets/admin-panel/js/pages/users-roles-index.js' )
    .addEntry( 'js/users-roles-edit', './assets/admin-panel/js/pages/users-roles-edit.js' )
    
    .addEntry( 'js/filemanager-index', './assets/admin-panel/js/pages/filemanager-index.js' )
    .addEntry( 'js/filemanager-file-upload', './assets/admin-panel/js/pages/filemanager-file-upload.js' )
    
    //////////////////////////////////////////////////////////////////
    // SUBSCRIPTION AND PAYMENT ASSETS
    //////////////////////////////////////////////////////////////////
    .addEntry( 'js/payed-services-edit', './assets/admin-panel/js/subscription_pages/payed-services-edit.js' )
    .addEntry( 'js/gateway-config', './assets/admin-panel/js/payment_pages/gateway-config.js' )
;

const adminPanelConfig = Encore.getWebpackConfig();
adminPanelConfig.name = 'adminPanel';

//=================================================================================================

/**
 *  WebGuitarPro VueJs Theme
 */
Encore.reset();
const WebGuitarPro_VueJs_Config   = require('./themes/WebGuitarPro_VueJs/webpack.config');

//=================================================================================================

/**
 *  WebGuitarPro ReactJs Theme
 */
Encore.reset();
const WebGuitarPro_ReactJs_Config   = require('./themes/WebGuitarPro_ReactJs/webpack.config');

//=================================================================================================

/**
 *  WebGuitarPro AngularJs Theme
 */
//Encore.reset();
//const WebGuitarPro_AngularJs_Config   = require('./themes/WebGuitarPro_AngularJs/webpack.config');

//=================================================================================================

module.exports = [
    adminPanelConfig,
    WebGuitarPro_VueJs_Config,
    WebGuitarPro_ReactJs_Config,
    //WebGuitarPro_AngularJs_Config,
];

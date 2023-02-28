require( '../css/topbar.css' );
require( './includes/submenu.js' );

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bin/web-guitar-pro fos:js-routing:dump --format=json --target=public/shared_assets/js/fos_js_routes_application.json
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var routes  = require( '../../../../public/shared_assets/js/fos_js_routes_application.json' );
import { VsPath } from '@/js/includes/fos_js_routes.js';

function showPaymentMethodsForm()
{
    var url = VsPath( 'vs_payment_show_payment_methods_form' ) + 
              '?payment_description=' + encodeURI( 'Payment for Unlimited Tablatures Store' );
    
    $.ajax({
        type: "GET",
        url: url,
        success: function( response )
        {
            $( '#paymentMethods' ).html( response );
            $( '#payment-modal' ).modal( 'toggle' );
            
            $( "input[name='payment_form[paymentMethod]']:first" ).prop( "checked", true );
        },
        error: function()
        {
            alert( "SYSTEM ERROR!!!" );
        }
    });
}

$( function()
{
    $( '.btnPayment' ).on( 'click', function()
    {
        $.ajax({
            type: "GET",
            url: $( this ).attr( 'data-url' ),
            success: function( response )
            {
                showPaymentMethodsForm();
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
    });
    
    $( '#btnPaymentPay' ).on( 'click', function( e )
    {
        var form    = $( '#vs_payment_payment_form' );
        $.ajax({
            type: form.attr( 'method' ),
            url: form.attr( 'action' ),
            data: form.serialize(),
            success: function( response )
            {
                //alert( response.data.paymentPrepareUrl );
                document.location   = VsPath( response.data.paymentPrepareUrl );
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
    });
    
    $( '#tablature_category_form_parent' ).combotree({
        url: $( '#tablature_category_form_parent' ).attr( 'data-url' ),
        prompt: '-- Select Parent Category --'
    });
    
    $( '#tablature_form_category_taxon' ).combotree({
        url: $( '#tablature_form_category_taxon' ).attr( 'data-url' ),
        prompt: $( '#tablature_form_category_taxon' ).attr( 'data-placeholder' )
    });
    
    $( '#formTablatureCategory' ).on( 'submit', function( e )
    {
        e.preventDefault();
        e.stopPropagation();
        
        var url     = $( this ).attr( "action" );
        var method  = $( this ).attr( "method" );
        var data    = $( this ).serialize();
        
        $.ajax({
            url : url,
            type: method,
            data : data
        }).done( function( response ) {
            document.location = VsPath( 'vs_wgp_tablature_index', {}, routes )
            //document.location = document.location;
        }).fail( function() {
              alert( 'CREATE CATEGORY ERROR !!!' );
        }).always( function() {
            //alert( 'always' );
        });
    });
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////
    // Manualy Open Dropdown Forms
    // https://stackoverflow.com/questions/25089297/avoid-dropdown-menu-close-on-click-inside
    //////////////////////////////////////////////////////////////////////////////////////////////////
    $( '.dropdown-toggle.topFormToggle' ).on( 'click', function ( e )
    {
        $( '.dropdown-menu.topForm' ).not( $( this ).next( '.dropdown-menu' ) ).each( function()
        {
            $( this ).hide();
        });
        $( this ).next( '.dropdown-menu' ).toggle();
    });
    
    $( document ).mouseup( function( e ) 
    {
        var container       = $( '.dropdown-menu.topForm' );
        var comboContainer  = $( '.combo-panel' );
    
        // if the target of the click isn't the container nor a descendant of the container
        if ( ! container.is( e.target )
            && container.has( e.target ).length === 0
            && ! $( '.dropdown-toggle.topFormToggle' ).is( e.target )
            && ! comboContainer.is( e.target )
            && ! ( comboContainer.find( e.target ).length > 0 )
        ) {
            container.hide();
        }
    });
});

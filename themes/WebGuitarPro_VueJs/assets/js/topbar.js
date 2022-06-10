require( '../css/topbar.css' );
require( './includes/submenu.js' );

import { VsPath } from './includes/fos_js_routes.js';

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
    
    $( '#formTablatureCategory' ).on( 'submit', function( e )
    {
        e.preventDefault();
        
        var url     = $( this ).attr( "action" );
        var method  = $( this ).attr( "method" );
        var data    = $( this ).serialize();
        
        $.ajax({
            url : url,
            type: method,
            data : data
        }).done( function( response ) {
            document.location = VsPath( 'vs_wgp_tablature_index' )
            //document.location = document.location;
        }).fail( function() {
              alert( 'LOGIN ERROR !!!' );
        }).always( function() {
            //alert( 'always' );
        });
    });
});

import { VsDisplayPassword } from '@/js/includes/password-generator.js';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bin/web-guitar-pro fos:js-routing:dump --format=json --target=public/shared_assets/js/fos_js_routes_application.json
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var routes  = require( '../../../../../public/shared_assets/js/fos_js_routes_application.json' );
import { VsPath } from '@/js/includes/fos_js_routes.js';

import { VsTranslator, VsLoadTranslations } from '@/js/includes/bazinga_js_translations.js';
VsLoadTranslations(['VSApplicationBundle']);

import { ChoosePlan, PayPlan, PaySubscription } from '../includes/pricing-plans.js';
import { SubmitCreditCardForm, SubmitPaymentForm } from '@@/js/Stripe/StripeJsV2.js';
import { SubmitPayumCreditCardForm } from '@@/js/Payum/Payum.js';

window.CreateSubscriptionSubmited    = false;
window.CancelSubscriptionSubmited    = false;

require( '@/js/includes/bootstrap-5/file-input.js' );
require( '../../css/profile.css' );

$( function()
{
    $( '#btnGeneratePassword' ).on( 'click', function ( e )
    {
        $.ajax({
            type: 'GET',
            url: VsPath( 'vs_application_json_get_passwords', { 'quantity': 1 } ),
            success: function ( data )
            {
                if ( data['status'] == 'ok' ) {
                    var password    = data['data']['passwords'][0];
                    
                    $( '#change_password_form_password_first' ).val( password );
                    $( '#change_password_form_password_second' ).val( password );
                    
                    var dialog  = VsDisplayPassword( password );
                } else {
                    alert( 'ERROR !!!' );
                }
            }, 
            error: function( XMLHttpRequest, textStatus, errorThrown )
            {
                alert( 'ERROR !!!' );
            }
        });
    });
    
    $( '.btnChoosePlan' ).on( 'click', function()
    {
        ChoosePlan( $( this ).attr( 'data-url' ) );
    });
    
    $( '.btnPayPlan' ).on( 'click', function()
    {
        PayPlan( $( this ).attr( 'data-url' ) );
    });
    
    $( '.btnPaySubscription' ).on( 'click', function()
    {
        PaySubscription( $( this ).attr( 'data-url' ) );
    });
    
    $( '#selectPricingPlanForm' ).on( 'submit', '#credit_card_form', SubmitCreditCardForm );
    $( '#selectPaymentMethodForm' ).on( 'submit', '#credit_card_form', SubmitCreditCardForm );
    $( '#payment-form' ).on( 'submit', SubmitPaymentForm );
    
    $( '#selectPricingPlanForm' ).on( 'submit', '#payum_credit_card_form', SubmitPayumCreditCardForm );
    $( '#selectPaymentMethodForm' ).on( 'submit', '#payum_credit_card_form', SubmitPayumCreditCardForm );
    
    $( '.btnCreateSubscription' ).on( 'click', function( e )
    {
        e.preventDefault();
        e.stopPropagation();
        
        if ( ! window.CreateSubscriptionSubmited ) {
            $.ajax({
                type: "GET",
                url: $( this ).attr( 'data-url' ),
                success: function( response )
                {
                    document.location   = VsPath( response.data.redirecrUrl, {}, routes );
                },
                error: function()
                {
                    alert( "CreateSubscription SYSTEM ERROR!!!" );
                }
            });
            
            window.CreateSubscriptionSubmited   = true;
        }
    });
    
    $( '.btnCancelSubscription' ).on( 'click', function( e )
    {
        e.preventDefault();
        e.stopPropagation();
        
        if ( ! window.CancelSubscriptionSubmited ) {
            $.ajax({
                type: "GET",
                url: $( this ).attr( 'data-url' ),
                success: function( response )
                {
                    document.location   = VsPath( response.data.redirecrUrl, {}, routes );
                },
                error: function()
                {
                    alert( "CancelSubscription SYSTEM ERROR!!!" );
                }
            });
            
            window.CancelSubscriptionSubmited   = true;
        }
    });
});

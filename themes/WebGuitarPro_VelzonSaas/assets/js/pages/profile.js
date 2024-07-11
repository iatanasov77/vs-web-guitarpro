//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bin/sugarbabes fos:js-routing:dump --format=json --target=public/shared_assets/js/fos_js_routes_application.json
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var routes  = require( '../../../../../public/shared_assets/js/fos_js_routes_application.json' );
import { VsPath } from '@/js/includes/fos_js_routes.js';

import { ChoosePlan, PayPlan, PaySubscription } from '../includes/pricing-plans.js';
import { SubmitCreditCardForm, SubmitPaymentForm } from '@@/js/Stripe/StripeJsV2.js';
import { SubmitPayumCreditCardForm } from '@@/js/Payum/Payum.js';

window.CreateSubscriptionSubmited    = false;
window.CancelSubscriptionSubmited    = false;

$( function()
{
    if( window.location.hash == '#subscriptions' ) { 
        var triggerEl   = document.querySelector( '#ProfileTabs a[data-bs-target="#subscriptions"]' );
        bootstrap.Tab.getInstance( triggerEl ).show();
    } else {
        //var triggerFirstTabEl = document.querySelector( '#ProfileTabs li:first-child a' )
        //bootstrap.Tab.getInstance(triggerFirstTabEl).show() // Select first tab
    }

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

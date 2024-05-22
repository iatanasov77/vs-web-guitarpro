import Velocity from 'velocity-animate';
import 'velocity-animate/velocity.ui';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// bin/web-guitar-pro fos:js-routing:dump --format=json --target=public/shared_assets/js/fos_js_routes_application.json
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var routes  = require( '../../../../../public/shared_assets/js/fos_js_routes_application.json' );
import { VsPath } from '@/js/includes/fos_js_routes.js';

import { VsSpinnerShow, VsSpinnerHide } from '@/js/includes/VsSpinner/vs_spinner.js';
//import { VsSpinnerShow, VsSpinnerHide } from '@/js/includes/vs_spinner.js';

window.PricingPlanFormSubmited      = false;
window.PaymentMethodFormSubmited    = false;

export function ChoosePlan( planFormUrl )
{
    $.ajax({
        type: "GET",
        url: planFormUrl,
        success: function( response )
        {
            $( '#selectPricingPlanForm' ).html( response );
            
            let supportRecurring    = $( '.rPaymentMethod:checked' ).attr( 'data-supportRecurring' );
            if ( ! supportRecurring ) {
                $( '#SetRecurringPayments' ).hide();
            }
            
            /** Bootstrap 5 Modal Toggle */
            const myModal = new bootstrap.Modal( '#plan-modal', {
                keyboard: false
            });
            myModal.show( $( '#plan-modal' ).get( 0 ) );
            
            //VsSpinnerShow( 'selectPricingPlanForm' );
        },
        error: function()
        {
            alert( "ChoosePlan SYSTEM ERROR!!!" );
        }
    });
}

export function PayPlan( planFormUrl )
{
    if ( ! window.PricingPlanFormSubmited ) {
        VsSpinnerShow( 'ProfileSubscriptions' );
    }
    
    $.ajax({
        type: "GET",
        url: planFormUrl,
        success: function( response )
        {
            $( '#selectPricingPlanForm' ).html( response );

            if ( ! window.PricingPlanFormSubmited ) {
                var formData    = new FormData( document.getElementById( 'PricingPlanForm' ) );
                handlePricingPlanPayment( formData );
                
                window.PricingPlanFormSubmited  = true;
            }
        },
        error: function()
        {
            VsSpinnerHide( 'ProfileSubscriptions' );
            alert( "PayPlan SYSTEM ERROR!!!" );
        }
    });
}

export function PaySubscription( paymentMethodFormUrl )
{
    $.ajax({
        type: "GET",
        url: paymentMethodFormUrl,
        success: function( response )
        {
            $( '#selectPaymentMethodForm' ).html( response );
            
            /** Bootstrap 5 Modal Toggle */
            const myModal = new bootstrap.Modal( '#payment-modal', {
                keyboard: false
            });
            myModal.show( $( '#payment-modal' ).get( 0 ) );
        },
        error: function()
        {
            alert( "PaySubscription SYSTEM ERROR!!!" );
        }
    });
}

function GetStripeCreditCardForm( url, modalId, contentId )
{
    /** Bootstrap 5 Modal Toggle */
    const myModal = new bootstrap.Modal( '#' + modalId, {
        keyboard: false
    });
    myModal.hide( $( '#' + modalId ).get( 0 ) );
    VsSpinnerShow( contentId );
    
    $.ajax({
        type: "GET",
        url: url,
        success: function( response )
        {
            $( '.modal-title' ).text( 'Enter Your Card Details' );
            $( '.modal-body' ).attr( 'style', '' );
            $( '.modal-body' ).addClass( 'credit-card' );
            $( '#' + contentId ).addClass( 'credit-card' );
                        
            $( '#' + contentId ).html( response );
            
            myModal.show( $( '#' + modalId ).get( 0 ) );
            
            //VsSpinnerHide( 'ProfileSubscriptions' );
            VsSpinnerHide( contentId );
        },
        error: function()
        {
            alert( "GetStripeCreditCardForm SYSTEM ERROR!!!" );
        }
    });
}

function GetPayumCreditCardForm( url, modalId, contentId )
{
    /** Bootstrap 5 Modal Toggle */
    const myModal = new bootstrap.Modal( '#' + modalId, {
        keyboard: false
    });
    myModal.hide( $( '#' + modalId ).get( 0 ) );
    
    $.ajax({
        type: "GET",
        url: url,
        success: function( response )
        {
            $( '.modal-title' ).text( 'Enter Your Card Details' );
            $( '.modal-body' ).attr( 'style', '' );
            $( '.modal-body' ).addClass( 'credit-card' );
            $( '#' + contentId ).addClass( 'credit-card' );
                        
            $( '#' + contentId ).html( response );
            
            myModal.show( $( '#' + modalId ).get( 0 ) );
            VsSpinnerHide( 'ProfileSubscriptions' );
        },
        error: function()
        {
            alert( "GetPayumCreditCardForm SYSTEM ERROR!!!" );
        }
    });
}

function GetPayumObtainCouponCodeForm( url, modalId, contentId )
{
    /** Bootstrap 5 Modal Toggle */
    const myModal = new bootstrap.Modal( '#' + modalId, {
        keyboard: false
    });
    myModal.hide( $( '#' + modalId ).get( 0 ) );
    
    $.ajax({
        type: "GET",
        url: url,
        success: function( response )
        {
            $( '.modal-title' ).text( 'Enter Coupon Code' );
            $( '.modal-body' ).attr( 'style', '' );
            $( '.modal-body' ).addClass( 'credit-card' );
            $( '#' + contentId ).addClass( 'credit-card' );
                        
            $( '#' + contentId ).html( response );
            
            myModal.show( $( '#' + modalId ).get( 0 ) );
            VsSpinnerHide( 'ProfileSubscriptions' );
        },
        error: function()
        {
            alert( "GetPayumObtainCouponCodeForm SYSTEM ERROR!!!" );
        }
    });
}

function handlePricingPlanPayment( formId, modalId, contentId )
{
    var formData    = new FormData( document.getElementById( formId ) );
    if ( ! formData.has( 'pricingPlan' ) ) {
        //formData.append( 'pricingPlan', $ )
    }
    
    VsSpinnerShow( 'selectPricingPlanForm' );
    $.ajax({
        type: "POST",
        url: $( '#' + formId ).attr( 'action' ),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function( response )
        {
            VsSpinnerHide( 'selectPricingPlanForm' );
            
            //alert( response.data.paymentPrepareUrl );
            //alert( response.data.gatewayFactory );
            switch ( response.data.gatewayFactory ) {
                //case 'stripe_checkout':
                case 'stripe_js':
                    var creditCardFormUrl   = VsPath( response.data.paymentPrepareUrl, {}, routes );
                    GetStripeCreditCardForm( creditCardFormUrl, modalId, contentId );
                    
                    break;
                case 'paypal_pro_checkout':
                case 'authorize_net_aim':
                    var creditCardFormUrl   = VsPath( response.data.paymentPrepareUrl, {}, routes );
                    GetPayumCreditCardForm( creditCardFormUrl, modalId, contentId );
                    
                    break;
                case 'telephone_call':
                    var obtainCouponCodeFormUrl = VsPath( response.data.paymentPrepareUrl, {}, routes );
                    GetPayumObtainCouponCodeForm( obtainCouponCodeFormUrl, modalId, contentId );
                    
                    break;
                default:
                    document.location   = VsPath( response.data.paymentPrepareUrl, {}, routes );
            }
        },
        error: function()
        {
            VsSpinnerHide( 'selectPricingPlanForm' );
            alert( "handlePricingPlanPayment SYSTEM ERROR!!!" );
        }
    });
}

$( function()
{
    $( '#selectPricingPlanForm' ).on( 'change', '.rPaymentMethod', function()
    {
        var selected    = $( this ).attr( 'data-paymentMethod' );
        switch( selected ) {
            case 'bank-transfer' :
                $( '#BankTransferInfo' ).show();
                break;
            default:
                $( '#BankTransferInfo' ).hide();
        }
        
        let supportRecurring    = $( '.rPaymentMethod:checked' ).attr( 'data-supportRecurring' );
        if ( supportRecurring ) {
            $( '#SetRecurringPayments' ).show();
        } else {
            $( '#select_pricing_plan_form_paymentMethod_setRecurringPayments' ).prop( 'checked', false );
            $( '#SetRecurringPayments' ).hide();
        }
    });
    
    $( '#selectPaymentMethodForm' ).on( 'change', '.rPaymentMethod', function()
    {
        var selected    = $( this ).attr( 'data-paymentMethod' );
        switch( selected ) {
            case 'bank-transfer' :
                $( '#BankTransferInfo' ).show();
                break;
            default:
                $( '#BankTransferInfo' ).hide();
        }
        
        let supportRecurring    = $( '.rPaymentMethod:checked' ).attr( 'data-supportRecurring' );
        if ( supportRecurring ) {
            $( '#SetRecurringPayments' ).show();
        } else {
            $( '#select_pricing_plan_form_paymentMethod_setRecurringPayments' ).prop( 'checked', false );
            $( '#SetRecurringPayments' ).hide();
        }
    });
    
    $( ".modal" ).each( function( l ) {
        $( this ).on( "show.bs.modal", function( l ) {
            var o   = $( this ).attr( "data-easein" );
            
            "shake" == o ? $( ".modal-dialog" ).velocity( "callout." + o ) : 
            "pulse" == o ? $( ".modal-dialog" ).velocity( "callout." + o ) :
            "tada" == o ? $( ".modal-dialog" ).velocity( "callout." + o ) :
            "flash" == o ? $( ".modal-dialog" ).velocity( "callout." + o ) :
            "bounce" == o ? $( ".modal-dialog" ).velocity( "callout." + o ) :
            "swing" == o ? $( ".modal-dialog" ).velocity( "callout." + o ) :
            $( ".modal-dialog" ).velocity( "transition." + o )
        });
    });
    
    $( '#selectPricingPlanForm' ).on( 'click', '#SelectPricingPlanSubmit', function ( e ) {
        e.preventDefault();
        e.stopPropagation();
        
        if ( ! window.PricingPlanFormSubmited ) {
            handlePricingPlanPayment( 'PricingPlanForm', 'plan-modal', 'selectPricingPlanForm' );
            
            window.PricingPlanFormSubmited  = true;
        }
    });
    
    $( '#selectPaymentMethodForm' ).on( 'click', '#SelectPaymentMethodSubmit', function ( e ) {
        e.preventDefault();
        e.stopPropagation();
        
        if ( ! window.PaymentMethodFormSubmited ) {
            handlePricingPlanPayment( 'PaymentMethodForm', 'payment-modal', 'selectPaymentMethodForm' );
            
            window.PaymentMethodFormSubmited  = true;
        }
    });
    
    $( '.btnRgister' ).on( 'click', function ( e ) {
        document.location = $( this ).attr( 'data-url' );
    });
});


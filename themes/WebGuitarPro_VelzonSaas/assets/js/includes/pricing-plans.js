import { handlePricingPlanPayment } from '@@@@/js/includes/pricing_plan.js';

import Velocity from 'velocity-animate';
import 'velocity-animate/velocity.ui';

window.PricingPlanFormSubmited      = false;
window.PaymentMethodFormSubmited    = false;

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
            $( '#select_payment_method_form_paymentMethod_setRecurringPayments' ).prop( 'checked', false );
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


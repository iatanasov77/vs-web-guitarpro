/**
 * THIS IS MY LOGIC
 */
$( function () {

    $( '#credit_card_form' ).on( 'submit', function( e ) {
        e.preventDefault();

        // Disable the submit button to prevent repeated clicks
        $( '#btnPaymentPay' ).prop( 'disabled', true );
        
        $form = $( '<form id="payment-form" action="' + $( '#credit_card_form_captureUrl' ).val() + '" method="POST"></form>' );
        $form.append( '<input type="text" size="20" data-stripe="number" value="' + $( '#credit_card_form_number' ).val() + '">' );
        $form.append( '<input type="text" size="4" data-stripe="cvc" value="' + $( '#credit_card_form_cvv' ).val() + '">' );
        $form.append( '<input type="text" size="2" data-stripe="exp-month" value="' + $( '#credit_card_form_ccmonth' ).val() + '">' );
        $form.append( '<input type="text" size="4" data-stripe="exp-year" value="' + $( '#credit_card_form_ccyear' ).val() + '">' );
        $form.appendTo( '#RealPaymentFormContainer' ).submit();
        
        return false;
    });

    ///////////////////////////////////////////////////////
    // From Payum
    //////////////////////////////////////////////////////
    $( '#RealPaymentFormContainer' ).on( 'submit', '#payment-form', function( e ) {
        e.preventDefault();
        
        var publishableKey  = $( '#credit_card_form_captureUrl' ).attr( 'data-capturekey' );
        var $form           = $(this);

        // This identifies your website in the createToken call below
        Stripe.setPublishableKey( publishableKey );
        Stripe.card.createToken($form, stripeResponseHandler);
        
        // Prevent the form from submitting with the default action
        return false;
    });

    var stripeResponseHandler = function(status, response) {
        var $form = $('#payment-form');

        if (response.error) {
            // Show the errors on the form
            $form.find('.payment-errors').text(response.error.message);
            $form.find('button').prop('disabled', false);
        } else {
            // token contains id, last4, and card type
            var token = response.id;
            // Insert the token into the form so it gets submitted to the server
            $form.append($('<input type="hidden" name="stripeToken" />').val(token));
            // and re-submit
            $form.get(0).submit();
        }
    };
});
    
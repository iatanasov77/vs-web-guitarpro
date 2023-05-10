import {loadStripe} from '@stripe/stripe-js';

const publishableKey    = 'pk_test_......';
//const stripe            = Stripe( publishableKey );
const stripe            = loadStripe( publishableKey );

const appearance = {
  theme: 'stripe',

  variables: {
    colorPrimary: '#0570de',
    colorBackground: '#ffffff',
    colorText: '#30313d',
    colorDanger: '#df1b41',
    fontFamily: 'Ideal Sans, system-ui, sans-serif',
    spacingUnit: '2px',
    borderRadius: '4px',
    // See all possible variables below
  }
};

$( function () {
    /*
    
    
    const paymentIntent = stripe.paymentIntents.create({
        amount: 1099,
        currency: 'bgn',
        payment_method_types: ['card'],
    });
    
    var clientSecret    = paymentIntent.client_secret;

    // Pass the appearance object to the Elements instance
    const elements = stripe.elements({
        clientSecret,
        appearance
    });
    
    
    */
});

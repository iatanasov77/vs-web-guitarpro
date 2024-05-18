import Analytics from 'analytics'
import googleAnalytics from '@analytics/google-analytics'

//console.log( 'IS_PRODUCTION: ' + IS_PRODUCTION );
if ( IS_PRODUCTION ) {
    let analyticsMeasurementId  = $( '#content' ).attr( 'data-analyticsMeasurementId' );
    //alert( analyticsMeasurementId );
    
    const analytics = Analytics({
        app: 'vankosoft-webguitarpro',
        plugins: [
            googleAnalytics({
                measurementIds: [analyticsMeasurementId]
            })
        ]
    });
    
    /* Track a page view */
    analytics.page();
}

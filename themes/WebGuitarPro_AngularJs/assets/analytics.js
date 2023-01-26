import Analytics from 'analytics'
import googleAnalytics from '@analytics/google-analytics'

//console.log( 'IS_PRODUCTION: ' + IS_PRODUCTION );
if ( IS_PRODUCTION ) {
    const analytics = Analytics({
        app: 'awesome-app',
        plugins: [
            googleAnalytics({
                measurementIds: ['UA-49280231-1']
            })
        ]
    });
    
    /* Track a page view */
    analytics.page();
}

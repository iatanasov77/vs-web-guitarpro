$( function()
{
	$( '#gateway_config_form_factoryName' ).on( 'change', function( e ) {
		$.ajax({
            type: 'GET',
            url: $(this).attr( 'data-getConfigUrl' ),
            data: {
            	factory: $(this).val()
            },
            success: function ( data ) {
                $( '#gatewayConfigOptions' ).html( data.gatewayConfig );
                $( '#gatewaySandboxConfigOptions' ).html( data.sandboxConfig );
            }, 
            error: function( XMLHttpRequest, textStatus, errorThrown ) {
            	alert( 'FATAL ERROR!!!' );
            }
        });
	});
});

$( function()
{
	$( '#formLogin' ).on( 'submit', function( e )
	{
		e.preventDefault();
		
		var url		= $( this ).attr( "action" );
		var method	= $( this ).attr( "method" );
		var data	= $( this ).serialize();
		
		$.ajax({
			url : url,
			type: method,
			data : data
		}).done( function( response ) {
			$( "#server-results" ).html( response );
		}).fail( function( msg ) {
			  console.log( msg );
		}).always( function() {
			// alert( 'always' );
		});
	});
});

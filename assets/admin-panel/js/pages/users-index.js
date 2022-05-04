require( '../includes/resource-delete.js' );

$( function()
{
    $( '.btnUserInfo' ).on( 'click', function()
    {
        $.ajax({
            type: "GET",
            url: $( this ).attr( 'data-url' ),
            success: function( response )
            {
                $( '#cardUserInfo > div.card-body' ).html( response );
                $( '#modalUserInfo' ).modal( 'toggle' );
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
    });

    $( '#modalUserInfo' ).on( 'submit', '#formUserInfo', function( e )
    {
        e.preventDefault();
        e.stopPropagation();
        
        var formData = new FormData( this );
        $.ajax({
            type: $( this ).attr( 'method' ),
            url: $( this ).attr( 'action' ),
            data: formData,
            success: function ( data ) {
                document.location = document.location;
            }, 
            error: function( XMLHttpRequest, textStatus, errorThrown ) {
                alert( 'FATAL ERROR!!!' );
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
    $( '#btnSaveUserInfo' ).on( 'click', function( e )
    {
        $( '#formUserInfo' ).submit();
    });
    
    $( '#modalUserInfo' ).on( 'change', '.custom-file-input', function( e )
    {
        let fileInput   = require( '../includes/file-input.js' );
        fileInput.setUploadFile( $( this ) );
    })
});

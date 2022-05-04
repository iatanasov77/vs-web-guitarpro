require( '../includes/resource-delete.js' );
//require ( 'jquery-duplicate-fields/jquery.duplicateFields.js' );

$( function()
{
    $( '.btnUploadFiles' ).on( 'click', function()
    {
        $.ajax({
            type: "GET",
            url: $( this ).attr( 'data-url' ),
            success: function( response )
            {
                $( '#cardUploadFile > div.card-body' ).html( response );
                $( '#modalUploadFile' ).modal( 'toggle' );
            },
            error: function()
            {
                alert( "SYSTEM ERROR!!!" );
            }
        });
    });

    $( '#modalUploadFile' ).on( 'submit', '#formUploadFile', function( e )
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
    
    $( '#btnSaveFile' ).on( 'click', function( e )
    {
        $( '#formUploadFile' ).submit();
    });
    
    $( '#modalUploadFile' ).on( 'change', '.custom-file-input', function( e )
    {
        let fileInput   = require( '../includes/file-input.js' );
        fileInput.setUploadFile( $( this ) );
    })
});

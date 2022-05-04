export function VsFormSubmit( formData, submitUrl, redirectUrl )
{
    $.ajax({
        type: 'POST',
        url: submitUrl,
        data: formData,
        success: function ( data ) {
            document.location = redirectUrl;
        }, 
        error: function( XMLHttpRequest, textStatus, errorThrown ) {
            alert( 'FATAL ERROR!!!' );
        },
        cache: false,
        contentType: false,
        processData: false
    });
}

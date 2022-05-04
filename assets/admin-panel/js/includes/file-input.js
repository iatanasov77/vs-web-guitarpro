function setUploadFile( jqueryObject )
{
    var fileName  = jqueryObject.val();
        
    var baseFileUnix    = fileName.split(/[\\\/]/).pop();
    var baseFileWindows = fileName.split(/[\\\/]/).pop();
    //alert( "Unix File: " + baseFileUnix );
    //alert( "Windows File: " + baseFileWindows );

    // Maybe Unix File Split Work and for Windows Too
    jqueryObject.next( '.form-control-file' ).addClass( "selected" ).html( baseFileUnix );
}

$( function()
{
    /**
     * Not Work for Ajax loaded form.
     * For Ajax loaded forms need to be delegated and this script to loaded as module.
     */
    $( '.custom-file-input' ).on( 'change', function()
    {
        setUploadFile( $( this ) );
    })
});

module.exports = {
    setUploadFile
};

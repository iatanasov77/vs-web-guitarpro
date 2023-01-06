const bootstrap = require( 'bootstrap' );

$( function()
{
	//////////////////////
	//	Clone Page
	//////////////////////
	$( '.pageClone' ).on( 'click', function ( e )
	{
		$( '#formClone' ).attr( 'action', $( this ).attr( 'data-url' ) );
		
		/** Bootstrap 5 Modal Toggle */
        const myModal = new bootstrap.Modal('#page-clone-modal', {
            keyboard: false
        });
        myModal.show( $( '#page-clone-modal' ).get( 0 ) );
	});
	
	$( '#btnSaveFormClone' ).on( 'click', function ( e )
	{
		$( '#formClone' ).submit();
	});
	
	$( '#formClone' ).on( 'submit', function ( e )
	{
		e.stopPropagation();
		
		$.post( $( this ).attr( 'action' ), function ( data )
	    {
	        //alert( 'FORM SUBMIT' );
	        
	    }).done(function()
	    {
	        //alert( "DONE!" );
	    })
	    .fail(function()
	    {
	    	//alert( 'ERROR!' );
	    })
	    .always(function()
	    {
	    	//alert( 'ALWAYS!' );
	    });
	});
	
	//////////////////////
	//	Preview Page
	//////////////////////
	$( '.pagePreview' ).on( 'click', function ( e )
	{
		$( '#preview_page_form_pagePreviewUrl' ).val( $( this ).attr( 'data-url' ) )
		
		/** Bootstrap 5 Modal Toggle */
        const myModal = new bootstrap.Modal('#page-preview-modal', {
            keyboard: false
        });
        myModal.show( $( '#page-preview-modal' ).get( 0 ) );
	});
	
	$( '#btnSaveFormPreview' ).on( 'click', function ( e )
	{
		$( '#formPreview' ).submit();
	});
	
	$( '#formPreview' ).on( 'submit', function ( e )
	{
		e.stopPropagation();
		e.preventDefault();
		
		/** Bootstrap 5 Modal Toggle */
        const myModal = new bootstrap.Modal('#page-preview-modal', {
            keyboard: false
        });
        myModal.show( $( '#page-preview-modal' ).get( 0 ) );
        
		var layout		= $( '#preview_page_form_layout' ).val();
		var layoutParts	= layout.split( "/" );
		switch ( layoutParts[0] ) {
			case 'website':
				var urlPreview	= 'http://vankosoft.lh' + $( '#preview_page_form_pagePreviewUrl' ).val() + '?layout=' + layout;
				break;
			case 'blog':
				var urlPreview	= 'http://blog.vankosoft.lh' + $( '#preview_page_form_pagePreviewUrl' ).val() + '?layout=' + layout;
				break;
			default:
				var urlPreview	= $( '#preview_page_form_pagePreviewUrl' ).val() + '?layout=' + layout;
		}
		
        var win = window.open( urlPreview, '_blank' );
        if ( win ) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert( 'Please allow popups for this website' );
        }
	});
	
 });
 
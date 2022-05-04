require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );

$( function()
{
	$.ajax({
        type: "GET",
        url: $( '#page_category_form_parent' ).attr( 'data-url' ),
        dataType: 'json',
        success: function( data )
        {
        /*
        	var comboTree = $( '#page_category_form_parent' ).comboTree({
        	    source : data,
        	    selected: [$( '#page_category_form_parentId' ).val()]
        	});
        	
        	$( '#page_category_form_parentTreeSelect' ).on( 'change', function() {
        		console.log( 'Set Category ID - ' + comboTree.getSelectedItemsId() );
        		$( '#page_category_form_parentId' ).val( comboTree.getSelectedItemsId() );
        	});
    	*/
        },
        error:function( request, status, error )
        {
            console.log( "ajax call went wrong:" + request.responseText );
        }
    });
    
});

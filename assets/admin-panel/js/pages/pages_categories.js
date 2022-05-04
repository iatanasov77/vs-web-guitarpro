require( '@kanety/jquery-simple-tree-table/dist/jquery-simple-tree-table.js' );
require( 'bootstrap-gtreetable/dist/bootstrap-gtreetable.css' );
//require( 'bootstrap-gtreetable/dist/bootstrap-gtreetable.js' );
require( 'bootstrap-gtreetable/src/js/bootstrap-gtreetable.js' );

$( function()
{
/*
	$( '#tblCategories_SimpleTreeTable' ).simpleTreeTable({
		expander: $( '#expander' ),
		collapser: $( '#collapser' )
	});
	
	$('#collapsed').simpleTreeTable({
	  opened: 'all',
	});
*/
	
	// Documentation: https://github.com/gilek/bootstrap-gtreetable
	////////////////////////////////////////////////////////////////////
	$( '#tblCategories_GTreeTable' ).gtreetable({
		'manyroots': true,
		'readonly': false,
		
		'source': function ( id ) {
			return {
				type: 'GET',
				url: $( '#tblCategories_GTreeTable' ).attr( 'data-sourceUrl' ),
				data: { 'parentTaxonId': id },
				dataType: 'json',
				error: function( XMLHttpRequest ) {
					alert( 'GTreeTable ERROR !!!' );
					alert( XMLHttpRequest.status + ': ' + XMLHttpRequest.responseText );
				}
  	      	}
  	    },
  	    'onSave': function( oNode ) {
			return jQuery.ajax({
				type: 'POST',
				url: !oNode.isSaved() ? '/gtreetable/nodeCreate' : $( '#tblCategories_GTreeTable' ).attr( 'data-updateUrl' ) + oNode.getId(),
				data: {
					parent: oNode.getParent(),
			        name: oNode.getName(),
			        position: oNode.getInsertPosition(),
			        related: oNode.getRelatedNodeId()
				},
				dataType: 'json',
				success: function( response ) {
       				//alert( response.status );
                	if ( response.status == 'SUCCESS' ) {
                		location.reload();
                	} else {
                		alert( 'ERROR !!!' );
                	}
                },
				error: function( xhr, status, error ) {
                    var err = eval( "(" + xhr.responseText + ")" );
  					alert( err.Message );
                }
			});        
		},
  	    "onDelete": function ( oNode ) {
            return {
                type: 'DELETE',
                url: $( '#tblCategories_GTreeTable' ).attr( 'data-deleteUrl' ) + oNode.getId(),
                dataType: 'json',
                success: function( response ) {
                	//alert( response.status )
                	if ( response.status == 'SUCCESS' ) {
                		location.reload();
                	}
                },
                error: function( xhr, status, error ) {
                	
                    var err = eval( "(" + xhr.responseText + ")" );
  					alert( err.Message );
                }
            };
        },
        
        'draggable': true,
		'onMove': function ( oSource, oDestination, position ) {
			return {
				type: 'POST',
				url: $( '#tblCategories_GTreeTable' ).attr( 'data-moveUrl' ) + oSource.getId() + '-' + oDestination.getId() + '-' + position,
				data: {
					related: oDestination.getId(),
					position: position
				},
				dataType: 'json',
				success: function( response ) {
                	if ( response.status != 'SUCCESS' ) {
                		alert( 'ERROR !!!' );
                		location.reload();
                	}
                },
				error: function( xhr, status, error ) {
					alert( $( '#tblCategories_GTreeTable' ).attr( 'data-moveUrl' ) );
					alert( xhr.responseText );
                    //var err = eval( "(" + xhr.responseText + ")" );
  					//alert( err.Message );
                }
			}; 
		}
  	});
});

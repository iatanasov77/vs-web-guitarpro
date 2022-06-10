require( '@kanety/jquery-simple-tree-table/dist/jquery-simple-tree-table.js' );

$( function()
{
    if ( uncategorizedTablatures <= 0 ) {
        $( '#uncategorized-tablatures' ).hide();
    }
    
    $( '#tblTablatures' ).simpleTreeTable({
        opened: [0]
    });
});

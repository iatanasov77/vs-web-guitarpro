
/**
 * Create A Json String From EasyUi Combo Tree Checked Values
 */
function createCheckedTreeElement( elementName, tree )
{
    var element = $( "<input>" )
                    .attr( "type", "hidden" )
                    .attr( "name", elementName )
                    .val( JSON.stringify( tree ) );
    
    return element;
}

module.exports = {
    createCheckedTreeElement
};

//  Search menu dropdown on Topbar
export function initTopbarSearch() {
    var searchOptions   = document.getElementById( "custom-search-close-options" );
    var searchInput     = document.getElementById( "custom-search-options" );
    
    if ( searchInput ) {
        if ( searchInput.value.length ) {
            searchOptions.classList.remove("d-none");
        }
        
        searchInput.addEventListener( "focus", function () {
            var inputLength = searchInput.value.length;
            if ( inputLength > 0 ) {
                searchOptions.classList.remove("d-none");
            } else {
                searchOptions.classList.add( "d-none" );
            }
        });
        
        searchInput.addEventListener( "keyup", function ( event ) {
            var inputLength = searchInput.value.length;
            if ( inputLength > 0 ) {
                searchOptions.classList.remove( "d-none" );
            } else {
                searchOptions.classList.add( "d-none" );
            }
        });
    }
}

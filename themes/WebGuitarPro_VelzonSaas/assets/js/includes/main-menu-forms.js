require( 'jquery-easyui/css/easyui.css' );
require( 'jquery-easyui/js/jquery.easyui.min.js' );

import { VsRemoveDuplicates } from '@/js/includes/vs_remove_duplicates.js';
import { EasyuiCombobox } from 'jquery-easyui-extensions/EasyuiCombobox.js';
import { initTopbarSearch } from './topbar-search-form.js';

$( function()
{
    initTopbarSearch();
    $( '#TopbarSearchForm' ).on( 'submit', function( e )
    {
        e.preventDefault();
        
        let searchString    = $( '#custom-search-options' ).val();
        if ( ! searchString.length ) {
            return false;
        }
        
        this.submit();
    });
    
    let categorySelector    = "#tablature_form_category_taxon";
    EasyuiCombobox( $( categorySelector ), {
        required: false,
        multiple: true,
        checkboxId: "tablature_category_taxon",
        values: {},
    });
    VsRemoveDuplicates();
});
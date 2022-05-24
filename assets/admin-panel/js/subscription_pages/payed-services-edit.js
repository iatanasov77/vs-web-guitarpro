require ( 'jquery-duplicate-fields/jquery.duplicateFields.js' );

$( function ()
{
    $( '.SubscriptionPeriodsContainer' ).duplicateFields({
        btnRemoveSelector: ".btnRemoveField",
        btnAddSelector:    ".btnAddField"
    });
});

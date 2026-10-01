//Del tema de URL's remote.php
/*
jQuery(function() {
    alert( 'esd' );
});
*/
jQuery( document ).ready(function( $ ) {
    jQuery( '#save-stuff' ).on( 'click', function( event ) {
        var myStuff = jQuery( '#my-stuff' ).val();
        var data = {
            'action': 'send_stuff',
            'my-stuff': myStuff
        };
        //We can also pass the url value separately from ajaxurl from
        jQuery.post( ajaxurl, data, function(response){
            alert('Got this from the server: ' + response );
        }); 
    });
});
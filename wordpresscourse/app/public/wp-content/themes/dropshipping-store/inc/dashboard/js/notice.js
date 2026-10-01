jQuery(document).ready(function($){

    $(document).on('click', '#dropshipping-store-welcome-notice .notice-dismiss', function(){

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'dropshipping_store_dismiss_notice'
            }
        });

    });

});
( function( api ) {

	// Extends our custom "dropshipping-store" section.
	api.sectionConstructor['dropshipping-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

(function ($) {
    function ResetDemoSettings() {
        if (!confirm("Are you sure you want to reset demo import settings?")) return;

        $.post(ajaxurl, { action: 'dropshipping_store_reset_demo_import_settings' }, function () {
            location.reload();
        });
    }

    window.ResetDemoSettings = ResetDemoSettings;
})(jQuery);

(function ($, wp) {
    function ResetGlobalColor() {
        if (confirm("Are you sure you want to reset global color settings?")) {
            wp.customize.instance("dropshipping_store_first_color").set("#ffcc05");
        }
    }

    window.ResetGlobalColor = ResetGlobalColor;
})(jQuery, wp);

jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

function dropshipping_store_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function dropshipping_store_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

var dropshipping_store_Keyboard_loop = function (elem) {
    var dropshipping_store_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var dropshipping_store_firstTabbable = dropshipping_store_tabbable.first();
    var dropshipping_store_lastTabbable = dropshipping_store_tabbable.last();

    /*redirect last tab to first input*/
    dropshipping_store_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            dropshipping_store_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    dropshipping_store_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            dropshipping_store_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){
	$('.mobiletoggle').click(function () {
        dropshipping_store_Keyboard_loop($('.menu-brand.primary-nav'));
    });
    
    $(document).ready(function(){
		$(".product-cat").hide();
	    $("button.product-btn").click(function(){
	        $(".product-cat").toggle();
	    });
	}); 
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

// sticky header
(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

})( jQuery );


jQuery(document).ready(function() {
	var owl = jQuery('#product-slide .owl-carousel');
		owl.owlCarousel({
			nav: true,
			autoplay:false,
			autoplayTimeout:2000,
			autoplayHoverPause:true,
			loop: true,
			navText : ['<i class="fas fa-long-arrow-alt-left"></i>','<i class="fas fa-long-arrow-alt-right"></i>'],
			responsive: {
			  0: {
			    items: 1
			  },
			  600: {
			    items: 2
			  },
			  1000: {
			    items: 3
			}
		}
	})
});

// sticky copyright
(function ($) {
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        var sticky = $('.sticky-copyright');

        if (sticky.length) {
            if (scroll >= 100) {
                sticky.addClass('fixed-copyright');
            } else {
                sticky.removeClass('fixed-copyright');
            }
        }
    });
})(jQuery);

/* Progress Bar */
document.addEventListener("DOMContentLoaded", function () {
    const dropshipping_store_progressBar =
        document.getElementById("dropshipping_store_elemento_progress_bar");
    if (!dropshipping_store_progressBar) return;
    window.addEventListener("scroll", function () {
        const dropshipping_store_scrollTop =
            document.documentElement.scrollTop || document.body.scrollTop;
        const dropshipping_store_height =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        const dropshipping_store_scrolled =
            (dropshipping_store_scrollTop / dropshipping_store_height) * 100;
        dropshipping_store_progressBar.style.width =
            dropshipping_store_scrolled + "%";
    });
});

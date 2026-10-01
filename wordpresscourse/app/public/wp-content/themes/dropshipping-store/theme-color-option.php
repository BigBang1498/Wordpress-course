<?php
	$dropshipping_store_first_color = get_theme_mod('dropshipping_store_first_color');
	$dropshipping_store_custom_css = '';

	/*------------------ Global First Color -----------*/

	if ($dropshipping_store_first_color) {
		$dropshipping_store_custom_css .= ':root {';
		$dropshipping_store_custom_css .= '--first-theme-color: ' . esc_attr($dropshipping_store_first_color) . ' !important;';
		$dropshipping_store_custom_css .= '} ';
	}

	/*---------------------------Width Layout -------------------*/
	$dropshipping_store_width_layout_options = get_theme_mod( 'dropshipping_store_width_layout_options','Default');
    if($dropshipping_store_width_layout_options == 'Default'){
		$dropshipping_store_custom_css .='body{';
			$dropshipping_store_custom_css .='max-width: 100%;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_width_layout_options == 'Container Layout'){
		$dropshipping_store_custom_css .='body{';
			$dropshipping_store_custom_css .='width: 100%; padding-right:15px; padding-left: 15px; margin-right:auto; margin-left:auto;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_width_layout_options == 'Box Layout'){
		$dropshipping_store_custom_css .='body{';
			$dropshipping_store_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$dropshipping_store_custom_css .='}';
	}

	/*--------------------Slider Content Layout ---------------*/
	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_slider_content_layout','Left');
    if($dropshipping_store_theme_lay == 'Left'){
		$dropshipping_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$dropshipping_store_custom_css .='text-align:left;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Center'){
		$dropshipping_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$dropshipping_store_custom_css .='text-align:center;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Right'){
		$dropshipping_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$dropshipping_store_custom_css .='text-align:right;';
		$dropshipping_store_custom_css .='}';
	}

	/*------------ Slider Opacity -------------------*/
	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_slider_opacity','0.7');
	if($dropshipping_store_theme_lay == '0'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.1'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.1';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.2'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.2';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.3'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.3';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.4'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.4';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.5'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.5';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.6'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.6';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.7'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.7';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.8'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.8';
	$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == '0.9'){
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='opacity:0.9';
	$dropshipping_store_custom_css .='}';
	}

	//slider heading color
	$dropshipping_store_slider_heading_color = get_theme_mod('dropshipping_store_slider_heading_color');
	$dropshipping_store_custom_css .='#slider .inner_carousel h1{';
		$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_slider_heading_color).';';
	$dropshipping_store_custom_css .='}';

	//slider text color
	$dropshipping_store_slider_text_color = get_theme_mod('dropshipping_store_slider_text_color');
	$dropshipping_store_custom_css .='#slider .inner_carousel p{';
		$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_slider_text_color).';';
	$dropshipping_store_custom_css .='}';

	//slider button text color
	$dropshipping_store_slider_btn_text_color = get_theme_mod('dropshipping_store_slider_btn_text_color');
	$dropshipping_store_custom_css .='#slider .more-btn a{';
		$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_slider_btn_text_color).';';
	$dropshipping_store_custom_css .='}';

	//slider button bg color
	$dropshipping_store_slider_btn_bg_color = get_theme_mod('dropshipping_store_slider_btn_bg_color');
	$dropshipping_store_custom_css .='#slider .more-btn a{';
		$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_slider_btn_bg_color).';';
	$dropshipping_store_custom_css .='}';

	/*-------------- Footer Text -------------------*/
	$dropshipping_store_footer_text_align = get_theme_mod('dropshipping_store_footer_text_align');
	$dropshipping_store_custom_css .='.copyright-wrapper{';
		$dropshipping_store_custom_css .='text-align: '.esc_attr($dropshipping_store_footer_text_align).';';
	$dropshipping_store_custom_css .='}';
	$dropshipping_store_custom_css .='
	@media screen and (max-width:575px) {
		.copyright-wrapper{';
			$dropshipping_store_custom_css .='text-align: center;'.esc_attr($dropshipping_store_footer_text_align).'';
	$dropshipping_store_custom_css .='} }';

	$dropshipping_store_footer_text_padding = get_theme_mod('dropshipping_store_footer_text_padding');
	$dropshipping_store_custom_css .='.copyright-wrapper{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_footer_text_padding).'px !important; padding-bottom: '.esc_attr($dropshipping_store_footer_text_padding).'px !important;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_footer_bg_color = get_theme_mod('dropshipping_store_footer_bg_color');
	$dropshipping_store_custom_css .='.footer-wp{';
		$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_footer_bg_color).';';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_footer_bg_image = get_theme_mod('dropshipping_store_footer_bg_image');
	if($dropshipping_store_footer_bg_image != false){
		$dropshipping_store_custom_css .='.footer-wp{';
			$dropshipping_store_custom_css .='background: url('.esc_attr($dropshipping_store_footer_bg_image).'); background-size: cover';
		$dropshipping_store_custom_css .='}';
	}

    // footer image position
	$dropshipping_store_footer_img_position = get_theme_mod('dropshipping_store_footer_img_position','center center');
	if($dropshipping_store_footer_img_position != false){
		$dropshipping_store_custom_css .='.footer-wp{';
			$dropshipping_store_custom_css .='background-position: '.esc_attr($dropshipping_store_footer_img_position).'!important;';
		$dropshipping_store_custom_css .='}';
	}		

	// Footer Attatchment
	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_footer_attatchment','scroll');
	if($dropshipping_store_theme_lay == 'fixed'){
		$dropshipping_store_custom_css .='.footer-wp{';
			$dropshipping_store_custom_css .='background-attachment: fixed;';
		$dropshipping_store_custom_css .='}';
	}elseif ($dropshipping_store_theme_lay == 'scroll'){
		$dropshipping_store_custom_css .='.footer-wp{';
			$dropshipping_store_custom_css .='background-attachment: scroll;';
		$dropshipping_store_custom_css .='}';
	}

	$dropshipping_store_footer_heading_font_weight = get_theme_mod( 'dropshipping_store_footer_heading_font_weight','500');
	if($dropshipping_store_footer_heading_font_weight != ''){
		$dropshipping_store_custom_css .='.footer-wp h3, .footer-wp .wp-block-heading{';
			$dropshipping_store_custom_css .='font-weight: '.esc_attr($dropshipping_store_footer_heading_font_weight).';';
		$dropshipping_store_custom_css .='}';
	}

	// footer heading font size
	$dropshipping_store_footer_heading_font_size = get_theme_mod('dropshipping_store_footer_heading_font_size');
	$dropshipping_store_custom_css .='.footer-wp h3{';
		$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_footer_heading_font_size).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_footer_text_tranform','Capitalize');
    if($dropshipping_store_theme_lay == 'Uppercase'){
		$dropshipping_store_custom_css .='.footer-wp h3{';
			$dropshipping_store_custom_css .='text-transform: Uppercase;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Lowercase'){
		$dropshipping_store_custom_css .='.footer-wp h3{';
			$dropshipping_store_custom_css .='text-transform: Lowercase;';
		$dropshipping_store_custom_css .='}';
	}
	else if($dropshipping_store_theme_lay == 'Capitalize'){
		$dropshipping_store_custom_css .='.footer-wp h3{';
			$dropshipping_store_custom_css .='text-transform: Capitalize;';
		$dropshipping_store_custom_css .='}';
	}

	// letter spacing
	$dropshipping_store_footer_heading_letter_spacing = get_theme_mod('dropshipping_store_footer_heading_letter_spacing');
	$dropshipping_store_custom_css .='.footer-wp h3{';
	$dropshipping_store_custom_css .='letter-spacing: '.esc_attr($dropshipping_store_footer_heading_letter_spacing).'px;';	
	$dropshipping_store_custom_css .='}';

	// footer padding
	$dropshipping_store_footer_padding = get_theme_mod('dropshipping_store_footer_padding');
	$dropshipping_store_custom_css .='.footer-wp{';
		$dropshipping_store_custom_css .='padding: '.esc_attr($dropshipping_store_footer_padding).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_copyright_text_font_size = get_theme_mod('dropshipping_store_copyright_text_font_size', 15);
	$dropshipping_store_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_copyright_text_font_size).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_footer_heading = get_theme_mod( 'dropshipping_store_footer_heading','Left');
    if($dropshipping_store_footer_heading == 'Left'){
		$dropshipping_store_custom_css .='.footer-wp h3, .footer-wp .wp-block-search .wp-block-search__label{';
		$dropshipping_store_custom_css .='text-align: left;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_footer_heading == 'Center'){
		$dropshipping_store_custom_css .='.footer-wp h3, .footer-wp .wp-block-search .wp-block-search__label{';
			$dropshipping_store_custom_css .='text-align: center;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp h3:after, .footer-wp .wp-block-heading:after{';
			$dropshipping_store_custom_css .='margin: 7px auto;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='
		@media screen and (max-width:767px) {
			.footer-wp h3, .footer-wp .wp-block-search .wp-block-search__label{';
				$dropshipping_store_custom_css .='text-align: left;';
				$dropshipping_store_custom_css .='}
			.footer-wp h3:after, .footer-wp .wp-block-heading:after{';
				$dropshipping_store_custom_css .='margin: 7px 0 0;';
				$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_footer_heading == 'Right'){
		$dropshipping_store_custom_css .='.footer-wp h3, .footer-wp .wp-block-search .wp-block-search__label{';
			$dropshipping_store_custom_css .='text-align: right; padding-bottom: 25px;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp .widget, .footer-wp aside{';
			$dropshipping_store_custom_css .='position: relative;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp h3:after, .footer-wp .wp-block-heading:after{';
			$dropshipping_store_custom_css .='position: absolute; right: 0;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='
		@media screen and (max-width:767px) {
			.footer-wp h3, .footer-wp .wp-block-search .wp-block-search__label{';
				$dropshipping_store_custom_css .='text-align: left;';
				$dropshipping_store_custom_css .='}
			.footer-wp h3:after, .footer-wp .wp-block-heading:after{';
				$dropshipping_store_custom_css .='left: 0;';
				$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_footer_content = get_theme_mod( 'dropshipping_store_footer_content','Left');
    if($dropshipping_store_footer_content == 'Left'){
		$dropshipping_store_custom_css .='.footer-wp .widget,.footer-wp caption{';
		$dropshipping_store_custom_css .='text-align: left;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_footer_content == 'Center'){
		$dropshipping_store_custom_css .='.footer-wp .widget,.footer-wp caption{';
			$dropshipping_store_custom_css .='text-align: center;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='
		@media screen and (max-width:767px) {
			.footer-wp .widget,.footer-wp caption{';
				$dropshipping_store_custom_css .='text-align: left;';
				$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_footer_content == 'Right'){
		$dropshipping_store_custom_css .='.footer-wp .widget,.footer-wp caption{';
			$dropshipping_store_custom_css .='text-align: right;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='
		@media screen and (max-width:767px) {
			.footer-wp .widget,.footer-wp caption';
				$dropshipping_store_custom_css .='text-align: left;';
				$dropshipping_store_custom_css .='} }';
	}

	//Footer Social Icon Alignment
	$dropshipping_store_footer_icon_alignment = get_theme_mod( 'dropshipping_store_footer_icon_alignment','center');
    if($dropshipping_store_footer_icon_alignment == 'left'){
		$dropshipping_store_custom_css .='footer .socialicons{';
			$dropshipping_store_custom_css .='text-align:left !important;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_footer_icon_alignment == 'center'){
		$dropshipping_store_custom_css .='footer .socialicons{';
			$dropshipping_store_custom_css .='text-align:center !important;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_footer_icon_alignment == 'right'){
		$dropshipping_store_custom_css .='footer .socialicons{';
			$dropshipping_store_custom_css .='text-align:right !important;';
		$dropshipping_store_custom_css .='}';
	}	

	//Footer Social Icon Top Bottom padding 
	$dropshipping_store_footer_icon_to_top_padding = get_theme_mod('dropshipping_store_footer_icon_to_top_padding');
	$dropshipping_store_custom_css .='footer .socialicons a i{';
	$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_footer_icon_to_top_padding).'px;!important;';
	$dropshipping_store_custom_css .='padding-bottom: '.esc_attr($dropshipping_store_footer_icon_to_top_padding).'px;!important;';
	$dropshipping_store_custom_css .='}';
	
	//Social icon color
	$dropshipping_store_social_icon_color = get_theme_mod('dropshipping_store_social_icon_color');
	$dropshipping_store_custom_css .='footer .socialicons i{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_social_icon_color).' !important;';
	$dropshipping_store_custom_css .='}';  

   //Footer Style 
	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_footer_template','dropshipping_store-footer-one');
    if($dropshipping_store_theme_lay == 'dropshipping_store-footer-one'){
		$dropshipping_store_custom_css .='.footer-wp{';
			$dropshipping_store_custom_css .='';
		$dropshipping_store_custom_css .='}';

	}else if($dropshipping_store_theme_lay == 'dropshipping_store-footer-two'){
		$dropshipping_store_custom_css .='.footer-wp {';
			$dropshipping_store_custom_css .='background: #E3F2FD !important;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp p,.footer-wp span,.footer-wp li a,.footer-wp #wp-calendar caption,.footer-wp #wp-calendar td,.footer-wp #wp-calendar th, .footer-wp, .footer-wp h3, .footer-wp a.rsswidget, .footer-wp #wp-calendar a, .copyright a, .footer-wp .custom_details, .footer-wp ins span, .footer-wp .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, .footer-wp ul li a, .footer-wp table, .footer-wp th, .footer-wp td, .footer-wp caption, #sidebar caption,.footer-wp nav.wp-calendar-nav a,.footer-wp .search-form .search-field, .footer-wp .rssSummary, .footer-wp ul li{';
			$dropshipping_store_custom_css .='color:#000 !important;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp p{';
			$dropshipping_store_custom_css .='color:#000 !important;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp ul li::before{';
			$dropshipping_store_custom_css .='background:#000;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp table, .footer-wp th, .footer-wp td,.footer-wp.search-form .search-field,.footer-wp .tagcloud a{';
			$dropshipping_store_custom_css .='border: 1px solid #000;';
		$dropshipping_store_custom_css .='}';

	}else if($dropshipping_store_theme_lay == 'dropshipping_store-footer-three'){
		$dropshipping_store_custom_css .='.footer-wp {';
			$dropshipping_store_custom_css .='background: #0A0A1F !important;;';
		$dropshipping_store_custom_css .='}';
	}
	else if($dropshipping_store_theme_lay == 'dropshipping_store-footer-four'){
		$dropshipping_store_custom_css .='.footer-wp {';
			$dropshipping_store_custom_css .='background: #F5F5DC !important;;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp p,.footer-wp span,.footer-wp li a,.footer-wp #wp-calendar caption,.footer-wp #wp-calendar td,.footer-wp #wp-calendar th, .footer-wp, .footer-wp h3, .footer-wp a.rsswidget, .footer-wp #wp-calendar a, .copyright a, .footer-wp .custom_details, .footer-wp ins span, .footer-wp .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, .footer-wp ul li a, .footer-wp table, .footer-wp th, .footer-wp td, .footer-wp caption, #sidebar caption,.footer-wp nav.wp-calendar-nav a,.footer-wp .search-form .search-field, .footer-wp .rssSummary, .footer-wp ul li{';
			$dropshipping_store_custom_css .='color:#000 !important;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp p{';
			$dropshipping_store_custom_css .='color:#000 !important;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp ul li::before{';
			$dropshipping_store_custom_css .='background:#000;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.footer-wp table, .footer-wp th, .footer-wp td,.footer-wp.search-form .search-field,.footer-wp .tagcloud a{';
			$dropshipping_store_custom_css .='border: 1px solid #000;';
		$dropshipping_store_custom_css .='}';
	}
    else if($dropshipping_store_theme_lay == 'dropshipping_store-footer-five'){
	$dropshipping_store_custom_css .='.footer-wp {';
		$dropshipping_store_custom_css .='background: #333333 !important;;';
	$dropshipping_store_custom_css .='}';
   }		

	/*------------- Back to Top  -------------------*/
	$dropshipping_store_back_to_top_border_radius = get_theme_mod('dropshipping_store_back_to_top_border_radius');
	$dropshipping_store_custom_css .='#scrollbutton i{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_back_to_top_border_radius).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_scroll_icon_font_size = get_theme_mod('dropshipping_store_scroll_icon_font_size', 22);
	$dropshipping_store_custom_css .='#scrollbutton i{';
		$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_scroll_icon_font_size).'px;';
	$dropshipping_store_custom_css .='}';

	// back to top icon color
	$dropshipping_store_scroll_icon_color = get_theme_mod('dropshipping_store_scroll_icon_color');
	if($dropshipping_store_scroll_icon_color != false){
		$dropshipping_store_custom_css .='#scrollbutton i{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_scroll_icon_color).';';
		$dropshipping_store_custom_css .='}';
	}

	// back to top icon hover color
	$dropshipping_store_scroll_icon_hover_color = get_theme_mod('dropshipping_store_scroll_icon_hover_color');
	if($dropshipping_store_scroll_icon_hover_color != false){
		$dropshipping_store_custom_css .='#scrollbutton i:hover{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_scroll_icon_hover_color).';';
		$dropshipping_store_custom_css .='}';
	}

	// back to top bg color
	$dropshipping_store_scroll_icon_bg_color = get_theme_mod('dropshipping_store_scroll_icon_bg_color');
	if($dropshipping_store_scroll_icon_bg_color != false){
		$dropshipping_store_custom_css .='#scrollbutton i{';
			$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_scroll_icon_bg_color).';';
			$dropshipping_store_custom_css .='border-color: '.esc_attr($dropshipping_store_scroll_icon_bg_color).';';
		$dropshipping_store_custom_css .='}';
	}

	// back to top bg hover color
	$dropshipping_store_scroll_icon_bg_hover_color = get_theme_mod('dropshipping_store_scroll_icon_bg_hover_color');
	if($dropshipping_store_scroll_icon_bg_hover_color != false){
		$dropshipping_store_custom_css .='#scrollbutton i:hover{';
			$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_scroll_icon_bg_hover_color).';';
			$dropshipping_store_custom_css .='border-color: '.esc_attr($dropshipping_store_scroll_icon_bg_hover_color).';';
		$dropshipping_store_custom_css .='}';
	}

	$dropshipping_store_top_bottom_scroll_padding = get_theme_mod('dropshipping_store_top_bottom_scroll_padding', 12);
	$dropshipping_store_custom_css .='#scrollbutton i{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($dropshipping_store_top_bottom_scroll_padding).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_left_right_scroll_padding = get_theme_mod('dropshipping_store_left_right_scroll_padding', 17);
	$dropshipping_store_custom_css .='#scrollbutton i{';
		$dropshipping_store_custom_css .='padding-left: '.esc_attr($dropshipping_store_left_right_scroll_padding).'px; padding-right: '.esc_attr($dropshipping_store_left_right_scroll_padding).'px;';
	$dropshipping_store_custom_css .='}';

	//First Cap
	$dropshipping_store_show_first_caps = get_theme_mod('dropshipping_store_show_first_caps', 'false');
	if($dropshipping_store_show_first_caps == 'true' ){
	$dropshipping_store_custom_css .='.blog-section .mainbox .new-text p:nth-of-type(1)::first-letter{';
	$dropshipping_store_custom_css .=' font-size: 55px; font-weight: 600;';
	$dropshipping_store_custom_css .=' margin-right: 6px;';
	$dropshipping_store_custom_css .=' line-height: 1;';
	$dropshipping_store_custom_css .='}';
	}elseif($dropshipping_store_show_first_caps == 'false' ){
	$dropshipping_store_custom_css .='.blog-section .mainbox .new-text p:nth-of-type(1)::first-letter {';
	$dropshipping_store_custom_css .='display: none;';
	$dropshipping_store_custom_css .='}';
	}

	/*-------------- Post Button  -------------------*/

	$dropshipping_store_btn_font_size_option = get_theme_mod('dropshipping_store_btn_font_size_option');
	$dropshipping_store_custom_css .='.postbtn a{';
		$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_btn_font_size_option).'px !important;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_button_text_tranform','Capitalize');
    if($dropshipping_store_theme_lay == 'Uppercase'){
		$dropshipping_store_custom_css .='.postbtn a{';
			$dropshipping_store_custom_css .='text-transform: uppercase;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Lowercase'){
		$dropshipping_store_custom_css .='.postbtn a{';
			$dropshipping_store_custom_css .='text-transform: lowercase;';
		$dropshipping_store_custom_css .='}';
	}
	else if($dropshipping_store_theme_lay == 'Capitalize'){
		$dropshipping_store_custom_css .='.postbtn a{';
			$dropshipping_store_custom_css .='text-transform: capitalize;';
		$dropshipping_store_custom_css .='}';
	}

	// button font weight
	$dropshipping_store_button_font_weight = get_theme_mod( 'dropshipping_store_button_font_weight','700');
	if($dropshipping_store_button_font_weight != ''){
		$dropshipping_store_custom_css .='.postbtn a{';
			$dropshipping_store_custom_css .='font-weight: '.esc_attr($dropshipping_store_button_font_weight).';';
		$dropshipping_store_custom_css .='}';
	}

	//Button hover effect
	$dropshipping_store_button_hover_effect = get_theme_mod('dropshipping_store_button_hover_effect', 'disable');
	if ($dropshipping_store_button_hover_effect !== 'disable') {
		$dropshipping_store_custom_css .= '.postbtn a:hover {';
		switch ($dropshipping_store_button_hover_effect) {
			case 'pulse':
				$dropshipping_store_custom_css .= 'animation: pulse 0.5s ease-in-out;';
				break;
			case 'rubberBand':
				$dropshipping_store_custom_css .= 'animation: rubberBand 0.5s ease-in-out;';
				break;
			case 'swing':
				$dropshipping_store_custom_css .= 'animation: swing 0.5s ease-in-out;';
				break;
			case 'tada':
				$dropshipping_store_custom_css .= 'animation: tada 0.5s ease-in-out;';
				break;
			case 'jello':
				$dropshipping_store_custom_css .= 'animation: jello 0.5s ease-in-out;';
				break;
		}
		$dropshipping_store_custom_css .= '}';
	}

	//keyframes for all animations
	$dropshipping_store_custom_css .= '
	@keyframes pulse {
		0% { transform: scale(1); }
		50% { transform: scale(1.1); }
		100% { transform: scale(1); }
	}

	@keyframes rubberBand {
		0% { transform: scale(1); }
		30% { transform: scaleX(1.25) scaleY(0.75); }
		40% { transform: scaleX(0.75) scaleY(1.25); }
		50% { transform: scale(1); }
	}

	@keyframes swing {
		20% { transform: rotate(15deg); }
		40% { transform: rotate(-10deg); }
		60% { transform: rotate(5deg); }
		80% { transform: rotate(-5deg); }
		100% { transform: rotate(0deg); }
	}

	@keyframes tada {
		0% { transform: scale(1); }
		10%, 20% { transform: scale(0.9) rotate(-3deg); }
		30%, 50%, 70%, 90% { transform: scale(1.1) rotate(3deg); }
		40%, 60%, 80% { transform: scale(1.1) rotate(-3deg); }
		100% { transform: scale(1) rotate(0); }
	}

	@keyframes jello {
		0%, 11.1%, 100% { transform: none; }
		22.2% { transform: skewX(-12.5deg) skewY(-12.5deg); }
		33.3% { transform: skewX(6.25deg) skewY(6.25deg); }
		44.4% { transform: skewX(-3.125deg) skewY(-3.125deg); }
		55.5% { transform: skewX(1.5625deg) skewY(1.5625deg); }
		66.6% { transform: skewX(-0.78125deg) skewY(-0.78125deg); }
		77.7% { transform: skewX(0.390625deg) skewY(0.390625deg); }
		88.8% { transform: skewX(-0.1953125deg) skewY(-0.1953125deg); }
	}';

	$dropshipping_store_post_button_padding_top = get_theme_mod('dropshipping_store_post_button_padding_top');
	$dropshipping_store_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_post_button_padding_top).'px; padding-bottom: '.esc_attr($dropshipping_store_post_button_padding_top).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_post_button_padding_right = get_theme_mod('dropshipping_store_post_button_padding_right');
	$dropshipping_store_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$dropshipping_store_custom_css .='padding-left: '.esc_attr($dropshipping_store_post_button_padding_right).'px; padding-right: '.esc_attr($dropshipping_store_post_button_padding_right).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_post_button_border_radius = get_theme_mod('dropshipping_store_post_button_border_radius');
	$dropshipping_store_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_post_button_border_radius).'px;';
	$dropshipping_store_custom_css .='}';

	// button letter spacing
	$dropshipping_store_button_letter_spacing = get_theme_mod('dropshipping_store_button_letter_spacing', '1');
	$dropshipping_store_custom_css .='.postbtn a {';
		$dropshipping_store_custom_css .='letter-spacing: '.esc_attr($dropshipping_store_button_letter_spacing).'px;';
	$dropshipping_store_custom_css .='}';		

	$dropshipping_store_post_comment_enable = get_theme_mod('dropshipping_store_post_comment_enable',true);
	if($dropshipping_store_post_comment_enable == false){
		$dropshipping_store_custom_css .='#comments{';
			$dropshipping_store_custom_css .='display: none;';
		$dropshipping_store_custom_css .='}';
	}

	//Button Shape
	$dropshipping_store_btn_shape = get_theme_mod('dropshipping_store_btn_shape', 'Round');
	if($dropshipping_store_btn_shape == 'Square' ){
		$dropshipping_store_custom_css .='.inner-service .mainbox .postbtn a{';
			$dropshipping_store_custom_css .=' border-radius: 0';
		$dropshipping_store_custom_css .='}';
	}elseif($dropshipping_store_btn_shape == 'Round' ){
		$dropshipping_store_custom_css .='.inner-service .mainbox .postbtn a{';
			$dropshipping_store_custom_css .=' border-radius: .3em';
		$dropshipping_store_custom_css .='}';
	}elseif($dropshipping_store_btn_shape == 'Pill' ){
		$dropshipping_store_custom_css .='.inner-service .mainbox .postbtn a{';
			$dropshipping_store_custom_css .=' border-radius: 2em;';
		$dropshipping_store_custom_css .='}';
	}

	// preloader background image
	$dropshipping_store_preloader_bg_image = get_theme_mod('dropshipping_store_preloader_bg_image');
	if($dropshipping_store_preloader_bg_image != false){
		$dropshipping_store_custom_css .='.frame{';
			$dropshipping_store_custom_css .='background: url('.esc_attr($dropshipping_store_preloader_bg_image).'); background-size: cover;';
		$dropshipping_store_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$dropshipping_store_preloader_bg_color_option = get_theme_mod('dropshipping_store_preloader_bg_color_option');
	$dropshipping_store_preloader_icon_color_option = get_theme_mod('dropshipping_store_preloader_icon_color_option');
	$dropshipping_store_custom_css .='.frame{';
		$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_preloader_bg_color_option).';';
	$dropshipping_store_custom_css .='}';
	$dropshipping_store_custom_css .='.dot-1,.dot-2,.dot-3{';
		$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_preloader_icon_color_option).';';
	$dropshipping_store_custom_css .='}';

	// preloader type
	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_preloader_type','First Preloader Type');
    if($dropshipping_store_theme_lay == 'First Preloader Type'){
		$dropshipping_store_custom_css .='.dot-1, .dot-2, .dot-3{';
			$dropshipping_store_custom_css .='';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Second Preloader Type'){
		$dropshipping_store_custom_css .='.dot-1, .dot-2, .dot-3{';
			$dropshipping_store_custom_css .='border-radius:0;';
		$dropshipping_store_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_background_skin','Without Background');
    if($dropshipping_store_theme_lay == 'With Background'){
		$dropshipping_store_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$dropshipping_store_custom_css .='background-color: #fff; padding:20px;';
		$dropshipping_store_custom_css .='}';
		$dropshipping_store_custom_css .='.login-box a{';
			$dropshipping_store_custom_css .='background-color: #fff;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Without Background'){
		$dropshipping_store_custom_css .='{';
			$dropshipping_store_custom_css .='background-color: transparent;';
		$dropshipping_store_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$dropshipping_store_woocommerce_button_padding_top = get_theme_mod('dropshipping_store_woocommerce_button_padding_top',12);
	$dropshipping_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($dropshipping_store_woocommerce_button_padding_top).'px;';
	$dropshipping_store_custom_css .='}';
	

	$dropshipping_store_woocommerce_button_padding_right = get_theme_mod('dropshipping_store_woocommerce_button_padding_right',15);
	$dropshipping_store_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$dropshipping_store_custom_css .='padding-left: '.esc_attr($dropshipping_store_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($dropshipping_store_woocommerce_button_padding_right).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woocommerce_button_border_radius = get_theme_mod('dropshipping_store_woocommerce_button_border_radius',10);
	$dropshipping_store_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_woocommerce_button_border_radius).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_related_product_enable = get_theme_mod('dropshipping_store_related_product_enable',true);
	if($dropshipping_store_related_product_enable == false){
		$dropshipping_store_custom_css .='.related.products{';
			$dropshipping_store_custom_css .='display: none;';
		$dropshipping_store_custom_css .='}';
	}

	$dropshipping_store_woocommerce_product_border_enable = get_theme_mod('dropshipping_store_woocommerce_product_border_enable',true);
	if($dropshipping_store_woocommerce_product_border_enable == false){
		$dropshipping_store_custom_css .='.products li{';
			$dropshipping_store_custom_css .='border: none;';
		$dropshipping_store_custom_css .='}';
	}

	$dropshipping_store_woocommerce_product_padding_top = get_theme_mod('dropshipping_store_woocommerce_product_padding_top',10);
	$dropshipping_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($dropshipping_store_woocommerce_product_padding_top).'px !important;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woocommerce_product_padding_right = get_theme_mod('dropshipping_store_woocommerce_product_padding_right',10);
	$dropshipping_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$dropshipping_store_custom_css .='padding-left: '.esc_attr($dropshipping_store_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($dropshipping_store_woocommerce_product_padding_right).'px !important;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woocommerce_product_border_radius = get_theme_mod('dropshipping_store_woocommerce_product_border_radius',0);
	$dropshipping_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_woocommerce_product_border_radius).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woocommerce_product_box_shadow = get_theme_mod('dropshipping_store_woocommerce_product_box_shadow', 5);
	$dropshipping_store_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$dropshipping_store_custom_css .='box-shadow: '.esc_attr($dropshipping_store_woocommerce_product_box_shadow).'px '.esc_attr($dropshipping_store_woocommerce_product_box_shadow).'px '.esc_attr($dropshipping_store_woocommerce_product_box_shadow).'px #eee;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woo_product_sale_top_bottom_padding = get_theme_mod('dropshipping_store_woo_product_sale_top_bottom_padding', 0);
	$dropshipping_store_woo_product_sale_left_right_padding = get_theme_mod('dropshipping_store_woo_product_sale_left_right_padding', 0);
	$dropshipping_store_custom_css .='.woocommerce span.onsale{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($dropshipping_store_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($dropshipping_store_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($dropshipping_store_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woo_product_sale_border_radius = get_theme_mod('dropshipping_store_woo_product_sale_border_radius',50);
	$dropshipping_store_custom_css .='.woocommerce span.onsale {';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_woo_product_sale_border_radius).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_woo_product_sale_position = get_theme_mod('dropshipping_store_woo_product_sale_position', 'Right');
	if($dropshipping_store_woo_product_sale_position == 'Right' ){
		$dropshipping_store_custom_css .='.woocommerce ul.products li.product .onsale{';
			$dropshipping_store_custom_css .=' left:auto; right:0;';
		$dropshipping_store_custom_css .='}';
	}elseif($dropshipping_store_woo_product_sale_position == 'Left' ){
		$dropshipping_store_custom_css .='.woocommerce ul.products li.product .onsale{';
			$dropshipping_store_custom_css .=' left:0; right:auto;';
		$dropshipping_store_custom_css .='}';
	}

	$dropshipping_store_wooproduct_sale_font_size = get_theme_mod('dropshipping_store_wooproduct_sale_font_size',14);
	$dropshipping_store_custom_css .='.woocommerce span.onsale{';
		$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_wooproduct_sale_font_size).'px;';
	$dropshipping_store_custom_css .='}';

	// Responsive Media
	$dropshipping_store_post_date = get_theme_mod( 'dropshipping_store_display_post_date',true);
	if($dropshipping_store_post_date == true && get_theme_mod( 'dropshipping_store_metafields_date',true) != true){
    	$dropshipping_store_custom_css .='.metabox .entry-date{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_post_date == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.metabox .entry-date{';
			$dropshipping_store_custom_css .='display:inline-block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_post_date == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.metabox .entry-date{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_post_author = get_theme_mod( 'dropshipping_store_display_post_author',true);
	if($dropshipping_store_post_author == true && get_theme_mod( 'dropshipping_store_metafields_author',true) != true){
    	$dropshipping_store_custom_css .='.metabox .entry-author{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_post_author == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.metabox .entry-author{';
			$dropshipping_store_custom_css .='display:inline-block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_post_author == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.metabox .entry-author{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_post_comment = get_theme_mod( 'dropshipping_store_display_post_comment',true);
	if($dropshipping_store_post_comment == true && get_theme_mod( 'dropshipping_store_metafields_comment',true) != true){
    	$dropshipping_store_custom_css .='.metabox .entry-comments{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_post_comment == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.metabox .entry-comments{';
			$dropshipping_store_custom_css .='display:inline-block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_post_comment == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.metabox .entry-comments{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_post_time = get_theme_mod( 'dropshipping_store_display_post_time',true);
	if($dropshipping_store_post_time == true && get_theme_mod( 'dropshipping_store_metafields_time',true) != true){
    	$dropshipping_store_custom_css .='.metabox .entry-time{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_post_time == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.metabox .entry-time{';
			$dropshipping_store_custom_css .='display:inline-block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_post_time == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.metabox .entry-time{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	if($dropshipping_store_post_date == false && $dropshipping_store_post_author == false && $dropshipping_store_post_comment == false && $dropshipping_store_post_time == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
    	$dropshipping_store_custom_css .='.metabox {';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_metafields_date = get_theme_mod( 'dropshipping_store_metafields_date',true);
	$dropshipping_store_metafields_author = get_theme_mod( 'dropshipping_store_metafields_author',true);
	$dropshipping_store_metafields_comment = get_theme_mod( 'dropshipping_store_metafields_comment',true);
	$dropshipping_store_metafields_time = get_theme_mod( 'dropshipping_store_metafields_time',true);
	if($dropshipping_store_metafields_date == false && $dropshipping_store_metafields_author == false && $dropshipping_store_metafields_comment == false && $dropshipping_store_metafields_time == false){
		$dropshipping_store_custom_css .='@media screen and (min-width:576px) {';
    	$dropshipping_store_custom_css .='.metabox {';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_slider = get_theme_mod( 'dropshipping_store_display_slider',true);
	if($dropshipping_store_slider == true && get_theme_mod( 'dropshipping_store_slider_hide', false) == false){
    	$dropshipping_store_custom_css .='#slider{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_slider == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='#slider{';
			$dropshipping_store_custom_css .='display:block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_slider == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='#slider{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_sidebar = get_theme_mod( 'dropshipping_store_display_sidebar',true);
    if($dropshipping_store_sidebar == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='#sidebar{';
			$dropshipping_store_custom_css .='display:block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_sidebar == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='#sidebar{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_scroll = get_theme_mod( 'dropshipping_store_display_scrolltop',true);
	if($dropshipping_store_scroll == true && get_theme_mod( 'dropshipping_store_hide_show_scroll',true) != true){
    	$dropshipping_store_custom_css .='#scrollbutton i{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_scroll == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='#scrollbutton i{';
			$dropshipping_store_custom_css .='display:block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_scroll == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='#scrollbutton i{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_preloader = get_theme_mod( 'dropshipping_store_display_preloader',false);
	if($dropshipping_store_preloader == true && get_theme_mod( 'dropshipping_store_preloader',false) == false){
		$dropshipping_store_custom_css .='@media screen and (min-width:575px) {';
    	$dropshipping_store_custom_css .='.frame{';
			$dropshipping_store_custom_css .=' visibility: hidden;';
		$dropshipping_store_custom_css .='} }';
	}
    if($dropshipping_store_preloader == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.frame{';
			$dropshipping_store_custom_css .='visibility:visible;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_preloader == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.frame{';
			$dropshipping_store_custom_css .='visibility: hidden;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_search = get_theme_mod( 'dropshipping_store_display_search_category',true);
	if($dropshipping_store_search == true && get_theme_mod( 'dropshipping_store_search_enable_disable',true) != true){
    	$dropshipping_store_custom_css .='.search-cat-box{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_search == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.search-cat-box{';
			$dropshipping_store_custom_css .='display:block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_search == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.search-cat-box{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	$dropshipping_store_myaccount = get_theme_mod( 'dropshipping_store_display_myaccount',true);
	if($dropshipping_store_myaccount == true && get_theme_mod( 'dropshipping_store_myaccount_enable_disable',true) != true){
    	$dropshipping_store_custom_css .='.login-box{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_myaccount == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.login-box{';
			$dropshipping_store_custom_css .='display:block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_myaccount == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.login-box{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	// menu settings
	$dropshipping_store_menu_font_size_option = get_theme_mod('dropshipping_store_menu_font_size_option');
	$dropshipping_store_custom_css .='.primary-navigation ul li a{';
		$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_menu_font_size_option).'px;';
	$dropshipping_store_custom_css .='}';

	// menu top-bottom padding
	$dropshipping_store_menu_top_bottom_padding = get_theme_mod('dropshipping_store_menu_top_bottom_padding');
	$dropshipping_store_custom_css .='.primary-navigation ul li{';
		$dropshipping_store_custom_css .='padding-top: '.esc_attr($dropshipping_store_menu_top_bottom_padding).'px;';
		$dropshipping_store_custom_css .='padding-bottom: '.esc_attr($dropshipping_store_menu_top_bottom_padding).'px;';
	$dropshipping_store_custom_css .='}';

	// menu left-right padding
	$dropshipping_store_menu_left_right_padding = get_theme_mod('dropshipping_store_menu_left_right_padding');
	$dropshipping_store_custom_css .='.primary-navigation ul li{';
		$dropshipping_store_custom_css .='padding-left: '.esc_attr($dropshipping_store_menu_left_right_padding).'px;';
		$dropshipping_store_custom_css .='padding-right: '.esc_attr($dropshipping_store_menu_left_right_padding).'px;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_theme_lay = get_theme_mod( 'dropshipping_store_text_tranform_menu','Uppercase');
    if($dropshipping_store_theme_lay == 'Uppercase'){
		$dropshipping_store_custom_css .='.primary-navigation a{';
			$dropshipping_store_custom_css .='';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_theme_lay == 'Lowercase'){
		$dropshipping_store_custom_css .='.primary-navigation ul li a{';
			$dropshipping_store_custom_css .='text-transform: lowercase;';
		$dropshipping_store_custom_css .='}';
	}
	else if($dropshipping_store_theme_lay == 'Capitalize'){
		$dropshipping_store_custom_css .='.primary-navigation ul li a{';
			$dropshipping_store_custom_css .='text-transform: Capitalize;';
		$dropshipping_store_custom_css .='}';
	}

	// menu font weight
	$dropshipping_store_font_weight_option_menu = get_theme_mod( 'dropshipping_store_font_weight_option_menu','600');
	if($dropshipping_store_font_weight_option_menu != ''){
		$dropshipping_store_custom_css .='.primary-navigation ul li a{';
			$dropshipping_store_custom_css .='font-weight: '.esc_attr($dropshipping_store_font_weight_option_menu).';';
		$dropshipping_store_custom_css .='}';
	}

	// slider height
	$dropshipping_store_option_slider_height = get_theme_mod('dropshipping_store_option_slider_height');
	$dropshipping_store_custom_css .='#slider .slider-bg img{';
		$dropshipping_store_custom_css .='height: '.esc_attr($dropshipping_store_option_slider_height).'px;';
	$dropshipping_store_custom_css .='}';

	// slider content spacing
	$dropshipping_store_slider_content_top_padding = get_theme_mod('dropshipping_store_slider_content_top_padding');
	$dropshipping_store_slider_content_left_padding = get_theme_mod('dropshipping_store_slider_content_left_padding');
	$dropshipping_store_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$dropshipping_store_custom_css .='top: '.esc_attr($dropshipping_store_slider_content_top_padding).'%; bottom: '.esc_attr($dropshipping_store_slider_content_top_padding).'%;left: '.esc_attr($dropshipping_store_slider_content_left_padding).'%;right: '.esc_attr($dropshipping_store_slider_content_left_padding).'%;';
	$dropshipping_store_custom_css .='}';

	// slider overlay
	$dropshipping_store_enable_slider_overlay = get_theme_mod('dropshipping_store_enable_slider_overlay', true);
	if($dropshipping_store_enable_slider_overlay == false){
		$dropshipping_store_custom_css .='#slider image{';
			$dropshipping_store_custom_css .='opacity:1;';
		$dropshipping_store_custom_css .='}';
	} 
	$dropshipping_store_slider_overlay_color = get_theme_mod('dropshipping_store_slider_overlay_color', true);
	if($dropshipping_store_enable_slider_overlay != false){
		$dropshipping_store_custom_css .='#slider{';
			$dropshipping_store_custom_css .='background: '.esc_attr($dropshipping_store_slider_overlay_color).';';
		$dropshipping_store_custom_css .='}';
	}

	//  comment form width
	$dropshipping_store_comment_form_width = get_theme_mod( 'dropshipping_store_comment_form_width');
	$dropshipping_store_custom_css .='#comments textarea{';
		$dropshipping_store_custom_css .='width: '.esc_attr($dropshipping_store_comment_form_width).'%;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_title_comment_form = get_theme_mod('dropshipping_store_title_comment_form', 'Leave a Reply');
	if($dropshipping_store_title_comment_form == ''){
		$dropshipping_store_custom_css .='#comments h2#reply-title {';
			$dropshipping_store_custom_css .='display: none;';
		$dropshipping_store_custom_css .='}';
	}

	$dropshipping_store_comment_form_button_content = get_theme_mod('dropshipping_store_comment_form_button_content', 'Post Comment');
	if($dropshipping_store_comment_form_button_content == ''){
		$dropshipping_store_custom_css .='#comments p.form-submit {';
			$dropshipping_store_custom_css .='display: none;';
		$dropshipping_store_custom_css .='}';
	}

	// featured image setting
	$dropshipping_store_image_border_radius = get_theme_mod('dropshipping_store_image_border_radius', 0);
	$dropshipping_store_custom_css .='.layout2 .box-image img,.layout1 .box-image img,.layout3 .box-image img{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_image_border_radius).'%;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_image_box_shadow = get_theme_mod('dropshipping_store_image_box_shadow',0);
	$dropshipping_store_custom_css .='.layout2 .box-image img,.layout1 .box-image img,.layout3 .box-image img{';
		$dropshipping_store_custom_css .='box-shadow: '.esc_attr($dropshipping_store_image_box_shadow).'px '.esc_attr($dropshipping_store_image_box_shadow).'px '.esc_attr($dropshipping_store_image_box_shadow).'px #b5b5b5;';
	$dropshipping_store_custom_css .='}';

	// blog post Pagination Alignment
	$dropshipping_store_post_pagination_alignment = get_theme_mod( 'dropshipping_store_post_pagination_option','Left');
	if($dropshipping_store_post_pagination_alignment == 'Left'){
		$dropshipping_store_custom_css .='.navigation nav.pagination{';
			$dropshipping_store_custom_css .='justify-content: left;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_post_pagination_alignment == 'Center'){
		$dropshipping_store_custom_css .='.navigation nav.pagination{';
			$dropshipping_store_custom_css .='justify-content: center;';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_post_pagination_alignment == 'Right'){
		$dropshipping_store_custom_css .='.navigation nav.pagination{';
			$dropshipping_store_custom_css .='justify-content: right;';
		$dropshipping_store_custom_css .='}';
	}

	// grid post image setting
	$dropshipping_store_grid_image_border_radius = get_theme_mod('dropshipping_store_grid_image_border_radius', 0);
	$dropshipping_store_custom_css .='.inner-service .gridbox .box-image img{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_grid_image_border_radius).'%;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_grid_image_box_shadow = get_theme_mod('dropshipping_store_grid_image_box_shadow',0);
	$dropshipping_store_custom_css .='.inner-service .gridbox .box-image img{';
		$dropshipping_store_custom_css .='box-shadow: '.esc_attr($dropshipping_store_grid_image_box_shadow).'px '.esc_attr($dropshipping_store_grid_image_box_shadow).'px '.esc_attr($dropshipping_store_grid_image_box_shadow).'px #b5b5b5;';
	$dropshipping_store_custom_css .='}';

	// single featured image setting
	$dropshipping_store_single_image_border_radius = get_theme_mod('dropshipping_store_single_image_border_radius', 0);
	$dropshipping_store_custom_css .='.feature-box img{';
		$dropshipping_store_custom_css .='border-radius: '.esc_attr($dropshipping_store_single_image_border_radius).'%;';
	$dropshipping_store_custom_css .='}';

	$dropshipping_store_single_image_box_shadow = get_theme_mod('dropshipping_store_single_image_box_shadow',0);
	$dropshipping_store_custom_css .='.feature-box img{';
		$dropshipping_store_custom_css .='box-shadow: '.esc_attr($dropshipping_store_single_image_box_shadow).'px '.esc_attr($dropshipping_store_single_image_box_shadow).'px '.esc_attr($dropshipping_store_single_image_box_shadow).'px #b5b5b5;';
	$dropshipping_store_custom_css .='}';

	// category color
	$dropshipping_store_category_color = get_theme_mod('dropshipping_store_category_color');
	$dropshipping_store_custom_css .='.type-post .category ul li a{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_category_color).';';
	$dropshipping_store_custom_css .='}';

	// category hover color
	$dropshipping_store_category_hover_color = get_theme_mod('dropshipping_store_category_hover_color');
	$dropshipping_store_custom_css .='.type-post .category ul li a:hover{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_category_hover_color).';';
	$dropshipping_store_custom_css .='}';

	// Post Block
	$dropshipping_store_post_block_option = get_theme_mod( 'dropshipping_store_post_block_option','By Block');
    if($dropshipping_store_post_block_option == 'By Without Block'){
		$dropshipping_store_custom_css .='.mainbox-post, .layout2 .mainbox, .layout1.mainbox, .layout2.mainbox,.post_format-post-format-video,.post_format-post-format-image,.post_format-post-format-audio, .post_format-post-format-gallery, {';
			$dropshipping_store_custom_css .='border:none; margin:30px 0;';
		$dropshipping_store_custom_css .='}';
	}

	//Grid Post Block
	$dropshipping_store_grid_post_block_option = get_theme_mod( 'dropshipping_store_grid_post_block_option','By Block');
    if($dropshipping_store_grid_post_block_option == 'By Without Block'){
		$dropshipping_store_custom_css .='.inner-service .gridbox {';
			$dropshipping_store_custom_css .='border:none; margin:30px 0;';
		$dropshipping_store_custom_css .='}';
	}

	// post image 
	$dropshipping_store_post_featured_color = get_theme_mod('dropshipping_store_post_featured_color', 'var(--first-theme-color)');
	$dropshipping_store_post_featured_image = get_theme_mod('dropshipping_store_post_featured_image','Image');
	if($dropshipping_store_post_featured_image == 'Color'){
		$dropshipping_store_custom_css .='.post-color{';
			$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_post_featured_color).';';
		$dropshipping_store_custom_css .='}';
	}

	// featured image dimention
	$dropshipping_store_post_featured_image_dimention = get_theme_mod('dropshipping_store_post_featured_image_dimention', 'Default');
	$dropshipping_store_post_featured_image_custom_width = get_theme_mod('dropshipping_store_post_featured_image_custom_width');
	$dropshipping_store_post_featured_image_custom_height = get_theme_mod('dropshipping_store_post_featured_image_custom_height');
	if($dropshipping_store_post_featured_image_dimention == 'Custom'){
		$dropshipping_store_custom_css .='.box-image img{';
			$dropshipping_store_custom_css .='width: '.esc_attr($dropshipping_store_post_featured_image_custom_width).'px; height: '.esc_attr($dropshipping_store_post_featured_image_custom_height).'px;';
		$dropshipping_store_custom_css .='}';
	}

	// featured image dimention
	$dropshipping_store_custom_post_color_width = get_theme_mod('dropshipping_store_custom_post_color_width');
	$dropshipping_store_custom_post_color_height = get_theme_mod('dropshipping_store_custom_post_color_height');
	if($dropshipping_store_post_featured_image == 'Color'){
		$dropshipping_store_custom_css .='.post-color{';
			$dropshipping_store_custom_css .='width: '.esc_attr($dropshipping_store_custom_post_color_width).'px; height: '.esc_attr($dropshipping_store_custom_post_color_height).'px;';
		$dropshipping_store_custom_css .='}';
	}

	// single featured image dimention
	$dropshipping_store_single_post_featured_image_dimention = get_theme_mod('dropshipping_store_single_post_featured_image_dimention', 'Default');
	$dropshipping_store_single_post_featured_image_custom_width = get_theme_mod('dropshipping_store_single_post_featured_image_custom_width');
	$dropshipping_store_single_post_featured_image_custom_height = get_theme_mod('dropshipping_store_single_post_featured_image_custom_height');
	if($dropshipping_store_single_post_featured_image_dimention == 'Custom'){
		$dropshipping_store_custom_css .='.single-post-page .feature-box img{';
			$dropshipping_store_custom_css .='width: '.esc_attr($dropshipping_store_single_post_featured_image_custom_width).'px!important; height: '.esc_attr($dropshipping_store_single_post_featured_image_custom_height).'px!important;';
		$dropshipping_store_custom_css .='}';
	}

	// site title font size
	$dropshipping_store_site_title_font_size = get_theme_mod('dropshipping_store_site_title_font_size', 30);
	$dropshipping_store_custom_css .='.logo h1, .site-title a, .logo .site-title a{';
	$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_site_title_font_size).'px;';
	$dropshipping_store_custom_css .='}';

	// site tagline font size
	$dropshipping_store_site_tagline_font_size = get_theme_mod('dropshipping_store_site_tagline_font_size', 15);
	$dropshipping_store_custom_css .='p.site-description{';
	$dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_site_tagline_font_size).'px;';
	$dropshipping_store_custom_css .='}';

	// site logo padding 
	$dropshipping_store_logo_padding_font_size = get_theme_mod('dropshipping_store_logo_padding_font_size', '');
	$dropshipping_store_custom_css .='.logo{';
	$dropshipping_store_custom_css .='padding: '.esc_attr($dropshipping_store_logo_padding_font_size).'px !important;';
	$dropshipping_store_custom_css .='}';

	// woocommerce Product Navigation
	$dropshipping_store_wooproducts_nav = get_theme_mod('dropshipping_store_wooproducts_nav', 'Yes');
	if($dropshipping_store_wooproducts_nav == 'No'){
		$dropshipping_store_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$dropshipping_store_custom_css .='display: none;';
		$dropshipping_store_custom_css .='}';
	}

	/*------ copyright text color -------*/
	$dropshipping_store_footer_text_color = get_theme_mod('dropshipping_store_footer_text_color');
	if($dropshipping_store_footer_text_color != false){
		$dropshipping_store_custom_css .='.copyright-wrapper p, .copyright-wrapper p a{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_footer_text_color).'!important;';
		$dropshipping_store_custom_css .='}';
	}

	/*------ copyright background css -------*/
	$dropshipping_store_footer_text_bg_color = get_theme_mod('dropshipping_store_footer_text_bg_color');
	if($dropshipping_store_footer_text_bg_color != false){
		$dropshipping_store_custom_css .='.copyright-wrapper{';
			$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_footer_text_bg_color).';';
		$dropshipping_store_custom_css .='}';
	}
 
	// site title color
	$dropshipping_store_site_title_color = get_theme_mod('dropshipping_store_site_title_color');
	$dropshipping_store_custom_css .='.site-title a{';
		$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_site_title_color).' !important;';
	$dropshipping_store_custom_css .='}';

	// site tagline color
	$dropshipping_store_site_tagline_color = get_theme_mod('dropshipping_store_site_tagline_color');
	$dropshipping_store_custom_css .='.site-description{';
		$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_site_tagline_color).' !important;';
	$dropshipping_store_custom_css .='}';

	// site toggle button color
	$dropshipping_store_toggle_button_color = get_theme_mod('dropshipping_store_toggle_button_color');
	$dropshipping_store_custom_css .='.toggle-menu i{';
		$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_toggle_button_color).' !important;';
	$dropshipping_store_custom_css .='}';

	// Menu Item Hover Style	
	$dropshipping_store_menus_item = get_theme_mod( 'dropshipping_store_menus_item_style','None');
    if($dropshipping_store_menus_item == 'None'){
		$dropshipping_store_custom_css .='.primary-navigation ul li a{';
			$dropshipping_store_custom_css .='';
		$dropshipping_store_custom_css .='}';
	}else if($dropshipping_store_menus_item == 'Zoom In'){
		$dropshipping_store_custom_css .='.primary-navigation ul li a:hover{';
			$dropshipping_store_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.1) !important;';
		$dropshipping_store_custom_css .='}';
	}	

	// menu color
	$dropshipping_store_menu_color = get_theme_mod('dropshipping_store_menu_color');
	$dropshipping_store_custom_css .='.primary-navigation a, .primary-navigation ul li a, #site-navigation li a{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_menu_color).' !important;';
	$dropshipping_store_custom_css .='}';

	// Sub menu color
	$dropshipping_store_sub_menu_color = get_theme_mod('dropshipping_store_sub_menu_color');
	$dropshipping_store_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a, #site-navigation ul.sub-menu li a{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_sub_menu_color).' !important;';
	$dropshipping_store_custom_css .='}';

	// menu hover color
	$dropshipping_store_menu_hover_color = get_theme_mod('dropshipping_store_menu_hover_color');
	$dropshipping_store_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, #site-navigation li a:hover{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_menu_hover_color).' !important;';
	$dropshipping_store_custom_css .='}';

  	// submenu hover color
	$dropshipping_store_sub_menu_hover_color = get_theme_mod('dropshipping_store_sub_menu_hover_color');
	$dropshipping_store_custom_css .='.primary-navigation a:hover, .primary-navigation ul.sub-menu li a:hover, #site-navigation ul.sub-menu li a:hover{';
			$dropshipping_store_custom_css .='color: '.esc_attr($dropshipping_store_sub_menu_hover_color).' !important;';
	$dropshipping_store_custom_css .='}';	

	// Sub menu bg color
	$dropshipping_store_sub_menu_bg_color = get_theme_mod('dropshipping_store_sub_menu_bg_color');
	$dropshipping_store_custom_css .='#site-navigation ul.sub-menu li a{';
			$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_sub_menu_bg_color).';';
	$dropshipping_store_custom_css .='}';

	// Sub menu bg hover color
	$dropshipping_store_sub_menu_bg_hover_color = get_theme_mod('dropshipping_store_sub_menu_bg_hover_color');
	$dropshipping_store_custom_css .='#site-navigation ul.sub-menu li a:hover{';
			$dropshipping_store_custom_css .='background-color: '.esc_attr($dropshipping_store_sub_menu_bg_hover_color).';';
	$dropshipping_store_custom_css .='}';

	// topbar padding option
	$dropshipping_store_topbar_padding_settings = get_theme_mod('dropshipping_store_topbar_padding_settings', 8);
		$dropshipping_store_custom_css .='.topbar{';
			$dropshipping_store_custom_css .='padding: '.esc_attr($dropshipping_store_topbar_padding_settings).'px !important;';
		$dropshipping_store_custom_css .='}';

	// Header Contact Icons Font Size
    $dropshipping_store_header_icons_size = get_theme_mod('dropshipping_store_header_icons_size', '16');
    $dropshipping_store_custom_css .='a.wishlist-link, a.myaccount-link,.phone i{';
        $dropshipping_store_custom_css .='font-size: '.esc_attr($dropshipping_store_header_icons_size).'px;';
    $dropshipping_store_custom_css .='}';

	// site logo margin 
	$dropshipping_store_logo_margin = get_theme_mod('dropshipping_store_logo_margin', '');
	$dropshipping_store_custom_css .='.logo{';
	$dropshipping_store_custom_css .='margin: '.esc_attr($dropshipping_store_logo_margin).'px ;';
	$dropshipping_store_custom_css .='}';

	// Slider Button
	$dropshipping_store_sliderbutton = get_theme_mod( 'dropshipping_store_display_slider_button',true);
	if($dropshipping_store_sliderbutton == true && get_theme_mod( 'dropshipping_store_show_slider_button',true) != true){
    	$dropshipping_store_custom_css .='.more-btn{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_sliderbutton == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.more-btn{';
			$dropshipping_store_custom_css .='display:block;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_sliderbutton == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.more-btn{';
			$dropshipping_store_custom_css .='display:none;';
		$dropshipping_store_custom_css .='} }';
	}

	// Fixed Copyright
	$dropshipping_store_fixed_copyright = get_theme_mod( 'dropshipping_store_display_fixed_copyright',false);
	if($dropshipping_store_fixed_copyright == true && get_theme_mod( 'dropshipping_store_sticky_copyright',false) != true){
    	$dropshipping_store_custom_css .='.fixed-copyright{';
			$dropshipping_store_custom_css .='position:static;';
		$dropshipping_store_custom_css .='} ';
	}
    if($dropshipping_store_fixed_copyright == true){
    	$dropshipping_store_custom_css .='@media screen and (max-width:575px) {';
		$dropshipping_store_custom_css .='.fixed-copyright{';
			$dropshipping_store_custom_css .='position:fixed;';
		$dropshipping_store_custom_css .='} }';
	}else if($dropshipping_store_fixed_copyright == false){
		$dropshipping_store_custom_css .='@media screen and (max-width:575px){';
		$dropshipping_store_custom_css .='.fixed-copyright{';
			$dropshipping_store_custom_css .='position:static;';
		$dropshipping_store_custom_css .='} }';
	}

     // Hover effect on single post featured image (FIXED)

	$dropshipping_store_show_featured = get_theme_mod(
		'dropshipping_store_featured_image_hide_show',
		1
	);

	$dropshipping_store_hover_effect = get_theme_mod(
		'dropshipping_store_featured_image_hover',
		'none'
	);

	$dropshipping_store_hover_duration = get_theme_mod(
		'dropshipping_store_featured_image_hover_duration',
		0.4
	);

	if ( $dropshipping_store_show_featured && $dropshipping_store_hover_effect !== 'none' ) {

		/* BASE RESET (MOST IMPORTANT PART) */
		$dropshipping_store_custom_css .= '
		.dropshipping-store-featured-image{
			overflow: hidden;
		}
		.dropshipping-store-featured-image img{
			transform: scale(1);
			filter: none;
			transition:
				transform ' . esc_attr( $dropshipping_store_hover_duration ) . 's ease,
				filter ' . esc_attr( $dropshipping_store_hover_duration ) . 's ease;
			will-change: transform, filter;
		}';

		/* ZOOM IN */
		if ( $dropshipping_store_hover_effect === 'zoom-in' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img:hover{
				transform: scale(1.2);
			}';
		}

		/* ZOOM OUT */
		if ( $dropshipping_store_hover_effect === 'zoom-out' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img{
				transform: scale(1.2);
			}
			.dropshipping-store-featured-image img:hover{
				transform: scale(1);
			}';
		}

		/* GRAYSCALE (NORMAL → COLOR ON HOVER) */
		if ( $dropshipping_store_hover_effect === 'grayscale' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img{
				filter: grayscale(0%);
			}
			.dropshipping-store-featured-image img:hover{
				filter: grayscale(100%);
			}';
		}

		/* SEPIA */
		if ( $dropshipping_store_hover_effect === 'sepia' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img:hover{
				filter: sepia(100%);
			}';
		}

		/* BLUR */
		if ( $dropshipping_store_hover_effect === 'blur' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img:hover{
				filter: blur(3px);
			}';
		}

		/* BRIGHT */
		if ( $dropshipping_store_hover_effect === 'bright' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img:hover{
				filter: brightness(1.3);
			}';
		}

		/* TRANSLATE */
		if ( $dropshipping_store_hover_effect === 'translate' ) {
			$dropshipping_store_custom_css .= '
			.dropshipping-store-featured-image img:hover{
				transform: translateY(-10px);
			}';
		}
	}

	
<?php
/**
 * Dropshipping Store Theme Customizer
 * @package Dropshipping Store
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dropshipping_store_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'dropshipping_store_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','dropshipping-store' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

   $wp_customize->add_setting('dropshipping_store_logo_padding_font_size',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_logo_padding_font_size',array(
		'label' => esc_html__( 'Logo Padding  (px)','dropshipping-store' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('dropshipping_store_logo_margin',array(
		'default'=> '',
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_logo_margin',array(
		'label' => esc_html__( 'Logo Margin  (px)','dropshipping-store' ),
		'section'=> 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
         'step'  => 1,
			'min'   => 0,
			'max'   => 100,
        ),
	)));

	$wp_customize->add_setting('dropshipping_store_site_title_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_site_title_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Title','dropshipping-store'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('dropshipping_store_site_title_font_size',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','dropshipping-store' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('dropshipping_store_site_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_site_title_color', array(
		'label'    => __('Site Title Color', 'dropshipping-store'),
		'section'  => 'title_tagline',
		'settings' => 'dropshipping_store_site_title_color',
	)));

   $wp_customize->add_setting('dropshipping_store_site_tagline_enable',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
   $wp_customize->add_control('dropshipping_store_site_tagline_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Tagline','dropshipping-store'),
       'section' => 'title_tagline'
    ));

   $wp_customize->add_setting('dropshipping_store_site_tagline_font_size',array(
		'default'=> 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','dropshipping-store' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	// site tagline color
	$wp_customize->add_setting('dropshipping_store_site_tagline_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_site_tagline_color', array(
		'label'    => __('Site Tagline Color', 'dropshipping-store'),
		'section'  => 'title_tagline',
		'settings' => 'dropshipping_store_site_tagline_color',
	)));

   $wp_customize->add_setting('dropshipping_store_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
   $wp_customize->add_control('dropshipping_store_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','dropshipping-store'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('dropshipping_store_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','dropshipping-store'),
        'description' => __('Here you can add the background skin along with the background image.','dropshipping-store'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','dropshipping-store'),
            'Without Background' => __('Without Background Skin','dropshipping-store'),
        ),
	) );

	//Important Links
	$wp_customize->add_section( 'dropshipping_store_important_links' , array(
    	'title' => esc_html__( 'Important Links', 'dropshipping-store' ),
    	'priority' => 10,
	) );

	$wp_customize->add_setting('dropshipping_store_doc_link',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_doc_link',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url(DROPSHIPPING_STORE_FREE_DOC) ." '>". esc_html__('Documentation','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_important_links'
	));

	$wp_customize->add_setting('dropshipping_store_demo_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_demo_links',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url(DROPSHIPPING_STORE_LIVE_DEMO) ." '>". esc_html__('Demo','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_important_links'
	));

	$wp_customize->add_setting('dropshipping_store_forum_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_forum_links',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url(DROPSHIPPING_STORE_FREE_SUPPORT) ." '>". esc_html__('Support Forum','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_important_links'
	));

	$wp_customize->add_setting('dropshipping_store_review_links',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_review_links',array(
		'type'=> 'hidden',
		'description' => "<a target='_blank' href='". esc_url(DROPSHIPPING_STORE_REVIEW) ." '>". esc_html__('Review','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_important_links'
	));	

	//add home page setting pannel
	$wp_customize->add_panel( 'dropshipping_store_panel_id', array(
	    'priority' => 11,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'dropshipping-store' ),
	    'description' => __( 'Description of what this panel does.', 'dropshipping-store' ),
	) );

	$dropshipping_store_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('dropshipping_store_typography', array(
		'title'    => __('Typography', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_typography_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_typography_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_typography'
	));

	//This is body FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_body_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_body_color', array(
		'label'    => __('Body Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_body_color',
	)));

	$wp_customize->add_setting('dropshipping_store_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control(	'dropshipping_store_body_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('Body Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	$wp_customize->add_setting('dropshipping_store_body_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_body_font_size', array(
		'label'   => __('Body Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_body_font_size',
		'type'    => 'text',
	));

	$wp_customize->add_setting('dropshipping_store_body_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_body_font_weight',array(
		'type' => 'select',
		'label' => __('Body Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );			

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('dropshipping_store_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_paragraph_color', array(
		'label'    => __('Paragraph Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control(	'dropshipping_store_paragraph_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('Paragraph Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	$wp_customize->add_setting('dropshipping_store_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_paragraph_font_size',
		'type'    => 'text',
	));

	$wp_customize->add_setting('dropshipping_store_paragraph_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_paragraph_font_weight',array(
		'type' => 'select',
		'label' => __('Paragraph Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );		

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('dropshipping_store_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_atag_color', array(
		'label'    => __('"a" Tag Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control(	'dropshipping_store_atag_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('"a" Tag Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('dropshipping_store_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_li_color', array(
		'label'    => __('"li" Tag Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control(	'dropshipping_store_li_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('"li" Tag Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('dropshipping_store_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_h1_color', array(
		'label'    => __('H1 Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_h1_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('H1 Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('dropshipping_store_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_h1_font_size', array(
		'label'   => __('H1 Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_h1_font_size',
		'type'    => 'text',
	));

	//This is H1 FontWeight setting	
	$wp_customize->add_setting('dropshipping_store_h1_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_h1_font_weight',array(
		'type' => 'select',
		'label' => __('H1 Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );		

	// This is H2 Color picker setting
	$wp_customize->add_setting('dropshipping_store_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_h2_color', array(
		'label'    => __('H2 Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control(
	'dropshipping_store_h2_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('H2 Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('dropshipping_store_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_h2_font_size', array(
		'label'   => __('H2 Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_h2_font_size',
		'type'    => 'text',
	));

	//This is H2 FontWeight setting	
	$wp_customize->add_setting('dropshipping_store_h2_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_h2_font_weight',array(
		'type' => 'select',
		'label' => __('H2 Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );				

	// This is H3 Color picker setting
	$wp_customize->add_setting('dropshipping_store_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_h3_color', array(
		'label'    => __('H3 Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control(
	'dropshipping_store_h3_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('H3 Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('dropshipping_store_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_h3_font_size', array(
		'label'   => __('H3 Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_h3_font_size',
		'type'    => 'text',
	));

	//This is H3 FontWeight setting	
	$wp_customize->add_setting('dropshipping_store_h3_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_h3_font_weight',array(
		'type' => 'select',
		'label' => __('H3 Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );		

	// This is H4 Color picker setting
	$wp_customize->add_setting('dropshipping_store_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_h4_color', array(
		'label'    => __('H4 Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_h4_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('H4 Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('dropshipping_store_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_h4_font_size', array(
		'label'   => __('H4 Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_h4_font_size',
		'type'    => 'text',
	));

	//This is H4 FontWeight setting	
	$wp_customize->add_setting('dropshipping_store_h4_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_h4_font_weight',array(
		'type' => 'select',
		'label' => __('H4 Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );		

	// This is H5 Color picker setting
	$wp_customize->add_setting('dropshipping_store_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_h5_color', array(
		'label'    => __('H5 Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_h5_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('H5 Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('dropshipping_store_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_h5_font_size', array(
		'label'   => __('H5 Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_h5_font_size',
		'type'    => 'text',
	));

	//This is H5 FontWeight setting	
	$wp_customize->add_setting('dropshipping_store_h5_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_h5_font_weight',array(
		'type' => 'select',
		'label' => __('H5 Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );			

	// This is H6 Color picker setting
	$wp_customize->add_setting('dropshipping_store_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_h6_color', array(
		'label'    => __('H6 Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_typography',
		'settings' => 'dropshipping_store_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('dropshipping_store_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_h6_font_family', array(
		'section' => 'dropshipping_store_typography',
		'label'   => __('H6 Fonts', 'dropshipping-store'),
		'type'    => 'select',
		'choices' => $dropshipping_store_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('dropshipping_store_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_h6_font_size', array(
		'label'   => __('H6 Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'setting' => 'dropshipping_store_h6_font_size',
		'type'    => 'text',
	));

	//This is H6 FontWeight setting	
	$wp_customize->add_setting('dropshipping_store_h6_font_weight',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_h6_font_weight',array(
		'type' => 'select',
		'label' => __('H6 Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_typography',
		'choices' => array(
		   '100' => __('100','dropshipping-store'),
         '200' => __('200','dropshipping-store'),
         '300' => __('300','dropshipping-store'),
         '400' => __('400','dropshipping-store'),
         '500' => __('500','dropshipping-store'),
         '600' => __('600','dropshipping-store'),
         '700' => __('700','dropshipping-store'),
         '800' => __('800','dropshipping-store'),
         '900' => __('900','dropshipping-store'),
		),
	) );				

	//Top Bar Section
	$wp_customize->add_section('dropshipping_store_topbar',array(
		'title'	=> __('Header','dropshipping-store'),
		'description'	=> __('Add contact us here','dropshipping-store'),
		'priority'	=> null,
		'panel' => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_topbar_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_topbar_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_topbar'
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'dropshipping_store_show_top_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('dropshipping_store_show_top_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Topbar','dropshipping-store' ),
        'section' => 'dropshipping_store_topbar'
    ));

    $wp_customize->add_setting( 'dropshipping_store_topbar_padding_settings', array(
		'default'=> 8,
		'sanitize_callback'	=> 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'dropshipping_store_topbar_padding_settings', array(
		'label'       => esc_html__( 'Topbar Padding','dropshipping-store' ),
		'section'     => 'dropshipping_store_topbar',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

 	$wp_customize->add_setting( 'dropshipping_store_sticky_header',array(
		'default'	=> false,
      	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
 	) );
 	$wp_customize->add_control('dropshipping_store_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Sticky Header','dropshipping-store' ),
        'section' => 'dropshipping_store_topbar'
 	));

	$wp_customize->add_setting('dropshipping_store_topbar_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('dropshipping_store_topbar_text',array(
		'type' => 'text',
		'label' => __('Topbar Text','dropshipping-store'),
		'section' => 'dropshipping_store_topbar',
	) );

	$wp_customize->add_setting('dropshipping_store_phone_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('dropshipping_store_phone_text',array(
		'type' => 'text',
		'label' => __('Add Phone Text','dropshipping-store'),
		'section' => 'dropshipping_store_topbar',
	) );

	$wp_customize->add_setting('dropshipping_store_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'dropshipping_store_sanitize_phone_number'
 	));
 	$wp_customize->add_control('dropshipping_store_phone_number',array(
		'type' => 'text',
		'label' => __('Add Phone Number','dropshipping-store'),
		'section' => 'dropshipping_store_topbar',
	) );

	$wp_customize->add_setting('dropshipping_store_wishlist_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
 	));
 	$wp_customize->add_control('dropshipping_store_wishlist_link',array(
		'type' => 'text',
		'label' => __('Add Wishlist Link','dropshipping-store'),
		'section' => 'dropshipping_store_topbar',
	) );

	$wp_customize->add_setting('dropshipping_store_header_icons_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('dropshipping_store_header_icons_size', array(
		'label'   => __('Icon Font Size', 'dropshipping-store'),
		'section' => 'dropshipping_store_topbar',
		'setting' => 'dropshipping_store_header_icons_size',
		'type'    => 'number',
		'input_attrs' => array(
        'min'  => 10,
        'max'  => 40,
        'step' => 1,
		)
	));

	//Menu Settings
	$wp_customize->add_section('dropshipping_store_menu_settings',array(
		'title'	=> __('Menu Settings','dropshipping-store'),
		'priority'	=> null,
		'panel' => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_menus_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_menus_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_menu_settings'
	));

	$wp_customize->add_setting('dropshipping_store_menu_font_size_option',array(
		'default'=> 13,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,'dropshipping_store_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','dropshipping-store'),
		'section'=> 'dropshipping_store_menu_settings',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('dropshipping_store_menu_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,'dropshipping_store_menu_top_bottom_padding',array(
		'label'	=> __('Menu Top-Bottom Padding','dropshipping-store'),
		'section'=> 'dropshipping_store_menu_settings',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('dropshipping_store_menu_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,'dropshipping_store_menu_left_right_padding',array(
		'label'	=> __('Menu Left-Right Padding','dropshipping-store'),
		'section'=> 'dropshipping_store_menu_settings',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('dropshipping_store_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','dropshipping-store'),
		'section' => 'dropshipping_store_menu_settings',
		'choices' => array(
		   'Uppercase' => __('Uppercase','dropshipping-store'),
		   'Lowercase' => __('Lowercase','dropshipping-store'),
		   'Capitalize' => __('Capitalize','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_font_weight_option_menu',array(
		'default' => '600',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_menu_settings',
		'choices' => array(
			'100' => __('100','dropshipping-store'),
			'200' => __('200','dropshipping-store'),
			'300' => __('300','dropshipping-store'),
			'400' => __('400','dropshipping-store'),
			'500' => __('500','dropshipping-store'),
			'600' => __('600','dropshipping-store'),
			'700' => __('700','dropshipping-store'),
			'800' => __('800','dropshipping-store'),
			'900' => __('900','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_menus_item_style',array(
        'default' => '',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_menus_item_style',array(
        'type' => 'select',
		'label' => __('Menu Item Hover Style','dropshipping-store'),
		'section' => 'dropshipping_store_menu_settings',
		'choices' => array(
            'None' => __('None','dropshipping-store'),
            'Zoom In' => __('Zoom In','dropshipping-store'),
        ),
	));

	$wp_customize->add_setting('dropshipping_store_menu_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_menu_color', array(
		'label'    => __('Menu Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_menu_settings',
		'settings' => 'dropshipping_store_menu_color',
	)));

	$wp_customize->add_setting('dropshipping_store_sub_menu_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_sub_menu_color', array(
		'label'    => __('Submenu Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_menu_settings',
		'settings' => 'dropshipping_store_sub_menu_color',
	)));

	$wp_customize->add_setting('dropshipping_store_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_menu_settings',
		'settings' => 'dropshipping_store_menu_hover_color',
	)));

	$wp_customize->add_setting('dropshipping_store_sub_menu_hover_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_sub_menu_hover_color', array(
		'label'    => __('Submenu Hover Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_menu_settings',
		'settings' => 'dropshipping_store_sub_menu_hover_color',
	)));

	$wp_customize->add_setting('dropshipping_store_sub_menu_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_sub_menu_bg_color', array(
		'label'    => __('Submenu Background Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_menu_settings',
		'settings' => 'dropshipping_store_sub_menu_bg_color',
	)));

	$wp_customize->add_setting('dropshipping_store_sub_menu_bg_hover_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_sub_menu_bg_hover_color', array(
		'label'    => __('Submenu Background Hover Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_menu_settings',
		'settings' => 'dropshipping_store_sub_menu_bg_hover_color',
	)));

	//Slider Section
	$wp_customize->add_section( 'dropshipping_store_slider_section' , array(
    	'title'      => __( 'Slider Section', 'dropshipping-store' ),
		'priority'   => null,
		'panel' => 'dropshipping_store_panel_id'
	) );

	$wp_customize->add_setting('dropshipping_store_slider_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_slider_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('You can change how many slides there are.','dropshipping-store') ."</li><li>". esc_html__('You can change the font family and the colours of headings and subheadings.','dropshipping-store') ."</li><li>". esc_html__('And so on...','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_slider_section'
	));

	$wp_customize->add_setting('dropshipping_store_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','dropshipping-store'),
		'section' => 'dropshipping_store_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'dropshipping_store_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'dropshipping_store_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'dropshipping_store_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'dropshipping-store' ),
			'description' => __('Slider image size (1400 x 600)','dropshipping-store'),
			'section'  => 'dropshipping_store_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'dropshipping_store_slider_small_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_slider_small_title', array(
		'label'    => __( 'Add Slider Small Text', 'dropshipping-store' ),
		'input_attrs' => array(
            'placeholder' => __( 'Best Deals !', 'dropshipping-store' ),
        ),
		'section'  => 'dropshipping_store_slider_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting('dropshipping_store_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','dropshipping-store'),
		'section' => 'dropshipping_store_slider_section'
	));

	$wp_customize->add_setting('dropshipping_store_slider_heading_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_slider_heading_color', array(
		'label'    => __('Slider Heading Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_slider_section',
	)));

	$wp_customize->add_setting('dropshipping_store_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','dropshipping-store'),
		'section' => 'dropshipping_store_slider_section'
	));

	$wp_customize->add_setting('dropshipping_store_slider_text_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_slider_text_color', array(
		'label'    => __('Slider Text Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_slider_section',
	)));

	$wp_customize->add_setting('dropshipping_store_show_slider_button',array(
	 'default' => true,
	 'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_show_slider_button',array(
	 'type' => 'checkbox',
	 'label' => __('Show / Hide Slider Button','dropshipping-store'),
	 'section' => 'dropshipping_store_slider_section'
	));

	$wp_customize->add_setting('dropshipping_store_slider_button_text',array(
		'default'	=> __('SHOP NOW','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_slider_button_text',array(
		'label'	=> __('Slider Button Text','dropshipping-store'),
		'section'	=> 'dropshipping_store_slider_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_slider_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('dropshipping_store_slider_button_link',array(
		'label'	=> esc_html__('Add Button Link','dropshipping-store'),
		'section'=> 'dropshipping_store_slider_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('dropshipping_store_slider_btn_text_color', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_slider_btn_text_color', array(
		'label'    => __('Slider Button Text Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_slider_section',
	)));

	$wp_customize->add_setting('dropshipping_store_slider_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_slider_btn_bg_color', array(
		'label'    => __('Slider Button Background Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_slider_section',
	)));

	$wp_customize->add_setting('dropshipping_store_enable_slider_overlay',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_enable_slider_overlay',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Image Overlay','dropshipping-store'),
		'section' => 'dropshipping_store_slider_section'
	));

	$wp_customize->add_setting('dropshipping_store_slider_previous_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new dropshipping_store_Icon_Changer(
        $wp_customize,'dropshipping_store_slider_previous_icon',array(
		'label'	=> __('Slider Previous Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_slider_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_slider_next_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new dropshipping_store_Icon_Changer(
        $wp_customize,'dropshipping_store_slider_next_icon',array(
		'label'	=> __('Slider Next Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_slider_section',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('dropshipping_store_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_slider_section',
		'settings' => 'dropshipping_store_slider_overlay_color',
	)));

	//Opacity
	$wp_customize->add_setting('dropshipping_store_slider_opacity',array(
		'default'           => 0.7,
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control( 'dropshipping_store_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','dropshipping-store' ),
		'section'     => 'dropshipping_store_slider_section',
		'type'        => 'select',
		'settings'    => 'dropshipping_store_slider_opacity',
		'choices' => array(
			'0' =>  esc_attr('0','dropshipping-store'),
			'0.1' =>  esc_attr('0.1','dropshipping-store'),
			'0.2' =>  esc_attr('0.2','dropshipping-store'),
			'0.3' =>  esc_attr('0.3','dropshipping-store'),
			'0.4' =>  esc_attr('0.4','dropshipping-store'),
			'0.5' =>  esc_attr('0.5','dropshipping-store'),
			'0.6' =>  esc_attr('0.6','dropshipping-store'),
			'0.7' =>  esc_attr('0.7','dropshipping-store'),
			'0.8' =>  esc_attr('0.8','dropshipping-store'),
			'0.9' =>  esc_attr('0.9','dropshipping-store')
		),
	));

	//content layout
    $wp_customize->add_setting('dropshipping_store_slider_content_layout',array(
    	'default' => 'Left',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','dropshipping-store'),
		'section' => 'dropshipping_store_slider_section',
		'choices' => array(
		   'Center' => __('Center','dropshipping-store'),
		   'Left' => __('Left','dropshipping-store'),
		   'Right' => __('Right','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_option_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_option_slider_height',array(
		'label'	=> __('Slider Height','dropshipping-store'),
		'section'=> 'dropshipping_store_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_slider_content_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_slider_content_top_padding',array(
		'label' => __('Top Bottom Slider Content Spacing','dropshipping-store'),
		'section'=> 'dropshipping_store_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
	)));

	$wp_customize->add_setting('dropshipping_store_slider_content_left_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_slider_content_left_padding',array(
		'label' => __('Left Right Slider Content Spacing','dropshipping-store'),
		'section'=> 'dropshipping_store_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
  		),
	)));

	//Slider excerpt
	$wp_customize->add_setting( 'dropshipping_store_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'dropshipping_store_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','dropshipping-store' ),
		'section'     => 'dropshipping_store_slider_section',
		'type'        => 'number',
		'settings'    => 'dropshipping_store_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'dropshipping_store_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','dropshipping-store' ),
		'section' => 'dropshipping_store_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('dropshipping_store_product_section',array(
		'title' => __('Featured Products','dropshipping-store'),
		'description' => '',
		'priority'  => null,
		'panel' => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_product_sec_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_product_sec_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Includes settings to set section title.','dropshipping-store') ."</li><li>". esc_html__('Contains settings for the background colour.','dropshipping-store') ."</li><li>". esc_html__('Contains options for background images.','dropshipping-store') ."</li><li>". esc_html__('You can change the font family and colours of heading.','dropshipping-store') ."</li><li>". esc_html__('And so on...','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_product_section'
	));

	$wp_customize->add_setting('dropshipping_store_product_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Featured Products','dropshipping-store'),
		'section' => 'dropshipping_store_product_section'
	));

	$wp_customize->add_setting('dropshipping_store_product_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_product_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','dropshipping-store'),
		'section' => 'dropshipping_store_product_section'
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
 	$categories = get_categories( $args );
 	$cats = array();
 	$i = 0;
 	foreach($categories as $category){
     	if($i==0){
         $default = $category->slug;
         $i++;
     	}
     $cats[$category->slug] = $category->name;
 	}
 	$wp_customize->add_setting('dropshipping_store_product_slide',array(
     	'sanitize_callback' => 'dropshipping_store_sanitize_choices',
 	));
	$wp_customize->add_control('dropshipping_store_product_slide',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Category','dropshipping-store'),
		'section' => 'dropshipping_store_product_section',
 	));

	//layout setting
	$wp_customize->add_section( 'dropshipping_store_option', array(
    	'title'      => __( 'Layout Settings', 'dropshipping-store' ),
    	'panel'    => 'dropshipping_store_panel_id',
	));

	// animation 
	$wp_customize->add_setting( 'dropshipping_store_sidebar_animation',array(
	    'default' => true,
    	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
  	));
	$wp_customize->add_control('dropshipping_store_sidebar_animation',array(
	    	'type' => 'checkbox',
	       'label' => __( 'Show / Hide Animations','dropshipping-store' ),
	       'section' => 'dropshipping_store_option'
	)); 

	// Progress Bar
	$wp_customize->add_setting( 'dropshipping_store_progress_bar',array(
	    'default' => false,
    	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
  	));
	$wp_customize->add_control('dropshipping_store_progress_bar',array(
		'type' => 'checkbox',
		'label' => __( 'Show / Hide Progress Bar','dropshipping-store' ),
		'section' => 'dropshipping_store_option'
	));

	$wp_customize->add_setting('dropshipping_store_layout_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_layout_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_option'
	));

    $wp_customize->add_setting( 'dropshipping_store_single_page_breadcrumb',array(
		'default' => false,
      	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('dropshipping_store_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','dropshipping-store' ),
        'section' => 'dropshipping_store_option'
    ));

	$wp_customize->add_setting('dropshipping_store_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','dropshipping-store'),
       'section' => 'dropshipping_store_option'
    ));

    $wp_customize->add_setting('dropshipping_store_preloader_type',array(
        'default' => 'First Preloader Type',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Types','dropshipping-store'),
        'section' => 'dropshipping_store_option',
        'choices' => array(
            'First Preloader Type' => __('First Preloader Type','dropshipping-store'),
            'Second Preloader Type' => __('Second Preloader Type','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting('dropshipping_store_preloader_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'dropshipping_store_preloader_bg_image',array(
        'label' => __('Preloader Background Image','dropshipping-store'),
        'section' => 'dropshipping_store_option'
	)));

	$wp_customize->add_setting('dropshipping_store_preloader_bg_color_option', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_option',
	)));

	$wp_customize->add_setting('dropshipping_store_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_option',
	)));

	$wp_customize->add_setting('dropshipping_store_width_layout_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_width_layout_options',array(
        'type' => 'radio',
        'label' => __('Container Box','dropshipping-store'),
        'description' => __('Here you can change the Width layout. ','dropshipping-store'),
        'section' => 'dropshipping_store_option',
        'choices' => array(
            'Default' => __('Default','dropshipping-store'),
            'Container Layout' => __('Container Layout','dropshipping-store'),
            'Box Layout' => __('Box Layout','dropshipping-store'),
        ),
	) );

	// Add Page Sidebar Layout
	$wp_customize->add_setting('dropshipping_store_page_sidebar_options',array(
        'default' => 'One Column',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	) );
	$wp_customize->add_control('dropshipping_store_page_sidebar_options', array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','dropshipping-store'),
        'section' => 'dropshipping_store_option',
        'choices' => array(
            'One Column' => __('One Column','dropshipping-store'),
            'Left Sidebar' => __('Left Sidebar','dropshipping-store'),
            'Right Sidebar' => __('Right Sidebar','dropshipping-store')
        ),
	)   );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('dropshipping_store_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	) );
	$wp_customize->add_control('dropshipping_store_layout_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','dropshipping-store'),
        'section' => 'dropshipping_store_option',
        'choices' => array(
            'One Column' => __('One Column','dropshipping-store'),
            'Three Columns' => __('Three Columns','dropshipping-store'),
            'Four Columns' => __('Four Columns','dropshipping-store'),
            'Grid Layout' => __('Grid Layout','dropshipping-store'),
            'Left Sidebar' => __('Left Sidebar','dropshipping-store'),
            'Right Sidebar' => __('Right Sidebar','dropshipping-store')
        ),
	)   );

	$wp_customize->add_setting('dropshipping_store_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','dropshipping-store'),
        'section' => 'dropshipping_store_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','dropshipping-store'),
            'Sidebar 1/4' => __('Sidebar 1/4','dropshipping-store'),
        ),
	) );

	//Global Color
	$wp_customize->add_section('dropshipping_store_global_color', array(
		'title'    => __('Theme Color Option', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_global_color_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_global_color_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_global_color'
	));

	$wp_customize->add_setting('dropshipping_store_first_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_first_color', array(
		'label'    => __('Highlight Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_global_color',
		'settings' => 'dropshipping_store_first_color',
	)));

	//Blog Post Settings
	$wp_customize->add_section('dropshipping_store_post_settings', array(
		'title'    => __('Post General Settings', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_blog_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_blog_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_post_settings'
	));

	$wp_customize->add_setting('dropshipping_store_post_layouts',array(
     'default' => 'Layout 2',
     'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control(new Dropshipping_Store_Image_Radio_Control($wp_customize, 'dropshipping_store_post_layouts', array(
        'type' => 'select',
        'label' => __('Post Layouts','dropshipping-store'),
        'description' => __('Here you can change the 3 different layouts of post','dropshipping-store'),
        'section' => 'dropshipping_store_post_settings',
        'choices' => array(
            'Layout 1' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Layout 2' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Layout 3' => esc_url(get_template_directory_uri()).'/images/layout3.png',
    ))));

	$wp_customize->add_setting('dropshipping_store_metafields_date',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','dropshipping-store'),
       'section' => 'dropshipping_store_post_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_post_date_icon',array(
		'label'	=> __('Post Date Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('dropshipping_store_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','dropshipping-store'),
       'section' => 'dropshipping_store_post_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_post_author_icon',array(
		'label'	=> __('Post Author Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('dropshipping_store_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','dropshipping-store'),
       'section' => 'dropshipping_store_post_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('dropshipping_store_metafields_time',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','dropshipping-store'),
       'section' => 'dropshipping_store_post_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_post_time_icon',array(
		'label'	=> __('Post Time Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','dropshipping-store'),
        'section' => 'dropshipping_store_post_settings',
        'choices' => array(
            'By Block' => __('By Block','dropshipping-store'),
            'By Without Block' => __('By Without Block','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting('dropshipping_store_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
    ));
    $wp_customize->add_control('dropshipping_store_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','dropshipping-store'),
       'choices' => array(
            'Image' => __('Image','dropshipping-store'),
            'Color' => __('Color','dropshipping-store'),
            'None' => __('None','dropshipping-store'),
        ),
      	'section'	=> 'dropshipping_store_post_settings',
    ));

    $wp_customize->add_setting( 'dropshipping_store_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','dropshipping-store' ),
		'section'     => 'dropshipping_store_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'dropshipping_store_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','dropshipping-store' ),
		'section' => 'dropshipping_store_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

    $wp_customize->add_setting('dropshipping_store_post_featured_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_post_featured_color', array(
		'label'    => __('Post Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_post_settings',
		'settings' => 'dropshipping_store_post_featured_color',
		'active_callback' => 'dropshipping_store_post_color_enabled'
	)));

	$wp_customize->add_setting( 'dropshipping_store_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','dropshipping-store' ),
		'section' => 'dropshipping_store_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'dropshipping_store_show_post_color'
	)));

	$wp_customize->add_setting( 'dropshipping_store_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','dropshipping-store' ),
		'section' => 'dropshipping_store_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'dropshipping_store_show_post_color'
	)));

	$wp_customize->add_setting('dropshipping_store_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
    ));
    $wp_customize->add_control('dropshipping_store_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','dropshipping-store'),
       'choices' => array(
            'Default' => __('Default','dropshipping-store'),
            'Custom' => __('Custom','dropshipping-store'),
        ),
      	'section'	=> 'dropshipping_store_post_settings',
      	'active_callback' => 'dropshipping_store_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'dropshipping_store_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','dropshipping-store' ),
		'section' => 'dropshipping_store_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'dropshipping_store_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'dropshipping_store_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','dropshipping-store' ),
		'section' => 'dropshipping_store_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'dropshipping_store_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting('dropshipping_store_show_first_caps',array(
        'default' => false,
        'sanitize_callback' => 'dropshipping_store_sanitize_checkbox',
    ));
	$wp_customize->add_control( 'dropshipping_store_show_first_caps',array(
		'label' => esc_html__('First Cap (First Capital Letter)', 'dropshipping-store'),
		'type' => 'checkbox',
		'section' => 'dropshipping_store_post_settings',
	));

    //Post excerpt
	$wp_customize->add_setting( 'dropshipping_store_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'dropshipping_store_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','dropshipping-store' ),
		'section'     => 'dropshipping_store_post_settings',
		'type'        => 'number',
		'settings'    => 'dropshipping_store_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('dropshipping_store_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','dropshipping-store'),
        'section' => 'dropshipping_store_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','dropshipping-store'),
            'Content' => __('Content','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting( 'dropshipping_store_post_discription_suffix', array(
		'default'   => __('[...]','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','dropshipping-store' ),
		'section'     => 'dropshipping_store_post_settings',
		'type'        => 'text',
		'settings'    => 'dropshipping_store_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'dropshipping_store_blog_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box Separator','dropshipping-store' ),
		'section'     => 'dropshipping_store_post_settings',
		'description' => __('Here you can add the separator for meta box. e.g. "|",  ",", "/", etc. ','dropshipping-store'),
		'type'        => 'text',
		'settings'    => 'dropshipping_store_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('dropshipping_store_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','dropshipping-store'),
       'section' => 'dropshipping_store_post_settings'
    ));

    $wp_customize->add_setting( 'dropshipping_store_post_pagination_position', array(
        'default'			=>  'Bottom',
        'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
    ));
    $wp_customize->add_control( 'dropshipping_store_post_pagination_position', array(
        'section' => 'dropshipping_store_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'dropshipping-store' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'dropshipping-store' ),
            'Bottom' => __( 'Bottom', 'dropshipping-store' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'dropshipping-store' ),
    )));

	$wp_customize->add_setting('dropshipping_store_post_pagination_option',array(
		'default' => 'Left',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_post_pagination_option',array(
		'type' => 'select',
		'label' => __('Post Pagination Alignment','dropshipping-store'),
		'section' => 'dropshipping_store_post_settings',
		'choices' => array(
			'Center' => __('Center','dropshipping-store'),
			'Left' => __('Left','dropshipping-store'),
			'Right' => __('Right','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting( 'dropshipping_store_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
    ));
    $wp_customize->add_control( 'dropshipping_store_pagination_settings', array(
        'section' => 'dropshipping_store_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'dropshipping-store' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'dropshipping-store' ),
            'next-prev' => __( 'Next / Previous', 'dropshipping-store' ),
    )));

	//Button Settings
	$wp_customize->add_section('dropshipping_store_button_settings', array(
		'title'    => __('Post Button Settings', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_button_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_button_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_button_settings'
	));

	$wp_customize->add_setting('dropshipping_store_button_text',array(
		'default'=> __('View More','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_button_text',array(
		'label'	=> __('Add Button Text','dropshipping-store'),
		'section'=> 'dropshipping_store_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_btn_font_size_option',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,'dropshipping_store_btn_font_size_option',array(
		'label'	=> __('Button Font Size','dropshipping-store'),
		'section'=> 'dropshipping_store_button_settings',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('dropshipping_store_button_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_button_text_tranform',array(
		'type' => 'select',
		'label' => __('Button Text Transform','dropshipping-store'),
		'section' => 'dropshipping_store_button_settings',
		'choices' => array(
		   'Uppercase' => __('Uppercase','dropshipping-store'),
		   'Lowercase' => __('Lowercase','dropshipping-store'),
		   'Capitalize' => __('Capitalize','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_button_font_weight',array(
		'default' => '700',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_button_font_weight',array(
		'type' => 'select',
		'label' => __('Button Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_button_settings',
		'choices' => array(
			'100' => __('100','dropshipping-store'),
			'200' => __('200','dropshipping-store'),
			'300' => __('300','dropshipping-store'),
			'400' => __('400','dropshipping-store'),
			'500' => __('500','dropshipping-store'),
			'600' => __('600','dropshipping-store'),
			'700' => __('700','dropshipping-store'),
			'800' => __('800','dropshipping-store'),
			'900' => __('900','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_button_hover_effect',array(
        'default' => '',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
    ));
	$wp_customize->add_control('dropshipping_store_button_hover_effect', array(
        'type' => 'select',
        'label' => __( 'Button Hover Effect', 'dropshipping-store' ),
        'section' => 'dropshipping_store_button_settings',
        'choices' => array(
			'pulse'     => __( 'Pulse', 'dropshipping-store' ),
			'rubberBand'=> __( 'RubberBand', 'dropshipping-store' ),
			'swing'     => __( 'Swing', 'dropshipping-store' ),
			'tada'      => __( 'Tada', 'dropshipping-store' ),
			'jello'     => __( 'Jello', 'dropshipping-store' ),
			'disable'   => __( 'Disabled', 'dropshipping-store' )
        ),
    ));

	$wp_customize->add_setting('dropshipping_store_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_button_icon',array(
		'label'	=> __('Button Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_button_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'dropshipping_store_post_button_padding_top',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_button_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_post_button_padding_right',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_button_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_post_button_border_radius',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_button_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	// button letter spacing
	$wp_customize->add_setting( 'dropshipping_store_button_letter_spacing',array(
		'default' => '1',
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new  Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_button_letter_spacing', array(
		'label'  =>  esc_html__('Button Letter Spacing (px)','dropshipping-store'),
		'section'  => 'dropshipping_store_button_settings',
		'input_attrs' => array(
		   'min' => 0,
		   'max' => 50,
		   'step' => 1,
		)
 	)));
	
	// Button Shape
	$wp_customize->add_setting('dropshipping_store_btn_shape',array(
		'default'=> 'Round',
		'sanitize_callback'	=> 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_btn_shape',array(
		'label'	=> __('Button Shape','dropshipping-store'),
		'section'=> 'dropshipping_store_button_settings',
		'type' => 'select',
		'choices' => array(
			'Square' => __('Square','dropshipping-store'),
			'Round' => __('Round','dropshipping-store'),
			'Pill' => __('Pill','dropshipping-store'),
		),
	));	

    //Single Post Settings
	$wp_customize->add_section('dropshipping_store_single_post_settings', array(
		'title'    => __('Single Post Settings', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_single_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_single_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_single_post_settings'
	));

	$wp_customize->add_setting('dropshipping_store_single_post_bradcrumb',array(
		'default' => false,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_single_post_bradcrumb',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Breadcrumb','dropshipping-store'),
		'section' => 'dropshipping_store_single_post_settings',
	));

	$wp_customize->add_setting('dropshipping_store_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings'
    ));

   $wp_customize->add_setting('dropshipping_store_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
      $wp_customize,'dropshipping_store_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','dropshipping-store'),
		'section' => 'dropshipping_store_single_post_settings'
	));

 	$wp_customize->add_setting('dropshipping_store_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer( $wp_customize, 'dropshipping_store_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_single_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('dropshipping_store_single_post_time',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings',
    ));

    $wp_customize->add_setting('dropshipping_store_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings',
    ));

	$wp_customize->add_setting('dropshipping_store_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings',
    ));

	// Featured Image Hover Effect
	$wp_customize->add_setting(
		'dropshipping_store_featured_image_hover',
		array(
			'default'           => 'none',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'dropshipping_store_featured_image_hover',
		array(
			'label'   => __( 'Featured Image Hover Effect', 'dropshipping-store' ),
			'section' => 'dropshipping_store_single_post_settings',
			'type'    => 'select',
			'choices' => array(
				'none'      => __( 'None', 'dropshipping-store' ),
				'zoom-in'   => __( 'Zoom In', 'dropshipping-store' ),
				'zoom-out'  => __( 'Zoom Out', 'dropshipping-store' ),
				'grayscale' => __( 'Grayscale', 'dropshipping-store' ),
				'blur'      => __( 'Blur', 'dropshipping-store' ),
				'bright'    => __( 'Bright', 'dropshipping-store' ),
				'sepia'     => __( 'Sepia', 'dropshipping-store' ),
				'translate' => __( 'Translate', 'dropshipping-store' ),
			),
		)
	);

	$wp_customize->add_setting('dropshipping_store_single_post_featured_image_dimention',array(
		'default' => 'Default',
		'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_single_post_featured_image_dimention',array(
		'type' => 'select',
		'label'	=> __('Single Post Featured Image Dimention','dropshipping-store'),
		'choices' => array(
			'Default' => __('Default','dropshipping-store'),
			'Custom' => __('Custom','dropshipping-store'),
		),
		'section'	=> 'dropshipping_store_single_post_settings',
	));

	$wp_customize->add_setting( 'dropshipping_store_single_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_single_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Single Post Featured Image Custom Width','dropshipping-store' ),
		'section' => 'dropshipping_store_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 800,
			'step' => 1,
		),
		'active_callback' => 'dropshipping_store_enable_single_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'dropshipping_store_single_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_single_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Single Post Featured Image Custom Height','dropshipping-store' ),
		'section' => 'dropshipping_store_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 800,
			'step' => 1,
		),
		'active_callback' => 'dropshipping_store_enable_single_post_image_custom_dimention'
	)));

    $wp_customize->add_setting( 'dropshipping_store_single_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_single_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','dropshipping-store' ),
		'section'     => 'dropshipping_store_single_post_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'dropshipping_store_single_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_single_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','dropshipping-store' ),
		'section' => 'dropshipping_store_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	$wp_customize->add_setting('dropshipping_store_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Single Post Categories','dropshipping-store'),
		'section' => 'dropshipping_store_single_post_settings'
	));

	$wp_customize->add_setting('dropshipping_store_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_category_color', array(
		'label'    => __('Category Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_single_post_settings',
		'settings' => 'dropshipping_store_category_color',
	)));

	$wp_customize->add_setting('dropshipping_store_category_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_category_hover_color', array(
		'label'    => __('Category Hover Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_single_post_settings',
		'settings' => 'dropshipping_store_category_hover_color',
	)));

	$wp_customize->add_setting('dropshipping_store_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	) );
	$wp_customize->add_control('dropshipping_store_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','dropshipping-store'),
        'section' => 'dropshipping_store_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','dropshipping-store'),
            'Left Sidebar' => __('Left Sidebar','dropshipping-store'),
            'Right Sidebar' => __('Right Sidebar','dropshipping-store')
        ),
	)   );

	$wp_customize->add_setting( 'dropshipping_store_single_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','dropshipping-store' ),
		'section'     => 'dropshipping_store_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','dropshipping-store'),
		'type'        => 'text',
		'settings'    => 'dropshipping_store_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'dropshipping_store_comment_form_width',array(
		'default' => 100,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','dropshipping-store' ),
		'section' => 'dropshipping_store_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('dropshipping_store_title_comment_form',array(
       'default' => __('Leave a Reply','dropshipping-store'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('dropshipping_store_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_comment_form_button_content',array(
       'default' => __('Post Comment','dropshipping-store'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('dropshipping_store_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','dropshipping-store'),
       'section' => 'dropshipping_store_single_post_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_prev_text',array(
		'default' => 'Previous page',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_prev_text',array(
		'type' => 'text',
		'label' => __('Previous Navigation Text','dropshipping-store'),
		'section' => 'dropshipping_store_single_post_settings'
	));
 
	$wp_customize->add_setting('dropshipping_store_next_text',array(
		'default' => 'Next page',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_next_text',array(
		'type' => 'text',
		'label' => __('Next Navigation Text','dropshipping-store'),
		'section' => 'dropshipping_store_single_post_settings'
	));

	//Grid Post Settings
	$wp_customize->add_section('dropshipping_store_grid_settings', array(
		'title'    => __('Grid Post Settings', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_grid_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_grid_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date','dropshipping-store'),
       'section' => 'dropshipping_store_grid_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_grid_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_grid_post_date_icon',array(
		'label'	=> __('Post Date Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_grid_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_grid_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','dropshipping-store'),
       'section' => 'dropshipping_store_grid_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_grid_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_grid_post_author_icon',array(
		'label'	=> __('Post Author Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_grid_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_grid_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comment','dropshipping-store'),
       'section' => 'dropshipping_store_grid_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_grid_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_grid_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_grid_post_time',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_grid_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','dropshipping-store'),
       'section' => 'dropshipping_store_grid_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_grid_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_grid_post_time_icon',array(
		'label'	=> __('Post Time Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_grid_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'dropshipping_store_grid_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_grid_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box Separator','dropshipping-store' ),
		'section'     => 'dropshipping_store_grid_settings',
		'description' => __('Here you can add the separator for meta box. e.g. "|",  ",", "/", etc. ','dropshipping-store'),
		'type'        => 'text',
		'settings'    => 'dropshipping_store_grid_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'dropshipping_store_grid_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_grid_image_border_radius', array(
		'label'       => esc_html__( 'Image Border Radius','dropshipping-store' ),
		'section'     => 'dropshipping_store_grid_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'dropshipping_store_grid_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,  'dropshipping_store_grid_image_box_shadow',array(
		'label' => esc_html__( 'Image Shadow','dropshipping-store' ),
		'section' => 'dropshipping_store_grid_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	$wp_customize->add_setting('dropshipping_store_grid_post_content',array(
    	'default'   => 'Post Excerpt',
     	'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_grid_post_content',array(
		'type' => 'radio',
		'label' => __('Grid Post Content Settings','dropshipping-store'),
		'section' => 'dropshipping_store_grid_settings',
		'choices' => array(
		   'None' => __('None','dropshipping-store'),
		   'Post Excerpt' => __('Post Excerpt','dropshipping-store'),
		   'Post Content' => __('Post Content','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting( 'dropshipping_store_grid_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control( 'dropshipping_store_grid_post_excerpt_number', array(
		'label'       => esc_html__( 'Grid Post Content Limit','dropshipping-store' ),
		'section'     => 'dropshipping_store_grid_settings',
		'type'        => 'number',
		'settings'    => 'dropshipping_store_grid_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'dropshipping_store_grid_excerpt_suffix', array(
		'default'   => __('[...]','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_grid_excerpt_suffix', array(
		'label'       => esc_html__( 'Grid Post Excerpt Suffix','dropshipping-store' ),
		'section'     => 'dropshipping_store_grid_settings',
		'type'        => 'text',
		'settings'    => 'dropshipping_store_grid_excerpt_suffix',
	) );

	$wp_customize->add_setting('dropshipping_store_grid_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_grid_post_block_option',array(
        'type' => 'select',
        'label' => __('Grid Post Shown','dropshipping-store'),
        'section' => 'dropshipping_store_grid_settings',
        'choices' => array(
            'By Block' => __('By Block','dropshipping-store'),
            'By Without Block' => __('By Without Block','dropshipping-store'),
        ),
	) );
	
	$wp_customize->add_setting( 'dropshipping_store_grid_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'dropshipping_store_grid_post_excerpt_number', array(
		'label'       => esc_html__( 'Grid Post Content Limit','dropshipping-store' ),
		'section'     => 'dropshipping_store_grid_settings',
		'type'        => 'number',
		'settings'    => 'dropshipping_store_grid_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('dropshipping_store_grid_columns',array(
		'default'           => '3',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
		'transport'         => 'refresh',
	));
	$wp_customize->add_control('dropshipping_store_grid_columns',array(
		'type'        => 'radio',
		'label'       => __('Grid Post Columns', 'dropshipping-store'),
		'section'     => 'dropshipping_store_grid_settings',
		'choices' => array(
		   '3'     => __('Three', 'dropshipping-store'),
		   '4'     => __('Four', 'dropshipping-store')
		),
	));

	//Related Post Settings
	$wp_customize->add_section('dropshipping_store_related_settings', array(
		'title'    => __('Related Post Settings', 'dropshipping-store'),
		'panel'    => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_related_post_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_related_post_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_related_settings'
	));

	$wp_customize->add_setting( 'dropshipping_store_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('dropshipping_store_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','dropshipping-store' ),
        'section' => 'dropshipping_store_related_settings'
    ));

	$wp_customize->add_setting('dropshipping_store_related_metafields_date',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_related_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date','dropshipping-store'),
		'section' => 'dropshipping_store_related_settings'
	));

    $wp_customize->add_setting('dropshipping_store_related_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_related_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','dropshipping-store'),
       'section' => 'dropshipping_store_related_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_related_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_related_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','dropshipping-store'),
       'section' => 'dropshipping_store_related_settings'
    ));

    $wp_customize->add_setting('dropshipping_store_related_metafields_time',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_related_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','dropshipping-store'),
       'section' => 'dropshipping_store_related_settings'
    ));

	$wp_customize->add_setting( 'dropshipping_store_related_post_meta_seperator', array(
		'default'   => '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_related_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box Separator','dropshipping-store' ),
		'section'     => 'dropshipping_store_related_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','dropshipping-store'),
		'type'        => 'text',
		'settings'    => 'dropshipping_store_related_post_meta_seperator',
	) );

    $wp_customize->add_setting('dropshipping_store_related_title',array(
		'default'	=> 'Related Post',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_related_title',array(
		'label'	=> __('Add Section Title','dropshipping-store'),
		'section'	=> 'dropshipping_store_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'dropshipping_store_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','dropshipping-store' ),
		'section'     => 'dropshipping_store_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('dropshipping_store_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','dropshipping-store'),
        'section' => 'dropshipping_store_related_settings',
        'choices' => array(
            'categories' => __('Categories','dropshipping-store'),
            'tags' => __('Tags','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting( 'dropshipping_store_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','dropshipping-store' ),
		'section' => 'dropshipping_store_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_related_post_discription_suffix', array(
		'default'   => __('[...]','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'dropshipping_store_related_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','dropshipping-store' ),
		'section'     => 'dropshipping_store_related_settings',
		'type'        => 'text',
		'settings'    => 'dropshipping_store_related_post_discription_suffix',
	) );

	$wp_customize->add_setting('dropshipping_store_related_post_featured_image',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_related_post_featured_image',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Featured image','dropshipping-store'),
		'section' => 'dropshipping_store_related_settings',
	)); 

	//Responsive Media Settings
	$wp_customize->add_section('dropshipping_store_responsive_media',array(
		'title'	=> __('Responsive Media','dropshipping-store'),
		'panel' => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_responsive_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_responsive_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_responsive_media'
	));

	$wp_customize->add_setting('dropshipping_store_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_open_menu_label',array(
       'default' => __('','dropshipping-store'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('dropshipping_store_open_menu_label',array(
       'type' => 'text',
       'label' => __('Open Menu Label','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

	$wp_customize->add_setting('dropshipping_store_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_responsive_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_close_menu_label',array(
       'default' => __('','dropshipping-store'),
       'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('dropshipping_store_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

	// site toggle button color
	$wp_customize->add_setting('dropshipping_store_toggle_button_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_toggle_button_color', array(
		'label'    => __('Toggle Button Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_responsive_media',
		'settings' => 'dropshipping_store_toggle_button_color',
	)));

	$wp_customize->add_setting('dropshipping_store_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

    $wp_customize->add_setting('dropshipping_store_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

    $wp_customize->add_setting('dropshipping_store_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

	$wp_customize->add_setting('dropshipping_store_display_post_time',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_display_post_time',array(
		'type' => 'checkbox',
		'label' => __('Display Post Time','dropshipping-store'),
		'section' => 'dropshipping_store_responsive_media'
	));

    $wp_customize->add_setting('dropshipping_store_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

    $wp_customize->add_setting('dropshipping_store_display_slider_button',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_slider_button',array(
       'type' => 'checkbox',
       'label' => __('Display Slider Button','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

	$wp_customize->add_setting('dropshipping_store_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

    $wp_customize->add_setting('dropshipping_store_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

    $wp_customize->add_setting('dropshipping_store_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','dropshipping-store'),
       'section' => 'dropshipping_store_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('dropshipping_store_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','dropshipping-store'),
		'panel' => 'dropshipping_store_panel_id',
	));

	$wp_customize->add_setting('dropshipping_store_page_not_found_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_page_not_found_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_page_not_found'
	));

	$wp_customize->add_setting('dropshipping_store_page_not_found_heading',array(
		'default'=> __('404 Not Found','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_page_not_found_heading',array(
		'label'	=> __('404 Heading','dropshipping-store'),
		'section'=> 'dropshipping_store_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_page_not_found_text',array(
		'label'	=> __('404 Content','dropshipping-store'),
		'section'=> 'dropshipping_store_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_page_not_found_button',array(
		'default'=>  __('Back to Home Page','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_page_not_found_button',array(
		'label'	=> __('404 Button','dropshipping-store'),
		'section'=> 'dropshipping_store_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_no_search_result_heading',array(
		'default'=> __('Nothing Found','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','dropshipping-store'),
		'description'=>__('The search page heading display when no results are found.','dropshipping-store'),
		'section'=> 'dropshipping_store_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','dropshipping-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_no_search_result_text',array(
		'label'	=> __('No Search Results Text','dropshipping-store'),
		'description'=>__('The search page text display when no results are found.','dropshipping-store'),
		'section'=> 'dropshipping_store_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'dropshipping_store_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'dropshipping-store' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','dropshipping-store'),
		'priority'   => null,
		'panel' => 'dropshipping_store_panel_id'
	) );

	$wp_customize->add_setting('dropshipping_store_woocommerce_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_woocommerce_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_woocommerce_section'
	));

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'dropshipping_store_per_columns' , array(
		'default'           => 4,
		'transport'         => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'dropshipping_store_per_columns', array(
		'label'    => __( 'Product per columns', 'dropshipping-store' ),
		'section'  => 'dropshipping_store_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('dropshipping_store_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_product_per_page',array(
		'label'	=> __('Product per page','dropshipping-store'),
		'section'	=> 'dropshipping_store_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('dropshipping_store_shop_sidebar_enable',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','dropshipping-store'),
       'section' => 'dropshipping_store_woocommerce_section',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('dropshipping_store_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page Layout', 'dropshipping-store'),
		'section'        => 'dropshipping_store_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'dropshipping-store'),
			'Right Sidebar' => __('Right Sidebar', 'dropshipping-store'),
		),
	));

    $wp_customize->add_setting('dropshipping_store_product_page_sidebar_enable',array(
       'default' => false,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Product Page Sidebar','dropshipping-store'),
       'section' => 'dropshipping_store_woocommerce_section',
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('dropshipping_store_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Product Page Layout', 'dropshipping-store'),
		'section'        => 'dropshipping_store_woocommerce_section',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'dropshipping-store'),
			'Right Sidebar' => __('Right Sidebar', 'dropshipping-store'),
		),
	));

    $wp_customize->add_setting('dropshipping_store_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','dropshipping-store'),
       'section' => 'dropshipping_store_woocommerce_section',
    ));

    $wp_customize->add_setting( 'dropshipping_store_woo_product_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','dropshipping-store'),
        'section'  => 'dropshipping_store_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('dropshipping_store_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','dropshipping-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'dropshipping_store_woocommerce_section',
	)));

    $wp_customize->add_setting('dropshipping_store_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','dropshipping-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'dropshipping_store_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('dropshipping_store_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','dropshipping-store'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'dropshipping_store_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('dropshipping_store_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','dropshipping-store'),
        'section' => 'dropshipping_store_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','dropshipping-store'),
            'Left' => __('Left','dropshipping-store'),
        ),
	));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_button_border_radius',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

    $wp_customize->add_setting('dropshipping_store_woocommerce_product_border_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ));
    $wp_customize->add_control('dropshipping_store_woocommerce_product_border_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','dropshipping-store'),
       'section' => 'dropshipping_store_woocommerce_section',
    ));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_product_padding_top',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_product_padding_right',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_product_border_radius',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_woocommerce_product_box_shadow',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('dropshipping_store_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
    ));
    $wp_customize->add_control('dropshipping_store_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','dropshipping-store'),
       'choices' => array(
            'Yes' => __('Yes','dropshipping-store'),
            'No' => __('No','dropshipping-store'),
        ),
       'section' => 'dropshipping_store_woocommerce_section',
    ));

	//footer text
	$wp_customize->add_section('dropshipping_store_footer_section',array(
		'title'	=> __('Footer Text','dropshipping-store'),
		'panel' => 'dropshipping_store_panel_id'
	));

	$wp_customize->add_setting('dropshipping_store_footer_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_footer_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_footer_section'
	));

	$wp_customize->add_setting('dropshipping_store_show_hide_footer',array(
		'default' => true, 
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_show_hide_footer',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Footer','dropshipping-store'),
      	'section' => 'dropshipping_store_footer_section',
	));

  	$wp_customize->add_setting('dropshipping_store_footer_template',array(
      'default'	=> esc_html('dropshipping_store-footer-one'),
      'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_template',array(
		'label'	=> esc_html__('Footer style','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_section',
		'setting'	=> 'dropshipping_store_footer_template',
		'type' => 'select',
		'choices' => array(
          'dropshipping_store-footer-one' => esc_html__('Style 1', 'dropshipping-store'),
          'dropshipping_store-footer-two' => esc_html__('Style 2', 'dropshipping-store'),
          'dropshipping_store-footer-three' => esc_html__('Style 3', 'dropshipping-store'),
          'dropshipping_store-footer-four' => esc_html__('Style 4', 'dropshipping-store'),
          'dropshipping_store-footer-five' => esc_html__('Style 5', 'dropshipping-store'),
          )
	));		

	$wp_customize->add_setting('dropshipping_store_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	$wp_customize->add_setting('dropshipping_store_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'dropshipping_store_footer_bg_image',array(
		'label' => __('Footer Background Image','dropshipping-store'),
		'section' => 'dropshipping_store_footer_section'
	)));
	
	$wp_customize->add_setting('dropshipping_store_footer_attatchment',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_attatchment',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','dropshipping-store'),
		'choices' => array(
            'fixed' => __('fixed','dropshipping-store'),
            'scroll' => __('scroll','dropshipping-store'),
        ),
		'section'=> 'dropshipping_store_footer_section',
	));

	$wp_customize->add_setting('dropshipping_store_footer_img_position',array(
		'default' => 'center center',
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	  ));
	  $wp_customize->add_control('dropshipping_store_footer_img_position',array(
		  'type' => 'select',
		  'label' => __('Footer Image Position','dropshipping-store'),
		  'section' => 'dropshipping_store_footer_section',
		  'choices' 	=> array(
			  'left top' 		=> esc_html__( 'Top Left', 'dropshipping-store' ),
			  'center top'   => esc_html__( 'Top', 'dropshipping-store' ),
			  'right top'   => esc_html__( 'Top Right', 'dropshipping-store' ),
			  'left center'   => esc_html__( 'Left', 'dropshipping-store' ),
			  'center center'   => esc_html__( 'Center', 'dropshipping-store' ),
			  'right center'   => esc_html__( 'Right', 'dropshipping-store' ),
			  'left bottom'   => esc_html__( 'Bottom Left', 'dropshipping-store' ),
			  'center bottom'   => esc_html__( 'Bottom', 'dropshipping-store' ),
			  'right bottom'   => esc_html__( 'Bottom Right', 'dropshipping-store' ),
		  ),
	  ));		

	$wp_customize->add_setting('dropshipping_store_footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'dropshipping_store_sanitize_choices',
	));
	$wp_customize->add_control('dropshipping_store_footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'dropshipping-store'),
		'section'     => 'dropshipping_store_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'dropshipping-store'),
		'choices' => array(
		   '1'     => __('One', 'dropshipping-store'),
		   '2'     => __('Two', 'dropshipping-store'),
		   '3'     => __('Three', 'dropshipping-store'),
		   '4'     => __('Four', 'dropshipping-store')
		),
	));

	$wp_customize->add_setting('dropshipping_store_footer_heading',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_heading',array(
	    'type' => 'select',
	    'label' => __('Footer Heading Alignment','dropshipping-store'),
	    'section' => 'dropshipping_store_footer_section',
	    'choices' => array(
	    	'Left' => __('Left','dropshipping-store'),
	        'Center' => __('Center','dropshipping-store'),
	        'Right' => __('Right','dropshipping-store')
	    ),
	) );

	$wp_customize->add_setting('dropshipping_store_footer_heading_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_footer_heading_letter_spacing',array(
		'label'	=> __('Footer Heading Letter Spacing','dropshipping-store'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'dropshipping_store_footer_section',
	));	

	$wp_customize->add_setting('dropshipping_store_footer_content',array(
	    'default' => 'Left',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_content',array(
	    'type' => 'select',
	    'label' => __('Footer Content Alignment','dropshipping-store'),
	    'section' => 'dropshipping_store_footer_section',
	    'choices' => array(
	    	'Left' => __('Left','dropshipping-store'),
	        'Center' => __('Center','dropshipping-store'),
	        'Right' => __('Right','dropshipping-store')
	    ),
	) );

	$wp_customize->add_setting('dropshipping_store_footer_heading_font_size',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_footer_heading_font_size',array(
		'label' => esc_html__( 'Footer Heading Font Size','dropshipping-store' ),
		'section'=> 'dropshipping_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('dropshipping_store_footer_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_footer_text_tranform',array(
		'type' => 'select',
		'label' => __('Footer Heading Text Transform','dropshipping-store'),
		'section' => 'dropshipping_store_footer_section',
		'choices' => array(
		   'Uppercase' => __('Uppercase','dropshipping-store'),
		   'Lowercase' => __('Lowercase','dropshipping-store'),
		   'Capitalize' => __('Capitalize','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_footer_heading_font_weight',array(
		'default' => '500',
		'sanitize_callback' => 'dropshipping_store_sanitize_choices'
 	));
 	$wp_customize->add_control('dropshipping_store_footer_heading_font_weight',array(
		'type' => 'select',
		'label' => __('Footer Heading Font Weight','dropshipping-store'),
		'section' => 'dropshipping_store_footer_section',
		'choices' => array(
			'100' => __('100','dropshipping-store'),
			'200' => __('200','dropshipping-store'),
			'300' => __('300','dropshipping-store'),
			'400' => __('400','dropshipping-store'),
			'500' => __('500','dropshipping-store'),
			'600' => __('600','dropshipping-store'),
			'700' => __('700','dropshipping-store'),
			'800' => __('800','dropshipping-store'),
			'900' => __('900','dropshipping-store'),
		),
	) );

	$wp_customize->add_setting('dropshipping_store_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize,'dropshipping_store_footer_padding',array(
		'label'	=> __('Footer Widget Padding','dropshipping-store'),
		'section'=> 'dropshipping_store_footer_section',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 100,
      ),
	)));

	$wp_customize->add_setting('dropshipping_store_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','dropshipping-store'),
      	'section' => 'dropshipping_store_footer_section',
	));

	$wp_customize->add_setting('dropshipping_store_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('dropshipping_store_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','dropshipping-store'),
		'section'=> 'dropshipping_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('dropshipping_store_scroll_icon_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_scroll_icon_color', array(
		'label'    => __('Back to Top Icon Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	$wp_customize->add_setting('dropshipping_store_scroll_icon_hover_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_scroll_icon_hover_color', array(
		'label'    => __('Back to Top Icon Hover Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	$wp_customize->add_setting('dropshipping_store_scroll_icon_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_scroll_icon_bg_color', array(
		'label'    => __('Back to Top Background Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	$wp_customize->add_setting('dropshipping_store_scroll_icon_bg_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_scroll_icon_bg_hover_color', array(
		'label'    => __('Back to Top Background Hover Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	$wp_customize->add_setting('dropshipping_store_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','dropshipping-store'),
        'section' => 'dropshipping_store_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','dropshipping-store'),
            'Right align' => __('Right Align','dropshipping-store'),
            'Center align' => __('Center Align','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting( 'dropshipping_store_top_bottom_scroll_padding',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'dropshipping_store_back_to_top_border_radius',array(
		'default' => 6,
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('dropshipping_store_show_hide_copyright',array(
		'default' => true,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_show_hide_copyright',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Copyright','dropshipping-store'),
      	'section' => 'dropshipping_store_footer_section',
	));

	$wp_customize->add_setting('dropshipping_store_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_footer_copy',array(
		'label'	=> __('Copyright Text','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','dropshipping-store'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('dropshipping_store_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','dropshipping-store'),
        'section' => 'dropshipping_store_footer_section',
        'choices' => array(
            'left' => __('Left Align','dropshipping-store'),
            'right' => __('Right Align','dropshipping-store'),
            'center' => __('Center Align','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting('dropshipping_store_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control(new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','dropshipping-store' ),
		'section'=> 'dropshipping_store_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'dropshipping_store_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('dropshipping_store_footer_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_footer_text_color', array(
		'label'    => __('Copyright Text Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	$wp_customize->add_setting('dropshipping_store_footer_text_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_footer_text_bg_color', array(
		'label'    => __('Copyright Background Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_section',
	)));

	//Sticky copyright
	$wp_customize->add_setting( 'dropshipping_store_sticky_copyright',array(
		'default'=> false,
      	'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
    ) );
    $wp_customize->add_control('dropshipping_store_sticky_copyright',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Sticky copyright','dropshipping-store' ),
        'section' => 'dropshipping_store_footer_section'
    ));

   //Footer Social Media Section
	$wp_customize->add_section( 'dropshipping_store_footer_social_section' , array(
    	'title'      => __( 'Footer Social Media', 'dropshipping-store' ),
		'priority'   => null,
		'panel' => 'dropshipping_store_panel_id'
	) );

	$wp_customize->add_setting('dropshipping_store_footer_social_premium_info',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('dropshipping_store_footer_social_premium_info',array(
		'type'=> 'hidden',
		'label'	=> __('Premium Features','dropshipping-store'),
		'description' => "<ul><li>". esc_html__('Please explore our premium theme for additional settings and features.','dropshipping-store') ."</li></ul><a target='_blank' href='". esc_url(DROPSHIPPING_STORE_BUY_PRO) ." '>". esc_html__('Upgrade to Pro','dropshipping-store') ."</a>",
		'section'=> 'dropshipping_store_footer_social_section'
	));

	$wp_customize->add_setting('dropshipping_store_show_footer_icons',array(
		'default' => false,
		'sanitize_callback'	=> 'dropshipping_store_sanitize_checkbox'
	));
	$wp_customize->add_control('dropshipping_store_show_footer_icons',array(
		'type' => 'checkbox',
		'label' => __('Show/Hide Footer Social Icons','dropshipping-store'),
		'section' => 'dropshipping_store_footer_social_section'
	));

	$wp_customize->add_setting('dropshipping_store_footer_facebook_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('dropshipping_store_footer_facebook_link',array(
		'label'	=> __('Add Facebook Link','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('dropshipping_store_footer_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_footer_facebook_icon',array(
		'label'	=> __('Facebook Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('dropshipping_store_footer_twitter_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('dropshipping_store_footer_twitter_link',array(
		'label'	=> __('Add Twitter Link','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('dropshipping_store_footer_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_footer_twitter_icon',array(
		'label'	=> __('Twitter Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('dropshipping_store_footer_linkdin_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('dropshipping_store_footer_linkdin_link',array(
		'label'	=> __('Add Linkdin Link','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('dropshipping_store_footer_linkdin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_footer_linkdin_icon',array(
		'label'	=> __('Linkedin Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('dropshipping_store_footer_instagram_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('dropshipping_store_footer_instagram_link',array(
		'label'	=> __('Add Instagram Link','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('dropshipping_store_footer_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_footer_instagram_icon',array(
		'label'	=> __('Instagram Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'icon'
	)));	

	$wp_customize->add_setting('dropshipping_store_footer_pintrest_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('dropshipping_store_footer_pintrest_link',array(
		'label'	=> __('Add Pintrest Link','dropshipping-store'),
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'url'
	));
	$wp_customize->add_setting('dropshipping_store_footer_pintrest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Dropshipping_Store_Icon_Changer(
        $wp_customize,'dropshipping_store_footer_pintrest_icon',array(
		'label'	=> __('Pintrest Icon','dropshipping-store'),
		'transport' => 'refresh',
		'section'	=> 'dropshipping_store_footer_social_section',
		'type'		=> 'icon'
	)));		

	$wp_customize->add_setting('dropshipping_store_footer_icon_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'dropshipping_store_sanitize_choices'
	));
	$wp_customize->add_control('dropshipping_store_footer_icon_alignment',array(
        'type' => 'radio',
        'label' => __('Icon Alignment ','dropshipping-store'),
        'section' => 'dropshipping_store_footer_social_section',
        'choices' => array(
            'left' => __('Left Align','dropshipping-store'),
            'right' => __('Right Align','dropshipping-store'),
            'center' => __('Center Align','dropshipping-store'),
        ),
	) );

	$wp_customize->add_setting('dropshipping_store_social_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'dropshipping_store_social_icon_color', array(
		'label'    => __('Icon Color', 'dropshipping-store'),
		'section'  => 'dropshipping_store_footer_social_section',
		'settings' => 'dropshipping_store_social_icon_color',
	)));

	// Top Bottom padding footer icon 
	$wp_customize->add_setting( 'dropshipping_store_footer_icon_to_top_padding',array(
		'default' => 7,
		'transport' => 'refresh',
		'sanitize_callback' => 'dropshipping_store_sanitize_integer'
	));
	$wp_customize->add_control( new Dropshipping_Store_Custom_Control( $wp_customize, 'dropshipping_store_footer_icon_to_top_padding',	array(
		'label' => esc_html__( 'Top Bottom icon Padding (px)','dropshipping-store' ),
		'section' => 'dropshipping_store_footer_social_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Reset All Settings
	$wp_customize->add_section( 'dropshipping_store_reset_section', array(
        'title'    => __( 'Reset Theme Settings', 'dropshipping-store' ),
        'priority'	=> null,
		'panel' => 'dropshipping_store_panel_id',
    ) );

	//Reset Demo Import
    $wp_customize->add_setting( 'dropshipping_store_reset_demo_import_settings', array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('dropshipping_store_reset_demo_import_settings',array(
            'label'   => __( 'Reset Demo Import', 'dropshipping-store' ),
            'section' => 'dropshipping_store_reset_section',
            'type'    => 'button',
            'input_attrs' => array(
                'onclick' => 'ResetDemoSettings()',
            ),
    ));

	//Reset Global Color
	$wp_customize->add_setting('dropshipping_store_reset_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control('dropshipping_store_reset_color', array(
		'type'    => 'button',
		'label'   => __('Reset Global Color', 'dropshipping-store'),
		'section' => 'dropshipping_store_reset_section',
		'input_attrs' => array(
			'onclick' => 'ResetGlobalColor()',
		),
	));

}
add_action( 'customize_register', 'dropshipping_store_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Dropshipping_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Dropshipping_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Dropshipping_Store_Customize_Section_Pro(
				$manager,
				'dropshipping_store_example_1',
				array(
					'title'   =>  esc_html__( 'Dropshipping Pro', 'dropshipping-store' ),
					'pro_text' => esc_html__( 'Get Pro', 'dropshipping-store' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/products/dropshipping-store-wordpress-theme' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'dropshipping-store-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'dropshipping-store-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function dropshipping_store_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'dropshipping-store'),
	        '2'     => __('Two', 'dropshipping-store'),
	        '3'     => __('Three', 'dropshipping-store'),
	        '4'     => __('Four', 'dropshipping-store')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Dropshipping_Store_Customize::get_instance();

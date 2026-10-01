<?php
/**
 * Dropshipping Store functions and definitions
 * @package Dropshipping Store
 */
/* Breadcrumb Begin */
function dropshipping_store_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}
/* Theme Setup */
if ( ! function_exists( 'dropshipping_store_setup' ) ) :

function dropshipping_store_setup() {

	$GLOBALS['content_width'] = apply_filters( 'dropshipping_store_content_width', 640 );

	load_theme_textdomain( 'dropshipping-store', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('dropshipping-store-homepage-thumb',240,145,true);
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'dropshipping-store' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );

	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support('responsive-embeds');
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', dropshipping_store_font_url() ) );
}
endif; // dropshipping_store_setup
add_action( 'after_setup_theme', 'dropshipping_store_setup' );

/* Theme Widgets Setup */
function dropshipping_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'dropshipping-store' ),
		'description'   => __( 'Appears on posts and pages', 'dropshipping-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Posts and Pages Sidebar', 'dropshipping-store' ),
		'description'   => __( 'Appears on posts and pages', 'dropshipping-store' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Third Column Sidebar', 'dropshipping-store' ),
		'description'   => __( 'Appears on posts and pages', 'dropshipping-store' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$dropshipping_store_widget_areas = get_theme_mod('dropshipping_store_footer_widget_areas', '4');
	for ($dropshipping_store_i=1; $dropshipping_store_i <= 4; $dropshipping_store_i++) {
		register_sidebar( array(
			'name'          => __( 'Footer Widget ', 'dropshipping-store' ) . $dropshipping_store_i,
			'id'            => 'footer-' . $dropshipping_store_i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ); 
	}

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'dropshipping-store' ),
		'description'   => __( 'Appears on shop page', 'dropshipping-store' ),
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'dropshipping-store' ),
		'description'   => __( 'Appears on single product page', 'dropshipping-store' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'dropshipping_store_widgets_init' );

/* Footer Widget */
add_theme_support( 'starter-content', array(
	'widgets' => array(
		'footer-1' => array(
			'archives',
		),
		'footer-2' => array(
			'meta',
		),
		'footer-3' => array(
			'categories',
		),
		'footer-4' => array(
			'search',
		),
	),
));

// edit
if (!function_exists('dropshipping_store_edit_link')) :
    function dropshipping_store_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'dropshipping-store'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fa-solid fa-pen mx-2"></i>',
                '</span>'
            );
    }
endif;

/* Theme Font URL */
function dropshipping_store_font_url() {
	$font_family   = array(
		'ABeeZee:ital@0;1',
		'Abril Fatface',
		'Acme',
		'Allura',
		'Anton',
		'Architects Daughter',
		'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Caveat Brush',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Charm:wght@400;700',
		'Chewy',
		'Days One',
		'Dosis:wght@200;300;400;500;600;700;800',
		'DM Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700',
		'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka One',
		'Fjalla One',
		'Francois One',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Gabriela',
		'Gloria Hallelujah',
		'Great Vibes',
		'Handlee',
		'Hammersmith One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Hind:wght@300;400;500;600;700',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie Flower',
		'IM Fell English SC',
		'Julius Sans One',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
		'Lobster',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Marck Script',
		'Marcellus',
		'Merienda One',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Oswald:wght@200;300;400;500;600;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent Marker',
		'Poiret One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Prata',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	 	'Russo One',
	 	'Righteous',
	 	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Satisfy',
	 	'Sen:wght@400;700;800',
	 	'Slabo 13px',
	 	'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	 	'Shadows Into Light Two',
	 	'Shadows Into Light',
	 	'Sacramento',
	 	'Sail',
	 	'Shrikhand',
	 	'League Spartan:wght@100;200;300;400;500;600;700;800;900',
	 	'Staatliches',
	 	'Stylish',
	 	'Tangerine:wght@400;700',
	 	'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
	 	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	 	'Unica One',
	 	'VT323',
	 	'Varela Round',
	 	'Vampiro One',
	 	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	 	'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
	 	'ZCOOL XiaoWei',
	 	'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/* Theme enqueue scripts */
function dropshipping_store_scripts() {
	wp_enqueue_style( 'dropshipping-store-font', dropshipping_store_font_url(), array() );
	// blocks-css
	wp_enqueue_style( 'dropshipping-store-block-style', get_theme_file_uri('/css/blocks.css') );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri().'/css/owl.carousel.css' );
	wp_enqueue_style( 'dropshipping-store-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'dropshipping-store-style', 'rtl', 'replace' );	
	wp_enqueue_style( 'font-awesome-css',get_template_directory_uri().'/css/fontawesome-all.css' );
	if (get_theme_mod('dropshipping_store_sidebar_animation', true) == true){
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow.js', array('jquery') );
	wp_enqueue_style( 'animate-css', get_template_directory_uri().'/css/animate.css' );
    }

	// Body
	$dropshipping_store_body_color       = get_theme_mod('dropshipping_store_body_color', '');
	$dropshipping_store_body_font_family = get_theme_mod('dropshipping_store_body_font_family', '');
	$dropshipping_store_body_font_size   = get_theme_mod('dropshipping_store_body_font_size', '');
	$dropshipping_store_body_font_weight   = get_theme_mod('dropshipping_store_body_font_weight', '');
	// Paragraph
	$dropshipping_store_paragraph_color       = get_theme_mod('dropshipping_store_paragraph_color', '');
	$dropshipping_store_paragraph_font_family = get_theme_mod('dropshipping_store_paragraph_font_family', '');
	$dropshipping_store_paragraph_font_size   = get_theme_mod('dropshipping_store_paragraph_font_size', '');
	$dropshipping_store_paragraph_font_weight   = get_theme_mod('dropshipping_store_paragraph_font_weight', '');
	// "a" tag
	$dropshipping_store_atag_color       = get_theme_mod('dropshipping_store_atag_color', '');
	$dropshipping_store_atag_font_family = get_theme_mod('dropshipping_store_atag_font_family', '');
	// "li" tag
	$dropshipping_store_li_color       = get_theme_mod('dropshipping_store_li_color', '');
	$dropshipping_store_li_font_family = get_theme_mod('dropshipping_store_li_font_family', '');
	
	// H1
	$dropshipping_store_h1_color       = get_theme_mod('dropshipping_store_h1_color', '');
	$dropshipping_store_h1_font_family = get_theme_mod('dropshipping_store_h1_font_family', '');
	$dropshipping_store_h1_font_size   = get_theme_mod('dropshipping_store_h1_font_size', '');
	$dropshipping_store_h1_font_weight   = get_theme_mod('dropshipping_store_h1_font_weight', '');
	// H2
	$dropshipping_store_h2_color       = get_theme_mod('dropshipping_store_h2_color', '');
	$dropshipping_store_h2_font_family = get_theme_mod('dropshipping_store_h2_font_family', '');
	$dropshipping_store_h2_font_size   = get_theme_mod('dropshipping_store_h2_font_size', '');
	$dropshipping_store_h2_font_weight   = get_theme_mod('dropshipping_store_h2_font_weight', '');
	// H3
	$dropshipping_store_h3_color       = get_theme_mod('dropshipping_store_h3_color', '');
	$dropshipping_store_h3_font_family = get_theme_mod('dropshipping_store_h3_font_family', '');
	$dropshipping_store_h3_font_size   = get_theme_mod('dropshipping_store_h3_font_size', '');
	$dropshipping_store_h3_font_weight   = get_theme_mod('dropshipping_store_h3_font_weight', '');
	// H4
	$dropshipping_store_h4_color       = get_theme_mod('dropshipping_store_h4_color', '');
	$dropshipping_store_h4_font_family = get_theme_mod('dropshipping_store_h4_font_family', '');
	$dropshipping_store_h4_font_size   = get_theme_mod('dropshipping_store_h4_font_size', '');
	$dropshipping_store_h4_font_weight   = get_theme_mod('dropshipping_store_h4_font_weight', '');
	// H5
	$dropshipping_store_h5_color       = get_theme_mod('dropshipping_store_h5_color', '');
	$dropshipping_store_h5_font_family = get_theme_mod('dropshipping_store_h5_font_family', '');
	$dropshipping_store_h5_font_size   = get_theme_mod('dropshipping_store_h5_font_size', '');
	$dropshipping_store_h5_font_weight   = get_theme_mod('dropshipping_store_h5_font_weight', '');
	// H6
	$dropshipping_store_h6_color       = get_theme_mod('dropshipping_store_h6_color', '');
	$dropshipping_store_h6_font_family = get_theme_mod('dropshipping_store_h6_font_family', '');
	$dropshipping_store_h6_font_size   = get_theme_mod('dropshipping_store_h6_font_size', '');
	$dropshipping_store_h6_font_weight   = get_theme_mod('dropshipping_store_h6_font_weight', '');

	$dropshipping_store_custom_css = '

		 body{
		    color:'.esc_html($dropshipping_store_body_color).'!important;
		    font-family: '.esc_html($dropshipping_store_body_font_family).';
		    font-size: '.esc_html($dropshipping_store_body_font_size).'px;
			font-weight: '.esc_html($dropshipping_store_body_font_weight).'!important;
		}
		p,span{
		    color:'.esc_html($dropshipping_store_paragraph_color).'!important;
		    font-family: '.esc_html($dropshipping_store_paragraph_font_family).';
		    font-size: '.esc_html($dropshipping_store_paragraph_font_size).';
			font-weight: '.esc_html($dropshipping_store_paragraph_font_weight).'!important;
		}
		a{
		    color:'.esc_html($dropshipping_store_atag_color).'!important;
		    font-family: '.esc_html($dropshipping_store_atag_font_family).';
		}
		li{
		    color:'.esc_html($dropshipping_store_li_color).'!important;
		    font-family: '.esc_html($dropshipping_store_li_font_family).';
		}
		h1{
		    color:'.esc_html($dropshipping_store_h1_color).'!important;
		    font-family: '.esc_html($dropshipping_store_h1_font_family).'!important;
		    font-size: '.esc_html($dropshipping_store_h1_font_size).'!important;
			font-weight: '.esc_html($dropshipping_store_h1_font_weight).'!important;
		}
		h2{
		    color:'.esc_html($dropshipping_store_h2_color).'!important;
		    font-family: '.esc_html($dropshipping_store_h2_font_family).'!important;
		    font-size: '.esc_html($dropshipping_store_h2_font_size).'!important;
			font-weight: '.esc_html($dropshipping_store_h2_font_weight).'!important;
		}
		h3{
		    color:'.esc_html($dropshipping_store_h3_color).'!important;
		    font-family: '.esc_html($dropshipping_store_h3_font_family).'!important;
		    font-size: '.esc_html($dropshipping_store_h3_font_size).'!important;
			font-weight: '.esc_html($dropshipping_store_h3_font_weight).'!important;
		}
		h4{
		    color:'.esc_html($dropshipping_store_h4_color).'!important;
		    font-family: '.esc_html($dropshipping_store_h4_font_family).'!important;
		    font-size: '.esc_html($dropshipping_store_h4_font_size).'!important;
			font-weight: '.esc_html($dropshipping_store_h4_font_weight).'!important;
		}
		h5{
		    color:'.esc_html($dropshipping_store_h5_color).'!important;
		    font-family: '.esc_html($dropshipping_store_h5_font_family).'!important;
		    font-size: '.esc_html($dropshipping_store_h5_font_size).'!important;
			font-weight: '.esc_html($dropshipping_store_h5_font_weight).'!important;
		}
		h6{
		    color:'.esc_html($dropshipping_store_h6_color).'!important;
		    font-family: '.esc_html($dropshipping_store_h6_font_family).'!important;
		    font-size: '.esc_html($dropshipping_store_h6_font_size).'!important;
			font-weight: '.esc_html($dropshipping_store_h6_font_weight).'!important;
		}
	';
	wp_add_inline_style('dropshipping-store-basic-style', $dropshipping_store_custom_css);

	/* Theme Color sheet */
	require get_parent_theme_file_path( '/theme-color-option.php' );
	wp_add_inline_style( 'dropshipping-store-basic-style',$dropshipping_store_custom_css );
	wp_enqueue_script( 'tether-js', get_template_directory_uri() . '/js/tether.js', array('jquery') ,'',true);
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true);
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	wp_enqueue_script( 'dropshipping-store-custom-scripts-jquery',get_template_directory_uri() . '/js/custom.js', array('jquery') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dropshipping_store_scripts' );

function dropshipping_store_theme_setup() {
	define('DROPSHIPPING_STORE_LIVE_DEMO',__('https://demos.buywptemplates.com/dropshipping-store-pro/', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_BUY_PRO',__('https://www.buywptemplates.com/products/dropshipping-store-wordpress-theme', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_PRO_DOC',__('https://demos.buywptemplates.com/demo/docs/bwt-dropshipping-store-pro/', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_FREE_DOC',__('https://demos.buywptemplates.com/demo/docs/free-dropshipping-store/', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_PRO_SUPPORT',__('https://buywptemplates.com/pages/community', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_FREE_SUPPORT',__('https://wordpress.org/support/theme/dropshipping-store/', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_REVIEW',__('https://wordpress.org/support/theme/dropshipping-store/reviews/', 'dropshipping-store'));
	define('DROPSHIPPING_STORE_CREDIT',__('https://www.buywptemplates.com/products/free-dropshipping-wordpress-theme', 'dropshipping-store'));
}
add_action( 'after_setup_theme', 'dropshipping_store_theme_setup' );

if ( ! function_exists( 'dropshipping_store_credit' ) ) {
	function dropshipping_store_credit(){
		echo "<a href=".esc_url(DROPSHIPPING_STORE_CREDIT)." target='_blank'>".esc_html__('Dropshipping WordPress Theme','dropshipping-store')."</a>";
	}
}

function dropshipping_store_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/* Excerpt Limit Begin */
function dropshipping_store_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*radio button sanitization*/
function dropshipping_store_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function dropshipping_store_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function dropshipping_store_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

/* Integer sanitization */
if ( ! function_exists( 'dropshipping_store_sanitize_integer' ) ) {
	function dropshipping_store_sanitize_integer( $input ) {
		return (int) $input;
	}
}

// Change number or products per row to 4
add_filter('loop_shop_columns', 'dropshipping_store_loop_columns');
if (!function_exists('dropshipping_store_loop_columns')) {
	function dropshipping_store_loop_columns() {
		$columns = get_theme_mod( 'dropshipping_store_per_columns', 4 );
		return $columns; // 4 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'dropshipping_store_shop_per_page', 20 );
function dropshipping_store_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'dropshipping_store_product_per_page', 9 );
	return $cols;
}

//Display the related posts
if ( ! function_exists( 'dropshipping_store_related_posts' ) ) {
	function dropshipping_store_related_posts() {
		wp_reset_postdata();
		global $post;
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'         => absint( get_theme_mod( 'dropshipping_store_related_posts_count_number', '3' ) ),
		);
		// Categories
		if ( get_theme_mod( 'dropshipping_store_related_posts_taxanomies', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Tags
		if ( get_theme_mod( 'dropshipping_store_related_posts_taxanomies', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}
		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();
		return $query;
	}
}

function dropshipping_store_enable_post_featured_image(){
	if(get_theme_mod('dropshipping_store_post_featured_image') == 'Image' ) {
		return true;
	}
	return false;
}

function dropshipping_store_post_color_enabled(){
	if(get_theme_mod('dropshipping_store_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

function dropshipping_store_enable_post_image_custom_dimention(){
	if(get_theme_mod('dropshipping_store_post_featured_image_dimention') == 'Custom' ) {
		return true;
	}
	return false;
}

function dropshipping_store_enable_single_post_image_custom_dimention(){
	if(get_theme_mod('dropshipping_store_single_post_featured_image_dimention') == 'Custom' ) {
		return true;
	}
	return false;
}

function dropshipping_store_show_post_color(){
	if(get_theme_mod('dropshipping_store_post_featured_image') == 'Color' ) {
		return true;
	}
	return false;
}

// Reset demo import settings
function dropshipping_store_reset_demo_import_settings() {
    if (current_user_can('manage_options')) {
        // List only demo import-related settings to reset
		remove_theme_mod('dropshipping_store_topbar_text');
		remove_theme_mod('dropshipping_store_phone_text');
		remove_theme_mod('dropshipping_store_phone_number');
		remove_theme_mod('dropshipping_store_wishlist_link');
		remove_theme_mod('dropshipping_store_slider_small_title');
		remove_theme_mod('dropshipping_store_slider_button_text');
		remove_theme_mod('dropshipping_store_slider_button_link');
		remove_theme_mod('dropshipping_store_slider_hide');
		for ( $count = 1; $count <= 4; $count++ ) {
			remove_theme_mod('dropshipping_store_slider_setting' . $count);
		}
		remove_theme_mod('dropshipping_store_product_enable');
		remove_theme_mod('dropshipping_store_product_section_title');
		remove_theme_mod('dropshipping_store_product_slide');
		remove_theme_mod('dropshipping_store_footer_copy');

        wp_send_json_success(array('message' => __('Demo import settings have been reset.', 'dropshipping-store')));
    } else {
        wp_send_json_error(array('message' => __('Permission denied.', 'dropshipping-store')));
    }
}
add_action('wp_ajax_dropshipping_store_reset_demo_import_settings', 'dropshipping_store_reset_demo_import_settings'); 

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Load Customizer file. */
require get_template_directory() . '/inc/customizer.php';

/* About Widget */
require get_template_directory() . '/inc/about.php';

/* Contact Widget */
require get_template_directory() . '/inc/contact.php';

/* TGM. */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Load welcome message.*/
require get_template_directory() . '/inc/dashboard/get_started_info.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';

add_filter( 'woocommerce_enable_setup_wizard', '__return_false' );
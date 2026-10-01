<?php
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

    /*
        'parent-style' → es el $handle. Es solo un identificador (puedes ponerle el nombre que quieras, 
        pero por convención en child themes se usa parent-style). Sirve para que, si otro estilo depende 
        de este, pueda referenciarlo por este nombre.
    */
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
    }
    function my_theme_register_menus() {
        register_nav_menus( array(
            'footer_menu' => 'Footer Area'
        ));
    }
    add_action( 'after_setup_theme', 'my_theme_register_menus' );

    function my_theme_register_sidebars() {
        register_sidebar( array(
            'name' => 'Privacy Sidebar',
            'id' => 'policy_sidebar',
            'description' => 'Add widgets here to appear on Privacy page',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        ));

        register_sidebar( array(
            'name' => 'Landing Page Sidebar',
            'id' => 'landing_sidebar',
            'description' => 'Add widgets here to appear on Landing page',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        ));
    }
    
    add_action( 'widgets_init', 'my_theme_register_sidebars' );
?>
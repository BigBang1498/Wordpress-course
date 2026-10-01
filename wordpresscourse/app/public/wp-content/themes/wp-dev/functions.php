<?php
    add_action( "wp_enqueue_scripts", "wpdev_enqueue_styles" );

    function wpdev_enqueue_styles() {
        wp_enqueue_style( 'wpdev_style', get_stylesheet_directory_uri() );
    }

    /**
     * Registers our navigation
     */

    function wpdev_theme_register_menus() {
        register_nav_menus( array(
            'main_menu' => 'Primary',
            'footer_menu' => 'Footer Area'
        ));
    }

    add_action( 'after_setup_theme', 'wpdev_theme_register_menus' );

    /**
     * Register our main sidebar
     */

    function wpdev_theme_register_sidebars() {
        register_sidebar( array(
            'name' => 'Main Sidebar',
            'id' => 'main_sidebar',
            'description' => 'Add widgets here to appear everywhere',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        ));
    }

    add_action( 'widgets_init', 'wpdev_theme_register_sidebars' );

    function wpdev_register_types() {
        //Preparespost type array.
        $args = array(
            'public' => true,
            'label' => 'Product',
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'products' ),
        );

        //Register post type
        register_post_type( 'init', $args );
    }

    add_action( 'init', 'wpdev_register_types' );
    add_action( 'admin_init', 'wpdev_register_settings' );

    function wpdev_register_settings() {
        register_setting( 'wpdev-settings-group', 'wpdev-settings' );
        add_settings_section( 'wpdev-setting-section','Main_settings', 'wpdev_generate_main_section', 'wpdev_theme_options' );
        add_settings_field(
            'wpdev-footer-setting-field',
            'Coryright stuff',
            'wpdev_generate_setting_field',
            'wpdev_theme_options',
            'wpdev_setting-section'
        );
    }
    
    function wpdev_generate_main_section() {
        ?>
        <p>This section lets you customize stuff</p>
        <?php
    }

    function wpdev_generate_setting_field() {
        ?>
        <input type="text">
        <?php
    }
    /*
    //Prepares post type array.
    $args = array(
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'label'               => 'Product',
        'has_archive'         => true,
        'supports'            => array( 'title', 'author', 'comments' )
    );
*/
    //Register post type
    //register_post_type( 'product', $args );
    
    function wpdev_register_menus() {
        add_theme_page( 'Theme Options', 'Theme Options', 'manage_options', 'wpdev_theme_options', 'wpdev_generate_options_page' );
    }
    add_action( 'admin_menu', 'wpdev_register_menus' );

    function wpdev_generate_options_page() {
        ?>
       <h1>Our theme options</h1>
       <form action="options.php" method="post">
            <?php settings_fields( 'wpdev-settings-group' ); ?>
            <?php do_settings_sections( 'wpdev_theme_options' ); ?>
            <?php submit_button(); ?>
       </form>
        <?php
    }

    add_action( 'customize_register', 'wpdev_customizer_setup' );

    function wpdev_customizer_setup( $wp_customize ) {
        $wp_customize->add_setting( 'wpdev_twitter_profile', array(
            'default' => '',
            'transport' => 'refresh',
            'type' => 'theme_mod'
        ));

        $wp_customize->add_section( 'wpdev_social_section', array(
            'title'    => 'Footer',
            'priority' => '160'
        ) );
        
        $wp_customize->add_control( 'wpdev_twitter_profile', array(
            'label' => 'Twitter Handle',
            'type' => 'text',
            'section' => 'wpdev_social_section'
        ) );
    }
?>
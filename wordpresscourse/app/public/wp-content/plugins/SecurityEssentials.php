<?php
    add_action( 'admin_menu', 'cmo_plugin_menu' );
    function cmo_plugin_menu() {
      add_options_page(
        'Something random',
        'Somenthig random',
        'moderate_comments',
        'intro_wp_random_page',
        'cmo_settings_page'
      );
    
      add_menu_page( 'My Menu', 'My Menu', 'manage_options', 'intro_wp_menu', 'cmo_menu_page', 'dashicons-visibility', 100);
      add_submenu_page( 'intro_wp_menu', 'Random page', 'Random Page', 'manage_options', 'intro_wp_menu_settings', 'cmo_settings_page');
    }
    
    /*    add_action('admin_init', 'cmo_setup_settings');
    function cmo_setup_settings() {
      register_setting( 'cmo_settings_group', 'cmo_settings' );
      add_settings_section( 'cmo_settings_section', 'Main Settings', 'cmo_generate_section','intro_wp_menu_settings' );
      add_settings_field(
        'cmo_favorite_color_field',
        'What is your favorite color?',
        'cmo_favorite_color_field',
        'intro_wp_menu_settings',
        'cmo_settings_section'
      );
    }
    
    function cmo_favorite_color_field() {
      $settings = (array) get_option( 'cmo_settings' );
      $color = 'blue';
      if( isset( $settings['color'])){
        $color = esc_attr( $settings['color']);
      }
      echo "<input type='text' name='cmo-settings[color]' id='cmo-settings[color]' value='$color' >";
    }
    */   
    function cmo_generate_section(){
      ?>
        <p>Some Stuff</p>
      <?php 
    }
    
    function cmo_settings_page() {
        if( !current_user_can( 'manage_options' )) {
            return;
        }
    
        if( isset( $_POST['form_nonce'] ) && wp_verify_nonce( $_POST['form_nonce'], 'our_form' ) ) {
            $color = sanitize_text_field( $_POST['color'] );
            update_option('favorite_color', $color);
        }
        $color = get_option( 'favorite_color', 'Blue' );
      ?>
        <h1>My random settings</h1>
        <form action="options.php" method="post">
            <label for="">Favorite Color</label>
            <input type="text" name="color" value="<?php echo esc_attr( $color ); ?>">
            <?php wp_nonce_field( 'our_form', 'form_nonce'); ?>
            <button>Save</button>
        </form>
      <?php
    }
    function cmo_menu_page() {
      ?>
        <h1>My random menu page</h1>
      <?php
    }
?>
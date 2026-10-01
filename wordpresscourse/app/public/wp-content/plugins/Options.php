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
    
    function cmo_settings_page() {
      if ( isset( $_POST['favorite_color'])) {
        $color = $_POST['favorite_color'];
        update_option('favorite_color', $color);
      }
    
      $color = get_option('favorite_color', 'Blue');
      ?>
        <h1>My random settings</h1>
        <form action="" method="post">
          <label for="">Favorite Color </label><br>
          <input type="text" name="favorite_color" value="<?php echo $color; ?>">
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
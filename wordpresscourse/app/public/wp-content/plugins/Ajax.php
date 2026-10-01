<?php
    add_action( 'wp_ajax_send_stuff', 'test_stuff' );
    add_action( 'wp_ajax_nopriv_send_stuff', 'test_stuff' );
    
    function test_stuff() {
      $stuff = $_POST['my-stuff'];
      update_option( 'cmo_stuff', $stuff );
    
      wp_die();
    }
    
    add_action( 'admin_menu', 'register_pages' );
    function register_pages() {
      add_options_page( 'Random Test', 'Random Test', 'edit_theme_options', 'random_test', 'cmo_generate_page' );
    }
    
    function cmo_generate_page() {
      wp_enqueue_script( 'cmo_app_js', plugins_url( 'app.js', __FILE__ ) );
      $stuff = get_option( 'cmo_stuff', 'Blue' );
      echo $stuff;
      ?>
     <input type="text" id="my-stuff">
     <button id="save-stuff">Save</button>
      <?php
    }
?>
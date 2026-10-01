<?php
/**
 * Plugin Name: Intro WP
 * Description: Este es el plugin para agregar diferentes metodos y crear plugins
 * Version:     1.0.0
 * Author:      Cristian Martin Orozco
 * Author URI:  mailto:cmartinorozco1498@gmail.com
*/

add_filter( 'admin_footer_text', 'cmo_left_corner_text' );
add_filter( 'update_footer', 'cmo_right_corner_text',9999 );

function cmo_left_corner_text( $text ) {
  return 'Whatever we want';
}
function cmo_right_corner_text( $text ) {
  return 'Whatever we want';
}

function my_admin_theme_style() {
  wp_enqueue_style( 'my-admin-theme', plugins_url( 'style.css', __FILE__ ), array(), time() );
}
add_action( 'admin_enqueue_scripts', 'my_admin_theme_style' );

add_action( 'admin_menu', 'adjust_the_wp_menu', 999);

function adjust_the_wp_menu() {
  //$page = remove_submenu_page( 'themes.php', 'widgets.php' );
}

add_action( 'admin_bar_menu', 'cmo_admin_bar', 65);
function cmo_admin_bar( $wp_admin_bar ) {
  $args = array (
    'id' => 'wphc_admin_node',
    'title' => '<span class="ab-icon dashicons dashicons-shield"></span>',
    'href' => admin_url( 'index.php' )
  );
  $wp_admin_bar->add_node( $args );
}

  
?>


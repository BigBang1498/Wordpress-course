<?php
/**
 * Plugin Name: Intro to WP 2
 * Description: Este es el plugin para agregar diferentes metodos y crear plugins
 * Version:     1.0.0
 * Author:      Cristian Martin Orozco
 * Author URI:  mailto:cmartinorozco1498@gmail.com
 * Text Domain: wp-dev
*/
$hometown = 'Gainesville';
$str = "Your town is $hometown";
// translators: %s: Name of a city
$final = sprintf( _x( 'Your town is %s', '%s: Name of a city', 'wp-dev' ), $hometown );


$number = 2;
$color = _n( 'One color', '%s color', $number, 'wp-dev' ) ;
$btn = __( 'Back to settings', 'wp-dev ');
?>
<button><?php echo esc_html( $btn ); ?></button>
<?php



register_activation_hook( __FILE__, 'wpdev_install');
register_deactivation_hook( __FILE__, "wpdev_deactivate");
//register_uninstall_hook();
function wpdev_install() {
    flush_rewrite_rules();
    
    //Create database

    //Set up

    //Register post types
}

function wpdev_deactivate() {

}
?>
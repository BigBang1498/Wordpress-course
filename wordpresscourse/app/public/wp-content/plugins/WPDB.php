<?php
add_shortcode( 'testing', 'cmo_shortcode' );

function  cmo_shortcode( $atts ) {
  //no crea nada nuevo — solo te da acceso, dentro de tu función, a un objeto que WordPress ya construyó por ti afuera.
  global $wpdb;
  //$stuff = $wpdb->get_var( "SELECT stuff FROM {$wpdb->prefix}stuff WHERE ID = 1" );
  //$stuff = $wpdb->get_row( "SELECT  * FROM {$wpdb->prefix}stuff WHERE ID = 1", ARRAY_A );
  $stuff = $wpdb->get_results( "SELECT  * FROM {$wpdb->prefix}stuff ", ARRAY_A );
  foreach ( $stuff as $item ) {
    echo '<div class="my-div">' . esc_html( $item['other'] ) . '</div>';
  }
  //Ejecuta un INSERT INTO en la base de datos
  $new_id = $wpdb->insert(
    //Contiene el prefijo de tus tablas (normalmente 'wp_', pero puede ser distinto según la instalación)
    //Arma el nombre completo de la tabla: 'wp_stuff'
    $wpdb->prefix . 'stuff',
    //Segundo parámetro: los datos a insertar.
    //Array asociativo donde cada clave => valor corresponde a nombre_columna => valor_a_guardar
    array(
      'stuff' => 'value1',
      'other' => 123
    ),
    //Tercer parámetro: los formatos
    //Le dice a $wpdb qué tipo de dato es cada valor, en el mismo orden que el array de datos: 
    //%s = string (texto), %d = número entero, %f = número decimal
    /*
    Por qué importan los formatos (%s, %d): esto es lo que hace que $wpdb->insert() sea seguro 
    contra inyecciones SQL — internamente sanitiza cada valor según el tipo que le indicas.
    */
    array(
      '%s',
      '%d'
    )
  );
  $wpdb->update(
    $wpdb->prefix . 'stuff',
    array(
      'stuff' => 'value1',
      'other' => 'value2'
    ),
    array( 'ID' => 1),
    array(
      '%s',
      '%s'
    ),
    array( '%d' )
  );
  //print_r( $stuff );
  //echo '<div class="my-div">' . esc_html( $stuff['other'] ) . '</div>';
  //wp_enqueue_script( 'cmo_app', plugins_url( 'app.js', __FILE__ ), array( 'underscore', 'jquery' ), '1.1' );
  //$color = 'Blue';
  //wp_localize_script( 'cmo_app', 'myObject', array( 'color' => $color ) );
  wp_enqueue_style( 'cmo_style', plugins_url( 'style.css', __FILE__ ) );
}


add_action( 'admin_init', 'cmo_add_meta' );

function cmo_add_meta() {
  update_post_meta( 22, 'color', 'blue' );
}

add_filter( 'the_content', 'cmo_add_content' );

function cmo_add_content( $content ) {
  $stuff = get_post_custom( 22 );
  //print_r( $stuff );
  $color = $stuff['color'][0];        //get_post_meta( 22, 'color', true );
  $content = $content . '<br>color:' . $color;
  return $content;
}

add_filter( 'dashboard_glance_items', 'cmo_glance', 10, 1 );

/**
 * Fake function block
 */
function cmo_glance( $items = array() ) {
  $items[] = '<span 3 class="my-count">3 somethigs</a>';
  return $items;
}

add_action('wp_dashboard_setup', 'cmo_add_widget' );

//Registers our widget
function cmo_add_widget() {
  if ( current_user_can( 'moderate_comments' ) ) {
    wp_add_dashboard_widget( 'my_widget', 'My Widget', 'cmo_widget_contents' );
  }
}

//Displays our content for our widget
function cmo_widget_contents() {
  wp_enqueue_style( 'cmo_style', plugins_url( 'style.css', __FILE__ ) );
  $posts = get_posts();
  $total = count( $posts );
  ?>
    <h2>Total Stuff</h2>
    <?php echo $total .'stuff';?>
    <h2>Recent Stuff</h2>
  <?php 
  //echo "Our Widget";
  foreach ( $posts as $post ) {
    echo '<span class="recent-stuff">' . $post->post_title . '</span>' . '<br>';
    //print_r( $post );
  }
}


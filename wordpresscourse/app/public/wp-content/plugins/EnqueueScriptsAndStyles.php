<?php
    add_shortcode( 'testing', 'cmo_shortcode' );

    function  cmo_shortcode( $atts ) {
      echo '<div class="my-div">Stuff</div>';
      wp_enqueue_script( 'cmo_app', plugins_url( 'app.js', __FILE__ ), array( 'underscore', 'jquery' ), '1.1' );
      $color = 'Blue';
      wp_localize_script( 'cmo_app', 'myObject', array( 'color' => $color ) );
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
?>
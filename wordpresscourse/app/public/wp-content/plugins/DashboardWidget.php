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
?>
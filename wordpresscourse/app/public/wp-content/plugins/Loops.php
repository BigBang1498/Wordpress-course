<?php
    function cmo_post_shortcode( $atts ) {
        if( isset($_POST["create_post"])){
            //Create post object
            $my_post = array(
              'post_title' => 'My title',
              'post_content' => 'Some content',
              'post_status' => 'publish',
              'post_author' => 1
            );
    
            //Insert the post into the database
            wp_insert_post( $my_post );
        }
        if( isset($_POST["modify_post"])){
            //Create post object
            $my_post = array(
              'ID' => '27',
              'post_title' => 'My other title',
              'post_content' => 'Some other content',
            );
    
            //Insert the post into the database
            wp_update_post( $my_post );
        }
        if( isset($_POST["delete_post"])){
            wp_delete_post( 27, true );
        }
        $display = '';
        ob_start();
    
        $my_query = new WP_Query(
          array(
            'post_type' => 'post',
            'post_status' => 'publish'
          )
        );
    
        // The loop
        if($my_query->have_posts()){
          echo '<ul>';
          while ($my_query->have_posts()){
            $my_query->the_post();
            //the_title();
            //the_content();
            //the_author();
            echo "<h2><a href='" . esc_url( get_permalink() ) . "'>" . get_the_title() . "</a>" . "</h2>";
            echo "<h3>" . get_the_author() . "</h3>";
            echo "<p>" . get_the_content() . "</p>";
          }
          echo '</ul>';
        }else{
          echo "No hay post";
        }
    
        //Restore original Post Data
        wp_reset_postdata();
      ?>
        <form action="" method="post">
          <input type="hidden" name="create_post">
          <input type="submit" value="Create">
        </form>
        <form action="" method="post">
          <input type="hidden" name="modify_post">
          <input type="submit" value="Modify">
        </form>
        <form action="" method="post">
          <input type="hidden" name="delete_post">
          <input type="submit" value="Delete">
        </form>
    
    <?php
        $display = ob_get_clean();
        return $display;
    }
    
    add_shortcode ( 'post_form', 'cmo_post_shortcode');
?>
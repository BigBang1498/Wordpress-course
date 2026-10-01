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
              'ID' => '24',
              'post_title' => 'My other title',
              'post_content' => 'Some other content',
            );
    
            //Insert the post into the database
            wp_update_post( $my_post );
        }
        if( isset($_POST["delete_post"])){
            wp_delete_post( 24, true );
        }
        $display = '';
        ob_start();
        $post = get_post( 24 );
        if( ! is_null( $post ) ) {
          ?>
          <h2>Title: <?php echo $post->post_title; ?></h2>
          <p>Content: <?php echo $post->post_content; ?></p>
          <?php
        }
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
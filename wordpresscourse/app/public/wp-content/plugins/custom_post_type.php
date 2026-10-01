<?php
    function cmo_post_shortcode( $atts ) {
        $display = '';
        ob_start();
    
        $my_query = new WP_Query(array('post_type' => 'cmo_product'));
        
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
        
        $display = ob_get_clean();
        return $display;
    }
    
    add_shortcode ( 'post_form', 'cmo_post_shortcode');
    
    function cmo_post_types() {
      $labels = array(
        'name' => 'Products',
        'singular_name' => 'Product',
        'menu_name' => 'Product',
        'name_admin_bar' => 'Product',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Product',
        'new_item' => 'New Product',
        'edit_item' => 'Edit Product',
        'view_item' => 'View Product',
        'all_items' => 'All Products',
        'search_items' => 'Search Product',
        'parent_item_colon' => 'Parent Product',
        'not_found' => 'No Product',
        'not_found_in_trash' => 'Not Product Found In Trash'
      );
      $args = array(
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'labels' => $labels,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'supports' => array( 'title', 'author', 'editor')
      );
      register_post_type( 'cmo_product', $args); 
    }
    
    add_action( 'init', 'cmo_post_types');
?>
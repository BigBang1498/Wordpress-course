<?php
   /**
    * Plugin Name: Intro WP
    * Description: Creates Github repository contributer shortcode
    * Version: 1.0.0
    * Author: Cristian Martin Orozco
    * Author URI: https://cristianmartin.me
    * Plugin URI: https://cristianmartin.me
    * 
    */
   //Buena practica de seguidad
   //Corta la ejecución cuando alguien intenta ingresar a este archivo desde el navegador 
   if( !defined( 'ABSPATH' ) ) {
      exit;
   }
   
   add_action( 'admin_menu', 'iwp_setup_menu');
   add_action( 'init', 'iwp_setup' );

   /**
   * Sets up all our post types
   */
   function iwp_setup(){
      register_post_type( 'iwp_repos', array(
         'public' => false,
         'label' => 'Repos',
      ));
      add_shortcode( 'repos', 'iwp_shortcode' );
   }

   function iwp_shortcode( $atts ) {
      $atts = shortcode_atts( array(
         'id' => 0
      ), $atts);
      $repo = get_post( intval( $atts['id'] ) );
      //print_r( $repo );
      if( is_null( $repo ) ) {
         return '';
      }
      $contributors = get_transient( "iwp_repo_{$repo->post_title}" );
      if( ! $contributors ) {
         $response = wp_remote_get( "https://api.github.com/repos/{$repo->post_title}/contributors", array( 'sslverify' => false ) );
         if( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
            $contributors = array();
         } else {
            $contributors = json_decode( wp_remote_retrieve_body( $response ) );
         }
         set_transient( "iwp_repo_{$repo->post_title}", $contributors, DAY_IN_SECONDS);
      }
      ob_start();
      ?>
         <ul>
            <?php
               foreach ($contributors as $contributor) {
                  ?>
                     <li> <?php echo esc_html( $contributor->login ); ?> </li>
                  <?php
               }
            ?>
         </ul>
      <?php
      $display = ob_get_clean();
      return $display;
   }

   /**
   * Nota importante sobre 'public' => false
   * significa que no tendrá páginas públicas visibles en el front-end — solo existirá internamente, 
   * gestionable desde el admin, pero sin URLs propias para visitantes
   */

   /**
   * Sets up our admin menu and pages
   */

   function iwp_setup_menu() {
      add_menu_page( 'GitHub Repos', 'GitHub Repos', 'edit_theme_options', 'intro_wp_menu', 'iwp_generate_settings_page', 'dashicons-palmtree', 999  );
   }

   /**
   * Generates the content for our settings page
   */

   function iwp_generate_settings_page() {

      //Save a repo
      if( isset( $_POST[ 'repo_nounce' ] ) && wp_verify_nonce( $_POST[ 'repo_nounce' ], 'create_repo') ) {
         $repo = array(
            'post_type' => 'iwp_repos',
            'post_title' => sanitize_text_field( $_POST['new_repo'] ),
         );
         wp_insert_post( $repo );
      }

      //Loading Repos
      $repos = array();
      $args = array(
         'post_type' => 'iwp_repos',
      );
      //The Query
      $the_query = new WP_Query( $args );

      //The loop
      if ( $the_query->have_posts() ) {
         while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $repos[] = array(
               'title' => get_the_title(),
               'id'    => get_the_ID()
            );
         }
      wp_reset_postdata();
      }
      ?>
      <h2>GitHub Repo Shortcode</h2>
      <table class="widefat">
         <thead>
            <tr>
               <th>Repo</th>
               <th>Shortcode</th>
            </tr>
         </thead>
         <tbody>
            <?php
               foreach( $repos as $repo ) {
                  ?>
                  <tr>
                     <td><?php echo esc_html( $repo['title'] ); ?></td>
                     <td>[repos id=<?php echo esc_html( $repo['id'] ); ?>]</td>
                  </tr>
               <?php
               }
            ?>
         </tbody>
      </table>
      <br>
      <h3>Add a Repo</h3>
      <form action="" method="post">   
         <label for="new_repo">Repo: </label>
         <input type="text" id="new_repo" name="new_repo"><br>
         <button class="button">Add Repo</button>
         <?php wp_nonce_field( 'create_repo', 'repo_nounce' ); ?> 
      </form>
      <?php
   }
?>
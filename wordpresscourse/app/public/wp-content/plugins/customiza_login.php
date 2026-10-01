<?php
    add_action( 'login_enqueue_scripts', 'cmo_login_customizations' );

    /**
     * Function to customiza our login page!!!
     */
    
    function cmo_login_customizations() {
      ?>
      <style type="text/css">
        #login h1 a, .login h1 a {
          background-image: initial !important;
          height: 65px;
          width: 320px;
          background-size: 320px 65px;
          background-repeat: no-repeat;
          padding-bottom: 30px;
        }
        body.login {
          background-color: #000;
        }
        body.login div#login p#nav a,
        body.login div#login p#backtoblog a {
          color: red;
        }
        body.login div#login {
          background-color: gray;
        }
      </style>
      <?php
    }
    
    function my_login_logo_url() {
      return home_url();
    }
    
    add_filter( 'login_headerurl', 'my_login_logo_url' );
    
    function my_login_logo_url_title() {
      return 'My random site';
    }
    
    add_filter( 'login_headertitle', 'my_login_logo_url_title' );
?>
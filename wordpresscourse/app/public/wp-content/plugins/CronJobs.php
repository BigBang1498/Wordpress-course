<?php
    if ( !wp_next_scheduled( 'my_hook' ) ) {
        wp_schedule_event( time(), 'every-5-minutes', 'my_hook' );
      }
      
      apply_filters( 'cron_schedules', 'cmo_schedules');
      function cmo_schedules( $schedules ) {
        $schedules[ 'every-5-minutes' ] = array(
          'interval' => 600,
          'display' => 'Every 5 minutes'
        );
        return $schedules;  
      }
      
      add_action( 'my_hook', 'cmo_random_function' );
      
      function cmo_random_function() {
        wp_mail( 'me@example.com', 'Test', 'Testing' );
      }
?>
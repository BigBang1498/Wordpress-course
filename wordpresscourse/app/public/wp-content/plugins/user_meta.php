<?php
  function cmo_custom_profile_fields( $profileuser ) {
    ?>
    <h2>Extra Meta Sutff</h2>
    <table class="form-table">
      <tr>
        <th>
          <label for="user_location"><?php esc_html_e( 'Location' ); ?></label>
        </th>
        <td>
          <input type="text" name="user_location" id="user_location" value="<?php echo esc_attr( get_user_meta( $profileuser->ID, 'user_location', true ) ); ?>" class="regular-text" >
          <br><span class="description"><?php esc_html_e( 'Your location.', 'text-domain' ); ?></span>
        </td>
      </tr>
    </table>
  <?php
  }

  add_action( 'show_user_profile', 'cmo_custom_profile_fields');
  add_action( 'edit_user_profile', 'cmo_custom_profile_fields');

  
  
  add_action( 'personal_options_update', 'cmo_update_fields' );
  add_action( 'edit_user_profile_update', 'cmo_update_fields' );

  /**
   * Save the fields
   *
   * @param int $user_id The ID of the user.
   * 
   */
  

  function cmo_update_fields( $user_id ) {
    $location = sanitize_text_field( $_POST['user_location'] );
    update_user_meta( $user_id, 'user_location', $location );
  }
?>
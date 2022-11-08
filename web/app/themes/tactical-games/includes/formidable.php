<?php 
/**
 * Formidable Forms and WooCommerce
 */

// Add Order ID to submission
add_action( 'woocommerce_new_order_item', 'save_entry_data_with_order', 10, 3 );
function save_entry_data_with_order( $item_id, $cart_item, $order_id ) {

  // check if there's form data to process
  if ( empty( $cart_item->legacy_values['_formidable_form_data'] ) ) {
    return;
  }

  //get form entry
  $entry = FrmEntry::getOne( $cart_item->legacy_values['_formidable_form_data'] );
  if ( $entry ) {
    $tg_form_options = maybe_unserialize( get_option('frm_tgsettings_' . $entry->form_id));
    
    // Division Field - Set attribute name of variation to form for reference.
    if (isset($tg_form_options['division'])) {
      $division = wc_get_order_item_meta($item_id, 'pa_division');
      $added = FrmEntryMeta::add_entry_meta( $entry->id, $tg_form_options['division'], null, $division );
      if ( ! $added ) {
        FrmEntryMeta::update_entry_meta( $entry->id, $tg_form_options['division'], null, $division );
      }
    }


    // Order ID Field - Change 'Order ID' text to name of order id field in your form
    if(isset( $tg_form_options['orderid'])) {
      $added = FrmEntryMeta::add_entry_meta( $entry->id, $tg_form_options['orderid'], null, $order_id );
      if ( ! $added ) {
        FrmEntryMeta::update_entry_meta( $entry->id, $tg_form_options['orderid'], null, $order_id );
      }
    }

  }
}

// Update status to completed once paid
add_action( 'woocommerce_order_status_completed', 'update_frm_entry_after_wc_order_completed' );
function update_frm_entry_after_wc_order_completed( $order_id ) {
	$order = new WC_Order( $order_id );
	$items = $order->get_items();
	foreach ( $items as $item_id => $product ) {
		if ( isset( $product['formidable_form_data'] ) && is_numeric( $product['formidable_form_data'] ) ) {
			$entry_id = $product['formidable_form_data'];
			$entry = FrmEntry::getOne( $entry_id );
      $tg_form_options = maybe_unserialize(get_option('frm_tgsettings_' . $entry->form_id));
      // Order ID Field - Change 'Order ID' text to name of order id field in your form
        // global $wpdb;
        //$field_id = $wpdb->get_var ( $wpdb->prepare( "SELECT id FROM {$wpdb->prefix}frm_fields where name = 'Order Status' and form_id = %d ", $entry->form_id) );
			// Set status to completed
      if ( $entry && isset($tg_form_options['orderstatus'])) {
				$new_value = 'Complete';
				FrmEntryMeta::update_entry_meta( $entry_id, $tg_form_options['orderstatus'], null, $new_value );
			}
		}
	}
}

// Validate the password entered is correct.
add_filter('frm_validate_field_entry', 'check_team_pwd_is_valid', 9, 3);
function check_team_pwd_is_valid( $errors, $posted_field, $posted_value ) {
  $tg_form_options = maybe_unserialize( get_option('frm_tgsettings_' . $posted_field->form_id) );
  if(isset($tg_form_options['teampwd']) && isset($tg_form_options['teamname']) && isset( $tg_form_options['teamguess'])) {
    if ( $posted_field->id == $tg_form_options['teamguess'] ) {
      global $wpdb;
      // Get field ID of the Enter Team Password field where the team membered entered their guess in. Should match the field we are checking here.
        //$member_pwd = $wpdb->get_var ( $wpdb->prepare( "SELECT id FROM {$wpdb->prefix}frm_fields where name = 'Enter Team Password' and form_id = %d ", $posted_field->form_id) );
      // Get field ID of the Select Team field.
        //$team = $wpdb->get_var ( $wpdb->prepare( "SELECT id FROM {$wpdb->prefix}frm_fields where name = 'Select Team' and form_id = %d ", $posted_field->form_id) );
      $team = $tg_form_options['teamname'];
      // Get the selected team value which is the submission id of the previous from the captain.
      $selected_team_sub = $_POST['item_meta'][ $team ];
      // Get the field ID of the Team Password field where the captain originally set the password.
        //$captain_pwd = $wpdb->get_var ( $wpdb->prepare( "SELECT id FROM {$wpdb->prefix}frm_fields where name = 'Team Password' and form_id = %d ", $posted_field->form_id) );
      $captain_pwd = $tg_form_options['teampwd'];
      // Get the correct password from the previous submission
      $correct_pwd = $wpdb->get_var ( $wpdb->prepare( "SELECT meta_value FROM {$wpdb->prefix}frm_item_metas where item_id = %d and field_id = %d ", $selected_team_sub, $captain_pwd) );

    
      if (trim($_POST['item_meta'][ $posted_field->id ]) != trim($correct_pwd)) {
        $errors['field'. $posted_field->id] = 'Incorrect password';
      }
    }
  }
  return $errors;
}

add_filter('frm_add_form_settings_section', 'frm_add_new_settings_tab', 10, 2);
function frm_add_new_settings_tab( $sections, $values ) {
	$sections[] = array(
		'name'		=> 'Registration',
		'anchor'	=> 'registration',
		'function'	=> 'tg_registration_settings',
	);
	return $sections;
}

function tg_registration_settings( $values ) {
	$form_fields = FrmField::getAll('fi.form_id='. (int) $values['id'] ." and fi.type not in ('break', 'divider', 'html', 'captcha', 'form')", 'field_order');
	$tg_form_options = maybe_unserialize( get_option('frm_tgsettings_' . $values['id']) );
	 ?>
   <p class="howto">Set the correct fields below to connect orders to submissions. Identify fields that will be used for team password registration.</p>
		<h3 class="frm_first_h3"><?php _e( 'Order Settings', 'formidable' ); ?></h3>
    <table class="form-table">
      <tr>
				<td>
					<label>Order Status <span class="frm_help frm_icon_font frm_tooltip_icon" title="What field will be used to store the order status?"></span></label>
				</td>
        <td>
					<select name="frm_tgsettings[orderstatus]">
						<option value=""><?php _e( '— Select —' ); ?></option>
						<?php foreach ( $form_fields as $form_field ) { 
							$selected = ( isset( $tg_form_options['orderstatus'] ) && $tg_form_options['orderstatus'] == $form_field->id ) ? ' selected="selected"' : '';
							?>
							<option value="<?php echo $form_field->id ?>" <?php echo $selected ?>><?php echo FrmAppHelper::truncate( $form_field->name, 40 ) ?></option>
							<?php } ?>
						</select>
          </td>
      </tr>
      <tr>
				<td>
					<label>Order ID <span class="frm_help frm_icon_font frm_tooltip_icon" title="What field will be used to store the order ID?"></span></label>
				</td>
        <td>
					<select name="frm_tgsettings[orderid]">
						<option value=""><?php _e( '— Select —' ); ?></option>
						<?php foreach ( $form_fields as $form_field ) { 
							$selected = ( isset( $tg_form_options['orderid'] ) && $tg_form_options['orderid'] == $form_field->id ) ? ' selected="selected"' : '';
							?>
							<option value="<?php echo $form_field->id ?>" <?php echo $selected ?>><?php echo FrmAppHelper::truncate( $form_field->name, 40 ) ?></option>
							<?php } ?>
						</select>
          </td>
      </tr>
      <tr>
				<td>
					<label>Division <span class="frm_help frm_icon_font frm_tooltip_icon" title="What hidden field will be used to store the division from the product variation attribute?"></span></label>
				</td>
        <td>
					<select name="frm_tgsettings[division]">
						<option value=""><?php _e( '— Select —' ); ?></option>
						<?php foreach ( $form_fields as $form_field ) { 
							$selected = ( isset( $tg_form_options['division'] ) && $tg_form_options['division'] == $form_field->id ) ? ' selected="selected"' : '';
							?>
							<option value="<?php echo $form_field->id ?>" <?php echo $selected ?>><?php echo FrmAppHelper::truncate( $form_field->name, 40 ) ?></option>
							<?php } ?>
						</select>
          </td>
      </tr>
		</table>
    <h3 class="frm_first_h3"><?php _e( 'Team Password Fields', 'formidable' ); ?></h3>
    <table class="form-table">
      <tr>
				<td>
					<label>Captain's Team Password <span class="frm_help frm_icon_font frm_tooltip_icon" title="This is the field that the captain will use the enter the password they want team members to used when registering."></span></label>
				</td>
        <td>
					<select name="frm_tgsettings[teampwd]">
						<option value=""><?php _e( '— Select —' ); ?></option>
						<?php foreach ( $form_fields as $form_field ) { 
							$selected = ( isset( $tg_form_options['teampwd'] ) && $tg_form_options['teampwd'] == $form_field->id ) ? ' selected="selected"' : '';
							?>
							<option value="<?php echo $form_field->id ?>" <?php echo $selected ?>><?php echo FrmAppHelper::truncate( $form_field->name, 40 ) ?></option>
							<?php } ?>
						</select>
          </td>
      </tr>
      <tr>
				<td>
					<label>Select Team Field <span class="frm_help frm_icon_font frm_tooltip_icon" title="This is the dynamic field that the team member uses to select the team they are registering for."></span></label>
				</td>
        <td>
					<select name="frm_tgsettings[teamname]">
						<option value=""><?php _e( '— Select —' ); ?></option>
						<?php foreach ( $form_fields as $form_field ) { 
							$selected = ( isset( $tg_form_options['teamname'] ) && $tg_form_options['teamname'] == $form_field->id ) ? ' selected="selected"' : '';
							?>
							<option value="<?php echo $form_field->id ?>" <?php echo $selected ?>><?php echo FrmAppHelper::truncate( $form_field->name, 40 ) ?></option>
							<?php } ?>
						</select>
          </td>
      </tr>
      <tr>
				<td>
					<label>Password Guess Field <span class="frm_help frm_icon_font frm_tooltip_icon" title="This is the field that the team member uses to enter the password created by the team captain."></span></label>
				</td>
        <td>
					<select name="frm_tgsettings[teamguess]">
						<option value=""><?php _e( '— Select —' ); ?></option>
						<?php foreach ( $form_fields as $form_field ) { 
							$selected = ( isset( $tg_form_options['teamguess'] ) && $tg_form_options['teamguess'] == $form_field->id ) ? ' selected="selected"' : '';
							?>
							<option value="<?php echo $form_field->id ?>" <?php echo $selected ?>><?php echo FrmAppHelper::truncate( $form_field->name, 40 ) ?></option>
							<?php } ?>
						</select>
          </td>
      </tr>
		</table>
	<?php
}

add_filter('frm_form_options_before_update', 'tg_save_registration_settings', 20, 2);
function tg_save_registration_settings( $options, $values ){
	if ( isset( $values['frm_tgsettings'] ) ) {
		$new_values = maybe_serialize( $values['frm_tgsettings'] );
		update_option( 'frm_tgsettings_' . $values['id'], $new_values );
	}

	return $options;
}
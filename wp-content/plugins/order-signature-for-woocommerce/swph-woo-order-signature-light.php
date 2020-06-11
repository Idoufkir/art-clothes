<?php

/*
  Plugin Name: Order Signature for WooCommerce - Light
  Plugin URI: http://superwpheroes.io/woocommerce-order-signiture-plugin-wordpress-heroes/
  Description: Add a nice responsive signature pad to your website's WooCommerce checkout page. If you find it usefull, kindly take a minute of your time to <a href="https://wordpress.org/support/plugin/order-signature-for-woocommerce/reviews/#new-post" target="_blank">rate it</a>.
  Version: 1.6.4
  Author: SUPER WP HEROES
  Author URI: http://superwpheroes.io
  License:     GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: order-signature-for-woocommerce
  Domain Path: /languages
  Requires at least: 		4.0
  Tested up to: 				5.4.1
  WC requires at least: 3.0.0
  WC tested up to: 4.1.1
*/


defined( 'ABSPATH' ) or die( 'No script stuff please!' );

register_activation_hook( __FILE__, 'swph_woo_sign_plugin_activate' );

add_action( 'init', 'swph_load_textdomain' );

function swph_load_textdomain() {
  load_plugin_textdomain( 'order-signature-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
 }

function swph_woo_sign_plugin_activate(){

    // Require parent plugin
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) and current_user_can( 'activate_plugins' ) ) {
		// Stop activation redirect and show error
		$PluginsURL = admin_url( 'plugins.php' );
        wp_die(printf(__('Sorry, but this plugin requires the WooCommerce Plugin to be installed and active. <br><a href="%s">&laquo; Return to Plugins</a>', 'order-signature-for-woocommerce'), $PluginsURL));
    }

}


// CHECK IF WOO IS ACTIVATED 

//if ( class_exists( 'WooCommerce' ) ) {
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	// ADD SUPPORT LINK
	function swph_plugin_add_settings_link( $links ) {
	   
		$rate_link = '<a target="_blank" href="https://wordpress.org/support/plugin/order-signature-for-woocommerce/reviews/#new-post">' . __( 'Rate This Plugin', 'order-signature-for-woocommerce' ) . '</a>';
	    array_unshift( $links, $rate_link );
		
		 $support_link = '<a href="mailto:support@superwpheroes.io?subject=Order Signature for WooCommerce not working on '.get_bloginfo("url").'">' . __( 'SUPPORT', 'order-signature-for-woocommerce' ) . '</a>';
		array_unshift( $links, $support_link );
		
		$settings_link = '<a href="admin.php?page=wc-settings&tab=settings_tab_signature">' . __( 'Settings', 'order-signature-for-woocommerce' ) . '</a>';
		array_unshift( $links, $settings_link );
	   
	  	return $links;
	}
	
	$plugin = plugin_basename( __FILE__ );
	add_filter( "plugin_action_links_$plugin", 'swph_plugin_add_settings_link' );

	// ADD THE CSS FILES
	add_action( 'wp_enqueue_scripts', 'swph_woo_sign_front_end_styles', 10, 1 );
	function swph_woo_sign_front_end_styles() {
		global $post;
		if(is_page(get_option( 'woocommerce_checkout_page_id' ))) {
			wp_enqueue_style( 'swph-woo-sign-front-end-styles-custom', plugins_url( 'assets/css/swph-woo-sign-front-end-styles-custom.css', __FILE__ ), array(), '1.1', 'all');
		}
	}

	add_action( 'admin_print_styles', 'swph_woo_sign_back_end_styles', 10, 1 );
	function swph_woo_sign_back_end_styles() {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'swph-woo-sign-back-end-styles-custom', plugins_url( 'assets/css/swph-woo-sign-back-end-styles-custom.css', __FILE__ ), array(), '1.1', 'all');
	}

	
	// ADD THE JS FILES
	add_action( 'wp_enqueue_scripts', 'swph_woo_sign_front_end_scripts' );
	function swph_woo_sign_front_end_scripts() {
		global $post;
		
		
		if(is_page(get_option( 'woocommerce_checkout_page_id' ))) {
			wp_enqueue_script( 'flashcanvas', plugins_url('/assets/js/flashcanvas.js',__FILE__ ));
			wp_script_add_data( 'flashcanvas', 'conditional', 'lt IE 9' );

			wp_enqueue_script( 'jSignature', plugins_url('/assets/js/jSignature.min.noconflict.js',__FILE__ ), array ( 'jquery' ), '', true);
			
			wp_enqueue_script( 'swph-woo-sign-front-end-scripts-custom', plugins_url('assets/js/swph-woo-sign-front-end-scripts-custom.js',__FILE__ ), array ( 'jquery' ), '', true);
			$swph_woo_sign_texts = array(
				'done_signing' 	 => get_option('wc_settings_tab_signature_done_signing', __('Done Signing', 'order-signature-for-woocommerce')),
				'clear_sign' 	 => get_option('wc_settings_tab_signature_clear_sign', __('Clear Signature', 'order-signature-for-woocommerce')),
				'sign_color' 	 => get_option('wc_settings_tab_signature_sign_color', '#000000'),
				'sign_stroke' 	 => get_option('wc_settings_tab_signature_sign_stroke', '5'),
				'sign_error_msg' => get_option('wc_settings_tab_signature_error_msg', __('Please draw at least a duck :) Sorry for the inconvenience, but we need to be compliant with tax and documents regulations here as well. Thank you for understanding!', 'order-signature-for-woocommerce')),
			);
			
			wp_localize_script( 'swph-woo-sign-front-end-scripts-custom', 'swph_woo_sign_texts', $swph_woo_sign_texts );
			
			wp_localize_script( 'swph-woo-sign-front-end-scripts-custom', 'swph_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ));
		}
	}

	add_action( 'admin_print_scripts', 'swph_woo_sign_back_end_scripts' );
	function swph_woo_sign_back_end_scripts() {
		//global $post;
		//if(is_page(get_option( 'woocommerce_checkout_page_id' ))) {

			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_script( 'swph-woo-sign-back-end-scripts-custom', plugins_url('assets/js/swph-woo-sign-back-end-scripts-custom.js',__FILE__ ), array ( 'jquery' ), '', false);
		//}
	}
	
	// ADD THE JSON HOLDER FOR THE SIGNATURE
	add_action('woocommerce_pay_order_before_submit', 'swph_woo_sign_add_customer_signature'); // for Order-Pay (pending payment) page
	add_action('woocommerce_after_checkout_billing_form', 'swph_woo_sign_add_customer_signature'); // for normal as well as multi step checkout
	
	function swph_woo_sign_add_customer_signature() {
		
		$order_id = 0;
		/** If user is on order pay (pending payment) page */
		if(is_wc_endpoint_url( 'order-pay' )){
			
			global $wp, $post;
		    $order_id = $wp->query_vars['order-pay'];
		   
			require_once(ABSPATH . 'wp-admin/includes/screen.php');
			$screen = get_current_screen();
	
			if ( $screen->parent_base == 'woocommerce' ) {
				$data = get_post_meta( $post->ID, '_customer-signature', true );

				if(empty($data)){
					$data = get_post_meta( $post->ID, 'customer-signature', true );
				}
				
				if(empty($data)){
					$data = get_post_meta( $post->ID, 'Customer Signature', true );
				}
			} else {
				$data = get_post_meta( $order_id, '_customer-signature', true );

				if(empty($data)){
					$data = get_post_meta( $order_id, 'customer-signature', true );
				}
				
				if(empty($data)){
					$data = get_post_meta( $order_id, 'Customer Signature', true );
				}
			}
		}
		else{
			$data=array();
		}
		echo '<div id="swph_order_custom_fields">';
		echo '<h3>'.get_option('wc_settings_tab_signature_custom_field_title', __('Terms and Conditions', 'order-signature-for-woocommerce')).'</h3>';
		echo '<p>'.get_option('wc_settings_tab_signature_custom_field_text', __('By signing below you agree with the terms and conditions.', 'order-signature-for-woocommerce')).'</p>';
		echo '<input type="hidden" name="swph_woo_custom_field_title" value="'.get_option('wc_settings_tab_signature_custom_field_title', __('Terms and Conditions', 'order-signature-for-woocommerce')).'">';
		echo '<input type="hidden" name="swph_woo_custom_field_text" value="'.esc_html(get_option('wc_settings_tab_signature_custom_field_text'), __('By signing below you agree with the terms and conditions.', 'order-signature-for-woocommerce')).'">';
		echo '</div>';
		// echo '<div class="form-row" >';
		echo '<div id="swph-woo-sign-signature-pad-wrapper"><h3>' . __('Your Signature','order-signature-for-woocommerce') . '</h3>';
		echo '<div id="swph-woo-sign-signature-pad"></div>';
		
		if(!($data)){
			// DISPLAY CONFIRMATION DEPENDING ON PRODUCT
			echo '<a href="javascript: void(0)" id="swph-woo-sign-svgButton" class="swph_woo_sign_button button btn">'.get_option('wc_settings_tab_signature_done_signing', __('Done Signing', 'order-signature-for-woocommerce')).'</a>';
			echo '<a href="javascript: void(0)" id="swph-woo-sign-clearButton" class="swph_woo_sign_button button btn">'.get_option('wc_settings_tab_signature_clear_sign', __('Clear Signature', 'order-signature-for-woocommerce')).'</a>';
		}	
		if(($data)){
			// DISPLAY CONFIRMATION DEPENDING ON PRODUCT
			
			echo '<a href="javascript: void(0)" id="swph-woo-sign-svgButton" class="swph_woo_sign_button button btn">'.get_option('wc_settings_tab_signature_done_signing', __('Done Signing', 'order-signature-for-woocommerce')).'</a>';
			echo '<a href="javascript: void(0)" id="swph-woo-sign-clearButton" class="swph_woo_sign_button button btn">'.get_option('wc_settings_tab_signature_clear_sign', __('Clear Signature', 'order-signature-for-woocommerce')).'</a>';
			
			 echo '<a href="javascript: void(0)" id="swph-woo-sign-redrawButton" onclick="redrawImg();" class="swph_woo_sign_button button btn">'.__('Redraw Signature', 'order-signature-for-woocommerce').'</a>';
			 echo '<input type="hidden" name="swph_old_sign" id="swph_old_sign" value="data:'.$data.'" />';
		}
				
		if($order_id > 0){
			 echo '<input type="hidden" name="swph_order_id" id="swph_order_id" value="'.$order_id.'" />';
		}

		woocommerce_form_field( 'swph_woo_sign_customer_signature', array(
		    'type'          => 'textarea',
		    'class'         => array('swph-woo-sign-customer-signature form-row-wide'),
		    'label'         => __(''),
		    'placeholder'   => __(''),
		    'required'		=> true,
		    ));

		echo '</div>';
		
		
	}
	
	// VALIDATE THE SIGNATURE ON ORDER-PAY PAGE
	add_action('before_woocommerce_pay', 'swph_check_signature'); //on ordersubmit
	
	function swph_check_signature() {
		
		if(is_wc_endpoint_url( 'order-pay' ) ){
			
			global $wp, $post;
		    $order_id = $wp->query_vars['order-pay'];
		   
			require_once(ABSPATH . 'wp-admin/includes/screen.php');
			$screen = get_current_screen();
		

			if ( $screen->parent_base == 'woocommerce' ) {
				$data = get_post_meta( $post->ID, '_customer-signature', true );

				if(empty($data)){
					$data = get_post_meta( $id, 'customer-signature', true );
				}
				
				if(empty($data)){
					$data = get_post_meta( $id, 'Customer Signature', true );
				}
			} else {
				$data = get_post_meta( $order_id, '_customer-signature', true );

				if(empty($data)){
					$data = get_post_meta( $id, 'customer-signature', true );
				}
				
				if(empty($data)){
					$data = get_post_meta( $id, 'Customer Signature', true );
				}
			}
			
			if(!($data)){
				$swph_woo_sign_signature_blob = $_POST['swph_woo_sign_customer_signature'];
			    if($swph_woo_sign_signature_blob == '' || $swph_woo_sign_signature_blob == 'image/jsignature;base30,') {
			    	wc_add_notice( '<span id = "swph_payout_error">'.__('Please add your signature!', 'order-signature-for-woocommerce').'.</span>', 'error' );
				}
			}
		}
	}
	
	
	// AJAX CALLBACK TO UPDATE THE SIGNATURE DRAWN ON ORDER-PAY PAGE
	add_action( 'wp_ajax_update_signature', 'update_signature' );
	add_action( 'wp_ajax_nopriv_update_signature', 'update_signature' );

	function  update_signature() {   
		$order_id = $_POST['swph_order_id'];
	   
	    if ( ! empty( $_POST['swph_woo_sign_customer_signature'] ) ) {
	        update_post_meta( $order_id, '_customer-signature', sanitize_text_field( $_POST['swph_woo_sign_customer_signature'] ) );
			echo "success";
	    }
		else{
			echo "error";
		}
		
		die;
	}
	
	// VALIDATE SIGNATURE DATA
	add_action('woocommerce_checkout_process', 'swph_woo_sign_is_signed');
	
	add_action('woocommerce_thankyou',"thankyou_extra_content");
	function thankyou_extra_content(){
	echo '<input action="action" type="button" value="'.__('Change Payment Method', 'order-signature-for-woocommerce').'" onclick="history.go(-1);" />';
	}
	

	function swph_woo_sign_is_signed() { 
	   $swph_woo_sign_signature_blob = $_POST['swph_woo_sign_customer_signature'];
	  	  
	   if($swph_woo_sign_signature_blob == '' || $swph_woo_sign_signature_blob == 'image/jsignature;base30,') {
	    	wc_add_notice( __( 'Please add your signature!', 'order-signature-for-woocommerce'), 'error' );
		}
	}

	// UPDATE ORDER META
	add_action( 'woocommerce_checkout_update_order_meta', 'swph_woo_sign_checkout_field_update_order_meta' );

	function swph_woo_sign_checkout_field_update_order_meta( $order_id ) {
		//global $woocomemerce;
	    if ( ! empty( $_POST['swph_woo_sign_customer_signature'] ) ) {
	        update_post_meta( $order_id, '_customer-signature', sanitize_text_field( $_POST['swph_woo_sign_customer_signature'] ) );
		}
		
		if(isset($_POST['swph_woo_custom_field_title']) && !empty($_POST['swph_woo_custom_field_title']))
		{
			update_post_meta( $order_id, '_customer-signature-custom-field-title', sanitize_text_field( $_POST['swph_woo_custom_field_title'] ) );
		}

		if(isset($_POST['swph_woo_custom_field_text']) && !empty($_POST['swph_woo_custom_field_text']))
		{
			update_post_meta( $order_id, '_customer-signature-custom-field-text', sanitize_text_field( $_POST['swph_woo_custom_field_text'] ) );
		}
	}

	// ADD CUSTOM METABOX TO WOO ADMIN ORDER PAGE
	add_action( 'add_meta_boxes', 'swph_woo_sign_customer_signature_meta_box' );

	function swph_woo_sign_customer_signature_meta_box(){

	    add_meta_box( 'WOO-swph_woo_sign_display_customer_signiture', __( 'Customer Signature', 'order-signature-for-woocommerce' ), 'swph_woo_sign_display_customer_signiture', 'shop_order', 'side',  'default' );

	}

	function output_customer_signature_text($htag) {
		return '<'.$htag.' class="woocommerce-column__title">'.get_option('wc_settings_tab_signature_customer_signature_text', __('Customer Signature', 'order-signature-for-woocommerce')).'</'.$htag.'>';
	}

	// DISPLAY THE SIGNATURE
	function swph_woo_sign_display_customer_signiture( $order ){

		global $post;
		
		// check and see if jSignature_Tools_Base30 is already included or not
		if(!class_exists('jSignature_Tools_Base30')) {
			require_once('jSignature_Tools_Base30.php');
		}


		require_once(ABSPATH . 'wp-admin/includes/screen.php');
		$screen = get_current_screen();
		
		$swph_sign_hex_color = get_option('wc_settings_tab_signature_sign_color', '#000000');
		
		if (!is_null($screen) && $screen->post_type == 'shop_order' ) {
			$data = get_post_meta( $post->ID, '_customer-signature', true );
			
			if(empty($data)){
				$data = get_post_meta( $post->ID, 'customer-signature', true );
			}
			
			if(empty($data)){
				$data = get_post_meta( $post->ID, 'Customer Signature', true );
			}
		} else {
			$data = get_post_meta( $order, '_customer-signature', true );

			if(empty($data)){
				$data = get_post_meta( $order, 'customer-signature', true );
			}
			
			if(empty($data)){
				$data = get_post_meta( $order, 'Customer Signature', true );
			}
		}

		if(!empty($data))
		{
			$data = str_replace('image/jsignature;base30,', '', $data);
		
			// Create jSignature object
			$signature = new jSignature_Tools_Base30();
			
			// Decode base30 format
			$a = $signature->Base64ToNative($data);
			// Create a image 
			
			// Calculate dimensions
			$width = 0;
			$height = 0;
			
			foreach ( $a as $line ) {
				if (max ( $line ['x'] ) > $width)
					$width = max ( $line ['x'] );
				if (max ( $line ['y'] ) > $height)
					$height = max ( $line ['y'] );
			}		
			
			// Create an image
			$im = imagecreatetruecolor ( $width, $height );

			//header('Content-type: image/png');           
			//$im = imagecreatetruecolor(1295, 328);
			
			// Save transparency for PNG
			imagesavealpha($im, true);
			
			// Fill background with transparency
			$trans_colour = imagecolorallocatealpha($im, 0, 0, 0, 127);
			imagefill($im, 0, 0, $trans_colour);
			
			// Set pen thickness
			imagesetthickness($im, 5);
			
			// Set pen color to black  
			list($r, $g, $b) = sscanf($swph_sign_hex_color, "#%02x%02x%02x");
			$swph_sign_rgb_color = imagecolorallocate($im, $r, $g, $b);

			// Loop through array pairs from each signature word
			for ($i = 0; $i < count($a); $i++)
			{
				// Loop through each pair in a word
				for ($j = 0; $j < count($a[$i]['x']); $j++)
				{
					// Make sure we are not on the last coordinate in the array
					if ( ! isset($a[$i]['x'][$j])) 
						break;
					if ( ! isset($a[$i]['x'][$j+1])) 
					// Draw the dot for the coordinate
						imagesetpixel ( $im, $a[$i]['x'][$j], $a[$i]['y'][$j], $swph_sign_rgb_color); 
					else
					// Draw the line for the coordinate pair
					imageline($im, $a[$i]['x'][$j], $a[$i]['y'][$j], $a[$i]['x'][$j+1], $a[$i]['y'][$j+1], $swph_sign_rgb_color);
				}
			} 
			// Enable output buffering
			ob_start();
			imagepng($im);
			// Capture the output
			$imagedata = ob_get_contents();
			// Clear the output buffer
			ob_end_clean();


			imagedestroy($im);
			//echo print_r($imagedata .'test');
			echo '<section class="woocommerce-customer-signature">';
			echo '<div id="swph-woo-sign-admin-signature-pad">';
			echo output_customer_signature_text(get_option('wc_settings_tab_signature_customer_signature_text_size', 'h2'));
			//echo '<h2 class="woocommerce-column__title">'.get_option('wc_settings_tab_signature_customer_signature_text', __('Customer Signature', 'order-signature-for-woocommerce')).'</h2>';
			echo '<img src="data:image/png;base64,'.base64_encode($imagedata).'" alt="image 1" width="auto" />';
			//echo '<hr />';
			echo '</div>';
			echo '</section>';
		}
		else {
			echo '<section class="woocommerce-customer-signature">';
			echo '<div id="swph-woo-sign-admin-signature-pad">';
			echo output_customer_signature_text(get_option('wc_settings_tab_signature_customer_signature_text_size', 'h2'));
			//echo '<h2 class="woocommerce-column__title">'.get_option('wc_settings_tab_signature_customer_signature_text', __('Customer Signature', 'order-signature-for-woocommerce')).'</h2>';
			echo '<p>'.__('There is no signature for this order.', 'order-signature-for-woocommerce').'</p>';
			//echo '<hr />';
			echo '</div>';
			echo '</section>';
		}
	}

	// DISPLAYING SIGNITURE IN CLIENT'S ACCOUNT
	//add_action( 'woocommerce_order_details_after_customer_details','swph_woo_sign_display_customer_signiture');
	add_action( 'woocommerce_thankyou','swph_woo_sign_display_customer_signiture', 20);
	add_action( 'woocommerce_view_order', 'swph_woo_sign_display_customer_signiture', 20 );

	// ADD WOOCOMMERCE SETTINGS TAB

	function swph_woo_sign_get_settings() {

        $settings = array(
            'section_title' => array(
                'name'      => __( 'Signature Settings', 'order-signature-for-woocommerce' ),
                'type'      => 'title',
                'desc'      => '',
                'id'        => 'wc_settings_tab_signature_section_title',
                'class'        => 'swph_setting_field'
            ),
            'done_signing'  => array(
                'name' 		=> __( '"Done Signing" Button Text', 'order-signature-for-woocommerce' ),
                'default'	=> __( 'Done Signing', 'order-signature-for-woocommerce' ),
                'type'  	=> 'text',
                'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
                'id'   		=> 'wc_settings_tab_signature_done_signing',
				'class'        => 'swph_setting_field'
            ),
            'clear_sign' 	=> array(
                'name' 		=> __( '"Clear Signature" Button Text', 'order-signature-for-woocommerce' ),
                'default'	=> __('Clear Signature', 'order-signature-for-woocommerce' ),
                'type' 		=> 'text',
                'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
                'id'   		=> 'wc_settings_tab_signature_clear_sign'
            ),
            'sign_color' 	=> array(
                'name' 		=> __( 'Signature color', 'order-signature-for-woocommerce' ),
                'default'	=> '#000000',
                'type' 		=> 'text',
                'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
                'id'   		=> 'wc_settings_tab_signature_sign_color'
            ),
            'sign_stroke' 	=> array(
                'name' 		=> __( 'Signature stroke thickness', 'order-signature-for-woocommerce' ),
                'default'	=> '5',
                'type' 		=> 'number',
                'desc' 		=> __( 'in pixels', 'order-signature-for-woocommerce' ),
                'id'   		=> 'wc_settings_tab_signature_sign_stroke'
            ),
            'sign_error_msg' => array(
                'name' 		=> __( 'Signature error alert error message', 'order-signature-for-woocommerce' ),
                'default'	=> __( 'Please draw at least a duck :) Sorry for the inconvenience, but we need to be compliant with tax and documents regulations here as well. Thank you for understanding!', 'order-signature-for-woocommerce' ),
                'type' 		=> 'textarea',
                'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
                'id'   		=> 'wc_settings_tab_signature_error_msg'
            ),
			'pro_banner' => array(
                'name' 		=> __( '', 'order-signature-for-woocommerce' ),
                'type' 		=> 'title',
                'desc' 		=>  '<div class="swph_pro_banner"><a href="https://superwpheroes.io/product/order-signature-for-woocommerce-pro/" target="_blank"><img src="'.plugins_url( 'assets/img/order-signature-for-woocommerce-go-pro-banner.png', __FILE__ ).'" /></a></div>',
                'id'   		=> 'wc_settings_tab_signature_custom_type'
			),
			'custom_field_name' => array(
				'name' 		=> __( 'Custom field title', 'order-signature-for-woocommerce' ),
				'default'	=> __( 'Default text', 'order-signature-for-woocommerce' ),
				'type' 		=> 'text',
				'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
				'id'   		=> 'wc_settings_tab_signature_custom_field_title'
			),
			'custom_field_text' => array(
				'name' 		=> __( 'Custom field text', 'order-signature-for-woocommerce' ),
				'default'	=> __( 'Default text', 'order-signature-for-woocommerce' ),
				'type' 		=> 'textarea',
				'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
				'id'   		=> 'wc_settings_tab_signature_custom_field_text'
			),
			'customer_signature_text' => array(
				'name' 		=> __( '"Customer Signature" Text', 'order-signature-for-woocommerce' ),
				'default'	=> __( 'Customer Signature', 'order-signature-for-woocommerce' ),
				'type' 		=> 'text',
				'desc' 		=> __( '', 'order-signature-for-woocommerce' ),
				'id'   		=> 'wc_settings_tab_signature_customer_signature_text'
			),
			'customer_signature_text_size' => array(
				'name' 		=> __( '"Customer Signature" Text Size', 'order-signature-for-woocommerce' ),
				'default'	=> 'h2',
				'type'    	=> 'select',
				'options' 	=> array(
					'h1'		=> 'H1',
					'h2'		=> 'H2',
					'h3'		=> 'H3',
					'h4'		=> 'H4',
					'h5'		=> 'H5',
					'h6'		=> 'H6'
				),
				'id'   		=> 'wc_settings_tab_signature_customer_signature_text_size'
			),
            'section_end' 	=> array(
                 'type' 	=> 'sectionend',
                 'id' 		=> 'wc_settings_tab_signature_section_end'
            )
		);

        return apply_filters( 'wc_settings_tab_demo_settings', $settings );
    }

    function swph_woo_sign_settings_tab() {
        woocommerce_admin_fields( swph_woo_sign_get_settings() );
    }


    function swph_woo_sign_update_settings() {
        woocommerce_update_options( swph_woo_sign_get_settings() );
    }

    
    function swph_woo_sign_add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_signature'] = __( 'Signature', 'order-signature-for-woocommerce' );
        return $settings_tabs;
    }

    add_filter( 'woocommerce_settings_tabs_array', 'swph_woo_sign_add_settings_tab', 50 );
    add_action( 'woocommerce_settings_tabs_settings_tab_signature', 'swph_woo_sign_settings_tab' );
    add_action( 'woocommerce_update_options_settings_tab_signature', 'swph_woo_sign_update_settings' );

} // end Woo Check

?>
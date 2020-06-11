
(function($) {
	jQuery('document').ready( function() {
		
		//HIDE THE VALIDATION MESSAGE FROM PAY ORDER PAGE (PENDING PAYMENT)
		$( "#swph_payout_error" ).parents('ul.woocommerce-error').css( "display", "none" );

		var sig = jQuery("#swph-woo-sign-signature-pad");
		// IDENTIFY THE SIGNATURE PAD 
		jQuery("#swph-woo-sign-signature-pad").jSignature({color: swph_woo_sign_texts.sign_color  ,lineWidth:  swph_woo_sign_texts.sign_stroke  });
		
		if($("#swph_old_sign").length){
			importSignature();
		}
			
		// GRAB THE SIGNATURE
		jQuery('#swph-woo-sign-svgButton').click(function() { 
			var signature = jQuery('#swph-woo-sign-signature-pad').jSignature('getData', 'base30');
			jQuery('#swph_woo_sign_customer_signature').val(signature);
			if( jQuery('#swph-woo-sign-signature-pad').jSignature('getData', 'native').length == 0) {
			    alert(swph_woo_sign_texts.sign_error_msg);
			    return false;
			 } else {
			 	jQuery(this).addClass('swph-woo-sign-done-signing').html('<i class="fa fa-check"></i> '+ swph_woo_sign_texts.done_signing);
				sig.jSignature('disable');
			 	return true;
			 }
		});
		
		// CLEAR THE SIGNATURE PAD
		jQuery('#swph-woo-sign-clearButton').click(function() { 
			// emptying not working
		    jQuery('#swph_woo_sign_customer_signature').val("");
			jQuery('#swph-woo-sign-signature-pad').jSignature('clear'); 
			jQuery("#swph-woo-sign-svgButton").removeClass('swph-woo-sign-done-signing').html(swph_woo_sign_texts.done_signing);
			sig.jSignature('enable');
		}); 
	
		//MAKE SURE THE USER DOESNT FORGET TO CLICK ON DONE SIGNING BUTTON
		jQuery('#swph-woo-sign-signature-pad').click(function() { 
			// emptying not working
		    var signature = jQuery('#swph-woo-sign-signature-pad').jSignature('getData', 'base30');
			jQuery('#swph_woo_sign_customer_signature').val(signature);
		}); 
		
		//jQuery('#swph-woo-sign-clearButton').click();
		
		
		//VALIDATE AND SUBMIT SIGNATURE TO BE UPDATED WHEN USER SUBMITS PAY ORDER (PENDING PAYMENT) FORM
		/* we are using the static id's of form and submit button from woocommerce standard files 
		  If woocommerce changes this data in future releases, we have to update it accordingly or have to find an action hook to validate  as well as submit data               from pay-order page of woocommerce (as of now no hook is available date - 22 Oct 2018  Wordpress 4.9.8, WooCommerce 3.4.7) */
		
		jQuery('#place_order').click(function() { 
			var signature = jQuery('#swph_woo_sign_customer_signature').val();
			
			//check the length of drawn signature
			if(signature.length == 0 ){
				// If no signature available show the error notice
				$( "#swph_payout_error" ).parents('ul.woocommerce-error').css( "display", "block" );
				
				$('html, body').animate({
			        scrollTop: $("#swph_payout_error").parents('div#content').offset().top
			    }, 2000);
				return false;
       		}
			else{
				// If signature exists submit it to be updated 
				var ajaxurl = swph_ajax_object.ajax_url;
				var swph_woo_sign_customer_signature = $('#swph_woo_sign_customer_signature').val();
				var swph_order_id = $('#swph_order_id').val();
				
				var data = {
					'action': 'update_signature',
					'swph_woo_sign_customer_signature': swph_woo_sign_customer_signature,
					'swph_order_id' : swph_order_id
				};
				
				jQuery.post(ajaxurl, data, function(response) {
					
					if(response == 'success'){
						// If signature meta is updated successfully submit the pay-order form
						$( "#order_review").submit();
					}
					else{
						$( "#swph_payout_error" ).parents('ul.woocommerce-error').css( "display", "block" );
				
						$('html, body').animate({
					        scrollTop: $("#swph_payout_error").parents('div#content').offset().top
					    }, 2000);
						return false;
					}
				});
				
				return false;
			}
		}); 
	});	


}) (jQuery);

function redrawImg()
{
	var sig = jQuery("#swph-woo-sign-signature-pad");	
	
	sig.children("img.imported").remove();
	sig.jSignature('enable');
	
	jQuery('#swph-woo-sign-redrawButton').remove();
		
	jQuery("#swph-woo-sign-svgButton").show();
	jQuery("#swph-woo-sign-clearButton").show();
}

function importSignature()
{
	var sig = jQuery("#swph-woo-sign-signature-pad");	
	var dataurl= jQuery("#swph_old_sign").val();
			
	if (jQuery.trim(dataurl)) {
		sig.jSignature('importData',dataurl);
	}
	jQuery("#swph-woo-sign-svgButton").hide();
	jQuery("#swph-woo-sign-clearButton").hide();
	sig.jSignature('disable');
}

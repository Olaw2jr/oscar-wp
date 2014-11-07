jQuery(document).ready(function() {
	jQuery('#contact-form').submit(function() {
		
		if(jQuery('#contact-form').hasClass('clicked')){
			return false;
		}
		
		jQuery('#contact-form').addClass('clicked');
		
		var buttonCopy = jQuery('#contact-form button').html(),
			errorMessage = jQuery('#contact-form button').data('error-message'),
			sendingMessage = jQuery('#contact-form button').data('sending-message'),
			okMessage = jQuery('#contact-form button').data('ok-message'),
			hasError = false;
		
		jQuery('#contact-form .error-message').remove();
		
		jQuery('.requiredField').each(function() {
			if($.trim(jQuery(this).val()) == '') {
				var errorText = jQuery(this).data('error-empty');
				jQuery(this).parents('.controls').append('<span class="error-message" style="display:none;">'+errorText+'.</span>').find('.error-message').fadeIn('fast');
				jQuery(this).addClass('inputError');
				hasError = true;
			} else if(jQuery(this).is("input[type='email']") || jQuery(this).attr('name')==='email') {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test($.trim(jQuery(this).val()))) {
					var invalidEmail = jQuery(this).data('error-invalid');
					jQuery(this).parents('.controls').append('<span class="error-message" style="display:none;">'+invalidEmail+'.</span>').find('.error-message').fadeIn('fast');
					jQuery(this).addClass('inputError');
					hasError = true;
				}
			}
		});
		
		if(hasError) {
			jQuery('#contact-form button').html('<i class="fa fa-times"></i>'+errorMessage);
			setTimeout(function(){
				jQuery('#contact-form button').html(buttonCopy);
				jQuery('#contact-form').removeClass('clicked');
			},2000);
		}
		else {
			jQuery('#contact-form button').html('<i class="fa fa-spinner fa-spin"></i>'+sendingMessage);
			
			var formInput = jQuery(this).serialize();
			$.post(jQuery(this).attr('action'),formInput, function(data){
				jQuery('#contact-form button').html('<i class="fa fa-check"></i>'+okMessage);
				setTimeout(function(){
					jQuery('#contact-form button').html(buttonCopy);
				jQuery('#contact-form').removeClass('clicked');
				},2000);
				
				jQuery('#contact-form')[0].reset();
			});
		}
		
		return false;	
	});
});
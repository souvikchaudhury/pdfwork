jQuery(document).ready(function(){

	var AjxUrl = jQuery('#AjaxUrl').val();
	var user_time_check_field = jQuery('#user_time_check_field').val();

	if(user_time_check_field == 'Yes'){
		setInterval(function() {
	      postsLoad(AjxUrl);
		}, 1000);
	}

});

function postsLoad(AjxUrl){

	var user_time_limit_field = jQuery('#user_time_limit_field').val();
	var user_time_check_field = jQuery('#user_time_check_field').val();

	if(user_time_limit_field > 0){

		jQuery.ajax({
	        type: 'POST',
	        url: AjxUrl,
	        data: { action: 'Userlogintimecheck'},
	        success: function(data, textStatus, XMLHttpRequest){

	        	data = jQuery.parseJSON(data);

	        	jQuery('#user_time_limit_field').val(data.user_time_limit);
	        	jQuery('#user_time_check_field').val(data.user_time_check);
	        	console.log(data.redrctUrl);
	        	if(data.redrctUrl != 'no'){
	        		console.log(data.redrctUrl);
	        		window.location = data.redrctUrl;
	        	}
	        	console.log(data.user_time_limit);
	        },
	        error: function(MLHttpRequest, textStatus, errorThrown){
	            //alert(errorThrown);
	        }
	    });
    }
}
/**/
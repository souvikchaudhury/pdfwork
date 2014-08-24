jQuery(document).ready(function(){

	var AjxUrl = jQuery('#AjaxUrl').val();
	var user_time_check_field = jQuery('#user_time_check_field').val();

	
		setchkintrval = setInterval(function() {
			if(user_time_check_field == 'Yes'){
	    		postsLoad(AjxUrl);
	  		}
		}, 1000);

		
	jQuery('iframe').load( function() {
	    // jQuery('#viewerBox').contents().find("head").append(jQuery("<style type='text/css'>  .pcc-active{display:none;}  </style>"));
	    // console.log(jQuery('iframe').contents().find("head"));
	});
});
jQuery(window).on('load', function() {
    
   jQuery('#viewerBox').contents().find('.pcc-icon-texttool').css("display", "none");

});

function postsLoad(AjxUrl){

	var user_time_limit_field = jQuery('#user_time_limit_field').val();
	var user_time_check_field = jQuery('#user_time_check_field').val();

	if(user_time_limit_field >= -1){

		jQuery.ajax({
	        type: 'POST',
	        url: AjxUrl,
	        data: { action: 'Userlogintimecheck'},
	        success: function(data, textStatus, XMLHttpRequest){

	        	data = jQuery.parseJSON(data);

	        	jQuery('#user_time_limit_field').val(data.user_time_limit);
	        	jQuery('#user_time_check_field').val(data.user_time_check);
	        	jQuery('.timer_span').html(data.user_time_limit);
	        	console.log(data.redrctUrl);
	        	if(data.redrctUrl != 'no'){
	        		//console.log(data.redrctUrl);
	        		clearInterval(setchkintrval);
	        		jQuery('.pdfviewpagewrapper').html('<label> Your session is timed out. Please contact to Admin for a new session to view the PDF.</label>');
	        		jQuery('.timmer').html();
	        		setTimeout(function() { 
	        			window.location = data.redrctUrl;
	        		}, 8000);
	        		
	        	}
	        	//console.log(data.user_time_limit);
	        },
	        error: function(MLHttpRequest, textStatus, errorThrown){
	            //alert(errorThrown);
	        }
	    });
    }
}
/**/
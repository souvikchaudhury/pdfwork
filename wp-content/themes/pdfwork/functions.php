<?php

function twentyfourteen_scriptss() {
	wp_enqueue_script( 'twentyfourteen-custom',  get_stylesheet_directory_uri(). '/custom.js');
}
add_action( 'wp_enqueue_scripts', 'twentyfourteen_scriptss' );



function userlogintimecheck(){
//	ob_clean();
	$user_ID = get_current_user_id();
  	
  	$user_time_limit = get_user_meta($user_ID, 'user_time_limit', true);
  	$user_time_check = get_user_meta($user_ID, 'user_time_check', true);
  	$arr['redrctUrl'] = 'no';

  	if($user_time_check == 'Yes'){
	  	if($user_time_limit > 0 ){
	  		$new_time = $user_time_limit - 1;
	  		update_usermeta( $user_ID, 'user_time_limit', $new_time );

	  	}else{
	  		update_usermeta( $user_ID, 'user_time_check', 'No' );
	  		$arr['redrctUrl'] = wp_logout_url();
	  	}
	}

  	$user_time_limit = get_user_meta($user_ID, 'user_time_limit', true);

  	$arr['user_time_limit'] = $user_time_limit;
  	$arr['user_time_check'] = $user_time_check;

  	$arr = json_encode($arr);
	echo $arr;

   	die();
}
add_action( 'wp_ajax_nopriv_Userlogintimecheck', 'userlogintimecheck' );
add_action( 'wp_ajax_Userlogintimecheck', 'userlogintimecheck' );



/* Disable WordPress Admin Bar for all users but admins. */
if (!current_user_can('administrator')){
  show_admin_bar(false);
}

/***************************************************
*			block wp-admin for general users
****************************************************/
	add_action( 'init', 'blockusers_init' );
	function blockusers_init() {
		if ( is_admin() && ! current_user_can( 'administrator' ) &&
				! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
			wp_redirect( home_url() );
			exit;
		}
	}
/**********************************************
*            Close PLugin Update
**********************************************/
	add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
/**********************************************
*		
***********************************************/

<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<?php if(is_page()) { $page_slug = 'page_'.$post->post_name; } ?>
<body <?php body_class($page_slug); ?>>
<?php 
	$user_ID = get_current_user_id();
	if (!current_user_can('administrator')){
	  	$user_time_limit = get_user_meta($user_ID, 'user_time_limit', true);
		$user_time_check = get_user_meta($user_ID, 'user_time_check', true);
	}

	/*$disabled_user = get_user_meta($user_ID, 'disabled_user', true);
	if ( $disabled_user == 'Yes' ) {
		// add_filter('login_errors', create_function('$a', "return '<b>Error:</b> Invalid Username or Password';"));
		auth_redirect();
		exit;
	}*/
?>
<input type="hidden" name="AjaxUrl" id="AjaxUrl" value="<?php echo site_url(); ?>/wp-admin/admin-ajax.php" />
<input type="hidden" name="user_time_limit_field" id="user_time_limit_field" value="<?php echo $user_time_limit; ?>"/>
<input type="hidden" name="user_time_check_field" id="user_time_check_field" value="<?php echo $user_time_check; ?>"/>


<?php if ( is_page('pdf-page') ||  is_page('your-profile')) { ?>
	<div class="customHeader">
		<div class="innerPage">
    	<img src="<?php echo get_bloginfo( 'stylesheet_directory' ) ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" width="100" height="100">
    </div>
	</div>
<?php } else { ?>
    
<?php } ?>
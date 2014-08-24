<?php
/**
 * Template Name: Login Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php
	if ( is_user_logged_in() ) {
		$location = site_url().'/pdf-page/';
		wp_safe_redirect( $location);
	}
?>
<div class="loginBox">
	<div class="logo">
		<img src="<?php echo get_bloginfo( 'stylesheet_directory' ) ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
	</div>
	<?php echo do_shortcode('[theme-my-login]');?>
</div>

<?php
get_footer();

<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<?php if ( is_page('pdf-page') ||  is_page('your-profile')) { ?>
	<div class="customFooter">
		<div class="innerPage">
    	<p>&copy; Copyright 2014</p>
    </div>
	</div>
<?php } else { ?>
<?php } ?>

<?php wp_footer(); ?>

<script>
	jQuery(document).ready(function() {
		jQuery('.logo').next('Log In').hide();
	});
</script>

</body>
</html>
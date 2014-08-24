<?php
/**
 * Template Name: PDF Control Template
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php
	if ( !is_user_logged_in() ) {
		$location = site_url();
		wp_safe_redirect( $location);
	}
?>

<div id="main-content" class="main-content">
	<?php
		$user_ID = get_current_user_id();
	  	$user_time_limit = get_user_meta($user_ID, 'user_time_limit', true);
	  	$user_time_check = get_user_meta($user_ID, 'user_time_check', true);

	  	$pdfurl = get_field('pdf_test',15);
	  	$printoption = get_field('print_option',15);
	 //echo do_shortcode('[pdfjs-viewer url=http://oz-dropship.com/pdfwork/wp-content/uploads/Comlexity.pdf fullscreen=false download=false print=true openfile=false]'); 
	?>
	<div class="wrapper">
		
		<div class="timmer">
			<?php  if (!current_user_can('administrator') && $user_time_limit > 0 && $user_time_check=='Yes' ){ ?>
				<p>You can view this page for <span class="timer_span"><?php echo $user_time_limit; ?></span> Sceonds</p>
			<?php } ?>
		</div>

		<div class="pdfviewpagewrapper">
			<?php if($user_time_check=='Yes' || current_user_can('administrator')){ 

				// echo do_shortcode('[prizmcloud key="K6082014070937" type="flash" document="'.$pdfurl.'" width="950" height="400" print="'.$printoption.'" color="CCCCCC"]');
			?>
			<iframe class="viewer" id="viewerBox" allowfullscreen="true" height="430" width="980" frameborder="0" src="http://connect.ajaxdocumentviewer.com/?key=K6082014070937&viewertype=flash&document=<?php echo $pdfurl; ?>&copyTextButton=no&saveButton=no&viewerheight=400&viewerwidth=950&showcontrols=Yes&printButton=Yes&toolbarColor=CCCCCC" allowtransparency="true"></iframe>
			<!-- <iframe class="viewer" id="viewerBox" allowfullscreen="true" height="500" width="960" frameborder="0" src="http://oz-dropship.com/pdfwork/wp-content/uploads/we-are-not-afraid-to-die.pdf" allowtransparency="true"></iframe> -->
			<?php } else{ ?>
			 <label>You are not allowed to view this PDF. Please contact with the Administrator. </label>
			<?php }?>
		</div>
		<!-- <iframe src="http://oz-dropship.com/" width="960" height="500"></iframe> -->
	</div>
	
</div>

<?php
//get_sidebar();
get_footer();

?>
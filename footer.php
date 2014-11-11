<?php 
/**
 * Default Footer
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 *
 */
 
// Gets all the scripts included by wordpress, wordpress plugins or functions.php 
// using wp_enqueue_script if it has $in_footer set to true
?>

		<!-- ==============================================
		FOOTER
		=============================================== -->	
		<footer id="main-footer">
		
			<div class="container text-center">
			
				<!--<img class="img-responsive img-center footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-black.png" alt="" />-->
			
				<ul class="social-links">
					<li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
					<li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
					<li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
					<li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
					<li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
				</ul>
				
				<p><?php echo date('Y'); ?> &copy; <?php echo get_bloginfo('title'); ?></p>
				
			</div>
			
		</footer>
	
		<?php wp_footer(); ?>
	</body>	
</html>
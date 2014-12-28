<?php
/**
 *
 *Template Name: Pricing
 *
 *
 * The template for displaying Pricing page
 *
 * This is the template that displays the pricing page. 
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

get_header(); ?>

<!-- ==============================================
PRICES
=============================================== -->
<section id="pricing" class="gray-bg padding-top-bottom">

	<div class="container">
	
		<h1 class="section-title">Our Prices</h1>
		<p class="section-description">We offer great plans. Find the one that suits your needs.</p>
		
		<div class="row pricing">
		
			<div class="col-lg-10 col-lg-offset-1">
			
				<div class="col-sm-4 text-center scrollimation fade-right">
				
					<div class="item">
					
						<p class="icon"><i class="fa fa-tablet fa-fw"></i></p>
						<h2>TODDLER</h2>
						<p class="price">$450</p>
						
						<p><b>5</b> Pages</p>
						<p><b>Template</b> Design</p>
						<p><b>Wordpress</b> CMS</p>
                  		<p><b>HTML5</b>  & <b>CSS3</b></p>
                  		<p><b>1</b> Month Support</p>
			
					</div><!-- End Pricing Item -->
					
				</div>
			
				<div class="col-sm-4 text-center scrollimation fade-in">
				
					<div class="item featured">
					
						<p class="icon"><i class="fa fa-laptop fa-fw"></i></p>
						<h2>JUNIOR</h2>
						<p class="price">$800</p>
	                  	<p><b>10</b> Pages</p>
	                  	<p><b>Custom</b> Design</p>
	                  	<p><b>Wordpress</b> CMS</p>
                  		<p><b>HTML5</b>  & <b>CSS3</b></p>
	                  	<p><b>3</b> Month Support</p>
						
					</div><!-- End Pricing Item -->
					
				</div>
				
				<div class="col-sm-4 text-center scrollimation fade-left">
				
					<div class="item">
					
						<p class="icon"><i class="fa fa-desktop fa-fw"></i></p>
						<h2>SENIOR</h2>
						<p class="price">$1800</p>
                  		<p><b>30</b> Pages</p>
                  		<p><b>Custom</b> Design</p>
                  		<p><b>Custom</b> CMS</p>
                  		<p><b>HTML5</b>  & <b>CSS3</b></p>
                  		<p><b>6</b> Month Support</p>
						
					</div><!-- End Pricing Item -->
					
				</div>
				
			</div>
			
		</div><!-- End row -->
	
	</div><!-- End container -->
	
</section>

<!-- ==============================================
CALL TO ACTION
=============================================== -->			
<section class="color-bg light-typo cta">

	<div class="container">
	
		<div class="row scrollimation fade-right">
			<div class="col-md-8 cta-message">
				<p>Sign up here to receive the latest news and updates from the <?php bloginfo( 'name' ); ?> conveniently via e-mail.</p>
			</div>
			<div class="col-md-4 cta-button">
				<div class="controls">
					<input id="email" name="email" placeholder="Enter Your Email" class="form-control" type="text" >
				</div>
			</div>
		</div><!--End row-->
		
	</div><!--End container -->
	
</section><!--End Call to Action -->

<?php
// Gets footer.php
get_footer();

?>
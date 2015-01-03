<?php
/**
 *
 *Template Name: About Personal
 *
 *
 * The template for displaying About page
 *
 * This is the template that displays the about page.
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

get_header(); ?>

<!-- ==============================================
ABOUT
=============================================== -->	
<section id="about" class="padding-top-bottom">

	<div class="container">
	
		<header class="section-heading text-center">
		
			<h1 class="scrollimation scale-in section-title">About Me</h1>
		
		</header>
		
		<div class="row">
		
			<div class="col-sm-8 col-sm-offset-2">
			
				<img class="img-responsive img-center img-circle scrollimation fade-left" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/member-1.jpg" alt="" />
		
				<p class="text-center scrollimation fade-in">I am Jonathan Doe, a twenty five year old designer from NY. I have graduated with a Bachelor degree of Graphic &amp; Web Design, from the University of Peiraias. I have a passion for creating challenging, intuitive and beautiful products. My design process is very hands-on and visual.<br/><br/>Creating is not just a job for me, it's a passion. </p>
			
			</div>
			
		</div>
		
		
		<p class="text-center padding-top-bottom"><a class="btn btn-default btn-lg" href="#contact"><i class="fa fa-arrow-down"></i>Hire Me</a></p>
		
	</div>

</section>


<?php
// Gets footer.php
get_footer();
?>
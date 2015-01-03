<?php
/**
 *
 *Template Name: About
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
<section id="about" class="dark-bg light-typo padding-top-bottom">

	<div class="container">
	
		<header class="section-header text-center">
		
			<h1 class="scrollimation scale-in">About Me</h1>
		
		</header>
		
		<div class="row">
		
			<div class="col-sm-8 col-sm-offset-2">
			
				<img class="img-responsive img-center img-circle scrollimation fade-left" src="assets/about.jpg" alt="" />
		
				<p class="text-center scrollimation fade-in">I am Jonathan Doe, a twenty five year old designer from NY. I have graduated with a Bachelor degree of Graphic &amp; Web Design, from the University of Peiraias. I have a passion for creating challenging, intuitive and beautiful products. My design process is very hands-on and visual.<br/><br/>Creating is not just a job for me, it's a passion. </p>
			
			</div>
			
		</div>
			
		
		
		<p class="text-center"><a class="btn btn-meflat scrollto white icon-left" href="#contact"><i class="fa fa-arrow-down"></i>Hire Me</a></p>
		
	</div>

</section>
<!-- ==============================================
SKILLS
=============================================== -->	
<section id="skills" class="white-bg">

	<div class="container">
	
		<div class="row skills">
			
			<h1 class="text-center scrollimation fade-in">I Got the Skills</h1>
			
			<div class="col-sm-6 col-md-3 text-center">
				<span class="chart" data-percent="80"><span class="percent">80</span></span>
				<h2 class="text-center">Web Design</h2>
			</div>
			<div class="col-sm-6 col-md-3 text-center">
				<span class="chart" data-percent="70"><span class="percent">70</span></span>
				<h2 class="text-center">HTML / CSS</h2>
			</div>
			<div class="col-sm-6 col-md-3 text-center">
				<span class="chart" data-percent="60"><span class="percent">60</span></span>
				<h2 class="text-center">Graphic Design</h2>
			</div>
			<div class="col-sm-6 col-md-3 text-center">
				<span class="chart" data-percent="90"><span class="percent">90</span></span>
				<h2 class="text-center">UI / UX</h2>
			</div>
			
		</div><!--End row -->
	
	</div>


</section>

<?php
// Gets footer.php
get_footer();
?>
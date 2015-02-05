<?php 
/**
 * front-page.php
 *
 * The template for displaying Home page.
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */


get_header(); ?>


<!-- ==============================================
SERVICES
=============================================== -->
<section id="services" class="white-bg padding-top-bottom">

	<div class="container">
		
		<h1 class="section-title">How I Get There</h1>
		<p class="section-description">I create awesome Websites and Mobile Apps, the perfect solution for your project.<br/> I don't make designs, I make magic!</p>
		
		<div class="row services">
		
			<div class="col-md-4 col-sm-6 item text-center scrollimation fade-right d1">
		
				<div class="icon"><i class="fa fa-mobile"></i></div>
				<h3>Passion</h3>
				<p>High-quality solution for those who want a beautiful website in no time. Full responsive and will adapt itself to any mobile device. iPad, iPhone, Android, it doesn't matter. Your content will always looks its absolute best..</p>
				
			</div>
			
			<div class="col-md-4 col-sm-6 item text-center scrollimation fade-right">
		
				<div class="icon"><i class="fa fa-pencil"></i></div>
				<h3>Creativity</h3>
				<p>Phasellus ac mi quam. Suspendisse eu erat venenatis, euismod tellus sollicitudin, egestas lacus.</p>
				
			</div>
			
			<div class="col-md-4 col-sm-6 item text-center scrollimation fade-left d1">
		
				<div class="icon"><i class="fa fa-code"></i></div>
				<h3>Quality</h3>
				<p>Phasellus ac mi quam. Suspendisse eu erat venenatis, euismod tellus sollicitudin, egestas lacus.</p>
				
			</div>
			
		</div>
		
	</div>
	
</section>


<!-- ==============================================
PORTFOLIO
=============================================== -->
<section id="portfolio" class="padding-top">
		
	<div class="container">
		<h1 class="section-title">Our Works</h1>	
	</div>

	<div class="container">
		<div class="row">
		<?php
			$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 4 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();	

	        $custom = get_post_custom($post->ID);  
		?>
			<div class="col-md-3 col-sm-6 margin-btm-40">
			    <div class="portfolio-sec">
			        <div class="portfolio-thumnail">
			            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wedesign-potifolio_thumb'); ?></a>
			        </div>
			        <div class="portfolio-desc text-center">
			            <h4 class="portfolio-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			            <span class="portfolio-post-cat"><?php echo get_the_term_list($post->ID, 'project-type', '', ', ',''); ?></span>
			            <h4><a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e( 'More detail', 'wedesign' ); ?></a></h4>
			        </div>
			    </div>
			</div>
		<?php endwhile; ?> 
		</div>
	</div><!-- End container --> 
	

</section>


<!-- ==============================================
CLIENTS
=============================================== -->
<section id="clients" class="color-bg">

	<div class="container">
		
		<div class="row clients">
		
			<div class="col-sm-6 col-md-3">
			
				<div class="client">
					<a href="#link"><img class="img-responsive img-center" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-logo-1.png" alt=""/></a>
				</div>
			
			</div>
		
			<div class="col-sm-6 col-md-3">
			
				<div class="client">
					<a href="#link"><img class="img-responsive img-center" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-logo-2.png" alt=""/></a>
				</div>
			
			</div>
			
			<div class="col-sm-6 col-md-3">
			
				<div class="client">
					<a href="#link"><img class="img-responsive img-center" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-logo-3.png" alt=""/></a>
				</div>
			
			</div>
			
			<div class="col-sm-6 col-md-3">
			
				<div class="client">
					<a href="#link"><img class="img-responsive img-center" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/client-logo-4.png" alt=""/></a>
				</div>
			
			</div>
			
		</div><!-- End row -->
	
	</div><!-- End container -->
	
</section>



<!-- ==============================================
TESTIMONIALS
=============================================== -->
<section id="testimonials" class="parallax-bg light-typo padding-top-bottom" data-parallax-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/man-bg.jpg" data-stellar-background-ratio=".5">

	<div class="container">
	
		<h1 class="section-title scrollimation fade-up">What people say</h1>
		
		<div class="row scrollimation fade-in">
		
			<div class="col-sm-10 col-sm-offset-1">
			
				<div id="testimonials-slider" class="flexslider">
				
					<ul class="slides">

						<?php
						$args = array( 'post_type' => 'testimonial', 'posts_per_page' => 4 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();	

				        $custom = get_post_custom($post->ID);
				        $company = $custom["company"][0];   

						?>



							<!--Single Testimonial-->
							<li>
								<div class="media">
									<div class="pull-left">
										<?php the_post_thumbnail('thumbnail', array('class' => 'client-img img-circle')); ?>
									</div>
									
									<div class="media-body">
										<p class="testimonial"><?php the_content(); ?></p>
										<p class="client"><?php the_title(); ?><?php if($company != "")  print " / <span> $company </span>"; ?></p>
									</div>
								</div>
							</li><!--End Single Testimonial-->

						<?php endwhile; ?>	

					</ul>
					
				</div><!-- End slider -->
				
			</div><!-- End col -->
			
		</div><!-- End row -->
		
	</div><!-- End container -->
	
</section>


<?php get_footer(); ?>
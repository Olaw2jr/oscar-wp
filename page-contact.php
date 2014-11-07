<?php
/**
 *
 *Template Name: Contact
 *
 *
 * The template for displaying Contact page
 *
 * This is the template that displays the contact page. 
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

get_header(); ?>

<!-- ==============================================
		CONTACT
		=============================================== -->
		<section id="contact" class="padding-top">
		
			<div class="container text-center">
				
				<div class="row">

				<h1 class="section-title"><?php the_title(); ?></h1>
				
					<div class="col-sm-6 col-md-5 text-right scrollimation fade-up d1">
						<?php if(have_posts()): while(have_posts()): the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>

					</div>
				
					<!--=== Contact Form ===-->

					<form id="contact-form" class="col-sm-6 col-md-offset-1 scrollimation fade-left d3" action="contact.php" method="post" novalidate>
						
						<div class="form-group">
						  <label class="control-label" for="contact-name">Name</label>
						  <div class="controls">
							<input id="contact-name" name="contactName" placeholder="Your name" class="form-control requiredField" data-new-placeholder="Your name" type="text" data-error-empty="Please enter your name">
							
						  </div>
						</div><!-- End name input -->
						
						<div class="form-group">
						  <label class="control-label" for="contact-mail">Email</label>
						  <div class=" controls">
							<input id="contact-mail" name="email" placeholder="Your email" class="form-control requiredField" data-new-placeholder="Your email" type="email" data-error-empty="Please enter your email" data-error-invalid="Invalid email address">
							
						  </div>
						</div><!-- End email input -->
						
						<div class="form-group">
						  <label class="control-label" for="contact-message">Message</label>
							<div class="controls">
								<textarea id="contact-message" name="comments"  placeholder="Your message" class="form-control requiredField" data-new-placeholder="Your message" rows="6" data-error-empty="Please enter your message"></textarea>
								
							</div>
						</div><!-- End textarea -->
						
						<p><button name="submit" type="submit" class="btn btn-default btn-lg" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent"><i class="fa fa-paper-plane"></i>Send Message</button></p>
						<input type="hidden" name="submitted" id="submitted" value="true" />
						
					</form><!-- End contact-form -->
					
				</div>
				
			</div>
		
		</section>

<?php
// Gets footer.php
get_footer();

?>
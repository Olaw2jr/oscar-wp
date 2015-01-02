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
?>

<?php
	$errors = array();
	$isError = false;

	$errorName = __( 'Please enter your name.', 'wedesign' );
	$errorEmail = __( 'Please enter a valid email address.', 'wedesign' );
	$errorMessage = __( 'Please enter the message.', 'wedesign' );

	// Get the posted variables and validate them.
	if ( isset( $_POST['is-submitted'] ) ) {
		$name    = $_POST['cName'];
		$email   = $_POST['cEmail'];
		$message = $_POST['cMessage'];

		// Check the name
		if ( ! wedesign_validate_length( $name, 2 ) ) {
			$isError             = true;
			$errors['errorName'] = $errorName;
		}

		// Check the email
		if ( ! is_email( $email ) ) {
			$isError              = true;
			$errors['errorEmail'] = $errorEmail;
		}

		// Check the message
		if ( ! wedesign_validate_length( $message, 2 ) ) {
			$isError                = true;
			$errors['errorMessage'] = $errorMessage;
		}

		// If there's no error, send email
		if ( ! $isError ) {
			// Get admin email
			$emailReceiver = get_option( 'admin_email' );

			$emailSubject = sprintf( __( 'You have been contacted by %s', 'wedesign' ), $name );
			$emailBody    = sprintf( __( 'You have been contacted by %1$s. Their message is:', 'wedesign' ), $name ) . PHP_EOL . PHP_EOL;
			$emailBody    .= $message . PHP_EOL . PHP_EOL;
			$emailBody    .= sprintf( __( 'You can contact %1$s via email at %2$s', 'wedesign' ), $name, $email );
			$emailBody    .= PHP_EOL . PHP_EOL;
			
			$emailHeaders[] = "Reply-To: $email" . PHP_EOL;
			
			$emailIsSent = wp_mail( $emailReceiver, $emailSubject, $emailBody, $emailHeaders );
		}
	}
?>

<?php get_header(); ?>

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

					<div class="col-sm-6 col-md-offset-1 scrollimation fade-left d3">
						<?php if ( isset( $emailIsSent ) && $emailIsSent ) : ?>
							<div class="alert alert-success">
								<?php _e( 'Your message has been sucessfully sent, thank you!', 'wedesign' ); ?>
							</div> <!-- end alert -->
						<?php else : ?>

						<?php the_content(); ?>

						<?php if ( isset( $isError ) && $isError ) : ?>
							<div class="alert-alert-danger">
								<?php _e( 'Sorry, it seems there was an error.', 'wedesign' ); ?>
							</div> <!-- end alert -->
						<?php endif; ?>
						<?php endif; ?>


						<!--=== Contact Form ===-->
						<form action="<?php the_permalink(); ?>" id="contact-form" method="POST" role="form">
							
							<div class="form-group <?php if ( isset( $errors['errorName'] ) ) echo "has-error"; ?>">
							  <label class="control-label" for="contact-name"><?php _e( 'Name', 'wedesign' ); ?></label>
							  <div class="controls">
								<input type="text" class="form-control" name="cName" placeholder="Your name" id="contact-name" value="<?php if ( isset( $_POST['cName'] ) ) { echo $_POST['cName']; } ?>">
								<?php if ( isset( $errors['errorName'] ) ) : ?>
									<p class="help-block"><?php echo $errors['errorName']; ?></p>
								<?php endif; ?>
							  </div>
							</div><!-- End name input -->
							
							<div class="form-group <?php if ( isset( $errors['errorEmail'] ) ) echo "has-error"; ?>">
							  <label class="control-label" for="contact-mail"><?php _e( 'Email Address', 'wedesign' ); ?></label>
							  <div class=" controls">
								<input type="text" class="form-control" placeholder="Your email" name="cEmail" id="contact-email" value="<?php if ( isset( $_POST['cEmail'] ) ) { echo $_POST['cEmail']; } ?>">
								<?php if ( isset( $errors['errorEmail'] ) ) : ?>
									<p class="help-block"><?php echo $errors['errorEmail']; ?></p>
								<?php endif; ?>
							  </div>
							</div><!-- End email input -->
							
							<div class="form-group <?php if ( isset( $errors['errorMessage'] ) ) echo "has-error"; ?>">
							  	<label class="control-label" for="contact-message"><?php _e( 'Message', 'wedesign' ); ?></label>
								<div class="controls">
									<textarea name="cMessage" class="form-control" placeholder="Your message" id="contact-message" cols="30" rows="10"><?php if ( isset( $_POST['cMessage'] ) ) { echo $_POST['cMessage']; } ?></textarea>
									<?php if ( isset( $errors['errorMessage'] ) ) : ?>
										<p class="help-block"><?php echo $errors['errorMessage']; ?></p>
									<?php endif; ?>
								</div>
							</div><!-- End textarea -->

							<input type="hidden" name="is-submitted" id="is-submitted" value="true">
							<p><button type="submit" class="btn btn-default btn-lg"><i class="fa fa-paper-plane"></i><?php _e( 'Send Message', 'wedesign' ); ?></button></p>
							
						</form><!-- End contact-form -->
					</div>
					
				</div>
				
			</div>
		
		</section>

<?php
// Gets footer.php
get_footer();
?>
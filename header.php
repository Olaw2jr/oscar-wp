<?php 
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */ ?>

<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

	<head>

		<!-- Title and Meta Tags -->
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Favicons -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico">
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon-114x114.png">
		
		
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300' rel='stylesheet' type='text/css'>
		
		<!-- JS -->
			
		<!--[if lt IE 9]>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/libs/modernizr.min.js"></script>
		
		<?php wp_head(); ?>
	</head>
  
	<body <?php body_class(); ?> data-spy="scroll" data-target="#main-nav" data-offset="400">

	<!-- PAGE PRELOADER -->
	<div id="page-loader"><span class="page-loader-gif">Inapakua...</span></div>

	<?php if ( is_front_page() ):

			echo '	<!-- HEADER -->
					<header id="home" class="parallax-bg" data-parallax-background="'. get_stylesheet_directory_uri() .'/assets/images/header-bg.jpg" data-stellar-background-ratio=".3">
						
						<div class="header-content">
							
							<img class="header-logo" src="'.get_stylesheet_directory_uri() .'/assets/images/logos.png" alt=""/>
						
							<!--<div class="flexslider header-slider">
							
								<ul class="slides">
								
									<li><h1 class="bordered-text">Welcome to <span class="primary">Quattro</span> Studio</h1></li>
									<li><h1 class="bordered-text">I am <span class="primary">Young</span></h1></li>
									<li><h1 class="bordered-text">I am <span class="primary">Passionate</span></h1></li>
									<li><h1 class="bordered-text">I have <span class="primary">Fresh</span> Ideas</h1></li>
									
								</ul>
								
							</div>End home-slider -->
								
							<a class="scroll-button scrollto" href="#services"><i class="fa fa-angle-down"></i></a>	
								
						</div>
						
					</header><!--End header -->';

	endif; ?>

	<!-- ==============================================
MAIN NAV
=============================================== -->

<div id="main-nav" class="navbar">
	<div class="container">
	
		<div class="navbar-header">
		
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
			</button>
			
			<!-- ======= LOGO ========-->
			<a class="navbar-brand" href="<?php echo home_url(); ?>">
				
				<img class="site-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-small.png" alt="<?php bloginfo('name'); ?>-logo" />
			</a>
			
		</div>
		
		<?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'navbar-collapse collapse',
                'container_id'      => 'site-nav',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?><!--End navbar-collapse -->
		
	</div><!--End container -->
	
</div><!--End main-nav -->
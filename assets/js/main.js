jQuery(document).ready(function() {
	
	/*============================================
	Page Preloader
	==============================================*/
	
	jQuery(window).load(function(){
		jQuery('#page-loader').fadeOut(500);
	});	
	
	/*============================================
	Parallax Backgrounds
	==============================================*/
	jQuery('.parallax-bg').each(function(){
		var bg = jQuery(this).data('parallax-background');
		jQuery(this).css({'background-image':'url('+bg+')'});
		
	});
	
	if((!Modernizr.touch) && ( jQuery(window).width() > 1024) ){
		jQuery(window).stellar({
			horizontalScrolling: false,
			responsive:true
		});
	}
	/*============================================
	Header
	==============================================*/
	
	jQuery('.header-slider').flexslider({
		animation: "fade",
		directionNav: false,
		controlNav: false,
		slideshowSpeed: 3000,
		animationSpeed: 400,
		pauseOnHover:false,
		pauseOnAction:false,
		smoothHeight: false,
		slideshow:false
	});
	
	jQuery(window).load(function(){
		jQuery('.header-slider').flexslider('play');
	});
	
	/*============================================
	ScrollTo Links
	==============================================*/
	jQuery('a.scrollto').click(function(e){
		jQuery('html,body').scrollTo(this.hash, this.hash, {animation:  {easing: 'easeInOutCubic', duration: 1000}});
		e.preventDefault();

		if (jQuery('.navbar-collapse').hasClass('in')){
			jQuery('.navbar-collapse').removeClass('in').addClass('collapse');
		}
	});
	
	jQuery('#main-nav').waypoint('sticky');
	
	
	/*============================================
	Counters
	==============================================*/
	jQuery('.counters').waypoint(function(){
		jQuery('.counter').each(count);
	},{offset:'100%'});
	
	function count(options) {
		var $this = jQuery(this);
		options = jQuery.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}

	
	/*============================================
	Filter Projects
	==============================================*/
	jQuery('#filter-works a').click(function(e){
		e.preventDefault();
		
		jQuery('#filter-works li').removeClass('active');
		jQuery(this).parent('li').addClass('active');

		scrollSpyRefresh();
		waypointsRefresh();
		stellarRefresh();
	});

	jQuery(window).load(function(){
		// cache container
		var $container = jQuery('#container');
		// initialize isotope
		$container.isotope({
		  // options...
		  itemSelector : '.project-item',
		  layoutMode : 'fitRows'
		});

		// filter items when filter link is clicked
		jQuery('#filters a').click(function(){
		  var selector = jQuery(this).attr('data-filter');
		  $container.isotope({ filter: selector });
		  return false;
		});
	});
	
		
	/*============================================
	Testimonials Slider
	==============================================*/
	
		jQuery('#testimonials-slider').flexslider({
			prevText: '<i class="fa fa-angle-left"></i>',
			nextText: '<i class="fa fa-angle-right"></i>',
			animation: 'fade',
			slideshowSpeed: 5000,
			animationSpeed: 400,
			useCSS: true,
			directionNav: false, 
			pauseOnAction: false, 
			pauseOnHover: true,
			smoothHeight: false
		});
		
	/*============================================
	Tooltips
	==============================================*/
	jQuery("[data-toggle='tooltip']").tooltip();
	
	/*============================================
	Placeholder Detection
	==============================================*/
	if (!Modernizr.input.placeholder) {
		jQuery('#contact-form').addClass('no-placeholder');
	}

	/*============================================
	Scrolling Animations
	==============================================*/
	jQuery('.scrollimation').waypoint(function(){
		jQuery(this).addClass('in');
	},{offset:'80%'});

	
	/*============================================
	Refresh scrollSpy function
	==============================================*/
	function scrollSpyRefresh(){
		setTimeout(function(){
			jQuery('body').scrollspy('refresh');
		},1000);
		
	}

	/*============================================
	Refresh waypoints function
	==============================================*/
	function waypointsRefresh(){
		setTimeout(function(){
			jQuery.waypoints('refresh');
		},1000);
	}

	/*============================================
	Refresh Parallax Backgrounds
	==============================================*/
	function stellarRefresh(){
		setTimeout(function(){
			jQuery(window).stellar('refresh');
		},1000);
	}

	/*============================================
	Add active class to bootstrap carousel
	==============================================*/
	jQuery(function($){
	$( '#carousel .item:first-child' ).addClass( 'active' );
	$( '.carousel' ).carousel();
});

});	
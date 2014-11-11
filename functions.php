<?php 
/**
 * functions.php
 *
 * The theme's functions and definitions.
 */

/**
 * ----------------------------------------------------------------------------------------
 * 1.0 - Define constants.
 * ----------------------------------------------------------------------------------------
 */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/assets/js' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );


/**
 * ----------------------------------------------------------------------------------------
 * 2.0 - Load the framework.
 * ----------------------------------------------------------------------------------------
 */
require_once( FRAMEWORK . '/init.php' );


/**
 * ----------------------------------------------------------------------------------------
 * 3.0 - Set up the content width value based on the theme's design.
 * ----------------------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) ) {
	$content_width = 840;
}


/**
 * ----------------------------------------------------------------------------------------
 * 4.0 - Set up theme default and register various supported features.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'wedesign_setup' ) ) {
	function wedesign_setup() {
		/**
		 * Make the theme available for translation.
		 */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'wedesign', $lang_dir );

		/**
		 * Add support for post formats.
		 */
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			)
		);

		/**
		 * Add support for automatic feed links.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Add support for post thumbnails.
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 778, 532, true );
		add_image_size( 'wedesign-related', 334, 229, true );
		add_image_size( 'wedesign-popular', 204, 140, true );
		add_image_size( 'wedesign-potifolio_thumb', 555, 317, true );
		add_image_size( 'wedesign-portifolio', 750, 500, true );

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'wedesign' ),
			)
		);
	}

	add_action( 'after_setup_theme', 'wedesign_setup' );
}


/**
 * ----------------------------------------------------------------------------------------
 * 5.0 - Display meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'wedesign_post_meta' ) ) {
	function wedesign_post_meta() {
		echo '<ul class="meta">';

		if ( get_post_type() === 'post' ) {
			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'wedesign' ) . ' </li>';
			}

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>';
			}

			// Comments link.
			if ( comments_open() ) :
				echo '<li class="comments">';
				comments_popup_link( __( 'Leave a comment', 'wedesign' ), __( 'One comment so far', 'wedesign' ), __( 'View all % comments', 'wedesign' ) );
				echo '</li>';
			endif;

			
			//getPostLikeLink();


			// Edit link.
			if ( is_user_logged_in() ) {
				echo '<li class="">';
				edit_post_link( __( 'Edit', 'wedesign' ), '<span class="meta-edit">', '</span>' );
				echo '</li>';
			}
		}
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'wedesign_paging_nav' ) ) {
	function wedesign_paging_nav($before = '', $after = '') {
		global $wpdb, $wp_query;
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		if ( $numposts <= $posts_per_page ) { return; }
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = 7;
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
			
		echo $before.'<ul class="pagination">'."";
		if ($paged > 1) {
			$first_page_text = "&laquo";
			echo '<li class="prev"><a href="'.get_pagenum_link().'" title="First">'.$first_page_text.'</a></li>';
		}
			
		$prevposts = get_previous_posts_link('&larr; Previous');
		if($prevposts) { echo '<li>' . $prevposts  . '</li>'; }
		else { echo '<li class="disabled"><a href="#">&larr; Previous</a></li>'; }
		
		for($i = $start_page; $i  <= $end_page; $i++) {
			if($i == $paged) {
				echo '<li class="active"><a href="#">'.$i.'</a></li>';
			} else {
				echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
			}
		}
		echo '<li class="">';
		next_posts_link('Next &rarr;');
		echo '</li>';
		if ($end_page < $max_page) {
			$last_page_text = "&raquo;";
			echo '<li class="next"><a href="'.get_pagenum_link($max_page).'" title="Last">'.$last_page_text.'</a></li>';
		}
		echo '</ul>'.$after."";
	}
}


/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - Register the widget areas.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'wedesign_widget_init' ) ) {
	function wedesign_widget_init() {
		if ( function_exists( 'register_sidebar' ) ) {
			register_sidebar(
				array(
					'name' => __( 'Main Widget Area', 'wedesign' ),
					'id' => 'sidebar-1',
					'description' => __( 'Appears on posts and pages.', 'wedesign' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);

			register_sidebar(
				array(
					'name' => __( 'Footer Widget Area', 'wedesign' ),
					'id' => 'sidebar-2',
					'description' => __( 'Appears on the footer.', 'wedesign' ),
					'before_widget' => '<div id="%1$s" class="widget col-sm-3 %2$s">',
					'after_widget' => '</div> <!-- end widget -->',
					'before_title' => '<h5 class="widget-title">',
					'after_title' => '</h5>',
				)
			);
		}
	}

	add_action( 'widgets_init', 'wedesign_widget_init' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 8.0 - Function that validates a field's length.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'wedesign_validate_length' ) ) {
	function wedesign_validate_length( $fieldValue, $minLength ) {
		// First, remove trailing and leading whitespace
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}



/**
 * ----------------------------------------------------------------------------------------
 * 9.0 - Load the custom scripts for the theme.
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'wedesign_scripts' ) ) {
	function wedesign_scripts() {
		// Adds support for pages with threaded comments
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Register scripts
		wp_register_script( 'bootstrap-js', SCRIPTS . '/libs/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'wedesign-custom', SCRIPTS . '/main.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-easing', SCRIPTS .'/jquery.easing.1.3.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-scrollto', SCRIPTS .'/jquery.scrollto.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-flexslider', SCRIPTS .'/jquery.flexslider.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-stella', SCRIPTS .'/jquery.stellar.js', array( 'jquery' ), false, true );
		wp_register_script( 'waypoints', SCRIPTS .'/waypoints.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'waypoints-sticky', SCRIPTS .'/waypoints-sticky.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-isotope', SCRIPTS .'/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'jquery-countTo', SCRIPTS .'/jquery.countTo.js', array( 'jquery' ), false, true );
		wp_register_script( 'prism-js', SCRIPTS .'/prism.js', array( 'jquery' ), false, true );
		wp_register_script( 'contact', SCRIPTS .'/contact.js', array( 'jquery' ), false, true );

		// Load the custom scripts
		wp_enqueue_script( 'bootstrap-js' );
		wp_enqueue_script( 'wedesign-custom' );
		wp_enqueue_script('jquery-isotope');
	
		wp_enqueue_script('jquery-easing');
		wp_enqueue_script('jquery-scrollto');
		wp_enqueue_script('jquery-flexslider');
		wp_enqueue_script('jquery-stella');
		wp_enqueue_script('waypoints');
		wp_enqueue_script('waypoints-sticky');
		wp_enqueue_script('jquery-countTo');
		wp_enqueue_script('prism-js');
		wp_enqueue_script('contact');

		// Register style
		wp_register_style( 'bootstrap-css', THEMEROOT . '/assets/css/bootstrap.min.css');
		wp_register_style( 'font-awesome', THEMEROOT . '/assets/css/font-awesome.min.css');
		wp_register_style( 'prism-css', THEMEROOT . '/assets/css/prism.css');

		// Load the stylesheets
		wp_enqueue_style( 'bootstrap-css' );
		wp_enqueue_style( 'font-awesome' );
		wp_enqueue_style( 'prism-css' );
		wp_enqueue_style( 'wedesign-master', THEMEROOT . '/assets/css/style.css' );
		wp_enqueue_style( 'wedesign-master', THEMEROOT . '/assets/css/flexslider.css' );
	}

	add_action( 'wp_enqueue_scripts', 'wedesign_scripts' );
}

/**
 * ----------------------------------------------------------------------------------------
 * 10.0 - Register Custom Navigation Walker
 * ----------------------------------------------------------------------------------------
 */
require_once('wp_bootstrap_navwalker.php');

/**
 * ----------------------------------------------------------------------------------------
 * 11.0 - Register Custom Post Type
 * ----------------------------------------------------------------------------------------
 */
require_once('portfolio-type.php');

/**
 * ----------------------------------------------------------------------------------------
 * 12.0 - Adds Comment layout
 * ----------------------------------------------------------------------------------------
 */
function wedesign_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
            <div class="avatar icon-overlay icn-link">
                <a href="#"><?php echo get_avatar( $comment, $size='75' ); ?></a>
            </div><!-- /.avatar -->
            
            <div class="commentbody">
                
                <div class="author">
                    <?php printf('<h3>%s</h3>', get_comment_author_link()) ?>
                    <div class="meta">
                        <span class="date"><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
                    </div><!-- /.meta -->
                </div><!-- /.author -->
                
                <div class="message">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <div class="alert-message success">
                        	<p><?php _e('Your comment is awaiting moderation.','wedesign') ?></p>
                        </div>
                    <?php endif; ?>
                    
                    <?php comment_text() ?>
                    
                    <ul class="meta">
                        <li class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></li>
                        <?php edit_comment_link(__('Edit','wedesign'),'<i class="fa fa-pencil-square-o"></i>') ?>
                        <li class="votes">24</li>
                        <li class="upvote"><a href="#"><i class="icon-thumbs-up"></i></a></li>
                        <li class="downvote"><a href="#"><i class="icon-thumbs-down"></i></a></li>
                    </ul><!-- /.meta -->
                </div><!-- /.message -->
                
            </div><!-- /.commentbody -->
    <!-- </li> is added by wordpress automatically -->
<?php
} // don't remove this bracket!

// Display trackbacks/pings callback function
function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
        <li id="comment-<?php comment_ID(); ?>"><i class="icon icon-share-alt"></i>&nbsp;<?php comment_author_link(); ?>
<?php 
}



/**
 * ----------------------------------------------------------------------------------------
 * 13.0 - Replaces the excerpt "more" text by a link
 * ----------------------------------------------------------------------------------------
 */
  function new_excerpt_more($more) {
    global $post;
    return '<br><a class="btn btn-default pull-right" href="'. get_permalink($post->ID) . '">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>';

  }
  add_filter('excerpt_more', 'new_excerpt_more');

/**
 * ------------------------------------------------------------------------------------------
 * 14.0 - Adds more author flieds in the back end.
 *-------------------------------------------------------------------------------------------
 */
function change_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    $contactmethods['position'] = 'Position';
    $contactmethods['twitter_profile'] = 'Twitter';
    $contactmethods['facebook_profile'] = 'Facebook';
    $contactmethods['linkedin_profile'] = 'Linked In';
    $contactmethods['google_profile'] = 'Google +';
    return $contactmethods;
}

add_filter('user_contactmethods','change_contact_info',10,1);

 
/**
 *----------------------------------------------------------------------------------------------
 *  15.0 - Provides a standard format for the page title depending on the view. This is
 * 			filtered so that plugins can provide alternative title formats.
 *----------------------------------------------------------------------------------------------
 */
function wedesign_wp_title( $title, $sep ) {
	global $paged, $page;
 
	if ( is_feed() ) {
		return $title;
	} // end if
 
	// Add the site name.
	$title .= get_bloginfo( 'name' );
 
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	} // end if
 
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = sprintf( __( 'Page %s', 'mayer' ), max( $paged, $page ) ) . " $sep $title";
	} // end if
 
	return $title;
 
} // end wedesign_wp_title
add_filter( 'wp_title', 'wedesign_wp_title', 10, 2 );


?>
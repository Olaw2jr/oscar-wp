<?php 
/**
 * content-audio.php
 *
 * The default template for displaying posts with the Audio post format.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="date-wrapper">
        <div class="date">
            <span class="day">05</span>
            <span class="month">May</span>
        </div><!-- /.date -->
    </div><!-- /.date-wrapper -->
    
    <div class="format-wrapper">
        <a href="#" data-filter=".format-audio"><i class="fa fa-headphones"></i></a>
    </div><!-- /.format-wrapper -->
    
    <div class="post-content">
        
        <div class="post-media">
            <?php the_post_thumbnail(); ?>
        </div><!-- /.post-media -->
        
        <?php
        // If single page, display the post Author
         if(is_single()): ?>
          <p class="author">
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" data-toggle="tooltip" data-placement="right" title="Post author"><?php the_author(); ?></a>
          </p> 
        <?php endif; ?>

        <?php
        // If single page, display the title
        // Else, we display the title in a link
        if ( is_single() ) : ?>
            <h1><?php the_title(); ?></h1>
        <?php else : ?>
            <h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
        <?php endif; ?>

        <?php 
            // Display the meta information
            wedesign_post_meta();
        ?>
        
        <?php
            if ( is_single() ) {
                the_content();

                wp_link_pages();
            } else {
                the_excerpt();
            }
        ?>
        
    </div><!-- /.post-content --> 
    
</div><!-- /.post -->
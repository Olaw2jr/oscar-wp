<?php 
/**
 * content-quote.php
 *
 * The default template for displaying posts with the Quote post format.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="date-wrapper">
        <div class="date">
            <span class="day">21</span>
            <span class="month">May</span>
        </div><!-- /.date -->
    </div><!-- /.date-wrapper -->
    
    <div class="format-wrapper">
        <a href="#" data-filter=".format-quote"><i class="fa fa-quote-right"></i></a>
    </div><!-- /.format-wrapper -->
    
    <div class="post-content">
        <blockquote>
            <?php the_content(); ?>
            <footer><cite><?php the_title(); ?></cite></footer>
        </blockquote>
    </div><!-- /.post-content --> 
    
</div><!-- /.post -->
<?php 
/**
 * content-link.php
 *
 * The default template for displaying posts with the Link post format.
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="date-wrapper">
        <div class="date">
            <span class="day">01</span>
            <span class="month">May</span>
        </div><!-- /.date -->
    </div><!-- /.date-wrapper -->
    
    <div class="format-wrapper">
        <a href="#" data-filter=".format-link"><i class="fa fa-external-link"></i></a>
    </div><!-- /.format-wrapper -->
    
    <div class="post-content">
        <h1 class="post-title">
            <a href="<?php echo get_the_content(); ?>"><?php the_title(); ?></a>
        </h1>
        <p><a href="<?php echo get_the_content(); ?>" target="_blank"><?php echo get_the_content(); ?></a></p>
    </div><!-- /.post-content --> 
    
</div><!-- /.post --> 

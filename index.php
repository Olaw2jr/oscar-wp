<?php
    /**
     * The main template file.
     *Template Name: Main page
     *
     * This is the most generic template file in a WordPress theme and one of the
     * two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * For example, it puts together the home page when no home.php file exists.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     *
     * @package WordPress
     * @subpackage WeDesign
     * @since wedesign 1.0
     */

// Gets header.php
get_header(); ?>

<!-- SECTION  BLOG  -->
            
<section id="blog" class="light-bg">
    <div class="container inner-top-sm inner-bottom classic-blog no-sidebar">

        <h1 class="section-title">Our Blog</h1>
                    
        <div class="row">
            <div class="col-md-9 center-block">
                
                <div class="posts sidemeta">
                    
                    <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
                   
                </div><!-- /.posts -->
                
                <?php wedesign_paging_nav(); ?><!-- /.pagination --> 
                
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
                
            </div><!-- /.col -->
        </div><!-- /.row -->
                        
    </div><!-- /.container -->
</section>

<!-- SECTION  BLOG : END  -->

<?php
// Gets footer.php
get_footer();
?>
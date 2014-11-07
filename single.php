<?php
/**
 * The template for displaying all single posts
 *
 *
 *
 * @package WordPress
 * @subpackage WpStrap
 * @since wpstrap 1.0
 */

get_header(); ?>

<!--  SECTION  BLOG POST  -->
            
    <section id="blog-post" class="light-bg">
        <div class="container inner-top-sm inner-bottom classic-blog no-sidebar">
            <div class="row">
                <div class="col-md-9 center-block">
                    <div class="sidemeta">
                        
                        <?php while( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php endwhile; ?>

                        <?php 
                        // If we have a single page and the author bio exists, display it
                        if ( get_the_author_meta( 'description' ) ) : ?>

                        <div class="post-author">
                            <figure>
                                
                                <div class="author-image icon-overlay icn-link">
                                    <a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?></a>
                                </div>
                                
                                <figcaption class="author-details">
                                    <h3>About the author</h3>
                                    <p><?php the_author_posts_link(); ?> <?php the_author_meta( 'description' ); ?>.</p>
                                    <ul class="meta">
                                        <li class="author-posts"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">All posts by <?php the_author_meta('first_name'); ?></a></li>
                                        <!--<li class="url"><a href="<?php the_author_meta( 'website' ); ?>">author's-website.com</a></li>-->
                                    </ul><!-- /.meta -->
                                    <ul class="social">
                                        <?php 
                                            $facebook_profile = get_the_author_meta( 'facebook_profile' );
                                              if ( $facebook_profile ) {
                                                echo '<li><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook fa-fw"></i></a></li>';
                                                }
                                            $twitter_profile = get_the_author_meta( 'twitter_profile' );
                                              if ( $twitter_profile ) {
                                                echo '<li><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter fa-fw"></i></a></li>';
                                                }
                                            $google_profile = get_the_author_meta( 'google_profile' );
                                                if ( $google_profile ) {
                                                    echo '<li><a href="' . esc_url( $google_profile ) . '" rel="me"><i class="fa fa-google-plus fa-fw"></i></a></li>';
                                                }
                                            $linkedin_profile = get_the_author_meta( 'linkedin_profile' );
                                              if ( $linkedin_profile ) {
                                                echo '<li><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin fa-fw"></i></a></li>';
                                                }                                           
                                        ?>
                                    </ul><!-- /.social -->
                                </figcaption>
                                
                            </figure>
                        </div><!-- /.post-author -->
                        <?php endif; ?>
                        
                        <?php 
                        // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) {
                                comments_template();
                            }
                        ?>
                    
                    </div><!-- /.sidemeta -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
            
<!-- SECTION  BLOG POST : END  -->


<?php
// Gets footer.php
get_footer(); ?>
<?php
/**
 *
 *Template Name: Portifolio
 *
 *
 * The template for displaying Portifolio page
 *
 * This is the template that displays the portifolio page.
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

query_posts('post_type=portfolio&posts_per_page=8');

get_header(); 
?>

<!-- PORTFOLIO -->
<section id="portfolio" class="padding-top">

	<div class="container">
		
		<h1 class="section-title"><?php the_title(); ?></h1>
        <!-- <p class="section-description">Building upon years of experience, weve developed a loyal client base ranging from large market corporations to small start-ups.</p> -->
		
		<!--==== Portfolio Filters ====-->
		<div id="filter-works">
			<?php
                $terms = get_terms("project-type");
                $count = count($terms);
                echo '<ul>';
                echo '<li class="active scrollimation fade-right d1"><a href="#" data-filter="*">All</a></li>';
                if ( $count > 0 ){
                        
                    foreach ( $terms as $term ) {
                                
                        $termname = strtolower($term->name);
                        $termname = str_replace(' ', '-', $termname);
                        echo '<li class="scrollimation fade-right"><a href="#" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                    }
                }
                echo "</ul>";
            ?>
		</div><!--End portfolio filters -->
		
		<div id="projects-container" class="row">
        <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

            <?php
                $terms = get_the_terms( $post->ID, 'project-type' );
                                
                if ( $terms && ! is_wp_error( $terms ) ) : 
                    $links = array();

                foreach ( $terms as $term ) 
                    {
                        $links[] = $term->name;
                    }
                        $links = str_replace(' ', '-', $links); 
                        $tax = join( " ", $links );     
                else :  
                        $tax = '';  
                endif;
            ?>

            <div class="project-item col-md-4 col-sm-6 margin-btm-40  <?php echo strtolower($tax); ?>">
                <div class="portfolio-sec">
                    <div class="portfolio-thumnail">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('wedesign-potifolio_thumb'); ?></a>
                    </div>
                    <div class="portfolio-desc text-center">
                        <h4 class="portfolio-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <span class="portfolio-post-cat"><?php echo get_the_term_list($post->ID, 'project-type', '', ', ',''); ?></span>
                        <h4><a href="<?php the_permalink(); ?>" class="btn btn-default"><?php _e( 'More detail', 'wedesign' ); ?></a></h4>
                    </div>
                </div>
            </div>

        <?php endwhile; else: ?>
            <?php get_template_part( 'content', 'none' ); ?>
        <?php endif; ?>
            
        </div><!--row-->


        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <?php wedesign_paging_nav(); ?><!-- /.pagination -->
            </div>
        </div>
        <!-- /.row --> 
	

</section>

<?php
// Gets footer.php
get_footer();

?>
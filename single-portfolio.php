<?php
/**
 *
 *Template Name: Single Portifolio
 *
 *
 * The template for displaying Single Portifolio page
 *
 * This is the template that displays the single portifolio page.
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

get_header(); ?>

<section id="portfolio" class="padding-top">

    <div class="container">

    <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
    
      <?php 
        $custom = get_post_custom($post->ID);
            $link = $custom["projLink"][0];  
            $client = $custom["client"][0]; 

                if ($link != "" || $link != "http://"){
                $link= "<a type='button' class='btn btn-default' href=\"http://$link\"><i class='fa fa-globe'></i>  VISIT THE PROJECT</a>";
            }else{
                $link= "";
            }
      ?>

        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-title"><?php the_title(); ?></h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div class="device-mockup macbook">
                    <div class="device ">
                        <div class="screen">
                            <?php the_post_thumbnail('oscah-portifolio'); ?>
                        </div>
                    </div>
                </div>     
            </div>

            <div class="col-md-4">
              
                <?php the_content( ); ?>
                <h3>Project Details</h3>
                <ul class="list-unstyled">
                    <li><i class="fa fa-calendar"></i>   <?php the_time('F d, Y'); ?></li>
                    <li><i class="fa fa-tags"></i>
                        <?php
                            $terms_as_text = get_the_term_list($post->ID, 'project-type', '', ', ','');
                            echo strip_tags($terms_as_text);
                        ?> 
                    </li>

                    <?php if($client != "")  print "<li><i class='fa fa-user'></i>   $client</li>"; ?>
                </ul>

                <?php if($link != "") print " $link"; ?>
            </div>

        </div>
        <!-- /.row -->

    <?php endwhile; else: ?>
      <p><?php _e('No posts were found. Sorry!', 'wedesign' ); ?></p>
    <?php endif; ?>

        <!-- Related Projects Row -->
        <div class="row">

            <!-- begin custom related loop, isa -->
 
<?php 
 
// get the custom post type's taxonomy terms
 
$custom_taxterms = wp_get_object_terms( $post->ID, 'project-type', array('fields' => 'ids') );
// arguments
$args = array(
'post_type' => 'portfolio',
'post_status' => 'publish',
'posts_per_page' => 3, // you may edit this number
'orderby' => 'rand',
'tax_query' => array(
    array(
        'taxonomy' => 'project-type',
        'field' => 'id',
        'terms' => $custom_taxterms
    )
),
'post__not_in' => array ($post->ID),
);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
echo '<div class="col-lg-12">
            <h3 class="page-header">Related Project</h3>
        </div>';
while ( $related_items->have_posts() ) : $related_items->the_post();
?>

        <div class="col-sm-3 col-xs-6">
            <a href="<?php the_permalink(); ?>" class="img-responsive portfolio-item thumbnail"><?php the_post_thumbnail('portifolio'); ?></a>
        </div>

<?php
endwhile;
echo '<br>';
endif;
// Reset Post Data
wp_reset_postdata();
?>
 
 
<!-- end custom related loop, isa -->

      </div>

    </div>


<?php
// Gets footer.php
get_footer();

?>
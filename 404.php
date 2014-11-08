<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

get_header(); ?>

<section id="_404" class="padding-top">

    <div class="container">

            <div class="row">
                <div class="col-md-12 _404Heading">
                    
                    <h1 class="section-title"><?php _e( 'You found a dead link!', 'wedesign' ); ?></h1>
                    
                </div> <!-- end of span12 tag-->
                
                <div class="col-md-12 _404Link">
                    <i class="fa fa-unlink"></i>
                </div>
                
                <div class="col-md-12 _404Error">
                    <?php _e( '404 Error', 'wedesign' ); ?> <i class="fa fa-bolt"></i>
                </div>
                
                <div class="col-md-12 _404Home">
                    <h4><?php _e( 'Go back', 'wedesign' ); ?> <a href="<?php echo home_url(); ?>"> <i class="fa fa-home"></i> </a> or <a href="<?php echo home_url(); ?>/contact"> Report it. </a> </h4>
                </div>          
            </div> <!-- end of row tag-->

        
        
        
        
        <div class="row">
            <div class="col-md-12">
                
            </div> <!-- end of span12 tag-->
        </div> <!-- end of row tag-->
        
        
    </div>

</section>


<?php
// Gets footer.php
get_footer();

?>
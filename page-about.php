<?php
/**
 *
 *Template Name: About
 *
 *
 * The template for displaying About page
 *
 * This is the template that displays the about page.
 *
 * @package WordPress
 * @subpackage WeDesign
 * @since wedesign 1.0
 */

get_header(); ?>

<section id="about" class="padding-top-bottom">

            <!--about page content-->
            <div class="about-section">
                <div class="container">
                    <div class="section-heading text-center margin-btm-40">
                        <h1 class="section-title"><?php the_title(); ?></h1>
                    </div><!--section heading-->             

                </div><!--container-->
                <div class="container">
                    <div class="about-section-more">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="about-more-info wow animated fadeInUp" data-wow-delay="0.3s">

                                    <?php 
                                        if ( have_posts() ) : while( have_posts() ) : the_post(); 
                                            the_content(); 
                                        endwhile; endif;
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="skills-wrapper wow animated bounceIn" data-wow-delay="0.6s">
                                    <h3 class="heading-progress">Web Design <span class="pull-right">88%</span></h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 88%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="88" role="progressbar">
                                        </div>
                                    </div>
                                    <h3 class="heading-progress">Web Development <span class="pull-right">78%</span></h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 78%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="78" role="progressbar">
                                        </div>
                                    </div>
                                    <h3 class="heading-progress">Marketing <span class="pull-right">82%</span></h3>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 82%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="82" role="progressbar">
                                        </div>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                    </div><!--section about 3 end-->
                </div>
            </div>
            <!--page about content end here-->            
        </section>
        <!--about section end here-->

<!-- ==============================================
TEAM
=============================================== -->
<section id="team" class="gray-bg padding-top-bottom">

    <div class="container">
        
        <h1 class="section-title">Meet the Team</h1>
        <p class="section-description">We are a small team with great skills. See the faces behind the lines of code. </p>
                
        <div class="row">
        
            <?php

// The Query
$user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );

// User Loop
if ( ! empty( $user_query->results ) ) {
    foreach ( $user_query->results as $user ) {
        echo '<div class="col-md-3 col-sm-6 team-member scrollimation fade-up d1">
            
                <div class="member-thumb">
                    ' . get_avatar($user->ID) . '
                    
                    <ul class="member-socials">
                        <li><a href="mailto:' . $user->user_email . '"><i class="fa fa-envelope fa-fw"></i></a></li>
                        <li><a href="' . $user->twitter_profile . '"><i class="fa fa-twitter fa-fw"></i></a></li>
                        <li><a href="' . $user->facebook_profile . '"><i class="fa fa-facebook fa-fw"></i></a></li>
                        <li><a href="' . $user->linkedin_profile . '"><i class="fa fa-linkedin fa-fw"></i></a></li>
                        <li><a href="' . $user->google_profile . '"><i class="fa fa-google-plus fa-fw"></i></a></li>
                    </ul>
                    
                </div>
                
                <div class="member-details">
                    <h4>' . $user->display_name . '</h4>
                    <p class="title">' . $user->position . '</p>
                    <p>' . $user->description .'</p>
                </div>
                
            </div>';
    }
} else {
    echo 'No users found.';
}
?>
            
        </div>
    
    </div>

</section>

<!-- ==============================================
COUNTERS
=============================================== -->
<section class="parallax-bg light-typo padding-top-bottom" data-parallax-background="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/laptop-bg.jpg" data-stellar-background-ratio=".5">

    <div class="container">
    
        <div class="row counters scrollimation fade-up">
        
            <div class="col-md-3 col-sm-6 text-center">
            
                <h1 class="counter" data-to="2" data-speed="1000">0</h1>
                <p>Years in Business</p>
            
            </div>
        
            <div class="col-md-3 col-sm-6 text-center">
            
                <h1 class="counter" data-to="45" data-speed="1500">0</h1>
                <p>Projects Delivered</p>
            
            </div>
            
            <div class="col-md-3 col-sm-6 text-center">
            
                <h1 class="counter" data-to="2500" data-speed="2000">0</h1>
                <p>Sutisfied Customers</p>
            
            </div>
            
            <div class="col-md-3 col-sm-6 text-center">
            
                <h1 class="counter" data-to="400" data-speed="400000">0</h1>
                <p>Seconds on this site!<br/>What are you waiting for?</p>
            
            </div>
        </div>
    
    </div>
    
</section>

<?php
// Gets footer.php
get_footer();
?>
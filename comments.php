<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Wedesign
 * @since Wedesign 1.0
 */

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
return;
}
?>

<?php if ( have_comments() ) : ?>

<div id="comments">
    <h2><?php comments_number(__('No comments', 'wedesign'), __('One comment', 'wedesign'), __('% comments', 'wedesign') );?></h2>

    <ol class="commentlist">
        <?php wp_list_comments('type=comment&callback=wedesign_comments'); ?>
    </ol><!-- /.commentlist -->

    <?php //endif; ?>
    
    <?php if ( ! empty($comments_by_type['pings']) ) : ?>
        <h3 id="pings">Trackbacks/Pingbacks</h3>
        
        <ol class="pinglist">
            <?php wp_list_comments('type=pings&callback=list_pings'); ?>
        </ol>
    <?php endif; ?>
    
    
  
    <?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>   
        <!-- If comments are closed. -->
        <p class="alert alert-info"><?php _e("Comments are closed","wpbootstrap"); ?>.</p>
                
    <?php endif; ?>

    <?php endif; ?>
</div><!-- /#comments -->

<?php if ( comments_open() ) : ?>
<div class="comment-form-wrapper">
    <h2><?php comment_form_title( __('Leave a Reply', 'bookyourtravel'), __('Leave a Reply to %s', 'bookyourtravel') ); ?></h2>
    
    <div class="cancel-comment-reply">
            <?php cancel_comment_reply_link(); ?>
        </div>

        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
        <?php else : ?>

    <form class="forms" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        
        <?php if ( $user_ID ) : ?>
            <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
        <?php else : ?>
        
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" id="author" name="author" value="<?php echo $comment_author; ?>" class="form-control" placeholder="Name (Required)" >
            </div><!-- /.col -->
        </div><!-- /.row -->
        
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="email" id="email" name="email" value="<?php echo $comment_author_email; ?>" class="form-control" placeholder="Email (Required)" >
            </div><!-- /.col -->
        </div><!-- /.row -->
        
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" id="url" name="url" value="<?php echo $comment_author_url; ?>" class="form-control" placeholder="Website" >
            </div><!-- /.col -->
        </div><!-- /.row -->

        <?php endif; /* if ( $user_ID )... */ ?>
        
        <div class="row form-group">
            <div class="col-sm-12">
                <textarea id="comment" name="comment"  class="form-control" placeholder="Enter your comment ..."></textarea>
                <span class="help-block .col-md-8"><small>You can use these HTML tags:<br /><code><?php echo allowed_tags(); ?></code></small></span>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
        
        <button type="submit" class="btn btn-default btn-submit">Submit comment</button>
        
    </form>

    <?php endif; // If registration required and not logged in ?>
    
    <div id="response"></div>
</div><!-- /.comment-form-wrapper -->
<?php endif; ?>
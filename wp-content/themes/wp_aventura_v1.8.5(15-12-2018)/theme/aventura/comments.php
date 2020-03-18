<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <?php
        $aventura_comments_number = get_comments_number();

        if ( '1' === $aventura_comments_number ) {
            if( is_singular('tour')){
                $aventura_comments_title = esc_html__('Review','aventura');
            }else{
                $aventura_comments_title = esc_html__('Comment','aventura');
            }
        }else{
            if( is_singular('tour')){
                $aventura_comments_title = esc_html__('Reviews','aventura');
            }else{
                $aventura_comments_title = esc_html__('Comments','aventura');
            }
        }

        ?>
        <h2 class="comments-title">
            <?php echo get_comments_number().' ';?><?php  echo esc_html($aventura_comments_title); ?>
        </h2>

        <?php aventura_comment_nav(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'aventura_comment',
            ) );
            ?>
        </ol><!-- .comment-list -->

        <?php aventura_comment_nav(); ?>

    <?php endif; // have_comments() ?>

    <div class="tzCommentForm">
        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php  esc_html_e( 'Comments are closed.', 'aventura'); ?></p>
        <?php endif; ?>
        <?php
        $aventura_commenter = wp_get_current_commenter();
        $aventura_req      = get_option( 'require_name_email' );
        $aventura_aria_req = ( $aventura_req ? " aria-required='true'" : '' );
        $aventura_comment_title = esc_html__('Leave A Comment','aventura');
        if( is_singular('tour')){
            $aventura_comment_title = esc_html__('Write a Review','aventura');
        }
        if(!is_user_logged_in()){
            $aventura_args = array(
                'comment_notes_after' => '',
                'comment_field'        => '<p class="comment-form-comment"> <textarea id="comment" name="comment" cols="90" rows="4" required="required" placeholder="' . esc_attr__('Leave your comment...','aventura') . '"></textarea></p>',
                'fields' => apply_filters( 'comment_form_default_fields',
                    array(
                        '<div class="content-form">',
                        'author' => '<p class="comment-form-author">'
                            . '<input id="author" name="author" type="text" value="' . esc_attr( $aventura_commenter['comment_author'] ) . '" size="30"' . $aventura_aria_req . ' placeholder="'.( $aventura_req ? esc_attr__('Your Name','aventura') : '' ).'" /></p>',
                        'email'  => '<p class="comment-form-email">'
                            . '<input id="email" name="email" type="text" value="' . esc_attr(  $aventura_commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aventura_aria_req . ' placeholder="'.( $aventura_req ? esc_attr__('Your Email','aventura') : '' ).'" /></p>',
                        'url' => '<p class="comment-form-url">'
                            . '<input id="url" name="url" type="text" value="' . esc_attr( $aventura_commenter['comment_author_url'] ) . '" size="30"' . $aventura_aria_req . ' placeholder="'.( $aventura_req ? esc_attr__('Website','aventura') : '' ).'" /></p>',
                        '</div>'
                    )
                ),
                'label_submit'      =>  esc_html__( 'Submit','aventura'),
                'title_reply'       =>  $aventura_comment_title,
            );
        }else{
            $aventura_args = array(
                'comment_notes_after' => '',
                'comment_field'        => '<p class="comment-form-comment login"> <textarea id="comment" name="comment" cols="90" rows="4" required="required" placeholder="' . esc_attr__('Leave your comment...','aventura') . '"></textarea></p>',
                'fields' => apply_filters( 'comment_form_default_fields',
                    array(
                        '<div class="content-form">',
                        'author' => '<p class="comment-form-author">'
                            . '<input id="author" name="author" type="text" value="' . esc_attr( $aventura_commenter['comment_author'] ) . '" size="30"' . $aventura_aria_req . ' placeholder="'.( $aventura_req ? esc_attr__('Your Name','aventura') : '' ).'" /></p>',
                        'email'  => '<p class="comment-form-email">'
                            . '<input id="email" name="email" type="text" value="' . esc_attr(  $aventura_commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aventura_aria_req . ' placeholder="'.( $aventura_req ? esc_attr__('Your Email','aventura') : '' ).'" /></p>',
                        'subject' => '<p class="comment-form-subject">',
                        '</div>'
                    )
                ),
                'label_submit'      =>  esc_html__( 'Submit','aventura'),
                'title_reply'       =>  $aventura_comment_title,
            );
        }

        ?>
        <?php comment_form( $aventura_args ); ?>
    </div>

</div><!-- .comments-area -->

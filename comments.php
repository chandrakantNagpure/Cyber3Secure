<?php
/**
 * The template for displaying comments
 *
 * @package cyberi_secure
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}

if ( have_comments() ) :
    ?>
    <h2 class="comments-title">
        <?php
        $cyberi_secure_comment_count = get_comments_number();
        if ( '1' === $cyberi_secure_comment_count ) {
            printf(
                /* translators: 1: title. */
                esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'cyberi-secure' ),
                '<span>' . wp_kses_post( get_the_title() ) . '</span>'
            );
        } else {
            printf(
                /* translators: 1: comment count number, 2: title. */
                esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $cyberi_secure_comment_count, 'comments title', 'cyberi-secure' ) ),
                number_format_i18n( $cyberi_secure_comment_count ),
                '<span>' . wp_kses_post( get_the_title() ) . '</span>'
            );
        }
        ?>
    </h2><!-- .comments-title -->

    <ol class="comment-list">
        <?php
        wp_list_comments(
            array(
                'style'      => 'ol',
                'short_ping' => true,
            )
        );
        ?>
    </ol><!-- .comment-list -->

    <?php
    the_comments_navigation();

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() ) :
        ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cyberi-secure' ); ?></p>
        <?php
    endif;

endif; // Check for have_comments().

comment_form();
?>
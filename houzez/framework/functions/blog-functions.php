<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 09/02/16
 * Time: 1:45 PM
 */

/* --------------------------------------------------------------------------
 * Comment Walker
 ---------------------------------------------------------------------------*/
if ( ! function_exists( 'houzez_comments_callback' ) ) {
    function houzez_comments_callback( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;

        $allowed_html_array = array(
            'i' => array(
                'class' => array()
            )
        );

        ?>
        <li <?php comment_class('media'); ?> id="comment-<?php comment_ID(); ?>">
            <div class="media-left">
                <figure>
                    <a><?php echo get_avatar( $comment, 60 ); ?></a>
                </figure>
            </div>
            <div class="media-body">
                <h3 class="heading"><?php comment_author(); ?></h3>
                <h4 class="subheading"><?php printf( esc_html__( '%1$s at %2$s', 'houzez' ), get_comment_date(), get_comment_time() ); ?> </h4>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'houzez' ); ?></em>
                    <br />
                <?php else: ?>
                    <?php comment_text(); ?>
                <?php endif; ?>
                <?php edit_comment_link( esc_html__( 'Edit', 'houzez' ), ' ' ); ?>
                <?php comment_reply_link( array_merge( $args, array( 'reply_text' => wp_kses(__( 'Reply <i class="tz-chevron-right"></i>', 'houzez' ), $allowed_html_array ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
        </li>

        <?php
    }
}

/**
 * Find out if blog has more than one category.
 *
 * @return boolean true if blog has more than 1 category
 */
function houzez_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'houzez_category_count' ) ) ) {
        // Create an array of all the categories that are attached to posts
        $all_the_cool_cats = get_categories( array(
            'hide_empty' => 1,
        ) );

        // Count the number of categories that are attached to the posts
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'houzez_category_count', $all_the_cool_cats );
    }

    if ( 1 !== (int) $all_the_cool_cats ) {
        // This blog has more than 1 category so twentyfourteen_categorized_blog should return true
        return true;
    } else {
        // This blog has only 1 category so twentyfourteen_categorized_blog should return false
        return false;
    }
}

/**
 * Flush out the transients used in houzez_categorized_blog.
 */
function houzez_category_transient_flusher() {
    // Like, beat it. Dig?
    delete_transient( 'houzez_category_count' );
}
add_action( 'edit_category', 'houzez_category_transient_flusher' );
add_action( 'save_post',     'houzez_category_transient_flusher' );


/*--------------------------------------------------------------------------
* Post thumnail for posts and single post
 * -------------------------------------------------------------------------*/
if ( ! function_exists( 'houzez_post_thumbnail' ) ) :

    function houzez_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        $blog_featured_image = houzez_option('blog_featured_image');

        if( $blog_featured_image != 0 ) {
            if (is_singular()) : ?>

                <div class="article-media">
                    <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                </div>

            <?php else : ?>


                <div class="article-media">
                    <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('houzez-property-detail-gallery', array('alt' => get_the_title())); ?>
                    </a>
                </div>

            <?php endif;
        }
    }
endif;
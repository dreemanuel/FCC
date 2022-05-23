<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$post_class = ['post'];
if ( ! has_post_thumbnail() ) {
    $post_class[] = 'no-featured-image';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>

    <?php
    /**
     * Functions hooked into aarambha_real_estate_posts_entry_content action
     *
     * @hooked aarambha_real_estate_get_post_thumbnail - 10
     * @hooked aarambha_real_estate_blog_post_content   - 15
     */
    do_action( 'aarambha_real_estate_posts_content' );

    ?>

</article><!-- #post-<?php the_ID(); ?> -->

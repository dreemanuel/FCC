<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    /**
     * Functions hooked into aarambha_real_estate_search_posts_entry_header action
     *
     * @hooked aarambha_real_estate_search_posts_header - 10
     */
    do_action( 'aarambha_real_estate_search_posts_entry_header' );
    ?>

    <?php
    /**
     * Functions hooked into aarambha_real_estate_search_posts_entry_content action
     *
     * @hooked aarambha_real_estate_search_posts_content - 10
     */
    do_action( 'aarambha_real_estate_search_posts_entry_content' );
    ?>

    <?php
    /**
     * Functions hooked into aarambha_real_estate_search_posts_entry_footer action
     *
     * @hooked aarambha_real_estate_search_posts_footer - 10
     */
    do_action( 'aarambha_real_estate_search_posts_entry_footer' );
    ?>

</article><!-- #post-<?php the_ID(); ?> -->
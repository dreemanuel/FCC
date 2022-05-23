<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

get_header();
?>

<?php
/**
 * Functions hooked into aarambha_real_estate_content_before action
 *
 * @hooked aarambha_real_estate_content_before_wrapper_start     - 10
 */
do_action( 'aarambha_real_estate_content_before' );
?>
    <div id="primary" <?php Aarambha_Real_Estate_Helper::primary_class();?>>
        <main id="main" class="site-main">

            <?php
            /**
             * Functions hooked into aarambha_real_estate_content_before action
             *
             */
            do_action( 'aarambha_real_estate_content_top' );
            ?>

            <?php if ( have_posts() ) : ?>

                <?php
                /**
                 * Functions hooked into aarambha_real_estate_posts_content_loop_before action
                 *
                 */
                do_action('aarambha_real_estate_posts_content_loop_before');

                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_type() );

                endwhile;

                /**
                 * Functions hooked into aarambha_real_estate_posts_content_loop_after action
                 *
                 * @hooked aarambha_real_estate_posts_navigation - 10
                 */
                do_action('aarambha_real_estate_posts_content_loop_after');

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>

            <?php
            /**
             * Functions hooked into aarambha_real_estate_content_bottom action
             *
             */
            do_action( 'aarambha_real_estate_content_bottom' );
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
/**
 * Functions hooked into aarambha_real_estate_content_after action
 *
 * @hooked aarambha_real_estate_content_after_wrapper_end     - 10
 */
do_action( 'aarambha_real_estate_content_after' );
?>

<?php get_footer(); ?>
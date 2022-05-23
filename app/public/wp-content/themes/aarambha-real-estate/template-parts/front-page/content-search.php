<?php
/**
 * Template part for displaying front page search section content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$section_title      = get_theme_mod('aarambha_real_estate_front_page_search_section_title',esc_html__( 'Discover Your Place To Live', 'aarambha-real-estate' ));
$section_subtitle   = get_theme_mod('aarambha_real_estate_front_page_search_section_sub_title',esc_html__( 'Get Started In Few Clicks', 'aarambha-real-estate'));
?>
<section class="properties-search-section">
    <div class="container">
        <div class="d-flex flex-column justify-content-center text-center normal-search entry-content-wrap">
            <?php if ( $section_title ) : ?>
                <header class="entry-header">
                    <h2 class="entry-title"><?php echo esc_html( $section_title ); ?></h2>
                </header><!-- entry-header -->
            <?php endif; ?>

            <?php if ( $section_subtitle ) : ?>
                <div class="entry-content">
                    <p><?php echo wp_kses_post( $section_subtitle ); ?></p>
                </div><!-- .entry-content -->
            <?php endif; ?>
            <div class="entry-search-wrap">
                <?php get_search_form(); ?>
            </div>

        </div>
    </div>
</section>
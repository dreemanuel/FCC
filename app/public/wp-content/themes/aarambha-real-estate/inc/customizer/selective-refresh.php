<?php
/**
 * Aarambha Real Estate Theme Customizer Selective Refresh
 *
 * @package Aarambha_Real_Estate
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( isset( $wp_customize->selective_refresh ) ) {

    $wp_customize->selective_refresh->add_partial(
        'blogname',
        array(
            'selector'        => '.site-title a',
            'render_callback' => [ $this, 'aarambha_real_estate_customize_partial_blogname' ],
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'blogdescription',
        array(
            'selector'        => '.site-description',
            'render_callback' => [ $this, 'aarambha_real_estate_customize_partial_blogdescription' ],
        )
    );

    // Header Builder
    $wp_customize->selective_refresh->add_partial(
        'aarambha_real_estate_header',
        array(
            'selector'          => '.site-header',
            'settings'          => array(
                'aarambha_real_estate_header_builder_controller_section'
            ),
            'render_callback'   => function() {
                Aarambha_Real_Estate_Customizer_Header_Builder()->aarambha_real_estate_header_display();
            }
        )
    );

    // Footer Builder
    $wp_customize->selective_refresh->add_partial(
        'aarambha_real_estate_footer',
        array(
            'selector'          => '.site-footer',
            'settings'          => array(
                'aarambha_real_estate_footer_builder_controller_section'
            ),
            'render_callback'   => function() {
                Aarambha_Real_Estate_Customizer_Footer_Builder()->aarambha_real_estate_footer_display();
            }
        )
    );
}

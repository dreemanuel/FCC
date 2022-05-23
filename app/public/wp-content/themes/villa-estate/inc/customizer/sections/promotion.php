<?php
/**
 * Promotion Section options
 *
 * @package Theme Palace
 * @subpackage Villa Estate
 * @since Villa Estate 1.0.0
 */

// Add Promotion section
$wp_customize->add_section( 'villa_estate_promotion_section', array(
    'title'             => esc_html__( 'Promotion','villa-estate' ),
    'description'       => esc_html__( 'Promotion Section options.', 'villa-estate' ),
    'panel'             => 'villa_estate_front_page_panel',
) );

// Promotion content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[promotion_section_enable]', array(
    'default'           =>  $options['promotion_section_enable'],
    'sanitize_callback' => 'villa_estate_sanitize_switch_control',
) );

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize, 'villa_estate_theme_options[promotion_section_enable]', array(
    'label'             => esc_html__( 'Promotion Section Enable', 'villa-estate' ),
    'section'           => 'villa_estate_promotion_section',
    'on_off_label'      => villa_estate_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[promotion_section_enable]', array(
        'selector'            => '#promotion-section .tooltiptext',
        'settings'            => 'villa_estate_theme_options[promotion_section_enable]',
    ) );
}

// promotion number control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[promotion_image]', array(
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'villa_estate_theme_options[promotion_image]', array(
    'label'             => esc_html__( 'Background Image', 'villa-estate' ),
    'section'           => 'villa_estate_promotion_section',
    'active_callback'   => 'villa_estate_is_promotion_section_enable',
) ) );

// promotion posts drop down chooser control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[promotion_content_post]', array(
    'sanitize_callback' => 'villa_estate_sanitize_page',
) );

$wp_customize->add_control( new Villa_Estate_Dropdown_Chooser( $wp_customize, 'villa_estate_theme_options[promotion_content_post]', array(
    'label'             => esc_html__( 'Select Post', 'villa-estate' ),
    'section'           => 'villa_estate_promotion_section',
    'choices'           => villa_estate_post_choices(),
    'active_callback'   => 'villa_estate_is_promotion_section_enable',
) ) );

// promotion title setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[promotion_button]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['promotion_button'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'villa_estate_theme_options[promotion_button]', array(
    'label'             => esc_html__( 'Promotion Button', 'villa-estate' ),
    'section'           => 'villa_estate_promotion_section',
    'active_callback'   => 'villa_estate_is_promotion_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[promotion_button]', array(
        'selector'            => '#promotion-section .read-more a',
        'settings'            => 'villa_estate_theme_options[promotion_button]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'villa_estate_promotion_button_partial',
    ) );
}
<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'villa_estate_menu',
	array(
		'title'             => esc_html__('Header Menu','villa-estate'),
		'description'       => esc_html__( 'Header Menu options.', 'villa-estate' ),
		'panel'             => 'nav_menus',
	)
);

// button text setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[nav_btn_txt]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['nav_btn_txt'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'villa_estate_theme_options[nav_btn_txt]', array(
	'label'           	=> esc_html__( 'Button Label', 'villa-estate' ),
	'section'        	=> 'villa_estate_menu',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[nav_btn_txt]', array(
		'selector'            => '#site-navigation li a.custom-button',
		'settings'            => 'villa_estate_theme_options[nav_btn_txt]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'villa_estate_nav_btn_txt_partial',
    ) );
}

// button url setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[nav_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $options['nav_btn_url'],
) );

$wp_customize->add_control( 'villa_estate_theme_options[nav_btn_url]', array(
	'label'           	=> esc_html__( 'Button URL', 'villa-estate' ),
	'section'        	=> 'villa_estate_menu',
	'type'				=> 'url'
) );

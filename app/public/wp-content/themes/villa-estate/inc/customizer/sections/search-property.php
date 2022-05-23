<?php
/**
 * Search Property Section options
 *
 * @package Theme Palace
 * @subpackage Villa Estate
 * @since Villa Estate 1.0.0
 */

// Add Search Property section
$wp_customize->add_section( 'villa_estate_search_property_section', array(
	'title'             => esc_html__( 'Search Property Us','villa-estate' ),
	'description'       => esc_html__( 'Search Property Us Section options.', 'villa-estate' ),
	'panel'             => 'villa_estate_front_page_panel',
) );

// Search Property content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[search_property_section_enable]', array(
	'default'			=> 	$options['search_property_section_enable'],
	'sanitize_callback' => 'villa_estate_sanitize_switch_control',
) );

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize, 'villa_estate_theme_options[search_property_section_enable]', array(
	'label'             => esc_html__( 'Search Property Section Enable', 'villa-estate' ),
	'section'           => 'villa_estate_search_property_section',
	'on_off_label' 		=> villa_estate_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[search_property_section_enable]', array(
		'selector'            => '#search-property .tooltiptext',
		'settings'            => 'villa_estate_theme_options[search_property_section_enable]',
    ) );
}

// search_property title setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[search_property_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['search_property_title'],
) );

$wp_customize->add_control( 'villa_estate_theme_options[search_property_title]', array(
	'label'           	=> esc_html__( 'Title', 'villa-estate' ),
	'section'        	=> 'villa_estate_search_property_section',
	'active_callback' 	=> 'villa_estate_is_search_property_section_enable',
	'type'				=> 'text',
) );

// search_property description setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[search_property_description]', array(
	'sanitize_callback' => 'wp_kses_post',
	'default'			=> $options['search_property_description'],
) );

$wp_customize->add_control( 'villa_estate_theme_options[search_property_description]', array(
	'label'           	=> esc_html__( 'Description', 'villa-estate' ),
	'section'        	=> 'villa_estate_search_property_section',
	'active_callback' 	=> 'villa_estate_is_search_property_section_enable',
	'type'				=> 'textarea',
) );

// search_property image setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[search_property_image]', array(
	'sanitize_callback' => 'villa_estate_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'villa_estate_theme_options[search_property_image]',
		array(
		'label'       		=> esc_html__( 'Image', 'villa-estate' ),
		'section'     		=> 'villa_estate_search_property_section',
		'active_callback'	=> 'villa_estate_is_search_property_section_enable',
) ) );
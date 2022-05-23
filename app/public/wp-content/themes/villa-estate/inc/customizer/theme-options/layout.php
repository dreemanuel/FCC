<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'villa_estate_layout',
	array(
		'title'               => esc_html__('Layout','villa-estate'),
		'description'         => esc_html__( 'Layout section options.', 'villa-estate' ),
		'panel'               => 'villa_estate_theme_options_panel',
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[site_layout]',
	array(
		'sanitize_callback'   => 'villa_estate_sanitize_select',
		'default'             => $options['site_layout'],
	)
);

$wp_customize->add_control(  new  Villa_Estate_Custom_Radio_Image_Control ( $wp_customize,
	'villa_estate_theme_options[site_layout]',
		array(
			'label'               => esc_html__( 'Site Layout', 'villa-estate' ),
			'section'             => 'villa_estate_layout',
			'choices'			  => villa_estate_site_layout(),
		)
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[sidebar_position]',
	array(
		'sanitize_callback'   => 'villa_estate_sanitize_select',
		'default'             => $options['sidebar_position'],
	)
);

$wp_customize->add_control(  new  Villa_Estate_Custom_Radio_Image_Control ( $wp_customize,
	'villa_estate_theme_options[sidebar_position]',
		array(
			'label'               => esc_html__( 'Global Sidebar Position', 'villa-estate' ),
			'section'             => 'villa_estate_layout',
			'choices'			  => villa_estate_global_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[post_sidebar_position]',
	array(
		'sanitize_callback'   => 'villa_estate_sanitize_select',
		'default'             => $options['post_sidebar_position'],
	)
);

$wp_customize->add_control(  new  Villa_Estate_Custom_Radio_Image_Control ( $wp_customize,
	'villa_estate_theme_options[post_sidebar_position]',
		array(
			'label'               => esc_html__( 'Posts Sidebar Position', 'villa-estate' ),
			'section'             => 'villa_estate_layout',
			'choices'			  => villa_estate_sidebar_position(),
		)
	)
);

// Post sidebar position setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[page_sidebar_position]',
	array(
		'sanitize_callback'   => 'villa_estate_sanitize_select',
		'default'             => $options['page_sidebar_position'],
	)
);

$wp_customize->add_control( new  Villa_Estate_Custom_Radio_Image_Control( $wp_customize,
	'villa_estate_theme_options[page_sidebar_position]',
		array(
			'label'               => esc_html__( 'Pages Sidebar Position', 'villa-estate' ),
			'section'             => 'villa_estate_layout',
			'choices'			  => villa_estate_sidebar_position(),
		)
	)
);
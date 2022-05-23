<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'villa_estate_single_post_section',
	array(
		'title'             => esc_html__( 'Single Post','villa-estate' ),
		'description'       => esc_html__( 'Options to change the single posts globally.', 'villa-estate' ),
		'panel'             => 'villa_estate_theme_options_panel',
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[single_post_hide_date]',
	array(
		'default'           => $options['single_post_hide_date'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[single_post_hide_date]',
		array(
			'label'             => esc_html__( 'Hide Date', 'villa-estate' ),
			'section'           => 'villa_estate_single_post_section',
			'on_off_label' 		=> villa_estate_hide_options(),
		)
	)
);

// Archive author meta setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[single_post_hide_author]',
	array(
		'default'           => $options['single_post_hide_author'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[single_post_hide_author]',
		array(
			'label'             => esc_html__( 'Hide Author', 'villa-estate' ),
			'section'           => 'villa_estate_single_post_section',
			'on_off_label' 		=> villa_estate_hide_options(),
		)
	)
);
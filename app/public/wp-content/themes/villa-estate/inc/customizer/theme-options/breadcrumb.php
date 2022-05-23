<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

$wp_customize->add_section( 'villa_estate_breadcrumb',
	array(
		'title'             => esc_html__( 'Breadcrumb','villa-estate' ),
		'description'       => esc_html__( 'Breadcrumb section options.', 'villa-estate' ),
		'panel'             => 'villa_estate_theme_options_panel',
	)
);

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[breadcrumb_enable]',
	array(
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
		'default'          	=> $options['breadcrumb_enable'],
	)
);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[breadcrumb_enable]',
		array(
			'label'            	=> esc_html__( 'Enable Breadcrumb', 'villa-estate' ),
			'section'          	=> 'villa_estate_breadcrumb',
			'on_off_label' 		=> villa_estate_switch_options(),
		)
	)
);

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[breadcrumb_separator]',
	array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'default'          	=> $options['breadcrumb_separator'],
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[breadcrumb_separator]',
	array(
		'label'            	=> esc_html__( 'Separator', 'villa-estate' ),
		'active_callback' 	=> 'villa_estate_is_breadcrumb_enable',
		'section'          	=> 'villa_estate_breadcrumb',
	)
);

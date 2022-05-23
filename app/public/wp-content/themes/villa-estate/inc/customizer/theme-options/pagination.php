<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'villa_estate_pagination',
	array(
		'title'               	=> esc_html__('Pagination','villa-estate'),
		'description'         	=> esc_html__( 'Pagination section options.', 'villa-estate' ),
		'panel'               	=> 'villa_estate_theme_options_panel',
	)
);

// Sidebar position setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[pagination_enable]',
	array(
		'sanitize_callback' 	=> 'villa_estate_sanitize_switch_control',
		'default'             	=> $options['pagination_enable'],
	)
);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[pagination_enable]',
		array(
			'label'               	=> esc_html__( 'Pagination Enable', 'villa-estate' ),
			'section'             	=> 'villa_estate_pagination',
			'on_off_label' 			=> villa_estate_switch_options(),
		)
	)
);

// Site layout setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[pagination_type]',
	array(
		'sanitize_callback'   	=> 'villa_estate_sanitize_select',
		'default'             	=> $options['pagination_type'],
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[pagination_type]',
	array(
		'label'               	=> esc_html__( 'Pagination Type', 'villa-estate' ),
		'section'             	=> 'villa_estate_pagination',
		'type'                	=> 'select',
		'choices'			  	=> villa_estate_pagination_options(),
		'active_callback'	  	=> 'villa_estate_is_pagination_enable',
	)
);

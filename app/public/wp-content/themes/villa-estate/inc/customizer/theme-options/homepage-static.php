<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Villa Estate
* @since Villa Estate 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[enable_frontpage_content]',
	array(
		'sanitize_callback'   => 'villa_estate_sanitize_checkbox',
		'default'             => $options['enable_frontpage_content'],
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[enable_frontpage_content]',
	array(
		'label'       	=> esc_html__( 'Enable Content', 'villa-estate' ),
		'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'villa-estate' ),
		'section'     	=> 'static_front_page',
		'type'        	=> 'checkbox',
		'active_callback' => 'villa_estate_is_static_homepage_enable',
	)
);
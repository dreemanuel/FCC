<?php
/**
* Service Section options
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/

// Add Service section
$wp_customize->add_section( 'villa_estate_service_section', 
	array(
		'title'             => esc_html__( 'Services','villa-estate' ),
		'description'       => esc_html__( 'Services Section options.', 'villa-estate' ),
		'panel'             => 'villa_estate_front_page_panel',
		) 
	);

// Service content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[service_section_enable]', 
	array(
		'default'			=> 	$options['service_section_enable'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
		) 
	);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[service_section_enable]', 
	array(
		'label'             => esc_html__( 'Service Section Enable', 'villa-estate' ),
		'section'           => 'villa_estate_service_section',
		'on_off_label' 		=> villa_estate_switch_options(),
		) 
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[service_section_enable]', 
		array(
			'selector'            => '#service-section .tooltiptext',
			'settings'            => 'villa_estate_theme_options[service_section_enable]',
			) 
		);
}

// Service section sub title control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[service_section_sub_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=>'postMessage',
		'default'           => $options['service_section_sub_title'],
		) 
	);

$wp_customize->add_control('villa_estate_theme_options[service_section_sub_title]', 
	array(
		'label'             => esc_html__( 'Section Sub Title', 'villa-estate' ),
		'section'           => 'villa_estate_service_section',
		'type'              =>'text',
		'active_callback'	=> 'villa_estate_is_service_section_enable',
		)
	);

$wp_customize->selective_refresh->add_partial('villa_estate_theme_options[service_section_sub_title]',
	array(
		'selector'            => '#service-section .section-subtitle',
		'settings'            => 'villa_estate_theme_options[service_section_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'villa_estate_service_section_partial_sub_title',
		)
	);

// Service section title control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[service_section_title]', 
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'transport'			=>'postMessage',
		'default'           => $options['service_section_title'],

		) 
	);

$wp_customize->add_control('villa_estate_theme_options[service_section_title]', 
	array(
		'label'             => esc_html__( 'Section Title', 'villa-estate' ),
		'section'           => 'villa_estate_service_section',
		'type'              =>'text',
		'active_callback'	=> 'villa_estate_is_service_section_enable',
		)
	);
$wp_customize->selective_refresh->add_partial(
	'villa_estate_theme_options[service_section_title]',
	array(
		'selector'            => '#service-section .section-title',
		'settings'            => 'villa_estate_theme_options[service_section_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'villa_estate_service_section_partial_title',
		)
	);

for($i = 1; $i <= 3; $i ++):

// service image setting and control.
	$wp_customize->add_setting( 'villa_estate_theme_options[service_image_' . $i . ']', array(
		'sanitize_callback' => 'villa_estate_sanitize_image'
		) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'villa_estate_theme_options[service_image_' . $i . ']',
	array(
		'label'       		=> sprintf( esc_html__( 'Select Image', 'villa-estate' ), $i ),
		'section'     		=> 'villa_estate_service_section',
		'active_callback'	=> 'villa_estate_is_service_section_enable',
		) ) );

// service posts drop down chooser control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[service_content_post_'.$i.']', 
	array(
		'sanitize_callback' => 'villa_estate_sanitize_page',
		) 
	);

$wp_customize->add_control( new  Villa_Estate_Dropdown_Chooser( $wp_customize,
	'villa_estate_theme_options[service_content_post_'.$i.']', 
	array(
		'label'             => sprintf(esc_html__( 'Select Post : %d', 'villa-estate'), $i ),
		'section'           => 'villa_estate_service_section',
		'choices'			=> villa_estate_post_choices(),
		'active_callback'	=> 'villa_estate_is_service_section_enable',
		)
	)
);


endfor;

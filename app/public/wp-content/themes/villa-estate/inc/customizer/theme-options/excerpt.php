<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'villa_estate_excerpt_section',
	array(
		'title'             => esc_html__( 'Excerpt','villa-estate' ),
		'description'       => esc_html__( 'Excerpt section options.', 'villa-estate' ),
		'panel'             => 'villa_estate_theme_options_panel',
	)
);


// long Excerpt length setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[long_excerpt_length]',
	array(
		'sanitize_callback' => 'villa_estate_sanitize_number_range',
		'validate_callback' => 'villa_estate_validate_long_excerpt',
		'default'			=> $options['long_excerpt_length'],
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[long_excerpt_length]',
	array(
		'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'villa-estate' ),
		'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'villa-estate' ),
		'section'     		=> 'villa_estate_excerpt_section',
		'type'        		=> 'number',
		'input_attrs' 		=> array(
			'style'       => 'width: 80px;',
			'max'         => 100,
			'min'         => 5,
		),
	)
);

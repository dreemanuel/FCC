<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'villa_estate_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'villa-estate' ),
		'priority'   			=> 900,
		'panel'      			=> 'villa_estate_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'villa_estate_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'villa_estate_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'villa-estate' ),
		'section'    			=> 'villa_estate_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[copyright_text]',
		array(
			'selector'            => '.site-info .wrapper',
			'settings'            => 'villa_estate_theme_options[copyright_text]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'villa_estate_copyright_text_partial',
		)
	);
}

// scroll top visible
$wp_customize->add_setting( 'villa_estate_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
	)
);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[scroll_top_visible]',
		array(
			'label'      		=> esc_html__( 'Display Scroll Top Button', 'villa-estate' ),
			'section'    		=> 'villa_estate_section_footer',
			'on_off_label' 		=> villa_estate_switch_options(),
		)
	)
);

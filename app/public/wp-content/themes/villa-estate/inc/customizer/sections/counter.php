<?php
/**
* Counter Section options
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/

// Add Counter section
$wp_customize->add_section( 'villa_estate_counter_section',
	array(
		'title'             => esc_html__( 'Counters','villa-estate' ),
		'description'       => esc_html__( 'Counters Section options.', 'villa-estate' ),
		'panel'             => 'villa_estate_front_page_panel',
		)
	);

// Counter content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[counter_section_enable]',
	array(
		'default'			=> 	$options['counter_section_enable'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
		)
	);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[counter_section_enable]',
	array(
		'label'             => esc_html__( 'Counter Section Enable', 'villa-estate' ),
		'section'           => 'villa_estate_counter_section',
		'on_off_label' 		=> villa_estate_switch_options(),
		)
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[counter_section_enable]',
		array(
			'selector'            => '#counter-section .tooltiptext',
			'settings'            => 'villa_estate_theme_options[counter_section_enable]',
			)
		);
}

$wp_customize->add_setting( 'villa_estate_theme_options[counter_image]',
	array(
		'sanitize_callback' => 'villa_estate_sanitize_image',
		)
	);

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
	'villa_estate_theme_options[counter_image]',
	array(
		'label'       		=> esc_html__( 'Background Image', 'villa-estate' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'villa-estate' ), 1350, 385 ),
		'section'     		=> 'villa_estate_counter_section',
		'active_callback'	=> 'villa_estate_is_counter_section_enable',
		)
	)
);

for ( $i = 1; $i <= 4; $i++ ) :

	// counter note control and setting
	$wp_customize->add_setting( 'villa_estate_theme_options[counter_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Villa_Estate_Icon_Picker( $wp_customize, 'villa_estate_theme_options[counter_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'villa-estate' ), $i ),
		'section'           => 'villa_estate_counter_section',
		'active_callback'	=> 'villa_estate_is_counter_section_enable',
	) ) );

// counter title setting and control
	$wp_customize->add_setting( 'villa_estate_theme_options[counter_title_' . $i . ']',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			)
		);

$wp_customize->add_control( 'villa_estate_theme_options[counter_title_' . $i . ']',
	array(
		'label'           	=> sprintf( esc_html__( 'Counter Title %d', 'villa-estate' ), $i ),
		'section'        	=> 'villa_estate_counter_section',
		'active_callback' 	=> 'villa_estate_is_counter_section_enable',
		'type'				=> 'text',
		)
	);

// counter title setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[counter_value_' . $i . ']',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		)
	);

$wp_customize->add_control( 'villa_estate_theme_options[counter_value_' . $i . ']',
	array(
		'label'           	=> sprintf( esc_html__( 'Counter Value %d', 'villa-estate' ), $i ),
		'section'        	=> 'villa_estate_counter_section',
		'active_callback' 	=> 'villa_estate_is_counter_section_enable',
		'type'				=> 'text',
		)
	);

// counter hr setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[counter_hr_'. $i .']',
	array(
		'sanitize_callback' => 'villa_estate_sanitize_html'
		)
	);

$wp_customize->add_control( new  Villa_Estate_Customize_Horizontal_Line( $wp_customize,
	'villa_estate_theme_options[counter_hr_'. $i .']',
	array(
		'section'         => 'villa_estate_counter_section',
		'active_callback' => 'villa_estate_is_counter_section_enable',
		'type'			  => 'hr'
		)
	)
);

endfor;
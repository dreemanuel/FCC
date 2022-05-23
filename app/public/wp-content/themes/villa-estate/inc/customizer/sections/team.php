<?php
/**
* Team Section options
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/

// Add Team section
$wp_customize->add_section( 'villa_estate_team_section',
	array(
		'title'             => esc_html__( 'Team','villa-estate' ),
		'description'       => esc_html__( 'Team Section options.', 'villa-estate' ),
		'panel'             => 'villa_estate_front_page_panel',
		)
	);

// Team content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[team_section_enable]',
	array(
		'default'			=> 	$options['team_section_enable'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
		)
	);

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[team_section_enable]',
	array(
		'label'             => esc_html__( 'Team Section Enable', 'villa-estate' ),
		'section'           => 'villa_estate_team_section',
		'on_off_label' 		=> villa_estate_switch_options(),
		)
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[team_section_enable]',
		array(
			'selector'            => '#team-section .tooltiptext',
			'settings'            => 'villa_estate_theme_options[team_section_enable]',
			)
		);
}

// team title setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[team_title]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['team_title'],
		'transport'			=> 'postMessage',
		)
	);

$wp_customize->add_control( 'villa_estate_theme_options[team_title]',
	array(
		'label'           	=> esc_html__( 'Section Title', 'villa-estate' ),
		'section'        	=> 'villa_estate_team_section',
		'active_callback' 	=> 'villa_estate_is_team_section_enable',
		'type'				=> 'text',
		)
	);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[team_title]',
		array(
			'selector'            => '#team-section .section-header h2',
			'settings'            => 'villa_estate_theme_options[team_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'villa_estate_team_title_partial',
			)
		);
}

// team description setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[team_sub_title]',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'			=> $options['team_sub_title'],
		'transport'			=> 'postMessage',
		)
	);

$wp_customize->add_control( 'villa_estate_theme_options[team_sub_title]',
	array(
		'label'           	=> esc_html__( 'Section Sub Title', 'villa-estate' ),
		'section'        	=> 'villa_estate_team_section',
		'active_callback' 	=> 'villa_estate_is_team_section_enable',
		'type'				=> 'text',
		)
	);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[team_sub_title]',
		array(
			'selector'            => '#team-section .section-header p',
			'settings'            => 'villa_estate_theme_options[team_sub_title]',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
			'render_callback'     => 'villa_estate_team_sub_title_partial',
			)
		);
}

for ( $i = 1; $i <= 3; $i++ ) :
// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'villa_estate_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'villa_estate_sanitize_page',
		) );

$wp_customize->add_control( new Villa_Estate_Dropdown_Chooser( $wp_customize, 'villa_estate_theme_options[team_content_page_' . $i . ']', array(
	'label'             => sprintf( esc_html__( 'Select Page %d', 'villa-estate' ), $i ),
	'section'           => 'villa_estate_team_section',
	'choices'			=> villa_estate_page_choices(),
	'active_callback'	=> 'villa_estate_is_team_section_enable',
	) ) );

// team position setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[team_position_' . $i . ']', array(
	'sanitize_callback' => 'sanitize_text_field',
	) );

$wp_customize->add_control( 'villa_estate_theme_options[team_position_' . $i . ']', array(
	'label'           	=> sprintf( esc_html__( 'Position %d', 'villa-estate' ), $i ),
	'section'        	=> 'villa_estate_team_section',
	'active_callback' 	=> 'villa_estate_is_team_section_enable',
	'type'				=> 'text',
	) );

// team multiple input setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[team_social_'. $i .']', array(
	'sanitize_callback' => 'sanitize_text_field'
	) );

$wp_customize->add_control( new Villa_Estate_Multi_Input_Custom_Control( $wp_customize, 'villa_estate_theme_options[team_social_'. $i .']',
	array(
		'label'           => sprintf( esc_html__( 'Social Link %d', 'villa-estate' ), $i ),
		'button_text'	  => esc_html__( 'Add Social Link', 'villa-estate' ),
		'section'         => 'villa_estate_team_section',
		'active_callback' => 'villa_estate_is_team_section_enable',
		'type'			  => 'multi-input'
		) ) );

// team hr setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[team_hr_'. $i .']', array(
	'sanitize_callback' => 'villa_estate_sanitize_html'
	) );

$wp_customize->add_control( new Villa_Estate_Customize_Horizontal_Line( $wp_customize, 'villa_estate_theme_options[team_hr_'. $i .']',
	array(
		'section'         => 'villa_estate_team_section',
		'active_callback' => 'villa_estate_is_team_section_enable',
		'type'			  => 'hr'
		) ) );
endfor;
<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'villa_estate_reset_section',
	array(
		'title'             => esc_html__('Reset all settings','villa-estate'),
		'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'villa-estate' ),
	)
);

// Add reset enable setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[reset_options]',
	array(
		'default'           => $options['reset_options'],
		'sanitize_callback' => 'villa_estate_sanitize_checkbox',
		'transport'			=> 'postMessage',
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[reset_options]',
	array(
		'label'             => esc_html__( 'Check to reset all settings', 'villa-estate' ),
		'section'           => 'villa_estate_reset_section',
		'type'              => 'checkbox',
	)
);

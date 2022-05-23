<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'villa_estate_archive_section',
	array(
		'title'             => esc_html__( 'Blog/Archive','villa-estate' ),
		'description'       => esc_html__( 'Archive section options.', 'villa-estate' ),
		'panel'             => 'villa_estate_theme_options_panel',
	)
);

// Your latest posts title setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[your_latest_posts_title]',
	array(
		'default'           => $options['your_latest_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[your_latest_posts_title]',
	array(
		'label'             => esc_html__( 'Your Latest Posts Title', 'villa-estate' ),
		'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'villa-estate' ),
		'section'           => 'villa_estate_archive_section',
		'type'				=> 'text',
		'active_callback'   => 'villa_estate_is_latest_posts'
	)
);

// Archive date meta setting and control.
$wp_customize->add_setting( 'villa_estate_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'villa_estate_sanitize_switch_control',
) );

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize, 'villa_estate_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'villa-estate' ),
	'section'           => 'villa_estate_archive_section',
	'on_off_label' 		=> villa_estate_hide_options(),
) ) );

// features content type control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[blog_column]',
	array(
		'default'          	=> $options['blog_column'],
		'sanitize_callback' => 'villa_estate_sanitize_select',
		'transport'			=> 'refresh',
	)
);

$wp_customize->add_control( 'villa_estate_theme_options[blog_column]',
	array(
		'label'             => esc_html__( 'Column Layout', 'villa-estate' ),
		'section'           => 'villa_estate_archive_section',
		'type'				=> 'select',
		'choices'			=> array( 
			'col-2'		=> esc_html__( 'Two Column', 'villa-estate' ),
			'col-3'		=> esc_html__( 'Three Column', 'villa-estate' ),
		),
	)
);
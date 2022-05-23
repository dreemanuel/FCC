<?php
/**
* Latest Posts Section options
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/

// Add Latest Posts section
$wp_customize->add_section( 'villa_estate_latest_posts_section', array(
	'title'             => esc_html__( 'Latest Posts','villa-estate' ),
	'description'       => esc_html__( 'Latest Posts Section options.', 'villa-estate' ),
	'panel'             => 'villa_estate_front_page_panel',
	) );

// Latest Posts content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[latest_posts_section_enable]', 
	array(
		'default'			=> 	$options['latest_posts_section_enable'],
		'sanitize_callback' => 'villa_estate_sanitize_switch_control',
		) 
	);

$wp_customize->add_control( new  Villa_Estate_Switch_Control( $wp_customize,
	'villa_estate_theme_options[latest_posts_section_enable]',
	array(
		'label'             => esc_html__( 'Latest Posts Section Enable', 'villa-estate' ),
		'section'           => 'villa_estate_latest_posts_section',
		'on_off_label' 		=> villa_estate_switch_options(),
		)
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[latest_posts_section_enable]',
		array(
			'selector'            => '#latest-posts-section .tooltiptext',
			'settings'            => 'villa_estate_theme_options[latest_posts_section_enable]',
			)
		);
}

// Testimonial section sub title control and setting
$wp_customize->add_setting('villa_estate_theme_options[latest_posts_section_sub_title]',
    array(
        'sanitize_callback'     => 'sanitize_text_field',
        'transport'             => 'postMessage',
        'default'               => $options['latest_posts_section_sub_title'],
    )
);

$wp_customize->add_control('villa_estate_theme_options[latest_posts_section_sub_title]',
    array(
        'label'             => esc_html__('Section Sub Title', 'villa-estate'),
        'section'           => 'villa_estate_latest_posts_section',
        'type'              => 'text',
        'active_callback'   => 'villa_estate_is_latest_posts_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('villa_estate_theme_options[latest_posts_section_sub_title]',
    array(
        'selector'          => '#latest-posts-section .section-subtitle',
        'render_callback'   => 'villa_estate_latest_posts_section_partial_sub_title',
    )
);

// Testimonial section title control and setting
$wp_customize->add_setting('villa_estate_theme_options[latest_posts_section_title]',
    array(
        'default'               => $options['latest_posts_section_title'],
        'sanitize_callback'     => 'sanitize_text_field',
        'transport'             => 'postMessage'
    )
);

$wp_customize->add_control('villa_estate_theme_options[latest_posts_section_title]',
    array(
        'label'                 => esc_html__('Section Title', 'villa-estate'),
        'section'               => 'villa_estate_latest_posts_section',
        'type'                  => 'text',
        'active_callback'       => 'villa_estate_is_latest_posts_section_enable',
    )
);

$wp_customize->selective_refresh->add_partial('villa_estate_theme_options[latest_posts_section_title]',
    array(
        'selector'          => '#latest-posts-section .section-title',
        'render_callback'   => 'villa_estate_latest_posts_section_partial_title',
    )
);

// Latest Posts content type control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[latest_posts_content_type]',
	array(
		'default'          	=> $options['latest_posts_content_type'],
		'sanitize_callback' => 'villa_estate_sanitize_select',
		)
	);

$wp_customize->add_control( 'villa_estate_theme_options[latest_posts_content_type]',
	array(
		'label'             => esc_html__( 'Content Type', 'villa-estate' ),
		'section'           => 'villa_estate_latest_posts_section',
		'type'				=> 'select',
		'active_callback' 	=> 'villa_estate_is_latest_posts_section_enable',
		'choices'			=> array(
			'post' 		=> esc_html__( 'Post', 'villa-estate' ),
			'category' 	=> esc_html__( 'Category', 'villa-estate' ),
			),
		)
	);

for ( $i = 1; $i <= 3; $i++ ) :

// latest_posts posts drop down chooser control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[latest_posts_content_post_'. $i .']', 
	array(
		'sanitize_callback' => 'villa_estate_sanitize_page',
		)
	);

$wp_customize->add_control( new  Villa_Estate_Dropdown_Chooser( $wp_customize,
	'villa_estate_theme_options[latest_posts_content_post_'. $i .']',
	array(
		'label'             => sprintf(esc_html__( 'Select Post : %d', 'villa-estate'), $i ),
		'section'           => 'villa_estate_latest_posts_section',
		'choices'			=> villa_estate_post_choices(),
		'active_callback'	=> 'villa_estate_is_latest_posts_section_content_post_enable',
		)
	)
);

endfor;

// latest_posts posts drop down chooser control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[latest_posts_category]',
	array(
		'sanitize_callback' => 'villa_estate_sanitize_single_category',
		)
	);

$wp_customize->add_control( new  Villa_Estate_Dropdown_Taxonomies_Control( $wp_customize,
	'villa_estate_theme_options[latest_posts_category]', 
	array(
		'label'             => esc_html__( 'Select Categories', 'villa-estate' ),
		'description'       => esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'villa-estate' ),
		'type'           	=> 'dropdown-taxonomies',
		'section'           => 'villa_estate_latest_posts_section',
		'active_callback'	=> 'villa_estate_is_latest_posts_section_content_category_enable',
		)
	)
); 
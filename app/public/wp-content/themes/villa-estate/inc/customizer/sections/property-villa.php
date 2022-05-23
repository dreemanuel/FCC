<?php
/**
* Property Villa Section options
*
* @package Theme Palace
* @subpackage Villa Estate
* @since Villa Estate 1.0.0
*/

// Add Property Villa section
$wp_customize->add_section( 'villa_estate_property_villa_section',
    array(
        'title'             => esc_html__( 'Property Villa','villa-estate' ),
        'description'       => esc_html__( 'Property Villa Section options.', 'villa-estate' ),
        'panel'             => 'villa_estate_front_page_panel',
        )
    );

// Property Villa content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[property_villa_section_enable]',
    array(
        'default'           =>  $options['property_villa_section_enable'],
        'sanitize_callback' => 'villa_estate_sanitize_switch_control',
        )
    );

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize, 'villa_estate_theme_options[property_villa_section_enable]',
    array(
        'label'             => esc_html__( 'Property Villa Section Enable', 'villa-estate' ),
        'section'           => 'villa_estate_property_villa_section',
        'on_off_label'      => villa_estate_switch_options(),
        ) 
    ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[property_villa_section_enable]',
        array(
            'selector'            => '#property-villa .tooltiptext',
            'settings'            => 'villa_estate_theme_options[property_villa_section_enable]',
            )
        );
}

// Property Villa section sub title control and setting
$wp_customize->add_setting('villa_estate_theme_options[property_villa_sub_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
        'default'  => $options['property_villa_sub_title'],
        )
    );

$wp_customize->add_control('villa_estate_theme_options[property_villa_sub_title]',
    array(
        'label' => esc_html__('Section Sub Title', 'villa-estate'),
        'section' => 'villa_estate_property_villa_section',
        'type' => 'text',
        'active_callback' => 'villa_estate_is_property_villa_section_enable',
        )
    );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[property_villa_sub_title]',
        array(
            'selector'            => '#property-villa p.section-subtitle',
            'settings'            => 'villa_estate_theme_options[property_villa_sub_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'villa_estate_property_villa_sub_title_partial',
            )
        );
}

// property_villa title setting and control
$wp_customize->add_setting( 'villa_estate_theme_options[property_villa_title]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => $options['property_villa_title'],
        'transport'         => 'postMessage',
        )
    );

$wp_customize->add_control( 'villa_estate_theme_options[property_villa_title]',
    array(
        'label'             => esc_html__( 'Section Title', 'villa-estate' ),
        'section'           => 'villa_estate_property_villa_section',
        'active_callback'   => 'villa_estate_is_property_villa_section_enable',
        'type'              => 'text',
        ) 
    );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[property_villa_title]',
        array(
            'selector'            => '#property-villa h2.section-title',
            'settings'            => 'villa_estate_theme_options[property_villa_title]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'villa_estate_property_villa_title_partial',
            )
        );
}

// Property Villa content type control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[property_villa_content_type]',
    array(
        'default'           => $options['property_villa_content_type'],
        'sanitize_callback' => 'villa_estate_sanitize_select',
        ) 
    );

$wp_customize->add_control( 'villa_estate_theme_options[property_villa_content_type]',
    array(
        'label'             => esc_html__( 'Content Type', 'villa-estate' ),
        'section'           => 'villa_estate_property_villa_section',
        'type'              => 'select',
        'active_callback'   => 'villa_estate_is_property_villa_section_enable',
        'choices'           => villa_estate_property_villa_content_type(),
        ) 
    );

for ( $i = 1; $i <= 6; $i++ ) :

// property_villa posts drop down chooser control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[property_villa_content_post_' . $i . ']', 
    array(
        'sanitize_callback' => 'villa_estate_sanitize_page',
        ) 
    );

$wp_customize->add_control( new Villa_Estate_Dropdown_Chooser( $wp_customize, 'villa_estate_theme_options[property_villa_content_post_' . $i . ']', 
    array(
        'label'             => sprintf( esc_html__( 'Select Post %d', 'villa-estate' ), $i ),
        'section'           => 'villa_estate_property_villa_section',
        'choices'           => villa_estate_post_choices(),
        'active_callback'   => 'villa_estate_is_property_villa_section_content_post_enable',
        ) 
    ) );

// property_villa posts drop down chooser control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[property_villa_content_property_' . $i . ']', 
    array(
        'sanitize_callback' => 'villa_estate_sanitize_page',
        ) 
    );

$wp_customize->add_control( new Villa_Estate_Dropdown_Chooser( $wp_customize, 'villa_estate_theme_options[property_villa_content_property_' . $i . ']', 
    array(
        'label'             => sprintf( esc_html__( 'Select property %d', 'villa-estate' ), $i ),
        'section'           => 'villa_estate_property_villa_section',
        'choices'           => villa_estate_property_choices(),
        'active_callback'   => 'villa_estate_is_property_villa_section_content_property_enable',
        ) 
    ) );

endfor;

// Property Villa content setting
$wp_customize->add_setting('villa_estate_theme_options[property_villa_read_more_btn_label]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'			=> 'postMessage',
        'default'           => $options['property_villa_read_more_btn_label'],
        )
    );

$wp_customize->add_control('villa_estate_theme_options[property_villa_read_more_btn_label]',
    array(
        'section'			=> 'villa_estate_property_villa_section',
        'label'				=> esc_html__( 'Read More Button Label', 'villa-estate' ),
        'type'          	=>'text',
        'active_callback'	=> 'villa_estate_is_property_villa_section_enable'
        )
    );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[property_villa_read_more_btn_label]',
        array(
            'selector'            => '#property-villa div.view-all a.btn',
            'settings'            => 'villa_estate_theme_options[property_villa_read_more_btn_label]',
            'fallback_refresh'    => true,
            'container_inclusive' => false,
            'render_callback'     => 'villa_estate_property_villa_read_more_btn_label_partial',
            ) 
        );
}

$wp_customize->add_setting( 'villa_estate_theme_options[property_villa_read_more_btn_url]',
    array(
        'sanitize_callback' => 'esc_url_raw',
        )
    );

$wp_customize->add_control( 'villa_estate_theme_options[property_villa_read_more_btn_url]',
    array(
        'label'             => esc_html__( 'Button URL', 'villa-estate' ),
        'section'           => 'villa_estate_property_villa_section',
        'active_callback'   => 'villa_estate_is_property_villa_section_enable',
        'type'              => 'url',
        ) 
    );
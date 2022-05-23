<?php
/**
 * Topbar options
 *
 * @package Theme Palace
 * @subpackage Villa Estate
 * @since Villa Estate 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'villa_estate_top_bar_section',
    array(
        'title'             => esc_html__( 'Topbar','villa-estate' ),
        'description'       => esc_html__( 'Topbar options.', 'villa-estate' ),
        'panel'             => 'villa_estate_front_page_panel',
    )
);

// Topbar content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[top_bar_section_enable]',
    array(
        'default'           =>  $options['top_bar_section_enable'],
        'sanitize_callback' => 'villa_estate_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize, 'villa_estate_theme_options[top_bar_section_enable]',
    array(
        'label'             => esc_html__( 'Topbar Enable', 'villa-estate' ),
        'section'           => 'villa_estate_top_bar_section',
        'on_off_label'      => villa_estate_switch_options(),
    ) 
) );

$wp_customize->add_setting( 'villa_estate_theme_options[topbar_icon]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           =>  $options['topbar_icon'],
) );

$wp_customize->add_control( new Villa_Estate_Icon_Picker( $wp_customize, 'villa_estate_theme_options[topbar_icon]', array(
    'label'             => esc_html__( 'Select Icon', 'villa-estate' ),
    'section'           => 'villa_estate_top_bar_section',
    'active_callback'   => 'villa_estate_is_topbar_section_enable',
) ) );

$wp_customize->add_setting( 'villa_estate_theme_options[topbar_text]',
    array(
        'default'           =>  $options['topbar_text'],
        'sanitize_callback'     => 'villa_estate_santize_allow_tag',
        'transport'             => 'postMessage',
    )
);
$wp_customize->add_control( 'villa_estate_theme_options[topbar_text]',
    array(
        'label'                 => esc_html__( 'Topbar Text', 'villa-estate' ),
        'section'               => 'villa_estate_top_bar_section',
        'type'                  => 'textarea',
        'active_callback'   => 'villa_estate_is_topbar_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'villa_estate_theme_options[topbar_text]',
        array(
            'selector'            => '#top-navigation .contact-info li',
            'settings'            => 'villa_estate_theme_options[topbar_text]',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'villa_estate_topbar_text_partial',
        )
    );
}

// Topbar content enable control and setting
$wp_customize->add_setting( 'villa_estate_theme_options[social_menu_enable]', array(
    'default'           =>  $options['social_menu_enable'],
    'sanitize_callback' => 'villa_estate_sanitize_switch_control',
) );

$wp_customize->add_control( new Villa_Estate_Switch_Control( $wp_customize, 'villa_estate_theme_options[social_menu_enable]', array(
    'label'             => esc_html__( 'Social Menu Enable', 'villa-estate' ),
    'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show social menu.', 'villa-estate' ), esc_html__( 'Click Here', 'villa-estate' ), esc_html__( 'to create menu', 'villa-estate' ) ),
    'section'           => 'villa_estate_top_bar_section',
    'active_callback'   => 'villa_estate_is_topbar_section_enable',
    'on_off_label'      => villa_estate_switch_options(),
) ) );
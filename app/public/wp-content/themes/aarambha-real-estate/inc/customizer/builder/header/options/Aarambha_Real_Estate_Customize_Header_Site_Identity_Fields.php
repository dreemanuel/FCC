<?php
/**
 * Aarambha Real Estate Theme Customizer Header Site Identify settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Header_Site_Identity_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_header_site_identity_group_settings' => [
                'type'              => 'group',
                'section'           => 'title_tagline',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'custom_logo',
							'aarambha_real_estate_header_site_logo_position',
                            'aarambha_real_estate_header_site_title_enable',
                            'blogname',
                            'aarambha_real_estate_header_site_tagline_enable',
                            'blogdescription',
                            'site_icon'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_site_identify_note_two',
                            'aarambha_real_estate_header_site_title_typo',
                            'aarambha_real_estate_header_site_tagline_typo',
                            'aarambha_real_estate_header_site_identify_note_three',
                            'aarambha_real_estate_header_site_identify_padding',
                            'aarambha_real_estate_header_site_identify_margin'
                        )
                    )
                ]
            ],
            // Site title
            'aarambha_real_estate_header_site_title_enable' => [
                'type'              => 'toggle',
                'default'           => ['desktop'=> 'true'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Site Title', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 30
            ],
            // Site tagline
            'aarambha_real_estate_header_site_tagline_enable' => [
                'type'              => 'toggle',
                'default'           => ['desktop'=> 'true'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Tagline', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 40
            ],
            // Note Two
            'aarambha_real_estate_header_site_identify_note_two' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SITE TITLE & TAGLINE', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 65,
            ],
            // Site Title
            'aarambha_real_estate_header_site_title_typo' => [
                'type'              => 'typography',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_typography' ],
                'label'             => esc_html__( 'Site Title', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 70,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'units'             => [ 'px', 'rem', 'pt', 'em','vw' ],
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'aarambha-real-estate' ),
                    'color_2'           => esc_html__( 'Hover', 'aarambha-real-estate' )
                ],
                'inherits'          => [
                    'color_1'           => 'var(--color-link)',
                    'color_2'           => 'var(--color-link-hover)'
                ],
				'fields'            => ['font_family'=>true,'font_variant'=>true,'font_size'=>true,'letter_spacing'=>true,'colors'=>true]
            ],
            // Site Tagline
            'aarambha_real_estate_header_site_tagline_typo' => [
                'type'              => 'typography',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_typography' ],
                'label'             => esc_html__( 'Tagline', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 75,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'units'             => [ 'px', 'rem', 'pt', 'em','vw' ],
                'inherits'          => [
                    'color_1'           => 'var(--color-link)'
                ],
				'fields'            => ['font_size'=>true,'colors'=>true]
            ],
            // Note Three
            'aarambha_real_estate_header_site_identify_note_three' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SITE IDENTIFY CONTAINER', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 80,
            ],
            // Padding
            'aarambha_real_estate_header_site_identify_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '20px',
                        'linked'            => 'off'
                    ],
                    'tablet'           => [
                        'side_1'            => '10px',
                        'side_3'            => '10px',
                        'linked'            => 'off'
                    ],
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set container padding.', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 85,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_header_site_identify_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set container margin.', 'aarambha-real-estate' ),
                'section'           => 'title_tagline',
                'priority'          => 90,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Header_Site_Identity_Fields();

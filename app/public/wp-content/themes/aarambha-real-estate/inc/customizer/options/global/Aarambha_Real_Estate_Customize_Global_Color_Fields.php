<?php
/**
 * Aarambha Real Estate Theme Customizer Color settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Color_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Accent Color
            'aarambha_real_estate_accent_color' => [
                'type'              => 'color',
                'default'           => [
                    'color_1'           => '#009FB7',
                    'color_2'           => '#264561'
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Accent', 'aarambha-real-estate' ),
                'section'           => 'colors',
                'priority'          => 10,
                'colors'            => [
                    'color_1'           => esc_html__( 'Primary', 'aarambha-real-estate' ),
                    'color_2'           => esc_html__( 'Secondary', 'aarambha-real-estate' )
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-accent)',
                    'color_2'           => 'var(--color-accent-secondary)'
                ]
            ],
            // H1-H6 Color
            'aarambha_real_estate_heading_color' => [
                'type'              => 'color',
                'default'           => [
                    'color_1'           => '#3d4151'
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'H1 -H6', 'aarambha-real-estate' ),
                'section'           => 'colors',
                'priority'          => 15,
                'inherits'            => [
                    'color_1'           => 'var(--color-heading)'
                ]
            ],
            // Text Color
            'aarambha_real_estate_text_color' => [
                'type'              => 'color',
                'default'           => [
                    'color_2'           => '#6d707d'
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Base Text', 'aarambha-real-estate' ),
                'section'           => 'colors',
                'priority'          => 20,
                'colors'            => [
                    'color_2'           => esc_html__( 'Color 2', 'aarambha-real-estate' )
                ],
                'inherits'            => [
                    'color_2'           => 'var(--color-2)'
                ]
            ],
            // Link Color
            'aarambha_real_estate_link_color' => [
                'type'              => 'color',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Link', 'aarambha-real-estate' ),
                'section'           => 'colors',
                'priority'          => 25,
                'colors'            => [
                    'color_1'           => esc_html__( 'Normal', 'aarambha-real-estate' ),
                    'color_2'           => esc_html__( 'Hover', 'aarambha-real-estate' ),
                    'color_3'           => esc_html__( 'Visited', 'aarambha-real-estate' )
                ],
                'inherits'            => [
                    'color_1'           => 'var(--color-1)',
                    'color_2'           => 'var(--color-accent)',
                    'color_3'           => 'var(--color-3)'
                ]
            ],
            // Background Color
            'aarambha_real_estate_background_color' => [
                'type'              => 'color',
                'default'           => [
                    'color_1'           => '#ffffff'
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Background', 'aarambha-real-estate' ),
                'section'           => 'colors',
                'priority'          => 30,
                'colors'            => [
                    'color_1'           => esc_html__( 'BG Color', 'aarambha-real-estate' )
                ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Global_Color_Fields();

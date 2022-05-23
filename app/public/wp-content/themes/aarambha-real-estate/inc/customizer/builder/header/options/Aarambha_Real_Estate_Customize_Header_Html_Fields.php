<?php
/**
 * Aarambha Real Estate Theme Customizer Header HTML settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Header_Html_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_header_html_group_settings' => [
                'type'              => 'group',
                'section'           => 'html',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'custom_logo',
                            'aarambha_real_estate_header_html_text'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_html_padding',
                            'aarambha_real_estate_header_html_margin'
                        )
                    )
                ]
            ],
            // Textarea
            'aarambha_real_estate_header_html_text' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'HTML', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enter Text/Simple HTML Code', 'aarambha-real-estate' ),
                'section'           => 'html',
                'priority'          => 15,
            ],
            // Padding
            'aarambha_real_estate_header_html_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_3'            => '10px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set HTML container padding.', 'aarambha-real-estate' ),
                'section'           => 'html',
                'priority'          => 55,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_header_html_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set HTML container margin.', 'aarambha-real-estate' ),
                'section'           => 'html',
                'priority'          => 60,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Header_Html_Fields();

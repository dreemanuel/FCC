<?php
/**
 * Aarambha Real Estate Theme Customizer Header Search Icon settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Header_Search_Icon_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_header_search_icon_group_settings' => [
                'type'              => 'group',
                'section'           => 'search_icon',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_search_icon_placeholder'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_search_icon_container_padding',
                            'aarambha_real_estate_header_search_icon_container_margin'
                        )
                    )
                ]
            ],
            // Placeholder
            'aarambha_real_estate_header_search_icon_placeholder' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Search...', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Placeholder', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Search Model with placeholder.', 'aarambha-real-estate' ),
                'section'           => 'search_icon',
                'priority'          => 15,
            ],
            // Padding
            'aarambha_real_estate_header_search_icon_container_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set search icon container padding.', 'aarambha-real-estate' ),
                'section'           => 'search_icon',
                'priority'          => 31,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_header_search_icon_container_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set search icon container margin.', 'aarambha-real-estate' ),
                'section'           => 'search_icon',
                'priority'          => 32,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Header_Search_Icon_Fields();

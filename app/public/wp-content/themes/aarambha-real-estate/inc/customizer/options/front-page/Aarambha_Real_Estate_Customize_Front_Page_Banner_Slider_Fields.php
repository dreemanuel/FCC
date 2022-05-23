<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Header Banner settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_Banner_Slider_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_front_page_banner_slider_group_settings' => [
                'type'              => 'group',
                'section'           => 'aarambha_real_estate_front_page_banner_section',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_banner_slider_limit',
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_banner_slider_padding',
                        )
                    )
                ]
            ],

            // Number of Slides
            'aarambha_real_estate_front_page_banner_slider_limit' => [
                'type'              => 'range',
                'default'           => ['desktop' => 5 ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Slides Limit', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_banner_section',
                'priority'          => 25,
                'units'             => [],
                'input_attrs'       => [
                    'min'               => 1,
                    'step'              => 1,
                    'max'               => 20
                ]
            ],
            // Padding
            'aarambha_real_estate_front_page_banner_slider_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '0px',
                        'side_3'            => '0px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set banner slider section container padding.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_banner_section',
                'priority'          => 25,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'off_sides'         => ['side_2','side_4']
            ],
        ];
    }

}
new Aarambha_Real_Estate_Customize_Front_Page_Banner_Slider_Fields();

<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Search Sections settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_Property_Search_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {

        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_front_page_search_group_settings' => [
                'type'              => 'group',
                'section'           => 'aarambha_real_estate_front_page_search_section',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_search_section_title',
                            'aarambha_real_estate_front_page_search_section_sub_title'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_search_padding',
                            'aarambha_real_estate_front_page_search_background',
                            'aarambha_real_estate_front_page_search_background_overlay'
                        )
                    )
                ]
            ],
            // Title
            'aarambha_real_estate_front_page_search_section_title' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Discover Your Place To Live', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_search_section',
                'priority'          => 10,
            ],
            // Sub Title
            'aarambha_real_estate_front_page_search_section_sub_title' => [
                'type'              => 'textarea',
                'default'           => esc_html__( 'Get Started In Few Clicks', 'aarambha-real-estate'),
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_search_section',
                'priority'          => 15,
            ],
            // Background Image
            'aarambha_real_estate_front_page_search_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set section container background image.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_search_section',
                'priority'          => 20,
                'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
            ],
            // Background Overlay
            'aarambha_real_estate_front_page_search_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg-4)'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set section container background overlay as color or gradient colors.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_search_section',
                'priority'          => 21,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-4)'
                ],
                'fields'            => ['colors' => true],
            ],
            // Padding
            'aarambha_real_estate_front_page_search_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '140px',
                        'side_3'            => '140px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set featured properties section container padding.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_search_section',
                'priority'          => 25,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'off_sides'         => ['side_2','side_4']
            ],
        ];
    }

}
new Aarambha_Real_Estate_Customize_Front_Page_Property_Search_Fields();
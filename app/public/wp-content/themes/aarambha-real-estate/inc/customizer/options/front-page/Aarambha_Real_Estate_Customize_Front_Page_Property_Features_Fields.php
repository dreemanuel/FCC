<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Property Featured Sections settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_Property_Features_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_front_page_featured_properties_group_settings' => [
                'type'              => 'group',
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_featured_properties_section_heading',
                            'aarambha_real_estate_front_page_featured_properties_section_sub_heading',
                            'aarambha_real_estate_front_page_featured_properties_limit'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_featured_properties_sep_one',
                            'aarambha_real_estate_front_page_featured_properties_background',
                            'aarambha_real_estate_front_page_featured_properties_background_overlay'
                        )
                    )
                ]
            ],
            // Heading
            'aarambha_real_estate_front_page_featured_properties_section_heading' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Feature Listings', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 15,
            ],
            // Sub Title
            'aarambha_real_estate_front_page_featured_properties_section_sub_heading' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 15,
            ],
            // Number of Slides
            'aarambha_real_estate_front_page_featured_properties_limit' => [
                'type'              => 'range',
                'default'           => ['desktop' => 3 ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Posts Limit', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 25,
                'units'             => [],
                'input_attrs'       => [
                    'min'               => 1,
                    'step'              => 1,
                    'max'               => 20
                ]
            ],
            // Section Separator
            'aarambha_real_estate_front_page_featured_properties_sep_one' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SECTION STYLING', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 30,
            ],
            // Background Image
            'aarambha_real_estate_front_page_featured_properties_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set background image for container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 35,
                'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
            ],
            // Background Overlay
            'aarambha_real_estate_front_page_featured_properties_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg)'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set background overlay color for container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_features_section',
                'priority'          => 36,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)'
                ],
                'fields'            => ['colors' => true],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Front_Page_Property_Features_Fields();

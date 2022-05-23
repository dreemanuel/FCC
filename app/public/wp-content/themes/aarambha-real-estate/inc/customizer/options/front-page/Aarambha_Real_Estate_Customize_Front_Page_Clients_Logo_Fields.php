<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Clients Logo Section settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_Clients_Logo_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_front_page_clients_logo_group_settings' => [
                'type'              => 'group',
                'section'           => 'aarambha_real_estate_front_page_clients_section',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_clients_logo_section_heading',
                            'aarambha_real_estate_front_page_clients_logo_section_sub_heading',
                            'aarambha_real_estate_front_page_clients_logo_lists',
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_front_page_clients_logo_section_note_one',
                            'aarambha_real_estate_front_page_clients_logo_section_background',
                            'aarambha_real_estate_front_page_clients_logo_section_background_overlay'

                        )
                    )
                ]
            ],
            // Heading
            'aarambha_real_estate_front_page_clients_logo_section_heading' => [
                'type'              => 'text',
                'default'           => esc_html__( 'our partners', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_clients_section',
                'priority'          => 14,
            ],
            // Sub Title
            'aarambha_real_estate_front_page_clients_logo_section_sub_heading' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_clients_section',
                'priority'          => 14,
            ],
            // Note One
            'aarambha_real_estate_front_page_clients_logo_section_note_one' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SECTION STYLING', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_clients_section',
                'priority'          => 19,
            ],
            // Background Image
            'aarambha_real_estate_front_page_clients_logo_section_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Background Image for container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_clients_section',
                'priority'          => 25,
                'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
            ],
            // Background Overlay
            'aarambha_real_estate_front_page_clients_logo_section_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg-4)'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set background overlay color for container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_clients_section',
                'priority'          => 26,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-4)'
                ],
                'fields'            => ['colors' => true],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Front_Page_Clients_Logo_Fields();

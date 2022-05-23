<?php
/**
 * Aarambha Real Estate Theme Customizer Page Header settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Page_Header_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Background Image
			'aarambha_real_estate_page_header_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'To set the background image for the page header container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_page_header_section',
				'priority'          => 5,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
			// Background Overlay
			'aarambha_real_estate_page_header_background_overlay' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set Background overlay color on page header container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_page_header_section',
				'priority'          => 5,
				'inherits'          => [
					'color_1'           => 'var(--color-bg-2)'
				],
				'fields'            => ['colors' => true],
			]
        ];

    }

}
new Aarambha_Real_Estate_Customize_Global_Page_Header_Fields();

<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Services Sections settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_Services_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'aarambha_real_estate_front_page_services_group_settings' => [
				'type'              => 'group',
				'section'           => 'aarambha_real_estate_front_page_services_section',
				'priority'          => 10,
				'choices'           => [
					'normal'            => array(
						'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_front_page_services_section_heading',
                            'aarambha_real_estate_front_page_services_section_sub_heading',
							'aarambha_real_estate_front_page_services_page'

						)
					),
					'hover'         => array(
						'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_front_page_services_heading_one',
							'aarambha_real_estate_front_page_services_background',
							'aarambha_real_estate_front_page_services_background_overlay'
						)
					)
				]
			],
			// Heading
			'aarambha_real_estate_front_page_services_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'why people choose us', 'aarambha-real-estate' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Title', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_services_section',
				'priority'          => 10,
			],
            // Sub Title
            'aarambha_real_estate_front_page_services_section_sub_heading' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_services_section',
                'priority'          => 15,
            ],
			// Heading One
			'aarambha_real_estate_front_page_services_heading_one' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'SECTION STYLING', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_services_section',
				'priority'          => 21,
			],
			// Select Page
			'aarambha_real_estate_front_page_services_page' => [
				'type'              => 'select',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Select Page', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_services_section',
				'priority'          => 25,
				'choices'  			=> Aarambha_Real_Estate_Helper::get_posts(
					array(
						'posts_per_page' => -1,
						'post_type'      => 'page'
					)
				)
			],
			// Background Image
			'aarambha_real_estate_front_page_services_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set background image for container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_services_section',
				'priority'          => 30,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
			// Background Overlay
			'aarambha_real_estate_front_page_services_background_overlay' => [
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
				'section'           => 'aarambha_real_estate_front_page_services_section',
				'priority'          => 31,
				'inherits'          => [
					'color_1'           => 'var(--color-bg-4)'
				],
				'fields'            => ['colors' => true],
			]
		];
	}

}
new Aarambha_Real_Estate_Customize_Front_Page_Services_Fields();

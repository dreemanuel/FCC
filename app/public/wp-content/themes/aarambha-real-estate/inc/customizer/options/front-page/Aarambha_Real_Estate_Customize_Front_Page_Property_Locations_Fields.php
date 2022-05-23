<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Property Locations Sections settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_Property_Locations_Fields extends Aarambha_Real_Estate_Customize_Base_Field {


	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Grouping Settings
			'aarambha_real_estate_front_page_featured_categories_group_settings' => [
				'type'              => 'group',
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 10,
				'choices'           => [
					'normal'            => array(
						'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_front_page_property_locations_section_heading',
                            'aarambha_real_estate_front_page_property_locations_section_sub_heading',
							'aarambha_real_estate_front_page_property_locations_limits',
							'aarambha_real_estate_front_page_property_location_view_all_btn',
							'aarambha_real_estate_front_page_property_locations_view_all_btn_link'
						)
					),
					'hover'         => array(
						'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_front_page_property_locations_heading_one',
							'aarambha_real_estate_front_page_property_locations_background',
							'aarambha_real_estate_front_page_property_locations_background_overlay'
						)
					)
				]
			],
			// Section Heading
			'aarambha_real_estate_front_page_property_locations_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'Reality Property Location', 'aarambha-real-estate' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Title', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 14,
			],
            // Sub Title
            'aarambha_real_estate_front_page_property_locations_section_sub_heading' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_property_locations_section',
                'priority'          => 15,
            ],
			// Number of posts
			'aarambha_real_estate_front_page_property_locations_limits' => [
				'type'              => 'range',
				'default'           => ['desktop' => 6],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Posts Limit', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 16,
				'units'             => [],
				'input_attrs'       => [
					'min'               => 0,
					'max'               => 20
				]
			],
            // Button Text
			'aarambha_real_estate_front_page_property_location_view_all_btn' => [
				'type'              => 'toggle',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
				'label'             => esc_html__( 'View All', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Toggle to show/hide view all button.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 18,
			],
			// Button URL
			'aarambha_real_estate_front_page_property_locations_view_all_btn_link' => [
				'type'              => 'text',
				'default'           => '#',
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Button Link', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 19,
			],
			// Heading One
			'aarambha_real_estate_front_page_property_locations_heading_one' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'SECTION STYLING', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 20,
			],
			// Background Image
			'aarambha_real_estate_front_page_property_locations_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set background image for container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 25,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
			// Background Overlay
			'aarambha_real_estate_front_page_property_locations_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'colors'            => [
						'color_1'           => 'var(--color-bg-4)'
					]
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_property_locations_section',
				'priority'          => 26,
				'inherits'          => [
					'color_1'           => 'var(--color-bg-4)'
				],
				'fields'            => ['colors' => true],
			]
		];
	}

}
new Aarambha_Real_Estate_Customize_Front_Page_Property_Locations_Fields();

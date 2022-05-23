<?php
/**
 * Aarambha Real Estate Theme Customizer 404 Page Content settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_404_Page_Content_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Grouping Settings
			'aarambha_real_estate_404_error_grouping_settings' => [
				'type'              => 'group',
				'section'           => 'aarambha_real_estate_404_page_content_section',
				'priority'          => 10,
				'choices'           => [
					'normal'            => array(
						'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_404_error_page_content_elements',
							'aarambha_real_estate_404_error_image'
						)
					),
					'hover'         => array(
						'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_404_error_background',
						)
					)
				]
			],
            // Error Page Content
            'aarambha_real_estate_404_error_page_content_elements' => [
                'type'              => 'sortable',
                'default'           => ['title','subtitle','button'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable page content elements and order their list with drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_404_page_content_section',
                'priority'          => 15,
                'choices'           => [
                    'image'             => esc_html__( 'Image', 'aarambha-real-estate' ),
                    'title'             => esc_html__( 'Title', 'aarambha-real-estate' ),
                    'subtitle'          => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                    'button'            => esc_html__( 'Button', 'aarambha-real-estate' ),
                    'search'            => esc_html__( 'Search', 'aarambha-real-estate' )
                ],
            ],
            // Image
            'aarambha_real_estate_404_error_image' => [
                'type'              => 'image',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'Image', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_404_page_content_section',
                'priority'          => 20,
            ],
			// Background Image
			'aarambha_real_estate_404_error_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set background image for 404 page content.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_404_page_content_section',
				'priority'          => 75,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
        ];
    }

}
new Aarambha_Real_Estate_Customize_404_Page_Content_Fields();

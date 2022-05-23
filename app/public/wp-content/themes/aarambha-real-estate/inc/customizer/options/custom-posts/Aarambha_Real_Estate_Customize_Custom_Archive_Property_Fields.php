<?php
/**
 * Aarambha Real Estate Theme Customizer Property Archive Custom Post Type Fields
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Custom_Archive_Property_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		// Page Header
		$this->args = [
			// Page Header
			'aarambha_real_estate_property_archive_page_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-title','breadcrumb'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable Page Header Elements and manage lists using drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_property_archive_page_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'        => esc_html__( 'Title', 'aarambha-real-estate' ),
					'post-desc'         => esc_html__( 'Description', 'aarambha-real-estate' ),
					'breadcrumb'        => esc_html__( 'Breadcrumb', 'aarambha-real-estate' )
				],
			]
		];
		// Post Content
		$this->args = array_merge( $this->args,
			[
				// Image Size
				'aarambha_real_estate_property_archive_posts_image_size' => [
					'type'              => 'buttonset',
					'default'           => ['desktop' => 'medium'],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
					'label'             => esc_html__( 'Image Size', 'aarambha-real-estate' ),
					'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_property_archive_post_content_section',
					'priority'          => 20,
					'choices' 			=> [
						'thumbnail'         => esc_html__( 'Small', 'aarambha-real-estate' ),
						'medium'            => esc_html__( 'Medium', 'aarambha-real-estate' ),
						'medium_large'      => esc_html__( 'Medium Large', 'aarambha-real-estate' ),
						'large'             => esc_html__( 'Large', 'aarambha-real-estate' ),
					]
				],
			]
		);
	}

}
new Aarambha_Real_Estate_Customize_Custom_Archive_Property_Fields();

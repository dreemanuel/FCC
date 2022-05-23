<?php
/**
 * Aarambha Real Estate Theme Customizer Property Post Fields
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Property_Post_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		// Page Header
		$this->args = [
			// Post Header
			'aarambha_real_estate_property_single_post_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-title','breadcrumb'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable elements and sort list by drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_property_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'        => esc_html__( 'Post Title', 'aarambha-real-estate' ),
					'post-meta'         => esc_html__( 'Post Meta', 'aarambha-real-estate' ),
					'breadcrumb'        => esc_html__( 'Breadcrumb', 'aarambha-real-estate' )
				],
			],
			// Meta Elements
			'aarambha_real_estate_property_single_post_meta_elements' => [
				'type'              => 'sortable',
				'default'           => ['author','post-date'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable Post Meta Elements and sort their order by drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_property_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'author'            => esc_html__( 'Author', 'aarambha-real-estate' ),
					'comments'          => esc_html__( 'Comments', 'aarambha-real-estate' ),
					'post-date'         => esc_html__( 'Post Date', 'aarambha-real-estate' ),
					'location'        	=> esc_html__( 'Property Location', 'aarambha-real-estate' ),
					'status'            => esc_html__( 'Property Status', 'aarambha-real-estate' ),
					'types'             => esc_html__( 'Property Type', 'aarambha-real-estate' )

				],
			]
		];
		// Post Content
		$this->args = array_merge($this->args,
			[
				'aarambha_real_estate_property_post_elements' => [
					'type'              => 'sortable',
					'default'           => ['address','main','other','gallery','features','floor','video','author'],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
					'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
					'description'       => esc_html__( 'To reorder elements drag and drop them.', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_property_single_post_content_section',
					'priority'          => 5,
					'choices'           => [
						'address'           => esc_html__( 'Address', 'aarambha-real-estate' ),
						'main'              => esc_html__( 'Main Detail', 'aarambha-real-estate' ),
						'other'             => esc_html__( 'Other Detail', 'aarambha-real-estate' ),
						'gallery'           => esc_html__( 'Gallery', 'aarambha-real-estate' ),
						'features'          => esc_html__( 'Features', 'aarambha-real-estate' ),
						'floor'             => esc_html__( 'Floor Plan', 'aarambha-real-estate' ),
						'video'             => esc_html__( 'Video', 'aarambha-real-estate' ),
						'author'            => esc_html__( 'Author Box', 'aarambha-real-estate' )
					],
				],
			]
		);
		// Related Posts
		$this->args = array_merge($this->args,
			[
				// Enable/Disable
				'aarambha_real_estate_property_related_posts_enable' => [
					'type'              => 'toggle',
					'default'           => ['desktop'=>'true'],
					'section'           => 'aarambha_real_estate_property_single_related_posts_section',
					'priority'          => 20,
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
					'label'             => esc_html__( 'Related Posts', 'aarambha-real-estate' ),
				],

				// Number of posts
				'aarambha_real_estate_property_related_posts_limit' => [
					'type'              => 'range',
					'default'           => ['desktop' => 3],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
					'label'             => esc_html__( 'No. of Posts', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_property_single_related_posts_section',
					'priority'          => 25,
					'units'             => [],
					'input_attrs'       => [
						'min'               => 0,
						'max'               => 20
					]
				],
				// Thumbnail Size
				'aarambha_real_estate_property_related_posts_featured_img_size' => [
					'type'              => 'buttonset',
					'default'           => ['desktop' => 'medium'],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
					'label'             => esc_html__( 'Image Size', 'aarambha-real-estate' ),
					'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_property_single_related_posts_section',
					'priority'          => 35,
					'choices'           => [
						'thumbnail'         => esc_html__( 'Small', 'aarambha-real-estate' ),
						'medium'            => esc_html__( 'Medium', 'aarambha-real-estate' ),
						'medium_large'      => esc_html__( 'Medium Large', 'aarambha-real-estate' ),
						'large'             => esc_html__( 'Large', 'aarambha-real-estate' )
					],
				],
			]
		);
	}

}
new Aarambha_Real_Estate_Customize_Property_Post_Fields();

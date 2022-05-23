<?php
/**
 * Aarambha Real Estate Theme Customizer Agent Custom Post Type Fields
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Agent_Post_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		// Page Header
		$this->args = [
			// Page Header
			'aarambha_real_estate_agent_single_post_header_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-title','breadcrumb'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable Page Header Elements and manage lists using drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_agent_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'post-title'        => esc_html__( 'Page Title', 'aarambha-real-estate' ),
					'breadcrumb'        => esc_html__( 'Breadcrumb', 'aarambha-real-estate' )
				],
			]
		];
		// Post Content
		$this->args = array_merge($this->args,
			[
				// Elements
				'aarambha_real_estate_agent_post_elements' => [
					'type'              => 'sortable',
					'default'           => ['contact-info','content','social','properties'],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
					'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
					'description'       => esc_html__( 'To reorder elements drag and drop them.', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_agent_single_post_content_section',
					'priority'          => 10,
					'choices'           => [
						'contact-info'      => esc_html__( 'Contact Info', 'aarambha-real-estate' ),
						'content'           => esc_html__( 'Content', 'aarambha-real-estate' ),
						'social'            => esc_html__( 'Social Profile', 'aarambha-real-estate' ),
						'properties'        => esc_html__( 'Related Properties', 'aarambha-real-estate' )
					],
				],
			]
		);
		// Related Properties
		$this->args = array_merge($this->args,
			[
				// Number of posts
				'aarambha_real_estate_agent_property_posts_limit' => [
					'type'              => 'range',
					'default'           => ['desktop' => 6],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
					'label'             => esc_html__( 'Posts Per Page', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_agent_single_related_posts_section',
					'priority'          => 25,
					'units'             => [],
					'input_attrs'       => [
						'min'               => 0,
						'max'               => 20
					]
				],
				// Thumbnail Size
				'aarambha_real_estate_agent_property_posts_featured_img_size' => [
					'type'              => 'buttonset',
					'default'           => ['desktop' => 'medium'],
					'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
					'label'             => esc_html__( 'Image Size', 'aarambha-real-estate' ),
					'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'aarambha-real-estate' ),
					'section'           => 'aarambha_real_estate_agent_single_related_posts_section',
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
new Aarambha_Real_Estate_Customize_Agent_Post_Fields();

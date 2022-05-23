<?php
/**
 * Aarambha Real Estate Theme Customizer Single Post Header settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Single_Post_Header_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Post Header
            'aarambha_real_estate_single_post_header_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-title','breadcrumb'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable lists of page header elements and rearrange the order by drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_post_header_section',
                'priority'          => 15,
                'choices'           => [
                    'post-title'        => esc_html__( 'Post Title', 'aarambha-real-estate' ),
                    'post-meta'         => esc_html__( 'Post Meta', 'aarambha-real-estate' ),
                    'breadcrumb'        => esc_html__( 'Breadcrumb', 'aarambha-real-estate' )
                ],
            ],
			// Meta Elements
			'aarambha_real_estate_single_post_meta_elements' => [
				'type'              => 'sortable',
				'default'           => ['author','post-date'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'To display post meta data and rearrange them with drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_single_post_header_section',
				'priority'          => 15,
				'choices'           => [
					'author'            => esc_html__( 'Author', 'aarambha-real-estate' ),
					'comments'          => esc_html__( 'Comments', 'aarambha-real-estate' ),
					'categories'        => esc_html__( 'Categories', 'aarambha-real-estate' ),
					'tags'              => esc_html__( 'Tags', 'aarambha-real-estate' ),
					'post-date'         => esc_html__( 'Post Date', 'aarambha-real-estate' )
				],
			]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Single_Post_Header_Fields();

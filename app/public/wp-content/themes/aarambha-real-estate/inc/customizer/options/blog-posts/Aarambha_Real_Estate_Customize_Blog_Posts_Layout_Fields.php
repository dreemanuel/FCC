<?php
/**
 * Aarambha Real Estate Theme Customizer Blog Posts Layout settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Blog_Posts_Layout_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Posts Elements
            'aarambha_real_estate_blog_posts_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-meta','post-title','post-excerpt'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Content Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable lists for blog post content elements and rearrange the order by drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_blog_posts_layout_section',
                'priority'          => 10,
                'choices'           => [
                    'post-title'        => esc_html__( 'Post Title', 'aarambha-real-estate' ),
                    'post-meta'         => esc_html__( 'Post Meta', 'aarambha-real-estate' ),
                    'post-excerpt'      => esc_html__( 'Post Excerpt', 'aarambha-real-estate' ),
                    'read-more'         => esc_html__( 'Read More', 'aarambha-real-estate' )
                ],
            ],
			// Meta Elements
			'aarambha_real_estate_blog_posts_meta_elements' => [
				'type'              => 'sortable',
				'default'           => ['categories','author'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Post Meta Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable Post Meta elements and rearrange lists using drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_blog_posts_layout_section',
				'priority'          => 15,
				'choices'           => [
					'author'            => esc_html__( 'Author', 'aarambha-real-estate' ),
					'categories'        => esc_html__( 'Categories', 'aarambha-real-estate' ),
					'tags'              => esc_html__( 'Tags', 'aarambha-real-estate' ),
                    'date'              => esc_html__( 'Post Date', 'aarambha-real-estate' )
				],
			]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Blog_Posts_Layout_Fields();

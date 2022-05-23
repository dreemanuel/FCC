<?php
/**
 * Aarambha Real Estate Theme Customizer Single Post Element settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Single_Post_Content_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [

            // Entry Header
            'aarambha_real_estate_single_post_content_entry_header_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-cats','post-title'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Header Elements', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable to show Header elements in posts and rearrange them by drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_post_content_section',
                'priority'          => 5,
                'choices'           => [
                    'post-cats'         => esc_html__( 'Categories', 'aarambha-real-estate' ),
                    'post-title'        => esc_html__( 'Post Title', 'aarambha-real-estate' )
                ]
            ],

            // Entry Footer
            'aarambha_real_estate_single_post_content_entry_footer_elements' => [
                'type'              => 'sortable',
                'default'           => ['tags','post-comments','post-navigation'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Footer Elements', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'To display lists of Footer Elements, enable them. And sort them by drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_post_content_section',
                'priority'          => 10,
                'choices'           => [
					'tags'              => esc_html__( 'Tags', 'aarambha-real-estate' ),
                    'post-comments'     => esc_html__( 'Comments', 'aarambha-real-estate' ),
                    'post-navigation'   => esc_html__( 'Post Navigation', 'aarambha-real-estate' ),
                    'author-box'        => esc_html__( 'Author Box', 'aarambha-real-estate' ),
                    'related-posts'     => esc_html__( 'Related Posts', 'aarambha-real-estate' )
                ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Single_Post_Content_Fields();

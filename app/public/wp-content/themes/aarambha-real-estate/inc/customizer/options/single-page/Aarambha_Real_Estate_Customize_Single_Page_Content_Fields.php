<?php
/**
 * Aarambha Real Estate Theme Customizer Single Page Element settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Single_Page_Content_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Entry Header
            'aarambha_real_estate_single_page_content_entry_header_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-title'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Header Elements', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_page_content_section',
                'priority'          => 5,
                'choices'           => [
                    'post-title'        => esc_html__( 'Post Title', 'aarambha-real-estate' )
                ]
            ],
            // Page Content
            'aarambha_real_estate_single_page_content_entry_footer_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-comments'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Footer Elements', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_page_content_section',
                'priority'          => 10,
                'choices'           => [
                    'post-comments'     => esc_html__( 'Comments', 'aarambha-real-estate' )
                ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Single_Page_Content_Fields();

<?php
/**
 * Aarambha Real Estate Theme Customizer blog page header settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Blog_Page_Header_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Page Header
            'aarambha_real_estate_blog_page_header_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-title','breadcrumb'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable lists of page header elements and rearrange the order by drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_blog_page_header_section',
                'priority'          => 15,
                'choices'           => [
                    'post-title'        => esc_html__( 'Title', 'aarambha-real-estate' ),
                    'post-desc'         => esc_html__( 'Description', 'aarambha-real-estate' ),
                    'breadcrumb'        => esc_html__( 'Breadcrumb', 'aarambha-real-estate' )
                ],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Blog_Page_Header_Fields();

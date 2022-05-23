<?php
/**
 * Aarambha Real Estate Theme Customizer Single Page Header settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Single_Page_Header_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Page Header
            'aarambha_real_estate_single_page_header_elements' => [
                'type'              => 'sortable',
                'default'           => ['post-title','breadcrumb'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable Page Header Elements and rearrange order with drag and drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_page_header_section',
                'priority'          => 15,
                'choices'           => [
                    'post-title'        => esc_html__( 'Page Title', 'aarambha-real-estate' ),
                    'breadcrumb'        => esc_html__( 'Breadcrumb', 'aarambha-real-estate' )
                ],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Single_Page_Header_Fields();

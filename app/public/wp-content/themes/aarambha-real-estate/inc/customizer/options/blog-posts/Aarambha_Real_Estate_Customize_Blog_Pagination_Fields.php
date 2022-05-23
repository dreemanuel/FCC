<?php
/**
 * Aarambha Real Estate Theme Customizer Blog Pagination settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Blog_Pagination_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Pagination Type
            'aarambha_real_estate_blog_pagination_type' => [
                'type'              => 'select',
                'default'           => 'nxt-prv',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_choices' ],
                'label'             => esc_html__( 'Pagination Type', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_blog_pagination_section',
                'priority'          => 15,
                'choices'           => [
                    'nxt-prv'           => esc_html__( 'Next/Prev', 'aarambha-real-estate' ),
                    'numeric'           => esc_html__( 'Numeric', 'aarambha-real-estate' )
                ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Blog_Pagination_Fields();

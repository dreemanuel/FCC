<?php
/**
 * Aarambha Real Estate Theme Customizer Post Title settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Blog_Post_Title_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Title Tag
            'aarambha_real_estate_blog_post_title_tag' => [
                'type'              => 'buttonset',
                'default'           => ['desktop' => 'h2'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
                'label'             => esc_html__( 'Heading Tag', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_blog_post_title_section',
                'priority'          => 15,
                'choices' 			=> array(
                    'h1'                => esc_html__( 'H1', 'aarambha-real-estate' ),
                    'h2'                => esc_html__( 'H2', 'aarambha-real-estate' ),
                    'h3'                => esc_html__( 'H3', 'aarambha-real-estate' ),
                    'h4'                => esc_html__( 'H4', 'aarambha-real-estate' ),
                    'h5'                => esc_html__( 'H5', 'aarambha-real-estate' ),
                    'h6'                => esc_html__( 'H6', 'aarambha-real-estate' )
                )
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Blog_Post_Title_Fields();

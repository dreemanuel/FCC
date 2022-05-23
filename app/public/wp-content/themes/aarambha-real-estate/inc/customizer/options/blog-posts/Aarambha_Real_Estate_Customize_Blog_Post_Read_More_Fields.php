<?php
/**
 * Aarambha Real Estate Theme Customizer Blog Post Read More settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Blog_Post_Read_More_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Type
            'aarambha_real_estate_blog_post_read_btn_type' => [
                'type'              => 'buttonset',
                'default'           => ['desktop'=>'text'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
                'label'             => esc_html__( 'Display as', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_blog_post_read_more_section',
                'priority'          => 20,
                'choices'           => [
                    'text'              => esc_html__( 'Text', 'aarambha-real-estate' ),
                    'button'            => esc_html__( 'Button', 'aarambha-real-estate' )
                ]
            ],
            // Button Arrow
            'aarambha_real_estate_blog_post_read_more_btn_arrow' => [
                'type'              => 'toggle',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Button Arrow', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable Arrow Icon after Button/Text.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_blog_post_read_more_section',
                'priority'          => 25,
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Blog_Post_Read_More_Fields();

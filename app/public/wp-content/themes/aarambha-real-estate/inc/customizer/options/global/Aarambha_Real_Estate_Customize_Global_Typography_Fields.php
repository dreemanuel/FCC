<?php
/**
 * Aarambha Real Estate Theme Customizer Typography settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Typography_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Base Typography
            'aarambha_real_estate_base_typography' => [
                'type'              => 'typography',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_typography' ],
                'label'             => esc_html__( 'Base', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Typography for the base of your website.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_typography_section',
                'priority'          => 10,
                'fields'            => ['font_family'=>true,'font_variant'=>true]
            ]
        ];

    }

}
new Aarambha_Real_Estate_Customize_Global_Typography_Fields();

<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Back to Top Button settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Back_To_Top_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Enable
            'aarambha_real_estate_footer_back_to_top_enable' => [
                'type'              => 'toggle',
                'default'           => ['desktop'=>'true'],
                'priority'          => 5,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Scroll to Top', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable button to scroll to top.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_footer_builder_back_to_top_section',
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Back_To_Top_Fields();

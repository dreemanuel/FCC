<?php
/**
 * Aarambha Real Estate Theme Customizer Sidebar settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Sidebar_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Sticky Sidebar
            'aarambha_real_estate_sidebar_sticky' => [
                'type'              => 'toggle',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Sticky Sidebar', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Toggle to enable sticky sidebar. See the effect on content scrolling.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_sidebar_section',
                'priority'          => 15,
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Global_Sidebar_Fields();

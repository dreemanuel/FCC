<?php
/**
 * Aarambha Real Estate Theme Customizer Container Settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Container_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {


        $this->args = [
            // Max Width
            'aarambha_real_estate_container_max_width' => [
                'type'              => 'range',
                'default'           => ['desktop' => '1170px'],
                'section'           => 'aarambha_real_estate_container_section',
                'priority'          => 15,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Max Width', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Max width for container. Default value is 1170px.', 'aarambha-real-estate' ),
                'input_attrs'       => [
                    'min'               => 0,
                    'max'               => 2000
                ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Global_Container_Fields();

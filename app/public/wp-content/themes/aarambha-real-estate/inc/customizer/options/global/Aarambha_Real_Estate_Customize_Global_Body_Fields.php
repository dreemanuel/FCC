<?php
/**
 * Aarambha Real Estate Theme Customizer Body settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Body_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        // Background
        $this->args = [
            'aarambha_real_estate_body_background' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Color or Image as the background of your site.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_body_section',
                'priority'          => 10,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)',
                ],
				'fields'            => ['background' => true, 'colors' => true,'image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Global_Body_Fields();

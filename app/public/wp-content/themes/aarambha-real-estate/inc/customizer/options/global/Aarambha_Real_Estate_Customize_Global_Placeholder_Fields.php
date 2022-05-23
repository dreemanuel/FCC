<?php
/**
 * Aarambha Real Estate Theme Customizer Placeholder settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Placeholder_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Color
            'aarambha_real_estate_placeholder_color' => [
                'type'              => 'color',
                'default'           => [
                    'color_1'           => '#dbdcdf'
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_color' ],
                'label'             => esc_html__( 'Placeholder Color', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set color in placeholder if there isn’t a featured image.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_placeholder_section',
                'priority'          => 10,
            ],
            // Image
            'aarambha_real_estate_placeholder_image' => [
                'type'              => 'image',
                'default'           => '',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'Placeholder Image', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set placeholder image for no featured image. It will replace the placeholder color.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_placeholder_section',
                'priority'          => 15,
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Global_Placeholder_Fields();

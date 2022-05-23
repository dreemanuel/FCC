<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Copyright settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Copyright_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_footer_copyright_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_copyright',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_copyright_text',
                            'aarambha_real_estate_footer_copyright_link_target'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_copyright_padding',
                            'aarambha_real_estate_footer_copyright_margin'
                        )
                    )
                ]
            ],
            // Textarea
            'aarambha_real_estate_footer_copyright_text' => [
                'type'              => 'textarea',
                'default'           => __( 'Copyright {copyright} {current_year} {site_title}', 'aarambha-real-estate' ),
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Copyright Text', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'You can insert some arbitrary HTML code tags: {current_year} and {site_title}', 'aarambha-real-estate' ),
                'section'           => 'footer_copyright',
                'priority'          => 15,
            ],
            // Link Open
            'aarambha_real_estate_footer_copyright_link_target' => [
                'type'              => 'toggle',
                'default'           => ['desktop'=>'true'],
                'section'           => 'footer_copyright',
                'priority'          => 20,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Link Open', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Toggle to enable link open in new window tab.', 'aarambha-real-estate' ),
            ],
            // Padding
            'aarambha_real_estate_footer_copyright_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_3'            => '10px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'section'           => 'footer_copyright',
                'priority'          => 55,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_footer_copyright_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'section'           => 'footer_copyright',
                'priority'          => 60,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Copyright_Fields();

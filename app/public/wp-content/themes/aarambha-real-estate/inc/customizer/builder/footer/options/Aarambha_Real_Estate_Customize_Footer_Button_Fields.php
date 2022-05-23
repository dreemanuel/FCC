<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Button settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Button_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_footer_button_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_button',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_button_text',
                            'aarambha_real_estate_footer_button_url',
                            'aarambha_real_estate_footer_button_url_target'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_button_border',
                            'aarambha_real_estate_footer_button_padding',
                            'aarambha_real_estate_footer_button_margin'
                        )
                    )
                ]
            ],
            // Text
            'aarambha_real_estate_footer_button_text' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Button', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Text', 'aarambha-real-estate' ),
                'section'           => 'footer_button',
                'priority'          => 20,
            ],
            // URL
            'aarambha_real_estate_footer_button_url' => [
                'type'              => 'url',
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'URL', 'aarambha-real-estate' ),
                'section'           => 'footer_button',
                'priority'          => 25,
            ],
            // Link Open
            'aarambha_real_estate_footer_button_url_target' => [
                'type'              => 'toggle',
                'default'           => '',
                'section'           => 'footer_button',
                'priority'          => 50,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Link Open', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable to open the link in the new tab.', 'aarambha-real-estate' ),
            ],
            // Border
            'aarambha_real_estate_footer_button_border' => [
                'type'              => 'border',
                'default'           => [
					'width'           => [
						'side_1'            => '1px',
						'side_2'            => '1px',
						'side_3'            => '1px',
						'side_4'            => '1px',
						'linked'            => 'off'
					]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_border' ],
                'label'             => esc_html__( 'Border', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set button border width.', 'aarambha-real-estate' ),
                'section'           => 'footer_button',
                'priority'          => 65,
				'fields'			=> ['width'=>true]
            ],
            // Padding
            'aarambha_real_estate_footer_button_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '7px',
                        'side_2'            => '15px',
                        'side_3'            => '7px',
                        'side_4'            => '15px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set button padding.', 'aarambha-real-estate' ),
                'section'           => 'footer_button',
                'priority'          => 75,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_footer_button_margin' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '5px',
                        'side_2'            => '5px',
                        'side_3'            => '5px',
                        'side_4'            => '5px',
                        'linked'            => 'on'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set button margin.', 'aarambha-real-estate' ),
                'section'           => 'footer_button',
                'priority'          => 80,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],

        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Button_Fields();

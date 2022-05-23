<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Social Icons settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Social_Icons_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_footer_social_icon_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_social',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_social_icon_note_one',
                            'aarambha_real_estate_footer_social_icon_link_open'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_social_icon_padding',
                            'aarambha_real_estate_footer_social_icon_margin',
                            'aarambha_real_estate_footer_social_icon_note_two',
                            'aarambha_real_estate_footer_social_icon_item_border',
                            'aarambha_real_estate_footer_social_icon_item_padding',
                            'aarambha_real_estate_footer_social_icon_item_margin'
                        )
                    )
                ]
            ],
            // Heading One
            'aarambha_real_estate_footer_social_icon_note_one' => [
                'type'              => 'heading',
				'description'       => sprintf(__( 'Configure social icons in Global &raquo; Social &raquo; <a data-type="control" data-id="aarambha_real_estate_social_icons" class="customizer-focus"><strong> Social Icons </strong></a>.', 'aarambha-real-estate' )),
                'section'           => 'footer_social',
                'priority'          => 15,
            ],
            // Link Open
            'aarambha_real_estate_footer_social_icon_link_open' => [
                'type'              => 'toggle',
                'default'           => '',
                'section'           => 'footer_social',
                'priority'          => 40,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Link Open', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable to open the link in the new tab.', 'aarambha-real-estate' ),
            ],
            // Padding
            'aarambha_real_estate_footer_social_icon_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set social container padding.', 'aarambha-real-estate' ),
                'section'           => 'footer_social',
                'priority'          => 42,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_footer_social_icon_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set social container margin.', 'aarambha-real-estate' ),
                'section'           => 'footer_social',
                'priority'          => 45,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Heading One
            'aarambha_real_estate_footer_social_icon_note_two' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'ITEM', 'aarambha-real-estate' ),
                'section'           => 'footer_social',
                'priority'          => 50,
            ],
			// Border
			'aarambha_real_estate_footer_social_icon_item_border' => [
				'type'              => 'border',
				'default'           => [
					'width'           => [
						'side_1'            => '0px',
						'side_2'            => '0px',
						'side_3'            => '0px',
						'side_4'            => '0px',
						'linked'            => 'on'
					]
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_border' ],
				'label'             => esc_html__( 'Border', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set border width to each item.', 'aarambha-real-estate' ),
				'section'           => 'footer_social',
				'priority'          => 65,
				'fields'			=> ['width'=>true]
			],
            // Padding
            'aarambha_real_estate_footer_social_icon_item_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '10px',
                        'side_2'            => '15px',
                        'side_3'            => '10px',
                        'side_4'            => '15px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set padding to each item.', 'aarambha-real-estate' ),
                'section'           => 'footer_social',
                'priority'          => 80,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],
            // Margin
            'aarambha_real_estate_footer_social_icon_item_margin' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '0px',
                        'side_2'            => '0px',
                        'side_3'            => '0px',
                        'side_4'            => '0px',
                        'linked'            => 'on'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set margin to each item.', 'aarambha-real-estate' ),
                'section'           => 'footer_social',
                'priority'          => 85,
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
            ],

        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Social_Icons_Fields();

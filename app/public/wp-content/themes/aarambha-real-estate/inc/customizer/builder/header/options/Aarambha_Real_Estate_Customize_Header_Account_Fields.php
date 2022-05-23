<?php
/**
 * Aarambha Real Estate Theme Customizer Header Account settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Header_Account_Fields extends Aarambha_Real_Estate_Customize_Base_Field {


    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_header_account_group_settings' => [
                'type'              => 'group',
                'section'           => 'account',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_account_note_one',
                            'aarambha_real_estate_header_account_login_text',
                            'aarambha_real_estate_header_account_login_url',
                            'aarambha_real_estate_header_account_note_two',
                            'aarambha_real_estate_header_account_logout_text',
                            'aarambha_real_estate_header_account_logout_url',
                            'aarambha_real_estate_header_account_note_three',
                            'aarambha_real_estate_header_account_url_target'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                        	'aarambha_real_estate_header_account_border',
                            'aarambha_real_estate_header_account_padding',
                            'aarambha_real_estate_header_account_margin'
                        )
                    )
                ]
            ],
            // Note One
            'aarambha_real_estate_header_account_note_one' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'LOGIN', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 15,
            ],
            // Login Text
            'aarambha_real_estate_header_account_login_text' => [
                'type'              => 'text',
                'default'           => esc_html__( 'My Account', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Text', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 20,
            ],
            // Account URL
            'aarambha_real_estate_header_account_login_url' => [
                'type'              => 'url',
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'URL', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 25,
            ],
            // Note Two
            'aarambha_real_estate_header_account_note_two' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'LOGOUT', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 30,
            ],
            // Logout Text
            'aarambha_real_estate_header_account_logout_text' => [
                'type'              => 'text',
                'default'           => esc_html__( 'Log In', 'aarambha-real-estate' ),
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Text', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 35,
            ],
            //  Logout URL
            'aarambha_real_estate_header_account_logout_url' => [
                'type'              => 'url',
                'default'           => wp_login_url(),
                'sanitize_callback' => 'esc_url_raw',
                'label'             => esc_html__( 'URL', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 40,
            ],
            // Note Three
            'aarambha_real_estate_header_account_note_three' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'SETTINGS', 'aarambha-real-estate' ),
                'section'           => 'account',
                'priority'          => 45,
            ],
            // Link Open
            'aarambha_real_estate_header_account_url_target' => [
                'type'              => 'toggle',
                'default'           => '',
                'section'           => 'account',
                'priority'          => 75,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'Link Open', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Toggle to enable link open in new window tab.', 'aarambha-real-estate' ),
            ],
			// Border
			'aarambha_real_estate_header_account_border' => [
				'type'              => 'border',
				'default'           => [
					'width'           => [
						'side_1'            => '1px',
						'side_2'            => '1px',
						'side_3'            => '1px',
						'side_4'            => '1px',
						'linked'            => 'on'
					]
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_border' ],
				'label'             => esc_html__( 'Border', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set account border width.', 'aarambha-real-estate' ),
				'section'           => 'account',
				'priority'          => 95,
				'fields'            => ['width'=>true],
			],
            // Padding
            'aarambha_real_estate_header_account_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '12px',
                        'side_2'            => '18px',
                        'side_3'            => '12px',
                        'side_4'            => '18px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set account padding.', 'aarambha-real-estate' ),
                'section'           => 'account',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 105,
            ],
            // Margin
            'aarambha_real_estate_header_account_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set account margin.', 'aarambha-real-estate' ),
                'section'           => 'account',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 110,
            ],

        ];
    }

}
new Aarambha_Real_Estate_Customize_Header_Account_Fields();

<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Menu settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Menu_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_footer_menu_group_settings' => [
                'type'              => 'group',
                'section'           => 'footer_menu',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_footer_menu_note_one',
                            'aarambha_real_estate_footer_menu_spacing',
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
							'aarambha_real_estate_footer_menu_note_six',
							'aarambha_real_estate_footer_menu_padding',
							'aarambha_real_estate_footer_menu_margin'
                        )
                    )
                ]
            ],
            // Note One
            'aarambha_real_estate_footer_menu_note_one' => [
                'type'              => 'heading',
                'description'       => sprintf(__( 'To set menu, go to <a data-type="section" data-id="menu_locations" class="customizer-focus"><strong>Footer Menu</strong></a>', 'aarambha-real-estate' )),
                'section'           => 'footer_menu',
                'priority'          => 10,
            ],
            // Items Spacing
            'aarambha_real_estate_footer_menu_spacing' => [
                'type'              => 'range',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
                'label'             => esc_html__( 'Menu Spacing', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Slide to set Menu Spacing.', 'aarambha-real-estate' ),
                'section'           => 'footer_menu',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 20
            ],
			// Heading four
			'aarambha_real_estate_footer_menu_note_six' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'CONTAINER', 'aarambha-real-estate' ),
				'section'           => 'footer_menu',
				'priority'          => 65,
			],
			// Container Padding
			'aarambha_real_estate_footer_menu_padding' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set Padding to the Footer Menu.', 'aarambha-real-estate' ),
				'section'           => 'footer_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 70,
			],
			// Container Margin
			'aarambha_real_estate_footer_menu_margin' => [
				'type'              => 'dimensions',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
				'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set Margin to the Footer Menu.', 'aarambha-real-estate' ),
				'section'           => 'footer_menu',
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'priority'          => 75,
			],
        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Menu_Fields();

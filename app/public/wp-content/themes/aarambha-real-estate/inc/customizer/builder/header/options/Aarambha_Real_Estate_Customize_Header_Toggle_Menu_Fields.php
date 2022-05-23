<?php
/**
 * Aarambha Real Estate Theme Customizer Header Toggle Menu settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Header_Toggle_Menu_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {

        $this->args = [
            // Grouping Settings
            'aarambha_real_estate_header_toggle_menu_group_settings' => [
                'type'              => 'group',
                'section'           => 'toggle_menu',
                'priority'          => 10,
                'choices'           => [
                    'normal'            => array(
                        'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_toggle_menu_note_one'
                        )
                    ),
                    'hover'         => array(
                        'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
                        'controls'      => array(
                            'aarambha_real_estate_header_toggle_menu_padding',
                            'aarambha_real_estate_header_toggle_menu_margin'

                        )
                    )
                ]
            ],
            // Note One
            'aarambha_real_estate_header_toggle_menu_note_one' => [
                'type'              => 'heading',
				'description'       => sprintf(__( 'To set menu, go to <a data-type="section" data-id="menu_locations" class="customizer-focus"><strong>Mobile Menu</strong></a>', 'aarambha-real-estate' )),
                'section'           => 'toggle_menu',
                'priority'          => 10,
            ],
            // Container Padding
            'aarambha_real_estate_header_toggle_menu_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set toggle menu container padding.', 'aarambha-real-estate' ),
                'section'           => 'toggle_menu',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 70,
            ],
            // Container Margin
            'aarambha_real_estate_header_toggle_menu_margin' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Margin', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set toggle menu container margin.', 'aarambha-real-estate' ),
                'section'           => 'toggle_menu',
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
                'priority'          => 75,
            ],

        ];
    }

}
new Aarambha_Real_Estate_Customize_Header_Toggle_Menu_Fields();

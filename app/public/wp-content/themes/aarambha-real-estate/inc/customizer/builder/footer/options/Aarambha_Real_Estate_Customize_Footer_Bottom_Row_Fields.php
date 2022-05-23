<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Bottom Row settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Bottom_Row_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Left Column Justify Content
			'aarambha_real_estate_footer_bottom_row_left_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'start',
					'tablet'    => 'start',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Left Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Left Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_bottom',
				'priority'          => 17,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Center Column Justify Content
			'aarambha_real_estate_footer_bottom_row_center_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'center',
					'tablet'    => 'center',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Center Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Center Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_bottom',
				'priority'          => 18,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Right Column Justify Content
			'aarambha_real_estate_footer_bottom_row_right_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'end',
					'tablet'    => 'end',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Right Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Right Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_bottom',
				'priority'          => 19,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
            // Background Overlay
            'aarambha_real_estate_footer_bottom_row_background_overlay' => [
                'type'              => 'background',
                'default'           => [
                    'background'        => 'color',
                    'colors'            => [
                        'color_1'           => 'var(--color-bg-3)'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Background overlay color for bottom row container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_footer_bottom',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg-3)'
                ],
                'fields'            => ['colors' => true],
            ],
            // Padding
            'aarambha_real_estate_footer_bottom_row_padding' => [
                'type'              => 'dimensions',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_footer_bottom',
                'priority'          => 35,
                'description'       => esc_html__( 'Set footer bottom row padding.', 'aarambha-real-estate' ),
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Bottom_Row_Fields();

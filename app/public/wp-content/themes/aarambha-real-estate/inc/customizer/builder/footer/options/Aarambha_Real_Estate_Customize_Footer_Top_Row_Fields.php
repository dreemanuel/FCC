<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Top Row settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Top_Row_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Left Column Justify Content
			'aarambha_real_estate_footer_top_row_left_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'start',
					'tablet'    => 'start',
					'mobile'    => 'start'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Left Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Left Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_top',
				'priority'          => 17,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Center Column Justify Content
			'aarambha_real_estate_footer_top_row_center_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'center',
					'tablet'    => 'center',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Center Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Center Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_top',
				'priority'          => 18,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Right Column Justify Content
			'aarambha_real_estate_footer_top_row_right_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'end',
					'tablet'    => 'end',
					'mobile'    => 'end'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Right Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Right Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_top',
				'priority'          => 19,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Background Image
			'aarambha_real_estate_footer_top_row_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set Background Image for footer top row.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_footer_top',
				'priority'          => 20,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
            // Background Overlay
            'aarambha_real_estate_footer_top_row_background_overlay' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Background overlay color for top row container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_footer_top',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)'
                ],
                'fields'            => ['colors' => true],
            ],
            // Padding
            'aarambha_real_estate_footer_top_row_padding' => [
                'type'              => 'dimensions',
                'default'           => [
                    'desktop'           => [
                        'side_1'            => '25px',
                        'side_3'            => '25px',
                        'linked'            => 'off'
                    ]
                ],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_dimensions' ],
                'label'             => esc_html__( 'Padding', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_footer_top',
                'priority'          => 35,
                'description'       => esc_html__( 'Set footer top row padding.', 'aarambha-real-estate' ),
                'responsive'        => [ 'desktop', 'tablet', 'mobile' ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Footer_Top_Row_Fields();

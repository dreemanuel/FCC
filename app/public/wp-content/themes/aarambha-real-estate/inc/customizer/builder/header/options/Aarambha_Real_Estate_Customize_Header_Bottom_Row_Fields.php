<?php
/**
 * Aarambha Real Estate Theme Customizer Header Bottom Row settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Header_Bottom_Row_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
			// Min Height
			'aarambha_real_estate_header_bottom_row_height' => [
				'type'              => 'range',
				'default'           => ['desktop' => '0px'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Min Height', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'To set Min Height at the bottom row of Header.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_header_bottom',
				'priority'          => 15,
				'responsive'        => [ 'desktop', 'tablet', 'mobile' ],
				'input_attrs'       => [
					'min'               => 0,
					'max'               => 400
				]
			],
			// Left Column Justify Content
			'aarambha_real_estate_header_bottom_row_left_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'start',
					'tablet'    => 'start',
					'mobile'    => 'start'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Left Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Left Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_header_bottom',
				'priority'          => 17,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Center Column Justify Content
			'aarambha_real_estate_header_bottom_row_center_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'center',
					'tablet'    => 'center',
					'mobile'    => 'center'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Center Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Center Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_header_bottom',
				'priority'          => 18,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
			// Right Column Justify Content
			'aarambha_real_estate_header_bottom_row_right_col_content_justify' => [
				'type'              => 'buttonset',
				'default'           => [
					'desktop'   => 'end',
					'tablet'    => 'end',
					'mobile'    => 'end'
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
				'label'             => esc_html__( 'Right Column', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Choose position for the content in the Right Column.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_header_bottom',
				'priority'          => 19,
				'choices'           => [
					'start'     => esc_html__( 'Start', 'aarambha-real-estate' ),
					'center'    => esc_html__( 'Center', 'aarambha-real-estate' ),
					'end'       => esc_html__( 'End', 'aarambha-real-estate' )
				],
				'responsive'        => ['desktop','tablet','mobile'],
			],
            // Background Overlay
            'aarambha_real_estate_header_bottom_row_background_overlay' => [
                'type'              => 'background',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
                'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set Background overlay color for bottom row container.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_header_bottom',
                'priority'          => 20,
                'inherits'          => [
                    'color_1'           => 'var(--color-bg)'
                ],
                'fields'            => ['colors' => true],
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Header_Bottom_Row_Fields();

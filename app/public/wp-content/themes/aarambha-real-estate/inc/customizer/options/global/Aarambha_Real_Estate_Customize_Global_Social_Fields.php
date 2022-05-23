<?php
/**
 * Aarambha Real Estate Theme Customizer Social settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Global_Social_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

	/**
	 * Arguments for fields.
	 *
	 * @return void
	 */
	public function init() {
		$this->args = [
			// Heading One
			'aarambha_real_estate_social_icon_note' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'SOCIAL ICONS', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_social_section',
				'priority'          => 5,
			]
		];

		if ( Aarambha_Real_Estate_Helper::crucial_real_state_plugin() ) {
			$this->args = array_merge($this->args,
				[
					// Heading One
					'aarambha_real_estate_social_share_note' => [
						'type'              => 'heading',
						'label'             => esc_html__( 'SOCIAL SHARE', 'aarambha-real-estate' ),
						'section'           => 'aarambha_real_estate_social_section',
						'priority'          => 15,
					],
					// Social Network
					'aarambha_real_estate_social_share' => [
						'type'              => 'sortable',
						'default'           => ['facebook','twitter'],
						'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
						'description'       => esc_html__( 'Enable Social Share lists and re-arrange them by drag and drop.', 'aarambha-real-estate' ),
						'section'           => 'aarambha_real_estate_social_section',
						'priority'          => 20,
						'choices'           => [
							'facebook'          => esc_html__( 'Facebook', 'aarambha-real-estate' ),
							'twitter'           => esc_html__( 'Twitter', 'aarambha-real-estate' )
						],
					]
				]
			);
		}
	}

}
new Aarambha_Real_Estate_Customize_Global_Social_Fields();

<?php
/**
 * Aarambha Real Estate Theme Customizer Single Page Sidebar settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Single_Page_Sidebar_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Sidebar
            'aarambha_real_estate_single_page_sidebar_layout' => [
                'type'              => 'radio_image',
                'default'           => 'right',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_choices' ],
                'label'             => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Select sidebar layout for single page.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_page_sidebar_section',
                'priority'          => 15,
                'choices' 			=> array(
                    'left'              => AARAMBHA_REAL_ESTATE_URI . 'assets/images/left.svg',
                    'right'  		    => AARAMBHA_REAL_ESTATE_URI . 'assets/images/right.svg',
                    'none'  		    => AARAMBHA_REAL_ESTATE_URI . 'assets/images/none.svg',
                ),
                'l10n'              => [
                    'left'              => esc_html__( 'Left', 'aarambha-real-estate' ),
                    'right'             => esc_html__( 'Right', 'aarambha-real-estate' ),
                    'none'              => esc_html__( 'None', 'aarambha-real-estate' )
                ]
            ],
        ];
    }

}
new Aarambha_Real_Estate_Customize_Single_Page_Sidebar_Fields();

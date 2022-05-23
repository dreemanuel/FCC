<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Sidebar 2 settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Sidebar_2_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Heading One
            'aarambha_real_estate_footer_sidebar_2_widgets_note' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'NOTE', 'aarambha-real-estate' ),
				'description'       => sprintf(__( 'Drag and Drop Widgets to <a data-type="section" data-id="sidebar-widgets-footer-sidebar-2" class="customizer-focus"><strong> Footer Sidebar 2 </strong></a>widget area.', 'aarambha-real-estate' )),
                'section'           => 'footer_sidebar_2',
                'priority'          => 5,
            ]
        ];
    }

}

new Aarambha_Real_Estate_Customize_Footer_Sidebar_2_Fields();

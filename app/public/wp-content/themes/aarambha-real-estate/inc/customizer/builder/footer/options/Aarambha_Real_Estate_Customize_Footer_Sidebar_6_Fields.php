<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Sidebar 6 settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Sidebar_6_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Heading One
            'aarambha_real_estate_footer_sidebar_6_widgets_note' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'NOTE', 'aarambha-real-estate' ),
				'description'       => sprintf(__( 'Drag and Drop Widgets to <a data-type="section" data-id="sidebar-widgets-footer-sidebar-6" class="customizer-focus"><strong> Footer Sidebar 6 </strong></a>widget area.', 'aarambha-real-estate' )),
                'section'           => 'footer_sidebar_6',
                'priority'          => 5,
            ]
        ];
    }

}

new Aarambha_Real_Estate_Customize_Footer_Sidebar_6_Fields();

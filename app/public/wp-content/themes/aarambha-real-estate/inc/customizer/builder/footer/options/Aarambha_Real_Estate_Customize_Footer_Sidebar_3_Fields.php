<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Sidebar 3 settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Footer_Sidebar_3_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Heading One
            'aarambha_real_estate_footer_sidebar_3_widgets_note' => [
                'type'              => 'heading',
                'label'             => esc_html__( 'NOTE', 'aarambha-real-estate' ),
				'description'       => sprintf(__( 'Drag and Drop Widgets to <a data-type="section" data-id="sidebar-widgets-footer-sidebar-3" class="customizer-focus"><strong> Footer Sidebar 3 </strong></a>widget area.', 'aarambha-real-estate' )),
                'section'           => 'footer_sidebar_3',
                'priority'          => 5,
            ]
        ];
    }

}

new Aarambha_Real_Estate_Customize_Footer_Sidebar_3_Fields();

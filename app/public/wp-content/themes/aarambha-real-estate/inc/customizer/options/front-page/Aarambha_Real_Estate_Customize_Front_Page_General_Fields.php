<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page General settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_General_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {

        $sortable_list = [
            'why-us'            => esc_html__( 'Why Us?', 'aarambha-real-estate' ),
            'blog'              => esc_html__( 'News & Blog', 'aarambha-real-estate' ),
            'clients'           => esc_html__( 'Clients Logo', 'aarambha-real-estate' )
        ];
        $sortable_default = ['why-us','blog','clients'];
        if ( Aarambha_Real_Estate_Helper::crucial_real_state_plugin() ) {
            $sortable_list = array_merge( $sortable_list, [
                'slider'            => esc_html__( 'Property Slider', 'aarambha-real-estate' ),
                'search'            => esc_html__( 'Property Search', 'aarambha-real-estate' ),
                'property-types'    => esc_html__( 'Property Types', 'aarambha-real-estate' ),
                'location'          => esc_html__( 'Property Locations', 'aarambha-real-estate' ),
                'featured'          => esc_html__( 'Property Featured', 'aarambha-real-estate' )
            ]);
            $sortable_default = ['search','featured','why-us','location','property-types','blog','clients'];
        }
        $this->args = [
            // Active Front Page
            'aarambha_real_estate_front_page_enable' => [
                'type'              => 'radio',
                'default'           => 'disable',
                'section'           => 'aarambha_real_estate_front_page_general_section',
                'priority'          => 10,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_choices' ],
                'label'             => esc_html__( 'Front Page', 'aarambha-real-estate' ),
				'description'       => sprintf(__( 'To set <strong>Front Page</strong> enable the option. Else WordPress Static Page will be your <a data-type="section" data-id="static_front_page" class="customizer-focus"><strong> Front Page</strong></a>.', 'aarambha-real-estate' )),
                'choices'           => [
                    'enable'            => esc_html__( 'Enable', 'aarambha-real-estate' ),
                    'disable'           => esc_html__( 'Disable [ use WordPress Static Page ]', 'aarambha-real-estate' )
                ]
            ],
            // Elements
            'aarambha_real_estate_front_page_elements' => [
                'type'              => 'sortable',
                'default'           => $sortable_default,
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
                'label'             => esc_html__( 'Sort Elements', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Enable Page Header Elements and sort them by Drag and Drop.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_general_section',
                'priority'          => 20,
                'choices'           => $sortable_list,
            ],
        ];
    }

}
new Aarambha_Real_Estate_Customize_Front_Page_General_Fields();

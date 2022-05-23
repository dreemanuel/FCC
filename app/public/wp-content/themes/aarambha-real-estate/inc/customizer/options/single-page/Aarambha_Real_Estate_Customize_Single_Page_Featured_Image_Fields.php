<?php
/**
 * Aarambha Real Estate Theme Customizer Single Page Featured Image settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Single_Page_Featured_Image_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    /**
     * Arguments for fields.
     *
     * @return void
     */
    public function init() {
        $this->args = [
            // Image Ratio
            'aarambha_real_estate_single_page_featured_image_ratio' => [
                'type'              => 'buttonset',
                'default'           => ['desktop' => '16x9'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
                'label'             => esc_html__( 'Aspect Ratio', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Select custom aspect ratio for featured image. Choose it wisely for better appearance.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_page_featured_image_section',
                'priority'          => 15,
                'choices' 			=> array(
                    'auto'              => esc_html__( 'Auto', 'aarambha-real-estate' ),
                    '1x1'               => esc_html__( '1:1', 'aarambha-real-estate' ),
                    '4x3'               => esc_html__( '4:3', 'aarambha-real-estate' ),
                    '16x9'              => esc_html__( '16:9', 'aarambha-real-estate' ),
                    '3x4'               => esc_html__( '3:4', 'aarambha-real-estate' ),
                )
            ],
            // Image Size
            'aarambha_real_estate_single_page_featured_image_size' => [
                'type'              => 'buttonset',
                'default'           => ['desktop' => 'medium_large'],
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_buttonset' ],
                'label'             => esc_html__( 'Image Size', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Set proper size for featured image. Selecting a bigger image size may display a better appearance but takes more time on loading websites.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_single_page_featured_image_section',
                'priority'          => 20,
                'choices' 			=> [
                    'thumbnail'         => esc_html__( 'Small', 'aarambha-real-estate' ),
                    'medium'            => esc_html__( 'Medium', 'aarambha-real-estate' ),
                    'medium_large'      => esc_html__( 'Medium Large', 'aarambha-real-estate' ),
                    'large'             => esc_html__( 'Large', 'aarambha-real-estate' ),
                ]
            ]
        ];
    }

}
new Aarambha_Real_Estate_Customize_Single_Page_Featured_Image_Fields();

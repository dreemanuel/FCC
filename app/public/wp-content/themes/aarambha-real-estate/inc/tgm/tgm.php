<?php
/**
 * Plugin recommendation
 *
 * @package Aarambha_Real_Estate
 */

// Load TGM library.
require AARAMBHA_REAL_ESTATE_DIV . 'inc/tgm/class-tgm-plugin-activation.php';

if ( ! function_exists( 'aarambha_real_estate_recommended_plugins' ) ) :

	/**
	 * Register recommended plugins.
	 *
	 * @since 1.0.0
	 */
	function aarambha_real_estate_recommended_plugins() {
        $plugins = array(
            array(
                'name'     => esc_html__( 'Aarambha Demo Sites', 'aarambha-real-estate' ),
                'slug'     => 'aarambha-demo-sites',
                'required' => false,
            ),
			array(
				'name'     => esc_html__( 'Crucial Real Estate', 'aarambha-real-estate' ),
				'slug'     => 'crucial-real-estate',
				'required' => false,
			)
        );

        $config = array();

        tgmpa( $plugins, $config );
	}

endif;

add_action( 'tgmpa_register', 'aarambha_real_estate_recommended_plugins' );

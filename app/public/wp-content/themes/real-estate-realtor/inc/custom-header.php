<?php
/**
 * @package Real Estate Realtor
 * @subpackage real-estate-realtor
 * @since real-estate-realtor 1.0
 * Setup the WordPress core custom header feature.
 * @uses real_estate_realtor_header_style()
*/

function real_estate_realtor_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'real_estate_realtor_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 200,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'real_estate_realtor_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'real_estate_realtor_custom_header_setup' );

if ( ! function_exists( 'real_estate_realtor_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'real_estate_realtor_header_style' );
function real_estate_realtor_header_style() {
	if ( get_header_image() ) :
	$real_estate_realtor_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'real-estate-realtor-basic-style', $real_estate_realtor_custom_css );
	endif;
}
endif;
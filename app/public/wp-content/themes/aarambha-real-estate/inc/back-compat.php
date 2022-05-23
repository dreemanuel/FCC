<?php
/**
 * Aarambha Real Estate back compat functionality
 *
 * Prevents Aarambha Real Estate from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.6.
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Prevent switching to Aarambha Real Estate on old versions of WordPress.
 *
 * Switches to the default theme.
 */
function aarambha_real_estate_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'aarambha_real_estate_upgrade_notice' );
}
add_action( 'after_switch_theme', 'aarambha_real_estate_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Aarambha Real Estate on WordPress versions prior to 5.6.
 *
 * @global string $wp_version WordPress version.
 */
function aarambha_real_estate_upgrade_notice() {
	$message = sprintf( esc_html__( 'Aarambha Real Estate requires at least WordPress version 5.6. You are running version %s. Please upgrade and try again.', 'aarambha-real-estate' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.6.
 *
 * @global string $wp_version WordPress version.
 */
function aarambha_real_estate_customize() {
	wp_die( sprintf( esc_html__( 'Aarambha Real Estate requires at least WordPress version 5.6. You are running version %s. Please upgrade and try again.', 'aarambha-real-estate' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'aarambha_real_estate_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.6.
 *
 * @global string $wp_version WordPress version.
 */
function aarambha_real_estate_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Aarambha Real Estate requires at least WordPress version 5.6. You are running version %s. Please upgrade and try again.', 'aarambha-real-estate' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'aarambha_real_estate_preview' );

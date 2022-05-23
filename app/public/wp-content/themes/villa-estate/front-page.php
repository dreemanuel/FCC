<?php
/**
 * The template for displaying al pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

get_header(); 
		// Call home if Homepage setting is set to latest posts.

	if ( villa_estate_is_latest_posts() ) {
		get_template_part( 'template-parts/content', 'home' );

	} elseif ( villa_estate_is_frontpage() ) {
		
		$options = villa_estate_get_theme_options();
		$sorted = array();
		$sorted = explode( ',' , villa_estate_get_homepage_sections() );

		foreach ( $sorted as $section ) {
			add_action( 'villa_estate_primary_content', 'villa_estate_add_'. $section .'_section' );
		}
		do_action( 'villa_estate_primary_content' );

		if (true === apply_filters( 'villa_estate_filter_frontpage_content_enable', true ) ) {
			get_template_part( 'page' );
		}
	}
get_footer();
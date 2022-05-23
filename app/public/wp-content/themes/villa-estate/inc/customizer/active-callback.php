<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

if ( ! function_exists( 'villa_estate_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Villa Estate 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function villa_estate_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

if ( ! function_exists( 'villa_estate_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since  Villa Estate 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function villa_estate_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'villa_estate_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'villa_estate_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since  Villa Estate 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function villa_estate_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'villa_estate_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'villa_estate_is_nav_btn_enable' ) ) :
	
	function villa_estate_is_nav_btn_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[nav_btn]' )->value() );
}
endif;

/**
 * Front Page Active Callbacks
 */

/*=================Topbar====================*/
/**
 * Check if topbar is enabled.
 *
 * @since Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_topbar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[top_bar_section_enable]' )->value() );
}

/*=================Search Property====================*/
/**
 * Check if search_property section is enabled.
 *
 * @since Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_search_property_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[search_property_section_enable]' )->value() );
}

/*==============service section===============*/
/**
* Check if service section is enabled.
*
* @since  Villa Estate 1.0.0
* @param WP_Customize_Control $control WP_Customize_Control instance.
* @return bool Whether the control is active to the current preview.
*/
function villa_estate_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[service_section_enable]' )->value() );
}

/*==============Property Villa section===============*/
/**
 * Check if property_villa section is enabled.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_property_villa_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[property_villa_section_enable]' )->value() );
}

/**
 * Check if property_villa section content type is post.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_property_villa_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'villa_estate_theme_options[property_villa_content_type]' )->value();
	return villa_estate_is_property_villa_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if property_villa section content type is property.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_property_villa_section_content_property_enable( $control ) {
	$content_type = $control->manager->get_setting( 'villa_estate_theme_options[property_villa_content_type]' )->value();
	return villa_estate_is_property_villa_section_enable( $control ) && ( 'property' == $content_type );
}

/*=======================Promotion========================*/
/**
 * Check if promotion section is enabled.
 *
 * @since villa_estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_promotion_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[promotion_section_enable]' )->value() );
}

/*=============Team=========================*/

/**
 * Check if team section is enabled.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[team_section_enable]' )->value() );
}

/*=============Counter=========================*/
/**
 * Check if counter section is enabled.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[counter_section_enable]' )->value() );
}

/*=============Latest Posts=========================*/

/**
 * Check if latest_posts section is enabled.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_latest_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'villa_estate_theme_options[latest_posts_section_enable]' )->value() );
}

/**
 * Check if latest_posts section content type is post.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_latest_posts_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'villa_estate_theme_options[latest_posts_content_type]' )->value();
	return villa_estate_is_latest_posts_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if latest_posts section content type is category.
 *
 * @since  Villa Estate 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function villa_estate_is_latest_posts_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'villa_estate_theme_options[latest_posts_content_type]' )->value();
	return villa_estate_is_latest_posts_section_enable( $control ) && ( 'category' == $content_type );
}
<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/

// blog btn title
if ( ! function_exists( 'villa_estate_copyright_text_partial' ) ) :
    function villa_estate_copyright_text_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

// nav menu btn title
if ( ! function_exists( 'villa_estate_nav_btn_txt_partial' ) ) :
    function villa_estate_nav_btn_txt_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['nav_btn_txt'] );
    }
endif;

// topbar_text
if ( ! function_exists( 'villa_estate_topbar_text_partial' ) ) :
    function villa_estate_topbar_text_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['topbar_text'] );
    }
endif;

/*================service===============*/

//service section sub title selective refresh
if ( ! function_exists( 'villa_estate_service_section_partial_sub_title' ) ) :
    function villa_estate_service_section_partial_sub_title() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['service_section_sub_title'] );
    }
endif;

//service section title selective refresh
if ( ! function_exists( 'villa_estate_service_section_partial_title' ) ) :
    function villa_estate_service_section_partial_title() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['service_section_title'] );
    }
endif;

/*================Property Villa===============*/

//Property Villa section title selective refresh
if ( ! function_exists( 'villa_estate_property_villa_sub_title_partial' ) ) :
    function villa_estate_property_villa_sub_title_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['property_villa_sub_title'] );
    }
endif;

//Property Villa section title selective refresh
if ( ! function_exists( 'villa_estate_property_villa_title_partial' ) ) :
    function villa_estate_property_villa_title_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['property_villa_title'] );
    }
endif;

//Property Villa section title selective refresh
if ( ! function_exists( 'villa_estate_property_villa_read_more_btn_label_partial' ) ) :
    function villa_estate_property_villa_read_more_btn_label_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['property_villa_read_more_btn_label'] );
    }
endif;

/*===================Promotion=================*/
// promotion_read_more selective refresh
if ( ! function_exists( 'villa_estate_promotion_button_partial' ) ) :
    function villa_estate_promotion_button_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['promotion_button'] );
    }
endif;

/*===================Latest Posts=================*/

//Latest Posts section sub title selective refresh
if ( ! function_exists( 'villa_estate_latest_posts_section_partial_sub_title' ) ) :
    function villa_estate_latest_posts_section_partial_sub_title() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['latest_posts_section_sub_title'] );
    }
endif;

//Latest Posts section title selective refresh
if ( ! function_exists( 'villa_estate_latest_posts_section_partial_title' ) ) :
    function villa_estate_latest_posts_section_partial_title() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['latest_posts_section_title'] );
    }
endif;

// Testimonial section  sub title
if ( ! function_exists( 'villa_estate_team_title_partial' ) ) :
    function villa_estate_team_title_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['team_title'] );
    }
endif;

// Testimonial section  sub title
if ( ! function_exists( 'villa_estate_team_sub_title_partial' ) ) :
    function villa_estate_team_sub_title_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['team_sub_title'] );
    }
endif;

// Testimonial section  sub title
if ( ! function_exists( 'villa_estate_team_description_partial' ) ) :
    function villa_estate_team_description_partial() {
        $options = villa_estate_get_theme_options();
        return esc_html( $options['team_description'] );
    }
endif;
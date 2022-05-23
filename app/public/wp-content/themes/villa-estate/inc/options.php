<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function villa_estate_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'villa-estate' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function villa_estate_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'villa-estate' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function villa_estate_property_choices() {
    $posts = get_posts( array( 'post_type' => 'property', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'villa-estate' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function villa_estate_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'villa-estate' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of products for post choices.
 * @return Array Array of post ids and name.
 */
function villa_estateduct_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'product' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'villa-estate' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function villa_estate_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'villa-estate' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'villa_estate_property_villa_content_type' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function villa_estate_property_villa_content_type() {
        $villa_estate_property_villa_content_type = array(
            'post'      => esc_html__( 'Post', 'villa-estate' ),
        );

        if ( class_exists( 'essential_real_estate' ) ) {
            $villa_estate_property_villa_content_type = array_merge( $villa_estate_property_villa_content_type, array(
                'property'  => esc_html__( 'Property', 'villa-estate' ),
                ) );
        }

        $output = apply_filters( 'villa_estate_property_villa_content_type', $villa_estate_property_villa_content_type );

        return $output;
    }
endif;

if ( ! function_exists( 'villa_estate_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function villa_estate_site_layout() {
        $villa_estate_site_layout = array(
            'wide'          => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
            'boxed-layout'  => esc_url( get_template_directory_uri() . '/assets/images/boxed.png' ),
        );

        $output = apply_filters( 'villa_estate_site_layout', $villa_estate_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'villa_estate_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function villa_estate_selected_sidebar() {
        $villa_estate_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'villa-estate' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'villa-estate' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'villa-estate' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'villa-estate' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'villa-estate' ),
        );

        $output = apply_filters( 'villa_estate_selected_sidebar', $villa_estate_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'villa_estate_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function villa_estate_global_sidebar_position() {
        $villa_estate_global_sidebar_position = array(
            'right-sidebar' => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'    => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'villa_estate_global_sidebar_position', $villa_estate_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'villa_estate_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function villa_estate_sidebar_position() {
        $villa_estate_sidebar_position = array(
            'right-sidebar'         => esc_url( get_template_directory_uri() . '/assets/images/right.png' ),
            'no-sidebar'            => esc_url( get_template_directory_uri() . '/assets/images/full.png' ),
        );

        $output = apply_filters( 'villa_estate_sidebar_position', $villa_estate_sidebar_position );

        return $output;
    }
endif;

if ( ! function_exists( 'villa_estate_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function villa_estate_pagination_options() {
        $villa_estate_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'villa-estate' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'villa-estate' ),
        );

        $output = apply_filters( 'villa_estate_pagination_options', $villa_estate_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'villa_estate_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function villa_estate_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'villa-estate' ),
            'off'       => esc_html__( 'Disable', 'villa-estate' )
        );
        return apply_filters( 'villa_estate_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'villa_estate_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function villa_estate_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'villa-estate' ),
            'off'       => esc_html__( 'No', 'villa-estate' )
        );
        return apply_filters( 'villa_estate_hide_options', $arr );
    }
endif;
<?php
/**
 * Aarambha Real Estate Breadcrumb
 *
 * @package Aarambha_Real_Estate
 */

/**
 * class for breadcrumb
 *
 * @access public
 */
class Aarambha_Real_Estate_Breadcrumb {

    /**
     * Instance
     *
     * @access private
     * @var object
     */
    private static $instance;

    /**
     * Returns the instance.
     *
     * @access public
     * @return object
     */
    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor method.
     *
     * @access private
     * @return void
     */
    private function __construct() {

        // Include trial breadcrumb
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/classes/Aarambha_Real_Estate_Breadcrumb_Trail.php';

    }

    public static function get_breadcrumb() {

        $defaults = array(
            'show_browse' => false,
            'echo'        => true,
        );

        $args = apply_filters( 'breadcrumb_trail_args', $defaults );

        $breadcrumb = apply_filters( 'breadcrumb_trail_object', null, $args );

        if ( ! is_object( $breadcrumb ) )

            $breadcrumb = new Aarambha_Real_Estate_Breadcrumb_Trail( $args );

        return $breadcrumb->trail();

    }

}

Aarambha_Real_Estate_Breadcrumb::get_instance();

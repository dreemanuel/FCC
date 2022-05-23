<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage  Villa Estate
	 * @since  Villa Estate 1.0.0
	 */

	/**
	 * villa_estate_doctype hook
	 *
	 * @hooked villa_estate_doctype -  10
	 *
	 */
	do_action( 'villa_estate_doctype' );

?>
<head>
<?php
	/**
	 * villa_estate_before_wp_head hook
	 *
	 * @hooked villa_estate_head -  10
	 *
	 */
	do_action( 'villa_estate_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * villa_estate_page_start_action hook
	 *
	 * @hooked villa_estate_page_start -  10
	 *
	 */
	do_action( 'villa_estate_page_start_action' ); 

	/**
	 * villa_estate_loader_action hook
	 *
	 * @hooked villa_estate_loader -  10
	 *
	 */
	do_action( 'villa_estate_before_header' );

	/**
	 * villa_estate_header_action hook
	 *
	 * @hooked villa_estate_site_branding -  10
	 * @hooked villa_estate_header_start -  20
	 * @hooked villa_estate_site_navigation -  30
	 * @hooked villa_estate_header_end -  50
	 *
	 */
	do_action( 'villa_estate_header_action' );

	/**
	 * villa_estate_content_start_action hook
	 *
	 * @hooked villa_estate_content_start -  10
	 *
	 */
	do_action( 'villa_estate_content_start_action' );

    /**
     * villa_estate_header_image_action hook
     *
     * @hooked villa_estate_header_image -  10
     *
     */
    do_action( 'villa_estate_header_image_action' );
	

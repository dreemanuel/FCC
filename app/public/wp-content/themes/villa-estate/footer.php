<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

/**
 * villa_estate_footer_primary_content hook
 *
 * @hooked villa_estate_add_subscribe_section -  10
 *
 */
do_action( 'villa_estate_footer_primary_content' );

/**
 * villa_estate_content_end_action hook
 *
 * @hooked villa_estate_content_end -  10
 *
 */
do_action( 'villa_estate_content_end_action' );

/**
 * villa_estate_content_end_action hook
 *
 * @hooked villa_estate_footer_start -  10
 * @hooked Villa_Estate_Footer_Widgets->add_footer_widgets -  20
 * @hooked villa_estate_footer_site_info -  40
 * @hooked villa_estate_footer_end -  100
 *
 */
do_action( 'villa_estate_footer' );

/**
 * villa_estate_page_end_action hook
 *
 * @hooked villa_estate_page_end -  10
 *
 */
do_action( 'villa_estate_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

$post_sidebar = 'sidebar-1';
if ( is_singular() || is_home() ) :
	$sidebar_id = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id();
	$post_sidebar = get_post_meta( $sidebar_id, 'villa-estate-selected-sidebar', true );
	$post_sidebar = ! empty( $post_sidebar ) ? $post_sidebar : 'sidebar-1';
elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) :
	$post_sidebar = 'woocommerce-sidebar';
endif;
if ( ! is_active_sidebar( $post_sidebar ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( $post_sidebar ); ?>
</aside><!-- #secondary -->

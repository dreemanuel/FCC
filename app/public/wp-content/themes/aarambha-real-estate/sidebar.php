<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aarambha_Real_Estate
 */

if ( ! is_active_sidebar( 'sidebar-1' )
    || Aarambha_Real_Estate_Helper::get_sidebar_layout() == 'none'
    || Aarambha_Real_Estate_Helper::front_page_enable() ) {
    return;
}

/**
 * Functions hooked into aarambha_real_estate_sidebar_before action
 *
 */
do_action( 'aarambha_real_estate_sidebar_before' );
?>

    <aside id="secondary" <?php Aarambha_Real_Estate_Helper::sidebar_class(); ?>>

        <?php
        /**
         * Functions hooked into aarambha_real_estate_sidebar_top action
         *
         */
        do_action( 'aarambha_real_estate_sidebar_top' );
        ?>

        <?php dynamic_sidebar( 'sidebar-1' ); ?>

        <?php
        /**
         * Functions hooked into aarambha_real_estate_sidebar_bottom action
         *
         */
        do_action( 'aarambha_real_estate_sidebar_bottom' );
        ?>

    </aside><!-- #secondary -->

<?php
/**
 * Functions hooked into aarambha_real_estate_sidebar_before action
 *
 */
do_action( 'aarambha_real_estate_sidebar_after' );

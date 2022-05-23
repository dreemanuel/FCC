<?php
/**
 * Template part for displaying footer sidebar 5
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */


if ( is_active_sidebar( 'footer-sidebar-5' ) ) : ?>
    <div class="footer-sidebar-wrap footer-sidebar-5">
        <?php dynamic_sidebar( 'footer-sidebar-5' ); ?>
    </div><!-- .footer-sidebar-wrap -->
<?php endif; ?>

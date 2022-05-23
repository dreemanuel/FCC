<?php
/**
 * Template part for displaying footer sidebar 2
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */


if ( is_active_sidebar( 'footer-sidebar-2' ) ) : ?>
    <div class="footer-sidebar-wrap footer-sidebar-2">
        <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
    </div><!-- .footer-sidebar-wrap -->
<?php endif; ?>

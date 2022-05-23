<?php
/**
 * Template part for displaying footer sidebar 1
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */


if ( is_active_sidebar( 'footer-sidebar-1' ) ) : ?>
<div class="footer-sidebar-wrap footer-sidebar-1">
        <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
    </div><!-- .footer-sidebar-wrap -->
<?php endif; ?>

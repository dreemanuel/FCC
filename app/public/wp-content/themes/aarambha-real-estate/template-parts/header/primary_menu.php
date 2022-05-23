<?php
/**
 * Template part for displaying primary menu
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

?>
<div id="navbar" class="navbar primary-navbar">
    <!-- navbar starting from here -->
    <nav id="site-navigation" class="main-navigation disable-submenu">
        <div class="menu-content-wrapper">
            <?php
			wp_nav_menu( array(
				'theme_location'=> 'primary-menu',
				'menu_class'        => 'menu-wrapper',
				'container_class'   => 'menu-top-menu-container',
				'items_wrap'        => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'       => 'aarambha_real_estate_menu_fallback',
			) );
            ?>
        </div>
    </nav><!-- #site-navigation -->
</div><!-- #navbar -->

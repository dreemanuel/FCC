<?php
/**
 * Template part for displaying header HTML
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */


$content = get_theme_mod(
    'aarambha_real_estate_header_html_text',
    ''
);
?>

<div class="header-html-wrap">
    <?php echo wp_kses_post( $content ); ?>
</div><!-- .header-html-wrap -->
<?php
/**
 * Template part for displaying footer HTML
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */


$content = get_theme_mod(
    'aarambha_real_estate_footer_html_text',
    ''
);
?>

<div class="footer-html-wrap">
    <?php echo wp_kses_post( $content ); ?>
</div><!-- .footer-html-wrap -->
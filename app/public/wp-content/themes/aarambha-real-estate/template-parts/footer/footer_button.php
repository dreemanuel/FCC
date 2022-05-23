<?php
/**
 * Template part for displaying button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$button_text = get_theme_mod(
        'aarambha_real_estate_footer_button_text',
    esc_html__( 'Button', 'aarambha-real-estate' )
);
$button_url = get_theme_mod(
    'aarambha_real_estate_footer_button_url',
    '#'
);
$link_open = get_theme_mod(
    'aarambha_real_estate_footer_button_url_target',
    ''
);
$link_target = ( $link_open && array_key_exists( 'desktop', $link_open ) ) ? '_blank' : '_self';
?>

<div class="footer-button-wrap d-flex align-items-center">
    <a href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
		<label><?php echo esc_html( $button_text ); ?></label>
    </a>
</div><!-- .footer-button-wrap -->

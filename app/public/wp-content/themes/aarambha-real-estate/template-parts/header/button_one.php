<?php
/**
 * Template part for displaying button
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$content_display = get_theme_mod(
    'aarambha_real_estate_header_button_type',
    ['desktop'=> 'text']
);
$button_text = get_theme_mod(
        'aarambha_real_estate_header_button_text',
    esc_html__( 'ENG', 'aarambha-real-estate' )
);
$button_url = get_theme_mod(
    'aarambha_real_estate_header_button_url',
    '#'
);
$link_open = get_theme_mod(
    'aarambha_real_estate_header_button_url_target',
    ''
);

$link_target = ( $link_open && array_key_exists( 'desktop', $link_open ) ) ? '_blank' : '_self';

?>

<div class="header-button-wrap d-flex">
    <a href="<?php echo esc_url( $button_url ); ?>" class="d-flex align-items-center" target="<?php echo esc_attr( $link_target ); ?>">
        <?php if ( $content_display && ( $content_display['desktop'] == 'text' || $content_display['desktop'] == 'both' ) ) : ?>
            <label><?php echo esc_html( $button_text ); ?></label>
        <?php endif; ?>
    </a>
</div><!-- .header-button-wrap -->

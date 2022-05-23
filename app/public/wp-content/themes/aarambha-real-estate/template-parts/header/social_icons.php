<?php
/**
 * Template part for displaying header social
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$social_icons = get_theme_mod(
    'aarambha_real_estate_social_icons',
	[
		[
			'network'   => 'facebook',
			'icon'      => '',
			'link'      => '#'
		],
		[
			'network'   => 'twitter',
			'icon'      => '',
			'link'      => '#'
		]
	]
);

if ( $social_icons ) :

    $content_class = ['d-flex align-items-center'];

    $content_class = array_unique( $content_class );

    $link_open = get_theme_mod(
        'aarambha_real_estate_header_social_icon_link_open',
        ''
    );
    $link_target = ( $link_open && array_key_exists( 'desktop', $link_open ) ) ? '_blank' : '_self';
    ?>

    <ul class="header-social-wrap d-flex">

        <?php foreach ( $social_icons as $social ) :
			$network 	= ($social['network'] != '') ? $social['network'] : 'facebook';
        	$icon		= ($social['icon'] != '') ? $social['icon'] : 'fa-'.$network;
        	?>
            <li>
                <a href="<?php echo esc_url( $social['link'] ); ?>" class="<?php echo esc_attr( join( ' ', $content_class ) ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
					<?php Aarambha_Real_Estate_Font_Awesome_Icons::get_icon( 'ui', $icon ); ?>
                </a>
            </li>
        <?php endforeach; ?>

    </ul><!-- .social-icons -->

<?php
endif;

<?php
/**
 * Template part for displaying front page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */


$sortable_default = Aarambha_Real_Estate_Helper::crucial_real_state_plugin()
    ? ['search','featured','why-us','location','property-types','blog','clients']
    : ['why-us','blog','clients'];
$sortable_elements = get_theme_mod(
  'aarambha_real_estate_front_page_elements',
    $sortable_default
);

if ( $sortable_elements ) {

    foreach ( $sortable_elements as $element ) :

        switch ( $element ) :

            case 'blog' :
                get_template_part( 'template-parts/front-page/content', 'news' );
                break;

            case 'featured' :
                get_template_part( 'template-parts/front-page/content', 'featured' );
                break;

            case 'why-us' :
                get_template_part( 'template-parts/front-page/content', 'why-us' );
                break;

            case 'location' :
                get_template_part( 'template-parts/front-page/content-property', 'location' );
                break;

            case 'property-types' :
                get_template_part( 'template-parts/front-page/content-property', 'types' );
                break;

            case 'clients' :
                get_template_part( 'template-parts/front-page/content', 'clients' );
                break;

            case 'search' :
                get_template_part( 'template-parts/front-page/content', 'search' );
                break;

            case 'slider' :
                get_template_part( 'template-parts/front-page/content', 'banner' );
                break;

        endswitch;

    endforeach;
}

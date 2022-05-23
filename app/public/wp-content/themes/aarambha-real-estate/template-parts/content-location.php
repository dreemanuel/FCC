<?php
/**
 * Template part for displaying property location listing in page-templates/location.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked into aarambha_real_estate_page_entry_content action
	 *
	 * @hooked aarambha_real_estate_page_content - 10
	 */
	do_action( 'aarambha_real_estate_page_entry_content' );
	?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php

get_template_part( 'template-parts/front-page/content-property', 'location' );

<?php
/**
 * Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
    /**
     * Functions hooked into aarambha_real_estate_post_entry_header action
     * @hooked aarambha_real_estate_get_post_thumbnail - 10
     * @hooked aarambha_real_estate_post_header    - 15
     */
    do_action( 'aarambha_real_estate_post_entry_header' );
    ?>

    <?php
    /**
     * Functions hooked into aarambha_real_estate_post_entry_content action
     *
     * @hooked aarambha_real_estate_post_content - 10
     */
    do_action( 'aarambha_real_estate_post_entry_content' );
    ?>

    <?php
    /**
     * Functions hooked into aarambha_real_estate_post_entry_footer action
     *
     * @hooked aarambha_real_estate_post_footer - 10
     */
    do_action( 'aarambha_real_estate_post_entry_footer' );
    ?>

</article><!-- #post-<?php the_ID(); ?> -->

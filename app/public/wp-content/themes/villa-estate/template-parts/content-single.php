<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */
$options = villa_estate_get_theme_options();
?>

<article class="hentry">
	<div class="featured-image">
	<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' ) ?>" alt="<?php the_title(); ?>"></a>
	</div>
	<div class="entry-container">
		<div class="entry-content">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'villa-estate' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'villa-estate' ),
				'after'  => '</div>',
			) );
		?>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->

	<div class="entry-meta">
		<?php if(! $options['single_post_hide_author']):
			echo villa_estate_author();
		endif; 
		if (! $options['single_post_hide_date'] ) :
			villa_estate_posted_on();
		endif; 

		villa_estate_single_categories();
		villa_estate_entry_footer(); ?>
	</div><!-- .entry-meta -->
</article>
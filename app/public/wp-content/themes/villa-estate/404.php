<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

get_header(); ?>
<div class="wrapper page-section">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/uploads/404.jpg' ); ?>" alt="<?php esc_attr_e( '404', 'villa-estate' ); ?>">
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'villa-estate' ); ?></p>

					<?php get_search_form(); ?>
					<div class="read-more">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="btn"><?php esc_html_e('Go Back Home', 'villa-estate'); ?></a>
					</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();

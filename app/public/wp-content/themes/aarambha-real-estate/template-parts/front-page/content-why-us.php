<?php
/**
 * Template part for displaying front page why us section content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$service_page = get_theme_mod( 'aarambha_real_estate_front_page_services_page', '' );
if ( $service_page && $service_page !== '' ) :
	$args = [
		'post_type' 			=> 'page',
		'p'						=> absint($service_page)
	];
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :
		$section_heading = get_theme_mod(
			'aarambha_real_estate_front_page_services_section_heading',
			esc_html__( 'why people choose us', 'aarambha-real-estate' )
		);
        $section_sub_heading = get_theme_mod(
            'aarambha_real_estate_front_page_services_section_sub_heading',
            ''
        );
		?>
		<section class="why-choose-us-section block-base-page-section">
			<div class="container">
                <?php if ( $section_heading || $section_sub_heading ) : ?>
                    <header class="entry-header heading">

                        <?php if ( $section_sub_heading ) : ?>
                            <h4 class="entry-sub-title"><?php echo wp_kses_post( $section_sub_heading ); ?></h4>
                        <?php endif; ?>

                        <?php if ( $section_heading ) : ?>
                            <h2 class="entry-title"><?php echo esc_html( $section_heading ); ?></h2>
                        <?php endif; ?>

                    </header>
                <?php endif; ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="post block-content">
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endwhile; ?>
			</div>
		</section><!-- .why-choose-us-section -->
	<?php endif;
endif; ?>

<?php
/**
 * Template part for displaying front page clients Logo section content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

$clients_logo = get_theme_mod( 'aarambha_real_estate_front_page_clients_logo_lists', '' );
if ( $clients_logo ) :
	$section_heading = get_theme_mod(
		'aarambha_real_estate_front_page_clients_logo_section_heading',
		esc_html__( 'our partners', 'aarambha-real-estate' )
	);
    $section_sub_heading = get_theme_mod(
        'aarambha_real_estate_front_page_clients_logo_section_sub_heading',
        ''
    );
	?>
	<section class="partner-section">
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
			<div class="partner-item-wrapper">
				<?php
				foreach ( $clients_logo as $logo ) :
                    $img_url = wp_get_attachment_image_src( absint($logo['client_logo']), 'full' );
					if ( $img_url ) : ?>
						<div class="partner-item">
							<figure class="client-logo">
								<img src="<?php echo esc_url( $img_url[0] ); ?>" alt="<?php esc_attr_e( 'Clients Logo', 'aarambha-real-estate' ); ?>">
							</figure>
						</div>
					<?php
					endif;
				endforeach; ?>
			</div>
		</div>
	</section><!-- .why-choose-us-section -->
<?php endif;

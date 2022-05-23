<?php
/**
 * Template part for displaying front page featured properties section content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

if ( ! Aarambha_Real_Estate_Helper::crucial_real_state_plugin() )
    return;

$section_heading = get_theme_mod(
    'aarambha_real_estate_front_page_featured_properties_section_heading',
    esc_html__( 'Feature Listings', 'aarambha-real-estate' )
);
$section_sub_heading = get_theme_mod(
    'aarambha_real_estate_front_page_featured_properties_section_sub_heading',
    ''
);
$posts_limit = get_theme_mod(
    'aarambha_real_estate_front_page_featured_properties_limit',
    ['desktop' => 3 ]
);

$col_per_row = [
    'desktop'           => '3',
    'tablet'            => '2',
    'mobile'            => '1'
];
$args = array(
    'post_type'             => 'property',
    'meta_query'            => [
        [
            'key'           => 'cre_featured',
            'value'         => '1'
        ]
    ],
    'posts_per_page'        => absint($posts_limit['desktop']),
    'no_found_rows'         => true,
    'ignore_sticky_posts'   => true
);


$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
    ?>
    <section class="featured-properties-section">
        <!-- featured properties starting from here -->
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

            <div class="row columns"<?php Aarambha_Real_Estate_Helper::get_data_columns( $col_per_row );?>>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $meta_data = get_post_meta( get_the_ID() ); ?>
                    <div class="column">
                        <div class="post">

                            <div class="featured-image-wrapper">
                                <?php aarambha_real_estate_post_thumbnail( 'medium_large', '16x9' ); ?>
                                <?php cre_display_property_label(); ?>

                                <?php
                                $status_terms   = wp_get_post_terms( get_the_ID(), 'property-status', [ 'orderby' => 'term_order' ] );
                                $type_terms     = wp_get_post_terms( get_the_ID(), 'property-type', [ 'orderby' => 'term_order' ] );
                                if ( $status_terms || $type_terms ) : ?>
                                    <div class="post-tags-wrap">

                                        <?php if ( $type_terms ) : ?>
                                            <?php foreach ( $type_terms as $type_term ) : ?>
                                                <a href="<?php echo esc_url( get_term_link( $type_term->slug, 'property-type' ) ); ?>" class="post-tags property-type-<?php echo esc_attr( $type_term->term_id ); ?>"><?php echo esc_html( $type_term->name ); ?></a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <?php if ( $status_terms ) : ?>
                                            <?php foreach ( $status_terms as $status_term ) : ?>
                                                <a href="<?php echo esc_url( get_term_link( $status_term->slug, 'property-status' ) ); ?>" class="post-tags property-status-<?php echo esc_attr( $status_term->term_id ); ?>"><?php echo esc_html( $status_term->name ); ?></a>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div><!-- .post-tags-wrap -->
                                <?php endif; ?>
                            </div><!-- .featured-image-wrapper -->

                            <div class="post-detail-wrap">

                                <header class="entry-header">
                                    <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                </header><!-- .entry-header -->

                                <div class="properties-price">
                                    <?php cre_property_price(); ?>
                                </div><!-- .properties-price -->

                                <div class="entry-content">
                                    <?php Aarambha_Real_Estate_Helper::post_excerpt(); ?>
                                </div><!-- .entry-content -->

                                <div class="property-meta entry-meta">

                                    <?php if ( $bedrooms = get_post_meta( get_the_ID(), 'cre_property_bedrooms', true ) ) : ?>
                                        <div class="meta-wrapper">
                        <span class="meta-icon">
                            <i class="fa fa-bed"></i>
                        </span>
                                            <span class="meta-value"><?php echo esc_html( $bedrooms ); ?></span>
                                            <span class="meta-unit"><?php esc_html_e( 'Beds', 'aarambha-real-estate' ); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( $bathrooms = get_post_meta( get_the_ID(), 'cre_property_bathrooms', true ) ) : ?>
                                        <div class="meta-wrapper">
                        <span class="meta-icon">
                            <i class="fa fa-bath"></i>
                        </span>
                                            <span class="meta-value"><?php echo esc_html( $bathrooms ); ?></span>
                                            <span class="meta-unit"><?php esc_html_e( 'Bath', 'aarambha-real-estate' ); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( $area_size = get_post_meta( get_the_ID(), 'cre_property_size', true ) ) : ?>
                                        <div class="meta-wrapper">
                        <span class="meta-icon">
                            <i class="fa fa-area-chart"></i>
                        </span>
                                            <span class="meta-value"><?php echo esc_html( $area_size ); ?></span>
                                            <?php if ( $area_size_suffix = get_post_meta( get_the_ID(), 'cre_property_size_postfix', true ) ) : ?>
                                                <span class="meta-unit"><?php echo esc_html( $area_size_suffix ); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <div class="property-meta-info">

                                    <?php
                                    $location_terms = wp_get_post_terms( get_the_ID(), 'property-location', [ 'orderby' => 'term_order' ] );
                                    if ( $location_terms ) : ?>
                                        <div class="location-section">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <?php foreach ( $location_terms as $location_term ) : ?>
                                                <a href="<?php echo esc_url( get_term_link( $location_term->slug, 'property-location' ) ); ?>" class="post-tags property-status-<?php echo esc_attr( $location_term->term_id ); ?>"><?php echo esc_html( $location_term->name ); ?></a>
                                            <?php endforeach; ?>
                                        </div><!-- .location-section -->
                                    <?php endif; ?>

                                    <div class="share-section">
                                        <i class="fa fa-share-alt"></i>
                                        <a href="javascript:void(0);" target="_self">
                                            <label><?php esc_html_e( 'Share', 'aarambha-real-estate' ); ?></label>
                                        </a>
                                        <div class="block-social-icons social-links">
                                            <?php cre_social_share();?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif;

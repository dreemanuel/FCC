<?php
/**
 * Template part for displaying custom post property archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Aarambha_Real_Estate
 */

// Meta Data
$image_size = get_theme_mod(
    'aarambha_real_estate_property_archive_posts_image_size',
    ['desktop' => 'large']
);
$size = esc_html( $image_size['desktop'] );
?>

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


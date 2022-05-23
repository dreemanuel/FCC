<?php
/**
* Property Villa section
*
* This is the template for the content of property_villa section
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/
if ( ! function_exists( 'villa_estate_add_property_villa_section' ) ) :
/**
* Add property_villa section
*
*@since  Villa Estate 1.0.0
*/
function villa_estate_add_property_villa_section() {
    $options = villa_estate_get_theme_options();
// Check if property_villa is enabled on frontpage
    $property_villa_enable = apply_filters( 'villa_estate_section_status', true, 'property_villa_section_enable' );

    if ( true !== $property_villa_enable ) {
        return false;
    }
// Get property_villa section details
    $section_details = array();
    $section_details = apply_filters( 'villa_estate_filter_property_villa_section_details', $section_details );

    if ( empty( $section_details ) ) {
        return;
    }
// Render property_villa section now.
    villa_estate_render_property_villa_section( $section_details );
}
endif;

if ( ! function_exists( 'villa_estate_get_property_villa_section_details' ) ) :
/**
* property_villa section details.
*
* @since  Villa Estate 1.0.0
* @param array $input property_villa section details.
*/
function villa_estate_get_property_villa_section_details( $input ) {
    $options = villa_estate_get_theme_options();

// Content type.
    $property_villa_content_type  = $options['property_villa_content_type'];
    $property_villa_count = ! empty( $options['property_villa_count'] ) ? $options['property_villa_count'] : 6;


    $content = array();
    switch ( $property_villa_content_type ) {

        case 'post':
        $post_ids = array();

        for ( $i = 1; $i <= $property_villa_count; $i++ ) {
            if ( ! empty( $options['property_villa_content_post_' . $i] ) )
                $post_ids[] = $options['property_villa_content_post_' . $i];
        }

        $args = array(
            'post_type'             => 'post',
            'post__in'              => ( array ) $post_ids,
            'posts_per_page'        => absint( $property_villa_count ),
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true,
            );                    
        break;

        case 'property':
        $post_ids = array();

        for ( $i = 1; $i <= $property_villa_count; $i++ ) {
            if ( ! empty( $options['property_villa_content_property_' . $i] ) )
                $post_ids[] = $options['property_villa_content_property_' . $i];
        }

        $args = array(
            'post_type'             => 'property',
            'post__in'              => ( array ) $post_ids,
            'posts_per_page'        => absint( $property_villa_count ),
            'orderby'               => 'post__in',
            'ignore_sticky_posts'   => true,
            );                    
        break;

        default:
        break;
    }

// Run The Loop.
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post();
    $page_post['id']        = get_the_id();
    $page_post['title']     = get_the_title();
    $page_post['url']       = get_the_permalink();
    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';
// Push to the main array.
    array_push( $content, $page_post );
    endwhile;
    endif;
    wp_reset_postdata();

    if ( ! empty( $content ) ) {
        $input = $content;
    }
    return $input;
}
endif;
// property_villa section content details.
add_filter( 'villa_estate_filter_property_villa_section_details', 'villa_estate_get_property_villa_section_details' );


if ( ! function_exists( 'villa_estate_render_property_villa_section' ) ) :
/**
* Start property_villa section
*
* @return string property_villa content
* @since  Villa Estate 1.0.0
*
*/
function villa_estate_render_property_villa_section( $content_details = array() ) {
    $options = villa_estate_get_theme_options();
    $btn = $options['property_villa_read_more_btn_label'] ? $options['property_villa_read_more_btn_label'] : '';
    $property_villa_content_type  = $options['property_villa_content_type'];
    if ( empty( $content_details ) ) {
        return;
    } ?>

    <div id="villa_estate_property_villa_section">

    <div id="property-villa" class="relative page-section">
        <div class="wrapper">

            <?php if ( is_customize_preview()):
            villa_estate_section_tooltip( 'property-villa' );
            endif; ?>

            <div class="section-header">
                <?php if( $options['property_villa_sub_title'] ): ?>
                    <p class="section-subtitle"><?php echo esc_html( $options['property_villa_sub_title'] ); ?></p>
                <?php endif;

                if( $options['property_villa_title'] ):
                    ?>
                <h2 class="section-title"><?php echo esc_html( $options['property_villa_title'] ); ?></h2>

            <?php endif; ?>

        </div><!-- .section-header -->

        <div class="section-content col-3 clear">
            <?php foreach($content_details as $content) : ?>
                <article>
                    <div class="featured-image">
                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ) ?>"></a>

                        <?php if ( !in_array( $property_villa_content_type, array( 'post', 'page', 'category' ) ) ) { ?>
                        <span class="property-area">
                            <?php
                            $measurement_units = ere_get_measurement_units();
                            echo wp_kses_post(sprintf( '%s %s', get_post_meta( $content['id'], 'real_estate_property_size', true ), $measurement_units)); 
                            ?>
                        </span>
                        <?php } ?>
                    </div><!-- .featured-image -->

                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <?php if ( $property_villa_content_type !== 'post' ) { ?>

                        <div class="property-meta">

                            <span class="property-location"><?php echo esc_html(  get_post_meta( $content['id'], 'real_estate_property_address', true ) ); ?></span>

                            <span class="property-cost">
                            <?php

                            echo esc_html( ere_get_option('currency_sign') );

                            echo esc_html(  get_post_meta( $content['id'], 'real_estate_property_price', true ) );
                            
                            ?>
                                
                            </span>

                        </div><!-- .property-meta -->
                        <?php } ?>
                    </div><!-- .entry-container -->
                </article>
            <?php endforeach; ?>

        </div><!-- .section-content -->

        <?php if( !empty( $options['property_villa_read_more_btn_url'] ) && !empty( $btn ) ): ?>

            <div class="view-all">
                <a href="<?php echo esc_url( $options['property_villa_read_more_btn_url'] ); ?>" class="btn"><?php echo esc_html( $btn ); ?></a>
            </div><!-- .view-all -->
            
        <?php endif; ?>
    </div><!-- .wrapper -->
</div><!-- #property-villa -->

</div>

<?php }
endif;
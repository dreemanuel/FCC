<?php
/**
* Services section
*
* This is the template for the content of service section
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/
if ( ! function_exists( 'villa_estate_add_service_section' ) ) :
/**
* Add service section
*
*@since  Villa Estate 1.0.0
*/
function villa_estate_add_service_section() {
    $options = villa_estate_get_theme_options();
// Check if service is enabled on frontpage
    $service_enable = apply_filters( 'villa_estate_section_status', true, 'service_section_enable' );

    if ( true !== $service_enable ) {
        return false;
    }
// Get service section details
    $section_details = array();
    $section_details = apply_filters( 'villa_estate_filter_service_section_details', $section_details );

    if ( empty( $section_details ) ) {
        return;
    }

// Render service section now.
    villa_estate_render_service_section( $section_details );
}
endif;

if ( ! function_exists( 'villa_estate_get_service_section_details' ) ) :
/**
* service section details.
*
* @since  Villa Estate 1.0.0
* @param array $input service section details.
*/
function villa_estate_get_service_section_details( $input ) {
    $options = villa_estate_get_theme_options();

    // Content type.

    $content = array();
    $post_ids = array();

    for ( $i = 1; $i <= 3; $i++ ) {
        if ( ! empty( $options['service_content_post_' . $i] ) )
            $post_ids[] = $options['service_content_post_' . $i];
    }

    $args = array(
        'post_type'             => 'post',
        'post__in'              => ( array ) $post_ids,
        'posts_per_page'        => absint( 3 ),
        'orderby'               => 'post__in',
        'ignore_sticky_posts'   => true,
        );

// Run The Loop.
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post();
    $page_post['id']        = get_the_id();
    $page_post['title']     = get_the_title();
    $page_post['content']   = villa_estate_trim_content( 20 );
    $page_post['url']       = get_the_permalink();

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
// service section content details.
add_filter( 'villa_estate_filter_service_section_details', 'villa_estate_get_service_section_details' );

if ( ! function_exists( 'villa_estate_render_service_section' ) ) :
/**
* Start service section
*
* @return string service content
* @since  Villa Estate 1.0.0
*
*/
function villa_estate_render_service_section( $content_details = array() ) {
    $options    = villa_estate_get_theme_options();
    $service_sub_title  = $options['service_section_sub_title'];
    $service_title      = isset($options['service_section_title']) ? $options['service_section_title']: '';

    if ( empty( $content_details ) ) {
        return;
    } ?>

    <div id="villa_estate_service_section">

    <div id="service-section" class="relative page-section">
        <div class="wrapper">
            <?php if ( is_customize_preview()):
            villa_estate_section_tooltip( 'service-section' );
            endif; ?>
            <div class="section-header">
                <?php if( !empty( $service_sub_title ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( $service_sub_title ); ?></p>
                <?php endif;
                if( !empty( $service_title ) ):
                    ?>
                <h2 class="section-title"><?php echo esc_html( $service_title ); ?></h2>
            <?php endif; ?>
        </div><!-- .section-header -->

            <div class="section-content col-3 clear">
                

                <?php $i=1; foreach( $content_details as $content ): ?>

            <article>
                <div class="service-item">
                    <div class="entry-container">

                        <?php if( !empty( $options['service_image_'.$i] ) ): ?>
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $options['service_image_'.$i] ) ?>" alt="service <?php echo esc_attr( $i ); ?> "></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>

                        <div class="entry-content">
                            <p><?php echo esc_html($content['content']); ?></p>
                        </div><!-- .entry-content -->
                    </div><!-- .entry-container -->
                </div><!-- .service-item -->
            </article>

            <?php $i++; endforeach; ?>

            </div><!-- .col-3 -->
        </div><!-- .wrapper -->
    </div><!-- #service-section -->

    </div>

<?php
}    
endif;
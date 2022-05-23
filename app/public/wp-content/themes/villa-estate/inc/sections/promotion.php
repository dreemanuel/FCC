<?php
/**
 * Promotion section
 *
 * This is the template for the content of promotion section
 *
 * @package Theme Palace
 * @subpackage Villa Estate
 * @since Villa Estate 1.0.0
 */
if ( ! function_exists( 'villa_estate_add_promotion_section' ) ) :
    /**
    * Add promotion section
    *
    *@since Villa Estate 1.0.0
    */
    function villa_estate_add_promotion_section() {
        $options = villa_estate_get_theme_options();
        // Check if promotion is enabled on frontpage
        $promotion_enable = apply_filters( 'villa_estate_section_status', true, 'promotion_section_enable' );

        if ( true !== $promotion_enable ) {
            return false;
        }
        // Get promotion section details
        $section_details = array();
        $section_details = apply_filters( 'villa_estate_filter_promotion_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render promotion section now.
        villa_estate_render_promotion_section( $section_details );
    }
endif;

if ( ! function_exists( 'villa_estate_get_promotion_section_details' ) ) :
    /**
    * promotion section details.
    *
    * @since Villa Estate 1.0.0
    * @param array $input promotion section details.
    */
    function villa_estate_get_promotion_section_details( $input ) {
        $options = villa_estate_get_theme_options();
        
        $content = array();
        $post_id = ! empty( $options['promotion_content_post'] ) ? $options['promotion_content_post'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'p'                 => $post_id,
                    'posts_per_page'    => 1,
                    );

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = villa_estate_trim_content( 25 );
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
// promotion section content details.
add_filter( 'villa_estate_filter_promotion_section_details', 'villa_estate_get_promotion_section_details' );


if ( ! function_exists( 'villa_estate_render_promotion_section' ) ) :
  /**
   * Start promotion section
   *
   * @return string promotion content
   * @since Villa Estate 1.0.0
   *
   */
function villa_estate_render_promotion_section( $content_details = array() ) {
    $options = villa_estate_get_theme_options();
    $promotion_image = ! empty( $options['promotion_image'] ) ? $options['promotion_image'] : '';

    if ( empty( $content_details ) ) {
        return;
    } 
    ?>
    <div id="villa_estate_promotion_section">
    <?php foreach ( $content_details as $content ): ?>

        <div id="promotion-section" class="relative page-section" style="background-image: url('<?php echo esc_url( $promotion_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                villa_estate_section_tooltip( 'promotion-section' );
                endif;

                if( !empty( $content['title'] ) ): ?>
                    <header class="entry-header">
                        <h2 class="entry-title"><?php echo esc_html( $content['title'] ) ; ?></h2>
                    </header>
                <?php endif; 

                if( !empty( $content['excerpt'] ) ):
                    ?>

                <div class="entry-content">
                    <p><?php echo wp_kses_post( $content['excerpt'] ) ; ?></p>
                </div><!-- .entry-content -->
            <?php endif;

            if ( ! empty( $options['promotion_button'] ) && !empty( $content['url'] ) ): ?>
                <div class="read-more">
                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( $options['promotion_button'] ) ; ?></a>
                </div>
            <?php endif; ?>
        </div><!-- .wrapper -->
    </div><!-- #promotion-section -->

    <?php 
    endforeach;
    ?>
    </div>
    <?php
}
endif;


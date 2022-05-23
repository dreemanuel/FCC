<?php
/**
 * Latest Posts section
 *
 * This is the template for the content of latest_posts section
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */
if ( ! function_exists( 'villa_estate_add_latest_posts_section' ) ) :
    /**
    * Add latest_posts section
    *
    *@since  Villa Estate 1.0.0
    */
    function villa_estate_add_latest_posts_section() {
    	$options = villa_estate_get_theme_options();
        // Check if latest_posts is enabled on frontpage
        $latest_posts_enable = apply_filters( 'villa_estate_section_status', true, 'latest_posts_section_enable' );

        if ( true !== $latest_posts_enable ) {
            return false;
        }
        // Get latest_posts section details
        $section_details = array();
        $section_details = apply_filters( 'villa_estate_filter_latest_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest_posts section now.
        villa_estate_render_latest_posts_section( $section_details );
}

endif;

if ( ! function_exists( 'villa_estate_get_latest_posts_section_details' ) ) :
    /**
    * latest_posts section details.
    *
    * @since  Villa Estate 1.0.0
    * @param array $input latest_posts section details.
    */
    function villa_estate_get_latest_posts_section_details( $input ) {
        $options = villa_estate_get_theme_options();

        // Content type.
        $latest_posts_content_type    = $options['latest_posts_content_type'];
            
        $content = array();
        switch ( $latest_posts_content_type ) {
            
            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['latest_posts_content_post_' . $i] ) )
                        $post_ids[] = $options['latest_posts_content_post_' . $i];
                }
                
                $args = array(
                    'post_type'             => 'post',
                    'post__in'              => ( array ) $post_ids,
                    'posts_per_page'        => absint( 3 ),
                    'orderby'               => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['latest_posts_category'] ) ? $options['latest_posts_category'] : '';
                $args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => absint( 3 ),
                    'cat'                   => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = villa_estate_trim_content(25);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
            $i++;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// latest_posts section content details.
add_filter( 'villa_estate_filter_latest_posts_section_details', 'villa_estate_get_latest_posts_section_details' );


if ( ! function_exists( 'villa_estate_render_latest_posts_section' ) ) :
  /**
   * Start latest_posts section
   *
   * @return string latest_posts content
   * @since  Villa Estate 1.0.0
   *
   */
   function villa_estate_render_latest_posts_section( $content_details = array() ) {
        $options = villa_estate_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="villa_estate_latest_posts_section">
        <div id="latest-posts-section" class="relative page-section">
            <div class="wrapper">
            <?php if ( is_customize_preview()):
            villa_estate_section_tooltip( 'latest-posts-section' );
            endif; ?>
                <div class="section-header">
                <?php if( !empty( $options['latest_posts_section_sub_title'] ) ): ?>
                <p class="section-subtitle"><?php echo esc_html( $options['latest_posts_section_sub_title'] ); ?></p>
            <?php endif;

                    if( !empty( $options['latest_posts_section_title'] ) ):
             ?>
                <h2 class="section-title"><?php echo esc_html( $options['latest_posts_section_title'] ); ?></h2>
            <?php endif; ?>
                </div><!-- .section-header -->

                <div class="archive-blog-wrapper col-3 clear">

                <?php foreach ( $content_details as $content ) : ?>

                    <article>
                        <div class="post-wrapper">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url($content['image']); ?>" alt="<?php echo esc_html( $content['title'] ); ?>"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                            <?php villa_estate_posted_on($content['id']); ?>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>

                    <?php endforeach; ?>

                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #latest-posts-section -->
        </div>

<?php
    }    
endif;
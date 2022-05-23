<?php
/**
* Team section
*
* This is the template for the content of team section
*
* @package Theme Palace
* @subpackage  Villa Estate
* @since  Villa Estate 1.0.0
*/
if ( ! function_exists( 'villa_estate_add_team_section' ) ) :
/**
* Add team section
*
*@since  Villa Estate 1.0.0
*/
function villa_estate_add_team_section() {
    $options = villa_estate_get_theme_options();
// Check if team is enabled on frontpage
    $team_enable = apply_filters( 'villa_estate_section_status', true, 'team_section_enable' );

    if ( true !== $team_enable ) {
        return false;
    }
// Get team section details
    $section_details = array();
    $section_details = apply_filters( 'villa_estate_filter_team_section_details', $section_details );

    if ( empty( $section_details ) ) {
        return;
    }

// Render team section now.
    villa_estate_render_team_section( $section_details );
}
endif;

if ( ! function_exists( 'villa_estate_get_team_section_details' ) ) :
/**
* team section details.
*
* @since  Villa Estate 1.0.0
* @param array $input team section details.
*/
function villa_estate_get_team_section_details( $input ) {
    $options = villa_estate_get_theme_options();

    $content = array();
    
     $page_ids = array();
        $position = array();

        for ( $i = 1; $i <= absint(3); $i++ ) {
            if ( ! empty( $options['team_content_page_' . $i] ) ) :
                $page_ids[] = $options['team_content_page_' . $i];
            endif;
        }

        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint(3),
            'orderby'           => 'post__in',
            );

// Run The Loop.
    $query = new WP_Query( $args );
    $i = 1;
    if ( $query->have_posts() ) : 
        while ( $query->have_posts() ) : $query->the_post();
    $page_post['title']     = get_the_title();
    $page_post['position']  = (! empty(  $options['team_position_' . $i] ) ) ?  $options['team_position_' . $i] : '';
    $page_post['social']    = (! empty( $options['team_social_' . $i] ) ) ? $options['team_social_' . $i] : '';
    $page_post['url']       = get_the_permalink();
    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnails' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-600x450.jpg';

// Push to the main array.
    array_push( $content, $page_post );
    $i++;
    endwhile;
    endif;
    wp_reset_postdata();

    if ( ! empty( $content ) ) {
        $input = $content;
    }
    return $input;
}
endif;
// team section content details.
add_filter( 'villa_estate_filter_team_section_details', 'villa_estate_get_team_section_details' );


if ( ! function_exists( 'villa_estate_render_team_section' ) ) :
/**
* Start team section
*
* @return string team content
* @since  Villa Estate 1.0.0
*
*/
function villa_estate_render_team_section( $content_details = array() ) {
    $options = villa_estate_get_theme_options();

    if ( empty( $content_details ) ) {
        return;
    } ?>

    <div id="villa_estate_team_section">

    <div id="team-section" class="relative page-section">
        <div class="wrapper">
            <?php if ( is_customize_preview()):
            villa_estate_section_tooltip( 'team-section' );
            endif; ?>
            <div class="section-header">
                <?php if( !empty( $options['team_sub_title'] ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( $options['team_sub_title'] ); ?></p>
                <?php endif;

                if( !empty( $options['team_title'] ) ):
                    ?>
                <h2 class="section-title"><?php echo esc_html( $options['team_title'] ); ?></h2>

            <?php endif; ?>

        </div><!-- .section-header -->

        <div class="section-content col-3 clear">

            <?php foreach ( $content_details as $content ) : ?>

                <article>
                    <div class="team-item-wrapper">
                        <div class="featured-image">
                            <a href="<?php echo esc_url($content['url']); ?>"><img src="<?php echo esc_url($content['image']); ?>" alt="<?php echo esc_attr($content['title']); ?>"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php if( !empty( $content['position'] ) ): ?>
                                    <span class="team-position"><?php echo esc_html( $content['position'] ); ?></span>
                                <?php endif; ?>
                            </header>

                            <?php
                            if ( ! empty( $content['social'] ) ) : 
                                $social = explode( '|', $content['social'] ); ?>
                            <div class="social-icons">
                                <ul>
                                    <?php foreach( $social as $social_link ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $social_link ); ?>">
                                                <?php echo villa_estate_return_social_icon( $social_link ); ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </div><!-- .entry-container -->
                </div><!-- team-item-wrapper -->
            </article>

        <?php endforeach; ?>

    </div><!-- .col-3 -->
</div><!-- .wrapper -->
</div><!-- #team-section -->

</div>

<?php }
endif;
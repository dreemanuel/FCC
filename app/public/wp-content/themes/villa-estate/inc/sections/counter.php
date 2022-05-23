<?php
/**
 * counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */
if ( ! function_exists( 'villa_estate_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since  Villa Estate 1.0.0
    */
    function villa_estate_add_counter_section() {
        $options = villa_estate_get_theme_options();
        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'villa_estate_section_status', true, 'counter_section_enable' );

        if ( true !== $counter_enable ) {
            return false;
        }

        // Render counter section now.
        villa_estate_render_counter_section();
    }
endif;

if ( ! function_exists( 'villa_estate_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since  Villa Estate 1.0.0
   *
   */
   function villa_estate_render_counter_section() {
        $options = villa_estate_get_theme_options();
        $image   = empty( $options['counter_image'] ) ? '' : $options['counter_image'] ;

       ?>
        <div id="villa_estate_counter_section">
       <div id="counter-section" class="relative page-section" style="background-image: url('<?php echo esc_url( $image ); ?>');">
        <div class="overlay"></div>
        <div class="wrapper">
            <?php if ( is_customize_preview()):
            villa_estate_section_tooltip( 'counter-section' );
            endif; ?>
            <div class="section-content col-4 clear">

                <?php for ( $i = 1; $i <= 4; $i++){ 
                    $icon    = isset($options['counter_icon_'.$i]) ? $options['counter_icon_'.$i] : 'fa-globe';
                    ?>

                    <article>

                        <div class="counter-item">
                            <?php if( !empty( $icon ) ): ?>
                                <div class="counter-icon">
                                    <i class="fa <?php echo esc_attr( $icon ) ; ?>"></i>
                                </div>

                            <?php endif;
                            if( !empty( $options['counter_value_'.$i] ) ):
                                ?>
                            <h2 class="counter-value"><?php echo esc_html( $options['counter_value_'.$i] ); ?></h2>

                        <?php endif;
                        if( !empty( $options['counter_title_'.$i] ) ):
                            ?>
                        <h3 class="counter-title"><?php echo esc_html( $options['counter_title_'.$i] ); ?></h3>
                    <?php endif; ?>
                </div><!-- .counter-item -->
            </article>

            <?php } ?>

        </div><!-- .section-content -->
    </div><!-- .wrapper -->
</div><!-- #counter-section -->
</div>

    <?php }
endif;

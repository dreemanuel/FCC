<?php
/**
 * Search Property section
 *
 * This is the template for the content of search_property section
 *
 * @package Theme Palace
 * @subpackage Villa Estate
 * @since Villa Estate 1.0.0
 */
if ( ! function_exists( 'villa_estate_add_search_property_section' ) ) :
    /**
    * Add search_property section
    *
    *@since Villa Estate 1.0.0
    */
    function villa_estate_add_search_property_section() {
    	$options = villa_estate_get_theme_options();
        // Check if search_property is enabled on frontpage
        $search_property_enable = apply_filters( 'villa_estate_section_status', true, 'search_property_section_enable' );

        if ( true !== $search_property_enable ) {
            return false;
        }

        // Render search_property section now.
        villa_estate_render_search_property_section();
    }
endif;

if ( ! function_exists( 'villa_estate_render_search_property_section' ) ) :
  /**
   * Start search_property section
   *
   * @return string search_property content
   * @since Villa Estate 1.0.0
   *
   */
   function villa_estate_render_search_property_section() {

        $options = villa_estate_get_theme_options();
        $search_property_title = ! empty( $options['search_property_title'] ) ? $options['search_property_title'] : '';
        $search_property_description = ! empty( $options['search_property_description'] ) ? $options['search_property_description'] : '';
        $search_property_image = ! empty( $options['search_property_image'] ) ? $options['search_property_image'] : '';
        ?>
        
        <div id="villa_estate_search_property_section">

            <div id="search-property" class="relative" style="background-image: url('<?php echo esc_url( $search_property_image ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <?php if ( is_customize_preview()):
                    villa_estate_section_tooltip( 'search-property' );
                    endif; ?>
                    <article>
                        <div class="entry-container">
                            <?php if( !empty( $search_property_title ) ): ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><?php echo esc_html( $search_property_title ); ?></h2>
                                </header>

                            <?php endif;

                            if( !empty( $search_property_description ) ):
                                ?>

                            <div class="entry-content">
                                <p><?php echo wp_kses_post( $search_property_description ); ?></p>
                            </div><!-- .entry-content -->

                        <?php endif; ?>

                        <?php
                        //echo ere_get_search_form_fields_config();
                        //var_dump(ere_get_search_form_fields_config());
                        get_search_form();
                        ?>

                    </div><!-- .entry-container -->
                </article>
            </div><!-- .wrapper -->
        </div><!-- #search-property -->

    </div>

    <?php 
}
endif;


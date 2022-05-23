<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aarambha_Real_Estate
 */

get_header();
?>

<?php
/**
 * Functions hooked into aarambha_real_estate_content_before action
 *
 * @hooked aarambha_real_estate_content_before_page_header     - 10
 * @hooked aarambha_real_estate_content_before_wrapper_start   - 15
 */
do_action( 'aarambha_real_estate_content_before' );
?>

<section class="error-404 not-found">
    <?php
    $content_elements = get_theme_mod(
        'aarambha_real_estate_404_error_page_content_elements',
        ['title','subtitle','button']
    );
    if ( ! empty( $content_elements ) ) :

        $error_image = get_theme_mod(
            'aarambha_real_estate_404_error_image',
            ''
        );
        ?>
        <div class="error-page-content">

            <?php foreach ( $content_elements as $content ) :

                switch ( $content ) :

                    case 'image' :
                        ?>
                        <figure>
                            <img src="<?php echo esc_url( $error_image ); ?>" alt="<?php esc_attr_e( '404 Error Image', 'aarambha-real-estate' ); ?>">
                        </figure>
                        <?php
                        break;

                    case 'title' :
                        ?>
                        <h2><?php esc_html_e( '404', 'aarambha-real-estate' ); ?></h2>
                        <?php
                        break;

                    case 'subtitle' :
                        ?>
                        <h4><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'aarambha-real-estate'); ?></h4>
                        <?php
                        break;

                    case 'button' :
                        ?>
                        <a class="box-button home-button" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Return Home', 'aarambha-real-estate' ); ?></a>
                        <?php
                        break;

                    case 'search' :
                        get_search_form();
                        break;

                endswitch;
            endforeach; ?>
        </div><!-- .error-page-content -->
    <?php
    endif;
    ?>
</section><!-- .error-404 -->

<?php
/**
 * Functions hooked into aarambha_real_estate_content_after action
 *
 * @hooked aarambha_real_estate_content_after_wrapper_end     - 10
 */
do_action( 'aarambha_real_estate_content_after' );
?>

<?php get_footer(); ?>

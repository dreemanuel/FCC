<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 */

$options = villa_estate_get_theme_options();  


if ( ! function_exists( 'villa_estate_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since  Villa Estate 1.0.0
	 */
	function villa_estate_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;
add_action( 'villa_estate_doctype', 'villa_estate_doctype', 10 );


if ( ! function_exists( 'villa_estate_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'villa_estate_before_wp_head', 'villa_estate_head', 10 );

if ( ! function_exists( 'villa_estate_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'villa-estate' ); ?></a>
		<?php
	}
endif;
add_action( 'villa_estate_page_start_action', 'villa_estate_page_start', 10 );

if ( ! function_exists( 'villa_estate_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'villa_estate_page_end_action', 'villa_estate_page_end', 10 );

if ( ! function_exists( 'villa_estate_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_site_branding() {
		$options  = villa_estate_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];	
		$col = ( $options['social_menu_enable'] == true ) ? 'col-2' : 'col-1';
		?>

		<div class="menu-overlay"></div>

		<?php if ( $options['top_bar_section_enable'] ): ?>

		<div id="top-navigation" class="relative">
            <div class="wrapper">
                <div class="<?php echo esc_attr( $col ); ?>">
                    <div class="contact-info">
                        <li>
                        	<?php if ( !empty( $options['topbar_icon'] ) ): ?>
                        		<i class="fa <?php echo esc_attr( $options['topbar_icon'] ); ?>"></i>
                        	<?php endif ?>
                        	<?php if ( !empty( $options['topbar_text'] ) ): ?>
                        		<?php echo villa_estate_santize_allow_tag( $options['topbar_text'] ) ?>	
                        	<?php endif ?>
                        </li>
                    </div><!-- .contact-info -->  

                    <?php if( $options['social_menu_enable'] == true ){ ?>

                    <div class="social-icons">
                    	<?php 
                    	wp_nav_menu( array(
                    		'theme_location' => 'social',
                    		'container' => false,
                    		'echo' => true,
                    		'depth' => 1,
                    		'link_before' => '<span class="screen-reader-text">',
                    		'link_after' => '</span>',
                    		'fallback_cb' => false,
                    		) ); 
                    		?>
                    </div><!-- .social-icons -->

                    <?php } ?>

                </div><!-- .col-2 -->
            </div><!-- .wrapper -->
        </div><!-- #top-navigation -->

    <?php endif; ?>

		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
				<div class="site-branding">
					<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) ) && has_custom_logo()  ) : ?>
						<div class="site-logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php endif; 

					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
					<div id="site-identity">
						<?php
						if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
							if ( villa_estate_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						} 
						if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
							<?php
							endif; 
						}?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php echo esc_attr( 'Primary Menu', 'villa-estate' ); ?>">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php
					echo villa_estate_get_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
					echo villa_estate_get_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
					?>	
					<span class="menu-label"><?php esc_html_e('Menu', 'villa-estate')?></span>		
				</button>

				<?php  

				$button = '';

				if ( $options['nav_btn'] && (!empty( $options['nav_btn_url'] ) && !empty( $options['nav_btn_txt'] ) ) ) :
					$button = '<li><a href="'. esc_url( $options['nav_btn_url'] ) .'"  class="custom-button">'
				. esc_html( $options['nav_btn_txt'] ) .'</a>
			</li>';

			endif;

			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'div',
				'menu_class' => 'menu nav-menu',
				'menu_id' => 'primary-menu',
				'echo' => true,
				'fallback_cb' => 'villa_estate_menu_fallback_cb',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'  . $button . '</ul>',
				) );
				?>

			</nav><!-- #site-navigation -->
		</div><!-- .wrapper -->
	</header><!-- .header-->
<?php 
	}
endif;
add_action( 'villa_estate_header_action', 'villa_estate_site_branding', 10 );

if ( ! function_exists( 'villa_estate_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'villa_estate_content_start_action', 'villa_estate_content_start', 10 );

if ( ! function_exists( 'villa_estate_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since  Villa Estate 1.0.0
     *
     */
    function villa_estate_header_image() {
        if ( villa_estate_is_frontpage() )
            return;
        $header_image = get_header_image();
      
        ?>

        <div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php villa_estate_custom_header_banner_title(); ?>
                </header>
                <?php villa_estate_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->

        <?php
    }
endif;
add_action( 'villa_estate_header_image_action', 'villa_estate_header_image', 10 );

if ( ! function_exists( 'villa_estate_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since  Villa Estate 1.0.0
	 */
	function villa_estate_add_breadcrumb() {
		$options = villa_estate_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( villa_estate_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * villa_estate_simple_breadcrumb hook
				 *
				 * @hooked villa_estate_simple_breadcrumb -  10
				 *
				 */
				do_action( 'villa_estate_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'villa_estate_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_content_end() {
		?>
        </div><!-- #content -->
		<?php
	}
endif;
add_action( 'villa_estate_content_end_action', 'villa_estate_content_end', 10 );

if ( ! function_exists( 'villa_estate_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'villa_estate_footer', 'villa_estate_footer_start', 10 );

if ( ! function_exists( 'villa_estate_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_footer_site_info() {
		$options = villa_estate_get_theme_options();
		$theme_data = wp_get_theme();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text'];
		?>
		<div class="site-info">
            <div class="wrapper">
                <span>
					<?php echo villa_estate_santize_allow_tag( $copyright_text ); ?>
				
					<?php echo esc_html__( ' All Rights Reserved | ', 'villa-estate' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'villa-estate' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
                </span>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'villa_estate_footer', 'villa_estate_footer_site_info', 40 );

if ( ! function_exists( 'villa_estate_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_footer_scroll_to_top() {
		$options  = villa_estate_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo villa_estate_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'villa_estate_footer', 'villa_estate_footer_scroll_to_top', 40 );


if ( ! function_exists( 'villa_estate_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_loader() {
		?>

			<div id="loader">
	            <div class="loader-container">
	            	<div id="preloader">
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                    <span></span>
		                </div>
	            </div>
	        </div><!-- #loader -->
		<?php
	}
endif;
add_action( 'villa_estate_before_header', 'villa_estate_loader', 10 );


if ( ! function_exists( 'villa_estate_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since  Villa Estate 1.0.0
	 *
	 */
	function villa_estate_infinite_loader_spinner() { 
		global $post;
		$options = villa_estate_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :			
			echo '<div class="blog-loader">' . villa_estate_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';			
		endif;
	}
endif;
add_action( 'villa_estate_infinite_loader_spinner_action', 'villa_estate_infinite_loader_spinner', 10 );

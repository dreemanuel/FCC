<?php
/**
 * The Header for our theme.
 * @package Real Estate Realtor
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('real_estate_realtor_preloader',false) != '' || get_theme_mod( 'real_estate_realtor_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="position-relative">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'real-estate-realtor' ); ?></a>
    <div id="header">
      <div class="topbar py-2">
        <div  class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8 align-self-center">
              <?php if ( get_theme_mod('real_estate_realtor_email_address','') != "" ) {?>
                <span class="me-3"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_email_icon','far fa-envelope')); ?> me-2 icon-color"></i><a href="mailto:<?php echo esc_attr( get_theme_mod('real_estate_realtor_email_address','' )); ?>"><?php echo esc_html( get_theme_mod('real_estate_realtor_email_address','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('real_estate_realtor_email_address','') ); ?></span></a></span>
              <?php }?>
              <?php if ( get_theme_mod('real_estate_realtor_location_address','') != "" ) {?>
                <span><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_location_icon','fas fa-map-marker-alt')); ?> me-2 icon-color"></i><?php echo esc_html( get_theme_mod('real_estate_realtor_location_address','') ); ?></span>
              <?php }?>
            </div>
            <div class="col-lg-4 col-md-4 align-self-center text-center text-md-end">
              <?php if ( get_theme_mod('real_estate_realtor_facebook_link','') != "" ) {?>
                <a href="<?php echo esc_attr( get_theme_mod('real_estate_realtor_facebook_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_facebook_icon','fab fa-facebook-f')); ?> me-3"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('real_estate_realtor_twitter_link','') != "" ) {?>
                <a href="<?php echo esc_attr( get_theme_mod('real_estate_realtor_twitter_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_twitter_icon','fab fa-twitter')); ?> me-3"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('real_estate_realtor_linkdin_link','') != "" ) {?>
                <a href="<?php echo esc_attr( get_theme_mod('real_estate_realtor_linkdin_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_linkdin_icon','fab fa-linkedin-in')); ?> me-3"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('real_estate_realtor_instagram_link','') != "" ) {?>
                <a href="<?php echo esc_attr( get_theme_mod('real_estate_realtor_instagram_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_instagram_icon','fab fa-instagram')); ?> me-3"></i></a>
              <?php }?>
              <?php if ( get_theme_mod('real_estate_realtor_pintrest_link','') != "" ) {?>
                <a href="<?php echo esc_attr( get_theme_mod('real_estate_realtor_pintrest_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_pintrest_icon','fab fa-pinterest-p')); ?>"></i></a>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="menu-header py-2 <?php if( get_theme_mod( 'real_estate_realtor_sticky_header', false) != '' || get_theme_mod( 'real_estate_realtor_display_fixed_header', false) != '') { ?> sticky-header"<?php } else { ?>close-sticky <?php } ?>">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 align-self-center">
              <div class="logo pb-3 pb-md-0 align-self-center">
                <div class="row">
                  <div class="<?php if( get_theme_mod( 'real_estate_realtor_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5"<?php } else { ?>col-lg-12 col-md-12  <?php } ?>">
                    <?php if ( has_custom_logo() ) : ?>
                      <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="<?php if( get_theme_mod( 'real_estate_realtor_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                    <?php if ( ! empty( $blog_info ) ) : ?>
                      <?php if( get_theme_mod('real_estate_realtor_site_title_enable',true) != ''){ ?>
                        <?php if ( is_front_page() && is_home() ) : ?>
                          <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>
                      <?php }?>
                    <?php endif; ?>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                      <?php if( get_theme_mod('real_estate_realtor_site_tagline_enable',true) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                      <?php }?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-4 col-4 align-self-center">
              <?php
              if(has_nav_menu('primary')){ ?>
                <div class="toggle-menu responsive-menu text-end">
                  <button role="tab" onclick="real_estate_realtor_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_responsive_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','real-estate-realtor'); ?></span>
                  </button>
                </div>
              <?php }?>
              <div id="navbar-header text-center" class="menu-brand primary-nav">
                <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'real-estate-realtor' ); ?>">
                  <?php
                    if(has_nav_menu('primary')){
                      wp_nav_menu( array( 
                        'theme_location' => 'primary',
                        'container_class' => 'main-menu-navigation clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0 text-start">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) );
                    } 
                  ?>
                </nav>
                <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="real_estate_realtor_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','real-estate-realtor'); ?></span></a>
              </div>
            </div>
            <div class="col-lg-2 col-md-4 col-8 align-self-center">
              <?php if ( get_theme_mod('real_estate_realtor_listing_button_link','') != "" || get_theme_mod('real_estate_realtor_listing_button_text','') != "" ) {?>
                <div class="listing-btn text-center text-md-end">
                  <a href="<?php echo esc_url( get_theme_mod('real_estate_realtor_listing_button_link','') ); ?>"><i class="<?php echo esc_attr(get_theme_mod('real_estate_realtor_listing_btn_icon','fas fa-home')); ?> me-2"></i><?php echo esc_html( get_theme_mod('real_estate_realtor_listing_button_text','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('real_estate_realtor_listing_button_text','') ); ?></span></a>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
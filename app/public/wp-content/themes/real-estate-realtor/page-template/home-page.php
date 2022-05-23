<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main role="main" id="skip_content">
  <?php do_action( 'real_estate_realtor_above_slider' ); ?>
  <?php if( get_theme_mod('real_estate_realtor_slider_hide', false) != '' || get_theme_mod( 'real_estate_realtor_display_slider',false) != ''){ ?>
    <section id="slider" class="m-auto p-0 mw-100">
      <?php $real_estate_realtor_slider_speed = get_theme_mod('real_estate_realtor_slider_speed', 3000); ?>
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr($real_estate_realtor_slider_speed); ?>"> 
        <?php $real_estate_realtor_slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'real_estate_realtor_slider_setting' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $real_estate_realtor_slider_page[] = $mod;
            }
          }
          if( !empty($real_estate_realtor_slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $real_estate_realtor_slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <?php if( get_theme_mod('real_estate_realtor_slider_heading',true) != '' || get_theme_mod('real_estate_realtor_slider_text',true) != '' ){ ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <div class="carousel-content">
                      <?php if( get_theme_mod('real_estate_realtor_slider_heading',true) != ''){ ?>
                        <h1 class="mt-3 mb-0"><?php the_title(); ?></h1>
                      <?php } ?>
                      <?php if( get_theme_mod('real_estate_realtor_slider_text',true) != ''){ ?>
                        <p><?php $excerpt = get_the_excerpt(); echo esc_html( real_estate_realtor_string_limit_words( $excerpt, esc_attr(get_theme_mod('real_estate_realtor_slider_excerpt_number','15')))); ?></p>
                      <?php } ?>
                      <?php if( get_theme_mod('real_estate_realtor_slider_search_box',true) != ''){ ?>
                        <div class="search-box p-3 mt-md-5">
                          <?php get_search_form(); ?>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon rounded-circle" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','real-estate-realtor' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon rounded-circle" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','real-estate-realtor' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'real_estate_realtor_below_slider' ); ?>

  <section id="popular-properties" class="py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
          <div class="heading-box pb-3 pb-md-0">
            <?php if( get_theme_mod('real_estate_realtor_properties_section_title') != '' ){ ?>
              <h3 class="pb-0"><?php echo esc_html(get_theme_mod('real_estate_realtor_properties_section_title',''));?></h3>
            <?php }?>
            <?php if( get_theme_mod('real_estate_realtor_properties_section_text') != '' ){ ?>
              <p class="mb-0"><?php echo esc_html(get_theme_mod('real_estate_realtor_properties_section_text',''));?></p>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
          <div class="tab text-center text-md-end">
            <?php
              $popular_properties = get_theme_mod('real_estate_realtor_properties_counter', '');
              for ( $j = 1; $j <= $popular_properties; $j++ ){ ?>
              <button class="tablinks ms-2" onclick="real_estate_realtor_properties_tab(event, '<?php $main_id = get_theme_mod('real_estate_realtor_properties_tab_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?> ')">
              <?php echo esc_html(get_theme_mod('real_estate_realtor_properties_tab_text'.$j)); ?></button>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <?php for ( $j = 1; $j <= $popular_properties; $j++ ){ ?>
        <div id="<?php $main_id = get_theme_mod('real_estate_realtor_properties_tab_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?>"  class="tabcontent">
          <div class="owl-carousel">
            <?php
            $real_estate_realtor_properties = get_theme_mod('real_estate_realtor_popular_properties_category'.$j);
            if($real_estate_realtor_properties){
              $page_query = new WP_Query(array( 'category_name' => esc_html( $real_estate_realtor_properties ,'real-estate-realtor'))); ?>
              <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <?php if(has_post_thumbnail()) {?>
                  <div class="box">
                    <div class="content-overlay"></div>
                    <?php the_post_thumbnail(); ?>
                    <div class="sale-box">
                      <?php if( get_post_meta($post->ID, 'real_estate_realtor_property_sale_rent', true) ) {?>
                        <h6><?php echo esc_html(get_post_meta($post->ID,'real_estate_realtor_property_sale_rent',true)); ?></h6>
                      <?php }?>
                    </div>
                    <div class="box-content fadeIn-bottom">
                      <?php if( get_post_meta($post->ID, 'real_estate_realtor_property_amount', true) ) {?>
                        <h3 class="pb-0"><?php echo esc_html(get_post_meta($post->ID,'real_estate_realtor_property_amount',true)); ?></h3>
                      <?php }?>
                      <h4 class="title pb-0"><a href="<?php the_permalink();?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                      <?php if( get_post_meta($post->ID, 'real_estate_realtor_property_bed', true) ) {?>
                        <span class="me-3"><?php esc_html_e('Beds:','real-estate-realtor'); ?> <?php echo esc_html(get_post_meta($post->ID,'real_estate_realtor_property_bed',true)); ?></span>
                      <?php }?>
                      <?php if( get_post_meta($post->ID, 'real_estate_realtor_property_baths', true) ) {?>
                        <span class="me-3"><?php esc_html_e('Baths:','real-estate-realtor'); ?> <?php echo esc_html(get_post_meta($post->ID,'real_estate_realtor_property_baths',true)); ?></span>
                      <?php }?>
                      <?php if( get_post_meta($post->ID, 'real_estate_realtor_property_sqft', true) ) {?>
                        <span><?php esc_html_e('Sqft:','real-estate-realtor'); ?> <?php echo esc_html(get_post_meta($post->ID,'real_estate_realtor_property_sqft',true)); ?></span>
                      <?php }?>
                    </div>
                  </div>
                <?php }?>
              <?php endwhile;
              wp_reset_postdata();
            } ?>
          </div>
        </div>
      <?php }?>
    </div>
  </section>
  
  <?php do_action( 'real_estate_realtor_below_popular_properties' ); ?>

  <div class="container front-page-content">
    <?php while ( have_posts() ) : the_post(); ?>
      <div class="new-text"><?php the_content(); ?></div>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>
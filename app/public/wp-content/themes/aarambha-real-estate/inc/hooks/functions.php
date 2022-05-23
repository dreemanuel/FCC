<?php
/**
 * Aarambha Real Estate functions to be hooked
 *
 * @package Aarambha_Real_Estate
 */


/* ------------------------------ HEADER ------------------------------ */

if ( ! function_exists( 'aarambha_real_estate_head_meta' ) ) :
    /**
     * Meta head
     */
    function aarambha_real_estate_head_meta() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php
    }
endif;

/* ------------------------------ BEFORE CONTENT ------------------------------ */
if ( ! function_exists( 'aarambha_real_estate_content_before_page_header' ) ) :
    /**
     * Featured page content page header
     */
    function aarambha_real_estate_content_before_page_header() {

        if ( is_front_page() && is_home() || Aarambha_Real_Estate_Helper::front_page_enable() ) {
            return;
        }

        // Blog
        $elements = get_theme_mod(
            'aarambha_real_estate_blog_page_header_elements',
            ['post-title','breadcrumb']
        );
        if ( is_single() ) {
        	if ( 'property' == get_post_type() ) {
        		$elements = get_theme_mod(
					'aarambha_real_estate_property_single_post_header_elements',
					['post-title','breadcrumb']
				);
        	}
        	elseif ( 'agent' == get_post_type() ) {
        		$elements = get_theme_mod(
					'aarambha_real_estate_agent_single_post_header_elements',
					['post-title','breadcrumb']
				);
        	}
        	else {
        		$elements = get_theme_mod(
					'aarambha_real_estate_single_post_header_elements',
					['post-title','breadcrumb']
				);
        	}
        }

        // Is Single Page
        elseif ( is_page() ) {
            $elements = get_theme_mod(
                'aarambha_real_estate_single_page_header_elements',
                ['post-title','breadcrumb']
            );
        }
        // Is 404 Page
        elseif ( is_404() ) {
            $elements = get_theme_mod(
                'aarambha_real_estate_404_page_header_elements',
                ['post-title','breadcrumb']
            );
        }
        // Is Custom Archive Property
        elseif ( is_post_type_archive( 'property' ) || taxonomy_exists( 'property-type' ) || taxonomy_exists( 'property-location' ) || taxonomy_exists( 'property-status' ) ) {
        	$elements = get_theme_mod(
				'aarambha_real_estate_property_archive_page_header_elements',
				['post-title','breadcrumb']
			);
		}

        // Container Class
        $container_class = ['container d-flex flex-column align-items-center text-center'];
        ?>
        <?php if ( ! empty( $elements ) ) : ?>

            <div class="page-title-wrap">
                <div class="<?php echo esc_attr( implode( ' ', $container_class ) ); ?>">
                    <?php
                    foreach ( $elements as $element ) :

                        switch ( $element ) :

                            case 'post-title' :
                                Aarambha_Real_Estate_Helper::page_header();
                                break;

                            case 'breadcrumb' :
                                Aarambha_Real_Estate_Breadcrumb::get_breadcrumb();
                                break;

                            case 'post-meta' :

                                echo '<div class="post-meta-wrapper header-post-meta">';
                                Aarambha_Real_Estate_Helper::post_meta( get_the_ID() );
                                echo '</div><!-- .header-post-meta -->';
                                break;

                            case 'post-desc' :
                                if ( ! is_404() ) {
                                    the_archive_description( '<div class="archive-description">', '</div>' );
                                }
                                break;

                        endswitch;

                    endforeach;
                    ?>
                </div>
            </div>

        <?php endif;
    }
endif;
if ( ! function_exists( 'aarambha_real_estate_content_before_wrapper_start' ) ) :
    /**
     * Add custom wrapper div before content start
     */
    function aarambha_real_estate_content_before_wrapper_start() {
        if ( is_404() || Aarambha_Real_Estate_Helper::front_page_enable() ) {
            return;
        }
        $section_class = is_single() && 'agent' != get_post_type() ? 'page-wrapper single-post-wrapper' : 'page-wrapper';
        ?>
        <section class="<?php echo esc_attr( $section_class ); ?>">
        <div class="container d-flex flex-wrap">
        <?php
    }
endif;

/* ------------------------------ AFTER CONTENT ------------------------------ */
if ( ! function_exists( 'aarambha_real_estate_content_after_wrapper_end' ) ) :
    /**
     * Close custom wrapper div after content
     */
    function aarambha_real_estate_content_after_wrapper_end() {
        if ( is_404() || Aarambha_Real_Estate_Helper::front_page_enable() ) {
            return;
        }
        get_sidebar();
        echo '</div><! -- .container -->';
        echo '</section><! -- .page-wrapper -->';
    }
endif;
/* ------------------------------ BLOG PAGE CONTENT ------------------------------ */

if ( ! function_exists( 'aarambha_real_estate_posts_navigation' ) ) :
    /**
     * Blog Posts navigation
     */
    function aarambha_real_estate_posts_navigation() {

        Aarambha_Real_Estate_Helper::post_pagination();
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_blog_post_content' ) ) :
    /**
     * Blog post content
     */
    function aarambha_real_estate_blog_post_content() {

        $posts_elements = get_theme_mod(
            'aarambha_real_estate_blog_posts_elements',
            ['post-meta','post-title','post-excerpt']
        );
        $meta_elements = get_theme_mod(
        	'aarambha_real_estate_blog_posts_meta_elements',
        	['categories','author']
        );

        if ( ! empty( $posts_elements ) ) :

            echo '<div class="post-detail-wrap d-flex flex-column text-left">';

            foreach ( $posts_elements as $post_element ) :

                switch ( $post_element ) :

                    case 'post-title' :
                        Aarambha_Real_Estate_Helper::post_title();
                        break;

                    case 'post-excerpt' :
                        Aarambha_Real_Estate_Helper::post_content();
                        break;

                    case 'read-more' :
                        Aarambha_Real_Estate_Helper::read_more();
                        break;

                    case 'post-meta' :
                        echo '<div class="entry-meta">';

                        if ( $meta_elements ) {
                        	foreach ( $meta_elements as $val ) {
                        		if( $val == 'author' ) {
                        			aarambha_real_estate_posted_by();
                        		}
                        		elseif( $val == 'categories' ) {
									aarambha_real_estate_posted_cats();
                        		}
                        		elseif( $val == 'tags' ) {
									aarambha_real_estate_posted_tags();
                        		}
                                elseif( $val == 'date' ) {
									aarambha_real_estate_posted_on();
                        		}
                        	}
                        }
                        echo '</div><!-- .entry-meta -->';
                        break;

                endswitch;
            endforeach;

            echo '</div><!-- .post-details-wrap -->';

        endif;
    }
endif;

/* ------------------------------ SEARCH PAGE CONTENT ------------------------------ */

if ( ! function_exists( 'aarambha_real_estate_search_posts_header' ) ) :
    /**
     * Posts Header
     */
    function aarambha_real_estate_search_posts_header() {
        ?>
        <header class="entry-header">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_search_posts_header_top action.
             */
            do_action( 'aarambha_real_estate_search_posts_header_top' );
            ?>

            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <?php
            if ( 'post' === get_post_type() ) :
                ?>
                <div class="entry-meta">
                    <?php
                    aarambha_real_estate_posted_on();
                    aarambha_real_estate_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>

            <?php aarambha_real_estate_post_thumbnail(); ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_search_posts_header_bottom action.
             */
            do_action( 'aarambha_real_estate_search_posts_header_bottom' );
            ?>

        </header><!-- .entry-header -->
        <?php
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_search_posts_content' ) ) :
    /**
     * Posts Content
     */
    function aarambha_real_estate_search_posts_content() {
        ?>
        <div class="entry-summary">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_search_posts_content_top action.
             *
             */
            do_action( 'aarambha_real_estate_search_posts_content_top' );
            ?>

            <?php the_excerpt(); ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_search_posts_content_bottom action.
             *
             */
            do_action( 'aarambha_real_estate_search_posts_content_bottom' );
            ?>
        </div><!-- .entry-summary -->

        <?php
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_search_posts_footer' ) ) :
    /**
     * Posts Footer
     */
    function aarambha_real_estate_search_posts_footer() {
        ?>
        <footer class="entry-footer">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_search_posts_footer_top action.
             *
             */
            do_action( 'aarambha_real_estate_search_posts_footer_top' );
            ?>

            <?php aarambha_real_estate_entry_footer(); ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_search_posts_footer_bottom action.
             *
             */
            do_action( 'aarambha_real_estate_search_posts_footer_bottom' );
            ?>

        </footer><!-- .entry-footer -->

        <?php
    }
endif;

/* ------------------------------ POST CONTENT ------------------------------ */

if ( ! function_exists( 'aarambha_real_estate_get_post_thumbnail' ) ) :
    /**
     * Post Thumbnail
     */
    function aarambha_real_estate_get_post_thumbnail() {

        // Is Singular
        if ( is_singular() ) {

            $img_ratio = is_single() ? get_theme_mod('aarambha_real_estate_single_post_featured_image_ratio',['desktop' => '16x9'] ) : get_theme_mod( 'aarambha_real_estate_single_page_featured_image_ratio', ['desktop' => '16x9'] );

            $img_size = is_single() ? get_theme_mod('aarambha_real_estate_single_post_featured_image_size',['desktop' => 'medium_large'] ) : get_theme_mod( 'aarambha_real_estate_single_page_featured_image_size', ['desktop' => 'medium_large'] );

            $ratio = in_array( 'auto', $img_ratio ) ? '16x9' : $img_ratio['desktop'];

            aarambha_real_estate_singular_post_thumbnail( $img_size['desktop'],$ratio );
        }
        else {
            $img_ratio = get_theme_mod( 'aarambha_real_estate_blog_post_featured_image_ratio', ['desktop' => '16x9'] );

            $img_size = get_theme_mod( 'aarambha_real_estate_blog_post_featured_image_size', ['desktop' => 'medium_large'] );

            $ratio = in_array( 'auto', $img_ratio ) ? '16x9' : $img_ratio['desktop'];

            aarambha_real_estate_post_thumbnail( $img_size['desktop'],$ratio );
        }
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_post_header' ) ) :
    /**
     * Post Header
     */
    function aarambha_real_estate_post_header() {
        ?>
        <header class="entry-header">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_post_header_top action.
             */
            do_action( 'aarambha_real_estate_post_header_top' );
            ?>

            <?php
            $elements = get_theme_mod(
                'aarambha_real_estate_single_post_content_entry_header_elements',
                ['post-cats','post-title']
            );
            if ( ! empty( $elements ) ) :

                foreach ( $elements as $element ) :

                    switch ( $element ) :

                        case 'post-title' :
                            $html_tag = get_theme_mod(
                                'aarambha_real_estate_single_post_title_tag',
                                ['desktop' => 'h1']
                            );
                            the_title( '<' . esc_attr( $html_tag['desktop'] ) . ' class="entry-title">', '</' . esc_attr( $html_tag['desktop'] ) . '>' );
                            break;

                        case 'post-cats' :

                            echo '<div class="entry-meta">';
                            aarambha_real_estate_posted_cats();
                            echo '</div><!-- .entry-meta -->';

                            break;

                    endswitch;

                endforeach;
            endif;

            if ( has_post_thumbnail() ) {
                aarambha_real_estate_posted_on();
            }
            ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_post_header_bottom action.
             */
            do_action( 'aarambha_real_estate_post_header_bottom' );
            ?>

        </header><!-- .entry-header -->

        <?php
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_post_content' ) ) :
    /**
     * Post Content
     */
    function aarambha_real_estate_post_content() {
        ?>
        <div class="entry-content">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_post_content_top action.
             *
             */
            do_action( 'aarambha_real_estate_post_content_top' );
            ?>

            <?php
            the_content(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aarambha-real-estate' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );
            ?>

            <?php

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aarambha-real-estate' ),
                    'after'  => '</div>',
                )
            );
            ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_post_content_bottom action.
             *
             */
            do_action( 'aarambha_real_estate_post_content_bottom' );
            ?>

        </div><!-- .entry-content -->

        <?php
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_post_footer' ) ) :
    /**
     * Post Footer for extra elements
     */
    function aarambha_real_estate_post_footer() {

        ?>
        <footer class="entry-footer">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_post_content_top action.
             *
             */
            do_action( 'aarambha_real_estate_post_footer_top' );
            ?>
            <?php
            $elements = get_theme_mod(
                'aarambha_real_estate_single_post_content_entry_footer_elements',
                ['tags','post-comments','post-navigation']
            );

            if ( ! empty( $elements ) ) :

                foreach ( $elements as $element ) :

                    switch ( $element ) :

                        case 'post-comments' :
                            Aarambha_Real_Estate_Helper::post_comment();
                            break;

                        case 'post-navigation' :
                            Aarambha_Real_Estate_Helper::post_navigation();
                            break;

                        case 'tags' :

                            echo '<div class="post-meta-wrapper content-post-tags">';
                            aarambha_real_estate_posted_tags();
                            echo '</div><!-- .content-post-tags -->';

                            break;

                        case 'author-box' :
                            Aarambha_Real_Estate_Helper::author_box();
                            break;

                        case 'related-posts' :
                            Aarambha_Real_Estate_Helper::related_posts();
                            break;

                    endswitch;

                endforeach;
            endif;


            ?>
            <?php aarambha_real_estate_entry_footer(); ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_post_content_bottom action.
             *
             */
            do_action( 'aarambha_real_estate_post_footer_bottom' );
            ?>

        </footer><!-- .entry-footer -->

        <?php
    }
endif;


/* ------------------------------ PAGE CONTENT ------------------------------ */

if ( ! function_exists( 'aarambha_real_estate_page_post_header' ) ) :
    /**
     * Post Header
     */
    function aarambha_real_estate_page_post_header() {
        ?>
        <header class="entry-header">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_page_header_top action.
             */
            do_action( 'aarambha_real_estate_page_header_top' );
            ?>

            <?php
            $elements = get_theme_mod(
                'aarambha_real_estate_single_page_content_entry_header_elements',
                ['post-title']
            );

            if ( ! empty( $elements ) ) :
				$html_tag = get_theme_mod(
					'aarambha_real_estate_single_page_title_tag',
					['desktop' => 'h1']
				);
				the_title( '<' . esc_attr( $html_tag['desktop'] ) . ' class="entry-title">', '</' . esc_attr( $html_tag['desktop'] ) . '>' );
            endif;

            ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_page_header_bottom action.
             */
            do_action( 'aarambha_real_estate_page_header_bottom' );
            ?>

        </header><!-- .entry-header -->

        <?php
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_page_content' ) ) :
    /**
     * Post Content
     */
    function aarambha_real_estate_page_content() {
        ?>
        <div class="entry-content">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_page_content_top action.
             *
             */
            do_action( 'aarambha_real_estate_page_content_top' );
            ?>

            <?php
            the_content(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aarambha-real-estate' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title() )
                )
            );
            ?>

            <?php

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aarambha-real-estate' ),
                    'after'  => '</div>',
                )
            );
            ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_page_content_bottom action.
             *
             */
            do_action( 'aarambha_real_estate_page_content_bottom' );
            ?>

        </div><!-- .entry-content -->

        <?php
    }
endif;

if ( ! function_exists( 'aarambha_real_estate_page_footer' ) ) :
    /**
     * Post Footer for extra elements
     */
    function aarambha_real_estate_page_footer() {

        ?>
        <footer class="entry-footer">

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_page_footer_top action.
             *
             */
            do_action( 'aarambha_real_estate_page_footer_top' );
            ?>
            <?php
            $elements = get_theme_mod(
                'aarambha_real_estate_single_page_content_entry_footer_elements',
                ['post-comments']
            );

            if ( ! empty( $elements ) ) :
				Aarambha_Real_Estate_Helper::post_comment();
            endif;
            ?>
            <?php aarambha_real_estate_entry_footer(); ?>

            <?php
            /**
             * Functions hooked in to aarambha_real_estate_page_footer_bottom action.
             *
             */
            do_action( 'aarambha_real_estate_page_footer_bottom' );
            ?>

        </footer><!-- .entry-footer -->

        <?php
    }
endif;

/* ------------------------------ 404 PAGE ------------------------------ */

/* ------------------------------ FOOTER ------------------------------ */

if ( ! function_exists( 'aarambha_real_estate_footer_back_to_top' ) ) :
    /**
     * Footer Back to Top
     */
    function aarambha_real_estate_footer_back_to_top() {
        $back_to_top = get_theme_mod(
                'aarambha_real_estate_footer_back_to_top_enable',
                ['desktop'=>'true']
        );
        if ( $back_to_top && array_key_exists( 'desktop', $back_to_top ) ) :
        ?>
        <div class="back-to-top">
            <button href="#masthead" title="<?php esc_attr_e('Go to Top','aarambha-real-estate'); ?>"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
        </div><!-- .back-to-top -->
        <?php
        endif;
    }
endif;

/* ------------------------------ CONTENT ------------------------------ */
if ( ! function_exists( 'aarambha_real_estate_menu_fallback' ) ) :

	/**
	 * Menu fallback for primary menu.
	 *
	 * Contains wp_list_pages to display pages created,
	 */
	function aarambha_real_estate_menu_fallback() {
		$output  = '';
		$output .= '<div class="menu-top-menu-container">';
		$output .= '<ul id="primary-menu-list" class="menu-wrapper">';

		$output .= wp_list_pages(
			array(
				'echo'     => false,
				'title_li' => false,
			)
		);

		$output .= '</ul>';
		$output .= '</div>';

		// @codingStandardsIgnoreStart
		echo $output;
		// @codingStandardsIgnoreEnd
	}

endif;

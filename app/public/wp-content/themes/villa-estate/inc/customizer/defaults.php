<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage  Villa Estate
 * @since  Villa Estate 1.0.0
 * @return array An array of default values
 */

function villa_estate_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$villa_estate_default_options = array(
		// Color Options
		'header_title_color'			    => '#000',
		'header_tagline_color'			    => '#000',
		'header_txt_logo_extra'			    => 'show-all',
		'home_layout'						=> 'default-design',

		// typography Options
		'theme_typography' 				    => 'default',
		'body_theme_typography' 		    => 'default',

		// breadcrumb
		'breadcrumb_enable'				    => (bool) true,
		'breadcrumb_separator'			    => '/',
				
		// homepage options
		'enable_frontpage_content' 			=> false,

		// layout 
		'site_layout'         			    => 'wide',
		'sidebar_position'         		    => 'right-sidebar',
		'post_sidebar_position' 		    => 'right-sidebar',
		'page_sidebar_position' 		    => 'right-sidebar',

		//menu
		'menu_sticky'					    => (bool) false,
		'nav_btn'							=> true,
		'nav_btn_txt' 						=> esc_html__( 'Apply Loan', 'villa-estate' ),
		'nav_btn_url' 						=> '#',

		// excerpt options
		'long_excerpt_length'               => 25,

		// pagination options
		'pagination_enable'         	    => (bool) true,
		'pagination_type'         		    => 'default',

		// footer options
		'copyright_text'           		    => sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'villa-estate' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'villa-estate' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'villa-estate' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>',
		'scroll_top_visible'        	    => (bool) true,

		// reset options
		'reset_options'      			    => (bool) false,
		
		// homepage sections sortable
		
		'default_sortable'  => 'search_property,service,property_villa,promotion,team,counter,latest_posts',
		
		// blog/archive options
		'your_latest_posts_title' 		    => esc_html__( 'Blogs', 'villa-estate' ),
		'blog_column'						=> 'col-2',
		'hide_date' 		    			=> (bool) false,


		// single post theme options
		'single_post_hide_date' 		    => (bool) false,
		'single_post_hide_author'		    => (bool) false,

		/* Front Page */

		//topbar
		'top_bar_section_enable'	=> (bool) false,
		'social_menu_enable'		=> (bool) true,
		'topbar_text' 		    	=> esc_html__( 'Any Questions? Call Us: 1-223-355-2214', 'villa-estate' ),
		'topbar_icon' 		    	=> 'fa-phone',

		//search-property
		'search_property_section_enable'	=> (bool) false,
		'search_property_title' 		    => esc_html__( 'Find Your Perfect Home', 'villa-estate' ),
		'search_property_description' 		=> esc_html__( 'Search your dream home on largest property marketplace', 'villa-estate' ),

		//service
		'service_section_enable'		=> (bool) false,
		'service_section_sub_title'		=> esc_html__( 'Our Services', 'villa-estate' ),
		'service_section_title'			=> esc_html__( 'Best Properties For Sale', 'villa-estate' ),

		// property_villa
		'property_villa_section_enable'			=> (bool) false,
		'property_villa_title'					=> esc_html__( 'Villa For Rent & Sale', 'villa-estate' ),
		'property_villa_sub_title'          	=> esc_html__('Browse Properties','villa-estate'),
		'property_villa_content_type'			=> 'post',
		'property_villa_read_more_btn_label'    => esc_html__( 'View All', 'villa-estate' ),

		//promotion
		'promotion_section_enable'			=> (bool) false,
		'promotion_button'					=> esc_html('Let Us Know', 'villa-estate'),

		// team
		'team_section_enable'			=> (bool) false,
		'team_title'					=> esc_html__( 'Our Agents', 'villa-estate' ),
		'team_sub_title'				=> esc_html__( 'See our great agents', 'villa-estate' ),

		// counter
		'counter_section_enable'		=> (bool) false,

		//latest_posts
        'latest_posts_section_enable'        => (bool) false,
		'latest_posts_section_sub_title'     => esc_html__('Browse Articles','villa-estate'),
		'latest_posts_section_title'	     => esc_html__('Latest News','villa-estate'),
		'latest_posts_content_type'          => 'post',

	
	);

	$output = apply_filters( 'villa_estate_default_theme_options', $villa_estate_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}
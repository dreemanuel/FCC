<?php
/**
 * Aarambha Real Estate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Aarambha Real Estate only works in WordPress 5.6 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '5.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Define Constants
 */
if ( ! defined( 'AARAMBHA_REAL_ESTATE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'AARAMBHA_REAL_ESTATE_VERSION', '1.0.0' );
}
if ( ! defined( 'AARAMBHA_REAL_ESTATE_DIV' ) ) {
	define( 'AARAMBHA_REAL_ESTATE_DIV', trailingslashit( get_template_directory() ) );
}
if ( ! defined( 'AARAMBHA_REAL_ESTATE_URI' ) ) {
	define( 'AARAMBHA_REAL_ESTATE_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
}

if ( ! function_exists( 'aarambha_real_estate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aarambha_real_estate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Aarambha Real Estate, use a find and replace
		 * to change 'aarambha-real-estate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'aarambha-real-estate', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu'  => esc_html__( 'Primary Menu', 'aarambha-real-estate' ),
				'mobile-menu'   => esc_html__( 'Mobile Menu', 'aarambha-real-estate' ),
				'footer-menu'   => esc_html__( 'Footer Menu', 'aarambha-real-estate' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

        // Adding excerpt for page
        add_post_type_support('page', 'excerpt');
	}
endif;
add_action( 'after_setup_theme', 'aarambha_real_estate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aarambha_real_estate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'aarambha_real_estate_content_width', 640 );
}
add_action( 'after_setup_theme', 'aarambha_real_estate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aarambha_real_estate_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aarambha-real-estate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Subscribe Form
	register_sidebar(
		array(
			'name'          => esc_html__( 'Front Page: Subscribe Form', 'aarambha-real-estate' ),
			'id'            => 'subscribe-form',
			'description'   => esc_html__( 'Add widgets here.', 'aarambha-real-estate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for ( $sidebar = 1; $sidebar <= 6; $sidebar++ ) {
		register_sidebar(
			array(
				'name'          => sprintf( esc_html__( 'Footer Sidebar %d ', 'aarambha-real-estate' ), absint($sidebar) ),
				'id'            => 'footer-sidebar-' . absint($sidebar),
				'description'   => esc_html__( 'Display widgets footer section of the site.', 'aarambha-real-estate' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'aarambha_real_estate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aarambha_real_estate_scripts() {

	// Font Awesome Style
	wp_enqueue_style( 'font-awesome', AARAMBHA_REAL_ESTATE_URI .'assets/css/font-awesome.css', array(), '4.7.0' );

	// MeanMenu Style
	wp_enqueue_style( 'meanmenu', AARAMBHA_REAL_ESTATE_URI .'assets/css/meanmenu.css', array(), '2.0.7' );

	// Slick Style
	wp_enqueue_style( 'slick-theme', AARAMBHA_REAL_ESTATE_URI .'assets/css/slick-theme.css', null, '1.8.0' );
	wp_enqueue_style( 'slick', AARAMBHA_REAL_ESTATE_URI .'assets/css/slick.css', null, '1.8.0' );

	// Theme Style
	wp_enqueue_style( 'aarambha-real-estate-style', get_stylesheet_uri(), array(), AARAMBHA_REAL_ESTATE_VERSION );

	// Main Style
	wp_enqueue_style( 'aarambha-real-estate-main-style', AARAMBHA_REAL_ESTATE_URI . 'assets/css/main.css', null, AARAMBHA_REAL_ESTATE_VERSION, 'all' );

	// Responsive Style
	wp_enqueue_style( 'aarambha-real-estate-responsive', AARAMBHA_REAL_ESTATE_URI . 'assets/css/responsive.css', null, AARAMBHA_REAL_ESTATE_VERSION, 'all' );

	// Add output of Customizer settings as inline style.
	wp_add_inline_style( 'aarambha-real-estate-main-style', Aarambha_Real_Estate_Customizer_Inline_Style::css_output( 'front-end' ) );

	// Enqueue Slick Js
	wp_enqueue_script( 'slick', AARAMBHA_REAL_ESTATE_URI . 'assets/js/slick.js', [ 'jquery' ], '1.8.0', true );

	// Enqueue MeanMenu Js
	wp_enqueue_script( 'meanmenu', AARAMBHA_REAL_ESTATE_URI . 'assets/js/jquery.meanmenu.js', [ 'jquery' ], '2.0.7', true );

	// Enqueue Isotope Js
	wp_enqueue_script( 'isotope', AARAMBHA_REAL_ESTATE_URI . 'assets/js/isotope.pkgd.js', [ 'jquery' ], '3.0.6', true );

	// Enqueue Images Loaded Js
	wp_enqueue_script( 'imagesloaded', AARAMBHA_REAL_ESTATE_URI . 'assets/js/imagesloaded.pkgd.js', [ 'jquery' ], '3.2.0', true );

	// Enqueue theia-sticky-sidebar Js
	$sticky_sidebar = get_theme_mod( 'aarambha_real_estate_sidebar_sticky', '' );
	if ( $sticky_sidebar ) {
		wp_enqueue_script( 'theia-sticky-sidebar', AARAMBHA_REAL_ESTATE_URI . 'assets/js/theia-sticky-sidebar.js', [ 'jquery' ], '1.7.0', true );
	}

	// Main scripts.
	wp_enqueue_script( 'aarambha-real-estate', AARAMBHA_REAL_ESTATE_URI . 'assets/js/main.js', array( 'jquery' ), AARAMBHA_REAL_ESTATE_VERSION, true );

	// Localized Scripts for the load more posts.
	$locale = [
		'sticky_sidebar' => $sticky_sidebar ? true : false,
	];
	$locale = apply_filters( 'aarambha_real_estate_localize_var', $locale );
	wp_localize_script( 'aarambha-real-estate','AARAMBHA_REAL_ESTATE', $locale );

	// Comment Reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'aarambha_real_estate_scripts' );

/**
 * Custom template tags for this theme.
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/template-functions.php';

/**
 * Google fonts utilities
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/classes/Aarambha_Real_Estate_Google_Fonts.php';

/**
 * Font Awesome Icon
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/classes/Aarambha_Real_Estate_Font_Awesome_Icons.php';

/**
 * Breadcrumb
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/classes/Aarambha_Real_Estate_Breadcrumb.php';

/**
 * Helper Functions
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/classes/Aarambha_Real_Estate_Helper.php';

/**
 * Customizer additions.
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/Aarambha_Real_Estate_Customizer.php';

// Builder
require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/builder/Aarambha_Real_Estate_Customizer_Builder.php';
require AARAMBHA_REAL_ESTATE_DIV. 'inc/customizer/builder/header/Aarambha_Real_Estate_Customizer_Header_Builder.php';
require AARAMBHA_REAL_ESTATE_DIV. 'inc/customizer/builder/footer/Aarambha_Real_Estate_Customizer_Footer_Builder.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require AARAMBHA_REAL_ESTATE_DIV . 'inc/compatibility/jetpack/jetpack.php';
}

/**
 * Load hooks file.
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/hooks/hooks.php';
require AARAMBHA_REAL_ESTATE_DIV . 'inc/hooks/functions.php';

/**
 * Load plugin recommendations.
 */
require AARAMBHA_REAL_ESTATE_DIV . 'inc/tgm/tgm.php';

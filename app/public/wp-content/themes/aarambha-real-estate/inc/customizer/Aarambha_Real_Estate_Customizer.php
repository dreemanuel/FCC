<?php
/**
 * Aarambha Real Estate Theme Customizer
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Aarambha_Real_Estate_Customizer class
 */
class Aarambha_Real_Estate_Customizer {

    /**
     * Setup class.
     *
     */
    public function __construct() {

        add_action( 'customize_register', [ $this, 'aarambha_real_estate_customize_register' ], 10, 1 );

        add_action( 'customize_preview_init', [ $this, 'aarambha_real_estate_customize_preview_js' ], 10 );

        add_action( 'customize_controls_enqueue_scripts', [ $this, 'aarambha_real_estate_customize_js' ] );

        add_action( 'after_setup_theme', [ $this, 'aarambha_real_estate_customize_option_fields' ] );
    }

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function aarambha_real_estate_customize_register( $wp_customize ) {

        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

        $wp_customize->remove_control('header_textcolor');
        $wp_customize->remove_control('header_image');

        /** Move default sections to global panel */

        $wp_customize->get_section( 'colors' )->panel           = 'aarambha_real_estate_global_panel';
        $wp_customize->get_section( 'colors' )->priority        = 5;

        $wp_customize->get_section( 'title_tagline' )->panel    = 'aarambha_real_estate_header';
        $wp_customize->get_section( 'title_tagline' )->priority = 35;

        $wp_customize->get_control( 'custom_logo' )->priority   = 15;
        $wp_customize->get_control( 'blogname' )->priority      = 35;
        $wp_customize->get_control( 'blogname' )->label         = '';
        $wp_customize->get_control( 'blogdescription' )->priority = 45;
        $wp_customize->get_control( 'blogdescription' )->label    = '';

        // customizer dir path.
        $customizer_dir = AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer';

        // Selective refresh
        require $customizer_dir . '/selective-refresh.php';

        // Customizer sanitize callback functions
        require_once $customizer_dir . '/Aarambha_Real_Estate_Customizer_Sanitize_Callback.php';

        // Custom Section
        require_once $customizer_dir . '/sections/Aarambha_Real_Estate_Customize_Custom_Section.php';

        // Load base class for controls.
        require_once $customizer_dir . '/controls/base/Aarambha_Real_Estate_Customize_Base_Control.php';
        // Load custom control classes.
        require_once $customizer_dir . '/controls/background/Aarambha_Real_Estate_Customize_Background_Control.php';
        require_once $customizer_dir . '/controls/border/Aarambha_Real_Estate_Customize_Border_Control.php';
        require_once $customizer_dir . '/controls/box-shadow/Aarambha_Real_Estate_Customize_Box_Shadow_Control.php';
        require_once $customizer_dir . '/controls/typography/Aarambha_Real_Estate_Customize_Typography_Control.php';
        require_once $customizer_dir . '/controls/sortable/Aarambha_Real_Estate_Customize_Sortable_Control.php';
        require_once $customizer_dir . '/controls/group/Aarambha_Real_Estate_Customize_Group_Control.php';
        require_once $customizer_dir . '/controls/toggle/Aarambha_Real_Estate_Customize_Toggle_Control.php';
        require_once $customizer_dir . '/controls/color/Aarambha_Real_Estate_Customize_Color_Control.php';
        require_once $customizer_dir . '/controls/buttonset/Aarambha_Real_Estate_Customize_Buttonset_Control.php';
        require_once $customizer_dir . '/controls/range/Aarambha_Real_Estate_Customize_Range_Control.php';
        require_once $customizer_dir . '/controls/dimensions/Aarambha_Real_Estate_Customize_Dimensions_Control.php';
        require_once $customizer_dir . '/controls/radio-image/Aarambha_Real_Estate_Customize_Radio_Image_Control.php';
        require_once $customizer_dir . '/controls/heading/Aarambha_Real_Estate_Customize_Heading_Control.php';
        require_once $customizer_dir . '/controls/select/Aarambha_Real_Estate_Customize_Select_Control.php';
        require_once $customizer_dir . '/controls/select/Aarambha_Real_Estate_Customize_Multi_Select_Control.php';
        require_once $customizer_dir . '/controls/select/Aarambha_Real_Estate_Customize_Icon_Select_Control.php';
        require_once $customizer_dir . '/controls/repeater/Aarambha_Real_Estate_Customize_Repeater_Control.php';
        require_once $customizer_dir . '/controls/repeater/Aarambha_Real_Estate_Customize_Repeater_Setting.php';



        /**
         * Add Panels
         */
        self::aarambha_real_estate_add_panels( $wp_customize );

        /**
         * Add Sections
         */
        self::aarambha_real_estate_add_sections( $wp_customize );

        /**
         * Add Repeater Fields
         */
        self::aarambha_real_estate_add_repeater_fields( $wp_customize );
    }

    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    public function aarambha_real_estate_customize_preview_js() {

        wp_enqueue_script( 'aarambha-real-estate-customizer-preview', AARAMBHA_REAL_ESTATE_URI . 'assets/js/customizer-preview.js', array( 'customize-preview' ), AARAMBHA_REAL_ESTATE_VERSION, true );
    }

    /**
     * heme Customizer JS
     */
    public function aarambha_real_estate_customize_js() {

        // Enqueue the style.
        wp_enqueue_style( 'aarambha-real-estate-customize-controls', AARAMBHA_REAL_ESTATE_URI . 'assets/css/customize-controls.css', null, AARAMBHA_REAL_ESTATE_VERSION, 'all' );

        // Add output of Customizer settings as inline style.
        wp_add_inline_style( 'aarambha-real-estate-customize-controls', Aarambha_Real_Estate_Customizer_Inline_Style::css_output( 'customizer' ) );

        // Enqueue alpha color picker script
        wp_enqueue_script( 'wp-color-picker-alpha', AARAMBHA_REAL_ESTATE_URI . 'assets/js/wp-color-picker-alpha.js', [ 'jquery', 'wp-color-picker' ], '2.1.4', true );

        // Enqueue the font awesome style.
        wp_enqueue_style( 'font-awesome', AARAMBHA_REAL_ESTATE_URI .'assets/css/font-awesome.css', array(), '4.7.0' );

        // Enqueue the scripts.
        wp_enqueue_script( 'aarambha-real-estate-customize-controls', AARAMBHA_REAL_ESTATE_URI . 'assets/js/customize-controls.js', [ 'customize-base', 'wp-color-picker-alpha', 'jquery-ui-sortable' ], AARAMBHA_REAL_ESTATE_VERSION, true );

        wp_enqueue_script( 'aarambha-real-estate-customizer', AARAMBHA_REAL_ESTATE_URI . 'assets/js/customizer.js', array( 'jquery', 'customize-controls' ), AARAMBHA_REAL_ESTATE_VERSION, false );
    }

    /**
     * Render the site title for the selective refresh partial.
     *
     * @return void
     */
    public function aarambha_real_estate_customize_partial_blogname() {
        bloginfo( 'name' );
    }

    /**
     * Render the site tagline for the selective refresh partial.
     *
     * @return void
     */
    public function aarambha_real_estate_customize_partial_blogdescription() {
        bloginfo( 'description' );
    }

    /**
     * Include customizer options.
     */
    public function aarambha_real_estate_customize_option_fields() {

        /**
         * Customizer outputs
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/Aarambha_Real_Estate_Customizer_Inline_Style.php';

        /**
         * Base field class.
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/Aarambha_Real_Estate_Customize_Base_Field.php';

        /**
         * Global Fields
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Social_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Placeholder_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Body_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Container_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Page_Header_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Sidebar_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Typography_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/global/Aarambha_Real_Estate_Customize_Global_Color_Fields.php';

        /**
         * Front Page Fields
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_General_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Services_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_News_Blog_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Clients_Logo_Fields.php';

        /**
         * Blog Posts Fields
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Page_Header_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Posts_Layout_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Post_Featured_Image_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Post_Title_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Post_Read_More_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Pagination_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/blog-posts/Aarambha_Real_Estate_Customize_Blog_Sidebar_Fields.php';

        /**
         * Single Posts Fields
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-post/Aarambha_Real_Estate_Customize_Single_Post_Content_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-post/Aarambha_Real_Estate_Customize_Single_Post_Header_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-post/Aarambha_Real_Estate_Customize_Single_Post_Featured_Image_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-post/Aarambha_Real_Estate_Customize_Single_Post_Title_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-post/Aarambha_Real_Estate_Customize_Single_Post_Sidebar_Fields.php';

        /**
         * Single Page Fields
         */
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-page/Aarambha_Real_Estate_Customize_Single_Page_Content_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-page/Aarambha_Real_Estate_Customize_Single_Page_Header_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-page/Aarambha_Real_Estate_Customize_Single_Page_Featured_Image_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-page/Aarambha_Real_Estate_Customize_Single_Page_Title_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/single-page/Aarambha_Real_Estate_Customize_Single_Page_Sidebar_Fields.php';
        /**
         * 404 Page Fields
         */
		require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/404-page/Aarambha_Real_Estate_Customize_404_Page_Header_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/404-page/Aarambha_Real_Estate_Customize_404_Page_Content_Fields.php';

        /**
         * Property Posts Fields
         */
        if ( Aarambha_Real_Estate_Helper::crucial_real_state_plugin() ) {

            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/custom-posts/Aarambha_Real_Estate_Customize_Custom_Archive_Property_Fields.php';

            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/custom-post/Aarambha_Real_Estate_Customize_Property_Post_Fields.php';
            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/custom-post/Aarambha_Real_Estate_Customize_Agent_Post_Fields.php';

            // front page related field
            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Banner_Slider_Fields.php';
            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Property_Search_Fields.php';
            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Property_Type_Fields.php';
            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Property_Features_Fields.php';
            require AARAMBHA_REAL_ESTATE_DIV . 'inc/customizer/options/front-page/Aarambha_Real_Estate_Customize_Front_Page_Property_Locations_Fields.php';

        }
    }

    /**
     * Add customizer panels
     *
     * @access public
     * @param object $wp_customize the object.
     * @return void
     */
    public static function aarambha_real_estate_add_panels( $wp_customize ) {

        $panels = [
            'global'        => [
                'title'         => esc_html__( 'Global', 'aarambha-real-estate' ),
                'priority'      => 10,
            ],
            'blog_posts'        => [
                'title'         => esc_html__( 'Archive Posts', 'aarambha-real-estate' ),
                'priority'      => 30,
            ],
            'single_post'       => [
                'title'         => esc_html__( 'Single Post', 'aarambha-real-estate' ),
                'priority'      => 35,
            ],

			'property_archive_posts'    => [
				'title'         => esc_html__( 'Property Archive Posts', 'aarambha-real-estate' ),
				'priority'      => 40,
			],
			'property_single_post'    => [
				'title'         => esc_html__( 'Property Single Post', 'aarambha-real-estate' ),
				'priority'      => 40,
			],
			'agent_archive_posts'    => [
				'title'         => esc_html__( 'Agent Archive Posts', 'aarambha-real-estate' ),
				'priority'      => 40,
			],
			'agent_single_post'    => [
				'title'         => esc_html__( 'Agent Single Post', 'aarambha-real-estate' ),
				'priority'      => 40,
			],
			'agency_single_post'    => [
				'title'         => esc_html__( 'Agency Single Post', 'aarambha-real-estate' ),
				'priority'      => 40,
			],

            'front_page'        => [
                'title'         => esc_html__( 'Front Page', 'aarambha-real-estate' ),
                'priority'      => 50,
            ],
            'single_page'        => [
                'title'         => esc_html__( 'Single Page', 'aarambha-real-estate' ),
                'priority'      => 55,
            ],
            'about_page'        => [
                'title'         => esc_html__( 'About Page', 'aarambha-real-estate' ),
                'priority'      => 60,
            ],
			'404_page'        => [
				'title'         => esc_html__( '404 Page', 'aarambha-real-estate' ),
				'priority'      => 60,
			],
        ];

        foreach ( $panels as $panel_id => $panel_args ) {
            $wp_customize->add_panel( 'aarambha_real_estate_' . str_replace( '-', '_', $panel_id ) . '_panel', $panel_args );
        }
    }

    /**
     * Add customizer sections
     *
     * @access public
     * @param object $wp_customize the object.
     * @return void
     */
    public static function aarambha_real_estate_add_sections( $wp_customize ) {

        $sections = [];

        /*--------------------------------------------------------------
        # Global Sections
        --------------------------------------------------------------*/
        // Typography
        $sections['typography']   = [
            'title'                 => esc_html__( 'Typography', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 10
        ];
        // Body
        $sections['body']   = [
            'title'                 => esc_html__( 'Body', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 10
        ];
        // Container
        $sections['container']   = [
            'title'                 => esc_html__( 'Container', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 15
        ];
        // Page Header
        $sections['page_header']   = [
            'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 30
        ];
		// Post Meta
		$sections['post_meta']   = [
			'title'                 => esc_html__( 'Post Meta', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_global_panel',
			'priority'              => 35
		];
        // Sidebar
        $sections['sidebar']   = [
            'title'                 => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 40
        ];
        // Social
        $sections['social']   = [
            'title'                 => esc_html__( 'Social', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 45
        ];

        // Placeholder
        $sections['placeholder']   = [
            'title'                 => esc_html__( 'Placeholder Image', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_global_panel',
            'priority'              => 50
        ];
        /*--------------------------------------------------------------
        # Header Sections
        --------------------------------------------------------------*/
        // Header General
        $sections['header_general']   = [
            'title'                 => esc_html__( 'Header General', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_header_panel',
            'priority'              => 10
        ];

        /*--------------------------------------------------------------
        # Front Page Sections
        --------------------------------------------------------------*/
        // General Settings
        $sections['front_page_general']   = [
            'title'                 => esc_html__( 'General', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 10
        ];

        // Banner
        $sections['front_page_banner']   = [
            'title'                 => esc_html__( 'Property Slider', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 15
        ];
        // Search Properties
        $sections['front_page_search']   = [
            'title'                 => esc_html__( 'Property Search', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 20
        ];
        // Property Featured
        $sections['front_page_property_features']   = [
            'title'                 => esc_html__( 'Property Featured', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 25
        ];
        // Property Types
        $sections['front_page_property_type']   = [
            'title'                 => esc_html__( 'Property Types', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 25
        ];
        // Property Location
        $sections['front_page_property_locations']   = [
            'title'                 => esc_html__( 'Property Locations', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 26
        ];
        // Our Agents
        $sections['front_page_agents']   = [
            'title'                 => esc_html__( 'Property Agents', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 27
        ];
        // Services
        $sections['front_page_services']   = [
            'title'                 => esc_html__( 'Why Us?', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 35
        ];

        // Testimonial
        $sections['front_page_testimonials']   = [
            'title'                 => esc_html__( 'Testimonials', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 45
        ];

        // Latest Blogs
        $sections['front_page_news_blog']   = [
            'title'                 => esc_html__( 'News & Blog', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 60
        ];
        // Clients Logo
        $sections['front_page_clients']   = [
            'title'                 => esc_html__( 'Clients Logo', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 65
        ];
        // Subscribe Form
        $sections['front_page_subscribe']   = [
            'title'                 => esc_html__( 'Subscribe Form', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_front_page_panel',
            'priority'              => 70
        ];

        /*--------------------------------------------------------------
        # About Page Sections
        --------------------------------------------------------------*/
        // Sortable Elements
        $sections['about_page_elements']   = [
            'title'                 => esc_html__( 'Sortable Elements', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_about_page_panel',
            'priority'              => 10
        ];

        // Mission Section
        $sections['about_page_mission']   = [
            'title'                 => esc_html__( 'Our Mission', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_about_page_panel',
            'priority'              => 15
        ];
        // Process Section
        $sections['about_page_process']   = [
            'title'                 => esc_html__( 'Work Process', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_about_page_panel',
            'priority'              => 20
        ];
        // Why Us Section
        $sections['about_page_services']   = [
            'title'                 => esc_html__( 'Why Us?', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_about_page_panel',
            'priority'              => 20
        ];
        // Agent Section
        $sections['about_page_agents']   = [
            'title'                 => esc_html__( 'Property Agents', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_about_page_panel',
            'priority'              => 20
        ];

        /*--------------------------------------------------------------
        # Blog Posts Sections
        --------------------------------------------------------------*/
        // Page Header
        $sections['blog_page_header']   = [
            'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 10
        ];
        // Posts layout
        $sections['blog_posts_layout']   = [
            'title'                 => esc_html__( 'Post Content', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 15
        ];
        // Featured Image
        $sections['blog_post_featured_image']   = [
            'title'                 => esc_html__( 'Featured Image', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 20
        ];
        // Post title
        $sections['blog_post_title']   = [
            'title'                 => esc_html__( 'Post Title', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 25
        ];
        // Read More
        $sections['blog_post_read_more']   = [
            'title'                 => esc_html__( 'Read More', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 40
        ];
        // Pagination
        $sections['blog_pagination']   = [
            'title'                 => esc_html__( 'Pagination', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 45
        ];
        // Sidebar
        $sections['blog_sidebar']   = [
            'title'                 => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_blog_posts_panel',
            'priority'              => 50
        ];

        /*--------------------------------------------------------------
        # Single Post Sections
        --------------------------------------------------------------*/
        // Post Header
        $sections['single_post_header']   = [
            'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_post_panel',
            'priority'              => 10
        ];
        // Post Content
        $sections['single_post_content']   = [
            'title'                 => esc_html__( 'Post Content', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_post_panel',
            'priority'              => 10
        ];

        // Post Title
        $sections['single_post_title']   = [
            'title'                 => esc_html__( 'Post Title', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_post_panel',
            'priority'              => 20
        ];
        // Featured Image
        $sections['single_post_featured_image']   = [
            'title'                 => esc_html__( 'Featured Image', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_post_panel',
            'priority'              => 25
        ];
        // Sidebar
        $sections['single_post_sidebar']   = [
            'title'                 => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_post_panel',
            'priority'              => 45
        ];

		/*--------------------------------------------------------------
		# Property Archive Posts Sections
		--------------------------------------------------------------*/
		// Page Header
		$sections['property_archive_page_header']   = [
			'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_property_archive_posts_panel',
			'priority'              => 10
		];
		// Page Content
		$sections['property_archive_post_content']   = [
			'title'                 => esc_html__( 'Post Content', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_property_archive_posts_panel',
			'priority'              => 15
		];
		// Property Listing
		$sections['property_archive_post_listing']   = [
			'title'                 => esc_html__( 'Property Listing', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_property_archive_posts_panel',
			'priority'              => 20
		];

		/*--------------------------------------------------------------
		# Property Archive Single Post Sections
		--------------------------------------------------------------*/
		// Page Header
		$sections['property_single_post_header']   = [
			'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_property_single_post_panel',
			'priority'              => 10
		];
		// Post Content
		$sections['property_single_post_content']   = [
			'title'                 => esc_html__( 'Post Content', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_property_single_post_panel',
			'priority'              => 15
		];
		// Related Posts
		$sections['property_single_related_posts']   = [
			'title'                 => esc_html__( 'Related Properties', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_property_single_post_panel',
			'priority'              => 30
		];
		/*--------------------------------------------------------------
		# Agent Archive Single Post Sections
		--------------------------------------------------------------*/
		// Page Header
		$sections['agent_single_post_header']   = [
			'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_agent_single_post_panel',
			'priority'              => 10
		];
		// Post Content
		$sections['agent_single_post_content']   = [
			'title'                 => esc_html__( 'Post Content', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_agent_single_post_panel',
			'priority'              => 15
		];
		// Related Properties
		$sections['agent_single_related_posts']   = [
			'title'                 => esc_html__( 'Related Properties', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_agent_single_post_panel',
			'priority'              => 20
		];
        /*--------------------------------------------------------------
        # Custom Post Sections
        --------------------------------------------------------------*/
        // Property
        $sections['property_post']   = [
            'title'                 => esc_html__( 'Property', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_custom_post_panel',
            'priority'              => 35
        ];
        // Agency
        $sections['agency_post']   = [
            'title'                 => esc_html__( 'Agency', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_custom_post_panel',
            'priority'              => 39
        ];
        // Agent
        $sections['agent_post']   = [
            'title'                 => esc_html__( 'Agent', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_custom_post_panel',
            'priority'              => 40
        ];
        // Sidebar
        $sections['custom_post_sidebar']   = [
            'title'                 => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_custom_post_panel',
            'priority'              => 45
        ];

        /*--------------------------------------------------------------
        # Single Page Sections
        --------------------------------------------------------------*/
        // Page Header
        $sections['single_page_header']   = [
            'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_page_panel',
            'priority'              => 10
        ];

        // Page Content
        $sections['single_page_content']   = [
            'title'                 => esc_html__( 'Page Content', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_page_panel',
            'priority'              => 15
        ];

        // Page Title
        $sections['single_page_title']   = [
            'title'                 => esc_html__( 'Page Title', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_page_panel',
            'priority'              => 20
        ];
        // Featured Image
        $sections['single_page_featured_image']   = [
            'title'                 => esc_html__( 'Featured Image', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_page_panel',
            'priority'              => 25
        ];
        // Sidebar
        $sections['single_page_sidebar']   = [
            'title'                 => esc_html__( 'Sidebar', 'aarambha-real-estate' ),
            'panel'                 => 'aarambha_real_estate_single_page_panel',
            'priority'              => 30
        ];

        /*--------------------------------------------------------------
        # Error Page Sections
        --------------------------------------------------------------*/
        // 404 Page Header
        $sections['404_page_header']   = [
            'title'                 => esc_html__( 'Page Header', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_404_page_panel',
            'priority'              => 10
        ];
		// 404 Page Header
		$sections['404_page_content']   = [
			'title'                 => esc_html__( 'Page Content', 'aarambha-real-estate' ),
			'panel'                 => 'aarambha_real_estate_404_page_panel',
			'priority'              => 15
		];


        // Register sections.
        foreach ( $sections as $section_id => $section_args ) {
            $wp_customize->add_section( 'aarambha_real_estate_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
        }


        // Register sections.
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'aarambha_real_estate_section_separator_one',
                array(
                    'priority'      => 20,
                    'inline_style'  => 'background:#eee;border-left:0;'
                )
            )
        );
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'aarambha_real_estate_section_separator_two',
                array(
                    'priority'      => 46,
                    'inline_style'  => 'background:#eee;border-left:0;'
                )
            )
        );
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'aarambha_real_estate_section_separator_three',
                array(
                    'priority'      => 65,
                    'inline_style'  => 'background:#eee;border-left:0;'
                )
            )
        );

        // Header Builder
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'aarambha_real_estate_section_separator_five',
                array(
                    'priority'      => 30,
                    'inline_style'  => 'background:#eee;border-left:0;',
                    'panel'         => 'aarambha_real_estate_header',
                )
            )
        );

        // Footer Builder
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'aarambha_real_estate_section_separator_six',
                array(
                    'priority'      => 30,
                    'inline_style'  => 'background:#eee;border-left:0;',
                    'panel'         => 'aarambha_real_estate_footer',
                )
            )
        );
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'aarambha_real_estate_section_separator_seven',
                array(
                    'priority'      => 60,
                    'inline_style'  => 'background:#eee;border-left:0;',
                    'panel'         => 'aarambha_real_estate_footer',
                )
            )
        );

        // Front Page
        $wp_customize->add_section(
            new Aarambha_Real_Estate_Customize_Custom_Section(
                $wp_customize,
                'real_front_page_section_eight',
                array(
                    'panel'         => 'aarambha_real_estate_front_page_panel',
                    'priority'      => 11,
                    'inline_style'  => 'background:#eee;border-left:0;'
                )
            )
        );
    }


    /**
     * Add customizer repeater fields
     *
     * @access public
     * @param object $wp_customize the object.
     * @return void
     */
    public static function aarambha_real_estate_add_repeater_fields( $wp_customize ) {

        // Global Social Icons
        $wp_customize->add_setting( new Aarambha_Real_Estate_Customize_Repeater_Setting(
                $wp_customize,
                'aarambha_real_estate_social_icons',
                [
                    'default'           => [
                        [
                            'network'   => 'facebook',
                            'icon'      => '',
                            'link'      => '#'
                        ],
                        [
                            'network'   => 'twitter',
                            'icon'      => '',
                            'link'      => '#'
                        ]
                    ],
                    'sanitize_callback' => [ 'Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_repeater'],
                ]
            )
        );
        $wp_customize->add_control( new Aarambha_Real_Estate_Customize_Repeater_Control(
                $wp_customize,
                'aarambha_real_estate_social_icons',
                [
                    'section'           => 'aarambha_real_estate_social_section',
                    'priority'          => 15,
                    'fields'            => [
                    	'network'		=> [
                    		'type'			=> 'select',
							'label'			=> esc_html__( 'Select Network', 'aarambha-real-estate' ),
							'choices'		=> Aarambha_Real_Estate_Helper::social_network_list()
						],
                        'link'         => [
                            'type'          => 'url',
                            'default'       => '#',
                            'label'         => esc_html__( 'Link', 'aarambha-real-estate' )
                        ],
						'icon'         => [
							'type'          => 'font',
							'label'         => esc_html__( 'Custom Icon', 'aarambha-real-estate' ),
							'description'   => esc_html__( 'To replace the default social icon, Click below input field and choose the icon. Example: fa-facebook-f', 'aarambha-real-estate' )
						]
                    ],
                    'row_label'         => [
                        'type'              => 'field',
                        'value'             => esc_html__( 'Social', 'aarambha-real-estate' ),
                        'field'             => 'network'
                    ],
                ]
            )
        );

        // Front Page: Clients Logo
        $wp_customize->add_setting( new Aarambha_Real_Estate_Customize_Repeater_Setting(
                $wp_customize,
                'aarambha_real_estate_front_page_clients_logo_lists',
                [
                    'default'           => '',
                    'sanitize_callback' => [ 'Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_repeater'],
                ]
            )
        );
        $wp_customize->add_control( new Aarambha_Real_Estate_Customize_Repeater_Control(
                $wp_customize,
                'aarambha_real_estate_front_page_clients_logo_lists',
                [
                    'section'           => 'aarambha_real_estate_front_page_clients_section',
                    'fields'            => [
                        'client_logo'         => [
                            'type'              => 'image',
                            'label'             => esc_html__( 'Logo', 'aarambha-real-estate' )
                        ],
                    ],
                    'row_label'         => [
                        'type'              => 'field',
                        'value'             => esc_html__( 'Logo', 'aarambha-real-estate' ),
                    ],
                    'priority'          => 15,
                ]
            )
        );

        if ( Aarambha_Real_Estate_Helper::crucial_real_state_plugin() ) {
            // Front Page: Property Types
            $wp_customize->add_setting(
                new Aarambha_Real_Estate_Customize_Repeater_Setting(
                    $wp_customize,
                    'aarambha_real_estate_front_page_property_types',
                    array(
                        'default'           => '',
                        'sanitize_callback' => [ 'Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_repeater'],
                    )
                )
            );
            $wp_customize->add_control(
                new Aarambha_Real_Estate_Customize_Repeater_Control(
                    $wp_customize,
                    'aarambha_real_estate_front_page_property_types',
                    array(
                        'section'       => 'aarambha_real_estate_front_page_property_type_section',
                        'fields'            => [
                            'cat_slug'         => [
                                'type'              => 'select',
                                'label'             => esc_html__( 'Property Type', 'aarambha-real-estate' ),
                                'choices'           => Aarambha_Real_Estate_Helper::get_terms('property-type' ),
                            ]
                        ],
                        'row_label'         => [
                            'type'              => 'field',
                            'value'             => esc_html__( 'Item', 'aarambha-real-estate' )
                        ],
                        'priority'          => 15,
                    )
                )
            );
        }

        // Header Builder: Contact Info
        $wp_customize->add_setting(
            new Aarambha_Real_Estate_Customize_Repeater_Setting(
                $wp_customize,
                'aarambha_real_estate_header_contact_info_list',
                array(
                    'default'           => [
                        [
                            'title'     => esc_html__( '0123456789', 'aarambha-real-estate' ),
                            'subtitle'  => esc_html__( 'phone number', 'aarambha-real-estate' ),
                            'icon'      => 'fa-phone',
                            'link_type' => 'tel',
                            'link'      => '#'
                        ],
                        [
                            'title'     => esc_html__( 'youremail@gmail.com', 'aarambha-real-estate' ),
                            'subtitle'  => esc_html__( 'email address', 'aarambha-real-estate' ),
                            'icon'      => 'fa-envelope',
                            'link_type' => 'email',
                            'link'      => '#'
                        ],
                        [
                            'title'     => esc_html__( 'address', 'aarambha-real-estate' ),
                            'subtitle'  => esc_html__( 'find us', 'aarambha-real-estate' ),
                            'icon'      => 'fa-map-marker',
                            'link_type' => 'disable',
                            'link'      => '#'
                        ]
                    ],
                    'sanitize_callback' => [ 'Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_repeater'],
                )
            )
        );
        $wp_customize->add_control(
            new Aarambha_Real_Estate_Customize_Repeater_Control(
                $wp_customize,
                'aarambha_real_estate_header_contact_info_list',
                array(
                    'label'             => esc_html__( 'Contact Info', 'aarambha-real-estate' ),
                    'description'       => esc_html__( 'Click add button to add new contact item.', 'aarambha-real-estate' ),
                    'section'           => 'contact_info',
                    'priority'          => 15,
                    'fields'            => [
                        'icon'         => [
                            'type'          => 'font',
                            'label'         => esc_html__( 'Icon', 'aarambha-real-estate' ),
                            'description'   => esc_html__( 'Example: fa fa-facebook-f', 'aarambha-real-estate' )
                        ],
                        'title'         => [
                            'type'          => 'text',
                            'label'         => esc_html__( 'Title', 'aarambha-real-estate' )
                        ],
                        'subtitle'         => [
                            'type'          => 'text',
                            'label'         => esc_html__( 'Sub Title', 'aarambha-real-estate' )
                        ],
                        'link_type'         => [
                            'type'          => 'select',
                            'default'       => '#',
                            'label'         => esc_html__( 'Link Type', 'aarambha-real-estate' ),
                            'choices'       => [
                                'url'           => esc_html__( 'URL', 'aarambha-real-estate' ),
                                'tel'           => esc_html__( 'Tel', 'aarambha-real-estate' ),
                                'email'         => esc_html__( 'Email', 'aarambha-real-estate' ),
                                'disable'       => esc_html__( 'Disable', 'aarambha-real-estate' ),
                            ]
                        ],
                        'link'         => [
                            'type'          => 'url',
                            'default'       => '#',
                            'label'         => esc_html__( 'URL', 'aarambha-real-estate' )
                        ]
                    ],
                    'row_label'         => [
                        'type'              => 'field',
                        'value'             => esc_html__( 'Contact', 'aarambha-real-estate' ),
                        'field'             => 'title'
                    ],
                )
            )
        );

        // Footer Builder: Multi Button
        $wp_customize->add_setting(
            new Aarambha_Real_Estate_Customize_Repeater_Setting(
                $wp_customize,
                'aarambha_real_estate_footer_multi_buttons_list',
                array(
                    'default'           => [
                        [
                            'title'     => esc_html__( 'log in / register', 'aarambha-real-estate' ),
                            'icon'      => 'fa-user-circle-o',
                            'link'      => '#'
                        ]
                    ],
                    'sanitize_callback' => [ 'Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_repeater'],
                )
            )
        );
        $wp_customize->add_control(
            new Aarambha_Real_Estate_Customize_Repeater_Control(
                $wp_customize,
                'aarambha_real_estate_footer_multi_buttons_list',
                array(
                    'label'             => esc_html__( 'Buttons List', 'aarambha-real-estate' ),
                    'description'       => esc_html__( 'Click add button to add new button item.', 'aarambha-real-estate' ),
                    'section'           => 'footer_multi_buttons',
                    'priority'          => 15,
                    'fields'            => [
                        'icon'         => [
                            'type'          => 'font',
                            'label'         => esc_html__( 'Icon', 'aarambha-real-estate' ),
                            'description'   => esc_html__( 'Example: fa fa-facebook-f', 'aarambha-real-estate' )
                        ],
                        'title'         => [
                            'type'          => 'text',
                            'label'         => esc_html__( 'Title', 'aarambha-real-estate' )
                        ],
                        'link'         => [
                            'type'          => 'url',
                            'default'       => '#',
                            'label'         => esc_html__( 'URL', 'aarambha-real-estate' )
                        ]
                    ],
                    'row_label'         => [
                        'type'              => 'field',
                        'value'             => esc_html__( 'Button', 'aarambha-real-estate' ),
                        'field'             => 'title'
                    ],
                )
            )
        );
    }

}
new Aarambha_Real_Estate_Customizer();

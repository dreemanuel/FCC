<?php
/**
 * Aarambha Real Estate Theme Customizer Builder
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Header Builder and Customizer Options
 *
 */

class Aarambha_Real_Estate_Customizer_Header_Builder {

    /**
     * Panel ID, use for builder ID too
     *
     * @var string
     */
    public $panel = 'aarambha_real_estate_header';

    /**
     * Builder Sections and Controller ID
     *
     * @var string
     *
     */
    public $builder_section_controller = 'aarambha_real_estate_header_builder_controller_section';

    /*Builder Rows and Customizer Settings*/

    /**
     * Header Top Row and Its setting
     *
     * @var string
     *
     */
    public $header_top = 'aarambha_real_estate_header_top';

    /**
     * Header Main Row and Its setting
     *
     * @var string
     *
     */
    public $header_main = 'aarambha_real_estate_header_main';

    /**
     * Header Bottom Row and Its setting
     *
     * @var string
     *
     */
    public $header_bottom = 'aarambha_real_estate_header_bottom';


    /*Header Elements Section, Setting and Control ID*/

    /**
     * Header Socials Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $site_identity = 'title_tagline';

    /**
     * Primary Menu Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $primary_menu = 'primary_menu';

    /**
     * HTML Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $html = 'html';

    /**
     * Search Icon Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $search_icon = 'search_icon';

    /**
     * Social Icons Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $social_icons = 'social_icons';

    /**
     * Header Button Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $button_one = 'button_one';

    /**
     * Account Section/Setting/Control ID
     *
     * @var string
     *
     */
    public $account = 'account';

    /**
     * Toggle Menu
     *
     * @var string
     *
     */
    public $toggle_menu = 'toggle_menu';


    /**
     * Main Instance
     *
     * Insures that only one instance of Aarambha_Real_Estate_Customizer_Header_Builder exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     * @return object
     */
    public static function instance() {

        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been ran previously
        if ( null === $instance ) {
            $instance = new Aarambha_Real_Estate_Customizer_Header_Builder;
        }

        // Always return the instance
        return $instance;
    }

    /**
     *  Run functionality with hooks
     *
     * @return void
     */
    public function run() {

        add_action( 'customize_register', array( $this, 'set_customizer' ), 1 );

        add_action( 'customize_register', array( $this, 'customize_register' ), 3 );

        add_filter( 'aarambha_real_estate_default_theme_options', array( $this, 'header_defaults' ) );
        add_filter( 'aarambha_real_estate_builders', array( $this, 'header_builder' ) );

        add_action( 'aarambha_real_estate_header', array( $this, 'aarambha_real_estate_header_display' ), 100 );
    }

    /**
     * Callback functions for customize_register,
     * Fixed previous array issue
     *
     * @param null
     * @return void
     */
    public function set_customizer() {
        $builder = aarambha_real_estate_get_header_builder_options( Aarambha_Real_Estate_Customizer_Header_Builder()->builder_section_controller );
        if ( is_array( $builder ) ) {
            $builder = json_encode( urldecode_deep( $builder ), true );
        }
        set_theme_mod( Aarambha_Real_Estate_Customizer_Header_Builder()->builder_section_controller, $builder );
    }

    /**
     * Get header builder
     *
     * @param null
     * @return void
     */
    public function get_builder() {
        $builder = aarambha_real_estate_get_header_builder_options( Aarambha_Real_Estate_Customizer_Header_Builder()->builder_section_controller );
        if ( ! is_array( $builder ) ) {
            $builder = json_decode( urldecode_deep( $builder ), true );
        }
        return $builder;
    }


    /**
     * Callback functions for aarambha_real_estate_default_theme_options,
     * Add Header Builder defaults values
     *
     * @param array $default_options
     * @return array
     */
    public function header_defaults( $default_options = array() ) {

        $header_defaults = [

            $this->builder_section_controller => [
                'desktop'   => [
                    'top'      => [
                        'col-1'      => [
                            [
                                'id'    => 'title_tagline'
                            ]
                        ]
                    ],
                    'main'      => [
                        'col-0'      => [
                            [
                                'id'    => 'social_icons'
                            ]
                        ],
                        'col-1'     => [
                            [
                                'id'    => 'primary_menu'
                            ]
                        ],
                        'col-2'     => [
                            [
                                'id'    => 'button_one'
                            ],
                            [
                                'id'    => 'search_icon'
                            ]
                        ]
                    ]
                ],
                'mobile'    => [
                    'main'      => [
                        'col-0'      => [
                            [
                                'id'    => 'title_tagline'
                            ]
                        ],
                        'col-2'     => [
                            [
                                'id'    => 'social_icons'
                            ],
                            [
                                'id'    => 'toggle_menu'
                            ]
                        ]
                    ]
                ],
            ]
        ];
        return array_merge( $default_options, $header_defaults );
    }

    /**
     * Callback functions for aarambha_real_estate_builders,
     * Add Header Builder elements
     *
     * @param array $builder builder fields
     * @return array
     */
    public function header_builder( $builder ) {

        $items = apply_filters(
            'Aarambha_Real_Estate_Customizer_Header_Builder_items',
            array(
                Aarambha_Real_Estate_Customizer_Header_Builder()->site_identity   => array(
                    'name'    => esc_html__( 'Site Identity', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->site_identity,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->site_identity,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->primary_menu => array(
                    'name'    => esc_html__( 'Primary Menu', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->primary_menu,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->primary_menu,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->social_icons    => array(
                    'name'    => esc_html__( 'Social Icons', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->social_icons,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->social_icons,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->search_icon  => array(
                    'name'    => esc_html__( 'Search Icon', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->search_icon,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->search_icon,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->button_one   => array(
                    'name'    => esc_html__( 'Button', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->button_one,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->button_one,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->account  => array(
                    'name'    => esc_html__( 'Account', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->account,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->account,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->toggle_menu  => array(
                    'name'    => esc_html__( 'Mobile Menu', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->toggle_menu,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->toggle_menu,
                ),
                Aarambha_Real_Estate_Customizer_Header_Builder()->html  => array(
                    'name'    => esc_html__( 'HTML', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Header_Builder()->html,
                    'section' => Aarambha_Real_Estate_Customizer_Header_Builder()->html,
                )
            )
        );

        $header_builder = array(
            Aarambha_Real_Estate_Customizer_Header_Builder()->panel => array(
                'id'         => Aarambha_Real_Estate_Customizer_Header_Builder()->panel,
                'title'      => esc_html__( 'Header Builder', 'aarambha-real-estate' ),
                'control_id' => Aarambha_Real_Estate_Customizer_Header_Builder()->builder_section_controller,
                'panel'      => Aarambha_Real_Estate_Customizer_Header_Builder()->panel,
                'section'    => Aarambha_Real_Estate_Customizer_Header_Builder()->builder_section_controller,
                'devices'    => array(
                    'desktop' => esc_html__( 'Desktop', 'aarambha-real-estate' ),
                    'mobile'  => esc_html__( 'Mobile/Tablet', 'aarambha-real-estate' )
                ),
                'items'      => $items,
                'rows'       => array(
                    'top'       => esc_html__( 'Top Row', 'aarambha-real-estate' ),
                    'main'      => esc_html__( 'Main Row', 'aarambha-real-estate' ),
                    'bottom'    => esc_html__( 'Bottom Row', 'aarambha-real-estate' )
                ),
                'cols'       => array(
                    'top'       => 3,
                    'main'      => 3,
                    'bottom'    => 3
                ),
            ),
        );
        $header_builder = apply_filters( 'Aarambha_Real_Estate_Customizer_Header_Builder', $header_builder );
        return array_merge( $builder, $header_builder );

    }

    /**
     * Callback functions for customize_register,
     * Add Panel Section control
     *
     * @param object $wp_customize
     * @return void
     */
    public function customize_register( $wp_customize ) {

        $header_defaults = self::header_defaults();
        /**
         * Add Panels
         */
        $wp_customize->add_panel(
            $this->panel,
            array(
                'title'     => esc_html__( 'Header Builder', 'aarambha-real-estate' ),
                'priority'  => 20
            ) );

        /**
         * Add Sections.
         */

        $wp_customize->add_section(
            $this->builder_section_controller,
            array(
                'title'    => esc_html__( 'Header Builder', 'aarambha-real-estate' ),
                'priority' => 10,
                'panel'    => $this->panel,
            )
        );

        $wp_customize->add_section(
            $this->header_top,
            array(
                'title'    => esc_html__( 'Top Row', 'aarambha-real-estate' ),
                'priority' => 20,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->header_main,
            array(
                'title'    => esc_html__( 'Main Row', 'aarambha-real-estate' ),
                'priority' => 25,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->header_bottom,
            array(
                'title'    => esc_html__( 'Bottom Row', 'aarambha-real-estate' ),
                'priority' => 25,
                'panel'    => $this->panel,
            )
        );

        $wp_customize->add_section(
            $this->primary_menu,
            array(
                'title'    => esc_html__( 'Primary Menu', 'aarambha-real-estate' ),
                'priority' => 40,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->toggle_menu,
            array(
                'title'    => esc_html__( 'Mobile Menu', 'aarambha-real-estate' ),
                'priority' => 45,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->button_one,
            array(
                'title'    => esc_html__( 'Button', 'aarambha-real-estate' ),
                'priority' => 50,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->social_icons,
            array(
                'title'    => esc_html__( 'Social Icons', 'aarambha-real-estate' ),
                'priority' => 55,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->account,
            array(
                'title'    => esc_html__( 'Account', 'aarambha-real-estate' ),
                'priority' => 65,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->search_icon,
            array(
                'title'    => esc_html__( 'Search Icon', 'aarambha-real-estate' ),
                'priority' => 70,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->html,
            array(
                'title'    => esc_html__( 'HTML', 'aarambha-real-estate' ),
                'priority' => 75,
                'panel'    => $this->panel,
            )
        );
        /**
         * Builder control and setting
         */
        $wp_customize->add_setting(
            $this->builder_section_controller,
            array(
                'default'           => $header_defaults[ $this->builder_section_controller ],
                'sanitize_callback' => 'aarambha_real_estate_sanitize_field',
                'transport'         => 'postMessage',
            )
        );

        $wp_customize->add_control(
            $this->builder_section_controller,
            array(
                'label'    => esc_html__( 'Header Builder', 'aarambha-real-estate' ),
                'section'  => $this->builder_section_controller,
                'settings' => $this->builder_section_controller,
                'type'     => 'text',
            )
        );


        // Header Builder Options
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Top_Row_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Main_Row_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Bottom_Row_Fields.php';

        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Site_Identity_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Primary_Menu_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Button_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Social_Icons_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Account_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Search_Icon_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Toggle_Menu_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/header/options/Aarambha_Real_Estate_Customize_Header_Html_Fields.php';
    }

    /**
     *Column Element
     *
     * @param $column_elements
     */
    public function column_elements( $column_elements) {
		foreach ( $column_elements as $element ) {
			$id     = esc_html($element['id']);
			$slug 	= 'template-parts/header/' . esc_html($id);
			aarambha_real_estate_get_template_part( $id, $slug );
		}
    }

    /**
     * Callback Function For aarambha_real_estate_action_header
     * Display Header Content
     *
     * @return void
     */
    public function aarambha_real_estate_header_display() {

        $builder = $this->get_builder();

        // Desktop Display
        if ( isset( $builder['desktop'] ) && ! empty( $builder['desktop'] ) ) {

            $desktop_builder_data = [];

            $desktop_builder = $builder['desktop'];

            foreach ( $desktop_builder as $key => $single_row ) {

                if ( ! empty( $single_row ) ) {

                    foreach ( $single_row as $col_key => $columns ) {

                        if ( ! empty( $columns ) ) {

                            $desktop_builder_data[$key][$col_key] = $columns;
                        }

                    }

                }

            }
            if ( ! empty( $desktop_builder_data ) ) {
                $this->desktop_header( $desktop_builder_data );
            }

        }
        // Tablet/Mobile Display
        if ( isset( $builder['mobile'] ) && ! empty( $builder['mobile'] ) ) {

            $mobile_builder_data = [];

            $mobile_builder = $builder['mobile'];

            foreach ( $mobile_builder as $key => $single_row ) {

                if ( ! empty( $single_row ) ) {

                    foreach ( $single_row as $col_key => $columns ) {

                        if ( ! empty( $columns ) ) {

                            $mobile_builder_data[$key][$col_key] = $columns;
                        }

                    }

                }

            }
            if ( ! empty( $mobile_builder_data ) ) {
                $this->mobile_header( $mobile_builder_data );
            }
        }
    }

    /**
     * Display Desktop Header Content
     *
     * @return void
     */
    public function desktop_header( $desktop_builder ) {
		$header_wrap_class 			= ['desktop-header-wrap d-none d-md-none d-lg-block'];
		$header_inner_wrap_class 	= ['site-header-inner-wrap'];
		$header_upper_wrap_class 	= ['site-header-upper-wrap'];
        ?>
        <div id="desktop-header" class="<?php echo esc_attr(implode(' ', $header_wrap_class)); ?>" data-device="desktop">
			<div class="<?php echo esc_attr(implode( ' ', $header_inner_wrap_class )); ?>">
				<div class="<?php echo esc_attr(implode(' ',$header_upper_wrap_class));?>">
					<?php
					if ( isset( $desktop_builder['top'] ) ) {
						$top_elements = $desktop_builder['top'];

						// Left Column Content Justify
						$top_row_left_col = get_theme_mod(
							'aarambha_real_estate_header_top_row_left_col_content_justify',
							[
								'desktop'   => 'start',
								'tablet'    => 'start',
								'mobile'    => 'start'
							]
						);
						// Center Column Content Justify
						$top_row_center_col = get_theme_mod(
							'aarambha_real_estate_header_top_row_center_col_content_justify',
							[
								'desktop'   => 'center',
								'tablet'    => 'center',
								'mobile'    => 'center'
							]
						);
						// Right Column Content Justify
						$top_row_right_col = get_theme_mod(
							'aarambha_real_estate_header_top_row_right_col_content_justify',
							[
								'desktop'   => 'end',
								'tablet'    => 'end',
								'mobile'    => 'end'
							]
						);

						// Top Header Class
						$top_header_class = ['d-flex align-items-center top-header'];
						if ( count($top_elements) == 1 && aarambha_real_estate_find_array_key_value($top_elements,'id','search_icon') ) {
							$top_header_class[] = 'only-search-section';
						}
						// Top Header Row Class
						$top_row_class = ['site-header-row'];
						// Check left and right column exits
						if ( array_key_exists( 'col-0', $top_elements ) || array_key_exists('col-2', $top_elements ) ) {
							$top_row_class[] = ( array_key_exists( 'col-0', $top_elements ) && array_key_exists('col-2', $top_elements ) ) ? 'has-sides-column' : 'has-sides-column has-no-sides-column';
						}
						// Check center column exits
						if ( array_key_exists( 'col-1', $top_elements ) ) {
							$top_row_class[] = ( ! array_key_exists( 'col-0', $top_elements ) && ! array_key_exists('col-2', $top_elements ) ) ? 'has-only-center-column has-center-column' : 'has-center-column';
						}
						else {
							$top_row_class[] = 'has-no-center-column';
						}

						// Top Column Class
						$top_col_class = ['d-flex flex-wrap align-items-center'];

						?>
						<div class="<?php echo esc_attr( implode( ' ', $top_header_class) );?>">
							<div class="container">
								<div class="<?php echo esc_attr( implode( ' ', $top_row_class) );?>">
									<?php if ( array_key_exists( 'col-0', $top_elements ) || array_key_exists('col-2', $top_elements ) ) :
                                        $mean_menu_position     = false;
										$top_lef_col_class 		= $top_col_class;
										$top_lef_col_class[] 	= aarambha_real_estate_get_classes($top_row_left_col,'justify-content-');
										$top_lef_col_class[]	= 'site-header-section site-header-section-left';
										if ( array_key_exists('col-0', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-0'],'id','search_icon') ) {
											$top_lef_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-0', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-0'],'id','toggle_menu') ) {
                                            $top_lef_col_class[]    = 'col-has-toggle-menu-element';
                                            $mean_menu_position     = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $top_lef_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="left"'; }?>>
											<?php if ( array_key_exists('col-0', $top_elements ) ) : ?>
												<?php $this->column_elements( $top_elements['col-0'] ); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>

									<?php if ( array_key_exists( 'col-1', $top_elements ) ) :
                                        $mean_menu_position     = false;
										$top_center_col_class 	= $top_col_class;
										$top_center_col_class[] = aarambha_real_estate_get_classes($top_row_center_col,'justify-content-');
										$top_center_col_class[]	= 'site-header-section site-header-section-center';
										if ( array_key_exists('col-1', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-1'],'id','search_icon') ) {
											$top_center_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-1', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-1'],'id','toggle_menu') ) {
                                            $top_center_col_class[]     = 'col-has-toggle-menu-element';
                                            $mean_menu_position         = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $top_center_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="center"'; }?>>
											<?php $this->column_elements( $top_elements['col-1'] ); ?>
										</div>
									<?php endif; ?>

									<?php if ( array_key_exists( 'col-0', $top_elements ) || array_key_exists('col-2', $top_elements ) ) :
                                        $mean_menu_position     = false;
										$top_right_col_class 	= $top_col_class;
										$top_right_col_class[] 	= aarambha_real_estate_get_classes($top_row_right_col,'justify-content-');
										$top_right_col_class[]	= 'site-header-section site-header-section-right';
										if ( array_key_exists('col-2', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-2'],'id','search_icon') ) {
											$top_right_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-2', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-2'],'id','toggle_menu') ) {
                                            $top_right_col_class[]      = 'col-has-toggle-menu-element';
                                            $mean_menu_position         = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $top_right_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="right"'; }?>>
											<?php if ( array_key_exists('col-2', $top_elements ) ) : ?>
												<?php $this->column_elements( $top_elements['col-2'] ); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div><!-- .top-header -->

						<?php

					}
					if ( isset( $desktop_builder['main'] ) ) {
						$main_elements   = $desktop_builder['main'];

						// Left Column Content Justify
						$main_row_left_col = get_theme_mod(
							'aarambha_real_estate_header_main_row_left_col_content_justify',
							[
								'desktop'   => 'start',
								'tablet'    => 'start',
								'mobile'    => 'start'
							]
						);
						// Center Column Content Justify
						$main_row_center_col = get_theme_mod(
							'aarambha_real_estate_header_main_row_center_col_content_justify',
							[
								'desktop'   => 'center',
								'tablet'    => 'center',
								'mobile'    => 'center'
							]
						);
						// Right Column Content Justify
						$main_row_right_col = get_theme_mod(
							'aarambha_real_estate_header_main_row_right_col_content_justify',
							[
								'desktop'   => 'end',
								'tablet'    => 'end',
								'mobile'    => 'end'
							]
						);

						// Main Header Class
						$main_header_class = ['d-flex align-items-center main-header'];
						if ( count($main_elements) == 1 && aarambha_real_estate_find_array_key_value($main_elements,'id','search_icon') ) {
							$main_header_class[] = 'only-search-section';
						}

						// Main Header Row Class
						$main_row_class = ['site-header-row'];
						// Check left and right column exits
						if ( array_key_exists( 'col-0', $main_elements ) || array_key_exists('col-2', $main_elements ) ) {
							$main_row_class[] = ( array_key_exists( 'col-0', $main_elements ) && array_key_exists('col-2', $main_elements ) ) ? 'has-sides-column' : 'has-sides-column has-no-sides-column';
						}
						// Check center column exits
						if ( array_key_exists( 'col-1', $main_elements ) ) {
							$main_row_class[] = ( ! array_key_exists( 'col-0', $main_elements ) && ! array_key_exists('col-2', $main_elements ) ) ? 'has-only-center-column has-center-column' : 'has-center-column';
						}
						else {
							$main_row_class[] = 'has-no-center-column';
						}

						// Main Column Class
						$main_col_class = ['d-flex flex-wrap align-items-center'];
						?>
						<div class="<?php echo esc_attr( implode( ' ', $main_header_class) );?>">
							<div class="container">
								<div class="<?php echo esc_attr( implode( ' ', $main_row_class) );?>">
									<?php if ( array_key_exists( 'col-0', $main_elements ) || array_key_exists('col-2', $main_elements ) ) :
                                        $mean_menu_position     = false;
										$main_lef_col_class 	= $main_col_class;
										$main_lef_col_class[] 	= aarambha_real_estate_get_classes($main_row_left_col,'justify-content-');
										$main_lef_col_class[]	= 'site-header-section site-header-section-left';
										if ( array_key_exists('col-0', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-0'],'id','search_icon') ) {
											$main_lef_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-0', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-0'],'id','toggle_menu') ) {
                                            $main_lef_col_class[]   = 'col-has-toggle-menu-element';
                                            $mean_menu_position     = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $main_lef_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="left"'; }?>>
											<?php if ( array_key_exists('col-0', $main_elements ) ) : ?>
												<?php $this->column_elements( $main_elements['col-0'] ); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>

									<?php if ( array_key_exists( 'col-1', $main_elements ) ) :
                                        $mean_menu_position         = false;
										$main_center_col_class 		= $main_col_class;
										$main_center_col_class[] 	= aarambha_real_estate_get_classes($main_row_center_col,'justify-content-');
										$main_center_col_class[]	= 'site-header-section site-header-section-center';
										if ( array_key_exists('col-1', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-1'],'id','search_icon') ) {
											$main_center_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-1', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-1'],'id','toggle_menu') ) {
                                            $main_center_col_class[]    = 'col-has-toggle-menu-element';
                                            $mean_menu_position         = true;
                                        }
                                        ?>
										<div class="<?php echo esc_attr( implode( ' ', $main_center_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="center"'; }?>>
											<?php $this->column_elements( $main_elements['col-1'] ); ?>
										</div>
									<?php endif; ?>

									<?php if ( array_key_exists( 'col-0', $main_elements ) || array_key_exists('col-2', $main_elements ) ) :
                                        $mean_menu_position     = false;
										$main_right_col_class 	= $main_col_class;
										$main_right_col_class[] = aarambha_real_estate_get_classes($main_row_right_col,'justify-content-');
										$main_right_col_class[]	= 'site-header-section site-header-section-right';
										if ( array_key_exists('col-2', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-2'],'id','search_icon') ) {
											$main_right_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-2', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-2'],'id','toggle_menu') ) {
                                            $main_right_col_class[]     = 'col-has-toggle-menu-element';
                                            $mean_menu_position         = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $main_right_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="right"'; }?>>
											<?php if ( array_key_exists('col-2', $main_elements ) ) : ?>
												<?php $this->column_elements( $main_elements['col-2'] ); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div><!-- .main-header -->
						<?php

					}
					?>
				</div><!-- .site-header-upper-wrap -->
				<?php
				if ( isset( $desktop_builder['bottom'] ) ) {
					$bottom_elements   = $desktop_builder['bottom'];

					// Left Column Content Justify
					$bottom_row_left_col = get_theme_mod(
						'aarambha_real_estate_header_bottom_row_left_col_content_justify',
						[
							'desktop'   => 'start',
							'tablet'    => 'start',
							'mobile'    => 'start'
						]
					);
					// Center Column Content Justify
					$bottom_row_center_col = get_theme_mod(
						'aarambha_real_estate_header_bottom_row_center_col_content_justify',
						[
							'desktop'   => 'center',
							'tablet'    => 'center',
							'mobile'    => 'center'
						]
					);
					// Right Column Content Justify
					$bottom_row_right_col = get_theme_mod(
						'aarambha_real_estate_header_bottom_row_right_col_content_justify',
						[
							'desktop'   => 'end',
							'tablet'    => 'end',
							'mobile'    => 'end'
						]
					);

					// Bottom Header Class
					$header_bottom_wrap_class = ['site-header-bottom-wrap'];
					$bottom_header_class = ['d-flex align-items-center bottom-header'];
					if ( count($bottom_elements) == 1 && aarambha_real_estate_find_array_key_value($bottom_elements,'id','search_icon') ) {
						$bottom_header_class[] = 'only-search-section';
					}

					// Main Header Row Class
					$bottom_row_class = ['site-header-row'];
					// Check left and right column exits
					if ( array_key_exists( 'col-0', $bottom_elements ) || array_key_exists('col-2', $bottom_elements ) ) {
						$bottom_row_class[] = ( array_key_exists( 'col-0', $bottom_elements ) && array_key_exists('col-2', $bottom_elements ) ) ? 'has-sides-column' : 'has-sides-column has-no-sides-column';
					}
					// Check center column exits
					if ( array_key_exists( 'col-1', $bottom_elements ) ) {
						$bottom_row_class[] = ( ! array_key_exists( 'col-0', $bottom_elements ) && ! array_key_exists('col-2', $bottom_elements ) ) ? 'has-only-center-column has-center-column' : 'has-center-column';
					}
					else {
						$bottom_row_class[] = 'has-no-center-column';
					}

					// Bottom Column Class
					$bottom_col_class = ['d-flex flex-wrap align-items-center'];
					?>
					<div class="<?php echo esc_attr(implode(' ',$header_bottom_wrap_class));?>">
						<div class="<?php echo esc_attr( implode( ' ', $bottom_header_class) );?>">
							<div class="container">
								<div class="<?php echo esc_attr( implode( ' ', $bottom_row_class) );?>">
									<?php if ( array_key_exists( 'col-0', $bottom_elements ) || array_key_exists('col-2', $bottom_elements ) ) :
                                        $mean_menu_position       = false;
										$bottom_lef_col_class     = $bottom_col_class;
										$bottom_lef_col_class[]   = aarambha_real_estate_get_classes($bottom_row_left_col,'justify-content-');
										$bottom_lef_col_class[]   = 'site-header-section site-header-section-left';
										if ( array_key_exists('col-0', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-0'],'id','search_icon') ) {
											$bottom_lef_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-0', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-0'],'id','toggle_menu') ) {
                                            $bottom_lef_col_class[]     = 'col-has-toggle-menu-element';
                                            $mean_menu_position         = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $bottom_lef_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="left"'; }?>>
											<?php if ( array_key_exists('col-0', $bottom_elements ) ) : ?>
												<?php $this->column_elements( $bottom_elements['col-0'] ); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>

									<?php if ( array_key_exists( 'col-1', $bottom_elements ) ) :
                                        $mean_menu_position           = false;
										$bottom_center_col_class      = $bottom_col_class;
										$bottom_center_col_class[]    = aarambha_real_estate_get_classes($bottom_row_center_col,'justify-content-');
										$bottom_center_col_class[]    = 'site-header-section site-header-section-center';
										if ( array_key_exists('col-1', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-1'],'id','search_icon') ) {
											$bottom_center_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-1', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-1'],'id','toggle_menu') ) {
                                            $bottom_center_col_class[]      = 'col-has-toggle-menu-element';
                                            $mean_menu_position             = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $bottom_center_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="center"'; }?>>
											<?php $this->column_elements( $bottom_elements['col-1'] ); ?>
										</div>
									<?php endif; ?>

									<?php if ( array_key_exists( 'col-0', $bottom_elements ) || array_key_exists('col-2', $bottom_elements ) ) :
                                        $mean_menu_position       = false;
										$bottom_right_col_class   = $bottom_col_class;
										$bottom_right_col_class[] = aarambha_real_estate_get_classes($bottom_row_right_col,'justify-content-');
										$bottom_right_col_class[] = 'site-header-section site-header-section-right';
										if ( array_key_exists('col-2', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-2'],'id','search_icon') ) {
											$bottom_right_col_class[]	= 'col-has-search-element';
										}
                                        if ( array_key_exists('col-2', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-2'],'id','toggle_menu') ) {
                                            $bottom_right_col_class[]   = 'col-has-toggle-menu-element';
                                            $mean_menu_position         = true;
                                        }
										?>
										<div class="<?php echo esc_attr( implode( ' ', $bottom_right_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="right"'; }?>>
											<?php if ( array_key_exists('col-2', $bottom_elements ) ) : ?>
												<?php $this->column_elements( $bottom_elements['col-2'] ); ?>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div><!-- .bottom-header -->
					</div><!-- .site-header-bottom-wrap -->

					<?php

				}
				?>
			</div>
        </div><!-- #desktop-header -->
        <?php

    }

    /**
     * Display Mobile Header Content
     *
     * @return void
     */
    public function mobile_header( $mobile_builder ) {

        ?>
        <div id="mobile-header" class="mobile-header-wrap d-block d-md-block d-lg-none" data-device="mobile">
			<?php
			if ( isset( $mobile_builder['top'] ) ) {
				$top_elements = $mobile_builder['top'];

				// Left Column Content Justify
				$top_row_left_col = get_theme_mod(
					'aarambha_real_estate_header_top_row_left_col_content_justify',
					[
						'desktop'   => 'start',
						'tablet'    => 'start',
						'mobile'    => 'start'
					]
				);
				// Center Column Content Justify
				$top_row_center_col = get_theme_mod(
					'aarambha_real_estate_header_top_row_center_col_content_justify',
					[
						'desktop'   => 'center',
						'tablet'    => 'center',
						'mobile'    => 'center'
					]
				);
				// Right Column Content Justify
				$top_row_right_col = get_theme_mod(
					'aarambha_real_estate_header_top_row_right_col_content_justify',
					[
						'desktop'   => 'end',
						'tablet'    => 'end',
						'mobile'    => 'end'
					]
				);

				// Top Header Class
				$top_header_class = ['top-header d-flex align-items-center'];
				if ( count($top_elements) == 1 && aarambha_real_estate_find_array_key_value($top_elements,'id','search_icon') ) {
					$top_header_class[] = 'only-search-section';
				}

				// Top Header Row Class
				$top_row_class = ['site-header-row'];
				// Check left and right column exits
				if ( array_key_exists( 'col-0', $top_elements ) || array_key_exists('col-2', $top_elements ) ) {
					$top_row_class[] = ( array_key_exists( 'col-0', $top_elements ) && array_key_exists('col-2', $top_elements ) ) ? 'has-sides-column' : 'has-sides-column has-no-sides-column';
				}
				// Check center column exits
				if ( array_key_exists( 'col-1', $top_elements ) ) {
					$top_row_class[] = ( ! array_key_exists( 'col-0', $top_elements ) && ! array_key_exists('col-2', $top_elements ) ) ? 'has-only-center-column has-center-column' : 'has-center-column';
				}
				else {
					$top_row_class[] = 'has-no-center-column';
				}

				// Top Column Class
				$top_col_class = ['d-flex flex-wrap align-items-center'];
				?>
				<div class="<?php echo esc_attr( implode( ' ', $top_header_class) );?>">
					<div class="container">
						<div class="<?php echo esc_attr( implode( ' ', $top_row_class) );?>">
							<?php if ( array_key_exists( 'col-0', $top_elements ) || array_key_exists('col-2', $top_elements ) ) :
                                $mean_menu_position     = false;
								$top_lef_col_class      = $top_col_class;
								$top_lef_col_class[]    = aarambha_real_estate_get_classes($top_row_left_col,'justify-content-');
								$top_lef_col_class[]    = 'site-header-section site-header-section-left';
								if ( array_key_exists('col-0', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-0'],'id','search_icon') ) {
									$top_lef_col_class[]    = 'col-has-search-element';
								}
								if ( array_key_exists('col-0', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-0'],'id','toggle_menu') ) {
									$top_lef_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position    = true;
								}
								?>
								<div class="<?php echo esc_attr( implode( ' ', $top_lef_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="left"'; }?>>
									<?php if ( array_key_exists('col-0', $top_elements ) ) : ?>
										<?php $this->column_elements( $top_elements['col-0'] ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( array_key_exists( 'col-1', $top_elements ) ) :
								$mean_menu_position     = false;
								$top_center_col_class   = $top_col_class;
								$top_center_col_class[] = aarambha_real_estate_get_classes($top_row_center_col,'justify-content-');
								$top_center_col_class[] = 'site-header-section site-header-section-center';
								if ( array_key_exists('col-1', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-1'],'id','search_icon') ) {
									$top_center_col_class[] = 'col-has-search-element';
								}
								if ( array_key_exists('col-1', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-1'],'id','toggle_menu') ) {
									$top_center_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position       = true;
								}

								?>
								<div class="<?php echo esc_attr( implode( ' ', $top_center_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="center"'; }?>>
									<?php $this->column_elements( $top_elements['col-1'] ); ?>
								</div>
							<?php endif; ?>

							<?php if ( array_key_exists( 'col-0', $top_elements ) || array_key_exists('col-2', $top_elements ) ) :
								$mean_menu_position     = false;
								$top_right_col_class    = $top_col_class;
								$top_right_col_class[]  = aarambha_real_estate_get_classes($top_row_right_col,'justify-content-');
								$top_right_col_class[]  = 'site-header-section site-header-section-right';
								if ( array_key_exists('col-2', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-2'],'id','search_icon') ) {
									$top_right_col_class[]  = 'col-has-search-element';
								}
								if ( array_key_exists('col-2', $top_elements ) && aarambha_real_estate_find_array_key_value($top_elements['col-2'],'id','toggle_menu') ) {
									$top_right_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position      = true;
								}

								?>
								<div class="<?php echo esc_attr( implode( ' ', $top_right_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="right"'; }?>>
									<?php if ( array_key_exists('col-2', $top_elements ) ) : ?>
										<?php $this->column_elements( $top_elements['col-2'] ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div><!-- .top-header -->
				<?php

			}
			if ( isset( $mobile_builder['main'] ) ) {
				$main_elements   = $mobile_builder['main'];

				// Left Column Content Justify
				$main_row_left_col = get_theme_mod(
					'aarambha_real_estate_header_main_row_left_col_content_justify',
					[
						'desktop'   => 'start',
						'tablet'    => 'start',
						'mobile'    => 'start'
					]
				);
				// Center Column Content Justify
				$main_row_center_col = get_theme_mod(
					'aarambha_real_estate_header_main_row_center_col_content_justify',
					[
						'desktop'   => 'center',
						'tablet'    => 'center',
						'mobile'    => 'center'
					]
				);
				// Right Column Content Justify
				$main_row_right_col = get_theme_mod(
					'aarambha_real_estate_header_main_row_right_col_content_justify',
					[
						'desktop'   => 'end',
						'tablet'    => 'end',
						'mobile'    => 'end'
					]
				);

				// Main Header Class
				$main_header_class = ['main-header d-flex align-items-center'];
				if ( count($main_elements) == 1 && aarambha_real_estate_find_array_key_value($main_elements,'id','search_icon') ) {
					$main_header_class[] = 'only-search-section';
				}

				// Main Header Row Class
				$main_row_class = ['site-header-row'];
				// Check left and right column exits
				if ( array_key_exists( 'col-0', $main_elements ) || array_key_exists('col-2', $main_elements ) ) {
					$main_row_class[] = ( array_key_exists( 'col-0', $main_elements ) && array_key_exists('col-2', $main_elements ) ) ? 'has-sides-column' : 'has-sides-column has-no-sides-column';
				}
				// Check center column exits
				if ( array_key_exists( 'col-1', $main_elements ) ) {
					$main_row_class[] = ( ! array_key_exists( 'col-0', $main_elements ) && ! array_key_exists('col-2', $main_elements ) ) ? 'has-only-center-column has-center-column' : 'has-center-column';
				}
				else {
					$main_row_class[] = 'has-no-center-column';
				}
				// Main Column Class
				$main_col_class = ['d-flex flex-wrap align-items-center'];
				?>
				<div class="<?php echo esc_attr( implode( ' ', $main_header_class) );?>">
					<div class="container">
						<div class="<?php echo esc_attr( implode( ' ', $main_row_class) );?>">
							<?php if ( array_key_exists( 'col-0', $main_elements ) || array_key_exists('col-2', $main_elements ) ) :
								$mean_menu_position     = false;
								$main_lef_col_class     = $main_col_class;
								$main_lef_col_class[]   = aarambha_real_estate_get_classes($main_row_left_col,'justify-content-');
								$main_lef_col_class[]   = 'site-header-section site-header-section-left';
								if ( array_key_exists('col-0', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-0'],'id','search_icon') ) {
									$main_lef_col_class[]   = 'col-has-search-element';
								}
								if ( array_key_exists('col-0', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-0'],'id','toggle_menu') ) {
									$main_lef_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position     = true;
								}
								?>
								<div class="<?php echo esc_attr( implode( ' ', $main_lef_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="left"'; }?>>
									<?php if ( array_key_exists('col-0', $main_elements ) ) : ?>
										<?php $this->column_elements( $main_elements['col-0'] ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( array_key_exists( 'col-1', $main_elements ) ) :
								$mean_menu_position     	= false;
								$main_center_col_class      = $main_col_class;
								$main_center_col_class[]    = aarambha_real_estate_get_classes($main_row_center_col,'justify-content-');
								$main_center_col_class[]    = 'site-header-section site-header-section-center';
								if ( array_key_exists('col-1', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-1'],'id','search_icon') ) {
									$main_center_col_class[]    = 'col-has-search-element';
								}
								if ( array_key_exists('col-1', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-1'],'id','toggle_menu') ) {
									$main_center_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position        = true;
								}

								?>
								<div class="<?php echo esc_attr( implode( ' ', $main_center_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="center"'; }?>>
									<?php $this->column_elements( $main_elements['col-1'] ); ?>
								</div>
							<?php endif; ?>

							<?php if ( array_key_exists( 'col-0', $main_elements ) || array_key_exists('col-2', $main_elements ) ) :
								$mean_menu_position     = false;
								$main_right_col_class   = $main_col_class;
								$main_right_col_class[] = aarambha_real_estate_get_classes($main_row_right_col, 'justify-content-');
								$main_right_col_class[] = 'site-header-section site-header-section-right';
								if ( array_key_exists('col-2', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-2'],'id','search_icon') ) {
									$main_right_col_class[] = 'col-has-search-element';
								}
								if ( array_key_exists('col-2', $main_elements ) && aarambha_real_estate_find_array_key_value($main_elements['col-2'],'id','toggle_menu') ) {
									$main_right_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position       = true;
								}

								?>
								<div class="<?php echo esc_attr( implode( ' ', $main_right_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="right"'; }?>>
									<?php if ( array_key_exists('col-2', $main_elements ) ) : ?>
										<?php $this->column_elements( $main_elements['col-2'] ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div><!-- .main-header -->
				<?php

			}
			if ( isset( $mobile_builder['bottom'] ) ) {
				$bottom_elements   = $mobile_builder['bottom'];

				// Left Column Content Justify
				$bottom_row_left_col = get_theme_mod(
					'aarambha_real_estate_header_bottom_row_left_col_content_justify',
					[
						'desktop'   => 'start',
						'tablet'    => 'start',
						'mobile'    => 'start'
					]
				);
				// Center Column Content Justify
				$bottom_row_center_col = get_theme_mod(
					'aarambha_real_estate_header_bottom_row_center_col_content_justify',
					[
						'desktop'   => 'center',
						'tablet'    => 'center',
						'mobile'    => 'center'
					]
				);
				// Right Column Content Justify
				$bottom_row_right_col = get_theme_mod(
					'aarambha_real_estate_header_bottom_row_right_col_content_justify',
					[
						'desktop'   => 'end',
						'tablet'    => 'end',
						'mobile'    => 'end'
					]
				);

				// Main Header Class
				$bottom_header_class = ['bottom-header d-flex align-items-center'];
				if ( count($bottom_elements) == 1 && aarambha_real_estate_find_array_key_value($bottom_elements,'id','search_icon') ) {
					$bottom_header_class[] = 'only-search-section';
				}

				// Main Header Row Class
				$bottom_row_class = ['site-header-row'];
				// Check left and right column exits
				if ( array_key_exists( 'col-0', $bottom_elements ) || array_key_exists('col-2', $bottom_elements ) ) {
					$bottom_row_class[] = ( array_key_exists( 'col-0', $bottom_elements ) && array_key_exists('col-2', $bottom_elements ) ) ? 'has-sides-column' : 'has-sides-column has-no-sides-column';
				}
				// Check center column exits
				if ( array_key_exists( 'col-1', $bottom_elements ) ) {
					$bottom_row_class[] = ( ! array_key_exists( 'col-0', $bottom_elements ) && ! array_key_exists('col-2', $bottom_elements ) ) ? 'has-only-center-column has-center-column' : 'has-center-column';
				}
				else {
					$bottom_row_class[] = 'has-no-center-column';
				}

				// Main Column Class
				$bottom_col_class = ['d-flex flex-wrap align-items-center'];
				?>
				<div class="<?php echo esc_attr( implode( ' ', $bottom_header_class) );?>">
					<div class="container">
						<div class="<?php echo esc_attr( implode( ' ', $bottom_row_class) );?>">
							<?php if ( array_key_exists( 'col-0', $bottom_elements ) || array_key_exists('col-2', $bottom_elements ) ) :
								$mean_menu_position       = false;
								$bottom_lef_col_class     = $bottom_col_class;
								$bottom_lef_col_class[]   = aarambha_real_estate_get_classes($bottom_row_left_col, 'justify-content-');
								$bottom_lef_col_class[]   = 'site-header-section site-header-section-left';
								if ( array_key_exists('col-0', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-0'],'id','search_icon') ) {
									$bottom_lef_col_class[] = 'col-has-search-element';
								}
								if ( array_key_exists('col-0', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-0'],'id','toggle_menu') ) {
									$bottom_lef_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position       = true;
								}
								?>
								<div class="<?php echo esc_attr( implode( ' ', $bottom_lef_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="left"'; }?>>
									<?php if ( array_key_exists('col-0', $bottom_elements ) ) : ?>
										<?php $this->column_elements( $bottom_elements['col-0'] ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( array_key_exists( 'col-1', $bottom_elements ) ) :
								$mean_menu_position           = false;
								$bottom_center_col_class      = $bottom_col_class;
								$bottom_center_col_class[]    = aarambha_real_estate_get_classes($bottom_row_center_col, 'justify-content-');
								$bottom_center_col_class[]    = 'site-header-section site-header-section-center';
								if ( array_key_exists('col-1', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-1'],'id','search_icon') ) {
									$bottom_center_col_class[]  = 'col-has-search-element';
								}
								if ( array_key_exists('col-1', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-1'],'id','toggle_menu') ) {
									$bottom_center_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position          = true;
								}
								?>
								<div class="<?php echo esc_attr( implode( ' ', $bottom_center_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="center"'; }?>>
									<?php $this->column_elements( $bottom_elements['col-1'] ); ?>
								</div>
							<?php endif; ?>

							<?php if ( array_key_exists( 'col-0', $bottom_elements ) || array_key_exists('col-2', $bottom_elements ) ) :
								$mean_menu_position       = false;
								$bottom_right_col_class   = $bottom_col_class;
								$bottom_right_col_class[] = aarambha_real_estate_get_classes($bottom_row_right_col, 'justify-content-');
								$bottom_right_col_class[] = 'site-header-section site-header-section-right';
								if ( array_key_exists('col-2', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-2'],'id','search_icon') ) {
									$bottom_right_col_class[]   = 'col-has-search-element';
								}
								if ( array_key_exists('col-2', $bottom_elements ) && aarambha_real_estate_find_array_key_value($bottom_elements['col-2'],'id','toggle_menu') ) {
									$bottom_right_col_class[]   = 'col-has-toggle-menu-element';
									$mean_menu_position         = true;
								}
								?>
								<div class="<?php echo esc_attr( implode( ' ', $bottom_right_col_class) );?>"<?php if ( $mean_menu_position ) { echo ' data-meanMenu="right"'; }?>>
									<?php if ( array_key_exists('col-2', $bottom_elements ) ) : ?>
										<?php $this->column_elements( $bottom_elements['col-2'] ); ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div><!-- .bottom-header -->
				<?php

			}
			?>
        </div>
        <?php
    }

}

/**
 * Create Instance for Aarambha_Real_Estate_Customizer_Header_Builder
 *
 * @param
 * @return object
 */
if ( ! function_exists( 'aarambha_real_estate_customizer_header_builder' ) ) {

    function aarambha_real_estate_customizer_header_builder() {

        return Aarambha_Real_Estate_Customizer_Header_Builder::instance();
    }

    aarambha_real_estate_customizer_header_builder()->run();
}

/**
 * Get header builder default options
 *
 * @param null
 * @return mixed aarambha_real_estate_theme_options
 *
 */
if ( ! function_exists( 'aarambha_real_estate_get_header_builder_options' ) ) :
    function aarambha_real_estate_get_header_builder_options( $key = '' ) {
        if ( ! empty( $key ) ) {
            $header_default_values  = Aarambha_Real_Estate_Customizer_Header_Builder()->header_defaults();
            $theme_mod_values       = get_theme_mod( $key, isset( $header_default_values[ $key ] ) ? $header_default_values[ $key ] : '' );
            return apply_filters( 'aarambha_real_estate_' . $key, $theme_mod_values );
        }
        return false;
    }
endif;

/**
 * Check array key and value exist.
 *
 * @param $array array
 * @param $key string
 * @param $val string
 *
 * @return boolean
 *
 */
if ( ! function_exists( 'aarambha_real_estate_find_array_key_value' ) ) :
	function aarambha_real_estate_find_array_key_value( $array, $key, $val ) {
		foreach ($array as $item) {
			if (is_array($item) && aarambha_real_estate_find_array_key_value($item, $key, $val)) return true;

			if (isset($item[$key]) && $item[$key] == $val) return true;
		}

		return false;
	}
endif;



/**
 * Get data columns with values.
 *
 * @access public
 * @param array $values
 * @param string $prefix
 * @return string
 */
if ( ! function_exists( 'aarambha_real_estate_get_classes' ) ) :
	function aarambha_real_estate_get_classes( $values = [], $prefix = '' ) {
		$return = '';
		if ( ! empty( $values ) ) {

			// Base or Mobile
			$return .= isset( $values['mobile'] ) ? esc_attr( $prefix . $values['mobile'] ) : '';
			// Tablet
			$return .= isset( $values['tablet'] ) ? ' ' . esc_attr( $prefix ) . 'md-' . esc_attr( $values['tablet'] ) : '';
			// Desktop
			$return .= isset( $values['desktop'] ) ? ' ' . esc_attr( $prefix ) .  'lg-' . esc_attr( $values['desktop'] ) : '';
		}

		return $return;
	}
endif;





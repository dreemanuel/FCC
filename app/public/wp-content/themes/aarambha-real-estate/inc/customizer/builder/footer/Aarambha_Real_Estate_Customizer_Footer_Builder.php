<?php
/**
 * Aarambha Real Estate Theme Customizer Footer Builder
 *
 * @package Aarambha_Real_Estate
 */

/**
 * Header Builder and Customizer Options
 *
 */

class Aarambha_Real_Estate_Customizer_Footer_Builder {

    /**
     * Panel ID, use for builder ID too
     *
     * @var string
     */
    public $panel = 'aarambha_real_estate_footer';

    /**
     * Builder Sections and Controller ID
     *
     * @var string
     *
     */
    public $builder_section_controller = 'aarambha_real_estate_footer_builder_controller_section';

    /*Builder Rows and Customizer Settings*/

    /**
     * Header Top Row and Its setting
     *
     * @var string
     *
     */
    public $footer_top = 'aarambha_real_estate_footer_top';

    /**
     * Header Main Row and Its setting
     *
     * @var string
     *
     */
    public $footer_main = 'aarambha_real_estate_footer_main';

    /**
     * Header Bottom Row and Its setting
     *
     * @var string
     *
     */
    public $footer_bottom = 'aarambha_real_estate_footer_bottom';


    /**
     * Footer HTML Row and Its setting
     *
     * @var string
     *
     *
     */
    public $footer_html = 'footer_html';

    /*Footer Elements Section, Setting and Control ID*/
    /**
     * Copyright Section/Setting/Control ID
     *
     * @var string
     *
     *
     */
    public $footer_copyright = 'footer_copyright';

    /**
     * Footer Menu Section/Setting/Control ID
     *
     * @var string
     *
     *
     */
    public $footer_menu = 'footer_menu';

    /**
     * Footer Socials Section/Setting/Control ID
     *
     * @var string
     *
     *
     */
    public $footer_social = 'footer_social';

    /**
     * Footer Socials Section/Setting/Control ID
     *
     * @var string
     *
     *
     */
    public $footer_button = 'footer_button';

    /**
     * Footer Sidebars Section/Setting/Control ID
     *
     * @var string
     *
     *
     */
    public $footer_sidebar_1 = 'footer_sidebar_1';
    public $footer_sidebar_2 = 'footer_sidebar_2';
    public $footer_sidebar_3 = 'footer_sidebar_3';
    public $footer_sidebar_4 = 'footer_sidebar_4';
    public $footer_sidebar_5 = 'footer_sidebar_5';
    public $footer_sidebar_6 = 'footer_sidebar_6';


    /**
     * Main Instance
     *
     * Insures that only one instance of Aarambha_Real_Estate_Customizer_Footer_Builder exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     * @return object
     */
    public static function instance() {

        // Store the instance locally to avoid private static replication
        static $instance = null;

        // Only run these methods if they haven't been ran previously
        if ( null === $instance ) {
            $instance = new Aarambha_Real_Estate_Customizer_Footer_Builder;
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

        add_filter( 'aarambha_real_estate_default_theme_options', array( $this, 'footer_defaults' ) );
        add_filter( 'aarambha_real_estate_builders', array( $this, 'footer_builder' ) );

        add_action( 'aarambha_real_estate_footer', array( $this, 'aarambha_real_estate_footer_display' ), 100 );
    }

    /**
     * Callback functions for customize_register,
     * Fixed previous array issue
     *
     * @param null
     * @return void
     */
    public function set_customizer() {
        $builder = aarambha_real_estate_get_footer_builder_options( Aarambha_Real_Estate_Customizer_Footer_Builder()->builder_section_controller );
        if ( is_array( $builder ) ) {
            $builder = json_encode( urldecode_deep( $builder ), true );
        }
        set_theme_mod( Aarambha_Real_Estate_Customizer_Footer_Builder()->builder_section_controller, $builder );
    }

    /**
     * Get footer builder
     *
     * @param null
     * @return void
     */
    public function get_builder() {
        $builder = aarambha_real_estate_get_footer_builder_options( Aarambha_Real_Estate_Customizer_Footer_Builder()->builder_section_controller );
        if ( ! is_array( $builder ) ) {
            $builder = json_decode( urldecode_deep( $builder ), true );
        }
        return $builder;
    }


    /**
     * Callback functions for aarambha_real_estate_default_theme_options,
     * Add Footer Builder defaults values
     *
     * @param array $default_options
     * @return array
     */
    public function footer_defaults( $default_options = array() ) {

        $footer_defaults = [

            $this->builder_section_controller => [
                'desktop'   => [
                    'bottom'      => [
                        'col-0'      => [
                            [
                                'id'    => 'footer_copyright'
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return array_merge( $default_options, $footer_defaults );
    }

    /**
     * Callback functions for aarambha_real_estate_builders,
     * Add Header Builder elements
     *
     * @param array $builder builder fields
     * @return array
     */
    public function footer_builder( $builder ) {

        $items = apply_filters(
            'Aarambha_Real_Estate_Customizer_Footer_Builder_items',
            array(
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_copyright   => array(
                    'name'    => esc_html__( 'Copyright', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_copyright,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_copyright,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_menu => array(
                    'name'    => esc_html__( 'Footer Menu', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_menu,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_menu,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_social    => array(
                    'name'    => esc_html__( 'Social Icons', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_social,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_social,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_button    => array(
                    'name'    => esc_html__( 'Button', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_button,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_button,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_html  => array(
                    'name'    => esc_html__( 'HTML', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_html,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_html,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_1   => array(
                    'name'    => esc_html__( 'Footer Sidebar 1', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_1,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_1,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_2   => array(
                    'name'    => esc_html__( 'Footer Sidebar 2', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_2,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_2,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_3   => array(
                    'name'    => esc_html__( 'Footer Sidebar 3', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_3,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_3,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_4   => array(
                    'name'    => esc_html__( 'Footer Sidebar 4', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_4,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_4,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_5   => array(
                    'name'    => esc_html__( 'Footer Sidebar 5', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_5,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_5,
                ),
                Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_6   => array(
                    'name'    => esc_html__( 'Footer Sidebar 6', 'aarambha-real-estate' ),
                    'id'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_6,
                    'section' => Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_sidebar_6,
                )
            )
        );

        $footer_builder = array(
            Aarambha_Real_Estate_Customizer_Footer_Builder()->panel => array(
                'id'         => Aarambha_Real_Estate_Customizer_Footer_Builder()->panel,
                'title'      => esc_html__( 'Footer Builder', 'aarambha-real-estate' ),
                'control_id' => Aarambha_Real_Estate_Customizer_Footer_Builder()->builder_section_controller,
                'panel'      => Aarambha_Real_Estate_Customizer_Footer_Builder()->panel,
                'section'    => Aarambha_Real_Estate_Customizer_Footer_Builder()->builder_section_controller,
                'devices'    => array(
                    'desktop' => esc_html__( 'Global', 'aarambha-real-estate' )
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
                )
            ),
        );
        $footer_builder = apply_filters( 'Aarambha_Real_Estate_Customizer_Footer_Builder', $footer_builder );
        return array_merge( $builder, $footer_builder );

    }

    /**
     * Callback functions for customize_register,
     * Add Panel Section control
     *
     * @param object $wp_customize
     * @return void
     */
    public function customize_register( $wp_customize ) {

        $footer_defaults = self::footer_defaults();
        /**
         * Add Panels
         */
        $wp_customize->add_panel(
            $this->panel,
            array(
                'title'     => esc_html__( 'Footer Builder', 'aarambha-real-estate' ),
                'priority'  => 20
            ) );

        /**
         * Add Sections.
         */

        $wp_customize->add_section(
            $this->builder_section_controller,
            array(
                'title'    => esc_html__( 'Footer Builder', 'aarambha-real-estate' ),
                'priority' => 10,
                'panel'    => $this->panel,
            )
        );

        $wp_customize->add_section(
            $this->footer_top,
            array(
                'title'    => esc_html__( 'Top Row', 'aarambha-real-estate' ),
                'priority' => 20,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_main,
            array(
                'title'    => esc_html__( 'Main Row', 'aarambha-real-estate' ),
                'priority' => 25,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_bottom,
            array(
                'title'    => esc_html__( 'Bottom Row', 'aarambha-real-estate' ),
                'priority' => 25,
                'panel'    => $this->panel,
            )
        );

        $wp_customize->add_section(
            $this->footer_copyright,
            array(
                'title'    => esc_html__( 'Copyright', 'aarambha-real-estate' ),
                'priority' => 35,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_social,
            array(
                'title'    => esc_html__( 'Social Icons', 'aarambha-real-estate' ),
                'priority' => 55,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_button,
            array(
                'title'    => esc_html__( 'Button', 'aarambha-real-estate' ),
                'priority' => 55,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_html,
            array(
                'title'    => esc_html__( 'HTML', 'aarambha-real-estate' ),
                'priority' => 55,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_menu,
            array(
                'title'    => esc_html__( 'Footer Menu', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_sidebar_1,
            array(
                'title'    => esc_html__( 'Footer Sidebar 1', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_sidebar_2,
            array(
                'title'    => esc_html__( 'Footer Sidebar 2', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_sidebar_3,
            array(
                'title'    => esc_html__( 'Footer Sidebar 3', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_sidebar_4,
            array(
                'title'    => esc_html__( 'Footer Sidebar 4', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_sidebar_5,
            array(
                'title'    => esc_html__( 'Footer Sidebar 5', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            $this->footer_sidebar_6,
            array(
                'title'    => esc_html__( 'Footer Sidebar 6', 'aarambha-real-estate' ),
                'priority' => 56,
                'panel'    => $this->panel,
            )
        );
        $wp_customize->add_section(
            'aarambha_real_estate_footer_builder_back_to_top_section',
            array(
                'title'    => esc_html__( 'Scroll to Top', 'aarambha-real-estate' ),
                'priority' => 65,
                'panel'    => $this->panel,
            )
        );

        /**
         * Builder control and setting
         */
        $wp_customize->add_setting(
            $this->builder_section_controller,
            array(
                'default'           => $footer_defaults[ $this->builder_section_controller ],
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

        // Footer Builder Options
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Top_Row_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Main_Row_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Bottom_Row_Fields.php';

        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Copyright_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Social_Icons_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Button_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Menu_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Html_Fields.php';

        /* Footer Sidebar */
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Sidebar_1_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Sidebar_2_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Sidebar_3_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Sidebar_4_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Sidebar_5_Fields.php';
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Sidebar_6_Fields.php';

        // Back to top
        require AARAMBHA_REAL_ESTATE_DIV  . 'inc/customizer/builder/footer/options/Aarambha_Real_Estate_Customize_Footer_Back_To_Top_Fields.php';
    }

	/**
	 *Column Element
	 *
	 * @param $column_elements
	 */
	public function column_elements( $column_elements) {
		foreach ( $column_elements as $element ) {
			$id     = $element['id'];
			if ( file_exists( trailingslashit( get_template_directory() ) . 'template-parts/footer/' . esc_html( $id ). '.php' ) ) {
				get_template_part( 'template-parts/footer/' . esc_html( $id ) );
			} else {
				echo esc_html__( 'Create New File ', 'aarambha-real-estate' ) . 'template-parts/footer/' . esc_html( $id ) . '.php';
			}
		}
	}

    /**
     * Callback Function For aarambha_real_estate_action_footer
     * Display Header Content
     *
     * @return void
     */
    public function aarambha_real_estate_footer_display() {

        $builder = $this->get_builder();

        if ( isset( $builder['desktop'] ) && ! empty( $builder['desktop'] ) ) {

            $footer_builder_data    = [];
            $active_sidebar         = [];
            $footer_builder         = $builder['desktop'];

            foreach ( $footer_builder as $key => $single_row ) {

                if ( ! empty( $single_row ) ) {

                    foreach ( $single_row as $col_key => $columns ) {

                        if ( ! empty( $columns ) ) {

                            $footer_builder_data[$key][$col_key]    = $columns;
                            $active_sidebar[]                       = $columns[0]['id'];
                        }

                    }

                }

            }
            if ( ! empty( $footer_builder_data ) ) {

                $this->footer_content( $footer_builder_data );
            }
            // Load sidebar template parts
            self::get_elements($active_sidebar);
        }

    }

    /**
     * Display Desktop Header Content
     *
     * @param $footer_builder
     * @return void
     */
    public function footer_content( $footer_builder ) {

        ?>
        <div id="desktop-footer" class="desktop-footer-wrap" data-device="desktop">
            <?php
            if ( isset( $footer_builder['top'] ) ) {
                $top_elements       = $footer_builder['top'];
                $top_elements_count = count( $top_elements );
                $top_col_per_row    = [
                    'desktop'           => $top_elements_count,
                    'tablet'            => $top_elements_count <= 2 ? $top_elements_count : 2,
                    'mobile'            => 1
                ];
                ?>
				<div class="d-flex align-items-center top-footer">
                    <div class="container">
						<div class="row columns"<?php Aarambha_Real_Estate_Helper::get_data_columns( $top_col_per_row );?>>
							<?php if ( array_key_exists('col-0', $top_elements ) ) :
								// Left Column Content Justify
								$top_row_left_col = get_theme_mod(
									'aarambha_real_estate_footer_top_row_left_col_content_justify',
									[
										'desktop'   => 'start',
										'tablet'    => 'start',
										'mobile'    => 'start'
									]
								);
								$top_lef_col_class     = ['column d-flex flex-wrap'];
								$top_lef_col_class[]   = aarambha_real_estate_get_classes($top_row_left_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $top_lef_col_class) );?>">
									<?php $this->column_elements( $top_elements['col-0'] ); ?>
								</div>
							<?php endif; ?>
							<?php if ( array_key_exists('col-1', $top_elements ) ) :
								// Center Column Content Justify
								$top_row_center_col = get_theme_mod(
									'aarambha_real_estate_footer_top_row_center_col_content_justify',
									[
										'desktop'   => 'center',
										'tablet'    => 'center',
										'mobile'    => 'center'
									]
								);
								$top_center_col_class      = ['column d-flex flex-wrap'];
								$top_center_col_class[]    = aarambha_real_estate_get_classes($top_row_center_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $top_center_col_class) );?>">
									<?php $this->column_elements( $top_elements['col-1'] ); ?>
								</div>
							<?php endif; ?>
							<?php if ( array_key_exists('col-2', $top_elements ) ) :
								// Right Column Content Justify
								$top_row_right_col = get_theme_mod(
									'aarambha_real_estate_footer_top_row_right_col_content_justify',
									[
										'desktop'   => 'end',
										'tablet'    => 'end',
										'mobile'    => 'end'
									]
								);
								$top_right_col_class   = ['column d-flex flex-wrap'];
								$top_right_col_class[] = aarambha_real_estate_get_classes($top_row_right_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $top_right_col_class) );?>">
									<?php $this->column_elements( $top_elements['col-2'] ); ?>
								</div>
							<?php endif; ?>
						</div>
                    </div>
                </div><!-- .top-footer -->
                <?php

            }
            if ( isset( $footer_builder['main'] ) ) {
                $main_elements       = $footer_builder['main'];
                $main_elements_count = count( $main_elements );
                $main_col_per_row    = [
                    'desktop'           => $main_elements_count,
                    'tablet'            => $main_elements_count <= 2 ? $main_elements_count : 2,
                    'mobile'            => 1
                ];
				?>
				<div class="d-flex align-items-center main-footer">
                    <div class="container">
						<div class="row columns"<?php Aarambha_Real_Estate_Helper::get_data_columns( $main_col_per_row );?>>
							<?php if ( array_key_exists('col-0', $main_elements ) ) :
								// Left Column Content Justify
								$main_row_left_col = get_theme_mod(
									'aarambha_real_estate_footer_main_row_left_col_content_justify',
									[
										'desktop'   => 'start',
										'tablet'    => 'start',
										'mobile'    => 'start'
									]
								);
								$main_lef_col_class     = ['column d-flex flex-wrap'];
								$main_lef_col_class[]   = aarambha_real_estate_get_classes($main_row_left_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $main_lef_col_class) );?>">
									<?php $this->column_elements( $main_elements['col-0'] ); ?>
								</div>
							<?php endif; ?>
							<?php if ( array_key_exists('col-1', $main_elements ) ) :
								// Center Column Content Justify
								$main_row_center_col = get_theme_mod(
									'aarambha_real_estate_footer_main_row_center_col_content_justify',
									[
										'desktop'   => 'center',
										'tablet'    => 'center',
										'mobile'    => 'center'
									]
								);
								$main_center_col_class      = ['column d-flex flex-wrap'];
								$main_center_col_class[]    = aarambha_real_estate_get_classes($main_row_center_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $main_center_col_class) );?>">
									<?php $this->column_elements( $main_elements['col-1'] ); ?>
								</div>
							<?php endif; ?>
							<?php if ( array_key_exists('col-2', $main_elements ) ) :
								// Right Column Content Justify
								$main_row_right_col = get_theme_mod(
									'aarambha_real_estate_footer_main_row_right_col_content_justify',
									[
										'desktop'   => 'end',
										'tablet'    => 'end',
										'mobile'    => 'end'
									]
								);
								$main_right_col_class   = ['column d-flex flex-wrap'];
								$main_right_col_class[] = aarambha_real_estate_get_classes($main_row_right_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $main_right_col_class) );?>">
									<?php $this->column_elements( $main_elements['col-2'] ); ?>
								</div>
							<?php endif; ?>
						</div>
                    </div>
                </div><!-- .main-footer -->
                <?php

            }
            if ( isset( $footer_builder['bottom'] ) ) {
                $bottom_elements       = $footer_builder['bottom'];
                $bottom_elements_count = count( $bottom_elements );
                $bottom_col_per_row    = [
                    'desktop'           => $bottom_elements_count,
                    'tablet'            => $bottom_elements_count <= 2 ? $bottom_elements_count : 2,
                    'mobile'            => 1
                ];
				?>
				<div class="d-flex align-items-center bottom-footer">
                    <div class="container">
                        <div class="row columns"<?php Aarambha_Real_Estate_Helper::get_data_columns( $bottom_col_per_row );?>>
							<?php if ( array_key_exists('col-0', $bottom_elements ) ) :
								// Left Column Content Justify
								$bottom_row_left_col = get_theme_mod(
									'aarambha_real_estate_footer_bottom_row_left_col_content_justify',
									[
										'desktop'   => 'start',
										'tablet'    => 'start',
										'mobile'    => 'center'
									]
								);
								$bottom_lef_col_class     = ['column d-flex flex-wrap'];
								$bottom_lef_col_class[]   = aarambha_real_estate_get_classes($bottom_row_left_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $bottom_lef_col_class) );?>">
									<?php $this->column_elements( $bottom_elements['col-0'] ); ?>
								</div>
							<?php endif; ?>
							<?php if ( array_key_exists('col-1', $bottom_elements ) ) :
								// Center Column Content Justify
								$bottom_row_center_col = get_theme_mod(
									'aarambha_real_estate_footer_bottom_row_center_col_content_justify',
									[
										'desktop'   => 'center',
										'tablet'    => 'center',
										'mobile'    => 'center'
									]
								);
								$bottom_center_col_class      = ['column d-flex flex-wrap'];
								$bottom_center_col_class[]    = aarambha_real_estate_get_classes($bottom_row_center_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $bottom_center_col_class) );?>">
									<?php $this->column_elements( $bottom_elements['col-1'] ); ?>
								</div>
							<?php endif; ?>
							<?php if ( array_key_exists('col-2', $bottom_elements ) ) :
								// Right Column Content Justify
								$bottom_row_right_col = get_theme_mod(
									'aarambha_real_estate_footer_bottom_row_right_col_content_justify',
									[
										'desktop'   => 'end',
										'tablet'    => 'end',
										'mobile'    => 'center'
									]
								);
								$bottom_right_col_class   = ['column d-flex flex-wrap'];
								$bottom_right_col_class[] = aarambha_real_estate_get_classes($bottom_row_right_col,'justify-content-');
								?>
								<div class="<?php echo esc_attr( implode( ' ', $bottom_right_col_class) );?>">
									<?php $this->column_elements( $bottom_elements['col-2'] ); ?>
								</div>
							<?php endif; ?>
                        </div>
                    </div>
                </div><!-- .bottom-footer -->
                <?php
            }
            ?>
        </div><!-- #desktop-footer -->
        <?php

    }


    /**
     * Footer get_elements only for the sidebar so that we can see sidebar in customizer
     *
     * @param $sidebar_elements array
     * @return void
     */
    public function get_elements( $sidebar_elements ) {

        if ( is_array( $sidebar_elements ) ) {

            $sidebar_array = [
                'footer_sidebar_1',
                'footer_sidebar_2',
                'footer_sidebar_3',
                'footer_sidebar_4',
                'footer_sidebar_5',
                'footer_sidebar_6'
            ];
            $sidebar_elements = array_diff( $sidebar_array, $sidebar_elements);
            echo '<div class="container d-none">';
            foreach ( $sidebar_elements as $key ) {
                if ( file_exists( trailingslashit( get_template_directory() ) . 'template-parts/footer/' . esc_html($key) . '.php' ) ) {
                    get_template_part( 'template-parts/footer/' . esc_html($key) );
                }
            }
            echo '</div><!-- .d-none -->';
        }
    }
}

/**
 * Create Instance for Aarambha_Real_Estate_Customizer_Footer_Builder
 *
 * @param
 * @return object
 */
if ( ! function_exists( 'aarambha_real_estate_customizer_footer_builder' ) ) {

    function aarambha_real_estate_customizer_footer_builder() {

        return Aarambha_Real_Estate_Customizer_Footer_Builder::instance();
    }

    aarambha_real_estate_customizer_footer_builder()->run();
}

/**
 * Get footer builder default options
 *
 * @param null
 * @return mixed aarambha_real_estate_theme_options
 *
 */
if ( ! function_exists( 'aarambha_real_estate_get_footer_builder_options' ) ) :
    function aarambha_real_estate_get_footer_builder_options( $key = '' ) {
        if ( ! empty( $key ) ) {
            $footer_default_values  = Aarambha_Real_Estate_Customizer_Footer_Builder()->footer_defaults();
            $theme_mod_values       = get_theme_mod( $key, isset( $footer_default_values[ $key ] ) ? $footer_default_values[ $key ] : '' );
            return apply_filters( 'aarambha_real_estate_' . $key, $theme_mod_values );
        }
        return false;
    }
endif;



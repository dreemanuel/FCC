<?php
/**
 * Real Estate Realtor Theme Customizer
 * @package Real Estate Realtor
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function real_estate_realtor_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'real_estate_realtor_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','real-estate-realtor' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('real_estate_realtor_site_title_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_site_title_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Title','real-estate-realtor'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('real_estate_realtor_site_title_font_size',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','real-estate-realtor' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('real_estate_realtor_site_tagline_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_site_tagline_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Tagline','real-estate-realtor'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('real_estate_realtor_site_tagline_font_size',array(
		'default'=> 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','real-estate-realtor' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('real_estate_realtor_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','real-estate-realtor'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('real_estate_realtor_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','real-estate-realtor'),
        'description' => __('Here you can add the background skin along with the background image.','real-estate-realtor'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','real-estate-realtor'),
            'Without Background' => __('Without Background Skin','real-estate-realtor'),
        ),
	) );

	//add home page setting pannel
	$wp_customize->add_panel( 'real_estate_realtor_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'real-estate-realtor' ),
	    'description' => __( 'Description of what this panel does.', 'real-estate-realtor' ),
	) );

	$real_estate_realtor_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One', 
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower', 
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit', 
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two', 
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda', 
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli', 
		'Marck Script'           => 'Marck Script', 
		'Noto Serif'             => 'Noto Serif', 
		'Open Sans'              => 'Open Sans', 
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen', 
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display', 
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik', 
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo', 
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two', 
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn', 
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('real_estate_realtor_typography', array(
		'title'    => __('Typography', 'real-estate-realtor'),
		'panel'    => 'real_estate_realtor_panel_id',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('real_estate_realtor_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_paragraph_color', array(
		'label'    => __('Paragraph Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control(	'real_estate_realtor_paragraph_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('Paragraph Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	$wp_customize->add_setting('real_estate_realtor_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('real_estate_realtor_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_atag_color', array(
		'label'    => __('"a" Tag Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control(	'real_estate_realtor_atag_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('"a" Tag Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('real_estate_realtor_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_li_color', array(
		'label'    => __('"li" Tag Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control(	'real_estate_realtor_li_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('"li" Tag Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('real_estate_realtor_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_h1_color', array(
		'label'    => __('H1 Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control('real_estate_realtor_h1_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('H1 Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('real_estate_realtor_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_h1_font_size', array(
		'label'   => __('H1 Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('real_estate_realtor_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_h2_color', array(
		'label'    => __('h2 Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control(
	'real_estate_realtor_h2_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('h2 Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('real_estate_realtor_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_h2_font_size', array(
		'label'   => __('H2 Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('real_estate_realtor_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_h3_color', array(
		'label'    => __('H3 Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control(
	'real_estate_realtor_h3_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('H3 Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('real_estate_realtor_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_h3_font_size', array(
		'label'   => __('H3 Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('real_estate_realtor_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_h4_color', array(
		'label'    => __('H4 Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control('real_estate_realtor_h4_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('H4 Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('real_estate_realtor_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_h4_font_size', array(
		'label'   => __('H4 Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('real_estate_realtor_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_h5_color', array(
		'label'    => __('H5 Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control('real_estate_realtor_h5_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('H5 Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('real_estate_realtor_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_h5_font_size', array(
		'label'   => __('H5 Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('real_estate_realtor_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_h6_color', array(
		'label'    => __('H6 Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_typography',
		'settings' => 'real_estate_realtor_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('real_estate_realtor_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	));
	$wp_customize->add_control('real_estate_realtor_h6_font_family', array(
		'section' => 'real_estate_realtor_typography',
		'label'   => __('H6 Fonts', 'real-estate-realtor'),
		'type'    => 'select',
		'choices' => $real_estate_realtor_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('real_estate_realtor_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('real_estate_realtor_h6_font_size', array(
		'label'   => __('H6 Font Size', 'real-estate-realtor'),
		'section' => 'real_estate_realtor_typography',
		'setting' => 'real_estate_realtor_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'real_estate_realtor_option', array(
    	'title'      => __( 'Layout Settings', 'real-estate-realtor' ),
    	'panel'    => 'real_estate_realtor_panel_id',
	) );

	$wp_customize->add_setting('real_estate_realtor_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','real-estate-realtor'),
       'section' => 'real_estate_realtor_option'
    ));

    $wp_customize->add_setting('real_estate_realtor_preloader_type',array(
        'default' => 'First Preloader Type',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Types','real-estate-realtor'),
        'section' => 'real_estate_realtor_option',
        'choices' => array(
            'First Preloader Type' => __('First Preloader Type','real-estate-realtor'),
            'Second Preloader Type' => __('Second Preloader Type','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting('real_estate_realtor_preloader_bg_color_option', array(
		'default'           => '#384260',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_option',
	)));

	$wp_customize->add_setting('real_estate_realtor_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_option',
	)));

	$wp_customize->add_setting('real_estate_realtor_width_layout_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_width_layout_options',array(
        'type' => 'radio',
        'label' => __('Container Box','real-estate-realtor'),
        'description' => __('Here you can change the Width layout. ','real-estate-realtor'),
        'section' => 'real_estate_realtor_option',
        'choices' => array(
            'Default' => __('Default','real-estate-realtor'),
            'Container Layout' => __('Container Layout','real-estate-realtor'),
            'Box Layout' => __('Box Layout','real-estate-realtor'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('real_estate_realtor_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	) );
	$wp_customize->add_control('real_estate_realtor_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','real-estate-realtor'),
        'section' => 'real_estate_realtor_option',
        'choices' => array(
            'One Column' => __('One Column','real-estate-realtor'),
            'Three Columns' => __('Three Columns','real-estate-realtor'),
            'Four Columns' => __('Four Columns','real-estate-realtor'),
            'Grid Layout' => __('Grid Layout','real-estate-realtor'),
            'Left Sidebar' => __('Left Sidebar','real-estate-realtor'),
            'Right Sidebar' => __('Right Sidebar','real-estate-realtor')
        ),
	)   );

	$wp_customize->add_setting('real_estate_realtor_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','real-estate-realtor'),
        'section' => 'real_estate_realtor_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','real-estate-realtor'),
            'Sidebar 1/4' => __('Sidebar 1/4','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting( 'real_estate_realtor_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize,  'real_estate_realtor_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	)) );

	$wp_customize->add_setting( 'real_estate_realtor_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize,  'real_estate_realtor_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','real-estate-realtor' ),
		'section' => 'real_estate_realtor_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Global Color
	$wp_customize->add_section('real_estate_realtor_global_color', array(
		'title'    => __('Theme Color Option', 'real-estate-realtor'),
		'panel'    => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting('real_estate_realtor_first_color', array(
		'default'           => '#fcb332',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_first_color', array(
		'label'    => __('Highlight Color 1', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_global_color',
		'settings' => 'real_estate_realtor_first_color',
	)));

	$wp_customize->add_setting('real_estate_realtor_second_color', array(
		'default'           => '#384260',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_second_color', array(
		'label'    => __('Highlight Color 2', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_global_color',
		'settings' => 'real_estate_realtor_second_color',
	)));

	//Blog Post Settings
	$wp_customize->add_section('real_estate_realtor_post_settings', array(
		'title'    => __('Post General Settings', 'real-estate-realtor'),
		'panel'    => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting('real_estate_realtor_post_layouts',array(
        'default' => 'Layout 1',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Image_Radio_Control($wp_customize, 'real_estate_realtor_post_layouts', array(
        'type' => 'select',
        'label' => __('Post Layouts','real-estate-realtor'),
        'description' => __('Here you can change the 3 different layouts of post','real-estate-realtor'),
        'section' => 'real_estate_realtor_post_settings',
        'choices' => array(
            'Layout 1' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Layout 2' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Layout 3' => esc_url(get_template_directory_uri()).'/images/layout3.png',
    ))));

	$wp_customize->add_setting('real_estate_realtor_metafields_date',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','real-estate-realtor'),
       'section' => 'real_estate_realtor_post_settings'
    ));

	$wp_customize->add_setting('real_estate_realtor_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_post_date_icon',array(
		'label'	=> __('Post Date Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('real_estate_realtor_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','real-estate-realtor'),
       'section' => 'real_estate_realtor_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_post_author_icon',array(
		'label'	=> __('Post Author Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('real_estate_realtor_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','real-estate-realtor'),
       'section' => 'real_estate_realtor_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('real_estate_realtor_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','real-estate-realtor'),
       'section' => 'real_estate_realtor_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_post_time_icon',array(
		'label'	=> __('Post Time Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control('real_estate_realtor_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','real-estate-realtor'),
       'choices' => array(
            'Image' => __('Image','real-estate-realtor'),
            'Color' => __('Color','real-estate-realtor'),
            'None' => __('None','real-estate-realtor'),
        ),
      	'section'	=> 'real_estate_realtor_post_settings',
    ));

    $wp_customize->add_setting('real_estate_realtor_post_featured_color', array(
		'default'           => '#5c727d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_post_featured_color', array(
		'label'    => __('Post Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_post_settings',
		'settings' => 'real_estate_realtor_post_featured_color',
		'active_callback' => 'real_estate_realtor_post_color_enabled'
	)));

	$wp_customize->add_setting( 'real_estate_realtor_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'real_estate_realtor_show_post_color'
	)));

	$wp_customize->add_setting( 'real_estate_realtor_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'real_estate_realtor_show_post_color'
	)));

	$wp_customize->add_setting('real_estate_realtor_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control('real_estate_realtor_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','real-estate-realtor'),
       'choices' => array(
            'Default' => __('Default','real-estate-realtor'),
            'Custom' => __('Custom','real-estate-realtor'),
        ),
      	'section'	=> 'real_estate_realtor_post_settings',
      	'active_callback' => 'real_estate_realtor_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'real_estate_realtor_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'real_estate_realtor_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'real_estate_realtor_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'real_estate_realtor_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'real_estate_realtor_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'real_estate_realtor_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_post_settings',
		'type'        => 'number',
		'settings'    => 'real_estate_realtor_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('real_estate_realtor_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','real-estate-realtor'),
        'section' => 'real_estate_realtor_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','real-estate-realtor'),
            'Content' => __('Content','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting( 'real_estate_realtor_post_discription_suffix', array(
		'default'   => __('[...]','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'real_estate_realtor_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_post_settings',
		'type'        => 'text',
		'settings'    => 'real_estate_realtor_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'real_estate_realtor_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'real_estate_realtor_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','real-estate-realtor'),
		'type'        => 'text',
		'settings'    => 'real_estate_realtor_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('real_estate_realtor_button_text',array(
		'default'=> __('View More','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_button_text',array(
		'label'	=> __('Add Button Text','real-estate-realtor'),
		'section'=> 'real_estate_realtor_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_button_icon',array(
		'label'	=> __('Button Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'real_estate_realtor_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_post_button_border_radius',array(
		'default' => 6,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('real_estate_realtor_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','real-estate-realtor'),
       'section' => 'real_estate_realtor_post_settings'
    ));

    $wp_customize->add_setting( 'real_estate_realtor_post_pagination_position', array(
        'default'			=>  'Bottom', 
        'sanitize_callback'	=> 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control( 'real_estate_realtor_post_pagination_position', array(
        'section' => 'real_estate_realtor_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'real-estate-realtor' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'real-estate-realtor' ),
            'Bottom' => __( 'Bottom', 'real-estate-realtor' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'real-estate-realtor' ),
    )));

	$wp_customize->add_setting( 'real_estate_realtor_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control( 'real_estate_realtor_pagination_settings', array(
        'section' => 'real_estate_realtor_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'real-estate-realtor' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'real-estate-realtor' ),
            'next-prev' => __( 'Next / Previous', 'real-estate-realtor' ),
    )));

    $wp_customize->add_setting('real_estate_realtor_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','real-estate-realtor'),
        'section' => 'real_estate_realtor_post_settings',
        'choices' => array(
            'By Block' => __('By Block','real-estate-realtor'),
            'By Without Block' => __('By Without Block','real-estate-realtor'),
        ),
	) );

    //Single Post Settings
	$wp_customize->add_section('real_estate_realtor_single_post_settings', array(
		'title'    => __('Single Post Settings', 'real-estate-realtor'),
		'panel'    => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting('real_estate_realtor_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_single_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_single_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_single_post_comment_icon',array(
		'label'	=> __('Single Post Comment Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings',
    ));

    $wp_customize->add_setting('real_estate_realtor_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings',
    ));

	$wp_customize->add_setting('real_estate_realtor_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings',
    ));

	$wp_customize->add_setting('real_estate_realtor_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	) );
	$wp_customize->add_control('real_estate_realtor_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','real-estate-realtor'),
        'section' => 'real_estate_realtor_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','real-estate-realtor'),
            'Left Sidebar' => __('Left Sidebar','real-estate-realtor'),
            'Right Sidebar' => __('Right Sidebar','real-estate-realtor')
        ),
	)   );

	$wp_customize->add_setting( 'real_estate_realtor_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'real_estate_realtor_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','real-estate-realtor'),
		'type'        => 'text',
		'settings'    => 'real_estate_realtor_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'real_estate_realtor_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','real-estate-realtor' ),
		'section' => 'real_estate_realtor_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('real_estate_realtor_title_comment_form',array(
       'default' => __('Leave a Reply','real-estate-realtor'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('real_estate_realtor_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_comment_form_button_content',array(
       'default' => __('Post Comment','real-estate-realtor'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('real_estate_realtor_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

	$wp_customize->add_setting('real_estate_realtor_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','real-estate-realtor'),
       'section' => 'real_estate_realtor_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('real_estate_realtor_related_settings', array(
		'title'    => __('Related Post Settings', 'real-estate-realtor'),
		'panel'    => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting( 'real_estate_realtor_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ) );
    $wp_customize->add_control('real_estate_realtor_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','real-estate-realtor' ),
        'section' => 'real_estate_realtor_related_settings'
    ));

    $wp_customize->add_setting('real_estate_realtor_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_related_title',array(
		'label'	=> __('Add Section Title','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'real_estate_realtor_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'real_estate_realtor_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('real_estate_realtor_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','real-estate-realtor'),
        'section' => 'real_estate_realtor_related_settings',
        'choices' => array(
            'categories' => __('Categories','real-estate-realtor'),
            'tags' => __('Tags','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting( 'real_estate_realtor_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','real-estate-realtor' ),
		'section' => 'real_estate_realtor_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Top Bar Section
	$wp_customize->add_section('real_estate_realtor_topbar',array(
		'title'	=> __('Topbar','real-estate-realtor'),
		'description'	=> __('Add contact us here','real-estate-realtor'),
		'priority'	=> null,
		'panel' => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting('real_estate_realtor_menu_font_size_option',array(
		'default'=> 12,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize,'real_estate_realtor_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','real-estate-realtor'),
		'section'=> 'real_estate_realtor_topbar',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('real_estate_realtor_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize,'real_estate_realtor_menu_padding',array(
		'label'	=> __('Main Menu Padding','real-estate-realtor'),
		'section'=> 'real_estate_realtor_topbar',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('real_estate_realtor_text_tranform_menu',array(
        'default' => 'Uppercase',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control('real_estate_realtor_text_tranform_menu',array(
        'type' => 'select',
        'label' => __('Menu Text Transform','real-estate-realtor'),
        'section' => 'real_estate_realtor_topbar',
        'choices' => array(
            'Uppercase' => __('Uppercase','real-estate-realtor'),
            'Lowercase' => __('Lowercase','real-estate-realtor'),
            'Capitalize' => __('Capitalize','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting('real_estate_realtor_font_weight_option_menu',array(
        'default' => '',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control('real_estate_realtor_font_weight_option_menu',array(
        'type' => 'select',
        'label' => __('Menu Font Weight','real-estate-realtor'),
        'section' => 'real_estate_realtor_topbar',
        'choices' => array(
            'Bold' => __('Bold','real-estate-realtor'),
            'Normal' => __('Normal','real-estate-realtor'),
        ),
	) );

	//Sticky Header
	$wp_customize->add_setting( 'real_estate_realtor_sticky_header',array(
		'default'=> false,
      	'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ) );
    $wp_customize->add_control('real_estate_realtor_sticky_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Sticky Header','real-estate-realtor' ),
        'section' => 'real_estate_realtor_topbar'
    ));

    $wp_customize->add_setting( 'real_estate_realtor_sticky_header_padding', array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize,'real_estate_realtor_sticky_header_padding', array(
		'label'       => esc_html__( 'Sticky Header Padding','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_topbar',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) ));

   $wp_customize->add_setting('real_estate_realtor_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_email_icon',array(
		'label'	=> __('Email Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('real_estate_realtor_email_address',array(
		'label'	=> __('Add Email Address','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'text'
	));

   $wp_customize->add_setting('real_estate_realtor_location_icon',array(
		'default'	=> 'fas fa-map-marker-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_location_icon',array(
		'label'	=> __('Location Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_location_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_location_address',array(
		'label'	=> __('Add Location Address','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'text'
	));

   $wp_customize->add_setting('real_estate_realtor_listing_btn_icon',array(
		'default'	=> 'fas fa-home',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_listing_btn_icon',array(
		'label'	=> __('Button Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_listing_button_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_listing_button_text',array(
		'label'	=> __('Add Button Text','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_listing_button_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_realtor_listing_button_link',array(
		'label'	=> __('Add Button Link','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('real_estate_realtor_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_topbar',
		'type'		=> 'icon'
	)));

	//Social Media Section
	$wp_customize->add_section( 'real_estate_realtor_social_section' , array(
    	'title'      => __( 'Social Media Section', 'real-estate-realtor' ),
		'priority'   => null,
		'panel' => 'real_estate_realtor_panel_id'
	) );

   $wp_customize->add_setting('real_estate_realtor_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_facebook_icon',array(
		'label'	=> __('Facebook Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_facebook_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_realtor_facebook_link',array(
		'label'	=> __('Add Facebook Link','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('real_estate_realtor_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_twitter_icon',array(
		'label'	=> __('Twitter Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_twitter_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_realtor_twitter_link',array(
		'label'	=> __('Add Twitter Link','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('real_estate_realtor_linkdin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_linkdin_icon',array(
		'label'	=> __('Linkdin Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_linkdin_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_realtor_linkdin_link',array(
		'label'	=> __('Add Linkdin Link','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('real_estate_realtor_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_instagram_icon',array(
		'label'	=> __('Instagram Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_instagram_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_realtor_instagram_link',array(
		'label'	=> __('Add Instagram Link','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('real_estate_realtor_pintrest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_pintrest_icon',array(
		'label'	=> __('Pintrest Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_pintrest_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('real_estate_realtor_pintrest_link',array(
		'label'	=> __('Add Pintrest Link','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_social_section',
		'type'		=> 'url'
	));

	//Slider Section
	$wp_customize->add_section( 'real_estate_realtor_slider_section' , array(
    	'title'      => __( 'Slider Section', 'real-estate-realtor' ),
		'priority'   => null,
		'panel' => 'real_estate_realtor_panel_id'
	) );

	$wp_customize->add_setting('real_estate_realtor_slider_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_slider_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable slider','real-estate-realtor'),
       'section' => 'real_estate_realtor_slider_section',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'real_estate_realtor_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'real_estate_realtor_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'real_estate_realtor_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'real-estate-realtor' ),
			'description' => __('Slider image size (1500 x 600)','real-estate-realtor'),
			'section'  => 'real_estate_realtor_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );

	}

	$wp_customize->add_setting('real_estate_realtor_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
	));
	$wp_customize->add_control('real_estate_realtor_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','real-estate-realtor'),
		'section' => 'real_estate_realtor_slider_section'
	));

	$wp_customize->add_setting('real_estate_realtor_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
	));
	$wp_customize->add_control('real_estate_realtor_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','real-estate-realtor'),
		'section' => 'real_estate_realtor_slider_section'
	));

	$wp_customize->add_setting('real_estate_realtor_enable_slider_overlay',array(
		'default' => true,
		'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
	));
	$wp_customize->add_control('real_estate_realtor_enable_slider_overlay',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Image Overlay','real-estate-realtor'),
		'section' => 'real_estate_realtor_slider_section'
	));

 	$wp_customize->add_setting('real_estate_realtor_slider_search_box',array(
		'default' => true,
		'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
	));
	$wp_customize->add_control('real_estate_realtor_slider_search_box',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Search','real-estate-realtor'),
		'section' => 'real_estate_realtor_slider_section'
	));

    $wp_customize->add_setting('real_estate_realtor_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_slider_section',
		'settings' => 'real_estate_realtor_slider_overlay_color',
	)));

	//Opacity
	$wp_customize->add_setting('real_estate_realtor_slider_opacity',array(
		'default'              => 0.7,
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control( 'real_estate_realtor_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_slider_section',
		'type'        => 'select',
		'settings'    => 'real_estate_realtor_slider_opacity',
		'choices' => array(
			'0' =>  esc_attr('0','real-estate-realtor'),
			'0.1' =>  esc_attr('0.1','real-estate-realtor'),
			'0.2' =>  esc_attr('0.2','real-estate-realtor'),
			'0.3' =>  esc_attr('0.3','real-estate-realtor'),
			'0.4' =>  esc_attr('0.4','real-estate-realtor'),
			'0.5' =>  esc_attr('0.5','real-estate-realtor'),
			'0.6' =>  esc_attr('0.6','real-estate-realtor'),
			'0.7' =>  esc_attr('0.7','real-estate-realtor'),
			'0.8' =>  esc_attr('0.8','real-estate-realtor'),
			'0.9' =>  esc_attr('0.9','real-estate-realtor')
		),
	));

	//content layout
    $wp_customize->add_setting('real_estate_realtor_slider_content_layout',array(
    	'default' => 'Left',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_slider_content_layout',array(
        'type' => 'radio',
        'label' => __('Slider Content Layout','real-estate-realtor'),
        'section' => 'real_estate_realtor_slider_section',
        'choices' => array(
            'Center' => __('Center','real-estate-realtor'),
            'Left' => __('Left','real-estate-realtor'),
            'Right' => __('Right','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting('real_estate_realtor_option_slider_height',array(
		'default'=> __('550','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_option_slider_height',array(
		'label'	=> __('Slider Height','real-estate-realtor'),
		'section'=> 'real_estate_realtor_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_slider_content_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize,  'real_estate_realtor_slider_content_top_padding',array(
		'label'	=> __('Top Bottom Slider Content Spacing','real-estate-realtor'),
		'section'=> 'real_estate_realtor_slider_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('real_estate_realtor_slider_content_left_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize,  'real_estate_realtor_slider_content_left_padding',array(
		'label'	=> __('Left Right Slider Content Spacing','real-estate-realtor'),
		'section'=> 'real_estate_realtor_slider_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	//Slider excerpt
	$wp_customize->add_setting( 'real_estate_realtor_slider_excerpt_number', array(
		'default'              => 15,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'real_estate_realtor_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','real-estate-realtor' ),
		'section'     => 'real_estate_realtor_slider_section',
		'type'        => 'number',
		'settings'    => 'real_estate_realtor_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'real_estate_realtor_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','real-estate-realtor' ),
		'section' => 'real_estate_realtor_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Services
	$wp_customize->add_section('real_estate_realtor_popular_properties',array(
		'title'	=> __('Popular Properties Section','real-estate-realtor'),
		'description' => __('Increase the number of tab and publish the settings and then refresh the page then the properties will increase.','real-estate-realtor'),
		'panel' => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting('real_estate_realtor_properties_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('real_estate_realtor_properties_section_title',array(
		'label'	=> esc_html__('Section Heading','real-estate-realtor'),		
		'section'=> 'real_estate_realtor_popular_properties',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_properties_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('real_estate_realtor_properties_section_text',array(
		'label'	=> esc_html__('Section Text','real-estate-realtor'),		
		'section'=> 'real_estate_realtor_popular_properties',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_properties_counter',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('real_estate_realtor_properties_counter',array(
		'label'	=> esc_html__('No of Tabs to show','real-estate-realtor'),
		'section'=> 'real_estate_realtor_popular_properties',
		'type'=> 'number'
	));	

	$popular_properties = get_theme_mod('real_estate_realtor_properties_counter','');

    for ( $j = 1; $j <= $popular_properties; $j++ ) {

		$wp_customize->add_setting('real_estate_realtor_properties_tab_text'.$j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('real_estate_realtor_properties_tab_text'.$j,array(
			'label'	=> esc_html__('Properties Tab Text ','real-estate-realtor').$j,
			'section'=> 'real_estate_realtor_popular_properties',
			'type'=> 'text'
		));

		$categories = get_categories();
			$cat_posts = array();
				$i = 0;
				$cat_posts[]='Select';
			foreach($categories as $category){
				if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('real_estate_realtor_popular_properties_category'.$j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
		));
		$wp_customize->add_control('real_estate_realtor_popular_properties_category'.$j,array(
			'type'    => 'select',
			'choices' => $cat_posts,
			'label' => __('Select properties category ','real-estate-realtor').$j,
			'section' => 'real_estate_realtor_popular_properties',
		));
	}

	//footer text
	$wp_customize->add_section('real_estate_realtor_footer_section',array(
		'title'	=> __('Footer Text','real-estate-realtor'),
		'panel' => 'real_estate_realtor_panel_id'
	));

	$wp_customize->add_setting('real_estate_realtor_footer_bg_color', array(
		'default'           => '#121212',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'real_estate_realtor_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'real-estate-realtor'),
		'section'  => 'real_estate_realtor_footer_section',
	)));

	$wp_customize->add_setting('real_estate_realtor_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'real_estate_realtor_footer_bg_image',array(
        'label' => __('Footer Background Image','real-estate-realtor'),
        'section' => 'real_estate_realtor_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
        'default'           => 4,
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
    ));
    $wp_customize->add_control('footer_widget_areas',array(
        'type'        => 'radio',
        'label'       => __('Footer widget area', 'real-estate-realtor'),
        'section'     => 'real_estate_realtor_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'real-estate-realtor'),
        'choices' => array(
            '1'     => __('One', 'real-estate-realtor'),
            '2'     => __('Two', 'real-estate-realtor'),
            '3'     => __('Three', 'real-estate-realtor'),
            '4'     => __('Four', 'real-estate-realtor')
        ),
    ));

    $wp_customize->add_setting('real_estate_realtor_hide_show_scroll',array(
        'default' => true,
        'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
	));
	$wp_customize->add_control('real_estate_realtor_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','real-estate-realtor'),
      	'section' => 'real_estate_realtor_footer_section',
	));

	$wp_customize->add_setting('real_estate_realtor_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Real_Estate_Realtor_Icon_Changer(
        $wp_customize,'real_estate_realtor_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','real-estate-realtor'),
		'transport' => 'refresh',
		'section'	=> 'real_estate_realtor_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('real_estate_realtor_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','real-estate-realtor'),
		'section'=> 'real_estate_realtor_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('real_estate_realtor_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','real-estate-realtor'),
        'section' => 'real_estate_realtor_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','real-estate-realtor'),
            'Right align' => __('Right Align','real-estate-realtor'),
            'Center align' => __('Center Align','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting( 'real_estate_realtor_top_bottom_scroll_padding',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));
	
	$wp_customize->add_setting('real_estate_realtor_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('real_estate_realtor_footer_copy',array(
		'label'	=> __('Copyright Text','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','real-estate-realtor'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','real-estate-realtor'),
        'section' => 'real_estate_realtor_footer_section',
        'choices' => array(
            'left' => __('Left Align','real-estate-realtor'),
            'right' => __('Right Align','real-estate-realtor'),
            'center' => __('Center Align','real-estate-realtor'),
        ),
	) );

	$wp_customize->add_setting('real_estate_realtor_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','real-estate-realtor' ),
		'section'=> 'real_estate_realtor_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Responsive Media Settings
	$wp_customize->add_section('real_estate_realtor_responsive_media',array(
		'title'	=> __('Responsive Media','real-estate-realtor'),
		'panel' => 'real_estate_realtor_panel_id',
	));

	$wp_customize->add_setting('real_estate_realtor_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_post_time',array(
       'type' => 'checkbox',
       'label' => __('Display Post Time','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

	$wp_customize->add_setting('real_estate_realtor_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_fixed_header',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_fixed_header',array(
       'type' => 'checkbox',
       'label' => __('Display Sticky Header','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    $wp_customize->add_setting('real_estate_realtor_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','real-estate-realtor'),
       'section' => 'real_estate_realtor_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('real_estate_realtor_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','real-estate-realtor'),
		'panel' => 'real_estate_realtor_panel_id',
	));	

	$wp_customize->add_setting('real_estate_realtor_page_not_found_heading',array(
		'default'=> __('404 Not Found','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_page_not_found_heading',array(
		'label'	=> __('404 Heading','real-estate-realtor'),
		'section'=> 'real_estate_realtor_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_page_not_found_text',array(
		'label'	=> __('404 Content','real-estate-realtor'),
		'section'=> 'real_estate_realtor_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_page_not_found_button',array(
		'default'=>  __('Back to Home Page','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_page_not_found_button',array(
		'label'	=> __('404 Button','real-estate-realtor'),
		'section'=> 'real_estate_realtor_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_no_search_result_heading',array(
		'default'=> __('Nothing Found','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','real-estate-realtor'),
		'description'=>__('The search page heading display when no results are found.','real-estate-realtor'),
		'section'=> 'real_estate_realtor_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('real_estate_realtor_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','real-estate-realtor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('real_estate_realtor_no_search_result_text',array(
		'label'	=> __('No Search Results Text','real-estate-realtor'),
		'description'=>__('The search page text display when no results are found.','real-estate-realtor'),
		'section'=> 'real_estate_realtor_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'real_estate_realtor_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'real-estate-realtor' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','real-estate-realtor'),
		'priority'   => null,
		'panel' => 'real_estate_realtor_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'real_estate_realtor_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'real_estate_realtor_per_columns', array(
		'label'    => __( 'Product per columns', 'real-estate-realtor' ),
		'section'  => 'real_estate_realtor_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('real_estate_realtor_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('real_estate_realtor_product_per_page',array(
		'label'	=> __('Product per page','real-estate-realtor'),
		'section'	=> 'real_estate_realtor_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('real_estate_realtor_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','real-estate-realtor'),
       'section' => 'real_estate_realtor_woocommerce_section',
    ));

    $wp_customize->add_setting('real_estate_realtor_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','real-estate-realtor'),
       'section' => 'real_estate_realtor_woocommerce_section',
    ));

    $wp_customize->add_setting('real_estate_realtor_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','real-estate-realtor'),
       'section' => 'real_estate_realtor_woocommerce_section',
    ));

    $wp_customize->add_setting( 'real_estate_realtor_woo_product_sale_border_radius',array(
		'default' => 6,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','real-estate-realtor'),
        'section'  => 'real_estate_realtor_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('real_estate_realtor_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','real-estate-realtor'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'real_estate_realtor_woocommerce_section',
	)));

    $wp_customize->add_setting('real_estate_realtor_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','real-estate-realtor'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'real_estate_realtor_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('real_estate_realtor_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','real-estate-realtor'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'real_estate_realtor_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('real_estate_realtor_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'real_estate_realtor_sanitize_choices'
	));
	$wp_customize->add_control('real_estate_realtor_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','real-estate-realtor'),
        'section' => 'real_estate_realtor_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','real-estate-realtor'),
            'Left' => __('Left','real-estate-realtor'),
        ),
	));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_button_border_radius',array(
		'default' => 6,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

    $wp_customize->add_setting('real_estate_realtor_woocommerce_product_border_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_checkbox'
    ));
    $wp_customize->add_control('real_estate_realtor_woocommerce_product_border_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','real-estate-realtor'),
       'section' => 'real_estate_realtor_woocommerce_section',
    ));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_product_padding_top',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_product_padding_right',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_product_border_radius',array(
		'default' => 3,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'real_estate_realtor_woocommerce_product_box_shadow',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'real_estate_realtor_sanitize_integer'
	));
	$wp_customize->add_control( new Real_Estate_Realtor_Custom_Control( $wp_customize, 'real_estate_realtor_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','real-estate-realtor' ),
		'section' => 'real_estate_realtor_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('real_estate_realtor_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'real_estate_realtor_sanitize_choices'
    ));
    $wp_customize->add_control('real_estate_realtor_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','real-estate-realtor'),
       'choices' => array(
            'Yes' => __('Yes','real-estate-realtor'),
            'No' => __('No','real-estate-realtor'),
        ),
       'section' => 'real_estate_realtor_woocommerce_section',
    ));
	
}
add_action( 'customize_register', 'real_estate_realtor_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Real_Estate_Realtor_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Real_Estate_Realtor_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Real_Estate_Realtor_Customize_Section_Pro(
				$manager,
				'real_estate_realtor_example_1',
				array(
					'title'   =>  esc_html__( 'Real Estate Realtor Pro', 'real-estate-realtor' ),
					'pro_text' => esc_html__( 'Go Pro', 'real-estate-realtor' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/real-estate-realtor-wordpress-theme/' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'real-estate-realtor-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'real-estate-realtor-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function real_estate_realtor_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'real-estate-realtor'),
	        '2'     => __('Two', 'real-estate-realtor'),
	        '3'     => __('Three', 'real-estate-realtor'),
	        '4'     => __('Four', 'real-estate-realtor')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Real_Estate_Realtor_Customize::get_instance();
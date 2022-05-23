<?php
/**
 * Aarambha Real Estate Theme Customizer Front Page Blog Posts Sections settings
 *
 * @package Aarambha_Real_Estate
 */

class Aarambha_Real_Estate_Customize_Front_Page_News_Blog_Fields extends Aarambha_Real_Estate_Customize_Base_Field {

    public function init() {
        $this->args = [
			// Grouping Settings
			'aarambha_real_estate_front_page_news_blog_group_settings' => [
				'type'              => 'group',
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 1,
				'choices'           => [
					'normal'            => array(
						'tab-title'     => esc_html__( 'General', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_front_page_news_blog_section_heading',
                            'aarambha_real_estate_front_page_news_blog_section_sub_heading',
							'aarambha_real_estate_front_page_news_blog_posts_by_cat',
							'aarambha_real_estate_front_page_news_blog_posts_limit',
							'aarambha_real_estate_front_page_news_blog_post_elements',
                            'aarambha_real_estate_front_page_news_blog_view_all_btn',
                            'aarambha_real_estate_front_page_news_blog_view_all_btn_link'
						)
					),
					'hover'         => array(
						'tab-title'     => esc_html__( 'Style', 'aarambha-real-estate' ),
						'controls'      => array(
							'aarambha_real_estate_front_page_news_blog_heading_one',
							'aarambha_real_estate_front_page_news_blog_section_background',
							'aarambha_real_estate_front_page_news_blog_section_background_overlay'
						)
					)
				]
			],
			// Heading
			'aarambha_real_estate_front_page_news_blog_section_heading' => [
				'type'              => 'text',
				'default'           => esc_html__( 'latest news and blog', 'aarambha-real-estate' ),
				'sanitize_callback' => 'sanitize_text_field',
				'label'             => esc_html__( 'Title', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 5,
			],
            // Sub Title
            'aarambha_real_estate_front_page_news_blog_section_sub_heading' => [
                'type'              => 'textarea',
                'default'           => '',
                'sanitize_callback' => 'wp_kses_post',
                'label'             => esc_html__( 'Sub Title', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_news_blog_section',
                'priority'          => 5,
            ],
			// Post By Category
			'aarambha_real_estate_front_page_news_blog_posts_by_cat' => [
				'type'              => 'select',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_choices' ],
				'label'             => esc_html__( 'Posts by Category', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set post query to load with specific category. It will load the latest post by default.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 10,
				'choices'           => Aarambha_Real_Estate_Helper::get_terms('category' ),
			],
			// Number of Slides
			'aarambha_real_estate_front_page_news_blog_posts_limit' => [
				'type'              => 'range',
				'default'           => ['desktop' => 3 ],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_range' ],
				'label'             => esc_html__( 'Posts Limit', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 10,
				'units'             => [],
				'input_attrs'       => [
					'min'               => 1,
					'step'              => 1,
					'max'               => 20
				]
			],
			// Posts Elements
			'aarambha_real_estate_front_page_news_blog_post_elements' => [
				'type'              => 'sortable',
				'default'           => ['post-meta','post-title','post-excerpt','read-more'],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_sortable' ],
				'label'             => esc_html__( 'Elements', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Enable blog post content elements and rearrange the list by drag and drop.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 10,
				'choices'           => [
					'post-title'        => esc_html__( 'Post Title', 'aarambha-real-estate' ),
					'post-meta'         => esc_html__( 'Date & Tags', 'aarambha-real-estate' ),
					'post-excerpt'      => esc_html__( 'Post Excerpt', 'aarambha-real-estate' ),
                    'read-more'         => esc_html__( 'Read More', 'aarambha-real-estate' )
				],
			],
            // Button Text
            'aarambha_real_estate_front_page_news_blog_view_all_btn' => [
                'type'              => 'toggle',
                'default'           => '',
                'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_toggle' ],
                'label'             => esc_html__( 'View All', 'aarambha-real-estate' ),
                'description'       => esc_html__( 'Toggle to show/hide view all button.', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_news_blog_section',
                'priority'          => 10,
            ],
            // Button URL
            'aarambha_real_estate_front_page_news_blog_view_all_btn_link' => [
                'type'              => 'text',
                'default'           => '#',
                'sanitize_callback' => 'sanitize_text_field',
                'label'             => esc_html__( 'Button Link', 'aarambha-real-estate' ),
                'section'           => 'aarambha_real_estate_front_page_news_blog_section',
                'priority'          => 10,
            ],
            
			// Heading One
			'aarambha_real_estate_front_page_news_blog_heading_one' => [
				'type'              => 'heading',
				'label'             => esc_html__( 'SECTION STYLE', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 5,
			],
			// Background Image
			'aarambha_real_estate_front_page_news_blog_section_background' => [
				'type'              => 'background',
				'default'           => '',
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Image', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set background image for container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 5,
				'fields'            => ['image' => true, 'position' => true, 'attachment' => true, 'repeat' => true, 'size' => true ],
			],
			// Background Overlay
			'aarambha_real_estate_front_page_news_blog_section_background_overlay' => [
				'type'              => 'background',
				'default'           => [
					'background'        => 'color',
					'colors'            => [
						'color_1'           => 'var(--color-bg)'
					]
				],
				'sanitize_callback' => ['Aarambha_Real_Estate_Customizer_Sanitize_Callback', 'sanitize_background' ],
				'label'             => esc_html__( 'Background Overlay', 'aarambha-real-estate' ),
				'description'       => esc_html__( 'Set background overlay color for container.', 'aarambha-real-estate' ),
				'section'           => 'aarambha_real_estate_front_page_news_blog_section',
				'priority'          => 5,
				'inherits'          => [
					'color_1'           => 'var(--color-bg)'
				],
				'fields'            => ['colors' => true],
			],
        ];
    }

}
new Aarambha_Real_Estate_Customize_Front_Page_News_Blog_Fields();

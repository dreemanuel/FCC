<?php
/**
 * Aarambha Real Estate hooks
 *
 * @package Aarambha_Real_Estate
 */

/* ------------------------------ HEADER ------------------------------ */
/**
 * Meta head.
 *
 * @see aarambha_real_estate_head_meta()
 */
add_action( 'aarambha_real_estate_head', 'aarambha_real_estate_head_meta', 10 );


/**
 * Header Bottom Content
 *
 * @see aarambha_real_estate_content_before_page_header()
 */
add_action( 'aarambha_real_estate_header_bottom', 'aarambha_real_estate_content_before_page_header', 15 );



/* ------------------------------ BEFORE CONTENT ------------------------------ */
/**
 * Before Content of page
 *
 * @see aarambha_real_estate_content_before_wrapper_start()
 */
add_action( 'aarambha_real_estate_content_before', 'aarambha_real_estate_content_before_wrapper_start', 10 );

/* ------------------------------ AFTER CONTENT ------------------------------ */
/**
 * After Content of page
 *
 * @see aarambha_real_estate_content_after_wrapper_end()
 */
add_action( 'aarambha_real_estate_content_after', 'aarambha_real_estate_content_after_wrapper_end', 10 );

/* ------------------------------ BLOG/ARCHIVE PAGE ------------------------------ */

/**
 * After content loop
 *
 * @see aarambha_real_estate_posts_navigation()
 */
add_action( 'aarambha_real_estate_posts_content_loop_after', 'aarambha_real_estate_posts_navigation', 10 );

/**
 * Entry Header
 *
 * @see aarambha_real_estate_get_post_thumbnail()
 * @see aarambha_real_estate_blog_post_content()
 */
add_action( 'aarambha_real_estate_posts_content', 'aarambha_real_estate_get_post_thumbnail', 10 );
add_action( 'aarambha_real_estate_posts_content', 'aarambha_real_estate_blog_post_content', 10 );

/* ------------------------------ SEARCH PAGE ------------------------------ */

/**
 * Entry Header
 *
 * @see aarambha_real_estate_search_posts_header()
 */
add_action( 'aarambha_real_estate_search_posts_entry_header', 'aarambha_real_estate_search_posts_header', 10 );

/**
 * Entry Content
 *
 * @see aarambha_real_estate_search_posts_content()
 */
add_action( 'aarambha_real_estate_search_posts_entry_content', 'aarambha_real_estate_search_posts_content', 10 );

/**
 * Entry Footer
 *
 * @see aarambha_real_estate_search_posts_footer()
 */
add_action( 'aarambha_real_estate_search_posts_entry_footer', 'aarambha_real_estate_search_posts_footer', 10 );

/* ------------------------------ SINGLE POST ------------------------------ */

/**
 * Entry Header Content
 *
 * @see aarambha_real_estate_get_post_thumbnail()
 * @see aarambha_real_estate_post_header()
 */
add_action( 'aarambha_real_estate_post_entry_header', 'aarambha_real_estate_get_post_thumbnail', 10 );
add_action( 'aarambha_real_estate_post_entry_header', 'aarambha_real_estate_post_header', 15 );

/**
 * Entry Content
 *
 * @see aarambha_real_estate_post_content()
 */
add_action( 'aarambha_real_estate_post_entry_content', 'aarambha_real_estate_post_content', 10 );

/**
 * Entry Footer
 *
 * @see aarambha_real_estate_post_footer()
 */
add_action( 'aarambha_real_estate_post_entry_footer', 'aarambha_real_estate_post_footer', 10 );


/* ------------------------------ SINGLE PAGE ------------------------------ */

/**
 * Entry Header Content
 *
 * @see aarambha_real_estate_get_post_thumbnail()
 * @see aarambha_real_estate_page_post_header()
 */
add_action( 'aarambha_real_estate_page_entry_header', 'aarambha_real_estate_get_post_thumbnail', 10 );
add_action( 'aarambha_real_estate_page_entry_header', 'aarambha_real_estate_page_post_header', 15 );

/**
 * Entry Content
 *
 * @see aarambha_real_estate_page_content()
 */
add_action( 'aarambha_real_estate_page_entry_content', 'aarambha_real_estate_page_content', 10 );

/**
 * Entry Footer
 *
 * @see aarambha_real_estate_page_footer()
 */
add_action( 'aarambha_real_estate_page_entry_footer', 'aarambha_real_estate_page_footer', 10 );

/* ------------------------------ FOOTER ------------------------------ */
/**
 * Footer back to top
 *
 * @see aarambha_real_estate_footer_back_to_top()
 */
add_action( 'aarambha_real_estate_footer_after', 'aarambha_real_estate_footer_back_to_top', 10 );

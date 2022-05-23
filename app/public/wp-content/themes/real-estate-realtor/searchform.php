<?php
/**
 * The template for displaying search forms in Real Estate Realtor
 * @package Real Estate Realtor
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'real-estate-realtor' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( get_theme_mod('real_estate_realtor_search_placeholder', __('Search', 'real-estate-realtor')) ); ?>" value="<?php echo esc_attr( get_search_query()) ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button','real-estate-realtor' ); ?>">
</form>
<?php
/**
 * The template part for displaying content
 * @package Real Estate Realtor
 * @subpackage real_estate_realtor
 * @since 1.0
 */
?>

<?php $real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_post_layouts','Layout 1');
if($real_estate_realtor_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($real_estate_realtor_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($real_estate_realtor_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}
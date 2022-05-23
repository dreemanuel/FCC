<?php

	$real_estate_realtor_first_color = get_theme_mod('real_estate_realtor_first_color');

	$real_estate_realtor_second_color = get_theme_mod('real_estate_realtor_second_color');

	$real_estate_realtor_custom_css ='';
	
	/*------------ Global First Color First-----------*/
	$real_estate_realtor_custom_css .='input[type="submit"], .topbar p, .login-box i, span.cart-value, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .blog-section h2:after, #comments input[type="submit"].submit, #comments a.comment-reply-link:hover, #comments a.comment-reply-link, #sidebar h3:after, #sidebar input[type="submit"]:hover, #sidebar .tagcloud a:hover, .footer-wp .tagcloud a:hover, .widget_calendar tbody a, .page-content .read-moresec a.button, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"] , .pagination a:hover, .pagination .current, .more-btn a:hover, #scrollbutton i, .footer-wp input[type="submit"], .footer-wp button, #sidebar button, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .topbar a.call1, .woocommerce nav.woocommerce-pagination ul li a, .tags a:hover, .nav-next a:hover, .nav-previous a:hover, #popular-properties .tablinks.active, #header, .pagination a:hover, #sidebar .tagcloud a:hover, .footer-wp .tagcloud a:hover, #sidebar input[type="submit"]:hover, .nav-next a:hover, .nav-previous a:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .postbtn a, .fixed-header{';
		$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_first_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='.nav-previous a:hover, .nav-next a:hover, #sidebar .textwidget p a:hover, .footer-wp .textwidget p a, .footer-wp a.rsswidget, .footer-wp li a:hover, #sidebar .custom_read_more a:hover, .footer-wp .custom_read_more a, .navigation.post-navigation a:hover, .metabox a:hover, .blog-section h2 a:hover, td.product-name a:hover, .footer-wp h3, .page-template-home-page .icon-color, .toggle-menu i, .listing-btn a{';
		$real_estate_realtor_custom_css .='color: '.esc_attr($real_estate_realtor_first_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='.entry-date:hover i, .entry-date:hover a, .entry-author:hover i, .entry-author:hover a{';
		$real_estate_realtor_custom_css .='color: '.esc_attr($real_estate_realtor_first_color).'!important;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='#scrollbutton i{';
			$real_estate_realtor_custom_css .='border-color: '.esc_attr($real_estate_realtor_first_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='.heading-box{';
			$real_estate_realtor_custom_css .='border-left-color: '.esc_attr($real_estate_realtor_first_color).';';
	$real_estate_realtor_custom_css .='}';

	// media
	$real_estate_realtor_custom_css .='@media screen and (max-width:1000px) {';
	if($real_estate_realtor_first_color != false){
	$real_estate_realtor_custom_css .='.page-template-home-page #header{
	background-color: '.esc_attr($real_estate_realtor_first_color).';}';}
	$real_estate_realtor_custom_css .='}';


	/*------------ Global First Color second-----------*/
	$real_estate_realtor_custom_css .='input[type="submit"]:hover,type.sale-box h6, .nav-next a, .nav-previous a, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .postbtn:hover i, .postbtn:hover a, #comments input[type="submit"].submit:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar input[type="submit"], .page-content .read-moresec a.button:hover, .frame, #sidebar button:hover, .pagination span, .pagination a{';
		$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_second_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='.pagination a:hover, #comments a time, .bradcrumbs span, .bradcrumbs a, a, a:hover, .tags, .pagination .current, #sidebar .textwidget p a, #sidebar .textwidget a:hover,.footer-wp .woocommerce a.button:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover, #sidebar h3.widget-title a.rsswidget, .copyright-wrapper p,.copyright-wrapper a, .page-content .read-moresec a.button, a.button, #sidebar .widget_calendar td a, #sidebar .widget_calendar tbody a, #sidebar ul li a:hover, #sidebar input[type="submit"]:hover,#sidebar .widget_calendar caption, #comments a.comment-reply-link:hover, #comments a.comment-reply-link, #comments input[type="submit"].submit, .metabox, .new-text p a,.comment p a, .blog-section h2 a, .blog-section h2,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, h2.woocommerce-loop-product__title,.woocommerce div.product .product_title, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, a.r_button, input[type="submit"], td.product-name a, .postbtn i, #popular-properties .tablinks, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, nav.woocommerce-MyAccount-navigation ul li a, .woocommerce .quantity .qty, .metabox a, p.logged-in-as a, #sidebar h3, #sidebar input[type="search"], input[type="search"], #sidebar .tagcloud a, #sidebar .custom_read_more a, .footer-wp button, #sidebar button, #navbar-header span,#woonavbar-header .cart_no, #woonavbar-header .cart-value, .menu-brand .closebtn, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .primary-navigation ul li a, a.button.wc-forward:hover{';
		$real_estate_realtor_custom_css .='color: '.esc_attr($real_estate_realtor_second_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='.nav-next a:hover, .nav-previous a:hover, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$real_estate_realtor_custom_css .='color: '.esc_attr($real_estate_realtor_second_color).'!important;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='.select2-container--default .select2-selection--single, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce .quantity .qty, .inner-service, .related-inner-box, #sidebar input[type="search"], input[type="search"], #sidebar aside,#sidebar .custom-about-us, #sidebar .custom-contact-us, a.button, .page-content .read-moresec a.button:hover{';
			$real_estate_realtor_custom_css .='border-color: '.esc_attr($real_estate_realtor_second_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_custom_css .='{';
			$real_estate_realtor_custom_css .='border-left-color: '.esc_attr($real_estate_realtor_second_color).';';
	$real_estate_realtor_custom_css .='}';

	// media
	$real_estate_realtor_custom_css .='@media screen and (max-width:720px) {';
		if($real_estate_realtor_first_color != false){
		$real_estate_realtor_custom_css .='.page-template-home-page #header{
		background-color:'.esc_attr($real_estate_realtor_first_color).';
		}';
		}
	$real_estate_realtor_custom_css .='}';
	
	/*---------------------------Width Layout -------------------*/
	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_width_layout_options','Default');
    if($real_estate_realtor_theme_lay == 'Default'){
		$real_estate_realtor_custom_css .='body{';
			$real_estate_realtor_custom_css .='max-width: 100%;';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Container Layout'){
		$real_estate_realtor_custom_css .='body{';
			$real_estate_realtor_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Box Layout'){
		$real_estate_realtor_custom_css .='body{';
			$real_estate_realtor_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$real_estate_realtor_custom_css .='}';
		$real_estate_realtor_custom_css .='.search-box input[type="search"]{';
			$real_estate_realtor_custom_css .='width: 75%;';
		$real_estate_realtor_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_slider_content_layout','Center');
    if($real_estate_realtor_theme_lay == 'Left'){
		$real_estate_realtor_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$real_estate_realtor_custom_css .='text-align:left; left:15%; right:40%;';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Center'){
		$real_estate_realtor_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$real_estate_realtor_custom_css .='text-align:center; left:30%; right:30%;';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Right'){
		$real_estate_realtor_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$real_estate_realtor_custom_css .='text-align:right; left:40%; right:15%;';
		$real_estate_realtor_custom_css .='}';
	}

	// slider condition
	$real_estate_realtor_slider_hide = get_theme_mod( 'real_estate_realtor_slider_hide', false);
	if($real_estate_realtor_slider_hide == false){
    	$real_estate_realtor_custom_css .='.page-template-home-page #header{';
			$real_estate_realtor_custom_css .='position:static; background-color: '.esc_attr(get_theme_mod('real_estate_realtor_first_color', '#fcb332')).';';
		$real_estate_realtor_custom_css .='} ';
		$real_estate_realtor_custom_css .='#site-navigation li a{';
			$real_estate_realtor_custom_css .='color:#000;';
		$real_estate_realtor_custom_css .='} ';
		$real_estate_realtor_custom_css .='.primary-navigation ul ul a{';
			$real_estate_realtor_custom_css .='color:#fff !important;';
		$real_estate_realtor_custom_css .='} ';
	}

	/*------------ Slider Opacity -------------------*/
	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_slider_opacity','0.7');
	if($real_estate_realtor_theme_lay == '0'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.1'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.1';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.2'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.2';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.3'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.3';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.4'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.4';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.5'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.5';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.6'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.6';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.7'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.7';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.8'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.8';
	$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == '0.9'){
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='opacity:0.9';
	$real_estate_realtor_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$real_estate_realtor_footer_text_align = get_theme_mod('real_estate_realtor_footer_text_align');
	$real_estate_realtor_custom_css .='.copyright-wrapper{';
		$real_estate_realtor_custom_css .='text-align: '.esc_attr($real_estate_realtor_footer_text_align).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_footer_text_padding = get_theme_mod('real_estate_realtor_footer_text_padding');
	$real_estate_realtor_custom_css .='.copyright-wrapper{';
		$real_estate_realtor_custom_css .='padding-top: '.esc_attr($real_estate_realtor_footer_text_padding).'px; padding-bottom: '.esc_attr($real_estate_realtor_footer_text_padding).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_footer_bg_color = get_theme_mod('real_estate_realtor_footer_bg_color');
	$real_estate_realtor_custom_css .='.footer-wp{';
		$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_footer_bg_color).';';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_footer_bg_image = get_theme_mod('real_estate_realtor_footer_bg_image');
	if($real_estate_realtor_footer_bg_image != false){
		$real_estate_realtor_custom_css .='.footer-wp{';
			$real_estate_realtor_custom_css .='background: url('.esc_attr($real_estate_realtor_footer_bg_image).');';
		$real_estate_realtor_custom_css .='}';
	}

	$real_estate_realtor_copyright_text_font_size = get_theme_mod('real_estate_realtor_copyright_text_font_size', 15);
	$real_estate_realtor_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$real_estate_realtor_custom_css .='font-size: '.esc_attr($real_estate_realtor_copyright_text_font_size).'px;';
	$real_estate_realtor_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$real_estate_realtor_back_to_top_border_radius = get_theme_mod('real_estate_realtor_back_to_top_border_radius');
	$real_estate_realtor_custom_css .='#scrollbutton i{';
		$real_estate_realtor_custom_css .='border-radius: '.esc_attr($real_estate_realtor_back_to_top_border_radius).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_scroll_icon_font_size = get_theme_mod('real_estate_realtor_scroll_icon_font_size', 22);
	$real_estate_realtor_custom_css .='#scrollbutton i{';
		$real_estate_realtor_custom_css .='font-size: '.esc_attr($real_estate_realtor_scroll_icon_font_size).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_top_bottom_scroll_padding = get_theme_mod('real_estate_realtor_top_bottom_scroll_padding', 12);
	$real_estate_realtor_custom_css .='#scrollbutton i{';
		$real_estate_realtor_custom_css .='padding-top: '.esc_attr($real_estate_realtor_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($real_estate_realtor_top_bottom_scroll_padding).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_left_right_scroll_padding = get_theme_mod('real_estate_realtor_left_right_scroll_padding', 17);
	$real_estate_realtor_custom_css .='#scrollbutton i{';
		$real_estate_realtor_custom_css .='padding-left: '.esc_attr($real_estate_realtor_left_right_scroll_padding).'px; padding-right: '.esc_attr($real_estate_realtor_left_right_scroll_padding).'px;';
	$real_estate_realtor_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$real_estate_realtor_post_button_padding_top = get_theme_mod('real_estate_realtor_post_button_padding_top');
	$real_estate_realtor_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$real_estate_realtor_custom_css .='padding-top: '.esc_attr($real_estate_realtor_post_button_padding_top).'px; padding-bottom: '.esc_attr($real_estate_realtor_post_button_padding_top).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_post_button_padding_right = get_theme_mod('real_estate_realtor_post_button_padding_right');
	$real_estate_realtor_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$real_estate_realtor_custom_css .='padding-left: '.esc_attr($real_estate_realtor_post_button_padding_right).'px; padding-right: '.esc_attr($real_estate_realtor_post_button_padding_right).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_post_button_border_radius = get_theme_mod('real_estate_realtor_post_button_border_radius');
	$real_estate_realtor_custom_css .='.postbtn a, #comments input[type="submit"].submit, .postbtn:hover a{';
		$real_estate_realtor_custom_css .='border-radius: '.esc_attr($real_estate_realtor_post_button_border_radius).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_post_comment_enable = get_theme_mod('real_estate_realtor_post_comment_enable',true);
	if($real_estate_realtor_post_comment_enable == false){
		$real_estate_realtor_custom_css .='#comments{';
			$real_estate_realtor_custom_css .='display: none;';
		$real_estate_realtor_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$real_estate_realtor_preloader_bg_color_option = get_theme_mod('real_estate_realtor_preloader_bg_color_option');
	$real_estate_realtor_preloader_icon_color_option = get_theme_mod('real_estate_realtor_preloader_icon_color_option');
	$real_estate_realtor_custom_css .='.frame{';
		$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_preloader_bg_color_option).';';
	$real_estate_realtor_custom_css .='}';
	$real_estate_realtor_custom_css .='.dot-1,.dot-2,.dot-3{';
		$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_preloader_icon_color_option).';';
	$real_estate_realtor_custom_css .='}';

	// preloader type
	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_preloader_type','First Preloader Type');
    if($real_estate_realtor_theme_lay == 'First Preloader Type'){
		$real_estate_realtor_custom_css .='.dot-1, .dot-2, .dot-3{';
			$real_estate_realtor_custom_css .='';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Second Preloader Type'){
		$real_estate_realtor_custom_css .='.dot-1, .dot-2, .dot-3{';
			$real_estate_realtor_custom_css .='border-radius:0;';
		$real_estate_realtor_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_background_skin','Without Background');
    if($real_estate_realtor_theme_lay == 'With Background'){
		$real_estate_realtor_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$real_estate_realtor_custom_css .='background-color: #fff; padding:20px;';
		$real_estate_realtor_custom_css .='}';
		$real_estate_realtor_custom_css .='.login-box a{';
			$real_estate_realtor_custom_css .='background-color: #fff;';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Without Background'){
		$real_estate_realtor_custom_css .='{';
			$real_estate_realtor_custom_css .='background-color: transparent;';
		$real_estate_realtor_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$real_estate_realtor_woocommerce_button_padding_top = get_theme_mod('real_estate_realtor_woocommerce_button_padding_top',15);
	$real_estate_realtor_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$real_estate_realtor_custom_css .='padding-top: '.esc_attr($real_estate_realtor_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($real_estate_realtor_woocommerce_button_padding_top).'px;';
	$real_estate_realtor_custom_css .='}';
	

	$real_estate_realtor_woocommerce_button_padding_right = get_theme_mod('real_estate_realtor_woocommerce_button_padding_right',15);
	$real_estate_realtor_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$real_estate_realtor_custom_css .='padding-left: '.esc_attr($real_estate_realtor_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($real_estate_realtor_woocommerce_button_padding_right).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woocommerce_button_border_radius = get_theme_mod('real_estate_realtor_woocommerce_button_border_radius',6);
	$real_estate_realtor_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$real_estate_realtor_custom_css .='border-radius: '.esc_attr($real_estate_realtor_woocommerce_button_border_radius).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_related_product_enable = get_theme_mod('real_estate_realtor_related_product_enable',true);
	if($real_estate_realtor_related_product_enable == false){
		$real_estate_realtor_custom_css .='.related.products{';
			$real_estate_realtor_custom_css .='display: none;';
		$real_estate_realtor_custom_css .='}';
	}

	$real_estate_realtor_woocommerce_product_border_enable = get_theme_mod('real_estate_realtor_woocommerce_product_border_enable',true);
	if($real_estate_realtor_woocommerce_product_border_enable == false){
		$real_estate_realtor_custom_css .='.products li{';
			$real_estate_realtor_custom_css .='border: none;';
		$real_estate_realtor_custom_css .='}';
	}

	$real_estate_realtor_woocommerce_product_padding_top = get_theme_mod('real_estate_realtor_woocommerce_product_padding_top',10);
	$real_estate_realtor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$real_estate_realtor_custom_css .='padding-top: '.esc_attr($real_estate_realtor_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($real_estate_realtor_woocommerce_product_padding_top).'px !important;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woocommerce_product_padding_right = get_theme_mod('real_estate_realtor_woocommerce_product_padding_right',10);
	$real_estate_realtor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$real_estate_realtor_custom_css .='padding-left: '.esc_attr($real_estate_realtor_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($real_estate_realtor_woocommerce_product_padding_right).'px !important;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woocommerce_product_border_radius = get_theme_mod('real_estate_realtor_woocommerce_product_border_radius',3);
	$real_estate_realtor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$real_estate_realtor_custom_css .='border-radius: '.esc_attr($real_estate_realtor_woocommerce_product_border_radius).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woocommerce_product_box_shadow = get_theme_mod('real_estate_realtor_woocommerce_product_box_shadow', 5);
	$real_estate_realtor_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$real_estate_realtor_custom_css .='box-shadow: '.esc_attr($real_estate_realtor_woocommerce_product_box_shadow).'px '.esc_attr($real_estate_realtor_woocommerce_product_box_shadow).'px '.esc_attr($real_estate_realtor_woocommerce_product_box_shadow).'px #eee;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woo_product_sale_top_bottom_padding = get_theme_mod('real_estate_realtor_woo_product_sale_top_bottom_padding', 0);
	$real_estate_realtor_woo_product_sale_left_right_padding = get_theme_mod('real_estate_realtor_woo_product_sale_left_right_padding', 0);
	$real_estate_realtor_custom_css .='.woocommerce span.onsale{';
		$real_estate_realtor_custom_css .='padding-top: '.esc_attr($real_estate_realtor_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($real_estate_realtor_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($real_estate_realtor_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($real_estate_realtor_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woo_product_sale_border_radius = get_theme_mod('real_estate_realtor_woo_product_sale_border_radius',6);
	$real_estate_realtor_custom_css .='.woocommerce span.onsale {';
		$real_estate_realtor_custom_css .='border-radius: '.esc_attr($real_estate_realtor_woo_product_sale_border_radius).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_woo_product_sale_position = get_theme_mod('real_estate_realtor_woo_product_sale_position', 'Right');
	if($real_estate_realtor_woo_product_sale_position == 'Right' ){
		$real_estate_realtor_custom_css .='.woocommerce ul.products li.product .onsale{';
			$real_estate_realtor_custom_css .=' left:auto; right:0;';
		$real_estate_realtor_custom_css .='}';
	}elseif($real_estate_realtor_woo_product_sale_position == 'Left' ){
		$real_estate_realtor_custom_css .='.woocommerce ul.products li.product .onsale{';
			$real_estate_realtor_custom_css .=' left:0; right:auto;';
		$real_estate_realtor_custom_css .='}';
	}

	$real_estate_realtor_wooproduct_sale_font_size = get_theme_mod('real_estate_realtor_wooproduct_sale_font_size',14);
	$real_estate_realtor_custom_css .='.woocommerce span.onsale{';
		$real_estate_realtor_custom_css .='font-size: '.esc_attr($real_estate_realtor_wooproduct_sale_font_size).'px;';
	$real_estate_realtor_custom_css .='}';

	// Responsive Media
	$real_estate_realtor_post_date = get_theme_mod( 'real_estate_realtor_display_post_date',true);
	if($real_estate_realtor_post_date == true && get_theme_mod( 'real_estate_realtor_metafields_date',true) != true){
    	$real_estate_realtor_custom_css .='.metabox .entry-date{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_post_date == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.metabox .entry-date{';
			$real_estate_realtor_custom_css .='display:inline-block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_post_date == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.metabox .entry-date{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_post_author = get_theme_mod( 'real_estate_realtor_display_post_author',true);
	if($real_estate_realtor_post_author == true && get_theme_mod( 'real_estate_realtor_metafields_author',true) != true){
    	$real_estate_realtor_custom_css .='.metabox .entry-author{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_post_author == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.metabox .entry-author{';
			$real_estate_realtor_custom_css .='display:inline-block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_post_author == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.metabox .entry-author{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_post_comment = get_theme_mod( 'real_estate_realtor_display_post_comment',true);
	if($real_estate_realtor_post_comment == true && get_theme_mod( 'real_estate_realtor_metafields_comment',true) != true){
    	$real_estate_realtor_custom_css .='.metabox .entry-comments{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_post_comment == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.metabox .entry-comments{';
			$real_estate_realtor_custom_css .='display:inline-block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_post_comment == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.metabox .entry-comments{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_post_time = get_theme_mod( 'real_estate_realtor_display_post_time',false);
	if($real_estate_realtor_post_time == true && get_theme_mod( 'real_estate_realtor_metafields_time',false) != true){
    	$real_estate_realtor_custom_css .='.metabox .entry-time{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_post_time == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.metabox .entry-time{';
			$real_estate_realtor_custom_css .='display:inline-block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_post_time == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.metabox .entry-time{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	if($real_estate_realtor_post_date == false && $real_estate_realtor_post_author == false && $real_estate_realtor_post_comment == false && $real_estate_realtor_post_time == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
    	$real_estate_realtor_custom_css .='.metabox {';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_metafields_date = get_theme_mod( 'real_estate_realtor_metafields_date',false);
	$real_estate_realtor_metafields_author = get_theme_mod( 'real_estate_realtor_metafields_author',false);
	$real_estate_realtor_metafields_comment = get_theme_mod( 'real_estate_realtor_metafields_comment',false);
	$real_estate_realtor_metafields_time = get_theme_mod( 'real_estate_realtor_metafields_time',false);
	if($real_estate_realtor_metafields_date == false && $real_estate_realtor_metafields_author == false && $real_estate_realtor_metafields_comment == false && $real_estate_realtor_metafields_time == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width: 1440px) and (min-width:576px) {';
    	$real_estate_realtor_custom_css .='.metabox {';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_slider = get_theme_mod( 'real_estate_realtor_display_slider',false);
	if($real_estate_realtor_slider == true && get_theme_mod( 'real_estate_realtor_slider_hide', false) == false){
    	$real_estate_realtor_custom_css .='#slider{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_slider == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='#slider{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_slider == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='#slider{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_sidebar = get_theme_mod( 'real_estate_realtor_display_sidebar',true);
    if($real_estate_realtor_sidebar == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='#sidebar{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_sidebar == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='#sidebar{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_scroll = get_theme_mod( 'real_estate_realtor_display_scrolltop',true);
	if($real_estate_realtor_scroll == true && get_theme_mod( 'real_estate_realtor_hide_show_scroll',true) != true){
    	$real_estate_realtor_custom_css .='#scrollbutton i{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_scroll == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='#scrollbutton i{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_scroll == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='#scrollbutton i{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_preloader = get_theme_mod( 'real_estate_realtor_display_preloader',false);
	if($real_estate_realtor_preloader == true && get_theme_mod( 'real_estate_realtor_preloader',false) != true){
    	$real_estate_realtor_custom_css .='.frame{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_preloader == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.frame{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_preloader == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.frame{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_fixed_header = get_theme_mod( 'real_estate_realtor_display_fixed_header',false);
	if($real_estate_realtor_fixed_header == true && get_theme_mod( 'real_estate_realtor_sticky_header',false) != true){
    	$real_estate_realtor_custom_css .='.fixed-header{';
			$real_estate_realtor_custom_css .='position:static;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_fixed_header == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.fixed-header{';
			$real_estate_realtor_custom_css .='position:fixed;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_fixed_header == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.fixed-header{';
			$real_estate_realtor_custom_css .='position:static;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_search = get_theme_mod( 'real_estate_realtor_display_search_category',true);
	if($real_estate_realtor_search == true && get_theme_mod( 'real_estate_realtor_search_enable_disable',true) != true){
    	$real_estate_realtor_custom_css .='.search-cat-box{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_search == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.search-cat-box{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_search == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.search-cat-box{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_myaccount = get_theme_mod( 'real_estate_realtor_display_myaccount',true);
	if($real_estate_realtor_myaccount == true && get_theme_mod( 'real_estate_realtor_myaccount_enable_disable',true) != true){
    	$real_estate_realtor_custom_css .='.login-box{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} ';
	}
    if($real_estate_realtor_myaccount == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='.login-box{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_myaccount == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px){';
		$real_estate_realtor_custom_css .='.login-box{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	$real_estate_realtor_display_woocart = get_theme_mod( 'real_estate_realtor_display_woocart',true);
    if($real_estate_realtor_display_woocart == true){
    	$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='#navbar-header .cart_no{';
			$real_estate_realtor_custom_css .='display:block;';
		$real_estate_realtor_custom_css .='} }';
	}else if($real_estate_realtor_display_woocart == false){
		$real_estate_realtor_custom_css .='@media screen and (max-width:575px) {';
		$real_estate_realtor_custom_css .='#navbar-header .cart_no{';
			$real_estate_realtor_custom_css .='display:none;';
		$real_estate_realtor_custom_css .='} }';
	}

	// menu settings
	$real_estate_realtor_menu_font_size_option = get_theme_mod('real_estate_realtor_menu_font_size_option');
	$real_estate_realtor_custom_css .='.primary-navigation a{';
		$real_estate_realtor_custom_css .='font-size: '.esc_attr($real_estate_realtor_menu_font_size_option).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_menu_padding = get_theme_mod('real_estate_realtor_menu_padding');
	$real_estate_realtor_custom_css .='.primary-navigation a{';
		$real_estate_realtor_custom_css .='padding: '.esc_attr($real_estate_realtor_menu_padding).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_text_tranform_menu','Uppercase');
    if($real_estate_realtor_theme_lay == 'Uppercase'){
		$real_estate_realtor_custom_css .='.primary-navigation a{';
			$real_estate_realtor_custom_css .='';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Lowercase'){
		$real_estate_realtor_custom_css .='.primary-navigation a{';
			$real_estate_realtor_custom_css .='text-transform: lowercase;';
		$real_estate_realtor_custom_css .='}';
	}
	else if($real_estate_realtor_theme_lay == 'Capitalize'){
		$real_estate_realtor_custom_css .='.primary-navigation a{';
			$real_estate_realtor_custom_css .='text-transform: Capitalize;';
		$real_estate_realtor_custom_css .='}';
	}

	$real_estate_realtor_theme_lay = get_theme_mod( 'real_estate_realtor_font_weight_option_menu','');
    if($real_estate_realtor_theme_lay == 'Bold'){
		$real_estate_realtor_custom_css .='.primary-navigation a{';
			$real_estate_realtor_custom_css .='font-weight:bold;';
		$real_estate_realtor_custom_css .='}';
	}else if($real_estate_realtor_theme_lay == 'Normal'){
		$real_estate_realtor_custom_css .='.primary-navigation a{';
			$real_estate_realtor_custom_css .='font-weight: normal;';
		$real_estate_realtor_custom_css .='}';
	}

	// slider height
	$real_estate_realtor_option_slider_height = get_theme_mod('real_estate_realtor_option_slider_height');
	$real_estate_realtor_custom_css .='#slider img{';
		$real_estate_realtor_custom_css .='height: '.esc_attr($real_estate_realtor_option_slider_height).'px;';
	$real_estate_realtor_custom_css .='}';

	// slider content spacing
	$real_estate_realtor_slider_content_top_padding = get_theme_mod('real_estate_realtor_slider_content_top_padding');
	$real_estate_realtor_slider_content_left_padding = get_theme_mod('real_estate_realtor_slider_content_left_padding');
	$real_estate_realtor_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$real_estate_realtor_custom_css .='top: '.esc_attr($real_estate_realtor_slider_content_top_padding).'%; bottom: '.esc_attr($real_estate_realtor_slider_content_top_padding).'%;left: '.esc_attr($real_estate_realtor_slider_content_left_padding).'%;right: '.esc_attr($real_estate_realtor_slider_content_left_padding).'%;';
	$real_estate_realtor_custom_css .='}';

	// slider overlay
	$real_estate_realtor_enable_slider_overlay = get_theme_mod('real_estate_realtor_enable_slider_overlay', true);
	if($real_estate_realtor_enable_slider_overlay == false){
		$real_estate_realtor_custom_css .='#slider image{';
			$real_estate_realtor_custom_css .='opacity:1;';
		$real_estate_realtor_custom_css .='}';
	} 
	$real_estate_realtor_slider_overlay_color = get_theme_mod('real_estate_realtor_slider_overlay_color', true);
	if($real_estate_realtor_enable_slider_overlay != false){
		$real_estate_realtor_custom_css .='#slider{';
			$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_slider_overlay_color).';';
		$real_estate_realtor_custom_css .='}';
	}

	//  comment form width
	$real_estate_realtor_comment_form_width = get_theme_mod( 'real_estate_realtor_comment_form_width');
	$real_estate_realtor_custom_css .='#comments textarea{';
		$real_estate_realtor_custom_css .='width: '.esc_attr($real_estate_realtor_comment_form_width).'%;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_title_comment_form = get_theme_mod('real_estate_realtor_title_comment_form', 'Leave a Reply');
	if($real_estate_realtor_title_comment_form == ''){
		$real_estate_realtor_custom_css .='#comments h2#reply-title {';
			$real_estate_realtor_custom_css .='display: none;';
		$real_estate_realtor_custom_css .='}';
	}

	$real_estate_realtor_comment_form_button_content = get_theme_mod('real_estate_realtor_comment_form_button_content', 'Post Comment');
	if($real_estate_realtor_comment_form_button_content == ''){
		$real_estate_realtor_custom_css .='#comments p.form-submit {';
			$real_estate_realtor_custom_css .='display: none;';
		$real_estate_realtor_custom_css .='}';
	}

	// featured image setting
	$real_estate_realtor_image_border_radius = get_theme_mod('real_estate_realtor_image_border_radius', 0);
	$real_estate_realtor_custom_css .='.box-image img, .content_box img{';
		$real_estate_realtor_custom_css .='border-radius: '.esc_attr($real_estate_realtor_image_border_radius).'px;';
	$real_estate_realtor_custom_css .='}';

	$real_estate_realtor_image_box_shadow = get_theme_mod('real_estate_realtor_image_box_shadow',0);
	$real_estate_realtor_custom_css .='.box-image img, .content_box img{';
		$real_estate_realtor_custom_css .='box-shadow: '.esc_attr($real_estate_realtor_image_box_shadow).'px '.esc_attr($real_estate_realtor_image_box_shadow).'px '.esc_attr($real_estate_realtor_image_box_shadow).'px #b5b5b5;';
	$real_estate_realtor_custom_css .='}';

	// fixed header padding option
	$real_estate_realtor_sticky_header_padding = get_theme_mod('real_estate_realtor_sticky_header_padding', 0);
		$real_estate_realtor_custom_css .='.fixed-header{';
			$real_estate_realtor_custom_css .='padding: '.esc_attr($real_estate_realtor_sticky_header_padding).'px;';
		$real_estate_realtor_custom_css .='}';

	// Post Block
	$real_estate_realtor_post_block_option = get_theme_mod( 'real_estate_realtor_post_block_option','By Block');
    if($real_estate_realtor_post_block_option == 'By Without Block'){
		$real_estate_realtor_custom_css .='.inner-service, #blog_sec .sticky{';
			$real_estate_realtor_custom_css .='border:none; margin:30px 0;';
		$real_estate_realtor_custom_css .='}';
	}

	// post image 
	$real_estate_realtor_post_featured_color = get_theme_mod('real_estate_realtor_post_featured_color', '#5c727d');
	$real_estate_realtor_post_featured_image = get_theme_mod('real_estate_realtor_post_featured_image','Image');
	if($real_estate_realtor_post_featured_image == 'Color'){
		$real_estate_realtor_custom_css .='.post-color{';
			$real_estate_realtor_custom_css .='background-color: '.esc_attr($real_estate_realtor_post_featured_color).';';
		$real_estate_realtor_custom_css .='}';
	}

	// featured image dimention
	$real_estate_realtor_post_featured_image_dimention = get_theme_mod('real_estate_realtor_post_featured_image_dimention', 'Default');
	$real_estate_realtor_post_featured_image_custom_width = get_theme_mod('real_estate_realtor_post_featured_image_custom_width');
	$real_estate_realtor_post_featured_image_custom_height = get_theme_mod('real_estate_realtor_post_featured_image_custom_height');
	if($real_estate_realtor_post_featured_image_dimention == 'Custom'){
		$real_estate_realtor_custom_css .='.box-image img{';
			$real_estate_realtor_custom_css .='width: '.esc_attr($real_estate_realtor_post_featured_image_custom_width).'px; height: '.esc_attr($real_estate_realtor_post_featured_image_custom_height).'px;';
		$real_estate_realtor_custom_css .='}';
	}

	// featured image dimention
	$real_estate_realtor_custom_post_color_width = get_theme_mod('real_estate_realtor_custom_post_color_width');
	$real_estate_realtor_custom_post_color_height = get_theme_mod('real_estate_realtor_custom_post_color_height');
	if($real_estate_realtor_post_featured_image == 'Color'){
		$real_estate_realtor_custom_css .='.post-color{';
			$real_estate_realtor_custom_css .='width: '.esc_attr($real_estate_realtor_custom_post_color_width).'px; height: '.esc_attr($real_estate_realtor_custom_post_color_height).'px;';
		$real_estate_realtor_custom_css .='}';
	}

	// site title font size
	$real_estate_realtor_site_title_font_size = get_theme_mod('real_estate_realtor_site_title_font_size', 30);
	$real_estate_realtor_custom_css .='.logo h1, .site-title a, .logo .site-title a{';
	$real_estate_realtor_custom_css .='font-size: '.esc_attr($real_estate_realtor_site_title_font_size).'px;';
	$real_estate_realtor_custom_css .='}';

	// site tagline font size
	$real_estate_realtor_site_tagline_font_size = get_theme_mod('real_estate_realtor_site_tagline_font_size', 15);
	$real_estate_realtor_custom_css .='p.site-description{';
	$real_estate_realtor_custom_css .='font-size: '.esc_attr($real_estate_realtor_site_tagline_font_size).'px;';
	$real_estate_realtor_custom_css .='}';

	// woocommerce Product Navigation
	$real_estate_realtor_wooproducts_nav = get_theme_mod('real_estate_realtor_wooproducts_nav', 'Yes');
	if($real_estate_realtor_wooproducts_nav == 'No'){
		$real_estate_realtor_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$real_estate_realtor_custom_css .='display: none;';
		$real_estate_realtor_custom_css .='}';
	}
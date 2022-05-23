<?php

add_action( 'admin_menu', 'real_estate_realtor_gettingstarted' );
function real_estate_realtor_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'real-estate-realtor'), esc_html__('About Theme', 'real-estate-realtor'), 'edit_theme_options', 'real-estate-realtor-guide-page', 'real_estate_realtor_guide');   
}

function real_estate_realtor_admin_theme_style() {
   wp_enqueue_style('real-estate-realtor-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'real_estate_realtor_admin_theme_style');

function real_estate_realtor_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Real Estate Realtor, you rock!', 'real-estate-realtor' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional realestate website. Please Click on the link below to know the theme setup information.', 'real-estate-realtor' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=real-estate-realtor-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'real-estate-realtor' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'real_estate_realtor_notice');

/**
 * Theme Info Page
 */
function real_estate_realtor_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'real-estate-realtor' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Real Estate Realtor', 'real-estate-realtor' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'real-estate-realtor' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'real-estate-realtor' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( REAL_ESTATE_REALTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'real-estate-realtor'); ?></a>
						<a href="<?php echo esc_url( REAL_ESTATE_REALTOR_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'real-estate-realtor'); ?></a>
						<a href="<?php echo esc_url( REAL_ESTATE_REALTOR_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'real-estate-realtor'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Real Estate Realtor Theme', 'real-estate-realtor' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Real Estate Realtor is designed for property dealers, property dealing companies, real estate agents, builders, architects, interior designer, estate advisors. You will absolutely love the clean, and responsive layout of this theme that matches the expectations of such businesses. To showcase the crystal clear property images and images related to your work, it has got a retina-ready design. As it utilized a good blend of colors and light and dark combination along with relevant imagery, your website is going to look beautifully professional. It is a free theme giving you plenty of resources to get started with your website in no time. With plenty of personalization options available, it is a breeze to do the changes without implementing any new codes or even modifying the existing ones. CSS animations make the website look more interesting and to get you more traffic, developers have already included SEO-friendly and highly optimized codes to the design. These codes result in faster page load time. Call To Action Button (CTA) adds to the interactive part of your website and also plays a significant role in boosting conversions. It is a Bootstrap framework-based theme having plenty of shortcodes and social media options for you to promote on a bigger scale.', 'real-estate-realtor' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','real-estate-realtor'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','real-estate-realtor'); ?></a> <?php esc_html_e( 'your website.','real-estate-realtor'); ?> </li>
							<li><?php esc_html_e( 'Real Estate Realtor','real-estate-realtor'); ?> <a target="_blank" href="<?php echo esc_url( REAL_ESTATE_REALTOR_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','real-estate-realtor'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','real-estate-realtor'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','real-estate-realtor'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'Whether you are looking to create a website for your newly established real estate business or want to show your profile and services online as a real estate agent; you will find this Free Real Estate Realtor WordPress Theme absolutely bang on for the purpose. It is a great choice if you want to try something and see if it looks great for your real estate business or not before you make an investment in its advanced pro version. Creating stunning websites for your real estate firm is no more a matter of investment as this professional theme lets you create a highly intuitive website with all prerequisites to run your business successfully. Responsive is a must these days and our developers know this really well and that is why they have come up with such a design. The layout is extremely flexible to adjust equally well on mobile phones as well as big screens of laptops and desktops.Real estate businesses are held up to very high standards and need a top-quality website for their online functioning.', 'real-estate-realtor' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','real-estate-realtor'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Car listing Shortcode with category','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Car listing Shortcode','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Multiple image feature for each property with slider.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Brand Listing Section','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Car Brand(categories) Option','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Car Tags(categories) Option','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Testimonial listing.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Testimonial shortcode.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Social icons widget.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Latest post with the image widget.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Live customize editor for the About US section.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Font Awesome integrated.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page.','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Footer Widgets & Editor style','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Gallery & Banner functionality','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Full-width Template','real-estate-realtor'); ?></li>
										<li><?php esc_html_e( 'Custom Menu, Colors Editor','real-estate-realtor'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','real-estate-realtor'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( REAL_ESTATE_REALTOR_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','real-estate-realtor'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( REAL_ESTATE_REALTOR_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','real-estate-realtor'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','real-estate-realtor'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','real-estate-realtor'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','real-estate-realtor'); ?></a> <?php esc_html_e( 'your website.','real-estate-realtor'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','real-estate-realtor'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( REAL_ESTATE_REALTOR_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','real-estate-realtor'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( REAL_ESTATE_REALTOR_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','real-estate-realtor'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','real-estate-realtor'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( REAL_ESTATE_REALTOR_BUY_PRO ); ?>"><?php esc_html_e('Buy Pro', 'real-estate-realtor'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>
<?php

add_action( 'admin_menu', 'dropshipping_store_gettingstarted' );
function dropshipping_store_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'dropshipping-store'), esc_html__('Theme Demo Import', 'dropshipping-store'), 'edit_theme_options', 'dropshipping-store-guide-page', 'dropshipping_store_guide');   
}

function dropshipping_store_admin_theme_style() {
   wp_enqueue_style('dropshipping-store-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
   wp_enqueue_script('dropshipping-store-tab', esc_url( get_template_directory_uri() ) . '/inc/dashboard/js/get_started_tab.js');

   // Admin notice code START
	wp_register_script('dropshipping-store-notice', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/notice.js', array('jquery'), time(), true);
	wp_enqueue_script('dropshipping-store-notice');
	// Admin notice code END
}
add_action('admin_enqueue_scripts', 'dropshipping_store_admin_theme_style');

// Notice after Theme Activation
// add_action('admin_notices', 'dropshipping_store_activation_notice');

function dropshipping_store_notice(){
    // Hide permanently if dismissed
    if ( get_option('dropshipping_store_admin_notice') == 1 ) {
        return;
    }
    // Hide ONLY on Get Started page
    if ( isset($_GET['page']) && $_GET['page'] === 'dropshipping-store-guide-page' ) {
        return;
    }  {?>
    <div id="dropshipping-store-welcome-notice" class="notice notice-success is-dismissible getting_started activation-notice">
		<div class="notice-info">
			<div class="notice-image">
				<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
			</div>
			<div class="notice-content">
				<h2><?php esc_html_e( 'Thanks For Installing Dropshipping Store, You Rock!', 'dropshipping-store' ) ?> </h2>
				<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional charity website. Please Click on the link below to know the theme setup information.', 'dropshipping-store' ) ?></p>
				<div style="display: grid;">
					<a class="button notice-btn" href="<?php echo esc_url( admin_url( 'themes.php?page=dropshipping-store-guide-page' )); ?>"><?php esc_html_e( 'Get Started', 'dropshipping-store' ) ?></a>
					<a class="button notice-btn" target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_LIVE_DEMO ); ?>"><?php esc_html_e('Pro Demo', 'dropshipping-store') ?></a>
					<a  class="button notice-btn" target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_BUY_PRO ); ?>"><?php esc_html_e('Upgrade To Pro', 'dropshipping-store') ?></a>
					<a  class="button notice-btn" target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_FREE_DOC ); ?>"><?php esc_html_e('Free Doc', 'dropshipping-store') ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php }
}
//Hook (VERY IMPORTANT)
add_action('admin_notices', 'dropshipping_store_notice');

// Admin notice code START
add_action('wp_ajax_dropshipping_store_dismiss_notice', 'dropshipping_store_dismiss_notice');
function dropshipping_store_dismiss_notice() {
    update_option('dropshipping_store_admin_notice', 1);
    wp_die();
}

//After Switch theme function
add_action('after_switch_theme', 'dropshipping_store_getstart_setup_options');
function dropshipping_store_getstart_setup_options () {
    delete_option('dropshipping_store_admin_notice');
}
// Admin notice code END

/**
 * Theme Info Page
 */
function dropshipping_store_guide() {

	// Theme info
	$dropshipping_store_return = add_query_arg( array()) ;
	$dropshipping_store_theme = wp_get_theme( 'dropshipping-store' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
		    <div>
                <h2 class="tgmpa-notice-warning"></h2>
            </div>
		</div>
		<div class="tab-sec">
			<div class="tab">
				<button role="tab" class="tablinks home" onclick="dropshipping_store_openCity(event, 'bwp_getstart')"><?php esc_html_e( 'Theme Demo Import', 'dropshipping-store' ); ?></button>
				<button role="tab" class="tablinks" onclick="dropshipping_store_openCity(event, 'bwp_setup')"><?php esc_html_e( 'Free Theme Information', 'dropshipping-store' ); ?></button>
				<button role="tab" class="tablinks" onclick="dropshipping_store_openCity(event, 'bwp_premium_info')"><?php esc_html_e( 'Premium Theme Information', 'dropshipping-store' ); ?></button>
				<a class="tablinks tablinks-demo" role="tab" href="<?php echo esc_url( DROPSHIPPING_STORE_LIVE_DEMO ); ?>" target="_blank">
					<?php esc_html_e( 'Live Demo', 'dropshipping-store' ); ?>
				</a>
				<a class="tablinks tablinks-pro" role="tab" href="<?php echo esc_url( DROPSHIPPING_STORE_BUY_PRO ); ?>" target="_blank">
					<?php esc_html_e( 'Buy Pro', 'dropshipping-store' ); ?>
				</a>
			</div>
			<div  id="bwp_getstart" class="tabcontent">
				<div class="row">
					<div class="col-md-5 intro">
						<div class="pad-box">
							<h2><?php esc_html_e( 'Welcome to Dropshipping Store ', 'dropshipping-store' ); ?>
							<span><?php esc_html_e( 'Version: ', 'dropshipping-store' ); ?><?php echo esc_html($dropshipping_store_theme['Version']);?></span>
							</h2>
							<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'dropshipping-store' ); ?>
							</span>
							<div class="powered-by">
								<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'dropshipping-store' ); ?></strong></p>
								<p>
									<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
								</p>
								<div class="demo-content">
									<?php
										/* Demo Import */
										require get_parent_theme_file_path( '/inc/dashboard/demo-content.php' );
									?>
								</div>

								<div id="demo-import-loader">
									<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/spinner.gif'); ?>" alt="<?php echo esc_attr( 'Loading...', 'dropshipping-store'); ?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="install-plugins">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="<?php echo esc_attr( 'responsive-image', 'dropshipping-store'); ?>" />
						</div>
					</div>
				</div>
				<div class="dashboard__blocks">
					<div class="row">
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Get Support','dropshipping-store'); ?></h3>
							<ol>
								<li><a target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','dropshipping-store'); ?></a></li>
								<li><a target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','dropshipping-store'); ?></a></li>
							</ol>
						</div>
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Getting Started','dropshipping-store'); ?></h3>
							<ol>
								<li><?php esc_html_e( 'Start','dropshipping-store'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','dropshipping-store'); ?></a> <?php esc_html_e( 'your website.','dropshipping-store'); ?> </li>
							</ol>
						</div>
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Help Docs','dropshipping-store'); ?></h3>
							<ol>
								<li><a target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','dropshipping-store'); ?></a></li>
								<li><a target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','dropshipping-store'); ?></a></li>
							</ol>
						</div>
						<div class="col-md-3">
							<h3><?php esc_html_e( 'Buy Premium','dropshipping-store'); ?></h3>
							<ol>
								<a href="<?php echo esc_url( DROPSHIPPING_STORE_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'dropshipping-store'); ?></a>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div  id="bwp_setup" class="tabcontent">
				<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1) Setup Dropshipping Store Theme', 'dropshipping-store' ); ?></h2>
				<div class="row">
					<div class="theme-instruction-block col-md-7">
						<div class="pad-box">
							<p><?php esc_html_e( 'Dropshipping Store is an ideal choice for anyone looking to create a professional eCommerce platform for their business. Perfect for online retail, digital storefronts, and marketplace websites, this multi-purpose theme caters to various industries including daily offers, product listings, supply chain management, inventory control, and shipping solutions. Its sleek, user-friendly design ensures that even beginners can easily set up a fully functional dropshipping website. Built with a powerful eCommerce plugin for seamless product management, payment integration, and order tracking, it provides everything you need to run a profitable dropshipping business. The responsive, retina-ready layout adapts perfectly to all devices, offering smooth browsing and secure shopping experiences for customers. Personalization options allow you to tailor colors, fonts, and layouts to match your brand identity, while the ready-to-use design helps you launch your store quickly. Featuring dynamic animations, clean code, testimonial and team sections, and banner areas to highlight products, offers, or affiliate deals, it combines functionality with aesthetics. The SEO-optimized structure improves search visibility, while fast page loading and multiple Call to Action (CTA) buttons enhance conversions. Whether you’re building a dropshipping business, multi-vendor marketplace, or general online store, this multi-purpose theme with a fully responsive design offers a powerful foundation for growing your eCommerce presence.', 'dropshipping-store' ); ?><p><br>
							<ol>
								<li><?php esc_html_e( 'Start','dropshipping-store'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','dropshipping-store'); ?></a> <?php esc_html_e( 'your website.','dropshipping-store'); ?> </l>
								<li><?php esc_html_e( 'Dropshipping Store','dropshipping-store'); ?> <a target="_blank" href="<?php echo esc_url( DROPSHIPPING_STORE_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','dropshipping-store'); ?></a> </li>
							</ol>
						</div>
					</div>
					<div class="col-md-5">
						<div class="pad-box">
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
						</div>
					</div>	
				</div>
			</div>
			<div class="col-md-12 text-block tabcontent"  id="bwp_premium_info">
				<h2 class="dashboard-install-title"><?php esc_html_e( '2) Premium Theme Information.','dropshipping-store'); ?></h2>
				<div class="row">
					<div class="col-md-7">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="<?php echo esc_attr( 'responsive-image', 'dropshipping-store'); ?>">
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Description','dropshipping-store'); ?></h3>
							<p class="pad-box-p"><?php esc_html_e( 'Dropshipping businesses are seeing huge growth and in order to make your business scale new heights, we have this Dropshipping Store WordPress Theme. As the evolution of eCommerce has led to the evolution of such businesses, you will see many top-notch WordPress themes supporting Woocommerce coming to the market. However, this theme is specifically created for dropshipping business websites so that such businesses can see their growth and flourish online. Such websites need a strong store management system and considering these needs, our developers have designed such a theme that perfectly complements this business. Unappealing websites with slow loading pages dont stand in the competition and visitors leave such sites immediately if your pages dont load within a second or two. So our developers have pushed themselves to bring a visually appealing design in the form of this Dropshipping Store WordPress Theme that looks unique and consists of highly optimized codes. These codes result in a streamlined and lightweight design that delivers fast-loading pages. Its Woocommerce compatibility makes setting up an online store a piece of cake. With this, selling the products online is no more a herculean task for you.', 'dropshipping-store' ); ?><p>
						</div>
					</div>
					<div class="col-md-5 install-plugin-right">
						<div class="pad-box">
							<h3><?php esc_html_e( 'Pro Theme Features','dropshipping-store'); ?></h3>
							<div class="dashboard-install-benefit">
								<ul>
									<li><?php esc_html_e( 'Car listing Shortcode with category','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Car listing Shortcode','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Multiple image feature for each property with slider.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Brand Listing Section','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Car Brand(categories) Option','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Car Tags(categories) Option','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Testimonial listing.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Testimonial shortcode.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Social icons widget.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Latest post with the image widget.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Live customize editor for the About US section.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Font Awesome integrated.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Advanced Color options and color pallets.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( '100+ Font Family Options.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Enable-Disable options on All sections.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Sticky post & Comment threads.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Left and Right Sidebar.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Customizable Home Page.','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Footer Widgets & Editor style','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Gallery & Banner functionality','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Multiple inner page templates','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Full-width Template','dropshipping-store'); ?></li>
									<li><?php esc_html_e( 'Custom Menu, Colors Editor','dropshipping-store'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php }?>
<div class="theme-offer">
	<?php
        // Check if the demo import has been completed
        $dropshipping_store_demo_import_completed = get_option('dropshipping_store_demo_import_completed', false);

        // If the demo import is completed, display the "View Site" button
        if ($dropshipping_store_demo_import_completed) {
        echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'dropshipping-store') . '</p>';
        echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'dropshipping-store') . '</a></span>';
        }
		
        if (isset($_POST['submit'])) {

            //Check if WooCommerce is installed and activated
            if (!is_plugin_active('woocommerce/woocommerce.php')) {
                // Install the plugin if it doesn't exist
                $dropshipping_store_plugin_slug = 'woocommerce';
                $dropshipping_store_plugin_file = 'woocommerce/woocommerce.php';

                // Check if plugin is installed
                $dropshipping_store_installed_plugins = get_plugins();
                if (!isset($dropshipping_store_installed_plugins[$dropshipping_store_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                    // Install the plugin
                    $dropshipping_store_upgrader = new Plugin_Upgrader();
                    $dropshipping_store_upgrader->install('https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($dropshipping_store_plugin_file);
            }

            //Check if GTranslate is installed and activated
            if (!is_plugin_active('gtranslate/gtranslate.php')) {
                // Install the plugin if it doesn't exist
                $dropshipping_store_plugin_slug = 'gtranslate';
                $dropshipping_store_plugin_file = 'gtranslate/gtranslate.php';

                // Check if plugin is installed
                $dropshipping_store_installed_plugins = get_plugins();
                if (!isset($dropshipping_store_installed_plugins[$dropshipping_store_plugin_file])) {
                    include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                    include_once(ABSPATH . 'wp-admin/includes/file.php');
                    include_once(ABSPATH . 'wp-admin/includes/misc.php');
                    include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

                    // Install the plugin
                    $dropshipping_store_upgrader = new Plugin_Upgrader();
                    $dropshipping_store_upgrader->install('https://downloads.wordpress.org/plugin/gtranslate.latest-stable.zip');
                }
                // Activate the plugin
                activate_plugin($dropshipping_store_plugin_file);
            }

            // ------- Create Nav Menu --------
            $dropshipping_store_menuname = 'Main Menus';
            $dropshipping_store_bpmenulocation = 'primary';
            $dropshipping_store_menu_exists = wp_get_nav_menu_object($dropshipping_store_menuname);

            if (!$dropshipping_store_menu_exists) {
                $dropshipping_store_menu_id = wp_create_nav_menu($dropshipping_store_menuname);

                // Create Home Page
                $dropshipping_store_home_title = 'Home';
                $dropshipping_store_home = array(
                    'post_type' => 'page',
                    'post_title' => $dropshipping_store_home_title,
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'home'
                );
                $dropshipping_store_home_id = wp_insert_post($dropshipping_store_home);
                // Assign Home Page Template
                add_post_meta($dropshipping_store_home_id, '_wp_page_template', 'page-template/home-page.php');
                // Update options to set Home Page as the front page
                update_option('page_on_front', $dropshipping_store_home_id);
                update_option('show_on_front', 'page');
                // Add Home Page to Menu
                wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title' => __('Home', 'dropshipping-store'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $dropshipping_store_home_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Create About Us Page with Dummy Content
                $dropshipping_store_about_title = 'About Us';
                $dropshipping_store_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $dropshipping_store_about = array(
                    'post_type' => 'page',
                    'post_title' => $dropshipping_store_about_title,
                    'post_content' => $dropshipping_store_about_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'about-us'
                );
                $dropshipping_store_about_id = wp_insert_post($dropshipping_store_about);
                // Add About Us Page to Menu
                wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title' => __('About Us', 'dropshipping-store'),
                    'menu-item-classes' => 'about-us',
                    'menu-item-url' => home_url('/about-us/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $dropshipping_store_about_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                /* Create Shoes Pag* */
                $dropshipping_store_shoes_title = 'Shoes';
                $dropshipping_store_shoes_content = 'Browse our latest collection of stylish and comfortable shoes.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.';

                $dropshipping_store_shoes = array(
                    'post_type'    => 'page',
                    'post_title'   => $dropshipping_store_shoes_title,
                    'post_content' => $dropshipping_store_shoes_content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_name'    => 'shoes'
                );
                $dropshipping_store_shoes_id = wp_insert_post($dropshipping_store_shoes);

                // Add Shoes Page to Menu
                wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title'   => __('Shoes', 'dropshipping-store'),
                    'menu-item-classes' => 'shoes',
                    'menu-item-url'     => home_url('/shoes/'),
                    'menu-item-status'  => 'publish',
                    'menu-item-object-id' => $dropshipping_store_shoes_id,
                    'menu-item-object'  => 'page',
                    'menu-item-type'    => 'post_type'
                ));


                /* Create Pages Pag* */
                $dropshipping_store_pages_title = 'Pages';
                $dropshipping_store_pages_content = 'Explore all informational pages available on our store.';

                $dropshipping_store_pages = array(
                    'post_type'    => 'page',
                    'post_title'   => $dropshipping_store_pages_title,
                    'post_content' => $dropshipping_store_pages_content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_name'    => 'pages'
                );
                $dropshipping_store_pages_id = wp_insert_post($dropshipping_store_pages);

                // Add Pages Page to Menu
                wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title'   => __('Pages', 'dropshipping-store'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url'     => home_url('/pages/'),
                    'menu-item-status'  => 'publish',
                    'menu-item-object-id' => $dropshipping_store_pages_id,
                    'menu-item-object'  => 'page',
                    'menu-item-type'    => 'post_type'
                ));


                /* Create Product Pag* */
                $dropshipping_store_product_title = 'Product';
                $dropshipping_store_product_content = 'View detailed information about our featured products and offers.';

                $dropshipping_store_product = array(
                    'post_type'    => 'page',
                    'post_title'   => $dropshipping_store_product_title,
                    'post_content' => $dropshipping_store_product_content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                    'post_name'    => 'product'
                );
                $dropshipping_store_product_id = wp_insert_post($dropshipping_store_product);

                // Add Product Page to Menu
                wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title'   => __('Product', 'dropshipping-store'),
                    'menu-item-classes' => 'product',
                    'menu-item-url'     => home_url('/product/'),
                    'menu-item-status'  => 'publish',
                    'menu-item-object-id' => $dropshipping_store_product_id,
                    'menu-item-object'  => 'page',
                    'menu-item-type'    => 'post_type'
                ));

                 // Create Blog Page 
                $dropshipping_store_blog_page_title = 'Blog';
                $dropshipping_store_blog_page_query = new WP_Query(array(
                    'post_type'      => 'page',
                    'name'           => sanitize_title($dropshipping_store_blog_page_title),
                    'post_status'    => 'publish',
                    'posts_per_page' => 1
                ));
                if (!$dropshipping_store_blog_page_query->have_posts()) {
                    $dropshipping_store_blog_page = array(
                    'post_type'   => 'page',
                    'post_title'  => $dropshipping_store_blog_page_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    );
                    $dropshipping_store_blog_page_id = wp_insert_post($dropshipping_store_blog_page);
                    update_option('page_for_posts', $dropshipping_store_blog_page_id);

                    wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title'      => __('Blog', 'dropshipping-store'),
                    'menu-item-url'        => get_permalink($dropshipping_store_blog_page_id),
                    'menu-item-status'     => 'publish',
                    'menu-item-object-id'  => $dropshipping_store_blog_page_id,
                    'menu-item-object'     => 'page',
                    'menu-item-type'       => 'post_type',
                    ));
                }

                // Create Pages Page with Dummy Content
                $dropshipping_store_contact_title = 'Contact Us';
                $dropshipping_store_contact_content = 'Explore all the contact we have on our website. Find information about our services, company, and more.
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more contactly with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
                $dropshipping_store_contact = array(
                    'post_type' => 'page',
                    'post_title' => $dropshipping_store_contact_title,
                    'post_content' => $dropshipping_store_contact_content,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_slug' => 'contact'
                );
                $dropshipping_store_contact_id = wp_insert_post($dropshipping_store_contact);
                // Add Pages Page to Menu
                wp_update_nav_menu_item($dropshipping_store_menu_id, 0, array(
                    'menu-item-title' => __('Contact', 'dropshipping-store'),
                    'menu-item-classes' => 'contact',
                    'menu-item-url' => home_url('/contact/'),
                    'menu-item-status' => 'publish',
                    'menu-item-object-id' => $dropshipping_store_contact_id,
                    'menu-item-object' => 'page',
                    'menu-item-type' => 'post_type'
                ));

                // Set the menu location if it's not already set
                if (!has_nav_menu($dropshipping_store_bpmenulocation)) {
                    $dropshipping_store_locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
                    if (empty($dropshipping_store_locations)) {
                        $dropshipping_store_locations = array();
                    }
                    $dropshipping_store_locations[$dropshipping_store_bpmenulocation] = $dropshipping_store_menu_id;
                    set_theme_mod('nav_menu_locations', $dropshipping_store_locations);
                }
            }

            //Header
            set_theme_mod('dropshipping_store_show_top_header', true);
            set_theme_mod('dropshipping_store_topbar_text', 'Welcome To Dropshipping Online');
            set_theme_mod('dropshipping_store_phone_text', '24/7 support');
            set_theme_mod('dropshipping_store_phone_number', '+123 456 7890');
            set_theme_mod('dropshipping_store_wishlist_link', '#');

            //Slider
            set_theme_mod('dropshipping_store_slider_hide', true);
            set_theme_mod('dropshipping_store_slider_small_title', 'Best Deals!');
            set_theme_mod('dropshipping_store_slider_button_text', 'SHOP NOW');
            for($dropshipping_store_i=1;$dropshipping_store_i<=4;$dropshipping_store_i++){
                $dropshipping_store_slider_title = array(
                    'SMART HEADPHONE',
                    'MODERN TECHNOLOGY',
                    'SMART PHONE',
                    'MODERN TECH'
                );
                $dropshipping_store_current_title = $dropshipping_store_slider_title[$dropshipping_store_i - 1];
                $dropshipping_store_slider_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,';
                // Create post object
                $dropshipping_store_my_post = array(
                'post_title'    => wp_strip_all_tags( $dropshipping_store_current_title ),
                'post_content'  => $dropshipping_store_slider_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                );
 
                // Insert the post into the database
                $dropshipping_store_post_id = wp_insert_post( $dropshipping_store_my_post );
 
                if ($dropshipping_store_post_id) {
                  // Set the theme mod for the slider page
                  set_theme_mod('dropshipping_store_slider_setting' . $dropshipping_store_i, $dropshipping_store_post_id);
 
                   $dropshipping_store_image_url = get_template_directory_uri().'/images/slider'.$dropshipping_store_i.'.png';
 
                 $dropshipping_store_image_id = media_sideload_image($dropshipping_store_image_url, $dropshipping_store_post_id, null, 'id');
 
                     if (!is_wp_error($dropshipping_store_image_id)) {
                         // Set the downloaded image as the post's featured image
                         set_post_thumbnail($dropshipping_store_post_id, $dropshipping_store_image_id);
                     }
                 }
            } 

            //Featured Section
            set_theme_mod('dropshipping_store_product_enable', true);
            set_theme_mod('dropshipping_store_product_section_title', 'Featured Product');
            set_theme_mod('dropshipping_store_product_slide', 'productcategory1');

            // Define product category names, product titles, and tags
            $dropshipping_store_category_names = array('productcategory1', 'productcategory2', 'productcategory3');
            $dropshipping_store_title_array = array(
                array("Stylish Dummy Chronograph Watch", "Stylish Dummy Chronograph Laptop", "Stylish Dummy Chronograph Headphone"),
                array("Stylish Dummy Chronograph Watch", "Stylish Dummy Chronograph Laptop", "Stylish Dummy Chronograph Headphone"),
                array("Stylish Dummy Chronograph Watch", "Stylish Dummy Chronograph Laptop", "Stylish Dummy Chronograph Headphone")
            );

            foreach ($dropshipping_store_category_names as $dropshipping_store_index => $dropshipping_store_category_name) {
                // Create or retrieve the product category term ID
                $dropshipping_store_term = term_exists($dropshipping_store_category_name, 'product_cat');
                
                // If the term doesn't exist, create it
                if ($dropshipping_store_term === 0 || $dropshipping_store_term === null) {
                    $dropshipping_store_term = wp_insert_term($dropshipping_store_category_name, 'product_cat');
                }
                
                // Check for errors in category creation
                if (is_wp_error($dropshipping_store_term)) {
                    error_log('Error creating category: ' . $dropshipping_store_term->get_error_message());
                    continue; // Skip to the next iteration if category creation fails
                }

                // Retrieve the category ID for assignment
                $dropshipping_store_term_id = $dropshipping_store_term['term_id'];

                // Loop to create 4 products for each category
                for ($dropshipping_store_i = 0; $dropshipping_store_i < 3; $dropshipping_store_i++) {
                    // Create product content
                    $dropshipping_store_title = $dropshipping_store_title_array[$dropshipping_store_index][$dropshipping_store_i];
                    $dropshipping_store_content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

                    // Create product post object
                    $dropshipping_store_my_post = array(
                        'post_title'    => wp_strip_all_tags($dropshipping_store_title),
                        'post_content'  => $dropshipping_store_content,
                        'post_status'   => 'publish',
                        'post_type'     => 'product', // Post type set to 'product'
                    );

                    // Insert the product into the database
                    $dropshipping_store_post_id = wp_insert_post($dropshipping_store_my_post);

                    // Check for errors in product creation
                    if (is_wp_error($dropshipping_store_post_id)) {
                        error_log('Error creating product: ' . $dropshipping_store_post_id->get_error_message());
                        continue; // Skip to the next product if creation fails
                    }

                    // Assign the category to the product
                    wp_set_object_terms($dropshipping_store_post_id, array($dropshipping_store_term_id), 'product_cat');
                    
                    // Set product as simple product and assign price
                    update_post_meta($dropshipping_store_post_id, '_regular_price', 450.00); // Assign regular price
                    update_post_meta($dropshipping_store_post_id, '_price', 450.00); // Set current price (sale price)

                    // Handle the featured image using media_sideload_image
                    $dropshipping_store_image_url = get_template_directory_uri() . '/images/product' . ($dropshipping_store_i + 1) . '.png';
                    $dropshipping_store_image_id = media_sideload_image($dropshipping_store_image_url, $dropshipping_store_post_id, null, 'id');

                    // Check if there was an error downloading the image
                    if (is_wp_error($dropshipping_store_image_id)) {
                        error_log('Error downloading image: ' . $dropshipping_store_image_id->get_error_message());
                        continue; // Skip to the next product if image download fails
                    }

                    // Assign featured image to product
                    set_post_thumbnail($dropshipping_store_post_id, $dropshipping_store_image_id);
                }
            }

            // Set the demo import completion flag
    		update_option('dropshipping_store_demo_import_completed', true);
    		// Display success message and "View Site" button
    		echo '<p class="notice-text">' . esc_html__('Your demo import has been completed successfully.', 'dropshipping-store') . '</p>';
    		echo '<span><a href="' . esc_url(home_url()) . '" class="button button-primary site-btn" target="_blank">' . esc_html__('VIEW SITE', 'dropshipping-store') . '</a></span>';
            //end

        }
    ?>

    <form action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=dropshipping-store-guide-page" method="POST" onsubmit="return validate(this);">
    <?php if (!get_option('dropshipping_store_demo_import_completed')) : ?>
        <form method="post">
        <p><?php esc_html_e('Click the below run importer button to import demo content','dropshipping-store'); ?></p>
            <input class= "run-import" type="submit" name="submit" value="<?php esc_attr_e('Run Importer','dropshipping-store'); ?>" class="button button-primary button-large">
        </form>
    <?php endif; ?>
    </form>
	<script type="text/javascript">
		function validate(valid) {
            if ( confirm("Do you really want to import the theme demo content?")) {
                // Show loader
                document.getElementById('demo-import-loader').style.display = 'block';
                
                // Submit form
                document.forms[0].submit();
            } else {
                return false;
            }
		}
	</script>
</div>

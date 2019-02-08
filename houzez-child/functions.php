<?php

require_once( get_theme_file_path() . '/framework/functions/property_functions.php' );
// require_once( get_theme_file_path() . '/framework/functions/helper_functions.php' );

function tft_change_taxonomy_property_status_label() {
    $t = get_taxonomy('property_status');
    $t->labels->singular_name = 'Action';
    $t->labels->menu_name = 'Action';
    $t->labels->all_items = 'All Actions';
    $t->labels->parent_item = 'Parent Action';
    $t->labels->parent_item_colon = 'Parent Action:';
    $t->labels->new_item_name = 'New Action';
    $t->labels->add_new_item = 'Add New Action';
    $t->labels->edit_item = 'Edit Action';
    $t->labels->update_item = 'Update Action';
    $t->labels->separate_items_with_commas = 'Separate Actions with commas';
    $t->labels->search_items = 'Search Actions';
    $t->labels->add_or_remove_items = 'Add or remove Actions';
    $t->labels->choose_from_most_used = 'Choose from the most used Actions';
}

add_action('wp_loaded', 'tft_change_taxonomy_property_status_label', 20);
add_action('init', 'create_extra_taxonomies');

function create_extra_taxonomies() {
    register_taxonomy(
            'services', 'property', array(
        'label' => __('Services'),
        'rewrite' => array('slug' => 'services'),
        'hierarchical' => true,
            )
    );
    register_taxonomy(
            'home_appliances', 'property', array(
        'label' => __('Home Appliances'),
        'rewrite' => array('slug' => 'home_appliances'),
        'hierarchical' => true,
            )
    );

    register_taxonomy(
            'beaches', 'property', array(
        'label' => __('Beaches'),
        'rewrite' => array('slug' => 'beaches'),
        'hierarchical' => true,
            )
    );
}

function my_comments_filter() {
    $args = array(
        'public' => true,
        '_builtin' => false
    );
    $post_types = get_post_types($args, 'objects'); // we get the post types as objects

    if ($post_types) {
        echo '<select name="post_type" id="filter-by-post-type">';
        echo '<option value="">' . __('All post types', 'houzezhouzez') . '</option>';
        $post_selected = (isset($_GET['post_type'])) ? $_GET['post_type'] : "";
        foreach ($post_types as $post_type) {
            $label = $post_type->label;
            $name = $post_type->name;
            if ($name == $post_selected) {
                echo '<option value="' . $name . '" selected="selected">' . $label . '</option>';
            } else {
                echo '<option value="' . $name . '">' . $label . '</option>';
            }
        }
        echo '</select>';
    }
}

// we add our action to the 'restrict_manage_comments' hook so that our new select field get listet at the comments page
add_action('restrict_manage_comments', 'my_comments_filter');


require get_stylesheet_directory() . '/inc/header/custom-navbar.php';



function smallenvelop_widgets_init() {
   register_sidebar(array(
        'name' => esc_html__('Property Listing 1', 'houzez'),
        'id' => 'property-listing-1',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-property-listing-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Property Listing 2', 'houzez'),
        'id' => 'property-listing-2',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-property-listing-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Property Listing 3', 'houzez'),
        'id' => 'property-listing-3',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-property-listing-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Search Result 1', 'houzez'),
        'id' => 'search-result-1',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-search-result-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Search Result 2', 'houzez'),
        'id' => 'search-result-2',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-search-result-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Search Result 3', 'houzez'),
        'id' => 'search-result-3',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-search-result-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Property Detail 1', 'houzez'),
        'id' => 'property-detail-1',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-property-detail-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Property Detail 2', 'houzez'),
        'id' => 'property-detail-2',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-property-detail-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
   register_sidebar(array(
        'name' => esc_html__('Property Detail 3', 'houzez'),
        'id' => 'property-detail-3',
        'description' => esc_html__('Widgets in this area will be show in footer column four', 'houzez'),
        'before_widget' => '<div id="%1$s" class="inner-property-detail-widget-area %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-top"><h3 class="widget-title">',
        'after_title' => '</h3></div>',
    ));
}
add_action( 'widgets_init', 'smallenvelop_widgets_init' );

/*add custom class in body*/
add_filter( 'body_class', 'my_neat_body_class');
function my_neat_body_class( $classes ) {
    
    $adv_search = get_post_meta(get_the_ID(), 'fave_adv_search', true);
    $header_type = get_post_meta(get_the_ID(), 'fave_header_type', true);

    if ($header_type == 'tz_header_style') {
            
        $classes[] = 'tz-header';
    }
    if ( is_page(1672))
        $classes[] = 'search-result-page';
    return $classes; 
}

//included css and js files
function my_scripts_and_styles() { 

    global $paged, $post, $current_user;
        $property_lat = $property_map = $property_streetView = $is_singular_property = $header_type = $login_redirect = '';
        $property_lng = $google_map_needed = $fave_main_menu_trans = $header_map_selected_city = $fave_adv_search_enable = $current_template = $markerPricePins = '';
        $advanced_search_rent_status = $advanced_search_price_range_rent_status = 'for-rent';
        $content_has_map_shortcode = false;
        $max_file_size = 100 * 1000 * 1000;
        wp_get_current_user();
        $houzez_date_language = houzez_option('houzez_date_language');
        $userID = $current_user->ID;

        $markerPricePins = houzez_option('markerPricePins');
        if(isset($_GET['marker']) && $_GET['marker'] == 'pricePins') {
            $markerPricePins = 'yes';
        }

        $protocol = is_ssl() ? 'https' : 'http';

        $houzez_logged_in = 'yes';
        if (!is_user_logged_in()) {
            $houzez_logged_in = 'no';
        }

        if (is_rtl()) {
            $houzez_rtl = "yes";
        } else {
            $houzez_rtl = "no";
        }

        if (isset($_GET['sortby'])) {
            $sort_by = $_GET['sortby'];
        }

        $houzez_default_radius = houzez_option('houzez_default_radius');
        if (isset($_GET['radius'])) {
            $houzez_default_radius = $_GET['radius'];
        }

        $enable_reCaptcha = houzez_option('enable_reCaptcha');
        $recaptha_site_key = houzez_option('recaptha_site_key');
        $recaptha_secret_key = houzez_option('recaptha_secret_key');

        $houzez_primary_color = houzez_option('houzez_primary_color');

        $prop_no_halfmap = 10;
        $meta_states = $meta_locations = $meta_types = $meta_status = $meta_features = $meta_labels = $meta_area = $meta_min_price = $meta_max_price = $sort_halfmap = '';
        if (is_page_template(array('template/property-listings-map.php'))) {
            $meta_states = get_post_meta($post->ID, 'fave_states', false);
            $meta_locations = get_post_meta($post->ID, 'fave_locations', false);
            $meta_types = get_post_meta($post->ID, 'fave_types', false);
            $meta_status = get_post_meta($post->ID, 'fave_status', false);
            $meta_features = get_post_meta($post->ID, 'fave_features', false);
            $meta_labels = get_post_meta($post->ID, 'fave_labels', false);
            $meta_area = get_post_meta($post->ID, 'fave_area', false);
            $meta_min_price = get_post_meta($post->ID, 'fave_min_price', true);
            $meta_max_price = get_post_meta($post->ID, 'fave_max_price', true);
            $prop_no_halfmap = get_post_meta($post->ID, 'fave_prop_no_halfmap', true);
            $sort_halfmap = get_post_meta($post->ID, 'fave_properties_sort_halfmap', true);
        }

        $search_feature = array();
        $search_rules = array();
        $enable_radius_search = houzez_option('enable_radius_search');
        $enable_radius_search_halfmap = houzez_option('enable_radius_search_halfmap');
        $search_result_page = houzez_option('search_result_page');
        $search_keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';
        $search_feature = isset($_GET['feature']) ? ($_GET['feature']) : $meta_features;
        $search_rules = isset($_GET['rules']) ? ($_GET['rules']) : '';
        $search_country = isset($_GET['country']) ? sanitize_text_field($_GET['country']) : '';
        $search_state = isset($_GET['state']) ? sanitize_text_field($_GET['state']) : $meta_states;
        $search_city = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : $meta_locations;
        $search_area = isset($_GET['area']) ? sanitize_text_field($_GET['area']) : $meta_area;
        $search_status = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : $meta_status;
        $search_label = isset($_GET['label']) ? sanitize_text_field($_GET['label']) : $meta_labels;
        $search_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : $meta_types;
        $search_bedrooms = isset($_GET['bedrooms']) ? sanitize_text_field($_GET['bedrooms']) : '';
        $search_bathrooms = isset($_GET['bathrooms']) ? sanitize_text_field($_GET['bathrooms']) : '';
        $search_min_price = isset($_GET['min-price']) ? sanitize_text_field($_GET['min-price']) : $meta_min_price;
        $search_max_price = isset($_GET['max-price']) ? sanitize_text_field($_GET['max-price']) : $meta_max_price;
        $search_currency = isset($_GET['currency']) ? sanitize_text_field($_GET['currency']) : '';
        $search_min_area = isset($_GET['min-area']) ? sanitize_text_field($_GET['min-area']) : '';
        $search_max_area = isset($_GET['max-area']) ? sanitize_text_field($_GET['max-area']) : '';
        $search_property_id = isset($_GET['property_id']) ? sanitize_text_field($_GET['property_id']) : '';
        $search_publish_date = isset($_GET['publish_date']) ? sanitize_text_field($_GET['publish_date']) : '';
        $sort_by = isset($_GET['sortby']) ? sanitize_text_field($_GET['sortby']) : $sort_halfmap;
        $guest = isset($_GET['guest']) ? sanitize_text_field($_GET['guest']) : '';

        $search_location = isset($_GET['search_location']) ? esc_attr($_GET['search_location']) : false;
        $use_radius = 'on';
        $search_lat = isset($_GET['lat']) ? (float)$_GET['lat'] : false;
        $search_long = isset($_GET['lng']) ? (float)$_GET['lng'] : false;
        $search_radius = isset($_GET['radius']) ? (int)$_GET['radius'] : false;

        $geo_country_limit = houzez_option('geo_country_limit');
        $geocomplete_country = '';
        if ($geo_country_limit != 0) {
            $geocomplete_country = houzez_option('geocomplete_country');
        }

        // Retina Logos
        $simple_logo = houzez_option('custom_logo', '', 'url');
        $retina_logo_url = houzez_option('retina_logo', '', 'url');
        $retina_mobilelogo_url = houzez_option('mobile_retina_logo', '', 'url');
        $retina_logo_mobile_splash = houzez_option('retina_logo_mobile_splash', '', 'url');
        $retina_splash_logo_url = houzez_option('retina_logo_splash', '', 'url');
        $retina_logo_width = houzez_option('retina_logo_width');
        $retina_logo_height = houzez_option('retina_logo_height');
        $retina_logo_width = preg_replace('#[^0-9]#', '', strip_tags($retina_logo_width));
        $retina_logo_height = preg_replace('#[^0-9]#', '', strip_tags($retina_logo_height));

        $map_cluster = houzez_option('map_cluster', '', 'url');
        if (!empty($map_cluster)) {
            $clusterIcon = $map_cluster;
        } else {
            $clusterIcon = get_template_directory_uri() . '/images/map/cluster-icon.png';
        }

        if (!is_404() && !is_search() && !is_tax() && !is_author()) {
            $header_type = get_post_meta($post->ID, 'fave_header_type', true);
            $content_has_map_shortcode = has_shortcode(get_post_field('post_content', $post->ID), 'houzez-properties-map');
            $fave_main_menu_trans = get_post_meta($post->ID, 'fave_main_menu_trans', true);
            $header_map_selected_city = get_post_meta($post->ID, 'fave_map_city', false);
            $fave_adv_search_enable = get_post_meta($post->ID, 'fave_adv_search_enable', true);
            $current_template = get_page_template_slug($post->ID);
        }

        $property_top_area = houzez_option('prop-top-area');
        /* For demo purpose only */
        if (isset($_GET['s_top'])) {
            $property_top_area = $_GET['s_top'];
        }

        $keyword_field = houzez_option('keyword_field');
        $keyword_autocomplete = houzez_option('keyword_autocomplete');
        $advanced_search_rent_status_id = houzez_option('search_rent_status');
        $advanced_search_rent_status_id_price_range = houzez_option('search_rent_status_for_price_range');
        $measurement_unit_adv_search = houzez_option('measurement_unit_adv_search');
        if ($measurement_unit_adv_search == 'sqft') {
            $measurement_unit_adv_search = houzez_option('measurement_unit_sqft_text');
        } elseif ($measurement_unit_adv_search == 'sq_meter') {
            $measurement_unit_adv_search = houzez_option('measurement_unit_square_meter_text');
        }

        $thousands_separator = houzez_option('thousands_separator');

        if (taxonomy_exists('property_status')) {
            $term_exist = get_term_by('id', $advanced_search_rent_status_id, 'property_status');
            if ($term_exist) {
                $advanced_search_rent_status = get_term($advanced_search_rent_status_id, 'property_status');
                if (!is_wp_error($advanced_search_rent_status)) {
                    $advanced_search_rent_status = $advanced_search_rent_status->slug;
                }
            }

            $term_exist_2 = get_term_by('id', $advanced_search_rent_status_id_price_range, 'property_status');
            if ($term_exist_2) {
                $advanced_search_price_range_rent_status = get_term($advanced_search_rent_status_id_price_range, 'property_status');
                if (!is_wp_error($advanced_search_price_range_rent_status)) {
                    $advanced_search_price_range_rent_status = $advanced_search_price_range_rent_status->slug;
                }
            }

        }
        $multi_currency = houzez_option('multi_currency');
        $currency_symbol = houzez_option('currency_symbol');
        if($multi_currency == 1) { $currency_symbol = ''; }
        $after_login_redirect = houzez_option('login_redirect');
        $googlemap_ssl = houzez_option('googlemap_ssl');
        $googlemap_api_key = houzez_option('googlemap_api_key');
        $googlemap_zoom_level = houzez_option('googlemap_zoom_level');
        $googlemap_pin_cluster = houzez_option('googlemap_pin_cluster');
        $googlemap_zoom_cluster = houzez_option('googlemap_zoom_cluster');
        $main_search_enable = houzez_option('main-search-enable');
        $year_built_calender = houzez_option('year_built_calender');

        $advanced_search_widget_min_price = houzez_option('advanced_search_widget_min_price');
        if (empty($advanced_search_widget_min_price)) {
            $advanced_search_widget_min_price = '0';
        }
        $advanced_search_widget_max_price = houzez_option('advanced_search_widget_max_price');
        if (empty($advanced_search_widget_max_price)) {
            $advanced_search_widget_max_price = '2500000';
        }


        $advanced_search_min_price_range_for_rent = houzez_option('advanced_search_min_price_range_for_rent');
        if (empty($advanced_search_min_price_range_for_rent)) {
            $advanced_search_min_price_range_for_rent = '0';
        }
        $advanced_search_max_price_range_for_rent = houzez_option('advanced_search_max_price_range_for_rent');
        if (empty($advanced_search_max_price_range_for_rent)) {
            $advanced_search_max_price_range_for_rent = '6000';
        }


        $advanced_search_widget_min_area = houzez_option('advanced_search_widget_min_area');
        if (empty($advanced_search_widget_min_area)) {
            $advanced_search_widget_min_area = '0';
        }

        $advanced_search_widget_max_area = houzez_option('advanced_search_widget_max_area');
        if (empty($advanced_search_widget_max_area)) {
            $advanced_search_widget_max_area = '600';
        }

        if ($after_login_redirect == 'same_page') {

            if (is_tax()) {
                $login_redirect = get_term_link(get_query_var('term'), get_query_var('taxonomy'));
            } else {
                if (is_home() || is_front_page()) {
                    $login_redirect = site_url();
                } else {
                    if (!is_404() && !is_search() && !is_author()) {
                        $login_redirect = get_permalink($post->ID);
                    }
                }
            }

        } else {
            $login_redirect = houzez_option('login_redirect_link');
        }

        if (is_singular('property')) {
            $property_location = get_post_meta(get_the_ID(), 'fave_property_location', true);
            if (!empty($property_location)) {
                $lat_lng = explode(',', $property_location);
                $property_lat = $lat_lng[0];
                $property_lng = $lat_lng[1];

                $property_map = get_post_meta(get_the_ID(), 'fave_property_map', true);
                $property_streetView = get_post_meta(get_the_ID(), 'fave_property_map_street_view', true);
            }
            $is_singular_property = 'yes';
        }

        $houzez_show_captcha = 'no';
        if (is_singular('houzez_agent') || is_singular('houzez_agency') || is_singular('property') || is_author()) {
            $houzez_show_captcha = 'yes';
        }

        $minify_css = houzez_option('minify_css');
        $css_minify_prefix = '';
        if ($minify_css != 0) {
            $css_minify_prefix = '.min';
        }

        $minify_js = houzez_option('minify_js');
        $js_minify_prefix = '';
        if ($minify_js != 0) {
            $js_minify_prefix = '.min';
        }

    $custom_fields_array = array();
    //$custom_fields_half_map_array = array();
    if(class_exists('Houzez_Fields_Builder')) {
        $fields_array = Houzez_Fields_Builder::get_form_fields();
        
        if(!empty($fields_array)){
            foreach ( $fields_array as $value ){
                $field_title = $value->label;
                $field = $value->field_id;
                if($value->is_search == 'yes') {
                    $custom_fields_array[$field] = isset($_GET[$field]) ? sanitize_text_field($_GET[$field]) : '';
                }
                
            }
        }
    }

    $search_sea_distance = "";


    wp_enqueue_style('bootstrap.min', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.8', 'all');
    //wp_enqueue_style('lightgallery.min', get_stylesheet_directory_uri() . '/css/lightgallery.min.css', array(), '3.3.8', 'all');
    wp_enqueue_style('houzez-all', get_stylesheet_directory_uri() . '/css/all.min.css', array(), HOUZEZ_THEME_VERSION, 'all');
    wp_enqueue_style('houzez-main', get_stylesheet_directory_uri() . '/css/main' . $css_minify_prefix . '.css', array(), HOUZEZ_THEME_VERSION, 'all');
    wp_enqueue_style('bundle', get_stylesheet_directory_uri() . '/css/bundle.min.css', array(), '3.3.7', 'all');
    //wp_enqueue_style('font-awesome.min', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_script('swipe', get_stylesheet_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery'));
    wp_enqueue_script('my-custom-script', get_stylesheet_directory_uri() . '/js/bundle.min.js', array('jquery'), '5.0.5');
    wp_enqueue_script('lightgallery-all.min', get_stylesheet_directory_uri() . '/js/lightgallery-all.min.js', array('jquery'));

    $after_login_redirect = houzez_option('login_redirect');
    $googlemap_ssl = houzez_option('googlemap_ssl');
    $googlemap_api_key = houzez_option('googlemap_api_key');
    $googlemap_zoom_level = houzez_option('googlemap_zoom_level');
    $googlemap_pin_cluster = houzez_option('googlemap_pin_cluster');
    $googlemap_zoom_cluster = houzez_option('googlemap_zoom_cluster');
    $main_search_enable = houzez_option('main-search-enable');
    $year_built_calender = houzez_option('year_built_calender');




    // Ajax Calls
    wp_enqueue_script('houzez_ajax_calls', get_stylesheet_directory_uri() . '/js/houzez_ajax_calls' . $js_minify_prefix . '.js', array('jquery'), HOUZEZ_THEME_VERSION, true);
    wp_enqueue_script('houzez-plugins', get_stylesheet_directory_uri() . '/js/plugins.js', array('jquery'), HOUZEZ_THEME_VERSION, true);
    wp_localize_script('houzez_ajax_calls', 'HOUZEZ_ajaxcalls_vars',
        array(
            'admin_url' => get_admin_url(),
            'houzez_rtl' => $houzez_rtl,
            'redirect_type' => $after_login_redirect,
            'login_redirect' => $login_redirect,
            'login_loading' => esc_html__('Sending user info, please wait...', 'houzez'),
            'direct_pay_text' => esc_html__('Processing, Please wait...', 'houzez'),
            'user_id' => $userID,
            'transparent_menu' => $fave_main_menu_trans,
            'simple_logo' => $simple_logo,
            'retina_logo' => $retina_logo_url,
            'retina_logo_mobile' => $retina_mobilelogo_url,
            'retina_logo_mobile_splash' => $retina_logo_mobile_splash,
            'retina_logo_splash' => $retina_splash_logo_url,
            'retina_logo_height' => $retina_logo_height,
            'retina_logo_width' => $retina_logo_width,
            'property_lat' => $property_lat,
            'property_lng' => $property_lng,
            'property_map' => $property_map,
            'property_map_street' => $property_streetView,
            'is_singular_property' => $is_singular_property,
            'process_loader_refresh' => 'fa fa-spin fa-refresh',
            'process_loader_spinner' => 'fa fa-spin fa-spinner',
            'process_loader_circle' => 'fa fa-spin fa-circle-o-notch',
            'process_loader_cog' => 'fa fa-spin fa-cog',
            'success_icon' => 'fa fa-check',
            'set_as_featured' => esc_html__('Set as Featured', 'houzez'),
            'remove_featured' => esc_html__('Remove From Featured', 'houzez'),
            'prop_featured' => esc_html__('Featured', 'houzez'),
            'featured_listings_none' => esc_html__('You have used all the "Featured" listings in your package.', 'houzez'),
            'prop_sent_for_approval' => esc_html__('Sent for Approval', 'houzez'),
            'paypal_connecting' => esc_html__('Connecting to paypal, Please wait... ', 'houzez'),
            'mollie_connecting' => esc_html__('Connecting to mollie, Please wait... ', 'houzez'),
            'confirm' => esc_html__('Are you sure you want to delete?', 'houzez'),
            'confirm_featured' => esc_html__('Are you sure you want to make this a featured listing?', 'houzez'),
            'confirm_featured_remove' => esc_html__('Are you sure you want to remove from featured listing?', 'houzez'),
            'confirm_relist' => esc_html__('Are you sure you want to relist this property?', 'houzez'),
            'delete_property' => esc_html__('Processing, please wait...', 'houzez'),
            'delete_confirmation' => esc_html__('Are you sure you want to delete?', 'houzez'),
            'not_found' => esc_html__("We didn't find any results", 'houzez'),
            'for_rent' => $advanced_search_rent_status,
            'for_rent_price_range' => $advanced_search_price_range_rent_status,
            'currency_symbol' => $currency_symbol,
            'advanced_search_widget_min_price' => $advanced_search_widget_min_price,
            'advanced_search_widget_max_price' => $advanced_search_widget_max_price,
            'advanced_search_min_price_range_for_rent' => $advanced_search_min_price_range_for_rent,
            'advanced_search_max_price_range_for_rent' => $advanced_search_max_price_range_for_rent,
            'advanced_search_widget_min_area' => $advanced_search_widget_min_area,
            'advanced_search_widget_max_area' => $advanced_search_widget_max_area,
            'advanced_search_price_slide' => houzez_option('adv_search_price_slider'),
            'fave_page_template' => basename(get_page_template()),
            'google_map_style' => houzez_option('googlemap_stype'),
            'googlemap_default_zoom' => $googlemap_zoom_level,
            'googlemap_pin_cluster' => $googlemap_pin_cluster,
            'googlemap_zoom_cluster' => $googlemap_zoom_cluster,
            'map_icons_path' => get_template_directory_uri() . '/images/map/',
            'infoboxClose' => get_template_directory_uri() . '/images/map/close.png',
            'clusterIcon' => $clusterIcon,
            'google_map_needed' => $google_map_needed,
            'paged' => $paged,
            'search_result_page' => $search_result_page,
            'search_keyword' => stripslashes($search_keyword),
            'search_country' => $search_country,
            'search_state' => $search_state,
            'search_city' => $search_city,
            'search_feature' => $search_feature,
            'search_appliance' => $search_appliance,
            'status_filters' => $status_filters,
            'furniture_filters' => $furniture_filters,
            'service_filters' => $service_filters,
            'search_rules' => $search_rules,
            'search_area' => $search_area,
            'search_status' => $search_status,
            'search_label' => $search_label,
            'search_type' => $search_type,
            'search_bedrooms' => $search_bedrooms,
            'search_bathrooms' => $search_bathrooms,
            'search_min_price' => $search_min_price,
            'search_max_price' => $search_max_price,
            'search_currency' => $search_currency,
            'search_min_area' => $search_min_area,
            'search_max_area' => $search_max_area,
            'search_property_id' => $search_property_id,
            'search_publish_date' => $search_publish_date,
            'search_no_posts' => $prop_no_halfmap,

            'search_location' => $search_location,
            'use_radius' => $use_radius,
            'search_lat' => $search_lat,
            'search_long' => $search_long,
            'search_radius' => $search_radius,

            'transportation' => esc_html__('Transportation', 'houzez'),
            'supermarket' => esc_html__('Supermarket', 'houzez'),
            'schools' => esc_html__('Schools', 'houzez'),
            'libraries' => esc_html__('Libraries', 'houzez'),
            'pharmacies' => esc_html__('Pharmacies', 'houzez'),
            'hospitals' => esc_html__('Hospitals', 'houzez'),
            'sort_by' => $sort_by,
            'guest' => $guest,
            'search_sea_distance' => $search_sea_distance,
            'measurement_updating_msg' => esc_html__('Updating, Please wait...', 'houzez'),
            'autosearch_text' => esc_html__('Searching...', 'houzez'),
            'currency_updating_msg' => esc_html__('Updating Currency, Please wait...', 'houzez'),
            'currency_position' => houzez_option('currency_position'),
            'submission_currency' => houzez_option('currency_paid_submission'),
            'wire_transfer_text' => esc_html__('To be paid', 'houzez'),
            'direct_pay_thanks' => esc_html__('Thank you. Please check your email for payment instructions.', 'houzez'),
            'direct_payment_title' => esc_html__('Direct Payment Instructions', 'houzez'),
            'direct_payment_button' => esc_html__('SEND ME THE INVOICE', 'houzez'),
            'direct_payment_details' => houzez_option('direct_payment_instruction'),
            'measurement_unit' => $measurement_unit_adv_search,
            'header_map_selected_city' => $header_map_selected_city,
            'thousands_separator' => $thousands_separator,
            'current_tempalte' => $current_template,
            'monthly_payment' => esc_html__('Monthly Payment', 'houzez'),
            'weekly_payment' => esc_html__('Weekly Payment', 'houzez'),
            'bi_weekly_payment' => esc_html__('Bi-Weekly Payment', 'houzez'),
            'compare_button_url' => houzez_get_template_link_2('template/template-compare.php'),
            'template_thankyou' => houzez_get_template_link('template/template-thankyou.php'),
            'compare_page_not_found' => esc_html__('Please create page using compare properties template', 'houzez'),
            'property_detail_top' => esc_attr($property_top_area),
            'keyword_search_field' => $keyword_field,
            'keyword_autocomplete' => $keyword_autocomplete,
            'houzez_date_language' => $houzez_date_language,
            'houzez_default_radius' => $houzez_default_radius,
            'enable_radius_search' => $enable_radius_search,
            'enable_radius_search_halfmap' => $enable_radius_search_halfmap,
            'houzez_primary_color' => $houzez_primary_color,
            'geocomplete_country' => $geocomplete_country,
            'houzez_logged_in' => $houzez_logged_in,
            'ipinfo_location' => houzez_option('ipinfo_location'),
            'gallery_autoplay' => houzez_option('gallery_autoplay'),
            'stripe_page' => houzez_get_template_link('template/template-stripe-charge.php'),
            'twocheckout_page' => houzez_get_template_link('template/template-2checkout.php'),
            'custom_fields' => json_encode($custom_fields_array),
            'markerPricePins' => esc_attr($markerPricePins),
            'houzez_reCaptcha' => $enable_reCaptcha
        )
    ); // end ajax calls


}
add_action( 'wp_enqueue_scripts', 'my_scripts_and_styles' );


/**
 * Enqueue scripts and styles.
 */
if( !function_exists('houzez_scripts') ) {
    function houzez_scripts()
    {
        global $paged, $post, $current_user;
        $property_lat = $property_map = $property_streetView = $is_singular_property = $header_type = $login_redirect = '';
        $property_lng = $google_map_needed = $fave_main_menu_trans = $header_map_selected_city = $fave_adv_search_enable = $current_template = $markerPricePins = '';
        $advanced_search_rent_status = $advanced_search_price_range_rent_status = 'for-rent';
        $content_has_map_shortcode = false;
        $max_file_size = 100 * 1000 * 1000;
        wp_get_current_user();
        $userID = $current_user->ID;

        $markerPricePins = houzez_option('markerPricePins');
        if(isset($_GET['marker']) && $_GET['marker'] == 'pricePins') {
            $markerPricePins = 'yes';
        }

        $protocol = is_ssl() ? 'https' : 'http';

        $houzez_logged_in = 'yes';
        if (!is_user_logged_in()) {
            $houzez_logged_in = 'no';
        }

        if (is_rtl()) {
            $houzez_rtl = "yes";
        } else {
            $houzez_rtl = "no";
        }

        if (isset($_GET['sortby'])) {
            $sort_by = $_GET['sortby'];
        }

        $houzez_default_radius = houzez_option('houzez_default_radius');
        if (isset($_GET['radius'])) {
            $houzez_default_radius = $_GET['radius'];
        }

        $enable_reCaptcha = houzez_option('enable_reCaptcha');
        $recaptha_site_key = houzez_option('recaptha_site_key');
        $recaptha_secret_key = houzez_option('recaptha_secret_key');

        $houzez_primary_color = houzez_option('houzez_primary_color');

        $prop_no_halfmap = 10;
        $meta_states = $meta_locations = $meta_types = $meta_status = $meta_features = $meta_labels = $meta_area = $meta_min_price = $meta_max_price = $sort_halfmap = '';
        if (is_page_template(array('template/property-listings-map.php'))) {
            $meta_states = get_post_meta($post->ID, 'fave_states', false);
            $meta_locations = get_post_meta($post->ID, 'fave_locations', false);
            $meta_types = get_post_meta($post->ID, 'fave_types', false);
            $meta_status = get_post_meta($post->ID, 'fave_status', false);
            $meta_features = get_post_meta($post->ID, 'fave_features', false);
            $meta_labels = get_post_meta($post->ID, 'fave_labels', false);
            $meta_area = get_post_meta($post->ID, 'fave_area', false);
            $meta_min_price = get_post_meta($post->ID, 'fave_min_price', true);
            $meta_max_price = get_post_meta($post->ID, 'fave_max_price', true);
            $prop_no_halfmap = get_post_meta($post->ID, 'fave_prop_no_halfmap', true);
            $sort_halfmap = get_post_meta($post->ID, 'fave_properties_sort_halfmap', true);
        }

        $search_feature = array();
        $search_rules = array();
        $search_appliance = array();
        $status_filters = array();
        $furniture_filters = array();
        $service_filters = array();
        $enable_radius_search = houzez_option('enable_radius_search');
        $enable_radius_search_halfmap = houzez_option('enable_radius_search_halfmap');
        $search_result_page = houzez_option('search_result_page');
        $search_keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : '';
        $search_appliance = isset($_GET['appliance']) ? ($_GET['appliance']) : '';
        $status_filters = isset($_GET['prop-status']) ? ($_GET['prop-status']) : '';
        $furniture_filters = isset($_GET['furniture']) ? ($_GET['furniture']) : '';
        $service_filters = isset($_GET['services']) ? ($_GET['services']) : '';
        $search_rules = isset($_GET['rules']) ? ($_GET['rules']) : '';
        $search_rules = isset($_GET['appliance']) ? ($_GET['appliance']) : '';
        $search_country = isset($_GET['country']) ? sanitize_text_field($_GET['country']) : '';
        $search_state = isset($_GET['state']) ? sanitize_text_field($_GET['state']) : $meta_states;
        $search_city = isset($_GET['location']) ? sanitize_text_field($_GET['location']) : $meta_locations;
        $search_area = isset($_GET['area']) ? sanitize_text_field($_GET['area']) : $meta_area;
        $search_status = isset($_GET['status']) ? sanitize_text_field($_GET['status']) : $meta_status;
        $search_label = isset($_GET['label']) ? sanitize_text_field($_GET['label']) : $meta_labels;
        $search_type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : $meta_types;
        $search_bedrooms = isset($_GET['bedrooms']) ? sanitize_text_field($_GET['bedrooms']) : '';
        $search_bathrooms = isset($_GET['bathrooms']) ? sanitize_text_field($_GET['bathrooms']) : '';
        $search_min_price = isset($_GET['min-price']) ? sanitize_text_field($_GET['min-price']) : $meta_min_price;
        $search_max_price = isset($_GET['max-price']) ? sanitize_text_field($_GET['max-price']) : $meta_max_price;
        $search_currency = isset($_GET['currency']) ? sanitize_text_field($_GET['currency']) : '';
        $search_min_area = isset($_GET['min-area']) ? sanitize_text_field($_GET['min-area']) : '';
        $search_max_area = isset($_GET['max-area']) ? sanitize_text_field($_GET['max-area']) : '';
        $search_property_id = isset($_GET['property_id']) ? sanitize_text_field($_GET['property_id']) : '';
        $search_publish_date = isset($_GET['publish_date']) ? sanitize_text_field($_GET['publish_date']) : '';
        $sort_by = isset($_GET['sortby']) ? sanitize_text_field($_GET['sortby']) : $sort_halfmap;
        $guest = isset($_GET['guest']) ? sanitize_text_field($_GET['guest']) : '';
        $search_sea_distance = isset($_GET['search_sea_distance']) ? sanitize_text_field($_GET['search_sea_distance']) : '';


        $search_location = isset($_GET['search_location']) ? esc_attr($_GET['search_location']) : false;
        $use_radius = 'on';
        $search_lat = isset($_GET['lat']) ? (float)$_GET['lat'] : false;
        $search_long = isset($_GET['lng']) ? (float)$_GET['lng'] : false;
        $search_radius = isset($_GET['radius']) ? (int)$_GET['radius'] : false;

        $geo_country_limit = houzez_option('geo_country_limit');
        $geocomplete_country = '';
        if ($geo_country_limit != 0) {
            $geocomplete_country = houzez_option('geocomplete_country');
        }

        // Retina Logos
        $simple_logo = houzez_option('custom_logo', '', 'url');
        $retina_logo_url = houzez_option('retina_logo', '', 'url');
        $retina_mobilelogo_url = houzez_option('mobile_retina_logo', '', 'url');
        $retina_logo_mobile_splash = houzez_option('retina_logo_mobile_splash', '', 'url');
        $retina_splash_logo_url = houzez_option('retina_logo_splash', '', 'url');
        $retina_logo_width = houzez_option('retina_logo_width');
        $retina_logo_height = houzez_option('retina_logo_height');
        $retina_logo_width = preg_replace('#[^0-9]#', '', strip_tags($retina_logo_width));
        $retina_logo_height = preg_replace('#[^0-9]#', '', strip_tags($retina_logo_height));

        $map_cluster = houzez_option('map_cluster', '', 'url');
        if (!empty($map_cluster)) {
            $clusterIcon = $map_cluster;
        } else {
            $clusterIcon = get_template_directory_uri() . '/images/map/cluster-icon.png';
        }

        if (!is_404() && !is_search() && !is_tax() && !is_author()) {
            $header_type = get_post_meta($post->ID, 'fave_header_type', true);
            $content_has_map_shortcode = has_shortcode(get_post_field('post_content', $post->ID), 'houzez-properties-map');
            $fave_main_menu_trans = get_post_meta($post->ID, 'fave_main_menu_trans', true);
            $header_map_selected_city = get_post_meta($post->ID, 'fave_map_city', false);
            $fave_adv_search_enable = get_post_meta($post->ID, 'fave_adv_search_enable', true);
            $current_template = get_page_template_slug($post->ID);
        }

        $property_top_area = houzez_option('prop-top-area');
        /* For demo purpose only */
        if (isset($_GET['s_top'])) {
            $property_top_area = $_GET['s_top'];
        }

        $keyword_field = houzez_option('keyword_field');
        $keyword_autocomplete = houzez_option('keyword_autocomplete');
        $advanced_search_rent_status_id = houzez_option('search_rent_status');
        $advanced_search_rent_status_id_price_range = houzez_option('search_rent_status_for_price_range');
        $measurement_unit_adv_search = houzez_option('measurement_unit_adv_search');
        if ($measurement_unit_adv_search == 'sqft') {
            $measurement_unit_adv_search = houzez_option('measurement_unit_sqft_text');
        } elseif ($measurement_unit_adv_search == 'sq_meter') {
            $measurement_unit_adv_search = houzez_option('measurement_unit_square_meter_text');
        }

        $thousands_separator = houzez_option('thousands_separator');

        if (taxonomy_exists('property_status')) {
            $term_exist = get_term_by('id', $advanced_search_rent_status_id, 'property_status');
            if ($term_exist) {
                $advanced_search_rent_status = get_term($advanced_search_rent_status_id, 'property_status');
                if (!is_wp_error($advanced_search_rent_status)) {
                    $advanced_search_rent_status = $advanced_search_rent_status->slug;
                }
            }

            $term_exist_2 = get_term_by('id', $advanced_search_rent_status_id_price_range, 'property_status');
            if ($term_exist_2) {
                $advanced_search_price_range_rent_status = get_term($advanced_search_rent_status_id_price_range, 'property_status');
                if (!is_wp_error($advanced_search_price_range_rent_status)) {
                    $advanced_search_price_range_rent_status = $advanced_search_price_range_rent_status->slug;
                }
            }

        }
        $multi_currency = houzez_option('multi_currency');
        $currency_symbol = houzez_option('currency_symbol');
        if($multi_currency == 1) { $currency_symbol = ''; }
        $after_login_redirect = houzez_option('login_redirect');
        $googlemap_ssl = houzez_option('googlemap_ssl');
        $googlemap_api_key = houzez_option('googlemap_api_key');
        $googlemap_zoom_level = houzez_option('googlemap_zoom_level');
        $googlemap_pin_cluster = houzez_option('googlemap_pin_cluster');
        $googlemap_zoom_cluster = houzez_option('googlemap_zoom_cluster');
        $main_search_enable = houzez_option('main-search-enable');
        $year_built_calender = houzez_option('year_built_calender');

        $advanced_search_widget_min_price = houzez_option('advanced_search_widget_min_price');
        if (empty($advanced_search_widget_min_price)) {
            $advanced_search_widget_min_price = '0';
        }
        $advanced_search_widget_max_price = houzez_option('advanced_search_widget_max_price');
        if (empty($advanced_search_widget_max_price)) {
            $advanced_search_widget_max_price = '2500000';
        }


        $advanced_search_min_price_range_for_rent = houzez_option('advanced_search_min_price_range_for_rent');
        if (empty($advanced_search_min_price_range_for_rent)) {
            $advanced_search_min_price_range_for_rent = '0';
        }
        $advanced_search_max_price_range_for_rent = houzez_option('advanced_search_max_price_range_for_rent');
        if (empty($advanced_search_max_price_range_for_rent)) {
            $advanced_search_max_price_range_for_rent = '6000';
        }


        $advanced_search_widget_min_area = houzez_option('advanced_search_widget_min_area');
        if (empty($advanced_search_widget_min_area)) {
            $advanced_search_widget_min_area = '0';
        }

        $advanced_search_widget_max_area = houzez_option('advanced_search_widget_max_area');
        if (empty($advanced_search_widget_max_area)) {
            $advanced_search_widget_max_area = '600';
        }

        if ($after_login_redirect == 'same_page') {

            if (is_tax()) {
                $login_redirect = get_term_link(get_query_var('term'), get_query_var('taxonomy'));
            } else {
                if (is_home() || is_front_page()) {
                    $login_redirect = site_url();
                } else {
                    if (!is_404() && !is_search() && !is_author()) {
                        $login_redirect = get_permalink($post->ID);
                    }
                }
            }

        } else {
            $login_redirect = houzez_option('login_redirect_link');
        }

        if (is_singular('property')) {
            $property_location = get_post_meta(get_the_ID(), 'fave_property_location', true);
            if (!empty($property_location)) {
                $lat_lng = explode(',', $property_location);
                $property_lat = $lat_lng[0];
                $property_lng = $lat_lng[1];

                $property_map = get_post_meta(get_the_ID(), 'fave_property_map', true);
                $property_streetView = get_post_meta(get_the_ID(), 'fave_property_map_street_view', true);
            }
            $is_singular_property = 'yes';
        }

        $houzez_show_captcha = 'no';
        if (is_singular('houzez_agent') || is_singular('houzez_agency') || is_singular('property') || is_author()) {
            $houzez_show_captcha = 'yes';
        }

        $minify_css = houzez_option('minify_css');
        $css_minify_prefix = '';
        if ($minify_css != 0) {
            $css_minify_prefix = '.min';
        }

        $minify_js = houzez_option('minify_js');
        $js_minify_prefix = '';
        if ($minify_js != 0) {
            $js_minify_prefix = '.min';
        }

        /*if(is_rtl()) {
            wp_enqueue_style('jquery.ui.slider-rtl-css', get_template_directory_uri() . '/css/jquery.ui.slider-rtl.css', array(), '3.3.5', 'all');
            wp_enqueue_script('jquery.ui.slider-rtl-min', get_template_directory_uri() . '/js/jquery.ui.slider-rtl.min.js', array('jquery'), '1.8.9.rtl.1', true);
        }*/

        /* Register Styles
         * ----------------------*/
        //wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/css/font-awesome.min.css', array('parent-theme'), '4.7.0', 'all');
        // wp_enqueue_style('houzez-all', get_template_directory_uri() . '/css/all.min.css', array(), HOUZEZ_THEME_VERSION, 'all');
        // wp_enqueue_style('houzez-main', get_template_directory_uri() . '/css/main' . $css_minify_prefix . '.css', array(), HOUZEZ_THEME_VERSION, 'all');

        if (is_rtl()) {
            wp_enqueue_style('houzez-rtl', get_template_directory_uri() . '/css/rtl' . $css_minify_prefix . '.css', array(), HOUZEZ_THEME_VERSION, 'all');
            wp_enqueue_style('bootstrap-rtl.min', get_template_directory_uri() . '/css/bootstrap-rtl.min.css', array(), '3.3.4', 'all');
        }

        if ($minify_css != 0) {
            wp_enqueue_style('houzez-style', get_template_directory_uri() . '/style.min.css', array(), HOUZEZ_THEME_VERSION, 'all');
        } else {
            wp_enqueue_style('houzez-style', get_stylesheet_uri(), array(), HOUZEZ_THEME_VERSION, 'all');
        }

        /* Register Scripts
         * ----------------------*/
        wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true);
        wp_enqueue_script('houzez-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), HOUZEZ_THEME_VERSION, true);
        wp_localize_script('houzez-plugins', 'hz_plugin',
            array(
                'rating_terrible' => esc_html__('Terrible', 'houzez'),
                'rating_poor' => esc_html__('Poor', 'houzez'),
                'rating_average' => esc_html__('Average', 'houzez'),
                'rating_vgood' => esc_html__('Very Good', 'houzez'),
                'rating_exceptional' => esc_html__('Exceptional', 'houzez'),
            )
        );

        if (is_page_template('template/property-listings-map.php') || is_page_template('template/submit_property.php') || is_page_template('template/submit_property_without_login.php') || $header_type == 'property_map' || is_singular('property') || is_singular('houzez_agency') || $content_has_map_shortcode || $enable_radius_search != 0) {
            if (esc_html($googlemap_ssl) == 'yes' || is_ssl()) {
                wp_enqueue_script('google-map', 'https://maps-api-ssl.google.com/maps/api/js?libraries=places&language=' . get_locale() . '&key=' . esc_html($googlemap_api_key), array('jquery'), '1.0', false);
            } else {
                wp_enqueue_script('google-map', 'http://maps.googleapis.com/maps/api/js?libraries=places&language=' . get_locale() . '&key=' . esc_html($googlemap_api_key), array('jquery'), '1.0', false);
            }
            wp_enqueue_script('google-map-info-box', get_template_directory_uri() . '/js/infobox' . $js_minify_prefix . '.js', array('google-map'), '1.1.9', false);

            if ($googlemap_pin_cluster != 'no') {
                wp_enqueue_script('google-map-marker-clusterer', get_template_directory_uri() . '/js/markerclusterer' . $js_minify_prefix . '.js', array('google-map'), '2.1.1', false);
            }

            wp_enqueue_script('oms.min.js', get_template_directory_uri() . '/js/oms.min.js', array('google-map'), '1.12.2', false);

            if($markerPricePins == 'yes') {
                    wp_enqueue_script('richmarker-compiled', get_template_directory_uri() . '/js/richmarker-compiled.js', array('google-map'), '1.0', false);
            }

            $google_map_needed = 'yes';
        }

        $houzez_date_language = houzez_option('houzez_date_language');

        if (is_singular('property') || $year_built_calender != 'no' || is_page_template('template/user_dashboard_invoices.php') || is_page_template('template/property-listings-map.php') || $header_type == 'property_map') {
            wp_enqueue_script('jquery-ui-datepicker');

            $houzez_date_language = esc_html($houzez_date_language);

            if ($houzez_date_language != 'xx' && !empty($houzez_date_language)) {
                $handle = "datepicker-" . $houzez_date_language;
                $name = "datepicker-" . $houzez_date_language . ".js";
                wp_enqueue_script($handle, get_template_directory_uri() . '/js/i18n/' . $name, array('jquery'), '1.0', true);
            }

            if (function_exists('icl_translate')) {
                if (ICL_LANGUAGE_CODE != 'en') {
                    $handle = "datepicker-" . ICL_LANGUAGE_CODE;
                    $name = "datepicker-" . ICL_LANGUAGE_CODE . ".js";
                    wp_enqueue_script($handle, get_template_directory_uri() . '/js/i18n/' . $name, array('jquery'), '1.0', true);
                }
                $houzez_date_language = ICL_LANGUAGE_CODE;
            }
        }
        if ($keyword_autocomplete != 0) {
            wp_enqueue_script('jquery-ui-autocomplete');
        }
        wp_enqueue_script('jquery-touch-punch');

        if (is_front_page()) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }

        $custom_fields_array = array();
        //$custom_fields_half_map_array = array();
        if(class_exists('Houzez_Fields_Builder')) {
            $fields_array = Houzez_Fields_Builder::get_form_fields();
            
            if(!empty($fields_array)){
                foreach ( $fields_array as $value ){
                    $field_title = $value->label;
                    $field = $value->field_id;
                    if($value->is_search == 'yes') {
                        $custom_fields_array[$field] = isset($_GET[$field]) ? sanitize_text_field($_GET[$field]) : '';
                    }
                    
                }
            }
        }
    

        // Ajax Calls
        wp_enqueue_script('houzez_ajax_calls', get_template_directory_uri() . '/js/houzez_ajax_calls' . $js_minify_prefix . '.js', array('jquery'), HOUZEZ_THEME_VERSION, true);
        wp_localize_script('houzez_ajax_calls', 'HOUZEZ_ajaxcalls_vars',
            array(
                'admin_url' => get_admin_url(),
                'houzez_rtl' => $houzez_rtl,
                'redirect_type' => $after_login_redirect,
                'login_redirect' => $login_redirect,
                'login_loading' => esc_html__('Sending user info, please wait...', 'houzez'),
                'direct_pay_text' => esc_html__('Processing, Please wait...', 'houzez'),
                'user_id' => $userID,
                'transparent_menu' => $fave_main_menu_trans,
                'simple_logo' => $simple_logo,
                'retina_logo' => $retina_logo_url,
                'retina_logo_mobile' => $retina_mobilelogo_url,
                'retina_logo_mobile_splash' => $retina_logo_mobile_splash,
                'retina_logo_splash' => $retina_splash_logo_url,
                'retina_logo_height' => $retina_logo_height,
                'retina_logo_width' => $retina_logo_width,
                'property_lat' => $property_lat,
                'property_lng' => $property_lng,
                'property_map' => $property_map,
                'property_map_street' => $property_streetView,
                'is_singular_property' => $is_singular_property,
                'process_loader_refresh' => 'fa fa-spin fa-refresh',
                'process_loader_spinner' => 'fa fa-spin fa-spinner',
                'process_loader_circle' => 'fa fa-spin fa-circle-o-notch',
                'process_loader_cog' => 'fa fa-spin fa-cog',
                'success_icon' => 'fa fa-check',
                'set_as_featured' => esc_html__('Set as Featured', 'houzez'),
                'remove_featured' => esc_html__('Remove From Featured', 'houzez'),
                'prop_featured' => esc_html__('Featured', 'houzez'),
                'featured_listings_none' => esc_html__('You have used all the "Featured" listings in your package.', 'houzez'),
                'prop_sent_for_approval' => esc_html__('Sent for Approval', 'houzez'),
                'paypal_connecting' => esc_html__('Connecting to paypal, Please wait... ', 'houzez'),
                'mollie_connecting' => esc_html__('Connecting to mollie, Please wait... ', 'houzez'),
                'confirm' => esc_html__('Are you sure you want to delete?', 'houzez'),
                'confirm_featured' => esc_html__('Are you sure you want to make this a featured listing?', 'houzez'),
                'confirm_featured_remove' => esc_html__('Are you sure you want to remove from featured listing?', 'houzez'),
                'confirm_relist' => esc_html__('Are you sure you want to relist this property?', 'houzez'),
                'delete_property' => esc_html__('Processing, please wait...', 'houzez'),
                'delete_confirmation' => esc_html__('Are you sure you want to delete?', 'houzez'),
                'not_found' => esc_html__("We didn't find any results", 'houzez'),
                'for_rent' => $advanced_search_rent_status,
                'for_rent_price_range' => $advanced_search_price_range_rent_status,
                'currency_symbol' => $currency_symbol,
                'advanced_search_widget_min_price' => $advanced_search_widget_min_price,
                'advanced_search_widget_max_price' => $advanced_search_widget_max_price,
                'advanced_search_min_price_range_for_rent' => $advanced_search_min_price_range_for_rent,
                'advanced_search_max_price_range_for_rent' => $advanced_search_max_price_range_for_rent,
                'advanced_search_widget_min_area' => $advanced_search_widget_min_area,
                'advanced_search_widget_max_area' => $advanced_search_widget_max_area,
                'advanced_search_price_slide' => houzez_option('adv_search_price_slider'),
                'fave_page_template' => basename(get_page_template()),
                'google_map_style' => houzez_option('googlemap_stype'),
                'googlemap_default_zoom' => $googlemap_zoom_level,
                'googlemap_pin_cluster' => $googlemap_pin_cluster,
                'googlemap_zoom_cluster' => $googlemap_zoom_cluster,
                'map_icons_path' => get_template_directory_uri() . '/images/map/',
                'infoboxClose' => get_template_directory_uri() . '/images/map/close.png',
                'clusterIcon' => $clusterIcon,
                'google_map_needed' => $google_map_needed,
                'paged' => $paged,
                'search_result_page' => $search_result_page,
                'search_keyword' => stripslashes($search_keyword),
                'search_country' => $search_country,
                'search_state' => $search_state,
                'search_city' => $search_city,
                'search_feature' => $search_feature,
                'search_rules' => $search_rules,
                'search_appliance' => $search_appliance,
                'status_filters' => $status_filters,
                'furniture_filters' => $furniture_filters,
                'service_filter' => $service_filter,
                'search_area' => $search_area,
                'search_status' => $search_status,
                'search_label' => $search_label,
                'search_type' => $search_type,
                'search_bedrooms' => $search_bedrooms,
                'search_bathrooms' => $search_bathrooms,
                'search_min_price' => $search_min_price,
                'search_max_price' => $search_max_price,
                'search_currency' => $search_currency,
                'search_min_area' => $search_min_area,
                'search_max_area' => $search_max_area,
                'search_property_id' => $search_property_id,
                'search_publish_date' => $search_publish_date,
                'search_no_posts' => $prop_no_halfmap,

                'search_location' => $search_location,
                'use_radius' => $use_radius,
                'search_lat' => $search_lat,
                'search_long' => $search_long,
                'search_radius' => $search_radius,

                'transportation' => esc_html__('Transportation', 'houzez'),
                'supermarket' => esc_html__('Supermarket', 'houzez'),
                'schools' => esc_html__('Schools', 'houzez'),
                'libraries' => esc_html__('Libraries', 'houzez'),
                'pharmacies' => esc_html__('Pharmacies', 'houzez'),
                'hospitals' => esc_html__('Hospitals', 'houzez'),
                'sort_by' => $sort_by,
                'guest' => $guest,
                'search_sea_distance' => $search_sea_distance,
                'measurement_updating_msg' => esc_html__('Updating, Please wait...', 'houzez'),
                'autosearch_text' => esc_html__('Searching...', 'houzez'),
                'currency_updating_msg' => esc_html__('Updating Currency, Please wait...', 'houzez'),
                'currency_position' => houzez_option('currency_position'),
                'submission_currency' => houzez_option('currency_paid_submission'),
                'wire_transfer_text' => esc_html__('To be paid', 'houzez'),
                'direct_pay_thanks' => esc_html__('Thank you. Please check your email for payment instructions.', 'houzez'),
                'direct_payment_title' => esc_html__('Direct Payment Instructions', 'houzez'),
                'direct_payment_button' => esc_html__('SEND ME THE INVOICE', 'houzez'),
                'direct_payment_details' => houzez_option('direct_payment_instruction'),
                'measurement_unit' => $measurement_unit_adv_search,
                'header_map_selected_city' => $header_map_selected_city,
                'thousands_separator' => $thousands_separator,
                'current_tempalte' => $current_template,
                'monthly_payment' => esc_html__('Monthly Payment', 'houzez'),
                'weekly_payment' => esc_html__('Weekly Payment', 'houzez'),
                'bi_weekly_payment' => esc_html__('Bi-Weekly Payment', 'houzez'),
                'compare_button_url' => houzez_get_template_link_2('template/template-compare.php'),
                'template_thankyou' => houzez_get_template_link('template/template-thankyou.php'),
                'compare_page_not_found' => esc_html__('Please create page using compare properties template', 'houzez'),
                'property_detail_top' => esc_attr($property_top_area),
                'keyword_search_field' => $keyword_field,
                'keyword_autocomplete' => $keyword_autocomplete,
                'houzez_date_language' => $houzez_date_language,
                'houzez_default_radius' => $houzez_default_radius,
                'enable_radius_search' => $enable_radius_search,
                'enable_radius_search_halfmap' => $enable_radius_search_halfmap,
                'houzez_primary_color' => $houzez_primary_color,
                'geocomplete_country' => $geocomplete_country,
                'houzez_logged_in' => $houzez_logged_in,
                'ipinfo_location' => houzez_option('ipinfo_location'),
                'gallery_autoplay' => houzez_option('gallery_autoplay'),
                'stripe_page' => houzez_get_template_link('template/template-stripe-charge.php'),
                'twocheckout_page' => houzez_get_template_link('template/template-2checkout.php'),
                'custom_fields' => json_encode($custom_fields_array),
                'markerPricePins' => esc_attr($markerPricePins),
                'houzez_reCaptcha' => $enable_reCaptcha
            )
        ); // end ajax calls

        $houzez_stats_graph = houzez_option('houzez_stats_graph');
        $houzez_graph_type = houzez_option('houzez_graph_type');
        if (isset($_GET['graph_type'])) {
            $houzez_graph_type = $_GET['graph_type'];
        }

        if (is_singular('property') && $houzez_stats_graph != 0) {
            $array_label = houzez_return_traffic_labels($post->ID);
            $array_values = houzez_return_traffic_data($post->ID);
            wp_enqueue_script('chart.min', get_template_directory_uri() . '/js/Chart.min.js', array('jquery'), '2.2.1', true);

            wp_enqueue_script('property_stats', get_template_directory_uri() . '/js/property_stats.js', array('jquery'), HOUZEZ_THEME_VERSION, true);
            wp_localize_script('property_stats', 'houzez_stats_vars',
                array(
                    'stats_labels' => json_encode($array_label),
                    'stats_values' => json_encode($array_values),
                    'stats_view' => esc_html__('Views', 'houzez'),
                    'chart_type' => $houzez_graph_type,
                    'bg_color' => houzez_option('houzez_graph_bg_color', false, 'rgba'),
                    'border_color' => houzez_option('houzez_graph_border_color', false, 'rgba'),

                )
            );
        }

        wp_enqueue_script('houzez-custom', get_template_directory_uri() . '/js/custom' . $js_minify_prefix . '.js', array('jquery'), HOUZEZ_THEME_VERSION, true);

        if (is_singular('post') && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

        if (is_page_template('template/blog-masonry.php')) {
            wp_enqueue_script('isotope.pkgd.min', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), '2.2.2', true);
        }


        if (is_page_template('template/template-splash.php') || $header_type == 'video') {
            wp_enqueue_style('vegas', get_template_directory_uri() . '/css/vegas.min.css', array(), '1.0', 'all');
            wp_enqueue_script('vegas', get_template_directory_uri() . '/js/vegas.min.js', array('jquery'), '1.0', true);
        }

        // Edit profile template
        if (is_page_template('template/user_dashboard_profile.php') || is_page_template('template/user_dashboard_gdpr.php') || is_page_template('template/user_dashboard_membership.php')) {
            wp_enqueue_script('plupload');
            wp_register_script('houzez_user_profile', get_template_directory_uri() . '/js/houzez_user_profile.js', array('jquery', 'plupload'), HOUZEZ_THEME_VERSION, true);
            $user_profile_data = array(
                'ajaxURL' => admin_url('admin-ajax.php'),
                'houzez_upload_nonce' => wp_create_nonce('houzez_upload_nonce'),
                'verify_file_type' => esc_html__('Valid file formats', 'houzez'),
                'houzez_site_url' => site_url(),
                'process_loader_refresh' => 'fa fa-spin fa-refresh',
                'process_loader_spinner' => 'fa fa-spin fa-spinner',
                'process_loader_circle' => 'fa fa-spin fa-circle-o-notch',
                'process_loader_cog' => 'fa fa-spin fa-cog',
                'success_icon' => 'fa fa-check',
                'processing_text' => esc_html__('Processing, Please wait...', 'houzez'),
                'gdpr_agree_text' => esc_html__('Please Agree GDPR', 'houzez'),
                'sending_info' => esc_html__('Sending info', 'houzez'),
            );
            wp_localize_script('houzez_user_profile', 'houzezUserProfile', $user_profile_data);
            wp_enqueue_script('houzez_user_profile');
        } // end edit profile


        if ($enable_reCaptcha != 0 && !empty($recaptha_site_key) && !empty($recaptha_secret_key)) {
            wp_enqueue_script('google-reCaptcha', 'https://www.google.com/recaptcha/api.js?onload=houzezReCaptchaLoad&hl=' . get_locale() . '&render=explicit', array('jquery'), HOUZEZ_THEME_VERSION, true);
            wp_enqueue_script('houzez_reCaptcha', get_template_directory_uri() . '/js/houzez-reCapthca.js', array('jquery', 'google-reCaptcha'), HOUZEZ_THEME_VERSION, true);

            $lightbox_agent_cotnact = houzez_option('lightbox_agent_cotnact');
            $reCaptcha_data = array(
                'site_key' => $recaptha_site_key,
                'secret_key' => $recaptha_secret_key,
                'lightbox_agent_cotnact' => $lightbox_agent_cotnact,
                'is_singular_property' => $is_singular_property,
                'houzez_show_captcha' => $houzez_show_captcha,
                'houzez_logged_in' => $houzez_logged_in,

            );
            wp_localize_script('houzez_reCaptcha', 'houzez_reCaptcha', $reCaptcha_data);
        }

        // Submit Property
        if (is_page_template('template/user_dashboard_invoices.php') || is_page_template('template/user_dashboard_properties.php') || is_page_template('template/user_dashboard_messages.php') || is_page_template('template/submit_property.php') || is_page_template('template/submit_property_without_login.php') || is_page_template('template/user_dashboard_floor_plans.php') || is_page_template('template/user_dashboard_multi_units.php')) {
            wp_enqueue_script('plupload');
            wp_enqueue_script('jquery-ui-sortable');

            wp_enqueue_script('validate.min', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), '1.14.0', true);

            wp_enqueue_script('houzez_property', get_template_directory_uri() . '/js/houzez_property.js', array('jquery', 'plupload', 'jquery-ui-sortable'), HOUZEZ_THEME_VERSION, true);

            $prop_req_fields = houzez_option('required_fields');
            $enable_paid_submission = houzez_option('enable_paid_submission');

            if( $enable_paid_submission == 'membership') {
                $user_package_id = houzez_get_user_package_id($userID);
                $package_images = get_post_meta( $user_package_id, 'fave_package_images', true );
                $package_unlimited_images = get_post_meta( $user_package_id, 'fave_unlimited_images', true );
                if( $package_unlimited_images != 1 && !empty($package_images)) {
                    $max_prop_images = $package_images;
                } else {
                    $max_prop_images = houzez_option('max_prop_images');
                }
            } else {
                $max_prop_images = houzez_option('max_prop_images');
            }

            $is_edit_property = isset($_GET['edit_property']) ? $_GET['edit_property'] : 'no';

            $prop_data = array(
                'ajaxURL' => admin_url('admin-ajax.php'),
                'verify_nonce' => wp_create_nonce('verify_gallery_nonce'),
                'verify_file_type' => esc_html__('Valid file formats', 'houzez'),
                'msg_digits' => esc_html__('Please enter only digits', 'houzez'),
                'max_prop_images' => $max_prop_images,
                'image_max_file_size' => houzez_option('image_max_file_size'),
                'plan_title_text' => esc_html__('Plan Title', 'houzez'),
                'plan_size_text' => esc_html__('Plan Size', 'houzez'),
                'plan_bedrooms_text' => esc_html__('Plan Bedrooms', 'houzez'),
                'plan_bathrooms_text' => esc_html__('Plan Bathrooms', 'houzez'),
                'plan_price_text' => esc_html__('Plan Price', 'houzez'),
                'plan_price_postfix_text' => esc_html__('Price Postfix', 'houzez'),
                'plan_image_text' => esc_html__('Plan Image', 'houzez'),
                'plan_description_text' => esc_html__('Plan Description', 'houzez'),
                'plan_upload_text' => esc_html__('Upload', 'houzez'),

                'mu_title_text' => esc_html__('Title', 'houzez'),
                'mu_type_text' => esc_html__('Property Type', 'houzez'),
                'mu_beds_text' => esc_html__('Bedrooms', 'houzez'),
                'mu_baths_text' => esc_html__('Bathrooms', 'houzez'),
                'mu_size_text' => esc_html__('Property Size', 'houzez'),
                'mu_size_postfix_text' => esc_html__('Size Postfix', 'houzez'),
                'mu_price_text' => esc_html__('Property Price', 'houzez'),
                'mu_price_postfix_text' => esc_html__('Price Postfix', 'houzez'),
                'mu_availability_text' => esc_html__('Availability Date', 'houzez'),

                'prop_title' => $prop_req_fields['title'],
                //'description' => $prop_req_fields['description'],
                'prop_type' => $prop_req_fields['prop_type'],
                'prop_status' => $prop_req_fields['prop_status'],
                'prop_labels' => $prop_req_fields['prop_labels'],
                'prop_price' => $prop_req_fields['sale_rent_price'],
                'prop_sec_price' => $prop_req_fields['prop_second_price'],
                'price_label' => $prop_req_fields['price_label'],
                'prop_id' => $prop_req_fields['prop_id'],
                'bedrooms' => $prop_req_fields['bedrooms'],
                'bathrooms' => $prop_req_fields['bathrooms'],
                'area_size' => $prop_req_fields['area_size'],
                'land_area' => $prop_req_fields['land_area'],
                'garages' => $prop_req_fields['garages'],
                'year_built' => $prop_req_fields['year_built'],
                'property_map_address' => $prop_req_fields['property_map_address'],
                /*'neighborhood' => $prop_req_fields['neighborhood'],
                'city' => $prop_req_fields['city'],
                'state' => $prop_req_fields['state'],*/
                'houzez_logged_in' => $houzez_logged_in,
                'process_loader_refresh' => 'fa fa-spin fa-refresh',
                'process_loader_spinner' => 'fa fa-spin fa-spinner',
                'process_loader_circle' => 'fa fa-spin fa-circle-o-notch',
                'process_loader_cog' => 'fa fa-spin fa-cog',
                'success_icon' => 'fa fa-check',
                'login_loading' => esc_html__('Sending user info, please wait...', 'houzez'),
                'processing_text' => esc_html__('Processing, Please wait...', 'houzez'),
                'add_listing_msg' => esc_html__('Submitting, Please wait...', 'houzez'),
                'is_edit_property' => $is_edit_property,

            );
            wp_localize_script('houzez_property', 'houzezProperty', $prop_data);
        }

        $custom_js_code = houzez_option('custom_js_code');
        if (!empty($custom_js_code)) {
            wp_add_inline_script('houzez-custom', $custom_js_code, 'after');
        }

    }
}
add_action( 'wp_enqueue_scripts', 'houzez_scripts' );
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}





// let's add our custom class to the actual link tag    

function tz_menu_classes($classes, $item, $args) {
  if($args->theme_location == 'main-menu') {
    $classes[] = 'waves-effect';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'tz_menu_classes', 1, 3);

// function add_menuclass($ulclass) {
//    return preg_replace('/<a /', '<a class="waves-effect"', $ulclass);
// }
// add_filter('wp_nav_menu','add_menuclass');


add_action('admin_enqueue_scripts', 'houzez_custom_scripts', 99);
function houzez_custom_scripts() {
    if (is_admin()) {
        wp_dequeue_script('ftmetajs');
        wp_deregister_script('ftmetajs');
        wp_enqueue_script('ftmetajs', get_stylesheet_directory_uri() . '/js/admin/init.js', array('jquery', 'media-upload', 'thickbox'));
    }
}

add_filter('rwmb_meta_boxes', 'houzez_register_metaboxes', 99, 3);

if (!function_exists('houzez_register_metaboxes')) {

    function houzez_register_metaboxes() {

        if (!class_exists('RW_Meta_Box')) {
            return;
        }

        global $meta_boxes, $wpdb;

        $houzez_prefix = 'fave_';
        $db_prefix = 'wp_';

        $meta_boxes = array();
        $beachs = get_terms( array(
                        'taxonomy' => 'beaches',
                        'hide_empty' => false,
                    ) );
        $beach_array = array();
           foreach ($beachs as $key => $value) {
               $beach_array[$value->term_id] = $value->name;
        }

        $property_status = get_terms( array(
                        'taxonomy' => 'property_status',
                        'hide_empty' => false,
                    ) );
        $property_status_array = array();
           foreach ($property_status as $key => $value) {
               $property_status_array[$value->term_id] = $value->name;
        }
        // Get Agents
        $agents_array = array(-1 => esc_html__('None', 'houzez'));
        $agents_posts = get_posts(array('post_type' => 'houzez_agent', 'posts_per_page' => -1, 'suppress_filters' => 0));
        if (!empty($agents_posts)) {
            foreach ($agents_posts as $agent_post) {
                $agents_array[$agent_post->ID] = $agent_post->post_title;
            }
        }

        $agencies_2_array = array(-1 => esc_html__('None', 'houzez'));
        $agencies_array = array('' => esc_html__('None', 'houzez'));
        $agencies_posts = get_posts(array('post_type' => 'houzez_agency', 'posts_per_page' => -1, 'suppress_filters' => 0));
        if (!empty($agencies_posts)) {
            foreach ($agencies_posts as $agency_post) {
                $agencies_array[$agency_post->ID] = $agency_post->post_title;
                $agencies_2_array[$agency_post->ID] = $agency_post->post_title;
            }
        }

        $users_array = array();
        $order = 'user_nicename';
        $fave_users = $wpdb->get_results("SELECT * FROM $wpdb->users ORDER BY $order"); // query users
        foreach ($fave_users as $user) : // start users' profile "loop"
            $users_array[$user->ID] = $user->display_name;
        endforeach;

        $prop_status_qry = $wpdb->get_results("SELECT * from $wpdb->terms as tm, $wpdb->term_taxonomy as tx where tm.term_id=tx.term_id AND tx.taxonomy =  'property_status'");

        $prop_status = array();
        foreach ($prop_status_qry as $tax) {
            $prop_status[$tax->slug] = $tax->name . ' ' . '(' . $tax->count . ')';
        }
        $prop_status_temp = array_unshift($prop_status, "-- --");

        $prop_states = array();
        $prop_locations = array();
        $prop_types = array();
        $prop_status = array();
        $prop_features = array();
        $prop_home_appliances = array();
        $prop_beaches = array();
        $prop_services = array();
        $prop_neighborhood = array();
        $agent_categories = array();
        $agent_cities = array();
        $prop_status2 = array(
                        'New' => 'New',
                         'Newly Remodeled' => 'Newly Remodeled',
                         'Renovated' => 'Renovated',
                         'Used' => 'Used',
                         'Under Construction' => 'Under Construction',
                         'Project' => 'Project'
                    );
        
        $prop_furniture = array(
                        '0' => esc_html__('Furnished', 'houzez'),
                        '1' => esc_html__('Unfurnished ', 'houzez'),
                        '2' => esc_html__('Semi Furnished ', 'houzez')
                    );

        houzez_get_terms_array('property_feature', $prop_features);
        houzez_get_terms_array('home_appliances', $prop_home_appliances);
        houzez_get_terms_array('beaches', $prop_beaches);
        houzez_get_terms_array('services', $prop_services);
        houzez_get_terms_array('property_status', $prop_status);
        houzez_get_terms_array('property_type', $prop_types);
        houzez_get_terms_array('property_city', $prop_locations);
        houzez_get_terms_array('property_state', $prop_states);
        houzez_get_terms_array('property_label', $prop_label);
        houzez_get_terms_array('property_area', $prop_neighborhood);
        houzez_get_terms_array('agent_category', $agent_categories);
        houzez_get_terms_array('agent_city', $agent_cities);

        $Countries = array(
            'US' => esc_html__('United States', 'houzez'),
            'CA' => esc_html__('Canada', 'houzez'),
            'AU' => esc_html__('Australia', 'houzez'),
            'FR' => esc_html__('France', 'houzez'),
            'DE' => esc_html__('Germany', 'houzez'),
            'IS' => esc_html__('Iceland', 'houzez'),
            'IE' => esc_html__('Ireland', 'houzez'),
            'IT' => esc_html__('Italy', 'houzez'),
            'ES' => esc_html__('Spain', 'houzez'),
            'SE' => esc_html__('Sweden', 'houzez'),
            'AT' => esc_html__('Austria', 'houzez'),
            'BE' => esc_html__('Belgium', 'houzez'),
            'FI' => esc_html__('Finland', 'houzez'),
            'CZ' => esc_html__('Czech Republic', 'houzez'),
            'DK' => esc_html__('Denmark', 'houzez'),
            'NO' => esc_html__('Norway', 'houzez'),
            'GB' => esc_html__('United Kingdom', 'houzez'),
            'CH' => esc_html__('Switzerland', 'houzez'),
            'NZ' => esc_html__('New Zealand', 'houzez'),
            'RU' => esc_html__('Russian Federation', 'houzez'),
            'PT' => esc_html__('Portugal', 'houzez'),
            'NL' => esc_html__('Netherlands', 'houzez'),
            'IM' => esc_html__('Isle of Man', 'houzez'),
            'AF' => esc_html__('Afghanistan', 'houzez'),
            'AX' => esc_html__('Aland Islands ', 'houzez'),
            'AL' => esc_html__('Albania', 'houzez'),
            'DZ' => esc_html__('Algeria', 'houzez'),
            'AS' => esc_html__('American Samoa', 'houzez'),
            'AD' => esc_html__('Andorra', 'houzez'),
            'AO' => esc_html__('Angola', 'houzez'),
            'AI' => esc_html__('Anguilla', 'houzez'),
            'AQ' => esc_html__('Antarctica', 'houzez'),
            'AG' => esc_html__('Antigua and Barbuda', 'houzez'),
            'AR' => esc_html__('Argentina', 'houzez'),
            'AM' => esc_html__('Armenia', 'houzez'),
            'AW' => esc_html__('Aruba', 'houzez'),
            'AZ' => esc_html__('Azerbaijan', 'houzez'),
            'BS' => esc_html__('Bahamas', 'houzez'),
            'BH' => esc_html__('Bahrain', 'houzez'),
            'BD' => esc_html__('Bangladesh', 'houzez'),
            'BB' => esc_html__('Barbados', 'houzez'),
            'BY' => esc_html__('Belarus', 'houzez'),
            'BZ' => esc_html__('Belize', 'houzez'),
            'BJ' => esc_html__('Benin', 'houzez'),
            'BM' => esc_html__('Bermuda', 'houzez'),
            'BT' => esc_html__('Bhutan', 'houzez'),
            'BO' => esc_html__('Bolivia, Plurinational State of', 'houzez'),
            'BQ' => esc_html__('Bonaire, Sint Eustatius and Saba', 'houzez'),
            'BA' => esc_html__('Bosnia and Herzegovina', 'houzez'),
            'BW' => esc_html__('Botswana', 'houzez'),
            'BV' => esc_html__('Bouvet Island', 'houzez'),
            'BR' => esc_html__('Brazil', 'houzez'),
            'IO' => esc_html__('British Indian Ocean Territory', 'houzez'),
            'BN' => esc_html__('Brunei Darussalam', 'houzez'),
            'BG' => esc_html__('Bulgaria', 'houzez'),
            'BF' => esc_html__('Burkina Faso', 'houzez'),
            'BI' => esc_html__('Burundi', 'houzez'),
            'KH' => esc_html__('Cambodia', 'houzez'),
            'CM' => esc_html__('Cameroon', 'houzez'),
            'CV' => esc_html__('Cape Verde', 'houzez'),
            'KY' => esc_html__('Cayman Islands', 'houzez'),
            'CF' => esc_html__('Central African Republic', 'houzez'),
            'TD' => esc_html__('Chad', 'houzez'),
            'CL' => esc_html__('Chile', 'houzez'),
            'CN' => esc_html__('China', 'houzez'),
            'CX' => esc_html__('Christmas Island', 'houzez'),
            'CC' => esc_html__('Cocos (Keeling) Islands', 'houzez'),
            'CO' => esc_html__('Colombia', 'houzez'),
            'KM' => esc_html__('Comoros', 'houzez'),
            'CG' => esc_html__('Congo', 'houzez'),
            'CD' => esc_html__('Congo, the Democratic Republic of the', 'houzez'),
            'CK' => esc_html__('Cook Islands', 'houzez'),
            'CR' => esc_html__('Costa Rica', 'houzez'),
            'CI' => esc_html__('Cote d\'Ivoire', 'houzez'),
            'HR' => esc_html__('Croatia', 'houzez'),
            'CU' => esc_html__('Cuba', 'houzez'),
            'CW' => esc_html__('Curaçao', 'houzez'),
            'CY' => esc_html__('Cyprus', 'houzez'),
            'DJ' => esc_html__('Djibouti', 'houzez'),
            'DM' => esc_html__('Dominica', 'houzez'),
            'DO' => esc_html__('Dominican Republic', 'houzez'),
            'EC' => esc_html__('Ecuador', 'houzez'),
            'EG' => esc_html__('Egypt', 'houzez'),
            'SV' => esc_html__('El Salvador', 'houzez'),
            'GQ' => esc_html__('Equatorial Guinea', 'houzez'),
            'ER' => esc_html__('Eritrea', 'houzez'),
            'EE' => esc_html__('Estonia', 'houzez'),
            'ET' => esc_html__('Ethiopia', 'houzez'),
            'FK' => esc_html__('Falkland Islands (Malvinas)', 'houzez'),
            'FO' => esc_html__('Faroe Islands', 'houzez'),
            'FJ' => esc_html__('Fiji', 'houzez'),
            'GF' => esc_html__('French Guiana', 'houzez'),
            'PF' => esc_html__('French Polynesia', 'houzez'),
            'TF' => esc_html__('French Southern Territories', 'houzez'),
            'GA' => esc_html__('Gabon', 'houzez'),
            'GM' => esc_html__('Gambia', 'houzez'),
            'GE' => esc_html__('Georgia', 'houzez'),
            'GH' => esc_html__('Ghana', 'houzez'),
            'GI' => esc_html__('Gibraltar', 'houzez'),
            'GR' => esc_html__('Greece', 'houzez'),
            'GL' => esc_html__('Greenland', 'houzez'),
            'GD' => esc_html__('Grenada', 'houzez'),
            'GP' => esc_html__('Guadeloupe', 'houzez'),
            'GU' => esc_html__('Guam', 'houzez'),
            'GT' => esc_html__('Guatemala', 'houzez'),
            'GG' => esc_html__('Guernsey', 'houzez'),
            'GN' => esc_html__('Guinea', 'houzez'),
            'GW' => esc_html__('Guinea-Bissau', 'houzez'),
            'GY' => esc_html__('Guyana', 'houzez'),
            'HT' => esc_html__('Haiti', 'houzez'),
            'HM' => esc_html__('Heard Island and McDonald Islands', 'houzez'),
            'VA' => esc_html__('Holy See (Vatican City State)', 'houzez'),
            'HN' => esc_html__('Honduras', 'houzez'),
            'HK' => esc_html__('Hong Kong', 'houzez'),
            'HU' => esc_html__('Hungary', 'houzez'),
            'IN' => esc_html__('India', 'houzez'),
            'ID' => esc_html__('Indonesia', 'houzez'),
            'IR' => esc_html__('Iran, Islamic Republic of', 'houzez'),
            'IQ' => esc_html__('Iraq', 'houzez'),
            'IL' => esc_html__('Israel', 'houzez'),
            'JM' => esc_html__('Jamaica', 'houzez'),
            'JP' => esc_html__('Japan', 'houzez'),
            'JE' => esc_html__('Jersey', 'houzez'),
            'JO' => esc_html__('Jordan', 'houzez'),
            'KZ' => esc_html__('Kazakhstan', 'houzez'),
            'KE' => esc_html__('Kenya', 'houzez'),
            'KI' => esc_html__('Kiribati', 'houzez'),
            'KP' => esc_html__('Korea, Democratic People\'s Republic of', 'houzez'),
            'KR' => esc_html__('Korea, Republic of', 'houzez'),
            'KV' => esc_html__('kosovo', 'houzez'),
            'KW' => esc_html__('Kuwait', 'houzez'),
            'KG' => esc_html__('Kyrgyzstan', 'houzez'),
            'LA' => esc_html__('Lao People\'s Democratic Republic', 'houzez'),
            'LV' => esc_html__('Latvia', 'houzez'),
            'LB' => esc_html__('Lebanon', 'houzez'),
            'LS' => esc_html__('Lesotho', 'houzez'),
            'LR' => esc_html__('Liberia', 'houzez'),
            'LY' => esc_html__('Libyan Arab Jamahiriya', 'houzez'),
            'LI' => esc_html__('Liechtenstein', 'houzez'),
            'LT' => esc_html__('Lithuania', 'houzez'),
            'LU' => esc_html__('Luxembourg', 'houzez'),
            'MO' => esc_html__('Macao', 'houzez'),
            'MK' => esc_html__('Macedonia', 'houzez'),
            'MG' => esc_html__('Madagascar', 'houzez'),
            'MW' => esc_html__('Malawi', 'houzez'),
            'MY' => esc_html__('Malaysia', 'houzez'),
            'MV' => esc_html__('Maldives', 'houzez'),
            'ML' => esc_html__('Mali', 'houzez'),
            'MT' => esc_html__('Malta', 'houzez'),
            'MH' => esc_html__('Marshall Islands', 'houzez'),
            'MQ' => esc_html__('Martinique', 'houzez'),
            'MR' => esc_html__('Mauritania', 'houzez'),
            'MU' => esc_html__('Mauritius', 'houzez'),
            'YT' => esc_html__('Mayotte', 'houzez'),
            'MX' => esc_html__('Mexico', 'houzez'),
            'FM' => esc_html__('Micronesia, Federated States of', 'houzez'),
            'MD' => esc_html__('Moldova, Republic of', 'houzez'),
            'MC' => esc_html__('Monaco', 'houzez'),
            'MN' => esc_html__('Mongolia', 'houzez'),
            'ME' => esc_html__('Montenegro', 'houzez'),
            'MS' => esc_html__('Montserrat', 'houzez'),
            'MA' => esc_html__('Morocco', 'houzez'),
            'MZ' => esc_html__('Mozambique', 'houzez'),
            'MM' => esc_html__('Myanmar', 'houzez'),
            'NA' => esc_html__('Namibia', 'houzez'),
            'NR' => esc_html__('Nauru', 'houzez'),
            'NP' => esc_html__('Nepal', 'houzez'),
            'NC' => esc_html__('New Caledonia', 'houzez'),
            'NI' => esc_html__('Nicaragua', 'houzez'),
            'NE' => esc_html__('Niger', 'houzez'),
            'NG' => esc_html__('Nigeria', 'houzez'),
            'NU' => esc_html__('Niue', 'houzez'),
            'NF' => esc_html__('Norfolk Island', 'houzez'),
            'MP' => esc_html__('Northern Mariana Islands', 'houzez'),
            'OM' => esc_html__('Oman', 'houzez'),
            'PK' => esc_html__('Pakistan', 'houzez'),
            'PW' => esc_html__('Palau', 'houzez'),
            'PS' => esc_html__('Palestinian Territory, Occupied', 'houzez'),
            'PA' => esc_html__('Panama', 'houzez'),
            'PG' => esc_html__('Papua New Guinea', 'houzez'),
            'PY' => esc_html__('Paraguay', 'houzez'),
            'PE' => esc_html__('Peru', 'houzez'),
            'PH' => esc_html__('Philippines', 'houzez'),
            'PN' => esc_html__('Pitcairn', 'houzez'),
            'PL' => esc_html__('Poland', 'houzez'),
            'PR' => esc_html__('Puerto Rico', 'houzez'),
            'QA' => esc_html__('Qatar', 'houzez'),
            'RE' => esc_html__('Reunion', 'houzez'),
            'RO' => esc_html__('Romania', 'houzez'),
            'RW' => esc_html__('Rwanda', 'houzez'),
            'BL' => esc_html__('Saint Barthélemy', 'houzez'),
            'SH' => esc_html__('Saint Helena', 'houzez'),
            'KN' => esc_html__('Saint Kitts and Nevis', 'houzez'),
            'LC' => esc_html__('Saint Lucia', 'houzez'),
            'MF' => esc_html__('Saint Martin (French part)', 'houzez'),
            'PM' => esc_html__('Saint Pierre and Miquelon', 'houzez'),
            'VC' => esc_html__('Saint Vincent and the Grenadines', 'houzez'),
            'WS' => esc_html__('Samoa', 'houzez'),
            'SM' => esc_html__('San Marino', 'houzez'),
            'ST' => esc_html__('Sao Tome and Principe', 'houzez'),
            'SA' => esc_html__('Saudi Arabia', 'houzez'),
            'SN' => esc_html__('Senegal', 'houzez'),
            'RS' => esc_html__('Serbia', 'houzez'),
            'SC' => esc_html__('Seychelles', 'houzez'),
            'SL' => esc_html__('Sierra Leone', 'houzez'),
            'SG' => esc_html__('Singapore', 'houzez'),
            'SX' => esc_html__('Sint Maarten (Dutch part)', 'houzez'),
            'SK' => esc_html__('Slovakia', 'houzez'),
            'SI' => esc_html__('Slovenia', 'houzez'),
            'SB' => esc_html__('Solomon Islands', 'houzez'),
            'SO' => esc_html__('Somalia', 'houzez'),
            'ZA' => esc_html__('South Africa', 'houzez'),
            'GS' => esc_html__('South Georgia and the South Sandwich Islands', 'houzez'),
            'LK' => esc_html__('Sri Lanka', 'houzez'),
            'SD' => esc_html__('Sudan', 'houzez'),
            'SR' => esc_html__('Suriname', 'houzez'),
            'SJ' => esc_html__('Svalbard and Jan Mayen', 'houzez'),
            'SZ' => esc_html__('Swaziland', 'houzez'),
            'SY' => esc_html__('Syrian Arab Republic', 'houzez'),
            'TW' => esc_html__('Taiwan, Province of China', 'houzez'),
            'TJ' => esc_html__('Tajikistan', 'houzez'),
            'TZ' => esc_html__('Tanzania, United Republic of', 'houzez'),
            'TH' => esc_html__('Thailand', 'houzez'),
            'TL' => esc_html__('Timor-Leste', 'houzez'),
            'TG' => esc_html__('Togo', 'houzez'),
            'TK' => esc_html__('Tokelau', 'houzez'),
            'TO' => esc_html__('Tonga', 'houzez'),
            'TT' => esc_html__('Trinidad and Tobago', 'houzez'),
            'TN' => esc_html__('Tunisia', 'houzez'),
            'TR' => esc_html__('Turkey', 'houzez'),
            'TM' => esc_html__('Turkmenistan', 'houzez'),
            'TC' => esc_html__('Turks and Caicos Islands', 'houzez'),
            'TV' => esc_html__('Tuvalu', 'houzez'),
            'UG' => esc_html__('Uganda', 'houzez'),
            'UA' => esc_html__('Ukraine', 'houzez'),
            'UAE' => esc_html__('United Arab Emirates', 'houzez'),
            'UM' => esc_html__('United States Minor Outlying Islands', 'houzez'),
            'UY' => esc_html__('Uruguay', 'houzez'),
            'UZ' => esc_html__('Uzbekistan', 'houzez'),
            'VU' => esc_html__('Vanuatu', 'houzez'),
            'VE' => esc_html__('Venezuela, Bolivarian Republic of', 'houzez'),
            'VN' => esc_html__('Viet Nam', 'houzez'),
            'VG' => esc_html__('Virgin Islands, British', 'houzez'),
            'VI' => esc_html__('Virgin Islands, U.S.', 'houzez'),
            'WF' => esc_html__('Wallis and Futuna', 'houzez'),
            'EH' => esc_html__('Western Sahara', 'houzez'),
            'YE' => esc_html__('Yemen', 'houzez'),
            'ZM' => esc_html__('Zambia', 'houzez'),
            'ZW' => esc_html__('Zimbabwe', 'houzez')
        );

        $countries_array = array();
        if (!empty($Countries)) {
            foreach ($Countries as $key => $val) {
                $countries_array[$key] = $val;
            }
        }

        $is_multi_agents = false;
        $max_prop_images = houzez_option('max_prop_images');
        $default_country = houzez_option('default_country');
        $enable_multi_agents = houzez_option('enable_multi_agents');
        if ($enable_multi_agents != 0) {
            $is_multi_agents = true;
        }
        //$hide_add_prop_fields = houzez_option('hide_add_prop_fields');
        $auto_property_id = houzez_option('auto_property_id');
        $beds_hidden = $baths_hidden = $garages = $garage_size = $prop_id = $area_size = $land_area = '';

        /* if( $hide_add_prop_fields['bedrooms'] != 0 ) {
          $beds_hidden = 'houzez_hidden';
          }
          if( $hide_add_prop_fields['bathrooms'] != 0 ) {
          $baths_hidden = 'houzez_hidden';
          }
          if( $hide_add_prop_fields['garages'] != 0 ) {
          $garages = 'houzez_hidden';
          }
          if( $hide_add_prop_fields['garage_size'] != 0 ) {
          $garage_size = 'houzez_hidden';
          }
          if( $hide_add_prop_fields['prop_id'] != 0 || $auto_property_id != 0 ) {
          $prop_id = 'houzez_hidden';
          }
          if( $hide_add_prop_fields['area_size'] != 0 ) {
          $area_size = 'houzez_hidden';
          }
          if( $hide_add_prop_fields['land_area'] != 0 ) {
          $land_area = 'houzez_hidden';
          } */

        $currency_hidden = 'multi_currency';
        $multi_currency = houzez_option('multi_currency');

        $multi_currency_field = array();
        if ($multi_currency == 1) {
            $multi_currency_field = array(
                'id' => "{$houzez_prefix}currency",
                'name' => esc_html__('Currency', 'houzez'),
                'type' => 'select',
                'options' => houzez_available_currencies(),
                'std' => houzez_option('default_multi_currency'),
                'columns' => 6,
                //'class' => $currency_hidden,
                'tab' => 'property_details',
            );
        } else {
            $multi_currency_field = array(
                'id' => "hhh_divider",
                'type' => 'divider',
                'columns' => 12,
                'class' => 'houzez_hidden',
                'tab' => 'property_details',
            );
        }
        
        /* ===========================================================================================
         *   Property Custom Post Type Meta
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'property-meta-box',
            'title' => esc_html__('Property', 'houzez'),
            'pages' => array('property'),
            'tabs' => array(
                'property_details' => array(
                    'label' => esc_html__('Information', 'houzez'),
                    'icon' => 'dashicons-admin-home',
                ),
                'property_map' => array(
                    'label' => esc_html__('Map', 'houzez'),
                    'icon' => 'dashicons-location',
                ),
                'property_settings' => array(
                    'label' => esc_html__('Property Setting', 'houzez'),
                    'icon' => 'dashicons-admin-generic',
                ),
                'gallery' => array(
                    'label' => esc_html__('Property Gallery', 'houzez'),
                    'icon' => 'dashicons-format-gallery',
                ),
                'video' => array(
                    'label' => esc_html__('Video', 'houzez'),
                    'icon' => 'dashicons-format-video',
                ),
                'virtual_tour' => array(
                    'label' => esc_html__('360° Virtual Tour', 'houzez'),
                    'icon' => 'dashicons-format-video',
                ),
                'agent' => array(
                    'label' => esc_html__('Contact Information', 'houzez'),
                    'icon' => 'dashicons-businessman',
                ),
                'home_slider' => array(
                    'label' => esc_html__('Slider', 'houzez'),
                    'icon' => 'dashicons-images-alt',
                ),
                /* 'multi_units' => array(
                  'label' => esc_html__('Multi Units / Sub Properties', 'houzez'),
                  'icon' => 'dashicons-layout',
                  ), */
                'floor_plans' => array(
                    'label' => esc_html__('Home plans', 'houzez'),
                    'icon' => 'dashicons-layout',
                ),
                /* 'attachments' => array(
                  'label' => esc_html__('Attachments', 'houzez'),
                  'icon' => 'dashicons-book',
                  ), */
                'private_note' => array(
                    'label' => esc_html__('Private Note', 'houzez'),
                    'icon' => 'dashicons-lightbulb',
                ),
                /* 'energy' => array(
                  'label' => esc_html__('Energy Efficiency', 'houzez'),
                  'icon' => 'dashicons-lightbulb',
                  ), */
                'listing_layout' => array(
                    'label' => esc_html__('Layout', 'houzez'),
                    'icon' => 'dashicons-laptop',
                ),
                'near_by_beaches' => array(
                    'label' => esc_html__('Nearby Beaches', 'houzez-child'),
                    'icon' => 'dashicons dashicons-building',
                ),
                'pricing_policy' => array(
                    'label' => esc_html__('Pricing Policy', 'houzez-child'),
                    'icon' => 'dashicons-shield',
                ),
                'Booking_tab' => array(
                    'label' => esc_html__('Booking', 'houzez-child'),
                    'icon' => 'dashicons-editor-distractionfree',
                ),
                'season_tab' => array(
                    'label' => esc_html__('Seasons', 'houzez-child'),
                    'icon' => 'dashicons-art',
                ),
                'rules_tab' => array(
                    'label' => esc_html__('Rules', 'houzez-child'),
                    'icon' => 'dashicons-layout',
                )
            ),
            'tab_style' => 'left',
            'fields' => array(
                // Property Details
                $multi_currency_field,
                array(
                    'id' => "{$houzez_prefix}property_price",
                    'name' => esc_html__('For Sale Price', 'houzez'),
                    'desc' => esc_html__('Eg: 557000', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_price_prefix",
                    'name' => esc_html__('Before Price Label', 'houzez'),
                    'desc' => esc_html__('Eg: Start From', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_price_postfix",
                    'name' => esc_html__('After Price Label', 'houzez'),
                    'desc' => esc_html__('Eg: Per Month', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_sec_price",
                    'name' => esc_html__('For Rent: Living Prices', 'houzez'),
                    'desc' => esc_html__('Eg: 1500', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_sec_price_prefix",
                    'name' => esc_html__('Before Price Label', 'houzez'),
                    'desc' => esc_html__('Eg: Start From', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_sec_price_postfix",
                    'name' => esc_html__('After Price Label', 'houzez'),
                    'desc' => esc_html__('Eg: Per Month', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_third_price",
                    'name' => esc_html__('For Rent: Vacations Prices', 'houzez'),
                    'desc' => esc_html__('Eg: 1500', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_third_price_prefix",
                    'name' => esc_html__('Before Price Label', 'houzez'),
                    'desc' => esc_html__('Eg: Start From', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_third_price_postfix",
                    'name' => esc_html__('After Price Label', 'houzez'),
                    'desc' => esc_html__('Eg: Per Month', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_id",
                    'name' => esc_html__('Property ID', 'houzez'),
                    'desc' => esc_html__('Property ID will help to search property directly.', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $prop_id,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_name",
                    'name' => esc_html__('Property Name', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $prop_id,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_year",
                    'name' => esc_html__('Year Built', 'houzez'),
                    'desc' => "",
                    'type' => 'date',
                    'js_options' => array(
                        'dateFormat' => esc_html__('yy-mm-dd', 'houzez'),
                        'changeMonth' => true,
                        'changeYear' => true,
                        'showButtonPanel' => true,
                    ),
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_size",
                    'name' => esc_html__('Area Size ( Only digits )', 'houzez'),
                    'desc' => esc_html__('Eg: 1500', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $area_size,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_size_prefix",
                    'name' => esc_html__('Size Prefix', 'houzez'),
                    'desc' => esc_html__('Eg: Sq Ft', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $area_size,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_land",
                    'name' => esc_html__('Land Area ( Only digits )', 'houzez'),
                    'desc' => esc_html__('Eg: 1500', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $land_area,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_land_postfix",
                    'name' => esc_html__('Land Area Postfix', 'houzez'),
                    'desc' => esc_html__('Eg: SqFt', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $land_area,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_bedrooms",
                    'name' => esc_html__('Bedrooms', 'houzez'),
                    'desc' => esc_html__('Eg: 4', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $beds_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}search_bathrooms",
                    'name' => esc_html__('Total Bathrooms (Advanced Search)', 'houzez'),
                    'desc' => esc_html__('Eg: 2.5 (2 Full Baths + 1 Toilet)', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_bathrooms",
                    'name' => esc_html__('Bathrooms (For property detail)', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_toilet",
                    'name' => esc_html__('Toilet (For property detail)', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_guests",
                    'name' => esc_html__('Guests', 'houzez'),
                    'desc' => 'Only For Rent',
                    'type' => 'text',
                    'std' => "",
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_beds",
                    'name' => esc_html__('Beds', 'houzez'),
                    'desc' => 'Only For Rent',
                    'type' => 'text',
                    'std' => "",
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_sea",
                    'name' => esc_html__('Distance to the sea', 'houzez'),
                    'desc' => 'Linea recta',
                    'type' => 'text',
                    'std' => "",
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_furniture",
                    'name' => esc_html__('Furniture', 'houzez'),
                    'type' => 'select',
                    'std' => 'hide',
                    'options' => array(
                        '0' => esc_html__('Furnished', 'houzez'),
                        '1' => esc_html__('Unfurnished ', 'houzez'),
                        '2' => esc_html__('Semi Furnished ', 'houzez')
                    ),
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_status",
                    'name' => esc_html__('Status', 'houzez'),
                    'type' => 'select',
                    'std' => 'hide',
                    'options' => array(
	                    'New' => 'New',
						 'Newly Remodeled' => 'Newly Remodeled',
						 'Renovated' => 'Renovated',
						 'Used' => 'Used',
						 'Under Construction' => 'Under Construction',
						 'Project' => 'Project'
					),
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_oppurtunity",
                    'name' => esc_html__('Make this property as Opputunity', 'houzez'),
                    'type' => 'radio',
                    'std' => 'hide',
                    'options' => array(
                        '1' => esc_html__('Yes', 'houzez'),
                        '0' => esc_html__('No', 'houzez')
                    ),
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                array(
                    'id' => "{$houzez_prefix}property_price_upon_request",
                    'name' => esc_html__('See Price upon request', 'houzez'),
                    'desc' => 'This Property will be displayed regardless of the chosen price range',
                    'type' => 'radio',
                    'std' => 'hide',
                    'options' => array(
                        '1' => esc_html__('Yes', 'houzez'),
                        '0' => esc_html__('No', 'houzez')
                    ),
                    'class' => $baths_hidden,
                    'columns' => 4,
                    'tab' => 'property_details',
                ),
                // Property Map
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'google_map_divider',
                    'tab' => 'property_details',
                ),
                array(
                    'name' => esc_html__('Property Map?', 'houzez'),
                    'id' => "{$houzez_prefix}property_map",
                    'type' => 'radio',
                    'std' => 0,
                    'options' => array(
                        1 => esc_html__('Show ', 'houzez'),
                        0 => esc_html__('Hide', 'houzez')
                    ),
                    'columns' => 12,
                    'tab' => 'property_map',
                ),
                array(
                    'id' => "{$houzez_prefix}property_map_address",
                    'name' => esc_html__('Property Full Address', 'houzez'),
                    'desc' => esc_html__('if donnot add address then map will not show on property detail page.', 'houzez'),
                    'type' => 'text',
                    'std' => '',
                    'columns' => 12,
                    'tab' => 'property_map',
                ),
                array(
                    'id' => "{$houzez_prefix}property_location",
                    'name' => esc_html__('Property Location', 'houzez'),
                    'desc' => esc_html__('Drag and drop marker on map to find exact location or use property add field above.', 'houzez'),
                    'type' => 'map',
                    'std' => '25.686540,-80.431345,15',
                    'style' => 'width: 100%; height: 410px',
                    'address_field' => "{$houzez_prefix}property_map_address",
                    'columns' => 12,
                    'tab' => 'property_map',
                ),
                array(
                    'name' => esc_html__('Google Map Street View', 'houzez'),
                    'id' => "{$houzez_prefix}property_map_street_view",
                    'type' => 'select',
                    'std' => 'hide',
                    'options' => array(
                        'hide' => esc_html__('Hide', 'houzez'),
                        'show' => esc_html__('Show ', 'houzez')
                    ),
                    'columns' => 12,
                    'tab' => 'property_map',
                ),
                // Property Settings
                array(
                    'id' => "{$houzez_prefix}property_address",
                    'name' => esc_html__('Address(*only street name and building no)', 'houzez'),
                    'desc' => "",
                    'type' => 'textarea',
                    'columns' => 6,
                    'tab' => 'property_settings',
                ),
                array(
                    'id' => "{$houzez_prefix}property_zip",
                    'name' => apply_filters('houzez_text_zip_admin', esc_html__('Zip', 'houzez')),
                    'desc' => "",
                    'type' => 'text',
                    'columns' => 6,
                    'tab' => 'property_settings',
                ),
                array(
                    'id' => "{$houzez_prefix}property_country",
                    'name' => esc_html__('Country', 'houzez'),
                    'desc' => "",
                    'std' => $default_country,
                    'type' => 'select',
                    'options' => $countries_array,
                    'columns' => 6,
                    'tab' => 'property_settings',
                ),
                array(
                    'name' => esc_html__('Mark this property as featured?', 'houzez'),
                    'id' => "{$houzez_prefix}featured",
                    'type' => 'radio',
                    'std' => 0,
                    'options' => array(
                        1 => esc_html__('Yes ', 'houzez'),
                        0 => esc_html__('No', 'houzez')
                    ),
                    'columns' => 6,
                    'tab' => 'property_settings',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'loggedin_divider',
                    'tab' => 'property_settings',
                ),
                array(
                    'name' => esc_html__('Logged in to view?', 'houzez'),
                    'id' => "{$houzez_prefix}loggedintoview",
                    'type' => 'radio',
                    'desc' => esc_html__('If "Yes" then only logged in user can view property details.'),
                    'std' => 0,
                    'options' => array(
                        1 => esc_html__('Yes ', 'houzez'),
                        0 => esc_html__('No', 'houzez')
                    ),
                    'columns' => 6,
                    'tab' => 'property_settings',
                ),
                // Gallery
                array(
                    'name' => esc_html__('Images uploader', 'houzez'),
                    'id' => "{$houzez_prefix}property_images",
                    'desc' => esc_html__('Recommend image size 1170 x 738', 'houzez'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 50,
                    'columns' => 12,
                    'tab' => 'gallery',
                ),
                // Property Video
                array(
                    'id' => "{$houzez_prefix}video_url",
                    'name' => esc_html__('Video URL', 'houzez'),
                    'desc' => esc_html__('Enter video link/url. Supported format: YouTube, Vimeo, SWF and MOV', 'houzez'),
                    'type' => 'text',
                    'columns' => 12,
                    'tab' => 'video',
                ),
                array(
                    'name' => esc_html__('Thumbnail', 'houzez'),
                    'id' => "{$houzez_prefix}video_image",
                    'desc' => esc_html__('Upload an image that will be used as cover for the video. Image size have to be at least 810px x 430px.', 'houzez'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'columns' => 12,
                    'tab' => 'video',
                ),
                //Virtual Tour
                array(
                    'id' => "{$houzez_prefix}virtual_tour",
                    'name' => esc_html__('Virtual Tour', 'houzez'),
                    'desc' => esc_html__('Enter virtual tour embeded code', 'houzez'),
                    'type' => 'textarea',
                    'columns' => 12,
                    'tab' => 'virtual_tour',
                ),
                // Agents
                array(
                    'name' => esc_html__('What information do you want to display in agent data container?', 'houzez'),
                    'id' => "{$houzez_prefix}agent_display_option",
                    'type' => 'radio',
                    'std' => 'author_info',
                    'options' => array(
                        'author_info' => esc_html__('Author data', 'houzez'),
                        'agent_info' => esc_html__('Agent data (Choose agent from the list below)', 'houzez'),
                        //'agency_info' => esc_html__('Agency data. ( Choose agency from the list below )', 'houzez'),
                        'none' => esc_html__('Do not display data container', 'houzez'),
                    ),
                    'columns' => 12,
                    'tab' => 'agent',
                ),
                array(
                    'name' => esc_html__('Agent Responsible', 'houzez'),
                    'id' => "{$houzez_prefix}agents",
                    'type' => 'select',
                    'options' => $agents_array,
                    'columns' => 12,
                    'tab' => 'agent',
                    'multiple' => $is_multi_agents
                ),
                /* array(
                  'name' => esc_html__('Agency Responsible', 'houzez'),
                  'id' => "{$houzez_prefix}property_agency",
                  'type' => 'select',
                  'options' => $agencies_2_array,
                  'columns' => 12,
                  'tab' => 'agent',
                  'multiple' => false
                  ), */

                // Homepage Slider
                array(
                    'name' => esc_html__('Do you want to display this property in the slider?', 'houzez'),
                    'id' => "{$houzez_prefix}prop_homeslider",
                    'desc' => esc_html__('Upload an image below if you selected yes.', 'houzez'),
                    'type' => 'radio',
                    'std' => 'no',
                    'options' => array(
                        'yes' => esc_html__('Yes', 'houzez'),
                        'no' => esc_html__('No', 'houzez'),
                    ),
                    'columns' => 12,
                    'tab' => 'home_slider',
                ),
                array(
                    'name' => esc_html__('Slider Image', 'houzez'),
                    'id' => "{$houzez_prefix}prop_slider_image",
                    'desc' => esc_html__('Suggested size 2000px x 700px', 'houzez'),
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'columns' => 12,
                    'tab' => 'home_slider',
                ),

                //Multi Units / Sub Properties
                array(
                    'id' => "{$houzez_prefix}multiunit_plans_enable",
                    'name' => esc_html__('Multi Units / Sub Properties', 'houzez'),
                    'desc' => esc_html__('Enable/Disable', 'houzez'),
                    'type' => 'select',
                    'std' => "disable",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12,
                    'tab' => 'multi_units'
                ),
                array(
                    'id' => "{$houzez_prefix}multi_units_ids",
                    'name' => esc_html__('Listing IDs', 'houzez'),
                    'desc' => esc_html__('Enter listing IDs with comma separater(eg: 4,5,6)', 'houzez'),
                    'type' => 'textarea',
                    'columns' => 12,
                    'tab' => 'multi_units',
                ),
                array(
                    'type' => 'heading',
                    'name' => 'Or',
                    'columns' => 12,
                    'desc' => "",
                    'tab' => 'multi_units',
                ),
                array(
                    'id' => "{$houzez_prefix}multi_units",
                    // Gropu field
                    'type' => 'group',
                    // Clone whole group?
                    'clone' => true,
                    'sort_clone' => true,
                    'tab' => 'multi_units',
                    // Sub-fields
                    'fields' => array(
                        array(
                            'name' => esc_html__('Title', 'houzez'),
                            'id' => "{$houzez_prefix}mu_title",
                            'type' => 'text',
                            'columns' => 12,
                        ),
                        array(
                            'name' => esc_html__('Price', 'houzez'),
                            'id' => "{$houzez_prefix}mu_price",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Price Postfix', 'houzez'),
                            'id' => "{$houzez_prefix}mu_price_postfix",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Bedrooms', 'houzez'),
                            'id' => "{$houzez_prefix}mu_beds",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Bathrooms', 'houzez'),
                            'id' => "{$houzez_prefix}mu_baths",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Property Size', 'houzez'),
                            'id' => "{$houzez_prefix}mu_size",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Size Postfix', 'houzez'),
                            'id' => "{$houzez_prefix}mu_size_postfix",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Property Type', 'houzez'),
                            'id' => "{$houzez_prefix}mu_type",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Availability Date', 'houzez'),
                            'id' => "{$houzez_prefix}mu_availability_date",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                    ),
                ),
                //Floor Plans
                array(
                    'id' => "{$houzez_prefix}floor_plans_enable",
                    'name' => esc_html__('Floor Plans', 'houzez'),
                    'desc' => esc_html__('Enable/Disable floor plans', 'houzez'),
                    'type' => 'select',
                    'std' => "disable",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12,
                    'tab' => 'floor_plans'
                ),
                array(
                    'id' => 'floor_plans',
                    // Gropu field
                    'type' => 'group',
                    // Clone whole group?
                    'clone' => true,
                    'sort_clone' => true,
                    'tab' => 'floor_plans',
                    // Sub-fields
                    'fields' => array(
                        array(
                            'name' => esc_html__('Plan Title', 'houzez'),
                            'id' => "{$houzez_prefix}plan_title",
                            'type' => 'text',
                            'columns' => 12,
                        ),
                        array(
                            'name' => esc_html__('Plan Bedrooms', 'houzez'),
                            'id' => "{$houzez_prefix}plan_rooms",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Plan Bathrooms', 'houzez'),
                            'id' => "{$houzez_prefix}plan_bathrooms",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        /*array(
                            'name' => esc_html__('Plan Price', 'houzez'),
                            'id' => "{$houzez_prefix}plan_price",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Price Postfix', 'houzez'),
                            'id' => "{$houzez_prefix}plan_price_postfix",
                            'type' => 'text',
                            'columns' => 6,
                        ),*/
                        array(
                            'name' => esc_html__('Plan Size', 'houzez'),
                            'id' => "{$houzez_prefix}plan_size",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Plan Image', 'houzez'),
                            'id' => "{$houzez_prefix}plan_image",
                            'type' => 'file_input',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Plan Description', 'houzez'),
                            'id' => "{$houzez_prefix}plan_description",
                            'type' => 'textarea',
                            'columns' => 12,
                        ),
                    ),
                ),
                // Attachments
                array(
                    'id' => "{$houzez_prefix}attachments",
                    'name' => esc_html__('Attachments', 'houzez'),
                    'desc' => esc_html__('You can attach PDF files, Map images OR other documents to provide further details related to property.', 'houzez'),
                    'type' => 'file_advanced',
                    'mime_type' => '',
                    'columns' => 12,
                    'tab' => 'attachments',
                ),
                // Attachments
                array(
                    'id' => "{$houzez_prefix}private_note",
                    'name' => esc_html__('Private Note', 'houzez'),
                    'desc' => esc_html__('Write private note for this property, it will not display for public', 'houzez'),
                    'type' => 'textarea',
                    'mime_type' => '',
                    'columns' => 12,
                    'tab' => 'private_note',
                ),
                //layout
                array(
                    'id' => "{$houzez_prefix}single_top_area",
                    'name' => esc_html__('Property Top Type', 'houzez'),
                    'desc' => esc_html__('Set property top area type.', 'houzez'),
                    'type' => 'select',
                    'std' => "global",
                    'options' => array(
                        'global' => esc_html__('Global', 'houzez'),
                        'v1' => esc_html__('Version 1', 'houzez'),
                        'v2' => esc_html__('Version 2', 'houzez'),
                        'v3' => esc_html__('Version 3', 'houzez'),
                        'v4' => esc_html__('Version 4', 'houzez'),
                    //'v5' => esc_html__( 'Version 5', 'houzez' )
                    ),
                    'columns' => 12,
                    'tab' => 'listing_layout'
                ),
                array(
                    'id' => "{$houzez_prefix}single_content_area",
                    'name' => esc_html__('Property Content Layout', 'houzez'),
                    'desc' => esc_html__('Set property content area type.', 'houzez'),
                    'type' => 'select',
                    'std' => "global",
                    'options' => array(
                        'global' => esc_html__('Global', 'houzez'),
                        'simple' => esc_html__('Default', 'houzez'),
                        'tabs' => esc_html__('Tabs', 'houzez'),
                        'tabs-vertical' => esc_html__('Tabs Vertical', 'houzez'),
                        'v2' => esc_html__('Luxury Homes ( Since v1.4.0 )', 'houzez')
                    ),
                    'columns' => 12,
                    'tab' => 'listing_layout'
                ),
                            
                array(
                    'id' => "{$houzez_prefix}disablereviews_area",
                    'name' => esc_html__('Disable Reviews', 'houzez'),                    
                    'type' => 'select',
                    'std' => "global",                    
                    'type' => 'select',
                    'std' => "",
                    'options' => array('no' => esc_html__('No', 'houzez'), 'yes' => esc_html__('Yes', 'houzez')),
                    'columns' => 12,
                    'tab' => 'listing_layout'
                ),
                            
                array(
                    'id' => "{$houzez_prefix}energy_class",
                    'name' => esc_html__('Energy Class', 'houzez'),
                    'desc' => '',
                    'type' => 'select',
                    'std' => "global",
                    'options' => array(
                        '' => esc_html__('Select Energy Class'),
                        'A+' => 'A+',
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'E' => 'E',
                        'F' => 'F',
                        'G' => 'G',
                        'H' => 'H',
                    ),
                    'columns' => 6,
                    'tab' => 'energy'
                ),
                array(
                    'id' => "{$houzez_prefix}energy_global_index",
                    'name' => esc_html__('Global energy performance index', 'houzez'),
                    'desc' => esc_html__('Eg: 92.42 kWh / m²a', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'energy'
                ),
                array(
                    'id' => "{$houzez_prefix}renewable_energy_global_index",
                    'name' => esc_html__('Renewable energy performance index', 'houzez'),
                    'desc' => esc_html__('Eg: 0.00 kWh / m²a', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'energy'
                ),
                array(
                    'id' => "{$houzez_prefix}energy_performance",
                    'name' => esc_html__('Energy performance of the building', 'houzez'),
                    'desc' => '',
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'energy'
                ),
                array(
                    'id' => "{$db_prefix}near_beach1",
                    'name' => esc_html__('Nearby Beach', 'near_beach1'),
                    'type' => 'select',
                    'std' => "",
                    'options' => $beach_array,
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_distance1",
                    'name' => esc_html__('Distance (only digits)', 'near_distance1'),
                    'desc' => esc_html__('Eg: 100', 'houzez-child'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_size_posfix1",
                    'name' => esc_html__('Size Posfix', 'near_size_posfix1'),
                    'desc' => esc_html__('Eg: m', 'houzez-child'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'near_title_divider1',
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_beach2",
                    'name' => esc_html__('Nearby Beach 2', 'near_beach2'),
                    'type' => 'select',
                    'std' => "",
                    'options' => $beach_array,
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_distance2",
                    'name' => esc_html__('Distance (only digits)', 'near_distance2'),
                    'desc' => esc_html__('Eg: 100', 'houzez-child'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_size_posfix2",
                    'name' => esc_html__('Size Posfix', 'near_size_posfix2'),
                    'desc' => esc_html__('Eg: m', 'houzez-child'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'near_title_divider2',
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_beach3",
                    'name' => esc_html__('Nearby Beach 3', 'near_beach3'),
                    'type' => 'select',
                    'std' => "",
                    'options' => $beach_array,
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_distance3",
                    'name' => esc_html__('Distance (only digits)', 'near_distance3'),
                    'desc' => esc_html__('Eg: 100', 'houzez-child'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                array(
                    'id' => "{$db_prefix}near_size_posfix3",
                    'name' => esc_html__('Size Posfix', 'near_size_posfix3'),
                    'desc' => esc_html__('Eg: m', 'houzez-child'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 4,
                    'tab' => 'near_by_beaches',
                ),
                //Price Tab
                array(
                    'id' => "{$db_prefix}price_policy",
                    'name' => esc_html__('Pricing Policy', 'price_policy'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12,
                    'tab' => 'pricing_policy',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'pricing_title_divider',
                    'tab' => 'pricing_policy',
                ),
                array(
                    'id' => "{$db_prefix}price_section_title",
                    'name' => esc_html__('Section Title', 'price_section_title'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 12,
                    'tab' => 'pricing_policy',
                ),
                array(
                    'id' => "{$db_prefix}price_content",
                    'name' => esc_html__('Content', 'price_content'),
                    'type' => 'textarea',
                    'columns' => 12,
                    'tab' => 'pricing_policy',
                ),
                //Booking Tab
                array(
                    'id' => "{$db_prefix}booking_hbook",
                    'name' => esc_html__('HBook', 'booking_hbook'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12,
                    'tab' => 'Booking_tab',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'booking_title_divider',
                    'tab' => 'Booking_tab',
                ),
                array(
                    'id' => "{$db_prefix}booking_section_title",
                    'name' => esc_html__('Section Title', 'booking_section_title'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 12,
                    'tab' => 'Booking_tab',
                ),
                array(
                    'id' => "{$db_prefix}booking_hbook_shortcode",
                    'name' => esc_html__('HBook Shortcode 1', 'booking_hbook_shortcode'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'Booking_tab',
                ),
                array(
                    'id' => "{$db_prefix}booking_hbook_shortcode2",
                    'name' => esc_html__('HBook Shortcode 2', 'booking_hbook_shortcode2'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                    'tab' => 'Booking_tab',
                ),
                //Seasons Tab           
                array(
                    'id' => "{$db_prefix}season_enable",
                    'name' => esc_html__('Seasons', 'season_enable'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12,
                    'tab' => 'season_tab',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'season_title_divider',
                    'tab' => 'season_tab',
                ),
                array(
                    'id' => "{$db_prefix}season_section_title",
                    'name' => esc_html__('Section Title', 'season_section_title'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 12,
                    'tab' => 'season_tab',
                ),
                array(
                    'id' => "{$db_prefix}season_content",
                    'name' => esc_html__('Content', 'season_content'),
                    'type' => 'textarea',
                    'columns' => 12,
                    'tab' => 'season_tab',
                ),
                //Rule Tab                  
                array(
                    'id' => "{$db_prefix}rules_enable",
                    'name' => esc_html__('Rules', 'rules_enable'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12,
                    'tab' => 'rules_tab',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'rules_title_divider',
                    'tab' => 'rules_tab',
                ),
                array(
                    'id' => "{$db_prefix}rules_section_title",
                    'name' => esc_html__('Section Title', 'rules_section_title'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 12,
                    'tab' => 'rules_tab',
                ),
                array(
                    'id' => "{$db_prefix}rules_pets_enable",
                    'name' => esc_html__('Pets', 'rules_pets_enable'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('allowed' => esc_html__('Pets Allowed', 'houzez'), 'notallowed' => esc_html__('Pets Not Allowed', 'houzez')),
                    'columns' => 6,
                    'tab' => 'rules_tab',
                ),
                array(
                    'id' => "{$db_prefix}rules_security",
                    'name' => esc_html__('Security Deposit', 'rules_security'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('no' => esc_html__('No', 'houzez'), 'yes' => esc_html__('Yes', 'houzez')),
                    'columns' => 6,
                    'tab' => 'rules_tab',
                ),
                array(
                    'type' => 'divider',
                    'columns' => 12,
                    'id' => 'rules_divider',
                    'tab' => 'rules_tab',
                ),
                array(
                    'id' => 'own_rules',
                    'type' => 'group',
                    'clone' => true,
                    'sort_clone' => true,
                    'tab' => 'rules_tab',
                    // Sub-fields
                    'fields' => array(
                        array(
                            'name' => esc_html__('Rules', 'houzez'),
                            'id' => "{$houzez_prefix}new_rules",
                            'type' => 'text',
                            'columns' => 12,
                        )
                    )
                )
            )
        );

        //if( $hide_add_prop_fields['additional_details'] != 1 ) {
        $meta_boxes[] = array(
            'title' => esc_html__('Additional Features', 'houzez'),
            'pages' => array('property'),
            'fields' => array(
                array(
                    'id' => "{$houzez_prefix}additional_features_enable",
                    'name' => esc_html__('Additional Features', 'houzez'),
                    'desc' => esc_html__('Enable/Disable Additional Features', 'houzez'),
                    'type' => 'select',
                    'std' => "disable",
                    'options' => array('disable' => esc_html__('Disable', 'houzez'), 'enable' => esc_html__('Enable', 'houzez')),
                    'columns' => 12
                ),
                array(
                    'id' => 'additional_features',
                    'type' => 'group',
                    'clone' => true,
                    'sort_clone' => true,
                    'fields' => array(
                        array(
                            'name' => esc_html__('Title', 'houzez'),
                            'id' => "{$houzez_prefix}additional_feature_title",
                            'type' => 'text',
                            'columns' => 6,
                        ),
                        array(
                            'name' => esc_html__('Value', 'houzez'),
                            'id' => "{$houzez_prefix}additional_feature_value",
                            'type' => 'text',
                            'columns' => 6,
                        )
                    ),
                ),
            ),
        );
        //}

        /* ===========================================================================================
         *   Agent
         * ============================================================================================ */
        $meta_boxes[] = array(
            'title' => esc_html__('Agent Information', 'houzez'),
            'pages' => array('houzez_agent'),
            'fields' => array(
                array(
                    'name' => esc_html__('Short Description', 'houzez'),
                    'id' => $houzez_prefix . 'agent_des',
                    'type' => 'textarea',
                    'desc' => '',
                    'columns' => 12
                ),
                array(
                    'id' => "{$houzez_prefix}agent_email",
                    'name' => esc_html__('Email Address', 'houzez'),
                    'desc' => esc_html__('Provide agent email address, Agent related messages from contact form on property details page, will be sent on this email address. ', 'houzez'),
                    'type' => 'email',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'name' => 'Position',
                    'id' => $houzez_prefix . 'agent_position',
                    'type' => 'text',
                    'desc' => esc_html__('Ex: Founder & CEO.', 'houzez'),
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Company Name', 'houzez'),
                    'id' => $houzez_prefix . 'agent_company',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('License', 'houzez'),
                    'id' => $houzez_prefix . 'agent_license',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Tax Number', 'houzez'),
                    'id' => $houzez_prefix . 'agent_tax_no',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_mobile",
                    'name' => esc_html__("Mobile Number", 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_office_num",
                    'name' => esc_html__("Office Number", 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_fax",
                    'name' => esc_html__("Fax Number", 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_skype",
                    'name' => "Skype",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_website",
                    'name' => esc_html__("Website", 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_facebook",
                    'name' => "Facebook URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_twitter",
                    'name' => "Twitter URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_linkedin",
                    'name' => "LinkedIn URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_googleplus",
                    'name' => "Google Plus URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_youtube",
                    'name' => "Youtube URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_instagram",
                    'name' => "Instagram URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_pinterest",
                    'name' => "Pinterest URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_vimeo",
                    'name' => "Vimeo URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_language",
                    'name' => esc_html__('Language', 'houzez'),
                    'desc' => esc_html__('ie: english, spanish, french ', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agent_address",
                    'name' => esc_html__('Address', 'houzez'),
                    'desc' => esc_html__('Enter your address, it will use for invoices ', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Company Logo', 'houzez'),
                    'id' => $houzez_prefix . 'agent_logo',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'desc' => '',
                    'columns' => 12
                )
            ),
        );

        $meta_boxes[] = array(
            'title' => esc_html__('Agencies', 'houzez'),
            'pages' => array('houzez_agent'),
            'context' => 'side',
            'priority' => 'high',
            'fields' => array(
                array(
                    'id' => $houzez_prefix . 'agent_agencies',
                    'type' => 'select',
                    'options' => $agencies_array,
                    'desc' => '',
                    'columns' => 12,
                    'multiple' => false
                ),
            )
        );

        /* ===========================================================================================
         *   Membership
         * ============================================================================================ */
        $meta_boxes[] = array(
            'title' => esc_html__('Package Details', 'houzez'),
            'pages' => array('houzez_packages'),
            'fields' => array(
                array(
                    'id' => "{$houzez_prefix}billing_time_unit",
                    'name' => esc_html__('Billing Period', 'houzez'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('Day' => esc_html__('Day', 'houzez'), 'Week' => esc_html__('Week', 'houzez'), 'Month' => esc_html__('Month', 'houzez'), 'Year' => esc_html__('Year', 'houzez')),
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}billing_unit",
                    'name' => esc_html__('Billing Frequency', 'houzez'),
                    'type' => 'text',
                    'std' => "0",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_listings",
                    'name' => esc_html__('How many listings are included?', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}unlimited_listings",
                    'name' => esc_html__("Unlimited listings", 'houzez'),
                    'type' => 'checkbox',
                    'desc' => esc_html__('Unlimited listings ?', 'houzez'),
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_featured_listings",
                    'name' => esc_html__('How many Featured listings are included?', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_price",
                    'name' => esc_html__('Package Price ', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_stripe_id",
                    'name' => esc_html__('Package stripe id (ex: gold_pack)', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_visible",
                    'name' => esc_html__('Is Visible?', 'houzez'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('yes' => esc_html__('Yes', 'houzez'), 'no' => esc_html__('No', 'houzez')),
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_images",
                    'name' => esc_html__('How many images are included per listing?', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}unlimited_images",
                    'name' => esc_html__("Unlimited Images", 'houzez'),
                    'type' => 'checkbox',
                    'desc' => esc_html__('Same as defined in Theme Options', 'houzez'),
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_tax",
                    'name' => esc_html__('Taxes', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_popular",
                    'name' => esc_html__('Is Popular/Featured?', 'houzez'),
                    'type' => 'select',
                    'std' => "no",
                    'options' => array('no' => esc_html__('No', 'houzez'), 'yes' => esc_html__('Yes', 'houzez')),
                    'columns' => 6,
                ),
                array(
                    'id' => "{$houzez_prefix}package_custom_link",
                    'name' => esc_html__('Custom Link', 'houzez'),
                    'desc' => esc_html__('Leave empty if you do not want to custom link.', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 12,
                ),
            ),
        );

        $currency_symbol = houzez_option('currency_symbol');
        /* ===========================================================================================
         *   Listing Template
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'fave_listing_template',
            'title' => esc_html__('Property Listing Advanced Options', 'houzez'),
            'pages' => array('page'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Default View', 'houzez'),
                    'id' => $houzez_prefix . 'default_view',
                    'type' => 'select',
                    'options' => array(
                        'list_view' => esc_html__('List View', 'houzez'),
                        'grid_view' => esc_html__('Grid View', 'houzez'),
                        'grid_view_3_col' => esc_html__('Grid View 3 col ( Only for "Property listing full width template" )', 'houzez')
                    ),
                    'std' => array('list_view'),
                    'desc' => esc_html__('Select default view for listing page( will not work for listing template style 3 )', 'houzez'),
                    'columns' => 6,
                ),
                array(
                    'name' => esc_html__('Order Properties By', 'houzez'),
                    'id' => $houzez_prefix . 'properties_sort',
                    'type' => 'select',
                    'options' => array(
                        'd_date' => esc_html__('Date New to Old', 'houzez'),
                        'a_date' => esc_html__('Date Old to New', 'houzez'),
                        'd_price' => esc_html__('Price (High to Low)', 'houzez'),
                        'a_price' => esc_html__('Price (Low to High)', 'houzez'),
                        'featured_first' => esc_html__('Show Featured on Top', 'houzez'),
                        'x_featured_first' => esc_html__('Show first (x) listings featured then non-featured', 'houzez'),
                        'x_rand_featured_first' => esc_html__('Show first (x) listings featured randomly then non-featured', 'houzez'),
                    ),
                    'std' => array('d_date'),
                    'desc' => '',
                    'columns' => 6,
                ),
                array(
                    'id' => $houzez_prefix . "featured_prop_no",
                    'name' => esc_html__('Number of featured listings to show', 'houzez'),
                    'desc' => "",
                    'type' => 'number',
                    'std' => "4",
                    'columns' => 6
                ),
                array(
                    'id' => $houzez_prefix . "prop_no",
                    'name' => esc_html__('Number of listings to show', 'houzez'),
                    'desc' => "",
                    'type' => 'number',
                    'std' => "9",
                    'columns' => 6
                ),
                array(
                    'id' => $houzez_prefix . "listings_tabs",
                    'name' => esc_html__('Tabs', 'houzez'),
                    'desc' => esc_html__('Enable/Disable listing tabs', 'houzez'),
                    'type' => 'select',
                    'std' => "",
                    'options' => array('enable' => esc_html__('Enable', 'houzez'), 'disable' => esc_html__('Disable', 'houzez')),
                    'columns' => 12
                ),
                array(
                    'id' => $houzez_prefix . "listings_tab_1",
                    'name' => esc_html__('Tabs One', 'houzez'),
                    'desc' => esc_html__('Choose property status for this tab', 'houzez'),
                    'type' => 'select',
                    'std' => "",
                    'options' => $prop_status,
                    'columns' => 6
                ),
                array(
                    'id' => $houzez_prefix . "listings_tab_2",
                    'name' => esc_html__('Tabs Two', 'houzez'),
                    'desc' => esc_html__('Choose property status for this tab', 'houzez'),
                    'type' => 'select',
                    'std' => "",
                    'options' => $prop_status,
                    'columns' => 6
                ),
                /* array(
                  'id' => $houzez_prefix."featured_listing",
                  'name' => esc_html__('Featured Listings', 'houzez'),
                  'desc' => esc_html__('Enable/Disable featured listings on top. Ex: Show first (x) listings featured then non-featured', 'houzez'),
                  'type' => 'select',
                  'std' => "",
                  'options' => array('enable' => 'Enable', 'disable' => 'Disable'),
                  'columns' => 12
                  ), */


                /*
                 * Only for half map template
                 * */
                array(
                    'id' => $houzez_prefix . "prop_no_halfmap",
                    'name' => esc_html__('Number of listings to show', 'houzez'),
                    'desc' => "",
                    'type' => 'number',
                    'std' => "9",
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Order Properties By', 'houzez'),
                    'id' => $houzez_prefix . 'properties_sort_halfmap',
                    'type' => 'select',
                    'options' => array(
                        'none' => esc_html__('Default', 'houzez'),
                        'featured_top' => esc_html__('Show Featured Listings on Top', 'houzez'),
                        'd_date' => esc_html__('Date New to Old', 'houzez'),
                        'a_date' => esc_html__('Date Old to New', 'houzez'),
                        'd_price' => esc_html__('Price (High to Low)', 'houzez'),
                        'a_price' => esc_html__('Price (Low to High)', 'houzez'),
                    ),
                    'std' => array('d_date'),
                    'desc' => '',
                    'columns' => 6,
                ),
                /*
                 * End only for half map template
                 * */


                //Filters
                array(
                    'name' => esc_html__('Types', 'houzez'),
                    'id' => $houzez_prefix . 'types',
                    'type' => 'select',
                    'options' => $prop_types,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Action', 'houzez'),
                    'id' => $houzez_prefix . 'status',
                    'type' => 'select',
                    'options' => $prop_status,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Labels', 'houzez'),
                    'id' => $houzez_prefix . 'labels',
                    'type' => 'select',
                    'options' => $prop_label,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('States', 'houzez'),
                    'id' => $houzez_prefix . 'states',
                    'type' => 'select',
                    'options' => $prop_states,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Cities', 'houzez'),
                    'id' => $houzez_prefix . 'locations',
                    'type' => 'select',
                    'options' => $prop_locations,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Neighborhood', 'houzez'),
                    'id' => $houzez_prefix . 'area',
                    'type' => 'select',
                    'options' => $prop_neighborhood,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Features', 'houzez'),
                    'id' => $houzez_prefix . 'features',
                    'type' => 'select',
                    'options' => $prop_features,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Services', 'houzez'),
                    'id' => $houzez_prefix . 'services',
                    'type' => 'select',
                    'options' => $prop_services,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Home Appliances', 'houzez'),
                    'id' => $houzez_prefix . 'home_appliances',
                    'type' => 'select',
                    'options' => $prop_home_appliances,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Beaches', 'houzez'),
                    'id' => $houzez_prefix . 'beaches',
                    'type' => 'select',
                    'options' => $prop_beaches,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Status', 'houzez'),
                    'id' => $houzez_prefix . 'status2',
                    'type' => 'select',
                    'options' => $prop_status2,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Furniture', 'houzez'),
                    'id' => $houzez_prefix . 'furniture',
                    'type' => 'select',
                    'options' => $prop_furniture,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Min Price', 'houzez'),
                    'id' => $houzez_prefix . 'min_price',
                    'type' => 'number',
                    'options' => '',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Max Price', 'houzez'),
                    'id' => $houzez_prefix . 'max_price',
                    'type' => 'number',
                    'options' => '',
                    'desc' => '',
                    'columns' => 6
                )
            )
        );


        /* ===========================================================================================
         *   Agencies Template
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'fave_agencies_template',
            'title' => esc_html__('Agencies Options', 'houzez'),
            'pages' => array('page'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Order By', 'houzez'),
                    'id' => $houzez_prefix . 'agency_orderby',
                    'type' => 'select',
                    'options' => array('None' => 'none', 'ID' => 'ID', 'title' => 'title', 'Date' => 'date', 'Random' => 'rand', 'Menu Order' => 'menu_order'),
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => false
                ),
                array(
                    'name' => esc_html__('Order', 'houzez'),
                    'id' => $houzez_prefix . 'agency_order',
                    'type' => 'select',
                    'options' => array('ASC' => 'ASC', 'DESC' => 'DESC'),
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => false
                ),
            )
        );

        /* ===========================================================================================
         *   Agents Template
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'fave_agents_template',
            'title' => esc_html__('Agents Options', 'houzez'),
            'pages' => array('page'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Order By', 'houzez'),
                    'id' => $houzez_prefix . 'agent_orderby',
                    'type' => 'select',
                    'options' => array('None' => 'none', 'ID' => 'ID', 'title' => 'title', 'Date' => 'date', 'Random' => 'rand', 'menu_order' => 'Menu Order'),
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => false
                ),
                array(
                    'name' => esc_html__('Order', 'houzez'),
                    'id' => $houzez_prefix . 'agent_order',
                    'type' => 'select',
                    'options' => array('ASC' => 'ASC', 'DESC' => 'DESC'),
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => false
                ),
                //Filters
                array(
                    'name' => esc_html__('Agent Category', 'houzez'),
                    'id' => $houzez_prefix . 'agent_category',
                    'type' => 'select',
                    'options' => $agent_categories,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Agent City', 'houzez'),
                    'id' => $houzez_prefix . 'agent_city',
                    'type' => 'select',
                    'options' => $agent_cities,
                    'desc' => '',
                    'columns' => 6,
                    'multiple' => true
                )
            )
        );

        /* ===========================================================================================
         *   Page Settings
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'fave_default_template_settings',
            'title' => esc_html__('Page Template Options', 'houzez'),
            'pages' => array('page'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Page Title', 'houzez'),
                    'id' => $houzez_prefix . 'page_title',
                    'type' => 'select',
                    'options' => array(
                        'show' => esc_html__('Show', 'houzez'),
                        'hide' => esc_html__('Hide', 'houzez')
                    ),
                    'std' => array('show'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Page Breadcrumb', 'houzez'),
                    'id' => $houzez_prefix . 'page_breadcrumb',
                    'type' => 'select',
                    'options' => array(
                        'show' => esc_html__('Show', 'houzez'),
                        'hide' => esc_html__('Hide', 'houzez')
                    ),
                    'std' => array('show'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Page Sidebar', 'houzez'),
                    'id' => $houzez_prefix . 'page_sidebar',
                    'type' => 'select',
                    'options' => array(
                        'none' => esc_html__('None', 'houzez'),
                        'right_sidebar' => esc_html__('Right Sidebar', 'houzez'),
                        'left_sidebar' => esc_html__('Left Sidebar', 'houzez')
                    ),
                    'std' => array('right_sidebar'),
                    'desc' => esc_html__('Choose page Sidebar', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Page Background', 'houzez'),
                    'id' => $houzez_prefix . 'page_background',
                    'type' => 'select',
                    'options' => array(
                        'none' => esc_html__('None', 'houzez'),
                        'yes' => esc_html__('Yes', 'houzez')
                    ),
                    'std' => array('yes'),
                    'desc' => esc_html__('Choose page background', 'houzez'),
                )
            )
        );

        /* ===========================================================================================
         *   Page Settings
         * ============================================================================================ */

        $meta_boxes[] = array(
            'id' => 'fave_page_settings',
            'title' => esc_html__('Page Header Options', 'houzez'),
            'pages' => array('page'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Header Type', 'houzez'),
                    'id' => $houzez_prefix . 'header_type',
                    'type' => 'select',
                    'options' => array(
                        'none' => esc_html__('None', 'houzez'),
                        'property_slider' => esc_html__('Properties Slider', 'houzez'),
                        'property_slider' => esc_html__('Properties Slider', 'houzez'),
                        'rev_slider' => esc_html__('Revolution Slider', 'houzez'),
                        'property_map' => esc_html__('Properties Google Map', 'houzez'),
                        'static_image' => esc_html__('Image', 'houzez'),
                        'video' => esc_html__('Video', 'houzez'),
                        'property_search' => esc_html__('Properties Search', 'houzez'),
                        'tz_header_style' => esc_html__('TZ Header Type', 'houzez'),
                    ),
                    'std' => array('none'),
                    'desc' => esc_html__('Choose page header type', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Full Screen', 'houzez'),
                    'id' => $houzez_prefix . 'header_full_screen',
                    'type' => 'select',
                    'options' => array(
                        'no' => esc_html__('No', 'houzez'),
                        'yes' => esc_html__('Yes', 'houzez')
                    ),
                    'std' => array('no'),
                    'desc' => esc_html__('If "Yes" it will fit according to screen size', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Full Screen Type', 'houzez'),
                    'id' => $houzez_prefix . 'header_full_screen_type',
                    'type' => 'select',
                    'options' => array(
                        'screen_fix' => esc_html__('Screen fix', 'houzez'),
                        'auto_fix' => esc_html__('Auto fix', 'houzez')
                    ),
                    'std' => array('screen_fix'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Title', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_title',
                    'type' => 'text',
                    'std' => '',
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Subtitle', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_subtitle',
                    'type' => 'text',
                    'std' => '',
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Show Search', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_search',
                    'type' => 'select',
                    'options' => array(
                        'no' => esc_html__('No', 'houzez'),
                        'yes' => esc_html__('Yes', 'houzez')
                    ),
                    'std' => array('no'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Revolution Slider', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_revslider',
                    'type' => 'select_advanced',
                    'std' => '',
                    'options' => houzez_get_revolution_slider(),
                    'multiple' => false,
                    'placeholder' => esc_html__('Select an Slider', 'houzez'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Image', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_image',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Image Height', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_image_height',
                    'type' => 'text',
                    'std' => '',
                    'desc' => esc_html__('Default 600px', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Overlay Color', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_image_overlay',
                    'type' => 'color',
                    'std' => '',
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Overlay Color Opacity', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_image_opacity',
                    'type' => 'select',
                    'options' => array(
                        '0' => '0',
                        '0.1' => '1',
                        '0.2' => '2',
                        '0.3' => '3',
                        '0.4' => '4',
                        '0.5' => '5',
                        '0.6' => '6',
                        '0.7' => '7',
                        '0.8' => '8',
                        '0.9' => '9',
                        '1' => '10',
                    ),
                    'std' => array('0.5'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('MP4 File', 'houzez'),
                    'id' => "{$houzez_prefix}page_header_bg_mp4",
                    'type' => 'file_input'
                ),
                array(
                    'name' => esc_html__('WEBM File', 'houzez'),
                    'id' => "{$houzez_prefix}page_header_bg_webm",
                    'type' => 'file_input'
                ),
                array(
                    'name' => esc_html__('OGV File', 'houzez'),
                    'id' => "{$houzez_prefix}page_header_bg_ogv",
                    'type' => 'file_input'
                ),
                array(
                    'name' => esc_html__('Video Overlay', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_video_overlay',
                    'type' => 'select',
                    'options' => array(
                        'yes' => esc_html__('Yes', 'houzez'),
                        'no' => esc_html__('No', 'houzez')
                    ),
                    'std' => array('yes'),
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Overlay Image', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_video_overlay_img',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Video Image', 'houzez'),
                    'id' => $houzez_prefix . 'page_header_video_img',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Select City', 'houzez'),
                    'id' => $houzez_prefix . 'map_city123',
                    'type' => 'select',
                    'options' => $prop_locations,
                    'desc' => esc_html__('Choose city for proeprties on map header, you can select multiple cities or keep all un-select to show from all cities', 'houzez'),
                    'multiple' => true
                ),
                array(
                    'name' => esc_html__('Left Side', 'houzez'),
                    'id' => $houzez_prefix . 'tz-left-heading',
                    'type' => 'heading',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Left side configurations', 'houzez')
                ),
                array(
                    'name' => esc_html__('Image', 'houzez'),
                    'id' => $houzez_prefix . 'tz_left_image',
                    'type' => 'image_advanced',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Add left image (Sale)', 'houzez'),
                    'max_file_uploads' => 1
                ),
                array(
                    'name' => esc_html__('Button Text', 'houzez'),
                    'id' => $houzez_prefix . 'tz_left_button_text',
                    'type' => 'text',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Add/Modify left button text', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Info Text', 'houzez'),
                    'id' => $houzez_prefix . 'tz_left_info_text',
                    'type' => 'text',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Add/Modify left informative text', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Right Side', 'houzez'),
                    'id' => $houzez_prefix . 'tz_right_heading',
                    'type' => 'heading',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Right side configurations', 'houzez')
                ),
                array(
                    'name' => esc_html__('Image', 'houzez'),
                    'id' => $houzez_prefix . 'tz_right_image',
                    'type' => 'image_advanced',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Add left image (Sale)', 'houzez'),
                    'max_file_uploads' => 1
                ),
                array(
                    'name' => esc_html__('Button Text', 'houzez'),
                    'id' => $houzez_prefix . 'tz_right_button_text',
                    'type' => 'text',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Add/Modify right button text', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Info Text', 'houzez'),
                    'id' => $houzez_prefix . 'tz_right_info_text',
                    'type' => 'text',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Add/Modify right informative text', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Secondary Text 1', 'houzez'),
                    'id' => $houzez_prefix . 'tz_right_sec_text_1',
                    'type' => 'text',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Text for vacation rental', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Secondary Text 2', 'houzez'),
                    'id' => $houzez_prefix . 'tz_right_sec_text_2',
                    'type' => 'text',
                    'class' => 'tz-field',
                    'desc' => esc_html__('Text for long term rental', 'houzez'),
                )
            )
        );

        $meta_boxes[] = array(
            'id' => 'fave_menu_settings',
            'title' => esc_html__('Page Navigation Options', 'houzez'),
            'pages' => array('page'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Main Menu Transparent ?', 'houzez'),
                    'id' => $houzez_prefix . 'main_menu_trans',
                    'type' => 'select',
                    'options' => array(
                        'no' => esc_html__('No', 'houzez'),
                        'yes' => esc_html__('Yes', 'houzez')
                    ),
                    'std' => array('no'),
                    'desc' => esc_html__('Will only work with header 4, you can choose header 4 from theme options', 'houzez'),
                ),
            )
        );

        /* ===========================================================================================
         *   Post Meta
         * ============================================================================================ */

        $meta_boxes[] = array(
            'id' => 'fave_format_gallery',
            'title' => esc_html__('Gallery Format', 'houzez'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Upload Gallery Images: ', 'houzez'),
                    'desc' => '',
                    'id' => $houzez_prefix . 'gallery_posts',
                    'type' => 'image_advanced',
                    'std' => ''
                )
            )
        );

        $meta_boxes[] = array(
            'id' => 'fave_format_video',
            'title' => esc_html__('Video Format', 'houzez'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Add video page url: ', 'houzez'),
                    'desc' => '',
                    'id' => $houzez_prefix . 'video_post',
                    'type' => 'text',
                    'std' => '',
                    'desc' => __(' - For exmaple https://vimeo.com/120596335', 'houzez')
                )
            )
        );

        $meta_boxes[] = array(
            'id' => 'fave_format_audio',
            'title' => esc_html__('Audio Format', 'houzez'),
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Add SoundCloud Audio: ', 'houzez'),
                    'desc' => '',
                    'id' => $houzez_prefix . 'audio_post',
                    'type' => 'text',
                    'std' => '',
                    'desc' => esc_html__(' - Paste page URL from SoundCloud', 'houzez')
                )
            )
        );


        /* ===========================================================================================
         *   Advanced Search
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'fave_advanced_search',
            'title' => esc_html__('Advanced Search', 'houzez'),
            'pages' => array('page'),
            'context' => 'side',
            'priority' => 'high',
            'fields' => array(
                array(
                    'name' => esc_html__('Advanced Search', 'houzez'),
                    'desc' => '',
                    'id' => $houzez_prefix . 'adv_search_enable',
                    'type' => 'select',
                    'options' => array(
                        'global' => esc_html__('Global ( As theme options settings )', 'houzez'),
                        'current_page' => esc_html__('Custom Settings for this Page', 'houzez')
                    ),
                    'std' => array('global'),
                    'desc' => ''
                ),
                array(
                    'name' => esc_html__('Search Options ', 'houzez'),
                    'desc' => '',
                    'id' => $houzez_prefix . 'adv_search',
                    'type' => 'select',
                    'options' => array(
                        'hide' => esc_html__('Hide for This Page', 'houzez'),
                        'show' => esc_html__('Show for This Page', 'houzez'),
                        'hide_show' => esc_html__('Hide but show on scroll', 'houzez'),
                    ),
                    'std' => array('hide'),
                    'desc' => ''
                ),
                array(
                    'name' => esc_html__('Search Position ', 'houzez'),
                    'desc' => '',
                    'id' => $houzez_prefix . 'adv_search_pos',
                    'type' => 'select',
                    'options' => array(
                        'under_menu' => esc_html__('Under Navigation', 'houzez'),
                        // 'under_banner' => esc_html__('Under Banners ( Sliders, Map, Video etc )', 'houzez')
                    ),
                    'std' => array('under_menu'),
                    'desc' => ''
                )
            )
        );

        /* ===========================================================================================
         *   Testimonials
         * ============================================================================================ */
        $meta_boxes[] = array(
            'id' => 'fave_testimonials',
            'title' => esc_html__('Testimonial Details', 'houzez'),
            'pages' => array('houzez_testimonials'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Testimonial Text', 'houzez'),
                    'id' => $houzez_prefix . 'testi_text',
                    'type' => 'textarea',
                    'desc' => esc_html__('Write a testimonial into the textarea.', 'houzez'),
                ),
                array(
                    'name' => esc_html__('By who?', 'houzez'),
                    'id' => $houzez_prefix . 'testi_name',
                    'type' => 'text',
                    'desc' => esc_html__('Name of the client who gave feedback', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Position', 'houzez'),
                    'id' => $houzez_prefix . 'testi_position',
                    'type' => 'text',
                    'desc' => esc_html__('Ex: Founder & CEO.', 'houzez'),
                ),
                array(
                    'name' => esc_html__('Company Name', 'houzez'),
                    'id' => $houzez_prefix . 'testi_company',
                    'type' => 'text',
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Photo', 'houzez'),
                    'id' => $houzez_prefix . 'testi_photo',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'desc' => '',
                ),
                array(
                    'name' => esc_html__('Company Logo', 'houzez'),
                    'id' => $houzez_prefix . 'testi_logo',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'desc' => '',
                )
            )
        );


        //Partners        
        $meta_boxes[] = array(
            'id' => 'fave_partners',
            'title' => esc_html__('Partner Details', 'houzez'),
            'pages' => array('houzez_partner'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Partner website address', 'houzez'),
                    'id' => $houzez_prefix . 'partner_website',
                    'type' => 'url',
                    'desc' => esc_html__('Enter website address', 'houzez'),
                )
            )
        );


        //Partners        
        $meta_boxes[] = array(
            'id' => 'houzez_agencies',
            'title' => esc_html__('Agency Information', 'houzez'),
            'pages' => array('houzez_agency'),
            'context' => 'normal',
            'fields' => array(
                array(
                    'name' => esc_html__('Email', 'houzez'),
                    'id' => $houzez_prefix . 'agency_email',
                    'type' => 'email',
                    'desc' => esc_html__('Enter email address', 'houzez'),
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Mobile', 'houzez'),
                    'id' => $houzez_prefix . 'agency_mobile',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Phone Number', 'houzez'),
                    'id' => $houzez_prefix . 'agency_phone',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Fax', 'houzez'),
                    'id' => $houzez_prefix . 'agency_fax',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_language",
                    'name' => esc_html__('Language', 'houzez'),
                    'desc' => esc_html__('ie: english, spanish, french ', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Licenses', 'houzez'),
                    'id' => $houzez_prefix . 'agency_licenses',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Tax Number', 'houzez'),
                    'id' => $houzez_prefix . 'agency_tax_no',
                    'type' => 'text',
                    'desc' => '',
                    'columns' => 6
                ),
                array(
                    'name' => esc_html__('Website Url', 'houzez'),
                    'id' => $houzez_prefix . 'agency_web',
                    'type' => 'text',
                    'desc' => esc_html__('Provide website url.', 'houzez'),
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_facebook",
                    'name' => "Facebook URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_twitter",
                    'name' => "Twitter URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_linkedin",
                    'name' => "LinkedIn URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_googleplus",
                    'name' => "Google Plus URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_youtube",
                    'name' => "Youtube URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_instagram",
                    'name' => "Instagram URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_pinterest",
                    'name' => "Pinterest URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_vimeo",
                    'name' => "Vimeo URL",
                    'type' => 'text',
                    'std' => "",
                    'columns' => 6
                ),
                array(
                    'id' => "{$houzez_prefix}agency_address",
                    'name' => esc_html__('Address', 'houzez'),
                    'type' => 'text',
                    'std' => "",
                    'columns' => 12
                ),
                array(
                    'id' => "{$houzez_prefix}agency_map_address",
                    'name' => esc_html__('Agency Location', 'houzez'),
                    'desc' => esc_html__('Leave it empty if you want to hide map on agency detail page.', 'houzez'),
                    'type' => 'text',
                    'std' => '',
                    'columns' => 12
                ),
                array(
                    'id' => "{$houzez_prefix}agency_location",
                    'name' => esc_html__('Agency Location at Google Map*', 'houzez'),
                    'desc' => esc_html__('Drag the google map marker to point your agency location. You can also use the address field above to search for your agency.', 'houzez'),
                    'type' => 'map',
                    'std' => '25.686540,-80.431345,15', // 'latitude,longitude[,zoom]' (zoom is optional)
                    'style' => 'width: 95%; height: 400px',
                    'address_field' => "{$houzez_prefix}agency_map_address",
                    'columns' => 12
                ),
            )
        );

        $meta_boxes = apply_filters('houzez_theme_meta', $meta_boxes);

        return $meta_boxes;
    }

} // End Meta boxes

add_action( 'init', 'wpse163434_init' );
function wpse163434_init() {
  remove_filter( 'houzez_theme_meta', 'houzez_theme_meta_rental_filter' );
}

if ( !function_exists( 'houzez_get_agent_info_bottom_v2' ) ) {
    function houzez_get_agent_info_bottom_v2( $args, $type, $is_single = true ) {

        ob_start();

        // get agent categories (language)
        $categories = get_the_terms( $args['agent_id'], 'agent_category' );
        $args['language'] = $categories[0]->slug;
        
        // return back if current agent language do not match with user language         
        if(defined('ICL_LANGUAGE_CODE') && $args['language'] != ICL_LANGUAGE_CODE) {
            return;
        }
        ?>
        <div class="agent-info-block">
            <div class="agent-thumb">
                <img src="<?php echo esc_url( $args[ 'picture' ] ); ?>" alt="<?php echo esc_attr( $args['agent_name'] ); ?>" width="80" height="80">
                <?php if ( $is_single == false ) { ?>
                <input type="checkbox" class="multiple-agent-check" name="target_email[]" value="<?php echo $args['agent_email']; ?>" >
                <?php } ?>
            </div>
            
            <ul class="agent-info">
                <li class="agent-name">
                    <?php if( !empty( $args['agent_name'] ) ) { ?>
                        <i class="fa fa-user"></i> <?php echo esc_attr( $args['agent_name'] ); ?>
                    <?php } ?>
                </li>
                <li class="agent-mobile">
                    <?php if( !empty( $args['agent_mobile'] ) ) { ?>
                        <i class="fa fa-mobile"></i> <?php echo esc_attr( $args['agent_mobile'] );?>
                    <?php } ?>
                </li>
                <li class="agent-phone">
                    <?php if( !empty( $args['agent_phone'] ) ) { ?>
                        <i class="fa fa-phone"></i> <?php echo esc_attr( $args['agent_phone'] );?>
                    <?php } ?>
                </li>
            </ul>
            <ul class="profile-social">
                <?php if( !empty( $args['facebook'] ) ) { ?>
                    <li><a class="btn-facebook" target="_blank" href="<?php echo esc_url( $args['facebook'] ); ?>"><i class="fa fa-facebook-square"></i></a></li>
                <?php } ?>

                <?php if( !empty( $args['twitter'] ) ) { ?>
                    <li><a class="btn-twitter" target="_blank" href="<?php echo esc_url( $args['twitter'] ); ?>"><i class="fa fa-twitter-square"></i></a></li>
                <?php } ?>

                <?php if( !empty( $args['linkedin'] ) ) { ?>
                    <li><a class="btn-linkedin" target="_blank" href="<?php echo esc_url( $args['linkedin'] ); ?>"><i class="fa fa-linkedin-square"></i></a></li>
                <?php } ?>

                <?php if( !empty( $args['googleplus'] ) ) { ?>
                    <li><a class="btn-google-plus" target="_blank" href="<?php echo esc_url( $args['googleplus'] ); ?>"><i class="fa fa-google-plus-square"></i></a></li>
                <?php } ?>

                <?php if( !empty( $args['youtube'] ) ) { ?>
                    <li><a class="btn-youtube" target="_blank" href="<?php echo esc_url( $args['youtube'] ); ?>"><i class="fa fa-youtube-square"></i></a></li>
                <?php } ?>
            </ul>
            <a class="view-link" href="<?php echo esc_url($args[ 'link' ]); ?>"><?php esc_html_e( 'View listings', 'houzez' ); ?></a>
        </div>
        <?php
        $data = ob_get_contents();
        ob_clean();

        return $data;

    }
}

if ( !function_exists( 'houzez_get_agent_info_bottom_new_v2' ) ) {
    function houzez_get_agent_info_bottom_new_v2( $args, $type, $is_single = true ) {

        ob_start();

        // get agent categories (language)
        $categories = get_the_terms( $args['agent_id'], 'agent_category' );

        if($categories) {
            $args['language'] = $categories[0]->slug;
        }
        
        // return back if current agent language do not match with user language         
        if(defined('ICL_LANGUAGE_CODE') && $args['language'] != ICL_LANGUAGE_CODE) {
            return;
        }
        ?>
         <div class="row">
            <div class="col-xxs-12">
                <!-- <img src="http://placekitten.com/130/130" alt="" class="agent-avatar img-circle"> -->
                 <img src="<?php echo esc_url( $args[ 'picture' ] ); ?>" class="agent-avatar img-circle" alt="<?php echo esc_attr( $args['agent_name'] ); ?>" width="80" height="80">
            </div>
            <div class="col-xxs-12">
                <p class="text-center">Hi, my name is <span class="txt-bold-p"> <?php echo esc_attr( $args['agent_name'] ); ?></span>. I speak your language, may I help you?</p>
                <?php if( !empty( $args['agent_mobile'] ) ) { ?>
                        <p class="txt-h-medium txt-lg text-center agent-phone"><?php echo esc_attr( $args['agent_mobile'] );?></p>
                <?php } ?>
                <?php // if( !empty( $args['agent_phone'] ) ) { ?>                        
                    <!-- <p class="txt-h-medium txt-lg text-center agent-phone"><?php echo esc_attr( $args['agent_phone'] );?></p> -->
                <?php // } ?>
            </div>
        </div>
        <?php
        $data = ob_get_contents();
        ob_clean();

        return $data;

    }
}


/*-----------------------------------------------------------------------------------*/
// Simple property filter
/*-----------------------------------------------------------------------------------*/
if( !function_exists('houzez_property_filter') ) {
    function houzez_property_filter( $property_query_args ) {
        global $paged;

        $page_id = get_the_ID();
        $what_to_show = get_post_meta( $page_id, 'fave_properties_sort', true );
        $fave_prop_no = get_post_meta( $page_id, 'fave_prop_no', true );
        $fave_listings_tabs = get_post_meta( $page_id, 'fave_listings_tabs', true );

        $tax_query = array();
        $meta_query = array();

        if ( is_front_page()  ) {
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        }
        

        if(!$fave_prop_no){
            $property_query_args[ 'posts_per_page' ]  = 9;
        } else if (!empty($_GET['per_page'])) {

            $property_query_args[ 'posts_per_page' ]  = $_GET['per_page'];
        }else {
            $property_query_args[ 'posts_per_page' ] = $fave_prop_no;
        }

        if (!empty($paged)) {
            $property_query_args['paged'] = $paged;
        } else {
            $property_query_args['paged'] = 1;
        }

        if($what_to_show == 'x_featured_first' || $what_to_show == 'x_rand_featured_first') { 
            $meta_query[] = array(
                'key' => 'fave_featured',
                'value' => '0',
                'compare' => '='
            );
        }

        if ( isset( $_GET['tab'] ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_status',
                'field' => 'slug',
                'terms' => $_GET['tab']
            );
        }

        $states = get_post_meta( $page_id, 'fave_states', false );
        if ( ! empty( $states ) && is_array( $states ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_state',
                'field' => 'slug',
                'terms' => $states
            );
        }

        $locations = get_post_meta( $page_id, 'fave_locations', false );
        if ( ! empty( $locations ) && is_array( $locations ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_city',
                'field' => 'slug',
                'terms' => $locations
            );
        }

        $types = get_post_meta( $page_id, 'fave_types', false );
        if ( ! empty( $types ) && is_array( $types ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_type',
                'field' => 'slug',
                'terms' => $types
            );
        }

        $labels = get_post_meta( $page_id, 'fave_labels', false );
        if ( ! empty( $labels ) && is_array( $labels ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_label',
                'field' => 'slug',
                'terms' => $labels
            );
        }

        $fave_areas = get_post_meta( $page_id, 'fave_area', false );
        if ( ! empty( $fave_areas ) && is_array( $fave_areas ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_area',
                'field' => 'slug',
                'terms' => $fave_areas
            );
        }

        $features = get_post_meta( $page_id, 'fave_features', false );
        if ( ! empty( $features ) && is_array( $features ) ) {
            $tax_query[] = array(
                'taxonomy' => 'property_feature',
                'field' => 'slug',
                'terms' => $features
            );
        }

        if( !isset( $_GET['tab'] ) ) {
            $status = get_post_meta($page_id, 'fave_status', false);
            if (!empty($status) && is_array($status)) {
                $tax_query[] = array(
                    'taxonomy' => 'property_status',
                    'field' => 'slug',
                    'terms' => $status
                );
            }
        }

        $min_price = get_post_meta( $page_id, 'fave_min_price', true );
        $max_price = get_post_meta( $page_id, 'fave_max_price', true );

        // min and max price logic
        if (!empty($min_price) && !empty($max_price)) {
            $min_price = doubleval(houzez_clean($min_price));
            $max_price = doubleval(houzez_clean($max_price));

            if ($min_price >= 0 && $max_price > $min_price) {
                $meta_query[] = array(
                    'key' => 'fave_property_price',
                    'value' => array($min_price, $max_price),
                    'type' => 'NUMERIC',
                    'compare' => 'BETWEEN',
                );
            }
        } else if (!empty($min_price)) {
            $min_price = doubleval(houzez_clean($min_price));
            if ($min_price >= 0) {
                $meta_query[] = array(
                    'key' => 'fave_property_price',
                    'value' => $min_price,
                    'type' => 'NUMERIC',
                    'compare' => '>=',
                );
            }
        } else if (!empty($max_price)) {
            $max_price = doubleval(houzez_clean($max_price));
            if ($max_price >= 0) {
                $meta_query[] = array(
                    'key' => 'fave_property_price',
                    'value' => $max_price,
                    'type' => 'NUMERIC',
                    'compare' => '<=',
                );
            }
        }

        $meta_count = count($meta_query);
        if( $meta_count > 1 ) {
            $meta_query['relation'] = 'AND';
        }
        if ($meta_count > 0) {
            $property_query_args['meta_query'] = $meta_query;
        }


        $tax_count = count( $tax_query );
        if( $tax_count > 1 ) {
            $tax_query['relation'] = 'AND';
        }
        if( $tax_count > 0 ) {
            $property_query_args['tax_query'] = $tax_query;
        }
        //print_r($property_query_args);
        return $property_query_args;
    }
}
add_filter('houzez_property_filter', 'houzez_property_filter');

// Add custom style in theme options
function add_header_style($sections){

// key should be numeric for this field
$sections[4]['fields'][38]['options']['7']  = 'TZ Header Style';
$sections[4]['fields'][41]['required']  = array('header_style', '!=', '7' );
$sections[4]['fields'][42]['required']  = array('header_style', '!=', '7' );
// 'required' => array('header_style', '!=', '7' ),

return $sections;
}
add_filter("redux/options/houzez_options/sections", 'add_header_style');


function add_gdpr_agreement($sections){

    $arr = array(
        "id" => "agent_forms_terms_gdpr_agreement",
        "type" => "textarea",
        "title" => "Basic information about data protection",
        "subtitle" => "Add title, excerpt and link",
        "default" => "",
        "section_id" => "property-page",
        "priority" => "304"
    );

    array_push($sections[30]["fields"], $arr); 

    return $sections;
}
// In this example OPT_NAME is the returned opt_name.
//add_filter("redux/options/OPT_NAME/sections", 'add_another_section_bl');
add_filter("redux/options/houzez_options/sections", 'add_gdpr_agreement');

function add_tz_map_option($sections){
   
    $new_desc = '<strong>Normal Page:</strong> Create page using "Advanced Search Result" template.<br/><strong>Half Map:</strong> Create page using "Property Listings Half Map" template.<br/><strong>TZ Map:</strong> Create page using "Property Listings TZ Map" template.';;

    $sections[65]["fields"][520]["description"] = $new_desc;
    $sections[65]["fields"][520]["options"]["TZ_Map"] = "TZ Map";
    return $sections;
}

add_filter("redux/options/houzez_options/sections", 'add_tz_map_option');

// Add active class to anchor tag in menu items
add_filter( 'nav_menu_link_attributes', function($atts) {

    $current_url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'];

    if ( $current_url ==  $atts['href']) {
        
        $atts['class'] = "active";
    } else {
        
        $atts['class'] = "waves-effect";
    }

    return $atts;
}, 100, 1 );


if( !function_exists('houzez_get_search_template_link') ) {
    function houzez_get_search_template_link() {

        $search_result_page = houzez_option('search_result_page');

        if( $search_result_page == 'half_map' ) {
            $template = 'template/property-listings-map.php';
        } elseif ($search_result_page == "TZ_Map") {
            $template = 'template/property-listings-map.php';
        } else {
            $template = 'template/template-search.php';
        }

        $args = array(
            'meta_key' => '_wp_page_template',
            'sort_order' => 'desc',
            'sort_column' => 'ID',
            'meta_value' => $template
        );
        $pages = get_pages($args);
        if( $pages ) {
            $add_link = get_permalink( $pages[0]->ID );
        } else {
            $add_link = home_url('/');
        }
        return $add_link;
    }
}

add_action( 'init', 'maintain_advance_search' );
function maintain_advance_search() {
  if (isset($_GET['maintain_advance_search'])) {
        
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        foreach ($_GET as $key => $value) {
            if ( !empty($value) ) {
                $_SESSION[$key] = $value;
            }
        }
        // die('here');
  }
}

function add_tz_property_detail_header($sections) {

    $sections[30]["fields"][285]["options"]["v5"] = "TZ Property top";
    return $sections;
}

add_filter("redux/options/houzez_options/sections", 'add_tz_property_detail_header');

function add_tz_property_detail_content($sections) {

    $sections[30]["fields"][287]["options"]["v5"] = "TZ Content layout";
    return $sections;
}

add_filter("redux/options/houzez_options/sections", 'add_tz_property_detail_content');


function my_scripts() {
    wp_enqueue_script('jquery-ui-datepicker');
    wp_deregister_script( 'jquery-ui-datepicker' );
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );


/**********Starts adding custom fields in features taxonomy************/

//add extra fields to category edit form hook
add_action ( 'services_edit_form_fields', 'extra_services_fields');
add_action ( 'services_add_form_fields', 'extra_services_fields');

//add extra fields to services edit form callback function
function extra_services_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
?>
<tr class="form-field">
<th scope="row" valign="top">
    <label for="ser_Icon"><?php _e('Icon'); ?></label></th>
<td>
<input type="text" name="Cat_meta[icon]" id="Cat_meta[icon]" size="3" style="width:60%;" value="<?php echo $cat_meta['icon'] ? $cat_meta['icon'] : ''; ?>"><br />
        <span class="description"><?php _e('Please set an icon.'); ?></span>
    </td>
</tr>

<?php
}

// save extra category extra fields hook
add_action ( 'edited_services', 'save_extra_services_fileds');
add_action ( 'created_services', 'save_extra_services_fileds');

// save extra services extra fields callback function
function save_extra_services_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}

//add extra fields to category edit form hook
add_action ( 'home_appliances_edit_form_fields', 'extra_home_appliances_fields');
add_action ( 'home_appliances_add_form_fields', 'extra_home_appliances_fields');

//add extra fields to home_appliances edit form callback function
function extra_home_appliances_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");
?>
<tr class="form-field">
<th scope="row" valign="top">
    <label for="ser_Icon"><?php _e('Icon'); ?></label></th>
<td>
<input type="text" name="Cat_meta[icon]" id="Cat_meta[icon]" size="3" style="width:60%;" value="<?php echo $cat_meta['icon'] ? $cat_meta['icon'] : ''; ?>"><br />
        <span class="description"><?php _e('Please set an icon.'); ?></span>
    </td>
</tr>

<?php
}

// save extra category extra fields hook
add_action ( 'edited_home_appliances', 'save_extra_home_appliances_fileds');
add_action ( 'created_home_appliances', 'save_extra_home_appliances_fileds');

// save extra home_appliances extra fields callback function
function save_extra_home_appliances_fileds( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['Cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['Cat_meta'][$key])){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}

/**********Ends adding custom fields in features taxonomy************/

/* Add metaboxes to beaches */

if ( !function_exists( 'houzez_beaches_add_meta_fields' ) ) :
    function houzez_beaches_add_meta_fields() {
        $houzez_meta = houzez_get_property_area_meta();
        $all_cities = houzez_get_all_cities();
        ?>

        <div class="form-field">
            <label><?php _e( 'Which city has this area?', 'houzez' ); ?></label>
            <select name="fave[parent_city]" class="widefat">
                <?php echo $all_cities; ?>
            </select>
            <p class="description"><?php _e( 'Select city which has this area.', 'houzez' ); ?></p>
        </div>



        <?php
    }
endif;

add_action( 'beaches_add_form_fields', 'houzez_beaches_add_meta_fields', 10, 2 );


/**
 *   ----------------------------------------------------------------------------------------------------------------------------------------------------
 *   2.0 - Edit meta field
 *   ----------------------------------------------------------------------------------------------------------------------------------------------------
 */

if ( !function_exists( 'houzez_beaches_edit_meta_fields' ) ) :
    function houzez_beaches_edit_meta_fields( $term ) {
        $houzez_meta = houzez_get_property_area_meta();

        if(is_object ($term)) {
            $term_id      =  $term->term_id;
            $term_meta    =  get_option( "_houzez_beaches_$term_id" );
            $parent_city  =  $term_meta['parent_city'] ? $term_meta['parent_city'] : '';
            $all_cities   =  houzez_get_all_cities($parent_city);

        } else {
            $all_cities   =  houzez_get_all_cities();
        }
        ?>

        <tr class="form-field">
            <th scope="row" valign="top"><label><?php _e( 'Which city has this area?', 'houzez' ); ?></label></th>
            <td>
                <select name="fave[parent_city]" class="widefat">
                    <?php echo $all_cities; ?>
                </select>
                <p class="description"><?php _e( 'Select city which has this area.', 'houzez' ); ?></p>
            </td>
        </tr>

        <?php
    }
endif;

add_action( 'beaches_edit_form_fields', 'houzez_beaches_edit_meta_fields', 10, 2 );


if ( !function_exists( 'houzez_save_beaches_meta_fields' ) ) :
    function houzez_save_beaches_meta_fields( $term_id ) {

        if ( isset( $_POST['fave'] ) ) {

            $houzez_meta = array();

            $houzez_meta['parent_city'] = isset( $_POST['fave']['parent_city'] ) ? $_POST['fave']['parent_city'] : '';

            update_option( '_houzez_beaches_'.$term_id, $houzez_meta );
        }

    }
endif;

add_action( 'edited_beaches', 'houzez_save_beaches_meta_fields', 10, 2 );
add_action( 'create_beaches', 'houzez_save_beaches_meta_fields', 10, 2 );


// filter for comments section to filter by property
function comments_filter_byproperty() {
    
    echo '<select name="property_id" id="filter-by-property-id">';
    echo '<option value="">' . __('All properties', 'houzezhouzez') . '</option>';
    $post_selected = (isset($_GET['property_id'])) ? $_GET['property_id'] : "";

    $args = array(
        'post_type'=> 'property',
        'post_status' => 'publish',
        'order'    => 'ASC',
        'posts_per_page' => -1 
    );              

    $the_query = new WP_Query( $args );
    if($the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $post_id = get_the_ID(); 
            $post_title = get_the_title(); 
            $comment_cnt = get_comments_number( $post_id );
            if($comment_cnt) {
                if ($post_id == $post_selected) {
                    echo '<option value="' . $post_id . '" selected="selected">' . $post_title . '</option>';
                } else {
                    echo '<option value="' . $post_id . '">' . $post_title . '</option>';
                }
            }
        } 
    }
    echo '</select>';
    
}

// we add our action to the 'restrict_manage_comments' hook so that our new select field get listet at the comments page
add_action('restrict_manage_comments', 'comments_filter_byproperty');
add_action( 'current_screen', 'wpse_72210_comments_exclude_lazy_hook', 10, 2 );
/**
 * Delay hooking our clauses filter to ensure it's only applied when needed.
 */
function wpse_72210_comments_exclude_lazy_hook( $screen ) {
    if ( $screen->id != 'edit-comments' )
        return;

    // Check if our Query Var is defined    
    if( isset( $_GET['property_id'] ) )
        add_action( 'pre_get_comments', 'wpse_63422_list_comments_from_specific_post', 10, 1 );
}

/**
 * Only display comments of specific post_id
 */ 
function wpse_63422_list_comments_from_specific_post( $clauses ) {
    $clauses->query_vars['post_id'] = $_GET['property_id'];
}

<?php
/**
* Created by PhpStorm.
* User: waqasriaz
* Date: 20/01/16
* Time: 6:31 PM
*/

global $status,
       $type,
       $state,
       $location,
       $area,
       $label,
       $searched_country,
       $search_template,
       $measurement_unit_adv_search,
       $adv_search_price_slider,
       $hide_advanced,
       $keyword_field_placeholder,
       $adv_show_hide,
       $houzez_local;

$search_template = houzez_get_search_template_link();
$measurement_unit_adv_search = houzez_option('measurement_unit_adv_search');

if( $measurement_unit_adv_search == 'sqft' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_sqft_text');
} elseif( $measurement_unit_adv_search == 'sq_meter' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_square_meter_text');
}

$adv_search_price_slider = houzez_option('adv_search_price_slider');
$adv_show_hide = houzez_option('adv_show_hide');
$hide_advanced = false;
$keyword_field = houzez_option('keyword_field');

if( $keyword_field == 'prop_title' ) {
    $keyword_field_placeholder = $houzez_local['keyword_text'];

} else if( $keyword_field == 'prop_city_state_county' ) {
    $keyword_field_placeholder = $houzez_local['city_state_area'];

} else if( $keyword_field == 'prop_address' ) {
    $keyword_field_placeholder = $houzez_local['search_address'];

} else {
    $keyword_field_placeholder = $houzez_local['enter_location'];
}

if( isset( $_GET['status'] ) ) {
    $status = $_GET['status'];
}
if( isset( $_GET['type'] ) ) {
    $type = $_GET['type'];
}
if( isset( $_GET['location'] ) ) {
    $location = $_GET['location'];
}
if( isset( $_GET['area'] ) ) {
    $area = $_GET['area'];
}
if( isset( $_GET['state'] ) ) {
    $state = $_GET['state'];
}
if( isset( $_GET['label'] ) ) {
    $label = $_GET['label'];
}
if( isset( $_GET['country'] ) ) {
    $searched_country = $_GET['country'];
}

if( $adv_show_hide['status']         != 0 &&
    $adv_show_hide['type']           != 0 &&
    $adv_show_hide['beds']           != 0 &&
    $adv_show_hide['baths']          != 0 &&
    $adv_show_hide['min_area']       != 0 &&
    $adv_show_hide['max_area']       != 0 &&
    $adv_show_hide['min_price']      != 0 &&
    $adv_show_hide['max_price']      != 0 &&
    $adv_show_hide['price_slider']   != 0 &&
    $adv_show_hide['area_slider']    != 0 &&
    $adv_show_hide['other_features'] != 0  ) {

    $hide_advanced = true;
}

$search_width = houzez_option('search_width');
$search_sticky = houzez_option('main-search-sticky');
$search_style = houzez_option('search_style');
$main_menu_sticky = houzez_option('main-menu-sticky');
$features_limit = houzez_option('features_limit');
$state_city_area_dropdowns = houzez_option('state_city_area_dropdowns');
if ($state_city_area_dropdowns != 0) {
$hide_empty = true;
} else {
$hide_empty = false;
}
if (isset($_GET['search_style']) && $_GET['search_style'] == 'v1') {
$search_style = 'style_1';
} else if (isset($_GET['search_style']) && $_GET['search_style'] == 'v2') {
$search_style = 'style_2';
} else if (isset($_GET['search_style']) && $_GET['search_style'] == 'min1') {
$search_style = 'style_1';
$hide_advanced = true;
} else if (isset($_GET['search_style']) && $_GET['search_style'] == 'min2') {
$search_style = 'style_2';
$hide_advanced = true;
}
if (!is_404() && !is_search()) {
$adv_search_enable = get_post_meta($post->ID, 'fave_adv_search_enable', true);
$adv_search = get_post_meta($post->ID, 'fave_adv_search', true);
}
$class = $sticky = '';
if ($main_menu_sticky != 1) {
if ((!empty($adv_search_enable) && $adv_search_enable != 'global')) {
if ($adv_search == 'hide_show') {
$sticky = '1';
$class = 'search-hidden';
} else {
$sticky = '0';
$class = '';
}
} else {
$sticky = $search_sticky;
}
} else {
$sticky = '0';
}
$radius_unit = houzez_option('radius_unit');
$enable_radius_search = houzez_option('enable_radius_search');
if ($adv_show_hide['cities'] != 1 && $adv_show_hide['areas'] != 1 && $hide_advanced == false) {
$col_1_classes = "col-md-6 col-sm-6";
$col_2_classes = "col-md-6 col-sm-6";
$adv_col_class = 'col-sm-3';
$location_select_class = 'location-select';
} elseif ($adv_show_hide['cities'] != 1 && $adv_show_hide['areas'] != 1 && $hide_advanced == true) {
$col_1_classes = "col-md-6 col-sm-6";
$col_2_classes = "col-md-6 col-sm-6";
$adv_col_class = 'col-sm-4';
$location_select_class = '';
} elseif ($adv_show_hide['cities'] != 0 && $adv_show_hide['areas'] != 0 && $hide_advanced == false) {
$col_1_classes = "col-md-8 col-sm-8";
$col_2_classes = "col-md-4 col-sm-4";
$adv_col_class = 'col-sm-6';
} elseif ($adv_show_hide['cities'] != 0 && $adv_show_hide['areas'] != 0 && $hide_advanced == true) {
$col_1_classes = "col-md-10 col-sm-10";
$col_2_classes = "col-md-2 col-sm-2";
$adv_col_class = 'col-sm-12';
} elseif (( $adv_show_hide['cities'] != 0 || $adv_show_hide['areas'] != 0 ) && $hide_advanced != false) {
$col_1_classes = "col-md-8 col-sm-8";
$col_2_classes = "col-md-4 col-sm-4";
$adv_col_class = 'col-sm-6';
} elseif (( $adv_show_hide['cities'] != 0 || $adv_show_hide['areas'] != 0 ) && $hide_advanced != true) {
$col_1_classes = "col-md-7 col-sm-7";
$col_2_classes = "col-md-5 col-sm-5";
$adv_col_class = 'col-sm-4';
}
$keyword_field = houzez_option('keyword_field');
if ($adv_show_hide['keyword'] != 1) {
$geo_location_field_classes = 'col-md-4 col-sm-5';
} else {
$geo_location_field_classes = 'col-md-8 col-sm-5';
}
$selected_radius = houzez_option('houzez_default_radius');
if (isset($_GET['radius'])) {
$selected_radius = $_GET['radius'];
}
$checked = true;
?>
<!--start advanced search section-->
<div class="advanced-search advance-search-header houzez-adv-price-range <?php echo esc_attr($class); ?>" data-sticky='<?php echo esc_attr($sticky); ?>'>
    <div class="<?php echo esc_attr($search_width); ?>">
        <div class="default_show half-part-left">
            <div class="half-area">
                <h3>For Rent</h3>
                <p>Some Text</p>
            </div>
            <div class="full-area" style="display: none;">
                <h3>For Rent <span>Some Text</span></h3>
                <form method="get" autocomplete="off" action="<?php echo esc_url($search_template); ?>">
                    <?php get_template_part('template-parts/advanced-search/half-map-non-ajax-2'); $search_style = 'test'; ?>
                </form>
                <div class="go_back right" id="go_right">
                    <i class="tz-arrow-left"></i> <span class="txt-xs txt-h-light">go back</span>
                </div>
            </div>
            
            
        </div>
        
    </div>
</div>
<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 11/06/16
 * Time: 11:08 PM
 */
global $measurement_unit_adv_search, $houzez_local;

if( $measurement_unit_adv_search == 'sqft' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_sqft_text');
} elseif( $measurement_unit_adv_search == 'sq_meter' ) {
    $measurement_unit_adv_search = houzez_option('measurement_unit_square_meter_text');
}

$adv_search_price_slider = houzez_option('adv_search_price_slider');
$status = $type = $location = $area = $searched_country = $state = $label = '';
$adv_show_hide = houzez_option('adv_show_hide_halmap');
$enable_disable_save_search = houzez_option('enable_disable_save_search');

$state_city_area_dropdowns = houzez_option('state_city_area_dropdowns');
if( $state_city_area_dropdowns != 0 ) {
    $hide_empty = true;
} else {
    $hide_empty = false;
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
$checked = true;
$radius_unit = houzez_option('radius_unit');
$enable_radius_search = houzez_option('enable_radius_search_halfmap');

if ($adv_show_hide['keyword'] != 1) {
    $geo_location_field_classes = 'col-md-6 col-sm-6 col-xs-6';
} else {
    $geo_location_field_classes = 'col-md-12 col-sm-12 col-xs-12';
}
?>

<!-- SEARCHING NAVBAR -->
<div class="navbar searching-navbar" id="sticky_navbar">
    <form autocomplete="off" method="get" class="save_search_form" action="#">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxs-12">
                        <?php
                            if (is_page('1672')) { ?>

                                <div class="mini-logo show">
                                    <a href="#!" class="sidenav-trigger" data-target="sidenav-menu">
                                        <img src="<?php echo bloginfo('template_url'); ?>/images/condensed-logo-menu.svg" alt="Menu" title="Menu"/>
                                    </a>
                                </div> 
                            
                            <?php  } else {  ?>
                                <div class="navbar-header listing_hide_logo mini-logo">
                                    <?php get_template_part('inc/header/logo'); ?>
                                </div>                                                          

                        <?php  }     ?>                        
                        
                        <div class="main-search-inputs flex-container">
                            <div class="input-field no-label action-filter">
                               <!--  <select required id="search_action">
                                    <option value="" disabled selected>What do you need?</option>
                                    <option value="rent_vacations">For Rent: Vacations</option>
                                    <option value="rent_living">For Rent: Living</option>
                                    <option value="for_sale">For Sale</option>
                                </select>
                                <label for="search_action">What do you need?</label> -->

                                <?php if( $adv_show_hide['status'] != 1 ) { ?>
                                    <!-- <div class="col-md-3 col-sm-6 col-xs-6"> -->
                                        <div class="form-group">
                                            <select class="selectpicker" name="status" data-live-search="false" data-live-search-style="begins">
                                                <?php
                                                // All Option
                                                echo '<option value="">What do you need?</option>';
                                                $prop_status = get_terms (
                                                    array(
                                                        "property_status"
                                                    ),
                                                    array(
                                                        'orderby' => 'name',
                                                        'order' => 'ASC',
                                                        'hide_empty' => false,
                                                        'parent' => 0
                                                    )
                                                );
                                                houzez_hirarchical_options('property_status', $prop_status, $status );
                                                ?>
                                            </select>
                                        </div>
                                    <!-- </div> -->
                                    <?php } ?>

                            </div>
                            <div class="input-field no-label multiple-select type-filter">
                                <!-- <select multiple id="search_type">
                                    <option value="" disabled selected>Type</option>
                                    <option value="villa">Villa</option>
                                    <option value="department">Department</option>
                                    <option value="business_premises">Business premises</option>
                                    <option value="land">Land</option>
                                </select>
                                <label for="search_type">Type</label> -->
                                <select multiple name="type">
                                    <option value="" disabled selected>Type</option>
                                    <?php
                                        // All Option
                                        echo '<option value="">Type</option>';

                                        $prop_type = get_terms (
                                            array(
                                                "property_type"
                                            ),
                                            array(
                                                'orderby' => 'name',
                                                'order' => 'ASC',
                                                'hide_empty' => false,
                                                'parent' => 0
                                            )
                                        );
                                        houzez_hirarchical_options('property_type', $prop_type, $type );
                                        ?>

                                </select>
                                <label for="search_type">Type</label>
                                <?php /* if( $adv_show_hide['type'] != 1 ) { ?>
                                    <!-- <div class="col-md-3 col-sm-6 col-xs-6"> -->
                                        <div class="form-group">
                                            <select class="selectpicker" name="type" data-live-search="false" data-live-search-style="begins">
                                                <?php
                                                // All Option
                                                echo '<option value="">Type</option>';

                                                $prop_type = get_terms (
                                                    array(
                                                        "property_type"
                                                    ),
                                                    array(
                                                        'orderby' => 'name',
                                                        'order' => 'ASC',
                                                        'hide_empty' => false,
                                                        'parent' => 0
                                                    )
                                                );
                                                houzez_hirarchical_options('property_type', $prop_type, $type );
                                                ?>
                                            </select>
                                        </div>
                                    <!-- </div> -->
                                <?php } */ ?>
                            </div>
                            <div class="form-group flex-container price-filter">
                                <!-- Price /labelAfterPrice -->
                                <span>Price /night <span class="txt-xs txt-op-60">(USD $)</span></span>                                     
                                <div class="input-field no-label">
                                    <input id="search_min_price" class="money-format" name="min-price" type="text" placeholder="Min.">
                                    <?php // houzez_adv_searches_min_price(); ?>
                                    <label for="search_min_price">Price Min.</label>
                                    
                                </div>
                                <div class="input-field no-label">
                                    <input id="search_max_price" class="money-format" name="max_price" type="text" placeholder="Max.">
                                    <?php //houzez_adv_searches_max_price(); ?>
                                    <label for="search_max_price">Price Max.</label>
                                </div>
                            </div>
                            <div>
                                <a href="#advanced-search-menu" role="button" class="bd-black waves-effect waves-color-1 collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="tz-filter-sm" title="Advanced filters"></i>
                                </a>
                                <a href="#!" role="button" id="half_map_update" class="bd-black waves-effect waves-color-1">
                                    <i class="tz-search-sm" title="Find"></i>
                                </a>

                                <?php
                                    if (is_page('1672')) { ?>

                                       <a href="#" role="button" id="toggle-map" class="toggle_map_right bd-black waves-effect waves-color-1 active">
                                            <i class="tz-map" title="Map"></i>
                                        </a> 
                                    
                                    <?php  } else {  ?>

                                <?php  }     ?>


                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxs-12">
                        <div id="advanced-search-menu" class="collapse"  aria-expanded="false">
                            <!-- Use class to show filters according to the action .for-rent-living-filters / .for-rent-vacations-filters / .for-sale-filters  -->
                            <div class="advanced-search-filters flex-container flex-wrap">
                                <div class="search-col one flex-container">
                                    <!-- Inner field for Type in mobile-->
                                    <div class="input-field no-label multiple-select inner-type-filter">
                                        <!-- <select multiple id="inner_search_type">
                                            <option value="" disabled selected>Type</option>
                                            <option value="villa">Villa</option>
                                            <option value="department">Department</option>
                                            <option value="business_premises">Business premises</option>
                                            <option value="land">Land</option>
                                        </select>
                                        <label for="inner_search_type">Type</label> -->
                                        <?php if( $adv_show_hide['type'] != 1 ) { ?>
                                            <!-- <div class="col-md-3 col-sm-6 col-xs-6"> -->
                                                <div class="form-group">
                                                    <select class="selectpicker" name="type" data-live-search="false" data-live-search-style="begins">
                                                        <?php
                                                        // All Option
                                                        echo '<option value="">Type</option>';

                                                        $prop_type = get_terms (
                                                            array(
                                                                "property_type"
                                                            ),
                                                            array(
                                                                'orderby' => 'name',
                                                                'order' => 'ASC',
                                                                'hide_empty' => false,
                                                                'parent' => 0
                                                            )
                                                        );
                                                        houzez_hirarchical_options('property_type', $prop_type, $type );
                                                        ?>
                                                    </select>
                                                </div>
                                            <!-- </div> -->
                                        <?php } ?>
                                    </div>
                                    <!-- Inner field for Price in mobile-->
                                    <div class="form-group flex-container inner-price-filter">
                                        <!-- Price /labelAfterPrice -->
                                        <span>Price /night <span class="txt-xs txt-op-60">(USD $)</span></span>                                     
                                        <div class="input-field no-label">
                                            <input id="search_min_price" class="money-format" name="min-price" type="text" placeholder="Min.">
                                            <label for="inner_search_min_price">Price Min.</label>
                                        </div>
                                        <div class="input-field no-label">
                                            <input id="search_max_price" class="money-format" name="max_price" type="text" placeholder="Max.">
                                            <label for="inner_search_max_price">Price Max.</label>
                                        </div>
                                    </div>
                                    <div class="input-field no-label guests-filter">
                                        <select id="search_guests">
                                            <option value="" disabled selected>Guests</option>
                                            <option value="any">Any</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <label for="search_guests">Guests</label>
                                    </div>
                                    <div class="input-field no-label rooms-filter">
                                        <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                            <option value="">Rooms</option>
                                            <?php houzez_number_list('bedrooms'); ?>
                                        </select>
                                        <!-- <select id="search_rooms">
                                            <option value="" disabled selected>Rooms</option>
                                            <option value="any">Any</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <label for="search_rooms">Rooms</label> -->
                                    </div>
                                    <div class="input-field no-label baths-filter">
                                        <select name="bathrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                            <option value="">Baths</option>
                                            <?php houzez_number_list('bathrooms'); ?>
                                        </select>
                                        <!-- <select id="search_baths">
                                            <option value="" disabled selected>Baths</option>
                                            <option value="any">Any</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                        <label for="search_baths">Baths</label> -->
                                    </div>
                                    <div class="form-group flex-container area-filter">
                                        <span>Area <span class="txt-xs txt-op-60">(m&#178)</span></span>
                                        <div class="input-field no-label">
                                            <!-- <input id="search_min_area" type="text" placeholder="Min."> -->

                                            <input type="text" class="form-control" value="<?php echo isset ( $_GET['min-area'] ) ? $_GET['min-area'] : ''; ?>" name="min-area" placeholder="Min.">

                                            <label for="search_min_area">Min. <span class="txt-xs txt-op-60">(m&#178)</span></label>
                                        </div>
                                        <div class="input-field no-label">
                                            <!-- <input id="search_max_area" type="text" placeholder="Max."> -->
                                            <input type="text" class="form-control" value="<?php echo isset ( $_GET['max-area'] ) ? $_GET['max-area'] : ''; ?>" name="max-area" placeholder="Max.">
                                            <label for="search_max_area">Max. <span class="txt-xs txt-op-60">(m&#178)</span></label>
                                        </div>
                                    </div>
                                    <div class="input-field no-label sea-distance-filter">
                                        <select id="search_sea_distance">
                                            <option value="" disabled selected>Distance to the sea</option>
                                            <option value="any">Any</option>
                                            <option value="1">- 100 m </option>
                                            <option value="2">- 300 m </option>
                                            <option value="3">- 500 m</option>
                                            <option value="4">- 1 km</option>
                                            <option value="4">1 - 5 km</option>
                                            <option value="4">+ 5 km</option>
                                        </select>
                                        <label for="search_sea_distance">Distance to the sea</label>
                                    </div>
                                    <div class="rules-filters">
                                        <p class="filter-title txt-h-medium txt-md">Rules</p>
                                        <ul>
                                            <li>
                                                <label for="rule1"><input type="checkbox" id="rule1" class="filled-in"><span>Pets allowed</span></label>
                                            </li>
                                            <li>
                                                <label for="rule2"><input type="checkbox" id="rule2" class="filled-in"><span>No security deposit</span></label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="search-col two">
                                    <div class="features-filters">                                   
                                        <div class="filter-title txt-h-medium txt-md">
                                            <div data-target="#collapse-feature-filters" role="button" data-toggle="collapse" aria-expanded="false">
                                                Features
                                                <span><i class="tz-chevron-down-sm"></i></span>
                                                <span><i class="tz-chevron-up-sm"></i></span>
                                            </div>
                                        </div>
                                        <ul id="collapse-feature-filters" class="collapse in">
                                            <?php get_template_part('template-parts/advanced-search/search-features'); ?>
                                           <!--  <li>
                                                <label for="feature1"><input type="checkbox" id="feature1" class="filled-in"><span>Feature 1</span></label>
                                            </li>
                                            <li>
                                                <label for="feature2"><input type="checkbox" id="feature2" class="filled-in"><span>Feature 2 larga</span></label>
                                            </li>
                                            <li>
                                                <label for="feature3"><input type="checkbox" id="feature3" class="filled-in"><span>Feature 3</span></label>
                                            </li>
                                            <li>
                                                <label for="feature4"><input type="checkbox" id="feature4" class="filled-in"><span>Feature 4 long...</span></label>
                                            </li>
                                            <li>
                                                <label for="feature5"><input type="checkbox" id="feature5" class="filled-in"><span>Feature 5</span></label>
                                            </li>
                                            <li>
                                                <label for="feature6"><input type="checkbox" id="feature6" class="filled-in"><span>Feature 6 long long long feature</span></label>
                                            </li>
                                            <li>
                                                <label for="feature7"><input type="checkbox" id="feature7" class="filled-in"><span>Feature 7</span></label>
                                            </li>
                                            <li>
                                                <label for="feature8"><input type="checkbox" id="feature8" class="filled-in"><span>Feature 8</span></label>
                                            </li>
                                            <li>
                                                <label for="feature9"><input type="checkbox" id="feature9" class="filled-in"><span>Feature 9</span></label>
                                            </li>
                                            <li>
                                                <label for="feature10"><input type="checkbox" id="feature10" class="filled-in"><span>Feature 10</span></label>
                                            </li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="search-col three">
                                    <div class="status-filters">
                                        <div class="filter-title txt-h-medium txt-md">
                                            <div data-target="#collapse-status-filters" role="button" data-toggle="collapse" aria-expanded="false">
                                                Status
                                                <span><i class="tz-chevron-down-sm"></i></span>
                                                <span><i class="tz-chevron-up-sm"></i></span>
                                            </div>
                                        </div>
                                        <ul id="collapse-status-filters" class="collapse in">
                                            <li>
                                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="New"><span>New</span></label>
                                            </li>
                                            <li>
                                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="Newly Remodeled"><span>Newly Remodeled</span></label>
                                            </li>
                                            <li>
                                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="Renovated"><span>Renovated</span></label>
                                            </li>
                                            <li>
                                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="Used"><span>Used</span></label>
                                            </li>
                                            <li>
                                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="Under Construction"><span>Under Construction</span></label>
                                            </li>
                                            <li>
                                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="Project"><span>Project</span></label>
                                            </li>                                            
                                            <?php /*
                                            $terms = get_terms( array(
                                                'taxonomy' => 'property_status',
                                                'hide_empty' => false,
                                            ) );    
                                            if(count($terms)) {
                                                foreach ($terms as $key => $value) { ?>
                                                    <li>
                                                        <label for="status1">
                                                            <input type="checkbox" name="status[]"  id="status<?php echo $key; ?>" class="filled-in"  value="<?php echo esc_attr( $value->slug ); ?>">
                                                            <span><?php echo $value->name; ?> </span>
                                                        </label>
                                                    </li>
                                                <?php }
                                            } */
                                            ?>  
                                        </ul>
                                    </div>
                                    <div  class="furniture-filters">
                                        <div class="filter-title txt-h-medium txt-md">
                                            <div data-target="#collapse-furniture-filters" role="button" data-toggle="collapse" aria-expanded="false">
                                                Furniture
                                                <span><i class="tz-chevron-down-sm"></i></span>
                                                <span><i class="tz-chevron-up-sm"></i></span>
                                            </div>
                                        </div>
                                        <ul id="collapse-furniture-filters" class="collapse in">
                                            <li>
                                                <label for="furnished"><input type="checkbox" id="furnished" class="filled-in"><span>Furnished</span></label>
                                            </li>
                                            <li>
                                                <label for="unfurnished"><input type="checkbox" id="unfurnished" class="filled-in"><span>Unfurnished</span></label>
                                            </li>
                                            <li>
                                                <label for="semifurnished"><input type="checkbox" id="semifurnished" class="filled-in"><span>Semi Furnished</span></label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="search-col four">
                                    <div class="sevices-filters">                                    
                                        <div class="filter-title txt-h-medium txt-md">
                                            <div data-target="#collapse-services-filters" role="button" data-toggle="collapse" aria-expanded="false">
                                                Services
                                                <span><i class="tz-chevron-down-sm"></i></span>
                                                <span><i class="tz-chevron-up-sm"></i></span>
                                            </div>
                                        </div>
                                        <ul id="collapse-services-filters" class="collapse in">
                                             <?php
                                            $terms = get_terms( array(
                                                'taxonomy' => 'services',
                                                'hide_empty' => false,
                                            ) );    
                                            if(count($terms)) {
                                                foreach ($terms as $key => $value) { ?>
                                                    <li>
                                                        <label for="status1">
                                                            <input type="checkbox" name="service[]"  id="service<?php echo $key; ?>" class="filled-in"  value="<?php echo esc_attr( $value->slug ); ?>">
                                                            <span><?php echo $value->name; ?> </span>
                                                        </label>
                                                    </li>
                                                <?php }
                                            }
                                            ?> 
                                        </ul>
                                    </div>
                                </div>
                                <div class="search-col five">
                                    <div class="home-appliaces-filters">                                     
                                        <div class="filter-title txt-h-medium txt-md">
                                            <div data-target="#collapse-homeAppliances-filters" role="button" data-toggle="collapse" aria-expanded="false">
                                                Featured Home Appliances
                                                <span><i class="tz-chevron-down-sm"></i></span>
                                                <span><i class="tz-chevron-up-sm"></i></span>
                                            </div>
                                        </div>
                                        <?php if( $adv_show_hide['status'] != 1 ) { ?>
                                    <!-- <div class="col-md-3 col-sm-6 col-xs-6"> -->
                                        <div class="form-group">
                                            <ul name="home_appliances">
                                                <?php

                                                $prop_features = get_terms(
                                                    array(
                                                        "home_appliances"
                                                    ),
                                                    array(
                                                        'orderby' => 'name',
                                                        'order' => 'ASC',
                                                        'hide_empty' => false,
                                                        //'parent' => 0
                                                    )
                                                );
                                                
                                                $checked_feature = '';
                                                $features_count = 0;
                                                $count = 0;
                                                if (!empty($prop_features)) {
                                                    // print_r($prop_features);
                                                    foreach ($prop_features as $feature):
                                                        // if( $features_limit != -1 ) {
                                                        //     if ( $count == $features_limit ) break;
                                                        // }
                                                        echo '<li><label>';
                                                        echo '<input name="feature[]" class="filled-in" type="checkbox" '.checked( $checked_feature, $feature->slug, false ).' value="' . esc_attr( $feature->slug ) . '">';
                                                        echo '<span>' . esc_attr( $feature->name ). '</span>';
                                                        echo '</label></li>';
                                                        $count++;
                                                    endforeach;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    <!-- </div> -->
                                    <?php } ?>

                                        <!-- <ul id="collapse-homeAppliances-filters" class="collapse in">
                                            <li>
                                                <label for="appliance1"><input type="checkbox" id="electrodomesticos1" class="filled-in"><span>Appliance 1</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance2"><input type="checkbox" id="electrodomesticos2" class="filled-in"><span>Appliance 2</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance3"><input type="checkbox" id="electrodomesticos3" class="filled-in"><span>Appliance 3</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance4"><input type="checkbox" id="electrodomesticos4" class="filled-in"><span>Appliance 4</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance5"><input type="checkbox" id="electrodomesticos5" class="filled-in"><span>Appliance 5</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance6"><input type="checkbox" id="electrodomesticos6" class="filled-in"><span>Appliance 6</span></label>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                                <div class="search-col six">
                                    <div class="flex-container txt-h-medium txt-md">
                                        <a href="#!" role="button" class="bd-color-1 waves-effect waves-color-1">
                                            <i class="tz-search-sm"></i> Find 
                                        </a>
                                    </div>  
                                </div>
                                <input type="hidden" name="search_args" value="">
                                <input type="hidden" name="search_URI" value="<?php echo $_SERVER['REQUEST_URI'] ?>">
                                <input type="hidden" name="action" value='houzez_save_search'>
                                <input type="hidden" name="houzez_save_search_ajax" value="<?php echo wp_create_nonce('houzez-save-search-nounce')?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>  


    <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("sticky_navbar");
        var sticky = header.offsetTop;
        console.log(window.pageYOffset , sticky);
        function myFunction() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky_sec");
          } else {
            header.classList.remove("sticky_sec");
          }           
    
        }

        setTimeout(function () {
            var header2 = document.getElementById("houzez-gmap-main");
            header2.className += " stick_map";
        },3000);

        



    </script>
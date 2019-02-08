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
$status = $guest = $type = $location = $area = $searched_country = $state = $label = '';
$adv_show_hide = houzez_option('adv_show_hide_halmap');
$enable_disable_save_search = houzez_option('enable_disable_save_search');

$state_city_area_dropdowns = houzez_option('state_city_area_dropdowns');
if( $state_city_area_dropdowns != 0 ) {
    $hide_empty = true;
} else {
    $hide_empty = false;
}

if( isset($_SESSION['status']) && !empty($_SESSION['status']) ) {
    $status = $_SESSION['status'];
} else if( isset( $_GET['status'] ) ) {
    $status = $_GET['status'];
} else {
    $status = 'for-sale';
}

if( isset($_SESSION['guest']) && !empty($_SESSION['guest']) ) {
    $guest = $_SESSION['guest'];
} else if( isset( $_GET['guest'] ) ) {
    $guest = $_GET['guest'];
}

if( isset($_SESSION['search_sea_distance']) && !empty($_SESSION['search_sea_distance']) ) {
    $search_sea_distance = $_SESSION['search_sea_distance'];
} else if( isset( $_GET['search_sea_distance'] ) ) {
    $search_sea_distance = $_GET['search_sea_distance'];
}

if( isset($_SESSION['rules']) && !empty($_SESSION['rules']) ) {
    $rules = $_SESSION['rules'];
} else if( isset( $_GET['rules'] ) ) {
    $rules = $_GET['rules'];
}

if( isset($_SESSION['feature']) && !empty($_SESSION['feature']) ) {
    $appliances = $_SESSION['feature'];
} else if( isset( $_GET['feature'] ) ) {
    $appliances = $_GET['feature'];
}

if( isset($_SESSION['type']) && !empty($_SESSION['type']) ) {
    $type = $_SESSION['type'];
} else if( isset( $_GET['type'] ) ) {
    $type = $_GET['type'];
}

if( isset($_SESSION['location']) && !empty($_SESSION['location']) ) {
    $location = $_SESSION['location'];
} else if( isset( $_GET['location'] ) ) {
    $location = $_GET['location'];
}

if( isset($_SESSION['area']) && !empty($_SESSION['area']) ) {
    $area = $_SESSION['area'];
} else if( isset( $_GET['area'] ) ) {
    $area = $_GET['area'];
}

if( isset($_SESSION['state']) && !empty($_SESSION['state']) ) {
    $state = $_SESSION['state'];
} else if( isset( $_GET['state'] ) ) {
    $state = $_GET['state'];
}

if( isset($_SESSION['label']) && !empty($_SESSION['label']) ) {
    $label = $_SESSION['label'];
} else if( isset( $_GET['label'] ) ) {
    $label = $_GET['label'];
}

if( isset($_SESSION['country']) && !empty($_SESSION['country']) ) {
    $searched_country = $_SESSION['country'];
} else if( isset( $_GET['country'] ) ) {
    $searched_country = $_GET['country'];
}

$propStatus = array();
if( isset($_SESSION['prop-status']) && !empty($_SESSION['prop-status']) ) {
    $propStatus = $_SESSION['prop-status'];
} else if( isset( $_GET['prop-status'] ) ) {
    $propStatus = $_GET['prop-status'];
}

$furniture = array();
if( isset($_SESSION['furniture']) && !empty($_SESSION['furniture']) ) {
    $furniture = $_SESSION['furniture'];
} else if( isset( $_GET['furniture'] ) ) {
    $furniture = $_GET['furniture'];
}

$services = array();
if( isset($_SESSION['service']) && !empty($_SESSION['service']) ) {
    $services = $_SESSION['service'];
} else if( isset( $_GET['service'] ) ) {
    $services = $_GET['service'];
}

// $appliances = array();
// if( isset($_SESSION['appliance']) && !empty($_SESSION['appliance']) ) {
//     $appliances = $_SESSION['appliance'];
// } else if( isset( $_GET['appliance'] ) ) {
//     $appliances = $_GET['appliance'];
// }

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
                                <select required name="status" class="status-left disabled-status" disabled="disabled">
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
                                    // houzez_hirarchical_options('property_status', $prop_status, $status );

                                    // foreach ($prop_status as $term) {
                                    //     $selected = urldecode($term->slug) == 'for-sale' ? 'selected="selected"' : '';
                                        
                                    //     $selected = urldecode($term->slug) == $_SESSION['status'] ? 'selected="selected"' : '';

                                    //     echo '<option value="' . urldecode($term->slug) . '" '.$selected.'>' . $prefix . $term->name . '</option>';
                                    // }
                                        houzez_hirarchical_options('property_status', $prop_status, $status );


                                    ?>
                                </select>
                                <label for="search_action">What do you need?</label>

                                <?php /*if( $adv_show_hide['status'] != 1 ) { ?>
                                    <!-- <div class="col-md-3 col-sm-6 col-xs-6"> -->
                                        
                                        <div class="form-group">
                                            <select class="selectpicker status-left disabled-status" name="status" data-live-search="false" data-live-search-style="begins" disabled="">
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
                                                // houzez_hirarchical_options('property_status', $prop_status, $status );

                                                foreach ($prop_status as $term) {
                                                    $selected = urldecode($term->slug) == 'for-sale' ? 'selected="selected"' : '';
                                                    echo '<option value="' . urldecode($term->slug) . '" '.$selected.'>' . $prefix . $term->name . '</option>';
                                                }


                                                ?>
                                            </select>
                                        </div>
                                    <!-- </div> -->
                                    <?php } */?>

                            </div>
                            <div class="input-field no-label multiple-select type-filter">
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
                                        // houzez_hirarchical_options('property_type', $prop_type, $type );


                                        foreach ($prop_type as $term) {

                                            if ( in_array($term->slug, $type) ) {
                                                echo '<option value="' . urldecode($term->slug) . '" selected="selected">' . $prefix . $term->name . '</option>';
                                            } else {
                                                echo '<option value="' . urldecode($term->slug) . '">' . $prefix . $term->name .'</option>';
                                            }
                                        }                                        
                                        ?>

                                </select>
                                <label for="search_type">Type</label>
                            </div>
                            <div class="form-group flex-container price-filter">
                                <!-- Price /labelAfterPrice -->
                                <span>Price <span class="txt-xs txt-op-60">(USD $)</span></span>                                     
                                <div class="input-field no-label">
                                    <input class="money-format" name="min-price" type="text" placeholder="Min.">
                                    <?php // houzez_adv_searches_min_price(); ?>
                                    <label for="search_min_price">Price Min.</label>
                                    
                                </div>
                                <div class="input-field no-label">
                                    <input class="money-format" name="max-price" type="text" placeholder="Max.">
                                    <?php //houzez_adv_searches_max_price(); ?>
                                    <label for="search_max_price">Price Max.</label>
                                </div>
                            </div>
                            <div>
                                <a href="#advanced-search-menu" role="button" id="formSale" class="bd-black waves-effect waves-color-1 collapsed" data-toggle="collapse" aria-expanded="false">
                                    <i class="tz-filter-sm" title="Advanced filters"></i>
                                </a>
                                <!-- <a href="#!" role="button" id="half_map_update" class="bd-black waves-effect waves-color-1">
                                    <i class="tz-search-sm" title="Find"></i>
                                </a> -->

                                <button type="submit" role="button" class="bd-black waves-effect waves-color-1">
                                    <i class="tz-search-sm" title="Find"></i>
                                </button>

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

                                        <?php /*if( $adv_show_hide['type'] != 1 ) { ?>
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
                                    <input type="hidden" name="maintain_advance_search" value="get">
                                    <!-- Inner field for Price in mobile-->
                                    <div class="form-group flex-container inner-price-filter">
                                        <!-- Price /labelAfterPrice -->
                                        <span>Price /night <span class="txt-xs txt-op-60">(USD $)</span></span>                                     
                                        <div class="input-field no-label">
                                            <input class="money-format" name="min-price" type="text" placeholder="Min.">
                                            <label for="inner_search_min_price">Price Min.</label>
                                        </div>
                                        <div class="input-field no-label">
                                            <input class="money-format" name="max-price" type="text" placeholder="Max.">
                                            <label for="inner_search_max_price">Price Max.</label>
                                        </div>
                                    </div>
                                    <div class="input-field no-label guests-filter">
                                        <select name="guest">
                                            <option value="" disabled selected>Guests</option>
                                            <option value="any">Any</option>
                                            <?php for ($i=1; $i <= 10; $i++) { 
                                                ?>
                                            <option value="<?=$i?>" <?php if($i == $guest ) { echo 'selected'; } ?> ><?=$i?></option>
                                                
                                            <?php } ?>
                                        </select>
                                        <label for="search_guests">Guests</label>
                                    </div>
                                    <div class="input-field no-label rooms-filter">
                                        <select name="bedrooms" class="selectpicker" data-live-search="false" data-live-search-style="begins" title="">
                                            <option value="">Rooms</option>
                                            <?php houzez_number_list('bedrooms'); ?>
                                        </select>
                                        <!-- <select>
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
                                        <!-- <select>
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
                                            <!-- <input type="text" placeholder="Min."> -->

                                            <input type="text" class="form-control" value="<?php echo isset ( $_GET['min-area'] ) ? $_GET['min-area'] : ''; ?>" name="min-area" placeholder="Min.">

                                            <label for="search_min_area">Min. <span class="txt-xs txt-op-60">(m&#178)</span></label>
                                        </div>
                                        <div class="input-field no-label">
                                            <!-- <input type="text" placeholder="Max."> -->
                                            <input type="text" class="form-control" value="<?php echo isset ( $_GET['max-area'] ) ? $_GET['max-area'] : ''; ?>" name="max-area" placeholder="Max.">
                                            <label for="search_max_area">Max. <span class="txt-xs txt-op-60">(m&#178)</span></label>
                                        </div>
                                    </div>
                                    <div class="input-field no-label sea-distance-filter">
                                        <select name="search_sea_distance">
                                            <option value="" disabled>Distance to the sea</option>
                                            <option value="any" <?php if($sea_
                                             == 'any' ) { echo 'selected'; } ?>>Any</option>
                                            <option value="100" <?php if($sea_
                                             == '100' ) { echo 'selected'; } ?>>- 100 m </option>
                                            <option value="300" <?php if($sea_
                                             == '300' ) { echo 'selected'; } ?>>- 300 m </option>
                                            <option value="500" <?php if($sea_
                                             == '500' ) { echo 'selected'; } ?>>- 500 m</option>
                                            <option value="1000" <?php if($sea_
                                             == '1000' ) { echo 'selected'; } ?>>- 1 km</option>
                                            <option value="5000" <?php if($sea_
                                             == '5000' ) { echo 'selected'; } ?>>1 - 5 km</option>
                                            <option value="5000" <?php if($sea_
                                             == '5000' ) { echo 'selected'; } ?>>+ 5 km</option>
                                        </select>
                                        <label for="search_sea_distance">Distance to the sea</label>
                                    </div>
                                    <div class="rules-filters">
                                        <p class="filter-title txt-h-medium txt-md">Rules</p>
                                        <ul>
                                            <li>
                                                <label ><input type="checkbox" name="rules[]" class="filled-in" value="pets"
                                                    <?php foreach ($rules as $rule) {
                                                        if($rule == 'pets') echo 'checked="checked"';
                                                    } ?>
                                                    ><span>Pets allowed</span></label>
                                            </li>
                                            <li>
                                                <label ><input type="checkbox" name="rules[]" class="filled-in " value="no_security"
                                                    <?php foreach ($rules as $rule) {
                                                        if($rule == 'no_security') 'checked="checked"';
                                                    } ?>
                                                    ><span>No security deposit</span></label>
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
                                                <label for="feature1"><input type="checkbox" class="filled-in"><span>Feature 1</span></label>
                                            </li>
                                            <li>
                                                <label for="feature2"><input type="checkbox" class="filled-in"><span>Feature 2 larga</span></label>
                                            </li>
                                            <li>
                                                <label for="feature3"><input type="checkbox" class="filled-in"><span>Feature 3</span></label>
                                            </li>
                                            <li>
                                                <label for="feature4"><input type="checkbox" class="filled-in"><span>Feature 4 long...</span></label>
                                            </li>
                                            <li>
                                                <label for="feature5"><input type="checkbox" class="filled-in"><span>Feature 5</span></label>
                                            </li>
                                            <li>
                                                <label for="feature6"><input type="checkbox" class="filled-in"><span>Feature 6 long long long feature</span></label>
                                            </li>
                                            <li>
                                                <label for="feature7"><input type="checkbox" class="filled-in"><span>Feature 7</span></label>
                                            </li>
                                            <li>
                                                <label for="feature8"><input type="checkbox" class="filled-in"><span>Feature 8</span></label>
                                            </li>
                                            <li>
                                                <label for="feature9"><input type="checkbox" class="filled-in"><span>Feature 9</span></label>
                                            </li>
                                            <li>
                                                <label for="feature10"><input type="checkbox" class="filled-in"><span>Feature 10</span></label>
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
                                            <?php

                                                $prop_status = get_terms(
                                                    array(
                                                        "property_label"
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
                                                if (!empty($prop_status)) {
                                                    // print_r($prop_status);
                                                    foreach ($prop_status as $status):
                                                        // if( $features_limit != -1 ) {
                                                        //     if ( $count == $features_limit ) break;
                                                        // }
                                                        $checked = in_array($status->slug,$propStatus) ? ' checked="checked"' : '';
                                                        //echo '<input type="checkbox" name="Filter[]" value="Steak" id="Filter"'.$checked.'/>';
                                                        echo '<li><label>';
                                                        echo '<input name="prop-status[]" class="filled-in" type="checkbox" '.$checked.' value="' . esc_attr( $status->slug ) . '">';
                                                        echo '<span>' . esc_attr( $status->name ). '</span>';
                                                        echo '</label></li>';
                                                        $count++;
                                                    endforeach;
                                                }
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
                                                <label><input type="checkbox" name="furniture[]" value="furnished" <?php if ( in_array('furnished', $furniture) ) { echo "checked"; } ?>  class="filled-in"><span>Furnished</span></label>
                                            </li>
                                            <li>
                                                <label><input type="checkbox" name="furniture[]" value="unfurnished" <?php if ( in_array('unfurnished', $furniture) ) { echo "checked"; } ?>  class="filled-in"><span>Unfurnished</span></label>
                                            </li>
                                            <li>
                                                <label><input type="checkbox" name="furniture[]" value="semifurnished" <?php if ( in_array('semifurnished', $furniture) ) { echo "checked"; } ?>  class="filled-in"><span>Semi Furnished</span></label>
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
                                                foreach ($terms as $key => $value) { 
                                                    $checked = in_array($value->slug,$services) ? ' checked="checked"' : '';
                                                    ?>
                                                    <li>
                                                        <label for="status1">
                                                            <input type="checkbox" name="service[]"  id="service<?php echo $key; ?>" class="filled-in"  value="<?php echo esc_attr( $value->slug ); ?>" <?php echo $checked; ?>>
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
                                        <div class="form-group appliances-filters">
                                            <ul name="home_appliances">
                                                <?php

                                                $home_appliances = get_terms(
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
                                                if (!empty($home_appliances)) {
                                                    // print_r($home_appliances);
                                                    foreach ($home_appliances as $feature):
                                                        // if( $features_limit != -1 ) {
                                                        //     if ( $count == $features_limit ) break;
                                                        // }
                                                        $checked = in_array($feature->slug,$appliances) ? ' checked="checked"' : '';
                                                        //echo '<input type="checkbox" name="Filter[]" value="Steak" id="Filter"'.$checked.'/>';
                                                        echo '<li><label>';
                                                        echo '<input name="feature[]" class="filled-in" type="checkbox" '.$checked.' value="' . esc_attr( $feature->slug ) . '">';
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
                                                <label for="appliance1"><input type="checkbox" class="filled-in"><span>Appliance 1</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance2"><input type="checkbox" class="filled-in"><span>Appliance 2</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance3"><input type="checkbox" class="filled-in"><span>Appliance 3</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance4"><input type="checkbox" class="filled-in"><span>Appliance 4</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance5"><input type="checkbox" class="filled-in"><span>Appliance 5</span></label>
                                            </li>
                                            <li>
                                                <label for="appliance6"><input type="checkbox" class="filled-in"><span>Appliance 6</span></label>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>  


    <script>
/*        window.onscroll = function() {myFunction()};

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
*/
    </script>
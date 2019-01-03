<?php 

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

$appliances = array();
if( isset($_SESSION['appliance']) && !empty($_SESSION['appliance']) ) {
    $appliances = $_SESSION['appliance'];
} else if( isset( $_GET['appliance'] ) ) {
    $appliances = $_GET['appliance'];
}

 ?>

<!-- SEARCHING NAVBAR fixed with .stycky-navbar class-->
<div class="navbar searching-navbar" id="sticky_navbar">
	<form method="get" autocomplete="off" action="<?php echo esc_url(houzez_get_search_template_link()); ?>">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xxs-12">
					<div class="navbar-header listing_hide_logo mini-logo">
                        <?php get_template_part('inc/header/logo'); ?>
                    </div> 
					<div class="main-search-inputs flex-container">
						<div class="input-field no-label action-filter">
							<select required name="status" class="status-left disabled-status">
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
	              houzez_hirarchical_options('property_status', $prop_status, $status ); ?>
	          </select>
	          <label for="search_action">What do you need?</label>
						</div>
						<div class="input-field no-label multiple-select type-filter">
            <select multiple name="type[]">
                <option value="" disabled selected>Type</option>
                <?php
                    // All Option
                    // echo '<option value="">Type</option>';

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
            <a href="#advanced-search-menu" role="button" id="formSale" class="bd-black waves-effect waves-color-1 collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="tz-filter-sm" title="Advanced filters"></i>
            </a>
            <!-- <a href="#!" role="button" id="half_map_update" class="bd-black waves-effect waves-color-1">
                <i class="tz-search-sm" title="Find"></i>
            </a> -->

            <button type="submit" role="button" class="bd-black waves-effect waves-color-1">
                <i class="tz-search-sm" title="Find"></i>
            </button>
							<!-- <a href="#" role="button" id="toggle-map" class="bd-black waves-effect waves-color-1 active">
								<i class="tz-map" title="Map"></i>
							</a> -->
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
                    <!-- Inner field for Price in mobile-->
                    <div class="form-group flex-container inner-price-filter">
                        <!-- Price /labelAfterPrice -->
                        <span>Price /night <span class="txt-xs txt-op-60">(USD $)</span></span>                                     
                        <div class="input-field no-label">
                            <input class="money-format" name="min-price" type="text" placeholder="Min.">
                            <label for="inner_search_min_price">Price Min.</label>
                        </div>
                        <div class="input-field no-label">
                            <input class="money-format" name="max_price" type="text" placeholder="Max.">
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
                        <select name="bedrooms">
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
                        <select name="bathrooms">
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
                        <select>
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
                                <label for="rule1"><input type="checkbox" class="filled-in"><span>Pets allowed</span></label>
                            </li>
                            <li>
                                <label for="rule2"><input type="checkbox" class="filled-in"><span>No security deposit</span></label>
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
                            <li>
                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="new" <?php if ( in_array('new', $propStatus) ) { echo "checked"; } ?> >
                                    <span>New</span></label>
                            </li>
                            <li>
                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="newlyremodeled" <?php if ( in_array('newlyremodeled', $propStatus) ) { echo "checked"; } ?> ><span>Newly Remodeled</span></label>
                            </li>
                            <li>
                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="renovated" <?php if ( in_array('renovated', $propStatus) ) { echo "checked"; } ?> ><span>Renovated</span></label>
                            </li>
                            <li>
                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="used" <?php if ( in_array('used', $propStatus) ) { echo "checked"; } ?> ><span>Used</span></label>
                            </li>
                            <li>
                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="underconstruction" <?php if ( in_array('underconstruction', $propStatus) ) { echo "checked"; } ?> ><span>Under Construction</span></label>
                            </li>
                            <li>
                                <label><input class="filled-in" name="prop-status[]" type="checkbox" value="project" <?php if ( in_array('project', $propStatus) ) { echo "checked"; } ?> ><span>Project</span></label>
                            </li>
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
                                foreach ($terms as $key => $value) { ?>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="service[]"  id="service<?php echo $key; ?>" class="filled-in"  value="<?php echo esc_attr( $value->slug ); ?>" <?php if ( in_array($value->slug, $services) ) { echo "checked"; } ?> >
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
                                        echo '<li><label>'; ?>
                                        <input name="appliance[]" class="filled-in" type="checkbox" <?php if ( in_array(esc_attr( $feature->slug ), $appliances) ) { echo "checked"; } ?>  value="<?= esc_attr( $feature->slug )?>">
                                        <?php 
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
	</form>
</div>


<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("sticky_navbar");
    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky_sec");
      } else {
        header.classList.remove("sticky_sec");
      }
    }
</script>
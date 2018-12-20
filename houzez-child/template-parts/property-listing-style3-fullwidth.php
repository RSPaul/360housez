<?php
/**
 * Template Name: Property Listing Template (Style 3) Fullwidth new
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 05/04/17
 * Time: 3:03 PM
 */
get_header();
global $post, $listings_tabs, $fave_featured_listing, $current_page_template, $listings_tab_1, $listings_tab_2;
$listing_view = get_post_meta( $post->ID, 'fave_default_view', true );
$listings_tabs = get_post_meta( $post->ID, 'fave_listings_tabs', true );
$listings_tab_1 = get_post_meta( $post->ID, 'fave_listings_tab_1', true );
$listings_tab_2 = get_post_meta( $post->ID, 'fave_listings_tab_2', true );
$fave_featured_listing = get_post_meta( $post->ID, 'fave_featured_listing', true );
$fave_featured_prop_no = get_post_meta( $post->ID, 'fave_featured_prop_no', true );
$fave_prop_no = get_post_meta( $post->ID, 'fave_prop_no', true );
$sticky_sidebar = houzez_option('sticky_sidebar');
$what_to_show = get_post_meta( $post->ID, 'fave_properties_sort', true );

$listing_page_link = get_the_permalink( $post->ID );

if( isset($_GET['prop_featured']) && $_GET['prop_featured'] == 'no' ) {
    $fave_featured_listing = 'disable';
}
if( isset($_GET['tabs']) && $_GET['tabs'] == 'no' ) {
    $listings_tabs = 'disable';
}
$current_page_template = get_post_meta( $post->ID, '_wp_page_template', true );
?>

<!-- <?php //get_template_part('template-parts/properties-head'); ?> -->
	
	<div class="navbar searching-navbar" id="sticky_navbar">
		<form>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xxs-12">
						<div class="navbar-header listing_hide_logo mini-logo">
							<?php get_template_part('inc/header/logo'); ?>
						<!-- 	<span class="site-description txt-sm"> | <?php echo get_bloginfo();?></span> -->
						</div>
						<div class="main-search-inputs flex-container">
							<div class="input-field no-label action-filter">
								<select required id="search_action">
									<option value="" disabled selected>What do you need?</option>
									<option value="rent_vacations">For Rent: Vacations</option>
									<option value="rent_living">For Rent: Living</option>
									<option value="for_sale">For Sale</option>
								</select>
								<label for="search_action">What do you need?</label>
							</div>
							<div class="input-field no-label multiple-select type-filter">
								<select multiple id="search_type">
									<option value="" disabled selected>Type</option>
									<option value="villa">Villa</option>
									<option value="department">Department</option>
									<option value="business_premises">Business premises</option>
									<option value="land">Land</option>
								</select>
								<label for="search_type">Type</label>
							</div>
							<div class="form-group flex-container price-filter">
								<!-- Price /labelAfterPrice -->
								<span>Price /night <span class="txt-xs txt-op-60">(USD $)</span></span>										
								<div class="input-field no-label">
									<input id="search_min_price" class="money-format" type="text" placeholder="Min.">
									<label for="search_min_price">Price Min.</label>
								</div>
								<div class="input-field no-label">
									<input id="search_max_price" class="money-format" type="text" placeholder="Max.">
									<label for="search_max_price">Price Max.</label>
								</div>
							</div>
							<div>
								<a href="#advanced-search-menu" role="button" class="bd-black waves-effect waves-color-1 collapsed" data-toggle="collapse" aria-expanded="false">
									<i class="tz-filter-sm" title="Advanced filters"></i>
								</a>
								<a href="#!" role="button" class="bd-black waves-effect waves-color-1">
									<i class="tz-search-sm" title="Find"></i>
								</a>
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
										<select multiple id="inner_search_type">
											<option value="" disabled selected>Type</option>
											<option value="villa">Villa</option>
											<option value="department">Department</option>
											<option value="business_premises">Business premises</option>
											<option value="land">Land</option>
										</select>
										<label for="inner_search_type">Type</label>
									</div>
									<!-- Inner field for Price in mobile-->
									<div class="form-group flex-container inner-price-filter">
										<!-- Price /labelAfterPrice -->
										<span>Price /night <span class="txt-xs txt-op-60">(USD $)</span></span>										
										<div class="input-field no-label">
											<input id="inner_search_min_price" class="money-format" type="text" placeholder="Min.">
											<label for="inner_search_min_price">Price Min.</label>
										</div>
										<div class="input-field no-label">
											<input id="inner_search_max_price" class="money-format" type="text" placeholder="Max.">
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
										<select id="search_rooms">
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
										<label for="search_rooms">Rooms</label>
									</div>
									<div class="input-field no-label baths-filter">
										<select id="search_baths">
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
										<label for="search_baths">Baths</label>
									</div>
									<div class="form-group flex-container area-filter">
										<span>Area <span class="txt-xs txt-op-60">(m&#178)</span></span>
										<div class="input-field no-label">
											<input id="search_min_area" type="text" placeholder="Min.">
											<label for="search_min_area">Min. <span class="txt-xs txt-op-60">(m&#178)</span></label>
										</div>
										<div class="input-field no-label">
											<input id="search_max_area" type="text" placeholder="Max.">
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
											<li>
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
											</li>
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
												<label for="status1"><input type="checkbox" id="status1" class="filled-in"><span>Estatus 1</span></label>
											</li>
											<li>
												<label for="status2"><input type="checkbox" id="status2" class="filled-in"><span>Estatus 2</span></label>
											</li>
											<li>
												<label for="status3"><input type="checkbox" id="status3" class="filled-in"><span>Estatus 3</span></label>
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
											<li>
												<label for="service1"><input type="checkbox" id="service1" class="filled-in"><span>Service 1</span></label>
											</li>
											<li>
												<label for="service2"><input type="checkbox" id="service2" class="filled-in"><span>Service 2</span></label>
											</li>
											<li>
												<label for="service3"><input type="checkbox" id="service3" class="filled-in"><span>Service 3</span></label>
											</li>
											<li>
												<label for="service4"><input type="checkbox" id="service4" class="filled-in"><span>Service 4</span></label>
											</li>
											<li>
												<label for="service5"><input type="checkbox" id="service5" class="filled-in"><span>Service 5</span></label>
											</li>
											<li>
												<label for="service6"><input type="checkbox" id="service6" class="filled-in"><span>Service 6</span></label>
											</li>
											<li>
												<label for="service7"><input type="checkbox" id="service7" class="filled-in"><span>Service 7</span></label>
											</li>
											<li>
												<label for="service"><input type="checkbox" id="service8" class="filled-in"><span>Service 8</span></label>
											</li>
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
										<ul id="collapse-homeAppliances-filters" class="collapse in">
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
										</ul>
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
		</form>
	</div> 

	<div class="property_listing">
		<div class="container-fluid">
		    <div class="row">
		        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 list-grid-area">
		            <div id="content-area">

		                <!--start list tabs-->
		                <?php get_template_part( 'template-parts/listing', 'tabs' ); ?>
		                <!--end list tabs-->

		                <!--start featured property items-->
		                <?php
		                if($what_to_show == 'x_featured_first' || $what_to_show == 'x_rand_featured_first') { 
		                    global $wp_query, $paged;
		                    if ( is_front_page()  ) {
		                        $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		                    }

		                    if( $fave_featured_listing != 'disable' ) {
		                        $number_of_featured_prop = $fave_featured_prop_no;
		                        if (!$number_of_featured_prop) {
		                            $number_of_featured_prop = '4';
		                        }

		                        $prop_featured_args = array(
		                            'post_type' => 'property',
		                            'posts_per_page' => $number_of_featured_prop,
		                            'paged' => $paged,
		                            'post_status' => 'publish'
		                        );

		                        $prop_featured_args = apply_filters( 'houzez_featured_property_filter', $prop_featured_args );

		                        $prop_featured_args = houzez_prop_sort($prop_featured_args);
		                        
		                        $wp_query = new WP_Query($prop_featured_args);

		                        if ($wp_query->have_posts()) : ?>
		                            <div class="property-listing grid-view grid-view-3-col">
		                                <div class="row">

		                                    <?php
		                                    while ($wp_query->have_posts()) : $wp_query->the_post();

		                                        get_template_part('template-parts/property-for-listing-v3');

		                                    endwhile;
		                                    ?>

		                                </div>
		                            </div>
		                            <hr>
		                            <?php
		                        endif;
		                        wp_reset_query();
		                    }
		                }
		                ?>
		                <!--end featured property items-->


		        <? /*        
            <!--start property items-->
            <div class="flex-container flex-wrap">
              <!--Property Card Featured with .featured-property class-->
							<div class="property-card featured-property">
								<div class="property-card-wrapper flex-container">
									<div class="property-card-header">
										<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
											<li class="label1">Label 1</li>
											<li class="label2">Label 2</li>
											<li class="label3">Label 3</li>
											<li class="label4">Label 4</li>
											<li class="label5">Label 5</li>
										</ul>
										<!-- Use class .saved when user save a property and change tooltip text-->
										<a href="#!" role="button" class="card-save no-style" title="Save" data-toggle="tooltip" data-placement="left">
											<i class="tz-treasure-full waves-effect waves-circle"></i>
										</a>
										<!-- Link to Property Detail Page-->
										<a href="#!" class="go-detail waves-effect waves-light">
											<img src="<?php bloginfo('template_url'); ?>/images/arch_img.jpg" alt="" title="">
										</a>
									</div>
									<div class="property-card-body">
										<p class="card-title txt-h-medium h4">
											<a href="#!">Title</a>
										</p>
										<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
											Type | <span class="txt-h-light">Status</span>
										</p>
										<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">0</span> <span class="text-uppercase">Rooms</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">0</span> <span class="text-uppercase">Baths</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">0</span> <span class="text-uppercase">Guests</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">0 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
											</li>
										</ul>
										<p class="card-price txt-h-light txt-txt">
											Before-price-label <span class="txt-h-medium">000,000</span> CURRENCY / after-price-label
											<!-- Use this icon with tooltip when the property has been marked (in backend) as an opportunity -->
											<i class="tz-arrow-down" title="The price has dropped" data-toggle="tooltip" data-placement="right"></i>									
										</p>
									</div>
									<div class="property-card-footer">
										<div class="flex-container">
											<ul class="card-reviews list-inline">
												<li>
													<div>
														<i class="tz-ratting-empty-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
													</div>
												</li>
												<li>
													<span class="txt-h-light txt-xs">no reviews</span>
												</li>
											</ul>
											<a href="#!" class="card-compare no-style" role="button" title="Compare" data-toggle="tooltip" data-placement="left">
												<i class="tz-compare waves-effect waves-circle"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!--ends Property Card-->
						</div>

		                <!-- <div class="property-listing grid-view grid-view-3-col">
		                    <div class="row">

		                        <?php
		                        global $wp_query, $paged;
		                        if(!$fave_prop_no){
		                            $posts_per_page  = 9;
		                        } else {
		                            $posts_per_page = $fave_prop_no;
		                        }
		                        $latest_listing_args = array(
		                            'post_type' => 'property',
		                            'posts_per_page' => $posts_per_page,
		                            'paged' => $paged,
		                            'post_status' => 'publish'
		                        );

		                        $latest_listing_args = apply_filters( 'houzez_property_filter', $latest_listing_args );

		                        $latest_listing_args = houzez_prop_sort ( $latest_listing_args );
		                        $wp_query = new WP_Query( $latest_listing_args );

		                        if ( $wp_query->have_posts() ) :
		                            while ( $wp_query->have_posts() ) : $wp_query->the_post();

		                                get_template_part('template-parts/property-for-listing-v3');

		                            endwhile;
		                        else:
		                            get_template_part('template-parts/property', 'none');
		                        endif;
		                        ?>

		                    </div>
		                </div> -->
		                <!--end property items-->
		                 */ ?>
		                 
		                <div class="flex-container flex-wrap">

		                        <?php
		                        global $wp_query, $paged;
		                        if(!$fave_prop_no){
		                            $posts_per_page  = 9;
		                        } else {
		                            $posts_per_page = $fave_prop_no;
		                        }
		                        $latest_listing_args = array(
		                            'post_type' => 'property',
		                            'posts_per_page' => $posts_per_page,
		                            'paged' => $paged,
		                            'post_status' => 'publish'
		                        );

		                        $latest_listing_args = apply_filters( 'houzez_property_filter', $latest_listing_args );

		                        $latest_listing_args = houzez_prop_sort ( $latest_listing_args );
		                        $wp_query = new WP_Query( $latest_listing_args );

		                        if ( $wp_query->have_posts() ) :
		                            while ( $wp_query->have_posts() ) : $wp_query->the_post();

		                                get_template_part('template-parts/property-listing-v3-new');

		                            endwhile;
		                        else:
		                            get_template_part('template-parts/property', 'none');
		                        endif;
		                        ?>

		                    </div>
		                </div>

		                <hr>

		                <div class="row">
		                	<div class="pagination-results flex-container flex-wrap col-xxs-12">
			                	<div class="show-per-page">
									<select>
										<option value="" disabled selected>Show</option>
										<option value="12">12</option>
										<option value="25">25</option>
										<option value="50">50</option>
									</select>
								</div>
			                	<div class="listing_pagination_style">
					                <!--start Pagination-->
					                <?php houzez_pagination( $wp_query->max_num_pages, $range = 2 ); wp_reset_query(); ?>
					                <!--start Pagination-->
					            </div>
		            		</div>
		            	</div>


		            </div>
		        </div><!-- end container-content -->

		    </div>
		</div>
	</div>

	<!-- WIDGETS AREA --> 
	<div class="row">
		<div class="property-listing-widget-area col-xxs-12">
			<div class="property-listing-widgets flex-container">
				<div class="property-listing-widget-1">
					<!-- Widget 1 -->
				</div>
				<div class="property-listing-widget-2">
					<!-- Widget 2 -->
				</div>
				<div class="property-listing-widget-3">
					<!-- Widget 3 -->
				</div>					    
			</div>					
		</div>
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

<?php get_footer(); ?>
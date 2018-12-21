<?php
/**
 * Template Name: Search Result Template
 */
get_header(); ?>

<style type="text/css">
	.navbar.main-navbar{
		display: none;
	}
	.navbar.searching-navbar {
	    position: fixed;
	    width: 100%;
	    top: 0;
	    z-index: 999;
	}
	.map-active {
	    margin-top: 80px;
	}
	.map-search-result .map-wrap{
		margin-top: 10px;
	}
	#footer-section{
		display: none;
	}

</style>

<!-- SEARCHING NAVBAR -->
	<div class="navbar searching-navbar">
		<form>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xxs-12">
						<!-- Class .show to make .mini-logo always visible in this template -->
						<div class="mini-logo show">
							<!--SIDENAV link--><!-- Condensed logo/menu image -->
							<a href="#!" class="sidenav-trigger" data-target="sidenav-menu">
								<img src="<?php bloginfo('template_url'); ?>/images/condensed-logo-menu.svg" alt="Menu" title="Menu"/>
							</a>
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
								<a href="#" role="button" id="toggle-map" class="toggle_map_right bd-black waves-effect waves-color-1 active">
									<i class="tz-map" title="Map"></i>
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
	
	<!-- MAIN CONTENT OF PAGE -->
	<main class="map-active">
		<div class="container-fluid">
			<div class="row">
				<div class="listing-search-result col-xxs-12 col-sm-6 col-lg-7">
					<div class="row">
						<div class="save-search sort-results flex-container col-xxs-12">
							<div>
								<span class="txt-sm">28 Results</span>
								<a href="#!" class="bd-black waves-effect waves-color-1 txt-sm" role="button">Save</a>
							</div>
							<div>
								<select>
									<option value="" disabled selected>Sort</option>
									<option value="featured">Featured first</option>
									<option value="price_low">Price (low to high)</option>
									<option value="price_high">Price (high to low)</option>
									<option value="date_new">Date (new to old)</option>
									<option value="date_old">Date (old to new)</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="listing-container flex-container flex-wrap col-xxs-12">
							
							<!--Property Card Featured with .featured-property class-->
							<div class="property-card featured-property">
								<div class="property-card-wrapper flex-container">
									<div class="property-card-header">
										<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
											<li class="label1">Exclusive</li>
											<li class="label2">Negotiable</li>
										</ul>
										<!-- Use class .saved when user save a property and change tooltip text-->
										<a href="#!" role="button" class="card-save no-style saved" title="Saved" data-toggle="tooltip" data-placement="left">
											<i class="tz-treasure-full waves-effect waves-circle"></i>
										</a>
										<a href="#!" class="go-detail waves-effect waves-light">
											<img src="<?php bloginfo('template_url'); ?>/images/arch_img.jpg" alt="" title="">
										</a>
									</div>
									<div class="property-card-body">
										<p class="card-title txt-h-medium h4">
											<a href="#!">Beautiful house in the mountains</a>
										</p>
										<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
											House | <span class="txt-h-light">Newly renovated</span>
										</p>
										<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">3</span> <span class="text-uppercase">Rooms</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">2</span> <span class="text-uppercase">Baths</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">6</span> <span class="text-uppercase">Guests</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">350 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
											</li>
										</ul>
										<p class="card-price txt-h-light txt-txt">
											From <span class="txt-h-medium">200</span> USD / night
											<!-- Use this icon with tooltip when the property has been marked (in backend) as an opportunity -->
											<i class="tz-arrow-down" title="The price has dropped" data-toggle="tooltip" data-placement="right"></i>									
										</p>
									</div>
									<div class="property-card-footer">
										<div class="flex-container">
											<ul class="card-reviews list-inline">
												<li>
													<div>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-half-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
													</div>
												</li>
												<li>
													<span class="txt-h-light txt-xs">15 reviews</span>
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
							<!--Property Card Featured with .featured-property class-->
							<div class="property-card featured-property">
								<div class="property-card-wrapper flex-container">
									<div class="property-card-header">
										<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
											<li class="label1">Exclusive</li>
											<li class="label2">Negotiable</li>
										</ul>
										<a href="#!" role="button" class="card-save no-style" title="Save" data-toggle="tooltip" data-placement="left">
											<i class="tz-treasure-full waves-effect waves-circle"></i>
										</a>
										<a href="#!" class="go-detail waves-effect waves-light">
											<img src="<?php bloginfo('template_url'); ?>/images/arch_img.jpg" alt="" title="">
										</a>
									</div>
									<div class="property-card-body">
										<p class="card-title txt-h-medium h4">
											<a href="#!">Beautiful house in the mountains</a>
										</p>
										<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
											House | <span class="txt-h-light">Newly renovated</span>
										</p>
										<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">3</span> <span class="text-uppercase">Rooms</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">2</span> <span class="text-uppercase">Baths</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">6</span> <span class="text-uppercase">Guests</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">350 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
											</li>
										</ul>
										<p class="card-price txt-h-light txt-txt">
											From <span class="txt-h-medium">200</span> USD / night								
										</p>
									</div>
									<div class="property-card-footer">
										<div class="flex-container">
											<ul class="card-reviews list-inline">
												<li>
													<div>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-half-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
													</div>
												</li>
												<li>
													<span class="txt-h-light txt-xs">15 reviews</span>
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
							<!--Property Card-->
							<div class="property-card">
								<div class="property-card-wrapper flex-container">
									<div class="property-card-header">
										<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
											<li class="label1">Exclusive</li>
											<li class="label2">Negotiable</li>
										</ul>
										<a href="#!" role="button" class="card-save no-style" title="Save" data-toggle="tooltip" data-placement="left">
											<i class="tz-treasure-full waves-effect waves-circle"></i>
										</a>
										<a href="#!" class="go-detail waves-effect waves-light">
											<img src="<?php bloginfo('template_url'); ?>/images/arch_img.jpg" alt="" title="">
										</a>
									</div>
									<div class="property-card-body">
										<p class="card-title txt-h-medium h4">
											<a href="#!">Beautiful house in the mountains</a>
										</p>
										<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
											House | <span class="txt-h-light">Newly renovated</span>
										</p>
										<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">3</span> <span class="text-uppercase">Rooms</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">2</span> <span class="text-uppercase">Baths</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">6</span> <span class="text-uppercase">Guests</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">350 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
											</li>
										</ul>
										<p class="card-price txt-h-light txt-txt">
											From <span class="txt-h-medium">200</span> USD / night									
										</p>
									</div>
									<div class="property-card-footer">
										<div class="flex-container">
											<ul class="card-reviews list-inline">
												<li>
													<div>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-half-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
													</div>
												</li>
												<li>
													<span class="txt-h-light txt-xs">15 reviews</span>
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
							<!--Property Card-->
							<div class="property-card">
								<div class="property-card-wrapper flex-container">
									<div class="property-card-header">
										<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
											<li class="label1">Exclusive</li>
											<li class="label2">Negotiable</li>
										</ul>
										<a href="#!" role="button" class="card-save no-style" title="Save" data-toggle="tooltip" data-placement="left">
											<i class="tz-treasure-full waves-effect waves-circle"></i>
										</a>
										<a href="#!" class="go-detail waves-effect waves-light">
											<img src="<?php bloginfo('template_url'); ?>/images/arch_img.jpg" alt="" title="">
										</a>
									</div>
									<div class="property-card-body">
										<p class="card-title txt-h-medium h4">
											<a href="#!">Beautiful house in the mountains</a>
										</p>
										<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
											House | <span class="txt-h-light">Newly renovated</span>
										</p>
										<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">3</span> <span class="text-uppercase">Rooms</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">2</span> <span class="text-uppercase">Baths</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">6</span> <span class="text-uppercase">Guests</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">350 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
											</li>
										</ul>
										<p class="card-price txt-h-light txt-txt">
											From <span class="txt-h-medium">200</span> USD / night									
										</p>
									</div>
									<div class="property-card-footer">
										<div class="flex-container">
											<ul class="card-reviews list-inline">
												<li>
													<div>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-half-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
													</div>
												</li>
												<li>
													<span class="txt-h-light txt-xs">15 reviews</span>
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
							<!--Property Card-->
							<div class="property-card">
								<div class="property-card-wrapper flex-container">
									<div class="property-card-header">
										<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
											<li class="label1">Exclusive</li>
											<li class="label2">Negotiable</li>
										</ul>
										<a href="#!" role="button" class="card-save no-style" title="Save" data-toggle="tooltip" data-placement="left">
											<i class="tz-treasure-full waves-effect waves-circle"></i>
										</a>
										<a href="#!" class="go-detail waves-effect waves-light">
											<img src="<?php bloginfo('template_url'); ?>/images/arch_img.jpg" alt="" title="">
										</a>									
									</div>
									<div class="property-card-body">
										<p class="card-title txt-h-medium h4">
											<a href="#!">Beautiful house in the mountains</a>
										</p>
										<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
											House | <span class="txt-h-light">Newly renovated</span>
										</p>
										<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">3</span> <span class="text-uppercase">Rooms</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">2</span> <span class="text-uppercase">Baths</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">6</span> <span class="text-uppercase">Guests</span>
											</li>
											<li class="flex-item">
												<span class="txt-h-medium txt-txt">350 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
											</li>
										</ul>
										<p class="card-price txt-h-light txt-txt">
											From <span class="txt-h-medium">200</span> USD / night								
										</p>
									</div>
									<div class="property-card-footer">
										<div class="flex-container">
											<ul class="card-reviews list-inline">
												<li>
													<div>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-full-sm"></i>
														<i class="tz-ratting-half-sm"></i>
														<i class="tz-ratting-empty-sm"></i>
													</div>
												</li>
												<li>
													<span class="txt-h-light txt-xs">15 reviews</span>
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
					</div>
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
							<ul class="pagination">
								<li><a href="#!" class="disabled" title="Previous"><i class="tz-chevron-left"></i></a></li>
								<li class="active"><a href="#!">1</a></li>
								<li><a href="#!" class="waves-effect">2</a></li>
								<li><a href="#!" class="waves-effect">3</a></li>
								<li><a href="#!" class="waves-effect">4</a></li>
								<li><a href="#!" class="waves-effect">5</a></li>
								<li><a href="#!" class="waves-effect">...</a></li>
								<li><a href="#!" class="waves-effect" title="Next"><i class="tz-chevron-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!--WIDGETS AREA--> 
					<div class="row">
						<div class="search-result-widget-area col-xxs-12">
							<div class="search-result-widgets flex-container">
								<div class="search-result-widget-1">
									<!--Widget 1-->
								</div>
								<div class="search-result-widget-2">
									<!--Widget 2-->
								</div>
								<div class="search-result-widget-3">
									<!--Widget 3-->
								</div>					    
							</div>					
						</div>
					</div>
				</div>
				<div class="map-search-result show-map col-xs-12 col-sm-6 col-lg-5">
					<div class="map-wrap">							
						<iframe id="gMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.591552726884!2d-69.47671746779709!3d-50.744671020778185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xbdb82576698cee31%3A0xe213934c1d810259!2shotel+restaurant!5e1!3m2!1ses!2scl!4v1542984329814" width="100px" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</main>


<?php get_footer(); ?>
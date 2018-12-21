<?php
/**
 * Template Name: Property Detail Template
 */
//get_header('new'); 
//if(is_page(10)) {
 get_header();
//}
//else {
 //get_header('new');
//}
// wp_head();
?>

	

	<!-- MAIN CONTENT OF THE PAGE-->
	<main> 
		<!--INFORMATION-->
		<section class="property-detail-information">
			<div class="container">
				<!-- .row-ref-->
				<div class="row row-ref">
					<div class="col-xs-6">
						<!--Property ID-->
						<p class="txt-h-light txt-md text-uppercase">REF. 123-45</p>
					</div>
					<div class="col-xs-6">
						<!--Save as Favorite-->
						<p class="txt-md text-right">Save <a class="no-style" role="button"><i class="tz-treasure-line waves-effect waves-circle"></i></a></p>
					</div>
				</div>
				<!-- .row-price-->
				<div class="row row-price">
					<div class="col-xs-12">
						<p class="txt-h-light txt-lg">From <span class="txt-h-medium">150,00</span> USD / night</p>
						<div class="input-field">
							<ul class="list-inline">
								<li>
									<label class="txt-h-light txt-info">Show price</label>
								</li>
								<li>
									<select class="txt-xs">
										<option value="" disabled>Select</option>
										<option value="rent_vacations" selected>For Rent: Vacations</option>
										<option value="rent_living">For Rent: Living</option>
										<option value="for_sale">For Sale</option>
									</select>
								</li>	
							</ul>
						</div>
					</div>
				</div>
				<!-- .row-main-features-->
				<div class="row row-main-features">
					<div class="col-xs-12">
						<ul class="last-child-no-border flex-container flex-wrap text-center">
							<li class="flex-item">
								<span class="txt-h-medium txt-lg">0</span> <span class="text-uppercase">Guests</span>
							</li>
							<li class="flex-item">
								<span class="txt-h-medium txt-lg">0</span> <span class="text-uppercase">Beds</span>
							</li>
							<li class="flex-item">
								<span class="txt-h-medium txt-lg">0</span> <span class="text-uppercase">Rooms</span>
							</li>
							<li class="flex-item">
								<span class="txt-h-medium txt-lg">0</span> <span class="text-uppercase">Baths</span>
							</li>
							<li class="flex-item">
								<span class="txt-h-medium txt-lg">0</span> <span class="text-uppercase">Toilets</span>
							</li>
							<li class="flex-item">
								<span class="txt-h-medium txt-lg">0 <span class="txt-h-light txt-sm">m&#178</span></span> <span class="text-uppercase">Area</span>
							</li>
						</ul>
					</div>
				</div>
				<!-- .row-user-interactions-->
				<div class="row row-user-interactions">
					<div class="col-sm-6">
						<ul class="list-inline">
							<li>
								<div>
									<i class="tz-ratting-full"></i>
									<i class="tz-ratting-full"></i>
									<i class="tz-ratting-full"></i>
									<i class="tz-ratting-full"></i>
									<i class="tz-ratting-empty"></i>
								</div>
							</li>
							<li>
								<span class="txt-p-light">98 reviews</span>  
								<a href="#property-reviews" class="txt-h-light txt-info"><span class="waves-effect">See reviews</span></a>
							</li>
						</ul>
					</div>
					<div class="col-sm-6">
						<ul class="list-inline">
							<li class="share-social">	
								<ul>
									<li><a href="#!" class="no-style" role="button"><i class="tz-whatsapp waves-effect waves-circle"></i></a></li>
									<li><a href="#!" class="no-style" role="button"><i class="tz-facebook waves-effect waves-circle"></i></a></li>
									<li><a href="#!" class="no-style" role="button"><i class="tz-twitter waves-effect waves-circle"></i></a></li>
									<li><a href="#!" class="no-style" role="button"><i class="tz-googleplus waves-effect waves-circle"></i></a></li>
									<li><a href="#!" class="no-style" role="button"><i class="tz-linkedin waves-effect waves-circle"></i></a></li>
									<li><a href="#!" class="no-style" role="button"><i class="tz-pinterest waves-effect waves-circle"></i></a></li>
									<li><a href="#!" class="no-style" role="button"><i class="tz-mail  waves-effect waves-circle"></i></a></li>
								</ul>
							</li>
							<li class="btn-share-social"><a href="#!" class="no-style" role="button"><i class="tz-share waves-effect waves-circle"></i></a></li>
							<li><a href="#!" class="no-style" role="button"><i class="tz-printer waves-effect waves-circle"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- .row-description-->
				<div class="row row-description">
					<div class="col-xxs-12 txt-md">
						<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, nulla, odio labore eum quod aut tenetur, laboriosam aspernatur libero reiciendis sequi. Neque adipisci omnis, eligendi quos dolorem atque, dolorum consectetur.
						</p>
						<p>
						Eos maxime laboriosam, corporis illo odit fugiat accusamus quae, sunt numquam aliquam nostrum saepe dolor totam repellendus voluptas. Aliquid magnam facilis dolorum ratione, iure sit voluptatum labore autem quisquam veniam. Omnis dolore aliquam excepturi corrupti totam natus, libero nihil! Pariatur temporibus sunt impedit, reprehenderit quos optio! Laudantium sunt, pariatur. Quod, animi, amet. Non odit mollitia, nam repudiandae cum quidem cupiditate.
						</p>
						<!--Insert extra text in div#collapse-description with class .collapse-->
						<div class="collapse" id="collapse-description">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus quidem aspernatur magni veritatis, quasi tempora aliquid voluptatem, culpa enim, quod, minus. Autem provident aspernatur minus dignissimos quaerat cum. Officia, eveniet!</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit a aperiam inventore officia necessitatibus voluptate neque tempore laborum autem, aut, dolore unde ullam ipsum non, nam fugit repudiandae, deleniti ex.</p>
							<p>	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque velit aliquam consequatur architecto, eum sequi quibusdam iusto, a quam numquam, commodi recusandae fuga ad! Aspernatur suscipit quo maxime facere consectetur.</p>	
						</div>
						<a class="txt-h-light txt-info pull-right" data-toggle="collapse" href="#collapse-description" aria-expanded="false"> 
							<span class="waves-effect">Read more <i class="tz-chevron-down-sm"></i></span>
							<span class="waves-effect">Read less <i class="tz-chevron-up-sm"></i></span>
						</a>
					</div>
				</div>
			</div>
		</section>

		<!--BEACHES-->  
		<section class="property-detail-beaches">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center">
						<ul class="flex-container txt-md">
							<li class="flex-item">
								<p>0 m</p>
								<p class="text-uppercase">Distance to the sea</p>
								<p class="txt-info">Straight line</p>
							</li>
							<li class="flex-item">
								<p>100 m</p>
								<a href="#!" target="_blank"><span>Beach</span> Montero</a>
							</li>
							<li class="flex-item">
								<p>300 m</p>
								<a href="#!" target="_blank"><span>Beach</span> Guasgualito</a>
								<p class="txt-info">Nearby beaches</p>
							</li>
							<li class="flex-item">
								<p>800 m</p>
								<a href="#!" target="_blank"><span>Beach</span> Hermosa</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section> <!-- /container-->

		<!--AREA-->
		<section class="container property-detail-area">
			<div class="row">
				<div class="col-xxs-12">
					<h2 class="txt-lg text-center">Area</h2>
					<ul class="flex-container flex-h-around txt-md">
						<li class="flex-item"><p>Area <span>800 m&#178</span></p></li>
						<li class="flex-item"><p>Land area <span>950 m&#178</span></p></li>
					</ul>
				</div>
			</div>
		</section> <!-- /container-->

		<!--OTHER FEATURES-->
		<section class="container property-detail-other-features">
			<hr>
			<div class="row">
				<div class="col-xxs-12 sub-features">
					<h2 class="txt-lg text-center">Features</h2>
					<div class="flex-container flex-wrap txt-md text-center">
						<!-- Show only the first six elements -->
						<div>
							<i class="tz-sea-view"></i>
							<p>Feature 1</p>
						</div>
						<div>
							<i class="tz-furnished"></i>
							<p>Feature 2</p>
						</div>
						<div>
							<i class="tz-kitchen-regular"></i>
							<p>Feature 3</p>
						</div>
						<div>
							<i class="tz-private-beach"></i>
							<p>Feature 4</p>
						</div>
						<div>
							<i class="tz-swimming-pool"></i>
							<p>Feature 5</p>
						</div>
						<div>
							<i class="tz-security-system"></i>
							<p>Feature 6</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row collapse" id="collapse-other-features">
				<!-- Home Appliance Services -->
				<div class="col-xxs-12 sub-services">
					<h2 class="txt-lg text-center">Services</h2>
					<div class="flex-container flex-wrap txt-md text-center">
						<div>
							<i class="tz-wifi"></i>
							<p>Service 1</p>
						</div>
						<div>
							<i class="tz-satelital-tv"></i>
							<p>Service 2</p>
						</div>
						<div>
							<i class="tz-service-room"></i>
							<p>Service 3</p>
						</div>
						<div>
							<i class="tz-air-conditioner"></i>
							<p>Service 4</p>
						</div>
					</div>
				</div>
				
				<!-- Home Appliance Sub-section -->
				<div class="col-xxs-12 sub-appliances">
					<h2 class="txt-lg text-center">Featured Home Appliances</h2>
					<div class="flex-container flex-wrap txt-md text-center">
						<div>
							<i class="tz-microwave"></i>
							<p>Appliance 1</p>
						</div>
						<div>
							<i class="tz-oven"></i>
							<p>Appliance 2</p>
						</div>
						<div>
							<i class="tz-dishwasher"></i>
							<p>Appliance 3</p>
						</div>
					</div>
				</div>
			</div>
			<a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#collapse-other-features" aria-expanded="false">
				<span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
				<span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>						
			</a>
		</section> <!-- /container-->

		<!--RULES-->
		<section class="container property-detail-rules">
			<hr>
			<div class="row">
				<div class="col-xxs-12">
					<h2 class="txt-lg text-center">Rules</h2>
					<ul class="flex-container flex-wrap txt-md">
						<li class="flex-item">
							<p>Pets allowed</p>
						</li>
						<li class="flex-item">
							<p>No security deposit</p>
						</li>
					</ul>
					<a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#" aria-expanded="false">
						<span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
						<span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>
					</a>
				</div>
			</div>	  
		</section> <!-- /container-->

		<!--FLOOR PLANS-->
		<section class="container property-detail-floor-plans">
			<hr>
			<div class="row">
				<div class="col-xxs-12">
					<h2 class="txt-lg text-center">Property plans</h2>
					<div class="swipe-tabs">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs flex-container flex-h-center">
							<li class="active"><a href="#floor-1" data-toggle="tab">Main floor</a></li>
							<li><a href="#floor-2" data-toggle="tab">Top floor</a></li>
							<li><a href="#floor-3" data-toggle="tab">Basement</a></li>
							<li><a href="#floor-4" data-toggle="tab">Terrace</a></li>
						</ul>
						<div class="swipe-alert"><i class="tz-swipe-sm"></i></div>
						<!-- Tab panes -->
						<div class="tab-content">
							<!--Tab pane 1-->
							<div class="tab-pane active" id="floor-1">
								<div class="flex-container flex-h-around flex-v-center">
									<div class="flex-item floor-plans">
										<!--Insert floor plan image-->
										<img src="https://via.placeholder.com/550x400/D3D3D3/ffffff?text=Insert+Floor-Plan-Image" alt="Main floor">
									</div>
									<div class="flex-item">
										<h3 class="txt-lg">Main floor</h3>
										<div class="floor-description txt-md">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quae animi possimus tempore alias ipsa impedit, quasi nihil temporibus? Animi alias culpa aperiam eveniet facere, non nemo velit impedit tempore.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti ut fugiat, nesciunt explicabo eum similique ratione dolorum nemo alias beatae iusto molestias vitae quisquam neque id, ea a earum delectus.</p>
										</div>
										<ul class="floor-characteristics txt-p-light txt-md">
											<li><span class="txt-p-medium">Area</span> <span>230 m&#178</span></li>
											<li><span class="txt-p-medium">Rooms</span> <span>1</span></li>
											<li><span class="txt-p-medium">Baths</span><span> </span>1.5</li>
										</ul>
									</div>
								</div>
							</div>
							<!--Tab pane 2-->
							<div class="tab-pane" id="floor-2">
								<div class="flex-container flex-h-around flex-v-center">
									<div class="flex-item floor-plans">
										<!--Insert floor plan image-->
										<img src="https://via.placeholder.com/550x400/D3D3D3/ffffff?text=Insert+Floor-Plan-Image" alt="Top floor">
									</div>
									<div class="flex-item">
										<h3 class="txt-lg">Top floor</h3>
										<div class="floor-description txt-md">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quae animi possimus tempore alias ipsa impedit, quasi nihil temporibus? Animi alias culpa aperiam eveniet facere, non nemo velit impedit tempore.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti ut fugiat, nesciunt explicabo eum similique ratione dolorum nemo alias beatae iusto molestias vitae quisquam neque id, ea a earum delectus.</p>
										</div>
										<ul class="floor-characteristics txt-p-light txt-md">
											<li><span class="txt-p-medium">Area</span> <span>195 m&#178</span></li>
											<li><span class="txt-p-medium">Rooms</span> <span>3</span></li>
											<li><span class="txt-p-medium">Baths</span><span> </span>2</li>
										</ul>
									</div>
								</div>
							</div>
							<!--Tab pane 3-->
							<div class="tab-pane" id="floor-3">
								<div class="flex-container flex-h-around flex-v-center">
									<div class="flex-item floor-plans">
										<!--Insert floor plan image-->
										<img src="https://via.placeholder.com/550x400/D3D3D3/ffffff?text=Insert+Floor-Plan-Image" alt="Basement">
									</div>
									<div class="flex-item">
										<h3 class="txt-lg">Basement</h3>
										<div class="floor-description txt-md">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quae animi possimus tempore alias ipsa impedit, quasi nihil temporibus? Animi alias culpa aperiam eveniet facere, non nemo velit impedit tempore.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti ut fugiat, nesciunt explicabo eum similique ratione dolorum nemo alias beatae iusto molestias vitae quisquam neque id, ea a earum delectus.</p>
										</div>
										<ul class="floor-characteristics txt-p-light txt-md">
											<li><span class="txt-p-medium">Area</span> <span>230 m&#178</span></li>
											<li><span class="txt-p-medium">Rooms</span> <span>1</span></li>
											<li><span class="txt-p-medium">Baths</span><span> </span>1</li>
										</ul>
									</div>
								</div>
							</div>
							<!--Tab pane 4-->
							<div class="tab-pane" id="floor-4">
								<div class="flex-container flex-h-around flex-v-center">
									<div class="flex-item floor-plans">
										<!--Insert floor plan image-->
										<img src="https://via.placeholder.com/550x400/D3D3D3/ffffff?text=Insert+Floor-Plan-Image" alt="Terrace">
									</div>
									<div class="flex-item">
										<h3 class="txt-lg">Terrace</h3>
										<div class="floor-description txt-md">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus quae animi possimus tempore alias ipsa impedit, quasi nihil temporibus? Animi alias culpa aperiam eveniet facere, non nemo velit impedit tempore.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti ut fugiat, nesciunt explicabo eum similique ratione dolorum nemo alias beatae iusto molestias vitae quisquam neque id, ea a earum delectus.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit sint cumque quidem expedita dignissimos ratione debitis, harum ut sunt voluptatem, dicta ipsam fugit optio dolor labore quasi temporibus sequi sapiente!</p>
										</div>
										<ul class="floor-characteristics txt-p-light txt-md">
											<li><span class="txt-p-medium">Area</span> <span>120 m&#178</span></li>
											<li><span class="txt-p-medium">Rooms</span> <span>0</span></li>
											<li><span class="txt-p-medium">Baths</span><span> </span>1</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- /container-->

		<!--MAP-->
		<section class="container property-detail-map">
			<hr>
			<div class="row">
				<div class="col-xxs-12">
					<h2 class="txt-lg text-center">Address</h2>
					<p class="txt-md text-center">Whatever street, 52. City. Country.</p>
				</div>
				<div class="col-xxs-12">
					<div class="map">
						<!--Replace image with google map-->
						<img src="https://via.placeholder.com/1570x430/D3D3D3/ffffff?text=Replace+with+Google+Map" alt="Google maps">
					</div>
				</div>
			</div>
		</section> <!-- /container-->

		<!--BOOKING PLUGIN-->  
		<section class="property-detail-booking">
			<div id="online-booking" class="id-link"></div>
			<div class="container">
				<hr>
				<div class="row">
					<div class="col-xxs-12">
						<h2 class="txt-lg text-center">Online Booking</h2>
						<div class="booking-code">
							
							<!--Example content - DELETE-->
							<style>
								.booking-code{
									text-align: center;
								}
							</style>
							Shortcodes here
							<!--DELETE UP HERE-->
							
						</div>
					</div>
				</div>
				<hr>
			</div>
		</section> <!-- /container-->

		<!--SEASONS-->
		<section class="container property-detail-seasons">
			<hr>
			<div class="row">
				<div class="col-xxs-12">
					<h2 class="txt-lg text-center">Seasons</h2>
					<div class="seasons-code">
						
						<!--Example content - DELETE-->
						<style>
							.seasons-code table{ margin: 0 auto;}
							.seasons-code .tg  {border-collapse:collapse;border-spacing:0; max-width: 70%; margin: rem-calc(30) auto rem-calc(50) auto;}
							.seasons-code .tg td{font-size: rem-calc(12);padding:rem-calc(10) rem-calc(5);border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
							.seasons-code .tg th{font-size: rem-calc(12);font-weight:normal;padding:rem-calc(10) rem-calc(5);border-style:solid;border-width:3px;overflow:hidden;word-break:normal;}
							.seasons-code .tg .tg-zv4m{border-color:#ffffff;text-align:left;vertical-align:top}
							.seasons-code .tg .tg-22sb{background-color:#f8ff00;border-color:#ffffff;text-align:left;vertical-align:top}
							.seasons-code .tg .tg-aw21{font-weight:bold;border-color:#ffffff;text-align:center;vertical-align:top}
							.seasons-code .tg .tg-hvao{background-color:#c0c0c0;border-color:#ffffff;text-align:left;vertical-align:top}
							.seasons-code .tg .tg-e166{background-color:#fffc9e;border-color:#ffffff;text-align:left;vertical-align:top}
							.seasons-code .tg .tg-br1l{font-weight:bold;background-color:#c0c0c0;color:#ffffff;border-color:#ffffff;text-align:center;vertical-align:top}
							.seasons-code .tg .tg-ofj5{border-color:#ffffff;text-align:right;vertical-align:top}
						</style>
						<table class="tg table table-condensed">
							<tr>
								<th class="tg-zv4m"></th>
								<th class="tg-aw21">Jan</th>
								<th class="tg-aw21">Feb</th>
								<th class="tg-aw21">Mar</th>
								<th class="tg-aw21">Apr</th>
								<th class="tg-aw21">May</th>
								<th class="tg-aw21">Jun</th>
								<th class="tg-aw21">Jul</th>
								<th class="tg-aw21">Aug</th>
								<th class="tg-aw21">Sep</th>
								<th class="tg-aw21">Oct</th>
								<th class="tg-aw21">Nov</th>
								<th class="tg-aw21">Dec</th>
							  </tr>
							<tr>
								<td class="tg-aw21">Low</td>
								<td class="tg-zv4m"></td>
								<td class="tg-zv4m"></td>
								<td class="tg-zv4m"></td>
								<td class="tg-hvao"></td>
								<td class="tg-hvao"></td>
								<td class="tg-hvao"></td>
								<td class="tg-hvao"></td>
								<td class="tg-zv4m"></td>
								<td class="tg-hvao"></td>
								<td class="tg-hvao"></td>
								<td class="tg-hvao"></td>
								<td class="tg-hvao"></td>
							</tr>
							<tr>
								<td class="tg-aw21">High</td>
								<td class="tg-22sb"></td>
								<td class="tg-e166"></td>
								<td class="tg-22sb"></td>
								<td class="tg-e166"></td>
								<td class="tg-e166"></td>
								<td class="tg-zv4m"></td>
								<td class="tg-e166"></td>
								<td class="tg-e166"></td>
								<td class="tg-e166"></td>
								<td class="tg-zv4m"></td>
								<td class="tg-zv4m"></td>
								<td class="tg-22sb"></td>
							</tr>
							<tr>
								<td class="tg-br1l" colspan="13">Long term</td>
							</tr>
							<tr>
								<td class="tg-ofj5" colspan="12">Christmas, New Year and Easter (2018/2019)<br></td>
								<td class="tg-22sb"></td>
							</tr>
						</table>
						<!--DELETE up here-->
						
					</div>
				</div>
			</div>
		</section> <!-- /container-->

		<!--PRICING POLICY-->
		<section class="container property-detail-pricing-policy">
			<hr>
			<div class="row">
				<div class="col-xxs-12">
					<h2 class="txt-lg text-center">Pricing policy</h2>
					<div class="pricing-policy-code">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, totam. Repellat eos ipsa suscipit reprehenderit, iure. A, maiores commodi repudiandae, labore laborum suscipit fugiat repellendus doloribus quae, debitis incidunt hic.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore repellat quae atque, quibusdam praesentium accusamus cum earum autem laudantium nulla impedit nostrum delectus eum quis nisi inventore, quia, quam iure.</p>
						<!--Insert extra text in div#collapse-pricing-policy with class .collapse-->
						<div class="collapse" id="collapse-pricing-policy">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus quidem aspernatur magni veritatis, quasi tempora aliquid voluptatem, culpa enim, quod, minus. Autem provident aspernatur minus dignissimos quaerat cum. Officia, eveniet!</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit a aperiam inventore officia necessitatibus voluptate neque tempore laborum autem, aut, dolore unde ullam ipsum non, nam fugit repudiandae, deleniti ex.</p>	
						</div>
						<a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#collapse-pricing-policy" aria-expanded="false">
							<span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
							<span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>
						</a>
					</div>
				</div>
			</div>
		</section> <!-- /container-->

		<!--CONTACT AN AGENT-->  
		<section class="property-detail-contact-agent">
			<div id="contact-agent" class="id-link"></div>
			<div class="container">
				<div class="row">
					<div class="col-xxs-12">
						<img src="http://placekitten.com/130/130" alt="" class="agent-avatar img-circle">
					</div>
					<div class="col-xxs-12">
						<p class="text-center">Hi, my name is <span class="txt-bold-p">Kate</span>. I speak your language, may I help you?</p>
						<p class="txt-h-medium txt-lg text-center agent-phone">+1 562 987 5689</p>
					</div>
				</div>
				<div class="row">
					<form class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
						<div class="row">
							<div class="input-field col-xxs-6">
								<select disabled>
									<option value="" disabled>Select</option>
									<option value="english" selected>English</option>
									<option value="spanish">Español</option>
									<option value="italian">Italiano</option>
									<option value="french">François</option>
								</select>
								<label>Language</label>
							</div>
							<div class="input-field col-xxs-6">
								<input id="form-ref" type="text" class="validate" value="REF. 123-45" disabled>
								<label for="form-ref">Reference</label>
							</div>
						</div>
						<!--Only for non-logged users-->
						<div class="row">
							<div class="input-field col-xxs-12">
								<input id="form-client-name" type="text" class="validate" required="" aria-required="true">
								<label for="form-client-name">Full name</label>
								<span class="helper-text" data-error="Error" data-success="Good!">Required</span>
							</div>
							<div class="input-field col-xxs-6">
								<input id="form-client-phone" type="text" class="validate">
								<label for="form-client-phone">Phone</label>
								<span class="helper-text">Add international code</span>
							</div>
							<div class="input-field col-xxs-6">
								<input id="form-client-email" type="email" class="validate" required="" aria-required="true">
								<label for="form-client-email">Email</label>
								<span class="helper-text" data-error="Error" data-success="Good!">Required</span>
							</div>
						</div>
						<!--fields for non-logged users end here-->
						<div class="row">
							<div class="input-field col-xxs-12">
								<input id="form-subjet" type="text" class="validate" required="" aria-required="true">
								<label for="form-subjet">Subjet</label>
								<span class="helper-text" data-error="Error" data-success="Good!">Required</span>
							</div>
							<div class="input-field col-xxs-12">
								<textarea id="form-message" class="materialize-textarea" required="" aria-required="true" data-length="400"></textarea>
									<label class="active" for="form-message">Message</label>
								<span class="helper-text" data-error="Error" data-success="Good!">Required</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xxs-12">
								<div class="visit-form">
									<h4 class="txt-md">Schedule a Tour</h4>
									<a data-toggle="collapse" href="#collapse-book-visit" aria-expanded="false">
										<span><i class="tz-plus waves-effect waves-circle"></i></span>
										<span><i class="tz-minus-sm waves-effect waves-circle"></i></span>
									</a>
									<div class="row collapse" id="collapse-book-visit">
										<div class="input-field col-xs-6">
											<input id="form-visit-date" type="text" class="datepicker">
											<label for="form-visit-date">Date</label>
										</div>
										<div class="input-field col-xs-6">
											<input id="form-visit-time" type="text" class="timepicker">
											<label for="form-visit-time">Time</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xxs-12">
								<div class="data-protection-eu-checkbox">
									<label for="form-accept-privacy-policy">
										<input id="form-accept-privacy-policy" type="checkbox" required="" aria-required="true"/>
										<span>I have read and accept the <a href="" target="_blank">privacy policy</a>.</span>
									</label>
								</div>
								<a type="button" class="waves-effect waves-color-1 btn">Send request</a>
								<div class="data-protection-eu-alert">
									<h6>Basic information about data protection:</h6>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore aliquid expedita nemo, esse, sapiente velit aut a rerum fugit sequi voluptates. Provident nam error, nihil quaerat. Read <a href="#" target="_blank">privacy policy</a>.
									</p>
								</div>
							</div>
						</div>
					</form>					
				</div>
			</div>
		</section> <!-- /container-->

		<!--REVIEWS-->
		<section class="container property-detail-reviews">
			<div id="property-reviews" class="id-link"></div>
			<hr>
			<div class="row">
				<div class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
					<h2 class="txt-lg text-center"><span class="txt-h-light">98</span> Reviews</h2>
					<ul class="list-inline text-center">
						<li>
							<div>
								<i class="tz-ratting-full"></i>
								<i class="tz-ratting-full"></i>
								<i class="tz-ratting-full"></i>
								<i class="tz-ratting-full"></i>
								<i class="tz-ratting-half"></i>
							</div>
						</li>
						<li class="txt-sm">  
							(<span class="txt-h-medium">4.5</span> out of <span class="txt-h-medium">5</span>)
						</li>
					</ul>
					<div class="txt-xs txt-color-1 text-right"><a href="#review-this-property"><span class="waves-effect">Write a review</span></a></div>
				</div>
				<!--Reviews container-->
				<div class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
					<!--Each review-->
					<div class="row individual-review">
						<hr>
						<div class="col-xxs-12 col-xs-2">
							<span class="review-avatar img-circle"><i class="tz-user"></i></span>
						</div>
						<div class="col-xxs-12 col-xs-10">
							<p class="review user txt-h-light">User</p>
							<p class="review-date txt-h-light txt-info">28, december 2017</p>
							<p class="review-title txt-h-medium">Review title</p>
							<div class="review-value">
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
							</div>
							<p class="review-text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse rerum, temporibus accusantium unde modi maiores enim ullam eum architecto dolore possimus sit maxime mollitia. Neque recusandae, voluptatibus nesciunt temporibus quisquam.
							</p>
						</div>
					</div>
					<!--Each review ends here-->
					<!--Each review-->
					<div class="row individual-review">
						<hr>
						<div class="col-xxs-12 col-xs-2">
							<span class="review-avatar img-circle"><i class="tz-user"></i></span>
						</div>
						<div class="col-xxs-12 col-xs-10">
							<p class="review user txt-h-light">User</p>
							<p class="review-date txt-h-light txt-info">28, december 2017</p>
							<p class="review-title txt-h-medium">Review title</p>
							<div class="review-value">
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-empty-sm"></i>
								<i class="tz-ratting-empty-sm"></i>
							</div>
							<p class="review-text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse rerum, temporibus accusantium unde modi maiores enim ullam eum architecto dolore possimus sit maxime mollitia. Neque recusandae, voluptatibus nesciunt temporibus quisquam.
							</p>
						</div>
					</div>
					<!--Each review ends here-->
					<!--Each review-->
					<div class="row individual-review">
						<hr>
						<div class="col-xxs-12 col-xs-2">
							<span class="review-avatar img-circle"><i class="tz-user"></i></span>
						</div>
						<div class="col-xxs-12 col-xs-10">
							<p class="review user txt-h-light">User</p>
							<p class="review-date txt-h-light txt-info">28, december 2017</p>
							<p class="review-title txt-h-medium">Review title</p>
							<div class="review-value">
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-full-sm"></i>
								<i class="tz-ratting-half-sm"></i>
								<i class="tz-ratting-empty-sm"></i>
							</div>
							<p class="review-text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse rerum, temporibus accusantium unde modi maiores enim ullam eum architecto dolore possimus sit maxime mollitia. Neque recusandae, voluptatibus nesciunt temporibus quisquam.
							</p>
						</div>
					</div>
					<!--Each review ends here-->
					
					<a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#" aria-expanded="false">
						<span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
						<span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>
					</a>
				</div>
				<!--Reviews container ends here-->

				<!-- Write a review -->
				<div class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
					<div id="review-this-property" class="id-link"></div>
					<div class="write-review">					 
						<h4 class="txt-md">Write a review</h4>
						<!--Only for login users-->
						<form>
							<div class="row">
								<div class="col-xxs-12">
									<p class="txt-sm">Rate your experience on this property</p>
									<div class="write-review-ratting">
										<a role="button" class="no-style" title="Bad" data-toggle="tooltip" data-placement="right">
											<i class="tz-ratting-empty"></i>
										</a>
										<a role="button" class="no-style" title="Not bad" data-toggle="tooltip" data-placement="right">
											<i class="tz-ratting-empty"></i>
										</a>
										<a role="button" class="no-style" title="Blah" data-toggle="tooltip" data-placement="right">
											<i class="tz-ratting-empty"></i>
										</a>
										<a role="button" class="no-style" title="Good!" data-toggle="tooltip" data-placement="right">
											<i class="tz-ratting-empty"></i>
										</a>
										<a role="button" class="no-style" title="Amazing!" data-toggle="tooltip" data-placement="right">
											<i class="tz-ratting-empty"></i>
										</a>
									</div>
								</div>
								<div class="input-field col-xxs-12">
									<input id="write-review-title" type="text" class="validate" required="" aria-required="true">
									<label for="write-review-title">Review title</label>
								</div>
								<div class="input-field col-xxs-12">
									<textarea id="write-review-text" class="materialize-textarea" required="" aria-required="true" data-length="600"></textarea>
									<label class="active" for="write-review-text">Write your review here</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xxs-12">
									<div class="data-protection-eu-checkbox">
										<label for="review-accept-privacy-policy">
											<input id="review-accept-privacy-policy" type="checkbox" required="" aria-required="true"/>
											<span>I have read and accept the <a href="" target="_blank">privacy policy</a>.</span>
										</label>
									</div>
									<a type="button" class="waves-effect waves-color-1 btn bd-black">Send review</a>
									<div class="data-protection-eu-alert">
										<h6>Basic information about data protection:</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore aliquid expedita nemo, esse, sapiente velit aut a rerum fugit sequi voluptates. Provident nam error, nihil quaerat. Read <a href="#" target="_blank">privacy policy</a>.
										</p>
									</div>
								</div>
							</div>
						</form>
						<!--only for login users ends here-->
						<!--Login to review-->
						<div class="login-review txt-sm txt-color-1">
							<a href=""><span class="waves-effect">Log in to rate this property</span></a>
						</div>
						<!--Login to review ends here-->
					</div>
				</div>
			</div>
		</section> <!-- /container-->
	</main>
	<!--WIDGETS AREA-->  
	<div class="property-detail-widget-area">
		<div class="container">
			<div class="row">
				<div class="col-xxs-12">
					<div class="property-detail-widgets flex-container">
						<div class="property-detail-widget-1">
							<!--Widget 1-->
						</div>
						<div class="property-detail-widget-2">
							<!--Widget 2-->
						</div>
						<div class="property-detail-widget-3">
							<!--Widget 3-->
						</div>					    
					</div>					
				</div>
			</div>
		</div>
	</div>  <!-- /container-->




<?php get_footer(); ?>

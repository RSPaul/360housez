<?php
/**
 * Template Name: Listing Template (Style 3) Full Width
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
	
	<?php //get_template_part('template-parts/advanced-search/half-map'); ?>

	<div class="property_listing inner_card_property_listing">
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

		                <div class="row propery_margin_added">
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
									<select name="per_page" id="perPageId" onchange="per_page()">
										<option value="" disabled  <?=$_GET['per_page'] == '' ? 'selected' : ''?> >Show</option>
										<option value="12" <?=$_GET['per_page'] == '12' ? 'selected' : ''?> >12</option>
										<option value="25" <?=$_GET['per_page'] == '25' ? 'selected' : ''?> >25</option>
										<option value="50" <?=$_GET['per_page'] == '50' ? 'selected' : ''?> >50</option>
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
	<style type="text/css">
		.btn-group.bootstrap-select {
		    display: none !important;
		}

	</style>

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


		function per_page() {
			
			var key = 'per_page';
			var value = document.getElementById('perPageId').value;
			var uri = window.location.href;
			
		  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
		  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
		  if (uri.match(re)) {
		    window.location.href = uri.replace(re, '$1' + key + "=" + value + '$2');
		  }
		  else {
		    window.location.href = uri + separator + key + "=" + value;
		  }
		
		}
	</script>

<?php get_footer(); ?>
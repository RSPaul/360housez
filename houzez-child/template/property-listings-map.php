<?php
/**
 * Template Name: Property Listing TZ Map
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 11/06/16
 * Time: 11:00 PM
 */
get_header();
global $post, $listings_tabs, $fave_featured_listing;
$listing_view = houzez_option('halfmap_listings_layout');
$show_switch = houzez_option('halfmap_listings_layout');
$listings_tabs = get_post_meta( $post->ID, 'fave_listings_tabs', true );
$listings_tab_1 = get_post_meta( $post->ID, 'fave_listings_tab_1', true );
$listings_tab_2 = get_post_meta( $post->ID, 'fave_listings_tab_2', true );
$fave_featured_listing = get_post_meta( $post->ID, 'fave_featured_listing', true );
$fave_featured_prop_no = get_post_meta( $post->ID, 'fave_featured_prop_no', true );
$fave_prop_no = get_post_meta( $post->ID, 'fave_prop_no', true );
$search_result_page = houzez_option('search_result_page');
$geo_location = houzez_option('geo_location');
$map_fullscreen = houzez_option('map_fullscreen');

if(isset($_GET['half_map_style'])) {
    $listing_view = $_GET['half_map_style'];
    $show_switch = $_GET['half_map_style'];
}

$listing_page_link = houzez_properties_listing_link();
$active_grid = $active_list = '';
if( $listing_view == 'grid-view' || $listing_view == 'grid-view-style3' ) {
    $listing_view = 'grid-view';
    $active_grid = 'active';
} else {
    $listing_view = 'list-view';
    $active_list = 'active';
}
$listing_view = 'grid-view';
$sortby = '';
if( isset($_GET['prop_featured']) && $_GET['prop_featured'] == 'no' ) {
    $fave_featured_listing = 'disable';
}

$sortby = get_post_meta($post->ID, 'fave_properties_sort_halfmap', true);

$enable_disable_save_search = houzez_option('enable_disable_save_search');

?>

<?php get_template_part('template-parts/advanced-search/half-map'); ?>
<!-- MAIN CONTENT OF PAGE -->
    <main class="map-active search_map_page">
        <div class="container-fluid">
            <div class="row">
                <div class="module-half map-module-half listing-search-result remove_scroller col-xxs-12 col-sm-6 col-lg-7">
                    <div class="row">
                        <div class="save-search sort-results flex-container col-xxs-12">
                            <div>
                                <span class="txt-sm tabs-title"> <span></span> Results</span>
                                <?php if( $enable_disable_save_search != 0 ) { ?>
                                    <a href="#!" class="bd-black waves-effect waves-color-1 txt-sm" id="save_search_click" role="button"><?php esc_html_e( 'Save', 'houzez' ); ?></a>
                                <?php } ?>
                                <?php //get_template_part('template-parts/advanced-search/half-map'); ?>
                            </div>
                            <form autocomplete="off" method="get" id="half_map_search_form" class="save_search_form" action="#">
                                <div>                                   
                                    <select id="houzez_sort_half_map" name="sort_half_map" class="selectpicker bs-select-hidden" title="" data-live-search-style="begins" data-live-search="false">
                                        <option value=""><?php esc_html_e( 'Sort', 'houzez' ); ?></option>
                                        <option <?php if( $sortby == 'featured_top' ) { echo "selected"; } ?> value="featured_top"><?php esc_html_e( 'Featured first', 'houzez' ); ?></option>
                                        <option <?php if( $sortby == 'a_price' ) { echo "selected"; } ?> value="a_price"><?php esc_html_e( 'Price (low to high)', 'houzez' ); ?></option>
                                        <option <?php if( $sortby == 'd_price' ) { echo "selected"; } ?> value="d_price"><?php esc_html_e( 'Price (high to low)', 'houzez' ); ?></option>
                                        <option <?php if( $sortby == 'd_date' ) { echo "selected"; } ?> value="d_date"><?php esc_html_e( 'Date (new to old)', 'houzez' ); ?></option>
                                        <option <?php if( $sortby == 'a_date' ) { echo "selected"; } ?> value="a_date"><?php esc_html_e( 'Date (old to new)', 'houzez' ); ?></option>
                                    </select>                                   
                                </div>
                            </form>
                            <!-- <div>
                                <select>
                                    <option value="" disabled selected>Sort</option>
                                    <option value="featured">Featured first</option>
                                    <option value="price_low">Price (low to high)</option>
                                    <option value="price_high">Price (high to low)</option>
                                    <option value="date_new">Date (new to old)</option>
                                    <option value="date_old">Date (old to new)</option>
                                </select>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="listing-container flex-container flex-wrap col-xxs-12 grid-view">
                            <div id="houzez_ajax_container" class="flex-container flex-wrap">

                            </div>
                            <!--Property Card Featured with .featured-property class-->
                            <!-- <div class="property-card featured-property">
                                <div class="property-card-wrapper flex-container">
                                    <div class="property-card-header">
                                        <ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
                                            <li class="label1">Exclusive</li>
                                            <li class="label2">Negotiable</li>
                                        </ul> -->
                                        <!-- Use class .saved when user save a property and change tooltip text-->
                                     <!--    <a href="#!" role="button" class="card-save no-style saved" title="Saved" data-toggle="tooltip" data-placement="left">
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
                                            From <span class="txt-h-medium">200</span> USD / night -->
                                            <!-- Use this icon with tooltip when the property has been marked (in backend) as an opportunity -->
                                            <!-- <i class="tz-arrow-down" title="The price has dropped" data-toggle="tooltip" data-placement="right"></i>                                    
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
                            </div>  --> 

                        </div>
                    </div>
                    <div class="row">
                        <div class="pagination-results flex-container flex-wrap col-xxs-12">                                     
                           <!--  <div class="show-per-page">
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
                            </ul> -->
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
                            <div id="houzez-gmap-main" class="fave-screen-fix">
                                <div id="mapViewHalfListings" class="map-half">
                                </div>
                                <div id="houzez-map-loading">
                                    <div class="mapPlaceholder">
                                        <div class="loader-ripple">
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_nonce_field('houzez_header_map_ajax_nonce', 'securityHouzezHeaderMap', true); ?>

                                <div  class="map-arrows-actions">
                                    <button id="listing-mapzoomin" class="map-btn map-control"><i class="tz-plus"></i></button>
                                    <button id="listing-mapzoomout" class="map-btn map-control"><i class="tz-minus"></i></button>
                                    <!-- <input type="text" id="google-map-search" placeholder="<?php esc_html_e('Google Map Search', 'houzez'); ?>" class="map-search"> -->
                                </div>
                                <div class="map-next-prev-actions">
                                    <ul class="dropdown-menu" aria-labelledby="houzez-gmap-view">
                                        <li><a href="#" class="houzezMapType" data-maptype="roadmap"><span><?php esc_html_e( 'Roadmap', 'houzez' ); ?></span></a></li>
                                        <li><a href="#" class="houzezMapType" data-maptype="satellite"><span><?php esc_html_e( 'Satelite', 'houzez' ); ?></span></a></li>
                                        <li><a href="#" class="houzezMapType" data-maptype="hybrid"><span><?php esc_html_e( 'Hybrid', 'houzez' ); ?></span></a></li>
                                        <li><a href="#" class="houzezMapType" data-maptype="terrain"><span><?php esc_html_e( 'Terrain', 'houzez' ); ?></span></a></li>
                                    </ul>
                                    <button id="houzez-gmap-view" class="map-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="tz-setting"></i></button>
                                    <button id="houzez-gmap-prev" class="map-btn"><i class="tz-chevron-left"></i></button>
                                    <button id="houzez-gmap-next" class="map-btn"><i class="tz-chevron-right"></i></button>

                                    <span class="map-zoom-actions">
                                        <?php if( $geo_location != 0 ) { ?>
                                            <span id="houzez-gmap-location" class="map-btn"><i class="tz-expand"></i> <span><?php esc_html_e('My location', 'houzez'); ?></span></span>
                                        <?php } ?>
                                        <?php if( $map_fullscreen != 0 ) { ?>
                                            <span id="houzez-gmap-full"  class="map-btn"><i class="tz-expand"></i> <span></span></span>
                                        <?php } ?>                                        
                                    </span>

                                </div>
                                <!-- <div  class="map-zoom-actions">
                                    <?php if( $geo_location != 0 ) { ?>
                                        <span id="houzez-gmap-location" class="map-btn"><i class="fa fa-map-marker"></i> <span><?php esc_html_e('My location', 'houzez'); ?></span></span>
                                    <?php } ?>
                                    <?php if( $map_fullscreen != 0 ) { ?>
                                        <span id="houzez-gmap-full"  class="map-btn"><i class="fa fa-arrows-alt"></i> <span><?php esc_html_e('Fullscreen', 'houzez'); ?></span></span>
                                    <?php } ?>
                                </div> -->

                            </div>
                            <!-- <iframe id="gMap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3578.591552726884!2d-69.47671746779709!3d-50.744671020778185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xbdb82576698cee31%3A0xe213934c1d810259!2shotel+restaurant!5e1!3m2!1ses!2scl!4v1542984329814" width="100px" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        </div>
                </div>



            </div>
        </div>
    </main>

</div><!-- #section Body -->

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function () {
        console.log('page ready' );
        setTimeout(function () {
            // jQuery('#houzez-gmap-main').css('position', 'fixed');
         //   jQuery('#houzez-gmap-main').css('width', '33%');
        },5000)
    });
</script>
<script>
       // window.onscroll = function() {myFunction()};

        // var header = document.getElementById("houzez-gmap-main");
        // var sticky = header.offsetTop;

        // function myFunction() {
        //   if (window.pageYOffset > sticky) {
        //     header.classList.add("stick_map");
        //   } else {
        //     header.classList.remove("stick_map");
        //   }
        // }
    </script>
</body>
</html>
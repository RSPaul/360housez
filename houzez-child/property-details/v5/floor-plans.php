<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 27/09/16
 * Time: 5:03 PM
 * Since v1.4.0
 */
global $floor_plans, $post_meta_data, $map_in_section;
global $post;

$icon_rooms = houzez_option('icon_rooms', false, 'url' );
$icon_bathrooms = houzez_option('icon_bathrooms', false, 'url' );
$icon_prop_size = houzez_option('icon_prop_size', false, 'url' );

$fave_property_map = get_post_meta( get_the_ID(), 'fave_property_map', true );

$address = get_post_meta( get_the_ID(), 'fave_property_address', true );
$zipcode = get_post_meta( get_the_ID(), 'fave_property_zip', true );
$country = get_post_meta( get_the_ID(), 'fave_property_country', true );
$city = houzez_taxonomy_simple('property_city');
$state = houzez_taxonomy_simple('property_state');
$neighbourhood = houzez_taxonomy_simple('property_area');
$google_map_address = get_post_meta( get_the_ID(), 'fave_property_map_address', true );
$google_map_address_url = "http://maps.google.com/?q=".$google_map_address;


if( !empty( $floor_plans ) ) {
?>
<div class="container property-detail-floor-plans">
   
        <!-- <div class="detail-title">
            <h2 class="title-left"><?php esc_html_e( 'Floor plans', 'houzez' ); ?></h2>
        </div> -->
        <div class="plan-tabber swipe-tabs">
            <ul class="plan-tabs nav nav-tabs flex-container flex-h-center">
                <?php
                $i = 0;
                foreach( $floor_plans as $pln ):
                    $i++;
                    if( $i == 1 ) {
                        $active = 'class="active"';
                    } else {
                        $active = '';
                    }
                    echo '<li '.$active.'>'. '<a>' .esc_attr( $pln['fave_plan_title'] ). '</a>'. '</li>';
                endforeach;
                ?>
            </ul>
            <div class="tab-content">
                <?php
                $j = 0;
                foreach( $floor_plans as $plan ):
                    $j++;
                    if( $j == 1 ) {
                        $active_tab = 'active in';
                    } else {
                        $active_tab = '';
                    }
                    $price_postfix = '';
                    if( !empty( $plan['fave_plan_price_postfix'] ) ) {
                        $price_postfix = ' / '.$plan['fave_plan_price_postfix'];
                    }
                    $filetype = wp_check_filetype($plan['fave_plan_image']);
                    ?>

                    <div class="tab-pane fade <?php echo esc_attr( $active_tab );?>">
                        <div class="col-sm-6 col-xs-12">
                            <div class="floor-image">
                                <?php if( !empty( $plan['fave_plan_image'] ) ) { ?>
                                    <?php if($filetype['ext'] != 'pdf' ) { ?>
                                        <a data-fancy="property_gallery" href="<?php echo esc_url( $plan['fave_plan_image'] ); ?>"><img src="<?php echo esc_url( $plan['fave_plan_image'] ); ?>" alt="img" width="" height=""></a>
                                <?php } else { 
                                        $path = $plan['fave_plan_image'];
                                        $file = basename($path); 
                                        $file = basename($path, ".pdf");
                                        
                                        echo '<a href="'.esc_url( $plan['fave_plan_image'] ).'" download>'.$file.'</a>';
                                    }
                                 } ?>
                            </div>

                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="floor-content">
                                <div class="floor-title-block">
                                    <h2 class="floor-title" style="display: block;"><?php echo esc_attr( $plan['fave_plan_title'] ); ?></h2>
                                    <!-- <h3 class="floor-price"> <?php esc_html_e( 'Price:', 'houzez' ); ?> <?php echo houzez_get_property_price( $plan['fave_plan_price'] ).$price_postfix; ?> </h3> -->
                                </div>

                                <?php if( !empty( $plan['fave_plan_description'] ) ) { ?>
                                    <p><?php echo esc_attr( $plan['fave_plan_description'] ); ?></p>
                                <?php } ?>

                               
                                    <ul class="floor-characteristics txt-p-light txt-md">
                                        <?php 
                                        // $fave_property_land_postfix_area=get_post_meta( get_the_ID(), 'fave_property_size_prefix', true ); 
                                        // $single_area_property = get_post_meta( get_the_ID(), 'fave_property_size', true );
                                        ?>

                                        <li><span class="txt-p-medium">Area</span> <span><?php echo esc_attr( $plan['fave_plan_size'] ); echo houzez_option('area_prefix_default'); ?></span></li>
                                        <li><span class="txt-p-medium">Rooms</span> <span><?php echo esc_attr( $plan['fave_plan_rooms'] ); ?></span></li>
                                        <li><span class="txt-p-medium">Baths</span><span> </span><?php echo esc_attr( $plan['fave_plan_bathrooms'] ); ?></li>
                                    </ul>
                            </div>
                        </div>
                    </div>


                <?php
                endforeach;
                ?>
            </div>
        </div>

</div>
<?php }
if( $fave_property_map  == 1) { ?>
<section class="container property-detail-map">
    <hr>
    <div class="row">
        <div class="col-xxs-12">
            <h2 class="txt-lg text-center">Address</h2>
            <p class="txt-md text-center"><?php echo esc_attr( $address ) ?> , <?php echo esc_attr( $zipcode ); ?>. <?php echo esc_attr( $city ); ?>. <?php echo esc_attr( $state ); ?>. <?php echo houzez_country_code_to_country($country); ?>.</p>
        </div>
        <div class="col-xxs-12">
            <div class="map">
                <?php if( $map_in_section != 0 ) { ?>
                <div id="singlePropertyMapSection">
                    <div class="mapPlaceholder">
                        <div class="loader-ripple">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <?php wp_nonce_field('houzez_map_ajax_nonce', 'securityHouzezMap', true); ?>
                <input type="hidden" name="prop_id" id="prop_id" value="<?php echo esc_attr($post->ID); ?>" />
                <?php } ?>
            </div>
        </div>
    </div>
</section> <!-- /container-->
<?php } ?>
<?php
$wp_booking_hbook = get_post_meta($post->ID, 'wp_booking_hbook', true);
$wp_booking_section_title = get_post_meta($post->ID, 'wp_booking_section_title', true);
$booking_shortcode = get_post_meta($post->ID, 'wp_booking_hbook_shortcode', true);
$booking_shortcode2 = get_post_meta($post->ID, 'wp_booking_hbook_shortcode2', true);
if(!empty($wp_booking_hbook == "enable")) {
?>
<section class="property-detail-booking">
        <div id="online-booking" class="id-link"></div>
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-xxs-12">
                    <h2 class="txt-lg text-center"><?php echo $wp_booking_section_title; ?></h2>
                    <div class="booking-code">
                        <!--Example content - DELETE-->
                        <style>
                            .booking-code{
                                text-align: center;
                            }
                        </style>
                        <!-- Shortcodes here -->
                        <!--DELETE UP HERE-->
                        <?php echo do_shortcode($booking_shortcode);?>
                        <?php echo do_shortcode($booking_shortcode2);?>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section> <!-- /container-->
<?php  } ?>



    

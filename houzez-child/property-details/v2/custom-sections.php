<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 27/09/16
 * Time: 5:02 PM
 * Since v1.4.0
 */
global $post_meta_data, $map_in_section;
$address = get_post_meta( get_the_ID(), 'fave_property_address', true );
$zipcode = get_post_meta( get_the_ID(), 'fave_property_zip', true );
$country = get_post_meta( get_the_ID(), 'fave_property_country', true );
$city = houzez_taxonomy_simple('property_city');
$state = houzez_taxonomy_simple('property_state');
$neighbourhood = houzez_taxonomy_simple('property_area');
$google_map_address = get_post_meta( get_the_ID(), 'fave_property_map_address', true );
$google_map_address_url = "http://maps.google.com/?q=".$google_map_address;


//Privacy Policy
$price_policy_setting=get_post_meta(get_the_ID(), 'price_policy', true);
$price_section_title=get_post_meta(get_the_ID(),'price_section_title', true);
$price_content=get_post_meta(get_the_ID(), 'price_content', true);
?>


<div class="additional_setting_section">    
    <div id="singlePropertyMapSection" style="position: relative; overflow: hidden;">
        <div class="online_booking">
            <!-- Online Booking Content -->
        </div>
        <div class="season_content">
            <!-- Season Content -->

        </div>

        <?php if($price_policy_setting!="disable"){ ?>
            <div class="privacy_policy_content">
                <h1><?php echo $price_section_title; ?></h1>
                <p><?php echo $price_content; ?></p>
            </div>
        <?php } ?>

    </div>
</div>
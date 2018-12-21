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
?>

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
 



    

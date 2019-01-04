<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 27/09/16
 * Time: 4:52 PM
 */
global $post_meta_data ,$post, $prop_features;

$prop_id = get_post_meta( get_the_ID(), 'fave_property_id', true );

$prop_price = get_post_meta( get_the_ID(), 'fave_property_price', true );
$prop_living_price = get_post_meta( get_the_ID(), 'fave_property_sec_price', true );
$prop_vac_price = get_post_meta( get_the_ID(), 'fave_property_third_price', true );

$prop_size = get_post_meta( get_the_ID(), 'fave_property_size', true );
$prop_land = get_post_meta( get_the_ID(), 'fave_property_land', true );
$prop_land_postfix = get_post_meta( get_the_ID(), 'fave_property_postfix', true );
$bedrooms = get_post_meta( get_the_ID(), 'fave_property_bedrooms', true );
$bathrooms = get_post_meta( get_the_ID(), 'fave_search_bathrooms', true );
$toilet = get_post_meta( get_the_ID(), 'fave_property_toilet', true );
$guests = get_post_meta( get_the_ID(), 'fave_property_guests', true );
$year_built = get_post_meta( get_the_ID(), 'fave_property_year', true );
$garage = get_post_meta( get_the_ID(), 'fave_property_garage', true );
$garage_size = get_post_meta( get_the_ID(), 'fave_property_garage_size', true );
$additional_features_enable = get_post_meta( get_the_ID(), 'fave_additional_features_enable', true );
$additional_features = get_post_meta( get_the_ID(), 'additional_features', true );
$prop_details = false;
$documents_download = houzez_option('documents_download');

// beaches
$fave_property_sea = get_post_meta( get_the_ID(), 'fave_property_sea', true );
$near_beach1 = get_post_meta( get_the_ID(), 'wp_near_distance1', true );
$near_beach2 = get_post_meta( get_the_ID(), 'wp_near_distance2', true );
$near_beach3 = get_post_meta( get_the_ID(), 'wp_near_distance3', true );

$near_beach1_id = get_post_meta( get_the_ID(), 'wp_near_beach1', true );
$near_beach2_id = get_post_meta( get_the_ID(), 'wp_near_beach2', true );
$near_beach3_id = get_post_meta( get_the_ID(), 'wp_near_beach3', true );


$terms = get_terms( array(
    'taxonomy' => 'beaches',
    'hide_empty' => false,
) );

$near_beach1_name = "";
$near_beach2_name = "";
$near_beach3_name = "";

if(count($terms)) {
    foreach ($terms as $key => $value) {
        if($value->term_id == $near_beach1_id) {
            $near_beach1_name = $value->name;
        }
        if($value->term_id == $near_beach2_id) {
            $near_beach2_name = $value->name;
        }
        if($value->term_id == $near_beach3_id) {
            $near_beach3_name = $value->name;
        }
    }
}



$icon_prop_id = houzez_option('icon_prop_id', false, 'url' );
$icon_bedrooms = houzez_option('icon_bedrooms', false, 'url' );
$icon_rooms = houzez_option('icon_rooms', false, 'url' );
$icon_bathrooms = houzez_option('icon_bathrooms', false, 'url' );
$icon_prop_size = houzez_option('icon_prop_size', false, 'url' );
$icon_prop_land = houzez_option('icon_prop_land', false, 'url' );
$icon_garage_size = houzez_option('icon_garage_size', false, 'url' );
$icon_garage = houzez_option('icon_garage', false, 'url' );
$icon_year = houzez_option('icon_year', false, 'url' );
$property_reviews = houzez_option('property_reviews');
$near_distance1=get_post_meta(get_the_ID(), 'near_distance1', true);
$near_size_posfix1=get_post_meta(get_the_ID(), 'near_size_posfix1', true);
$near_distance2=get_post_meta(get_the_ID(), 'near_distance2', true);
$near_size_posfix2=get_post_meta(get_the_ID(), 'near_size_posfix2', true);
$near_distance3=get_post_meta(get_the_ID(), 'near_distance3', true);
$near_size_posfix3=get_post_meta(get_the_ID(), 'near_size_posfix3', true);
$review_setting=get_post_meta(get_the_ID(), 'fave_disablereviews_area', true);
$single_top_area = get_post_meta( get_the_ID(), 'fave_single_top_area', true );

$single_area_property = get_post_meta( get_the_ID(), 'fave_property_size', true );
$single_area_features = get_post_meta( get_the_ID(), 'fave_property_land', true );
$fave_property_land_postfix_area=get_post_meta( get_the_ID(), 'fave_property_size_prefix', true );
$fave_property_land_postfix_features=get_post_meta( get_the_ID(), 'fave_property_land_postfix', true );

//Rules Meta

$rules_setting=get_post_meta(get_the_ID(), 'wp_rules_enable', true);
$rules_section_title=get_post_meta(get_the_ID(), 'rules_section_title', true);
$rules_pets_enable=get_post_meta(get_the_ID(), 'wp_rules_pets_enable', true);
$rules_security_deposit=get_post_meta(get_the_ID(),'wp_rules_security', true);
$own_rules_repeater=get_post_meta(get_the_ID(), 'own_rules', true);

$pro_type = get_the_terms(get_the_ID(), 'property_status');

if( !empty( $prop_id ) ||
    !empty( $prop_price ) ||
    !empty( $prop_size ) ||
    !empty( $bedrooms ) ||
    !empty( $bathrooms ) ||
    !empty( $year_built ) ||
    !empty( $garage )
) {
    $prop_details = true;
}
$hide_detail_prop_fields = houzez_option('hide_detail_prop_fields');

$prop_features        = wp_get_post_terms( get_the_ID(), 'property_feature', array("fields" => "all"));

?>


<?php
    if( $prop_details ) { ?>

    <?php // get_template_part('property-details/next-prev'); ?>
    <div class="property_details1">


    <section class="property-detail-information">
        <div class="container">
            <!-- .row-ref-->
            <div class="row row-ref">
                <div class="col-xs-6">
                    <!--Property ID-->
                    <p class="txt-h-light txt-md text-uppercase">REF. <?php echo $prop_id; ?></p>
                </div>
                <div class="col-xs-6">
                    <!--Save as Favorite-->
                    <p class="txt-md text-right">
                        Save <a role="button" class="no-style add_fav" role="button" data-propid="<?php echo get_the_ID(); ?>"><i class="tz-treasure-line waves-effect waves-circle"></i></a>
                    </p>
                </div>
            </div>
            <!-- .row-price-->
            <div class="row row-price">
                <div class="col-xs-12">
                    <?php
                    $cond1 = ($pro_type[0]->slug == "for-rent-living") ? "block" : "none";  
                    $cond2 = ($pro_type[0]->slug == "for-rent-vacations") ? "block" : "none";
                    $cond3 = ($pro_type[0]->slug == "for-sale") ? "block" : "none";
                    ?>
                    <p class="txt-h-light txt-lg for-rent-living" style="display: <?php echo $cond1;?>">From <span class="txt-h-medium"><?php echo esc_attr( $prop_living_price ); ?> /month </span> USD</p>
                    <p class="txt-h-light txt-lg for-rent-vacations" style="display: <?php echo $cond2;?>">From <span class="txt-h-medium"><?php echo esc_attr( $prop_vac_price ); ?> /night </span> USD</p>
                    <p class="txt-h-light txt-lg for-sale" style="display: <?php echo $cond3;?>">From <span class="txt-h-medium"><?php echo esc_attr( $prop_price ); ?></span> USD</p>
                    
                    <div class="input-field">
                        <ul class="list-inline">
                            <li>
                                <label class="txt-h-light txt-info">Show price</label>
                            </li>
                            <li>
                                <select class="txt-xs" id="selectStatus">
                                    <option value="" disabled>Select</option>
                                    <?php foreach ($pro_type as $key => $value) {
                                       echo  '<option value="'.$value->slug.'">'.$value->name.'</option>';                                        
                                    } ?>
                                    <!-- <option value="rent_vacations" selected>For Rent: Vacations</option>
                                    <option value="for_sale">For Sale</option> -->
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
                        <?php if($guests) { ?>
                            <li class="flex-item">
                                <span class="txt-h-medium txt-lg"><?php echo esc_attr( $guests ); ?></span> <span class="text-uppercase">Guests</span>
                            </li>
                        <?php } ?>
                        <?php if($bedrooms) { ?>
                        <li class="flex-item">
                            <span class="txt-h-medium txt-lg"><?php echo esc_attr( $bedrooms ); ?></span> <span class="text-uppercase">Beds</span>
                        </li>
                        <?php } ?>
                        <?php if($bedrooms) { ?>
                        <li class="flex-item">
                            <span class="txt-h-medium txt-lg"><?php echo esc_attr( $bedrooms ); ?></span> <span class="text-uppercase">Rooms</span>
                        </li>
                         <?php } ?>
                        <?php if($bathrooms) { ?>
                        <li class="flex-item">
                            <span class="txt-h-medium txt-lg"><?php echo esc_attr( $bathrooms ); ?></span> <span class="text-uppercase">Baths</span>
                        </li>
                         <?php } ?>
                        <?php if($toilet) { ?>
                        <li class="flex-item">
                            <span class="txt-h-medium txt-lg"><?php echo esc_attr( $toilet ); ?></span> <span class="text-uppercase">Toilets</span>
                        </li>
                         <?php } ?>
                        <?php if(houzez_property_size( 'after' )) { ?>
                        <li class="flex-item">
                            <span class="txt-h-medium txt-lg"><?php echo houzez_property_size( 'after' ); ?></span> <span class="text-uppercase">Area</span>
                        </li>
                         <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- .row-user-interactions-->
           
            <div class="row row-user-interactions">
                <div class="col-sm-6">
                    <?php 
                    $post_id=get_the_id();    
                    $comment_data=wp_count_comments($post_id); 
                    $count_comment= $comment_data->total_comments;
                    
                    ?>  
                    <ul class="list-inline">
                        <li>
                            <div>
                                <?php for($i=1; $i<5; $i++) {?>
                                <i class="tz-ratting-full"></i>
                                <?php } ?>
                                <i class="tz-ratting-empty"></i>
                            </div>
                        </li>
                        <li>
                            <span class="txt-p-light"><?php echo $count_comment; ?> reviews</span>  
                            <a href="#property-reviews" class="txt-h-light txt-info"><span class="waves-effect">See reviews</span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <ul class="list-inline">
                        <?php $prop_detail_share = houzez_option('prop_detail_share'); 
                        $print_property_button = houzez_option('print_property_button');
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                        $twitter_user = '';
                        if( $prop_detail_share != 0 ) { ?>
                            <li class="share-social">   
                                <ul>
                                    <li><a href="whatsapp://send?text=<?php echo site_url(); ?>"  data-action="share/whatsapp/share" class="no-style" role="button"><i class="tz-whatsapp waves-effect waves-circle"></i></a></li>
                                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink())?>" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;" class="no-style" role="button"><i class="tz-facebook waves-effect waves-circle"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>&via=<?php echo urlencode($twitter_user ? $twitter_user : get_bloginfo('name')) ?>" onclick="if(!document.getElementById(\'td_social_networks_buttons\')){window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;}" class="no-style" role="button"><i class="tz-twitter waves-effect waves-circle"></i></a></li>
                                    <li><a href="http://plus.google.com/share?url=<?php echo urlencode( get_permalink() ) ?>" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;" class="no-style" role="button"><i class="tz-googleplus waves-effect waves-circle"></i></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink() ) ?>&title=<?php echo urlencode( get_the_title() ) ?>&source=<?php echo urlencode( home_url( '/' ) )?> " onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;" class="no-style" role="button"><i class="tz-linkedin waves-effect waves-circle"></i></a></li>
                                    <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink() ) ?>&amp;media=<?php echo (!empty($image[0]) ? $image[0] : '') ?>" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;" class="no-style" role="button"><i class="tz-pinterest waves-effect waves-circle"></i></a></li>
                                    <li><a href="mailto:example.com?subject=<?php echo urlencode( get_the_title() )?>&body=<?php echo urlencode( get_permalink() ) ?>" class="no-style" role="button"><i class="tz-mail  waves-effect waves-circle"></i></a></li>
                                </ul>
                            </li>
                        <li class="btn-share-social"><a href="#!" id="share-btn" class="no-style" role="button"><i class="tz-share waves-effect waves-circle"></i></a></li>
                        <?php } ?>
                        <?php if( $print_property_button != 0 ) { ?>
                        <li class="print-btn"><a href="#!" class="no-style" role="button"><i class="tz-printer waves-effect waves-circle houzez-print" data-propid="<?php echo esc_attr( $post->ID );?>"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <!-- .row-description-->
            <div class="row row-description">
                <div class="col-xxs-12 txt-md">
                    <?php 
                    $content = get_the_content();
                    if(strlen($content) > 680) {
                        $trimmed_content = substr( $content, 0 , 680);
                        $trimmed_content2 = substr( $content, 680);
                        echo "<p>".$trimmed_content."</p>"; ?>
                        <div class="collapse" id="collapse-description" aria-expanded="true" style="">
                           <?php echo  "<p>".$trimmed_content2."</p>"; ?>
                        </div>
                        <a class="txt-h-light txt-info pull-right" data-toggle="collapse" href="#collapse-description" aria-expanded="false"> 
                            <span class="waves-effect">Read more <i class="tz-chevron-down-sm"></i></span>
                            <span class="waves-effect">Read less <i class="tz-chevron-up-sm"></i></span>
                        </a>
                    <?php } else {
                        echo "<p>".$content."</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="property-detail-beaches">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <ul class="flex-container txt-md">
                            <?php 
                            // echo $current_area = houzez_option('measurement_unit');
                            $area_prefix = houzez_option('area_prefix_default');
                            if($fave_property_sea) { ?>
                                <li class="flex-item">
                                    <p><?php echo esc_attr( $fave_property_sea ); echo "&nbsp;"; echo esc_attr($area_prefix); ?></p>
                                    <p class="text-uppercase">Distance to the sea</p>
                                    <p class="txt-info">Straight line</p>
                                </li>
                            <?php } 
                            ?>
                            <li class="flex-item">
                                <p><?php echo esc_attr( $near_beach1 ); echo "&nbsp;"; echo esc_attr($area_prefix); ?></p>
                                <a href="#!" target="_blank"><span></span> <?php echo $near_beach1_name; ?></a>
                            </li>
                            <li class="flex-item">
                                <p><?php echo esc_attr( $near_beach2 ); echo "&nbsp;"; echo esc_attr($area_prefix);?> </p>
                                <a href="#!" target="_blank"><span></span> <?php echo $near_beach2_name; ?></a>
                                <p class="txt-info">Nearby beaches</p>
                            </li>
                            <li class="flex-item">
                                <p><?php echo esc_attr( $near_beach3 ); echo "&nbsp;"; echo esc_attr($area_prefix); ?></p>
                                <a href="#!" target="_blank"><span></span> <?php echo $near_beach3_name; ?></a>
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
                        <li class="flex-item"><p>Area <span><?php echo houzez_property_size( 'after' ); ?></span></p></li>
                        <li class="flex-item"><p>Land area <span> <?php echo houzez_property_land_area( 'after' ); ?></span></p></li>
                    </ul>
                </div>
            </div>
        </section>

        <!--OTHER FEATURES-->
        <section class="container property-detail-other-features">
            <hr>
            <div class="row">
                <div class="col-xxs-12 sub-features">
                    <h2 class="txt-lg text-center">Features</h2>
                    <div class="flex-container flex-wrap txt-md text-center">
                        <?php
                        // $tax_terms = get_the_terms( get_the_ID(), 'property_feature' ); 
                        $terms = get_terms( array(
                            'taxonomy' => 'property_feature',
                            'hide_empty' => false,
                            'number' => 6,
                            'offset' => 0
                        ) );         
                        ?>
                        <?php foreach ($terms as $key => $cat_feature) { ?>
                            <?php $term_id= $cat_feature->term_id;  ?> 
                            <?php $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); ?>               
                            <div class="feature_<?php echo $term_id; ?>">
                                <i class="<?php echo $get_feature_icons; ?>"></i>
                                <p class="title"><?php echo $cat_feature->name; ?></p>
                            </div>
                        <?php } ?>   
                    </div>
                </div>
            </div>
            <div class="row collapse" id="collapse-other-features">
                 <div class="flex-container flex-wrap txt-md text-center">
                        <?php 
                        $terms = get_terms( array(
                            'taxonomy' => 'property_feature',
                            'hide_empty' => false,
                            'number' => 1000,
                            'offset' => 6
                        ) );         
                        ?>
                        <?php foreach ($terms as $key => $cat_feature) { ?>
                            <?php $term_id= $cat_feature->term_id;  ?> 
                            <?php $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); ?>               
                            <div class="feature_<?php echo $term_id; ?>">
                                <i class="<?php echo $get_feature_icons; ?>"></i>
                                <p class="title"><?php echo $cat_feature->name; ?></p>
                            </div>
                        <?php } ?>   
                    </div>
                <!-- Home Appliance Services -->
                <div class="col-xxs-12 sub-services">
                    <h2 class="txt-lg text-center">Services</h2>
                    <div class="flex-container flex-wrap txt-md text-center">
                        <?php 
                        $tax_terms = get_the_terms( get_the_ID(), 'services' );
                        // $terms = get_terms( array(
                        //     'taxonomy' => 'services',
                        //     'hide_empty' => false,
                        // ));         
                        ?>
                        <?php foreach ($tax_terms as $key => $cat_feature) { ?>
                            <?php $term_id= $cat_feature->term_id;  ?> 
                            <?php $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); 
                            $cat_meta = get_option( "category_$term_id");
                            ?>               
                            <div class="feature_<?php echo $term_id; ?>">
                                <i class="<?php echo $cat_meta["icon"]; ?>"></i>
                                <p><?php echo $cat_feature->name; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <!-- Home Appliance Sub-section -->
                <div class="col-xxs-12 sub-appliances">
                    <h2 class="txt-lg text-center">Featured Home Appliances</h2>
                    <div class="flex-container flex-wrap txt-md text-center">
                        <?php 
                        $tax_terms = get_the_terms( get_the_ID(), 'home_appliances' );
                        // $terms = get_terms( array(
                        //     'taxonomy' => 'home_appliances',
                        //     'hide_empty' => false,
                        // ) );         
                        ?>                      
                        <?php foreach ($tax_terms as $key => $cat_feature) { ?>
                            <?php $term_id= $cat_feature->term_id;  ?> 
                            <?php 
                            $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); 
                            $cat_meta = get_option( "category_$term_id");
                            ?>               
                            <div class="feature_<?php echo $term_id; ?>">
                                <i class="<?php echo $cat_meta["icon"]; ?>"></i>
                                <p><?php echo $cat_feature->name; ?></p>
                            </div>
                        <?php } ?>                      
                    </div>
                </div>
            </div>
            <a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#collapse-other-features" aria-expanded="false">
                <span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
                <span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>                        
            </a>
        </section> <!-- /container-->

        <?php if($rules_setting!="disable"){ ?>
        <section class="container property-detail-rules">
            <hr>
            <div class="row">
                <div class="col-xxs-12">
                    <h2 class="txt-lg text-center">Rules</h2>
                    <ul class="flex-container flex-wrap txt-md">
                        <li class="flex-item">
                            <p>Pets <?php if($rules_pets_enable=="allowed") { echo "Allowed"; } else { echo "Not Allowed"; } ?></p>
                        </li>
                        <li class="flex-item">
                            <p><?php if($rules_security_deposit=="no") { echo "Security deposit isn't required"; } else { echo "Security deposit is required"; } ?> </p>
                        </li>
                    </ul>
                    <div class="row collapse" id="collapse-other-rules">
                        <ul class="flex-container flex-wrap txt-md">
                            <?php foreach ($own_rules_repeater as $key => $value) { ?>
                                <li class="flex-item"><?php echo $value['fave_new_rules']; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                    <a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#collapse-other-rules" aria-expanded="false">
                        <span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
                        <span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>
                    </a>
                </div>
            </div>    
        </section>
   
    <?php }   ?>





    <!-- old -->

    <!-- <h3 class="detail-sub-title"><span><?php esc_html_e( 'Detail', 'houzez' ); ?></span></h3>
    <ul class="detail-amenities-list">
        <?php if( !empty( $prop_id ) && $hide_detail_prop_fields['prop_id'] != 1 ) { ?>
        <li class="media">
            <?php if( !empty($icon_prop_id) ) { ?>
            <div class="media-left media-middle"><img src="<?php echo esc_url($icon_prop_id); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php esc_html_e( 'Property ID', 'houzez' ); ?><br> <?php echo houzez_propperty_id_prefix( $prop_id ); ?> </div>
        </li>
        <?php } ?>

        <?php if( !empty( $bedrooms ) && $hide_detail_prop_fields['bedrooms'] != 1 ) { ?>
        <li class="media">
            <?php if( !empty($icon_bedrooms) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_bedrooms); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body">  <?php echo esc_attr( $bedrooms ); ?> <br> <?php esc_html_e( 'Bedrooms', 'houzez' ); ?>  </div>
        </li>
        <?php } ?>

        <?php if( !empty( $bathrooms ) && $hide_detail_prop_fields['bathrooms'] != 1 ) { ?>
        <li class="media">
            <?php if( !empty($icon_bathrooms) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_bathrooms); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php echo esc_attr( $bathrooms ); ?> <br> <?php esc_html_e( 'Bathrooms', 'houzez' ); ?> </div>
        </li>
        <?php } ?>

        <?php if( !empty( $prop_size ) && $hide_detail_prop_fields['area_size'] != 1 ) { ?>
        <li class="media">
            <?php if( !empty($icon_prop_size) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_prop_size); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php esc_html_e( 'Property Size', 'houzez' ); ?><br> <?php echo houzez_property_size( 'after' ); ?> </div>
        </li>
        <?php } ?>

        <?php if( !empty( $prop_land ) && $hide_detail_prop_fields['land_area'] != 1 ) { ?>
            <li class="media">
                <?php if( !empty($icon_prop_land) ) { ?>
                    <div class="media-left media-middle"><img src="<?php echo esc_url($icon_prop_land); ?>" width="50" height="50" alt="Icon"></div>
                <?php } ?>
                <div class="media-body"> <?php esc_html_e( 'Land Size', 'houzez' ); ?><br> <?php echo houzez_property_land_area( 'after' ); ?> </div>
            </li>
        <?php } ?>

        <?php if( !empty( $garage ) && $hide_detail_prop_fields['garages'] != 1 ) { ?>
        <?php if( !empty( $garage_size ) ) { ?>
        <li class="media">
            <?php if( !empty($icon_garage_size) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_garage_size); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php esc_html_e( 'Garage Size', 'houzez' ); ?><br> <?php echo esc_attr( $garage_size ); ?> </div>
        </li>
        <?php } ?>

        <li class="media">
            <?php if( !empty($icon_garage) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_garage); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php echo esc_attr( $garage ); ?> <br><?php esc_html_e( 'Garage', 'houzez' ); ?> </div>
        </li>
        <?php } ?>


        <?php if( !empty( $year_built ) && $hide_detail_prop_fields['year_built'] != 1 ) { ?>
        <li class="media">
            <?php if( !empty($icon_year) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_year); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php esc_html_e( 'Year Built', 'houzez' ); ?><br> <?php echo esc_attr( $year_built ); ?> </div>
        </li>
        <?php } ?>
    </ul> -->
    <?php } ?>

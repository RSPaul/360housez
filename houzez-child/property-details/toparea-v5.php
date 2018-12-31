<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 05/04/17
 * Time: 5:46 PM
 */
global $post, $property_map, $property_streetView, $prop_address, $prop_agent_email, $property_layout, $property_top_area, $map_in_section;

$size = 'houzez-toparea-v5';
$properties_images = rwmb_meta( 'fave_property_images', 'type=plupload_image&size='.$size, $post->ID );

$agent_display_option = get_post_meta( get_the_ID(), 'fave_agent_display_option', true );
$prop_agent_display = get_post_meta( get_the_ID(), 'fave_agents', true );
$prop_agent_num = $agent_num_call = $prop_agent_email = $gallery_view = $map_view = $street_view = '';

$enableDisable_agent_forms = houzez_option('agent_forms');

if( $prop_agent_display != '-1' && $agent_display_option == 'agent_info' ) {
    $prop_agent_id = get_post_meta( get_the_ID(), 'fave_agents', true );
    $prop_agent_email = get_post_meta( $prop_agent_id, 'fave_agent_email', true );

} elseif( $agent_display_option == 'agency_info' ) {
    $prop_agency_id = get_post_meta( get_the_ID(), 'fave_property_agency', true );
    $prop_agent_email = get_post_meta( $prop_agency_id, 'fave_agency_email', true );

} elseif ( $agent_display_option == 'author_info' ) {
    $prop_agent_email = get_the_author_meta( 'email' );
}

$print_property_button = houzez_option('print_property_button');
$prop_detail_share = houzez_option('prop_detail_share');
$disable_favorite = houzez_option('prop_detail_favorite');

$prop_default_active_tab = houzez_option('prop_default_active_tab');
if( $prop_default_active_tab == "image_gallery" ) {
    $gallery_view = 'in active';
} elseif( $prop_default_active_tab == "map_view" ) {
    $map_view = 'in active';
} elseif( $prop_default_active_tab == "street_view" ) {
    $street_view = 'in active';
} else {
    $gallery_view = 'in active';
}
?>


<div class="property-detail-header">
    <div class="row">
        <div class="col-xxs-12">
            <div class="hd-wrapper flex-container" style="background: url('https://placeimg.com/1000/1000/arch')">
                <div class="header-info flex-container">
                    <?php 
                    $status = get_post_meta( get_the_ID(), 'fave_property_status', true );
                    $pro_type = get_the_terms(get_the_ID(), 'property_type');
                    $property_label = get_the_terms(get_the_ID(), 'property_label');
                    $ptype = ""; 
                    if(count($pro_type)) {
                        $ptype = $pro_type[0]->name;
                    }
                    ?>
                    <ul class="header-labels flex-container flex-wrap txt-h-medium text-uppercase">
                        <?php
                            if($property_label && count($property_label)) {
                                foreach ($property_label as $key => $value) {
                                    echo '<li class="label1 bg-label">'.$value->name.'</li>';
                                }
                            }
                        ?>              
                    </ul>
                    <h1 class="txt-h-light txt-header">
                        <?php the_title(); ?>
                    </h1>
                    <p class="header-type-status txt-h-medium txt-md txt-gray-1 text-uppercase">
                        <?php echo $ptype; ?> | <span class="txt-h-light"><?php echo esc_attr( $status ); ?></span>
                    </p>
                     <div class="gallery_directory">
                        <ul class="header-actions list-inline txt-lg ">
                            <li class="popup-trigger" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php esc_html_e( 'View Photos', 'houzez' ); ?>"> <a href="#gallery" class="bd-black waves-effect waves-color-1" data-toggle="tab">Photos</a></li>
                            <li class="custom_media"><a id="video" class="bd-black waves-effect waves-color-1" alt="<?php the_title(); ?> Video" href="javascript:void(0)">Video</a></li>
                            <li class="custom_media"><a id="360" class="bd-black waves-effect waves-color-1" alt="<?php the_title(); ?> 360 Tours" href="javascript:void(0)">360</a></li>
                        </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="property-detail-fixed-nav bg-white sticky-navbar" id="sticky_navbar">
    <!-- <div class="container-fluid"> -->
    <div class="row">
        <div class="col-xxs-12">
            <div class="fixed-inner-wrapp bg-black">
                <div class="flex-container">
                    <!--Previus Property-->
                    <?php
                    $prevPost = get_previous_post(false);
                    if($prevPost) {
                        $args = array(
                            'post_type' => 'property',
                            'posts_per_page' => 1,
                            'include' => $prevPost->ID
                        );
                        $prevPost = get_posts($args);
                        foreach ($prevPost as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="flex-item">
                                <a href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="right" title="Previous property"><i class="tz-chevron-left"></i></a>
                            </div>
                            <div class="flex-item">
                                <ul class="list-block flex-container">
                                    <!--Title-->
                                    <li>
                                        <span class="txt-h-medium txt-md txt-white"><?php the_title(); ?></span>
                                    </li>
                                    <!--Property Type-->
                                    <li>
                                        <span class="txt-h-medium txt-sm txt-gray-1 text-uppercase">Type</span>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            wp_reset_postdata();
                        } //end foreach
                    } // end if
                    ?>
                    <?php 
                        $nextPost = get_next_post(false);
                        if($nextPost) {
                            $args = array(
                                'post_type' => 'property',
                                'posts_per_page' => 1,
                                'include' => $nextPost->ID
                            );
                            $nextPost = get_posts($args);
                            foreach ($nextPost as $post) {
                                setup_postdata($post);
                                ?>
                                <div class="flex-item">
                                    <ul class="list-inline flex-container">
                                        <li>
                                            <a href="#contact-agent" class="btn waves-effect waves-color-1 z-depth-0 bd-white">Contact an Agent</a>
                                        </li>
                                        <li>
                                            <a href="#online-booking" class="btn waves-effect waves-color-1 z-depth-0 bd-gradient">Online Booking</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Next Property-->
                                <div class="flex-item">
                                    <a href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="left" title="Next property"><i class="tz-chevron-right"></i></a>
                                </div>
                                <?php
                                wp_reset_postdata();
                            } //end foreach
                        } // end if
                        ?>                            
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
</div>

<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("sticky_navbar");
    var sticky = header.offsetTop;

    function myFunction() {
        console.log('here ', sticky , window.pageYOffset);
      if (window.pageYOffset > 740) {
        header.classList.add("sticky_sec");
      } else {
        header.classList.remove("sticky_sec");
      }
    }
</script> 


<!--start detail top-->
<!-- <div class="detail-top toparea-v5">

    <div class="container-fluid">
        <div class="row">
            <?php
            if( !empty($properties_images) ) { ?>
            <div class="detail-media detail-top-slider">
                <div class="tab-content">
                    <div id="gallery" class="tab-pane fade in active">
                                <span class="label-wrap visible-sm visible-xs">
                                    <?php get_template_part('template-parts/listing', 'status' ); ?>
                                </span>
                        <div class="detail-slider-main">
                            <div id="detail-slider" class="owl-carousel owl-theme">
                                <?php
                                foreach( $properties_images as $prop_image_id => $prop_image_meta ) {
                                    echo '<div class="item">';
                                    echo '<img src="'.esc_url( $prop_image_meta['url'] ).'">';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php if( $map_in_section != 1 ) { ?>
                        <?php if( $property_map != 0 ) { ?>
                            <div id="singlePropertyMap" class="tab-pane fade <?php echo esc_attr( $map_view );?>">
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

                        <?php if( $property_streetView != 'hide' ) { ?>
                            <div id="street-map" class="tab-pane fade <?php echo esc_attr( $street_view );?>"></div>
                        <?php } ?>
                    <?php } ?>

                </div>

                <?php get_template_part( 'property-details/media', 'tabs' ); ?>
            </div>
            <?php } ?>

            <div class="header-detail header-detail-slider table-list">
                <div class="container">
                    <div class="header-left">
                        <?php get_template_part('inc/breadcrumb'); ?>

                        <div class="table-cell">
                            <h1>
                                <?php the_title(); ?>
                                <span class="label-wrap hidden-sm hidden-xs">
                                    <?php get_template_part('template-parts/listing', 'status' ); ?>
                                </span>
                            </h1>
                        </div>
                        <div class="table-cell v-align-middle">
                            <ul class="actions no-margin">
                                <?php if( $prop_detail_share != 0 ) { ?>
                                    <li class="share-btn"><?php get_template_part( 'template-parts/share' ); ?></li>
                                <?php } ?>
                                <?php if( $disable_favorite != 0 ) { ?>
                                    <li class="fvrt-btn"><?php get_template_part( 'template-parts/favorite' ); ?></li>
                                <?php } ?>
                                <?php if( $print_property_button != 0 ) { ?>
                                    <li class="print-btn">
                                        <span id="houzez-print" data-placement="right" data-toggle="tooltip" data-original-title="<?php esc_html_e('Print', 'houzez'); ?>" data-propid="<?php echo esc_attr( $post->ID );?>"><i class="fa fa-print"></i></span>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <?php
                        if( !empty( $prop_address )) {
                            echo '<address class="property-address">'.esc_attr( $prop_address ).'</address>';
                        } ?>
                    </div>
                    <div class="widget-contact price-form">
                        <div class="price-form-head clearfix">
                            <?php echo houzez_listing_price_v5(); ?>
                        </div>
                        <div class="widget-body">
                            <?php if( !empty( $prop_agent_email ) && $enableDisable_agent_forms != 0 ) { ?>
                                <div class="form-small">
                                    <?php get_template_part( 'property-details/agent', 'form' ); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--end detail top-->

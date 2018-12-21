<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 27/09/16
 * Time: 5:03 PM
 * Since v1.4.0
 */
global $floor_plans;

$icon_rooms = houzez_option('icon_rooms', false, 'url' );
$icon_bathrooms = houzez_option('icon_bathrooms', false, 'url' );
$icon_prop_size = houzez_option('icon_prop_size', false, 'url' );

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
                                    <h2 class="floor-title"><?php echo esc_attr( $plan['fave_plan_title'] ); ?></h2>
                                    <!-- <h3 class="floor-price"> <?php esc_html_e( 'Price:', 'houzez' ); ?> <?php echo houzez_get_property_price( $plan['fave_plan_price'] ).$price_postfix; ?> </h3> -->
                                </div>

                                <?php if( !empty( $plan['fave_plan_description'] ) ) { ?>
                                    <p><?php echo esc_attr( $plan['fave_plan_description'] ); ?></p>
                                <?php } ?>

                               
                                    <ul class="floor-characteristics txt-p-light txt-md">
                                        <?php 
                                        $fave_property_land_postfix_area=get_post_meta( get_the_ID(), 'fave_property_size_prefix', true ); 
                                        $single_area_property = get_post_meta( get_the_ID(), 'fave_property_size', true );
                                        ?>

                                        <li><span class="txt-p-medium">Area</span> <span><?php echo esc_attr( $single_area_property ); ?> <?php echo esc_attr($fave_property_land_postfix_area); ?></span></li>
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
<?php } ?>
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
$price_policy_setting=get_post_meta(get_the_ID(), 'wp_price_policy', true);
$price_section_title=get_post_meta(get_the_ID(),'wp_price_section_title', true);
$price_content=get_post_meta(get_the_ID(), 'wp_price_content', true);
global $post;
$booking_shortcode = get_post_meta($post->ID, 'fave_booking_shortcode', true);
?>
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

<?php if($price_policy_setting!="disable"){ ?>
    <section class="container property-detail-pricing-policy">
        <hr>
        <div class="row">
            <div class="col-xxs-12">
                <h2 class="txt-lg text-center">Pricing policy</h2>
                <div class="pricing-policy-code">
                    <?php 
                    $content = $price_content;
                    if(strlen($content) > 680) {
                        $trimmed_content = substr( $content, 0 , 680);
                        $trimmed_content2 = substr( $content, 680);
                        echo "<p>".$trimmed_content."</p>"; ?>
                        <div class="collapse" id="collapse-privacy-con" aria-expanded="true" style="">
                           <?php echo  "<p>".$trimmed_content2."</p>"; ?>
                        </div>
                        <a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#collapse-privacy-con" aria-expanded="false"> 
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
    </section> <!-- /container-->
<?php } ?>

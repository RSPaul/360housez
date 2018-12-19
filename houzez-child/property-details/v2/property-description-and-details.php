<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 27/09/16
 * Time: 4:52 PM
 */
global $post_meta_data;

$prop_id = get_post_meta( get_the_ID(), 'fave_property_id', true );
$prop_price = get_post_meta( get_the_ID(), 'fave_property_price', true );
$prop_size = get_post_meta( get_the_ID(), 'fave_property_size', true );
$prop_land = get_post_meta( get_the_ID(), 'fave_property_land', true );
$prop_land_postfix = get_post_meta( get_the_ID(), 'fave_property_postfix', true );
$bedrooms = get_post_meta( get_the_ID(), 'fave_property_bedrooms', true );
$bathrooms = get_post_meta( get_the_ID(), 'fave_property_bathrooms', true );
$year_built = get_post_meta( get_the_ID(), 'fave_property_year', true );
$garage = get_post_meta( get_the_ID(), 'fave_property_garage', true );
$garage_size = get_post_meta( get_the_ID(), 'fave_property_garage_size', true );
$additional_features_enable = get_post_meta( get_the_ID(), 'fave_additional_features_enable', true );
$additional_features = get_post_meta( get_the_ID(), 'additional_features', true );
$prop_details = false;
$documents_download = houzez_option('documents_download');

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

$rules_setting=get_post_meta(get_the_ID(), 'rules_enable', true);
$rules_section_title=get_post_meta(get_the_ID(), 'rules_section_title', true);
$rules_pets_enable=get_post_meta(get_the_ID(), 'rules_pets_enable', true);
$rules_security_deposit=get_post_meta(get_the_ID(),'rules_security', true);
$own_rules_repeater=get_post_meta(get_the_ID(), 'own_rules', true);



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

?>


<?php
    if( $prop_details ) { ?>
    <div class="property_details">
    <h3 class="detail-sub-title"><span><?php esc_html_e( 'Detail', 'houzez' ); ?></span></h3>
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

        <?php
            //Custom Fields
            if(class_exists('Houzez_Fields_Builder')) {
            $fields_array = Houzez_Fields_Builder::get_form_fields(); 

                if(!empty($fields_array)) {
                    foreach ( $fields_array as $value ) {
                        $data_value = get_post_meta( get_the_ID(), 'fave_'.$value->field_id, true );
                        $field_title = $value->label;
                        $icon = $value->options;
                        if (function_exists('icl_translate') ){
                            $field_title = icl_translate('houzez_cfield', 'houzez_custom_field_'.sanitize_title($field_title), $field_title );
                                              
                        }
                        if(!empty($data_value) && $hide_detail_prop_fields[$value->field_id] != 1) {
                            echo '<li class="media '.$value->field_id.'">';
                            if(!empty($icon)) {
                                echo '<div class="media-left media-middle"><img src="'.esc_url($icon).'" width="50" height="50" alt="Icon"></div>';
                            }
                            echo '<div class="media-body">'.esc_attr( $data_value ).'<br>'.$field_title.'</div>';
                            echo '</li>';
                        }
                    }
                }
            }
        ?>

        <?php if( !empty( $year_built ) && $hide_detail_prop_fields['year_built'] != 1 ) { ?>
        <li class="media">
            <?php if( !empty($icon_year) ) { ?>
                <div class="media-left media-middle"><img src="<?php echo esc_url($icon_year); ?>" width="50" height="50" alt="Icon"></div>
            <?php } ?>
            <div class="media-body"> <?php esc_html_e( 'Year Built', 'houzez' ); ?><br> <?php echo esc_attr( $year_built ); ?> </div>
        </li>
        <?php } ?>
    </ul>
    <?php } ?>

    <?php if( $hide_detail_prop_fields['updated_date'] != 1 ) { ?>
        <p class="update-text"><?php esc_html_e( 'Updated on', 'houzez' ); ?> <?php the_modified_time('F j, Y'); ?> <?php esc_html_e( 'at', 'houzez' ); ?> <?php the_modified_time('g:i a'); ?> </p>
    <?php } ?>
</div>




<?php if( $property_reviews != 0 ) { ?>
    <?php if($review_setting=="yes" && $single_top_area=="v2"){ ?>
    <div class="count_review">
        <?php 
        $post_id=get_the_id();    
        $comment_data=wp_count_comments($post_id); 
        $count_comment= $comment_data->total_comments;
        ?>  

        <?php for($i=1; $i<5; $i++) {?>
            <i class="fa fa-star"></i>
        <?php } ?>
        <span><?php echo $count_comment; ?> Reviews <a id="scroll_down" href="javascript:void(0)">See Reviews</a></span>
    </div>
    <?php } ?>
<?php } ?>


<div class="property-description detail-block">
    <div class="detail-title">
        <h2 class="title-left"><?php esc_html_e( 'Description', 'houzez' ); ?></h2>
    </div>
    <?php the_content(); ?>

    <?php if( !empty($post_meta_data['fave_attachments']) ): ?>
        <div class="detail-title-inner">
            <h4 class="title-inner"><?php esc_html_e( 'Property Documents', 'houzez' ); ?></h4>
        </div>
        <ul class="document-list">

            <?php foreach( $post_meta_data['fave_attachments'] as $attachment_id ): ?>
                <?php $attachment_meta = houzez_get_attachment_metadata($attachment_id);?>
                <li>
                    <div class="pull-left">
                        <i class="fa fa-file-o"></i> <?php echo esc_attr( $attachment_meta->post_title ); ?>
                    </div>
                    <div class="pull-right">
                        <?php if( $documents_download == 1 ) {
                            if( is_user_logged_in() ) { ?>
                                <a href="<?php echo esc_url( $attachment_meta->guid ); ?>" download><?php esc_html_e( 'DOWNLOAD', 'houzez' ); ?></a>
                            <?php } else { ?>
                                <a href="#" data-toggle="modal" data-target="#pop-login"><?php esc_html_e( 'DOWNLOAD', 'houzez' ); ?></a>
                            <?php } ?>
                        <?php } else { ?>
                            <a href="<?php echo esc_url( $attachment_meta->guid ); ?>" download><?php esc_html_e( 'DOWNLOAD', 'houzez' ); ?></a>
                        <?php } ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<?php if($near_distance1!="" || $near_distance2!="" || $near_distance3 !=""){ ?>
<div class="near_beach_distance">
    <ul>
        <li>
            <p>0 m</p>
            <p>Distance to the sea</p>
        </li>
        <?php if($near_distance1!=""){ ?>
            <li>
                <p><?php echo $near_distance1; ?> <?php echo $near_size_posfix1; ?></p>
                <p>Distance to the sea</p>
            </li>
        <?php } ?>
        <?php if($near_distance2!=""){ ?>
            <li>
                <p><?php echo $near_distance2; ?> <?php echo $near_size_posfix2; ?></p>
                <p>Distance to the sea</p>
            </li>
        <?php } ?>
        <?php if($near_distance3!=""){ ?>
            <li>
                <p><?php echo $near_distance3; ?> <?php echo $near_size_posfix3; ?></p>
                <p>Distance to the sea</p>
            </li>
        <?php } ?>        
    </ul>
</div>
<?php } ?>



<div class="other_features">
    <?php if($single_area_property!="" || $single_area_features!=""){ ?>
    <div class="property_data area_data">
        <h2>Area</h2>
        <ul>
            <?php if($single_area_property!=""){ ?>
                <li>Area <?php echo $single_area_property ." ". $fave_property_land_postfix_area; ?></li>
            <?php } ?>

            <?php if($single_area_features!=""){ ?>
                <li>Land Area <?php echo $single_area_features ." ". $fave_property_land_postfix_features; ?> </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>
    <div class="property_data features_data">
        <h2>Features</h2>
        <?php 
        $terms = get_terms( array(
            'taxonomy' => 'property_feature',
            'hide_empty' => false,
        ) );         
        ?>

        <ul>
            <?php foreach ($terms as $key => $cat_feature) { ?>
                <?php $term_id= $cat_feature->term_id;  ?> 
                <?php $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); ?>               
                <li class="feature_<?php echo $term_id; ?>">
                    <span class="icons"><i class="fa fa-<?php echo $get_feature_icons; ?>"></i></span>
                    <span class="title"><?php echo $cat_feature->name; ?></span>
                </li>
            <?php } ?>
        </ul>
        
    </div>
    <div class="property_data rules_data">
        <h2>Services</h2>
        <?php 
        $terms = get_terms( array(
            'taxonomy' => 'services',
            'hide_empty' => false,
        ) );         
        ?>

        <ul>
            <?php foreach ($terms as $key => $cat_feature) { ?>
                <?php $term_id= $cat_feature->term_id;  ?> 
                <?php $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); ?>               
                <li class="feature_<?php echo $term_id; ?>">
                    <span class="icons"><i class="fa fa-<?php echo $get_feature_icons; ?>"></i></span>
                    <span class="title"><?php echo $cat_feature->name; ?></span>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="property_data rules_data">
        <h2>Featured Home Appliances</h2>
        <?php 
        $terms = get_terms( array(
            'taxonomy' => 'home_appliances',
            'hide_empty' => false,
        ) );         
        ?>

        <ul>
            <?php foreach ($terms as $key => $cat_feature) { ?>
                <?php $term_id= $cat_feature->term_id;  ?> 
                <?php $get_feature_icons=get_tax_meta($term_id, 'fave_prop_features_icon'); ?>               
                <li class="feature_<?php echo $term_id; ?>">
                    <span class="icons"><i class="fa fa-<?php echo $get_feature_icons; ?>"></i></span>
                    <span class="title"><?php echo $cat_feature->name; ?></span>
                </li>
            <?php } ?>
        </ul>
    </div>

    <?php if($rules_setting!="disable"){ ?>

    <div class="property_data rules_data">
        <h2><?php echo $rules_section_title; ?></h2>        
        <ul class="static_rules">
            <li><span class="title">Pets <?php if($rules_pets_enable=="allowed") { echo "Allowed"; } else { echo "Not Allowed"; } ?></span></li>
            <li><span class="title"><?php if($rules_security_deposit=="no") { echo "No"; } else { echo "Yes"; } ?> security deposit</span></li>
        </ul>  

        <?php if(!empty($own_rules_repeater)){ ?>
            <ul class="repeater_own_rules">
                <?php foreach ($own_rules_repeater as $key => $own_rep_rules) { ?>
                    <li>                        
                        <span><?php echo $own_rep_rules['fave_new_rules']; ?></span>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>

    </div>
    <?php }   ?>

</div>



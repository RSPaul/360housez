<?php
global $post, $current_user, $prop_images;
wp_get_current_user();

$key = '';
$userID      =   $current_user->ID;
$fav_option = 'houzez_favorites-'.$userID;
$fav_option = get_option( $fav_option );
if( !empty($fav_option) ) {
    $key = array_search($post->ID, $fav_option);
}

if( is_singular('property')) {
    $class_tooltip_placement = 'right';
} else {
    $class_tooltip_placement = 'top';
}

if( $key != false || $key != '' ) {
    $fav_class = 'saved';
} else {
    $fav_class = '';
}
?>
<!-- Use class .saved when user save a property and change tooltip text-->
<a role="button" class="<?php echo $fav_class; ?> card-save no-style add_fav" title="Save" data-toggle="tooltip" data-placement="left"  data-propid="<?php echo intval( $post->ID ); ?>">
	<i class="tz-treasure-full waves-effect waves-circle"></i>
</a>

<!-- <span class="add_fav" data-placement="<?php echo esc_attr($class_tooltip_placement); ?>" data-toggle="tooltip" data-original-title="<?php esc_html_e('Favorite', 'houzez'); ?>" data-propid="<?php echo intval( $post->ID ); ?>"><i class="<?php echo esc_attr( $fav_class ); ?>"></i></span> -->


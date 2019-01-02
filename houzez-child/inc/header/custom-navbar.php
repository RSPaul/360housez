<?php

class WP_houzez_walker_nav_menu extends Walker_Nav_menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $object      = $item->object;
    	$type        = $item->type;
    	$title       = $item->title;
    	$description = $item->description;
    	$permalink   = $item->url;

        $active_class = '';
        $anchor_active = '';
        if( in_array('current-menu-item', $item->classes) ) {
            $active_class = 'active';
            $anchor_active = 'waves-effect';
            // $anchor_active = 'dropdown-trigger bd-gradient waves-effect';
        }

        $dropdown_class = '';
        $dropdown_link_class = '';
        if( $args->walker->has_children && $depth == 0 ) {
            $dropdown_class = 'dropdown';
            $dropdown_link_class = 'dropdown-toggle';
        }

        $output .= "<li class='nav-item $active_class $dropdown_class " .  implode(" ", $item->classes) . "'>";


        if( $args->walker->has_children && $depth == 0 ) {
            $output .= '<a href="' . esc_url($permalink) . '" class="'. $anchor_active.' nav-link ' . $dropdown_link_class . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        }
        else {
            $output .= '<a href="' . esc_url($permalink) . '" class="'. $anchor_active.' nav-link">';
        }

        $output .= $title;

        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }

        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $current_user, $houzez_local;
wp_get_current_user();
$userID  =  $current_user->ID;
$first_name  =  $current_user->first_name;
$last_name  =  $current_user->last_name;
$display_name = $current_user->display_name;

//$user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $userID );
$author_picture_id      =   get_the_author_meta( 'fave_author_picture_id' , $userID );
$user_custom_picture = wp_get_attachment_image_src( $author_picture_id, array( 270, 270 ) );
$user_custom_picture = $user_custom_picture[0];

$header_type = houzez_option('header_style');

if( !empty($first_name) && !empty($last_name) ) {
    $display_name = $first_name.' '.$last_name;
}

if( empty( $user_custom_picture )) {
    $user_custom_picture = get_template_directory_uri().'/images/profile-avatar.png';
}

$dash_profile_link = houzez_get_template_link_2('template/user_dashboard_profile.php');
$dashboard_listings = houzez_get_template_link_2('template/user_dashboard_properties.php');
$dashboard_add_listing = houzez_get_template_link_2('template/submit_property.php');
$dashboard_favorites = houzez_get_template_link_2('template/user_dashboard_favorites.php');
$dashboard_search = houzez_get_template_link_2('template/user_dashboard_saved_search.php');
$dashboard_invoices = houzez_get_template_link_2('template/user_dashboard_invoices.php');
$dashboard_msgs = houzez_get_template_link_2('template/user_dashboard_messages.php');
$dashboard_membership = houzez_get_template_link_2('template/user_dashboard_membership.php');
$dashboard_gdpr = houzez_get_template_link_2('template/user_dashboard_gdpr.php');
$dashboard_seen_msgs = add_query_arg( 'view', 'seen', $dashboard_msgs );
$dashboard_unseen_msgs = add_query_arg( 'view', 'unseen', $dashboard_msgs );
$home_link = home_url('/');
$enable_paid_submission = houzez_option('enable_paid_submission');

$header_create_listing_template = houzez_get_template_link('template/submit_property.php');
$create_listing_button_required_login = houzez_option('create_listing_button');
$create_lisiting_enable = houzez_option('create_lisiting_enable');

$home_link = home_url('/');

$ac_profile = $ac_props = $ac_add_prop = $ac_fav = $ac_search = $ac_invoices = $ac_msgs = $ac_mem = $ac_gdpr = '';
if( is_page_template( 'template/user_dashboard_profile.php' ) ) {
    $ac_profile = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_properties.php' ) ) {
    $ac_props = 'class=active';
} elseif ( is_page_template( 'template/submit_property.php' ) ) {
    $ac_add_prop = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_saved_search.php' ) ) {
    $ac_search = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_favorites.php' ) ) {
    $ac_fav = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_invoices.php' ) ) {
    $ac_invoices = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_messages.php' ) ) {
    $ac_msgs = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_membership.php' ) ) {
    $ac_mem = 'class=active';
} elseif ( is_page_template( 'template/user_dashboard_gdpr.php' ) ) {
    $ac_gdpr = 'class=active';
}

$agency_agents = add_query_arg( 'agents', 'list', $dash_profile_link );
$agency_agent_add = add_query_arg( 'agent', 'add_new', $dash_profile_link );

$all = add_query_arg( 'prop_status', 'all', $dashboard_listings );
$approved = add_query_arg( 'prop_status', 'approved', $dashboard_listings );
$pending = add_query_arg( 'prop_status', 'pending', $dashboard_listings );
$expired = add_query_arg( 'prop_status', 'expired', $dashboard_listings );
$draft = add_query_arg( 'prop_status', 'draft', $dashboard_listings );
$ac_approved = $ac_pending = $ac_expired = $ac_all = $ac_draft = $ac_agents = $ac_agent_new = '';

if( isset( $_GET['prop_status'] ) && $_GET['prop_status'] == 'approved' ) {
    $ac_approved = 'class=active';

} elseif( isset( $_GET['prop_status'] ) && $_GET['prop_status'] == 'pending' ) {
    $ac_pending = 'class=active';

} elseif( isset( $_GET['prop_status'] ) && $_GET['prop_status'] == 'expired' ) {
    $ac_expired = 'class=active';
} elseif( isset( $_GET['prop_status'] ) && $_GET['prop_status'] == 'approved' ) {
    $ac_approved = 'class=active';
} elseif( isset( $_GET['prop_status'] ) && $_GET['prop_status'] == 'draft' ) {
    $ac_draft = 'class=active';
} else {
    $ac_all = 'class=active';
}

if( isset( $_GET['agents'] ) && $_GET['agents'] == 'list' ) {
    $ac_agents = 'class=active';
} elseif( isset( $_GET['agent'] ) && $_GET['agent'] == 'add_new' ) {
    $ac_agent_new = 'class=active';
}
       // print_r($args->menu->count);
            $output .= '</li>';

        if ($item->menu_order == $args->menu->count) {
            //$output .= '<li><a href="#">AAAA</a>';
           // $output .= get_template_part('inc/header/login', 'nav');
            if( is_user_logged_in() ) {
            $output .= '<li class="my-profile">
                                <a class="dropdown-trigger waves-effect waves-color-1"  data-toggle="dropdown" data-target="dropdown-4"><i class="tz-user"></i></a>
                                <ul id="dropdown-4" class="dropdown-content">
                                    <li class="active"><a href="' . esc_url($dash_profile_link) . '">My Profile</a></li>
                                    <li><a href="' . esc_url($dashboard_add_listing) . '">Add new property</a></li>
                                    <li><a href="' . esc_url($dashboard_favorites) . '">Favourite properties</a></li>
                                    <li><a href="' . esc_url($dashboard_search) . '">Saved searches</a></li>
                                    <li><a href="' . wp_logout_url(home_url('/')) . '">Log out</a></li>
                                </ul>
                            </li>';
            }else{
              $output .= '<li class="login-btn"><a class="waves-effect waves-color-1" href="#" data-toggle="modal" data-target="#pop-login">'.esc_html__( 'Login', 'houzez' ).'</a></li>';
            }
            //$output .= '</li>';
        }
    }

    function start_lvl( &$output, $depth=0, $args = array() ){
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "<ul class='dropdown-menu $submenu depth_$depth'>";
    }


}

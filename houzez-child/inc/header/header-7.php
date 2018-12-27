<?php
if(get_post_type() != "property") {
global $current_user;
wp_get_current_user();
$userID  =  $current_user->ID;
$user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $userID );
$header_layout = houzez_option('header_1_width');
if( empty($header_layout) ) { $header_layout = 'container'; }

$main_menu_sticky = houzez_option('main-menu-sticky');
$header_1_menu_align = houzez_option('header_1_menu_align');
$top_bar = houzez_option('top_bar');

if( $top_bar != 0 ) {
	get_template_part('inc/header/top', 'bar');
}
$menu_righ_no_user = '';
$create_lisiting_enable = houzez_option('create_lisiting_enable');
$header_login = houzez_option('header_login');
if( $header_1_menu_align == 'nav-right' && $header_login != 'yes' && $create_lisiting_enable != 1 ) {
	$menu_righ_no_user = 'menu-right-no-user';
}
$houzez_user_logout = '';
if( ! is_user_logged_in() ) {
	$houzez_user_logout = 'houzez-user-logout';
	if( $header_login != 'yes' ) {
		$houzez_user_logout = 'houzez-disabled-login';
	}
	if( $create_lisiting_enable != 1 ) {
		$houzez_user_logout = 'houzez-disabled-create-listing';
	}
	if( $header_login != 'yes' && $create_lisiting_enable != 1 ) {
		$houzez_user_logout = '';
	}
}
if( houzez_is_dashboard() ) {
	$header_layout = 'container-fluid';
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/bundle.min.css">

<!--start section header-->
<!--MAIN NAVBAR-->

	<div class="navbar main-navbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xxs-12">
					<nav class="flex-container">
						<div class="navbar-header">
							<button type="button" id="mobileNavBtn" class="sidenav-btn sidenav-trigger" data-target="sidenav-menu">
								<span class="bar top"></span>
								<span class="bar middle"></span>
								<span class="bar bottom"></span>	
							</button>
							<?php get_template_part('inc/header/logo'); ?>
							<span class="site-description txt-sm"> | <?php echo get_bloginfo('description');?></span>
						</div>
							<?php
							// Pages Menu
							if ( has_nav_menu( 'main-menu' ) ) :
								wp_nav_menu( array (
									'theme_location' => 'main-menu',
									'container' => '',
									'container_class' => '',
									'menu_class' => 'navbar-nav flex-container',
									'menu_id' => 'main-nav',
									'depth' => 4,
									'walker' => new WP_houzez_walker_nav_menu()
								));
							endif;
							?>
							<?php /* if( class_exists('Houzez_login_register') ): ?>
								<?php if( $header_login != 'no' || $create_lisiting_enable != 0 ): ?>
									
										<?php get_template_part('inc/header/login', 'nav'); ?>
									
								<?php endif; ?>
							<?php endif;*/ ?>
							<!-- <?php //houzez_advanced_search_widget(); ?> -->
					</nav>
				</div>
			</div>	
		</div>
	</div>

	<?php 
	$search_result_page = get_page_template_slug();
	$css_class = ($search_result_page == "template/property-listings-map.php") ? "sidenav open-left left-aligned" : "sidenav open-right";
	$css_close_class = ($search_result_page == "TZ_Map") ? "toggle-active" : "";

	?>
	  
	<!-- Mobile Menu : Sidenav-->
	<!-- Class .open-right to open sidenav (it will be the default option for the entire site) -->
	<div role="nav" id="sidenav-menu" class="<?php echo $css_class;?>">
		<button type="button" id="mobileBtn" class="sidenav-btn sidenav-close toggle-active">
			<span class="bar top"></span>
			<span class="bar middle"></span>
			<span class="bar bottom"></span>
		</button>
		<div class="sidenav-wrapper flex-container txt-h-light">
			<div class="sidenav-header">
				<ul class="list-inline mobile-language txt-txt">
					<li><a href="#!" class="waves-effect waves-light">ES</a></li>		
					<li class="active"><a href="#!" class="waves-effect waves-light">EN</a></li>
					<li><a href="#!" class="waves-effect waves-light">IT</a></li>
					<li><a href="#!" class="waves-effect waves-light">FR</a></li>
				</ul>
			</div>
			<div class="sidenav-body text-center txt-lg">
				<?php
					// Pages Menu
					if ( has_nav_menu( 'main-menu' ) ) :
						wp_nav_menu( array (
							'theme_location' => 'main-menu',
							'container' => '',
							'container_class' => '',
							'menu_class' => '',
							'menu_id' => 'menu-main-menu',
							'depth' => 4
						));
					endif;
					?>
					<?php /*if( class_exists('Houzez_login_register') ): ?>
						<?php if( $header_login != 'no' || $create_lisiting_enable != 0 ): ?>
							<div class="header-right">
								<?php get_template_part('inc/header/login', 'nav'); ?>
							</div>
						<?php endif; ?>
					<?php endif;*/ ?>
			</div>
			<div class="sidenav-footer flex-container txt-md">
				<!-- If user is login must shown the account button instead of login and register buttons -->
				<ul class="list-inline mobile-login">
					<!--<li><a href="">My account</a></li>-->
					<?php get_template_part('inc/header/login', 'nav'); ?>
				</ul>
			</div>
		</div>
	</div>
<!--end section header-->

<?php //get_template_part( 'inc/header/mobile-header' ); 
} else {
	global $current_user;
	wp_get_current_user();
	$userID  =  $current_user->ID;
	$user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $userID );
	$header_layout = houzez_option('header_1_width');
	if( empty($header_layout) ) { $header_layout = 'container'; }

	$main_menu_sticky = houzez_option('main-menu-sticky');
	$header_1_menu_align = houzez_option('header_1_menu_align');
	$top_bar = houzez_option('top_bar');

	if( $top_bar != 0 ) {
		get_template_part('inc/header/top', 'bar');
	}
	$menu_righ_no_user = '';
	$create_lisiting_enable = houzez_option('create_lisiting_enable');
	$header_login = houzez_option('header_login');
	if( $header_1_menu_align == 'nav-right' && $header_login != 'yes' && $create_lisiting_enable != 1 ) {
		$menu_righ_no_user = 'menu-right-no-user';
	}
	$houzez_user_logout = '';
	if( ! is_user_logged_in() ) {
		$houzez_user_logout = 'houzez-user-logout';
		if( $header_login != 'yes' ) {
			$houzez_user_logout = 'houzez-disabled-login';
		}
		if( $create_lisiting_enable != 1 ) {
			$houzez_user_logout = 'houzez-disabled-create-listing';
		}
		if( $header_login != 'yes' && $create_lisiting_enable != 1 ) {
			$houzez_user_logout = '';
		}
	}
	if( houzez_is_dashboard() ) {
		$header_layout = 'container-fluid';
	}

	global $post, $map_in_section, $property_map, $property_streetView, $prop_address, $prop_agent_email, $property_layout, $property_top_area;

	$featured_img = houzez_get_image_url('full');
	if( !empty($featured_img) ) {
	    $featured_img = $featured_img[0];
	} else {
	    $featured_img = '';
	}

	$agent_display_option = get_post_meta( get_the_ID(), 'fave_agent_display_option', true );
	$prop_agent_display = get_post_meta( get_the_ID(), 'fave_agents', true );
	$prop_agent_num = $agent_num_call = $prop_agent_email = '';

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

	$gallery_view = $map_view = $street_view = '';
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

	$layout_class = '';
	if( $property_layout == 'v2' ) {
	    $layout_class = "no-margin";
	}

	$virtual_tour         = get_post_meta( $post->ID, 'fave_virtual_tour', true );
	$prop_images          = get_post_meta( get_the_ID(), 'fave_property_images', false );
	$prop_video_img       = get_post_meta( get_the_ID(), 'fave_video_image', true );
	$prop_video_url       = get_post_meta( get_the_ID(), 'fave_video_url', true );
?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/bundle.min.css">

<!--start section header-->
<!--MAIN NAVBAR-->
<section class="second_header hello" style="background: url('<?php echo esc_url( $featured_img ); ?>'); background-size: cover;">

	<div class="navbar main-navbar">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xxs-12">
					<nav class="flex-container">
						<div class="navbar-header">
							<button type="button" class="sidenav-btn sidenav-trigger" data-target="sidenav-menu">
								<span class="bar top"></span>
								<span class="bar middle"></span>
								<span class="bar bottom"></span>	
							</button>
							<?php get_template_part('inc/header/logo'); ?>
							<span class="site-description txt-sm"> | <?php echo get_bloginfo();?></span>
						</div>
							<?php
							// Pages Menu
							if ( has_nav_menu( 'main-menu' ) ) :
								wp_nav_menu( array (
									'theme_location' => 'main-menu',
									'container' => '',
									'container_class' => '',
									'menu_class' => 'navbar-nav flex-container',
									'menu_id' => 'main-nav',
									'depth' => 4,
									'walker' => new WP_houzez_walker_nav_menu()
								));
							endif;
							?>
							<?php /* if( class_exists('Houzez_login_register') ): ?>
								<?php if( $header_login != 'no' || $create_lisiting_enable != 0 ): ?>
									
										<?php get_template_part('inc/header/login', 'nav'); ?>
									
								<?php endif; ?>
							<?php endif;*/ ?>
							<!-- <?php //houzez_advanced_search_widget(); ?> -->
					</nav>
				</div>
			</div>	
		</div>
	</div>
	<?php 
	$search_result_page = get_page_template_slug();
	$css_class = ($search_result_page == "TZ_Map") ? "sidenav open-left left-aligned" : "sidenav open-right";
	$css_close_class = ($search_result_page == "TZ_Map") ? "toggle-active" : "";
	?>
	<!-- Mobile Menu : Sidenav-->
	<!-- Class .open-right to open sidenav (it will be the default option for the entire site) -->
	<div role="nav" id="sidenav-menu" class="<?php echo $css_class; ?>">
		<button type="button" id="mobileBtn" class="sidenav-btn sidenav-close toggle-active">
			<span class="bar top"></span>
			<span class="bar middle"></span>
			<span class="bar bottom"></span>
		</button>
		<div class="sidenav-wrapper flex-container txt-h-light">
			<div class="sidenav-header">
				<ul class="list-inline mobile-language txt-txt">
					<li><a href="#!" class="waves-effect waves-light">ES</a></li>		
					<li class="active"><a href="#!" class="waves-effect waves-light">EN</a></li>
					<li><a href="#!" class="waves-effect waves-light">IT</a></li>
					<li><a href="#!" class="waves-effect waves-light">FR</a></li>
				</ul> 
			</div>
			<div class="sidenav-body text-center txt-lg">
				<?php
					// Pages Menu
					if ( has_nav_menu( 'main-menu' ) ) :
						wp_nav_menu( array (
							'theme_location' => 'main-menu',
							'container' => '',
							'container_class' => '',
							'menu_class' => '',
							'menu_id' => 'menu-main-menu',
							'depth' => 4
						));
					endif;
					?>
					<?php /*if( class_exists('Houzez_login_register') ): ?>
						<?php if( $header_login != 'no' || $create_lisiting_enable != 0 ): ?>
							<div class="header-right">
								<?php get_template_part('inc/header/login', 'nav'); ?>
							</div>
						<?php endif; ?>
					<?php endif;*/ ?>
			</div>
			<div class="sidenav-footer flex-container txt-md">
				<!-- If user is login must shown the account button instead of login and register buttons -->
				<ul class="list-inline mobile-login">
					<!--<li><a href="">My account</a></li>-->
					<?php get_template_part('inc/header/login', 'nav'); ?>
				</ul>
			</div>
		</div>
	</div>
	

	<div class="property-detail-header">
		<div class="row">
			<div class="col-xxs-12">
				<div class="hd-wrapper flex-container">
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
								if(count($property_label)) {
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

	<!-- <?php //get_template_part('property-details/next-prev'); ?> -->
	
	<!--PROPERTY DETAIL FIXED NAV--> 
	<!-- <div class="property-detail-fixed-nav bg-white sticky-navbar" id="sticky_navbar"> -->
		<!-- <div class="container-fluid"> -->
		<!-- 	<div class="row">
				<div class="col-xxs-12">
					<div class="fixed-inner-wrapp bg-black">
						<div class="flex-container"> -->
							<!--Previus Property-->
							<!-- <div class="flex-item">
								<a href="" data-toggle="tooltip" data-placement="right" title="Previous property"><i class="tz-chevron-left"></i></a>
							</div>
							<div class="flex-item">
								<ul class="list-block flex-container"> -->
									<!--Title-->
									<!-- <li>
										<span class="txt-h-medium txt-md txt-white">Beautiful house in the mountains</span>
									</li> -->
									<!--Property Type-->
									<!-- <li>
										<span class="txt-h-medium txt-sm txt-gray-1 text-uppercase">Type</span>
									</li>
								</ul>
							</div>
							<div class="flex-item">
								<ul class="list-inline flex-container">
									<li>
										<a href="#contact-agent" class="btn waves-effect waves-color-1 z-depth-0 bd-white">Contact an Agent</a>
									</li>
									<li>
										<a href="#online-booking" class="btn waves-effect waves-color-1 z-depth-0 bd-gradient">Online Booking</a>
									</li>
								</ul>
							</div> -->
							<!--Next Property-->
							<!-- <div class="flex-item">
								<a href="" data-toggle="tooltip" data-placement="left" title="Next property"><i class="tz-chevron-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		<!-- </div> -->
	<!-- </div> -->
</section>
<!--end section header-->

<!-- <script>
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("sticky_navbar");
	var sticky = header.offsetTop;

	function myFunction() {
	  if (window.pageYOffset > sticky) {
	    header.classList.add("sticky_sec");
	  } else {
	    header.classList.remove("sticky_sec");
	  }
	}
</script> -->

<?php get_template_part( 'inc/header/mobile-header' ); 
} ?>

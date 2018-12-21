<?php
if(!is_page(419)) {
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


	  
	<!-- Mobile Menu : Sidenav-->
	<!-- Class .open-right to open sidenav (it will be the default option for the entire site) -->
	<div role="nav" id="sidenav-menu" class="sidenav open-left">
		<button type="button" class="sidenav-btn sidenav-close">
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
							'menu_id' => '',
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

<?php get_template_part( 'inc/header/mobile-header' ); 
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
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/bundle.min.css">

<!--start section header-->
<!--MAIN NAVBAR-->

<section class="second_header" style="background: url('<?php bloginfo('template_url'); ?>/images/property_detail_bg.jpg')">

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

	<!-- Mobile Menu : Sidenav-->
	<!-- Class .open-right to open sidenav (it will be the default option for the entire site) -->
	<div role="nav" id="sidenav-menu" class="sidenav open-left">
		<button type="button" class="sidenav-btn sidenav-close">
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
							'menu_id' => '',
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
						<ul class="header-labels flex-container flex-wrap txt-h-medium text-uppercase">
							<li class="label1 bg-label">Label 1</li>
							<li class="label2 bg-label">Label 2</li>
							<li class="label3 bg-label">Label 3</li>
							<li class="label4 bg-label">Label 4</li>
						</ul>
						<h1 class="txt-h-light txt-header">
							Beautiful house in the mountains
						</h1>
						<p class="header-type-status txt-h-medium txt-md txt-gray-1 text-uppercase">
							Type | <span class="txt-h-light">Status</span>
						</p>
						<ul class="header-actions list-inline txt-lg">
							<li><a href="#!" class="bd-black waves-effect waves-color-1">Photos</a></li>
							<li><a href="#!" class="bd-black waves-effect waves-color-1">Video</a></li>
							<li><a href="#!" class="bd-black waves-effect waves-color-1">360º</a></li>
						</ul>
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

<script>
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
</script>

<?php get_template_part( 'inc/header/mobile-header' ); 
} ?>

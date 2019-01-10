<?php 
global $post, $prop_images, $current_page_template, $houzez_local;
$post_meta_data     = get_post_custom($post->ID);
$prop_images        = get_post_meta( get_the_ID(), 'fave_property_images', false );
$prop_address       = get_post_meta( get_the_ID(), 'fave_property_map_address', true );
$prop_featured      = get_post_meta( get_the_ID(), 'fave_featured', true );
$listing_agent = houzez_get_property_agent( $post->ID );
$disable_agent = houzez_option('disable_agent');
$disable_date = houzez_option('disable_date');
$infobox_trigger = '';

$prop_types = get_the_terms( $post->ID, 'property_type' );
$prop_status = get_the_terms( $post->ID, 'property_status' );
$prop_sale_price = get_post_meta( get_the_ID(), 'fave_property_price', true );
$prop_rent_price = get_post_meta( get_the_ID(), 'fave_property_sec_price', true );
$prop_rent_vaca_price = get_post_meta( get_the_ID(), 'fave_property_third_price', true );
$_ratings = get_post_meta( get_the_ID(), 'fave_rating', true );

$current_user = wp_get_current_user();
$userID = $current_user->ID;

$comments_table 		 = $wpdb->comments;
$comments_meta_table = $wpdb->commentmeta;
$comments_query 		 = "SELECT * FROM $comments_table as comment INNER JOIN $comments_meta_table AS meta WHERE comment.comment_post_ID = $post->ID AND meta.meta_key = 'rating' AND meta.comment_id = comment.comment_ID AND ( comment.comment_approved = 1 OR comment.user_id = $userID )";

$get_comments = $wpdb->get_results( $comments_query );

if ( sizeof( $get_comments ) != 0 ) {
    foreach ( $get_comments as $comment ) {
        if ( $comment->comment_approved == 1 ) {
            $prop_total_reviews++;
            $voters++;
            $totalStars += $comment->meta_value;
        }
    }
    
    if ( $voters != 0 ) {
        $rating = ( $totalStars / $voters );
    }
}
?>

<div class="property-card <?php echo $prop_featured ? 'featured-property' : '';?>">
	<div class="property-card-wrapper flex-container">
		<div class="property-card-header">
			<ul class="card-header-labels flex-container flex-wrap txt-h-medium txt-xs text-uppercase">
				<?php get_template_part('template-parts/listing-label-v3-new' ); ?>
			</ul>
			
			<?php get_template_part('template-parts/favourite-v3-new'); ?>

			<!-- Link to Property Detail Page-->
			<a href="<?php the_permalink() ?>" class="go-detail waves-effect waves-light">
				<?php
          if( has_post_thumbnail( $post->ID ) ) {
              the_post_thumbnail( 'houzez-property-thumb-image' );
          }else{
              houzez_image_placeholder( 'houzez-property-thumb-image' );
          }
        ?>
			</a>
		</div>

		<div class="property-card-body">
			<p class="card-title txt-h-medium h4">
				<a href="<?php the_permalink() ?>"><?php echo esc_attr( get_the_title() ); ?></a>
			</p>

			<?php 
        $prop_bed     = get_post_meta( $post->ID, 'fave_property_bedrooms', true );
        $prop_bath     = get_post_meta( $post->ID, 'fave_property_bathrooms', true );
        $prop_size     = get_post_meta( $post->ID, 'fave_property_size', true );
        $prop_guests   = get_post_meta( $post->ID, 'fave_property_guests', true );
        $status   = get_post_meta( $post->ID, 'fave_property_status', true );
			 ?>
			<p class="card-type-status txt-h-medium txt-sm txt-gray-1 text-uppercase">
				<?php echo $prop_types[0]->name; ?> 
				<?php if (!empty($status)) {
					
				echo '| 
				<span class="txt-h-light">'.$status.'</span>';
				} ?>
			</p>
			<ul class="card-main-features last-child-no-border flex-container txt-sm text-center">

				<?php if (!empty($prop_bed)): ?>
					<li class="flex-item">
						<span class="txt-h-medium txt-txt"><?=esc_attr($prop_bed)?></span> 
						<span class="text-uppercase">Rooms</span>
					</li>
				<?php endif ?>

				<?php if (!empty($prop_bath)): ?>
					<li class="flex-item">
						<span class="txt-h-medium txt-txt"><?=esc_attr($prop_bath)?></span> <span class="text-uppercase">Baths</span>
					</li>
				<?php endif ?>

				<?php if (!empty($prop_guests)): ?>
					<li class="flex-item">
						<span class="txt-h-medium txt-txt"><?=esc_attr($prop_guests)?></span> 
						<span class="text-uppercase">Guests</span>
					</li>
				<?php endif ?>
				
				<?php if (!empty($prop_size)): ?>
					<li class="flex-item">
						<span class="txt-h-medium txt-txt"><?php echo houzez_get_listing_area_size( $post->ID ); ?> 
						<span class="txt-h-light txt-sm"><!-- m&#178 --><?php echo houzez_get_listing_size_unit( $post->ID ); ?></span>
						</span> 
						<span class="text-uppercase">Area</span>
					</li>
				<?php endif ?>

			</ul>
			<?php if ( !empty($prop_sale_price) ) { ?>
			<p class="card-price txt-h-light txt-txt">
				<!-- Before-price-label -->
				<?php 
				$prop_price_pre = get_post_meta($post->ID, 'fave_property_price_prefix', true);
				$prop_price_post = get_post_meta($post->ID, 'fave_property_price_postfix', true);
				echo $prop_price_pre; ?> 
				
				<!-- Price -->
				<span class="txt-h-medium">
					<?php echo houzez_get_property_price( doubleval( get_post_meta( get_the_ID(), 'fave_property_price', true ) ) ); ?>
				</span>

				<!-- After-price-label -->
				<?php if ( !empty($prop_price_post) ) { echo "/".$prop_price_post; } ?> 

				<!-- Use this icon with tooltip when the property has been marked (in backend) as an opportunity -->
				<?php if (get_post_meta($post->ID, 'fave_property_oppurtunity', true)) {
					
					echo '<i class="tz-arrow-down" title="The price has dropped" data-toggle="tooltip" data-placement="right"></i>';
				} ?>

			</p>				
			<?php } ?>

			<?php if ( !empty($prop_rent_price) ) { ?>
			<p class="card-price txt-h-light txt-txt">
				<!-- Before-price-label -->
				<?php 
				$prop_price_sec_pre = get_post_meta($post->ID, 'fave_property_sec_price_prefix', true);
				$prop_price_sec_post = get_post_meta($post->ID, 'fave_property_sec_price_postfix', true);
				echo $prop_price_sec_pre; ?> 

				<span class="txt-h-medium">
					<?php echo houzez_get_property_price( doubleval( get_post_meta( get_the_ID(), 'fave_property_sec_price', true ) ) ); ?>
				</span> 
				
				<!-- after-price-label -->
				<?php if ( !empty($prop_price_sec_post) ) {
					echo "/".$prop_price_sec_post;
				} ?>

				<!-- Use this icon with tooltip when the property has been marked (in backend) as an opportunity -->
				<?php if (get_post_meta($post->ID, 'fave_property_oppurtunity', true)) {
					
					echo '<i class="tz-arrow-down" title="The price has dropped" data-toggle="tooltip" data-placement="right"></i>';
				} ?>
			</p>				
			<?php } ?>


			<?php if ( !empty($prop_rent_vaca_price) ) { ?>
			<p class="card-price txt-h-light txt-txt">
				<!-- Before-price-label -->
				<?php 
				$prop_price_sec_pre = get_post_meta($post->ID, 'fave_property_third_price_prefix', true);
				$prop_price_sec_post = get_post_meta($post->ID, 'fave_property_third_price_postfix', true);
				echo $prop_price_sec_pre; ?> 

				<span class="txt-h-medium">
					<?php echo houzez_get_property_price( doubleval( get_post_meta( get_the_ID(), 'fave_property_third_price', true ) ) ); ?>
				</span> 
				
				<!-- after-price-label -->
				<?php if ( !empty($prop_price_sec_post) ) {
					echo "/".$prop_price_sec_post;
				} ?>

				<!-- Use this icon with tooltip when the property has been marked (in backend) as an opportunity -->
				<?php if (get_post_meta($post->ID, 'fave_property_oppurtunity', true)) {
					
					echo '<i class="tz-arrow-down" title="The price has dropped" data-toggle="tooltip" data-placement="right"></i>';
				} ?>
			</p>				
			<?php } ?>

		</div>
		<div class="property-card-footer">
			<div class="flex-container">
				<ul class="card-reviews list-inline">
					<li>
						<div>
							<?php
							$count = $rating; 
							for ($i=0; $i < 5; $i++) { 
									
								echo $count > 0 ? '<i class="tz-ratting-full-sm rated"></i>' : '<i class="tz-ratting-empty-sm"></i>';
								
								$count--;
							}
							?>
						</div>
					</li>
					<li>
						<span class="txt-h-light txt-xs">
							<?php echo $voters > 0 ? $rating." out of 5" : "No reviews" ?>
						</span>	
					</li>
				</ul>
				<?php get_template_part('template-parts/compare-v3-new'); ?>
			</div>
		</div>
	</div>
</div>
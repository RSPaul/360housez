<?php
global $wpdb, $property_layout;

$notification = 'none';
$current_user = wp_get_current_user();
$userID = $current_user->ID;

$rating = $prop_total_reviews = $voters = $totalStars = 0;
$_ratings = get_post_meta( get_the_ID(), 'fave_rating', true );
$prop_ID = get_the_ID();

$comments_table = $wpdb->comments;
$comments_meta_table = $wpdb->commentmeta;
$comments_query = "SELECT * FROM $comments_table as comment INNER JOIN $comments_meta_table AS meta WHERE comment.comment_post_ID = $prop_ID AND meta.meta_key = 'rating' AND meta.comment_id = comment.comment_ID AND ( comment.comment_approved = 1 OR comment.user_id = $userID )";

// $comments_query = "SELECT * FROM $comments_table as comment LIMIT 8";
$get_comments = $wpdb->get_results( $comments_query );

$check_comment_query = "SELECT * FROM $comments_table as comment INNER JOIN $comments_meta_table AS meta WHERE comment.comment_post_ID = $prop_ID AND comment.user_id = $userID  AND meta.meta_key = 'rating' AND meta.comment_id = comment.comment_ID ORDER BY comment.comment_ID DESC";
$check_comment = $wpdb->get_row( $check_comment_query );

if ( sizeof( $get_comments ) != 0 ) {
    foreach ( $get_comments as $comment ) {
        if ( $comment->comment_approved == 1 ) {
            $prop_total_reviews++;
            $voters++;
            $voters++;
            $totalStars += $comment->meta_value;
        }
    }
    if ( $voters != 0 ) {
        $rating = ( $totalStars / $voters );
    }
}
$agent_forms_terms_gdpr_agreement = houzez_option('agent_forms_terms_gdpr_agreement');

?>

<!--REVIEWS-->
<section class="container property-detail-reviews">
    <div id="property-reviews" class="id-link"></div>
    <hr>
    <div class="row">
        <?php if($prop_total_reviews != 0) { ?>
        <div class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">

            <h2 class="txt-lg text-center"><span class="txt-h-light"><?php
                if ( $prop_total_reviews == 0 ) {
                    echo "No";;
                } elseif ( $prop_total_reviews == 1 ) {
                    echo $prop_total_reviews;
                } else {
                    echo $prop_total_reviews;
                }
                ?></span> Reviews</h2>
                <ul class="list-inline text-center">
                    <!-- <li>
                        <div>
                            <i class="tz-ratting-full"></i>
                            <i class="tz-ratting-full"></i>
                            <i class="tz-ratting-full"></i>
                            <i class="tz-ratting-full"></i>
                            <i class="tz-ratting-half"></i>
                        </div>
                    </li> -->
                    <li class="txt-sm">  
                        <input class="rating-display-only" name="rating" value="<?php echo $rating; ?>" type="number" min="0" max="5" step=1 data-size="md" class="rating">
                        (<span class="txt-h-medium"><?php echo round($rating, 2); ?></span> <?php esc_html_e('out of', 'houzez');?> <span class="txt-h-medium">5</span>)
                    </li>
                </ul>
            <div class="txt-xs txt-color-1 text-right"><a href="#review-this-property"><span class="waves-effect">Write a review</span></a></div>
        </div>
        <!--Reviews container-->
        <div class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
            <!--Each review-->
            <?php
                if ( sizeof( $get_comments ) ) {
                    $arr1 = array_slice($get_comments, 0, 3);               
                    $arr2 = array_slice($get_comments, 3); 
                    foreach ( $arr1 as $comment ) {
                        $user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $comment->user_id );
                        if ( empty( $user_custom_picture ) ) {
                            $user_custom_picture = get_template_directory_uri().'/images/profile-avatar.png';
                        }
                        ?>
                        <div class="row individual-review">
                            <hr>
                            <div class="col-xxs-12 col-xs-2">
                                <span class="review-avatar img-circle"><img class="media-object" src="<?php echo esc_url($user_custom_picture); ?>" alt="<?php the_author_meta( 'display_name', $comment->user_id ); ?>" width="60" height="60"></span>
                            </div>
                            <div class="col-xxs-12 col-xs-10">
                                <p class="review user txt-h-light"><?php the_author_meta( 'display_name', $comment->user_id ); ?></p>
                                <p class="review-date txt-h-light txt-info"><?php echo date( 'F d, Y', strtotime( $comment->comment_date ) ); ?></p>
                                <p class="review-title txt-h-medium"><?php echo get_comment_meta( $comment->comment_ID, 'title', true ) ?></p>
                                <div class="review-value">
                                     <input class="rating-display-only" name="rating" value="<?php echo $comment->meta_value; ?>" type="number" min="0" max="5" step=1 data-size="md" class="rating" >
                                </div>
                                <p class="review-text">
                                    <?php echo $comment->comment_content; ?>
                                </p>
                            </div>
                        </div>  

                        <!-- <li class="media" itemprop="review" itemscope itemtype="<?php echo houzez_http_or_https(); ?>://schema.org/Review">
                            <div class="media-left" itemprop="author" itemscope itemtype="<?php echo houzez_http_or_https(); ?>://schema.org/Person">
                                <a href="#">
                                    <img class="media-object" src="<?php echo esc_url($user_custom_picture); ?>" alt="<?php the_author_meta( 'display_name', $comment->user_id ); ?>" width="60" height="60">
                                </a>
                            </div>
                            <div class="media-body" itemprop="reviewBody">
                                <div class="review-top">
                                    <h3 class="media-heading"><a href="#"><?php the_author_meta( 'display_name', $comment->user_id ); ?></a></h3>
                                    <p class="review-date" itemprop="datePublished" content="<?php echo date(DATE_W3C, strtotime( $comment->comment_date )) ?>">
                                        <time datetime="<?php echo date(DATE_W3C, strtotime( $comment->comment_date )) ?>"><?php echo date( 'F d, Y', strtotime( $comment->comment_date ) ); ?></time>
                                    </p>
                                </div>

                                <h4 class="review-title-inner"> <?php echo get_comment_meta( $comment->comment_ID, 'title', true ) ?>
                                    <span class="rating-wrap">
                                        <input class="rating-display-only" name="rating" value="<?php echo $comment->meta_value; ?>" type="number" min="0" max="5" step=1 data-size="md" class="rating" >
                                    </span>
                                </h4>
                                <p> <?php echo $comment->comment_content; ?> </p>
                                <?php if ( $comment->comment_approved == 0 ) { ?>
                                    <span> <?php esc_html_e( 'Waiting for approval.', 'houzez' ); ?> </span>
                                <?php } ?>
                            </div>
                        </li> -->
                        <?php
                    } ?>

                    <div class="collapse" id="collapse-reviews">
                        <?php
                        foreach ( $arr2 as $comment ) {
                            $user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $comment->user_id );
                            if ( empty( $user_custom_picture ) ) {
                                $user_custom_picture = get_template_directory_uri().'/images/profile-avatar.png';
                            }
                            ?>
                            <div class="row individual-review">
                                <hr>
                                <div class="col-xxs-12 col-xs-2">
                                    <span class="review-avatar img-circle"><img class="media-object" src="<?php echo esc_url($user_custom_picture); ?>" alt="<?php the_author_meta( 'display_name', $comment->user_id ); ?>" width="60" height="60"></span>
                                </div>
                                <div class="col-xxs-12 col-xs-10">
                                    <p class="review user txt-h-light"><?php the_author_meta( 'display_name', $comment->user_id ); ?></p>
                                    <p class="review-date txt-h-light txt-info"><?php echo date( 'F d, Y', strtotime( $comment->comment_date ) ); ?></p>
                                    <p class="review-title txt-h-medium"><?php echo get_comment_meta( $comment->comment_ID, 'title', true ) ?></p>
                                    <div class="review-value">
                                         <input class="rating-display-only" name="rating" value="<?php echo $comment->meta_value; ?>" type="number" min="0" max="5" step=1 data-size="md" class="rating" >
                                    </div>
                                    <p class="review-text">
                                        <?php echo $comment->comment_content; ?>
                                    </p>
                                </div>
                            </div>  
                            <?php
                        } ?>
                      
                    </div>
                    <a class="txt-h-light txt-info text-center btn-block" data-toggle="collapse" href="#collapse-reviews" aria-expanded="false">
                        <span class="waves-effect">Show all <i class="tz-chevron-down-sm"></i></span>
                        <span class="waves-effect">Show less <i class="tz-chevron-up-sm"></i></span>
                    </a>
                    
                <?php 
                }
            ?>
        </div>
        <?php } ?>
        <!--Reviews container ends here-->
        <!-- Write a review -->
        <div class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3">
            <div id="review-this-property" class="id-link"></div>
            <div class="write-review">                   
                <h4 class="txt-md">Write a review</h4>
                <!--Only for login users-->
                <?php if ( is_user_logged_in() ) { ?>
                <form method="post" action="#">
                    <input type="hidden" name="start_thread_message_form_ajax" value="<?php echo wp_create_nonce('property-rating-form-nonce'); ?>"/>
                    <input type="hidden" name="action" value="houzez_property_raring">
                    <input type="hidden" name="property_id" value="<?php the_ID(); ?>">
                    <div class="row">
                        <div class="col-xxs-12">
                            <p class="txt-sm">Rate your experience on this property</p>
                            <div class="write-review-ratting">
                                <input id="property-rating" name="rating" value="<?php echo $comment->meta_value; ?>" type="number" min="0" max="5" step="1" data-size="xl" class="rating">
                               <!--  <a role="button" class="no-style" title="Bad" data-toggle="tooltip" data-placement="right">
                                    <i class="tz-ratting-empty"></i>
                                </a>
                                <a role="button" class="no-style" title="Not bad" data-toggle="tooltip" data-placement="right">
                                    <i class="tz-ratting-empty"></i>
                                </a>
                                <a role="button" class="no-style" title="Blah" data-toggle="tooltip" data-placement="right">
                                    <i class="tz-ratting-empty"></i>
                                </a>
                                <a role="button" class="no-style" title="Good!" data-toggle="tooltip" data-placement="right">
                                    <i class="tz-ratting-empty"></i>
                                </a>
                                <a role="button" class="no-style" title="Amazing!" data-toggle="tooltip" data-placement="right">
                                    <i class="tz-ratting-empty"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="input-field col-xxs-12">
                            <input id="review_title" name="title" type="text" class="validate" required="true" aria-required="true">
                            <!-- <input id="review_title" name="title" class="validate" required="" aria-required="true"> -->
                            <label for="review_title">Review title</label>
                        </div>
                        <div class="input-field col-xxs-12">
                            <textarea id="write-review-text" class="materialize-textarea" required="true" aria-required="true" data-length="600" name="message"></textarea>
                            <!-- <textarea id="write-review-text" class="materialize-textarea" required="" aria-required="true" data-length="600"></textarea> -->
                            <label class="active" for="write-review-text">Write your review here</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxs-12">
                            <div class="data-protection-eu-checkbox">
                                <label for="review-accept-privacy-policy">
                                    <input id="review-accept-privacy-policy" type="checkbox"/>
                                    <span>I have read and accept the <a href="" target="_blank">privacy policy</a>.</span>
                                </label>
                            </div>
                            <!-- <a type="button" class="waves-effect waves-color-1 btn bd-black">Send review</a> -->
                            <button type="button" class="property_rating waves-effect waves-color-1 btn bd-black"><?php esc_html_e('Send review', 'houzez'); ?></button>
                            <div class="data-protection-eu-alert">
                                <h6>Basic information about data protection:</h6>
                                <p>
                                    <?php echo $agent_forms_terms_gdpr_agreement; ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?> 
                <!--only for login users ends here-->
                <!--Login to review-->
                <?php if ( !is_user_logged_in() ) { ?>
                        <div class="login-review txt-sm txt-color-1">
                            <a href="#" data-toggle="modal" data-target="#pop-login">Log in to rate this property</a>
                            <!-- <a href=""><span class="waves-effect">Log in to rate this property</span></a> -->
                        </div>
                <?php } ?> 

                
                <!--Login to review ends here-->
            </div>
        </div>
    </div>
</section> <!-- /container-->



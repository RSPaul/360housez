<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 27/09/16
 * Time: 5:04 PM
 * Since v1.4.0
 */
global $post, $current_user, $all_meta_for_user;
$agent_display_option = get_post_meta( get_the_ID(), 'fave_agent_display_option', true );
$prop_agent_display = get_post_meta( get_the_ID(), 'fave_agents', true );
$enable_contact_form_7_prop_detail = houzez_option('enable_contact_form_7_prop_detail');
$contact_form_agent_bottom = houzez_option('contact_form_agent_bottom');
$enableDisable_agent_forms = houzez_option('agent_forms');
$enable_direct_messages = houzez_option('enable_direct_messages');
$is_single_agent = true;
$listing_agent = '';
$prop_agent_email = '';

$prop_id = get_post_meta( get_the_ID(), 'fave_property_id', true );

$agent_forms_terms = houzez_option('agent_forms_terms');
$agent_forms_terms_text = houzez_option('agent_forms_terms_text');

if( $prop_agent_display != '-1' && $agent_display_option == 'agent_info' ) {

    $prop_agent_ids = get_post_meta( get_the_ID(), 'fave_agents' );
    $prop_agent_ids = array_filter( $prop_agent_ids, function($v){
        return ( $v > 0 );
    });
    // remove duplicated ids
    $prop_agent_ids = array_unique( $prop_agent_ids );

    $agents_count = count( $prop_agent_ids );

    if ( $agents_count > 1 ) :
        $is_single_agent = false;
    endif;

    foreach ( $prop_agent_ids as $agent ) :

        if ( 0 < intval( $agent ) ) :

            $agent_args = array();
            $agent_args[ 'agent_id' ] = intval( $agent );
            $agent_args[ 'agent_name' ] = get_the_title( $agent_args[ 'agent_id' ] );
            $agent_args[ 'agent_mobile' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_mobile', true );
            $agent_args[ 'agent_mobile_call' ] = str_replace(array('(',')',' ','-'),'', $agent_args[ 'agent_mobile' ]);
            $agent_args[ 'agent_phone' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_office_num', true );
            $prop_agent_email = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_email', true );
            $agent_args[ 'agent_email' ] = $prop_agent_email;
            $agent_args[ 'agent_skype' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_skype', true );
            $prop_agent_permalink = get_permalink($agent_args[ 'agent_id' ]);
            $agent_args[ 'link' ] = $prop_agent_permalink;
            $agent_args[ 'facebook' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_facebook', true );
            $agent_args[ 'twitter' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_twitter', true );
            $agent_args[ 'linkedin' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_linkedin', true );
            $agent_args[ 'googleplus' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_googleplus', true );
            $agent_args[ 'youtube' ] = get_post_meta( $agent_args[ 'agent_id' ], 'fave_agent_youtube', true );
            $thumb_id = get_post_thumbnail_id( $agent_args[ 'agent_id' ] );
            $thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'thumbnail', true );
            $prop_agent_photo_url = $thumb_url_array[0];
            if( empty( $prop_agent_photo_url )) :
                $agent_args[ 'picture' ] = get_template_directory_uri().'/images/profile-avatar.png';
            else :
                $agent_args[ 'picture' ] = $prop_agent_photo_url;
            endif;
            $listing_agent .= houzez_get_agent_info_bottom_new_v2( $agent_args, 'agent_form', $is_single_agent );

        endif;

    endforeach;

} elseif( $agent_display_option == 'agency_info' ) {

    $agent_args = array();
    $prop_agent_id = get_post_meta( get_the_ID(), 'fave_property_agency', true );
    $agent_args[ 'agent_id' ] = $prop_agent_id;
    $agent_args[ 'agent_phone' ] = get_post_meta( $prop_agent_id, 'fave_agency_phone', true );
    $prop_agent_mobile = get_post_meta( $prop_agent_id, 'fave_agency_mobile', true );
    $agent_args[ 'agent_mobile' ] = $prop_agent_mobile;
    $prop_agent_email = get_post_meta( $prop_agent_id, 'fave_agency_email', true );
    $agent_args[ 'agent_email' ] = $prop_agent_email;
    $agent_args[ 'agent_mobile_call' ] = str_replace(array('(',')',' ','-'),'', $prop_agent_mobile);
    $agent_args[ 'agent_name' ] = get_the_title( $prop_agent_id );
    $prop_agent_permalink = get_post_permalink( $prop_agent_id );
    $agent_args[ 'link' ] = $prop_agent_permalink;

    $agent_args[ 'agent_skype' ] = get_post_meta( $prop_agent_id, 'fave_agency_skype', true );
    $agent_args[ 'facebook' ] = get_post_meta( $prop_agent_id, 'fave_agency_facebook', true );
    $agent_args[ 'twitter' ] = get_post_meta( $prop_agent_id, 'fave_agency_twitter', true );
    $agent_args[ 'linkedin' ] = get_post_meta( $prop_agent_id, 'fave_agency_linkedin', true );
    $agent_args[ 'googleplus' ] = get_post_meta( $prop_agent_id, 'fave_agency_googleplus', true );
    $agent_args[ 'youtube' ] = get_post_meta( $prop_agent_id, 'fave_agency_youtube', true );

    $thumb_id = get_post_thumbnail_id( $prop_agent_id );
    $thumb_url_array = wp_get_attachment_image_src( $thumb_id, 'thumbnail', true );
    $prop_agent_photo_url = $thumb_url_array[0];

    if( empty( $prop_agent_photo_url )) :
        $agent_args[ 'picture' ] = get_template_directory_uri().'/images/profile-avatar.png';
    else :
        $agent_args[ 'picture' ] = $prop_agent_photo_url;
    endif;
    $listing_agent .= houzez_get_agent_info_bottom_new_v2( $agent_args, 'agent_form', $is_single_agent );

} elseif( $agent_display_option == 'author_info' ) {

    $listing_agent = '';
    $author_args = array();
    $author_args[ 'agent_name' ] = get_the_author();
    $author_args[ 'agent_mobile' ] = get_the_author_meta( 'fave_author_mobile' );
    $author_args[ 'agent_mobile_call' ] = str_replace(array('(',')',' ','-'),'', get_the_author_meta( 'fave_author_mobile' ));
    $prop_agent_email = get_the_author_meta( 'email' );
    $author_args[ 'agent_email' ] = $prop_agent_email;
    $author_args[ 'agent_phone' ] = get_the_author_meta( 'fave_author_phone' );
    $author_args[ 'agent_skype' ] = get_the_author_meta( 'fave_author_skype' );
    $prop_agent_permalink = get_author_posts_url( get_the_author_meta( 'ID' ) );
    $author_args[ 'link' ] = $prop_agent_permalink;
    $author_args[ 'facebook' ] = get_the_author_meta( 'fave_author_facebook' );
    $author_args[ 'twitter' ] = get_the_author_meta( 'fave_author_twitter' );
    $author_args[ 'linkedin' ] = get_the_author_meta( 'fave_author_linkedin' );
    $author_args[ 'googleplus' ] = get_the_author_meta( 'fave_author_googleplus' );
    $author_args[ 'youtube' ] = get_the_author_meta( 'fave_author_youtube' );
    $prop_agent_photo_url = get_the_author_meta( 'fave_author_custom_picture' );
    if( empty( $prop_agent_photo_url )) {
        $author_args[ 'picture' ] = get_template_directory_uri().'/images/profile-avatar.png';
    } else {
        $author_args[ 'picture' ] = $prop_agent_photo_url;
    }
    $listing_agent .= houzez_get_agent_info_bottom_new_v2( $author_args, 'agent_form', true );
}

$agent_email = is_email($prop_agent_email);
$user_info = get_userdata(get_the_author_meta('ID'));
$user_role = implode(', ', $user_info->roles);

$schedule_time_slots = houzez_option('schedule_time_slots');
$agent_forms_terms_gdpr_agreement = houzez_option('agent_forms_terms_gdpr_agreement');

?>


<!--CONTACT AN AGENT-->  
        <section class="property-detail-contact-agent">
            <div id="contact-agent" class="id-link"></div>
            <div class="container">
                <?php echo $listing_agent; ?>
                <div class="row">
                    <form class="col-xxs-12 col-xxs-offset-0 col-md-8 col-md-offset-2 col-xl-6 col-xl-offset-3" method="post" action="#">
                        <?php if ($is_single_agent == true) : ?>
                            <input type="hidden" name="target_email" value="<?php echo antispambot($agent_email); ?>">
                        <?php endif; ?>
                        <input type="hidden" name="agent_contact_form_ajax"
                               value="<?php echo wp_create_nonce('agent-contact-form-nonce'); ?>"/>
                        <input type="hidden" name="property_permalink"
                               value="<?php echo esc_url(get_permalink($post->ID)); ?>"/>
                        <input type="hidden" name="property_title"
                               value="<?php echo esc_attr(get_the_title($post->ID)); ?>"/>
                        <input type="hidden" name="action" value="houzez_agent_send_message">

                        <div class="row">
                            <div class="input-field col-xxs-6">
                                <select disabled>
                                    <option value="" disabled>Select</option>
                                    <option value="english" selected>English</option>
                                    <option value="spanish">Español</option>
                                    <option value="italian">Italiano</option>
                                    <option value="french">François</option>
                                </select>
                                <label>Language</label>
                            </div>
                            <div class="input-field col-xxs-6">
                                <input id="form-ref" type="text" class="validate" value="REF. <?php echo $prop_id; ?>" disabled>
                                <label for="form-ref">Reference</label>
                            </div>
                        </div>
                        <!--Only for non-logged users-->
                        <div class="row">
                            <div class="input-field col-xxs-12">

                                <input id="form-client-name" name="name" type="text" class="validate" value="<?php echo $current_user->display_name; ?>"  required="" aria-required="true">
                                <label for="form-client-name">Full name</label>
                                <span class="helper-text" data-error="Error" data-success="Good!">Required</span>
                            </div>
                            <div class="input-field col-xxs-6">
                                <input id="form-client-phone" type="text" class="validate" name="phone" value="<?php if(isset($all_meta_for_user['fave_author_phone'][0])) { echo $all_meta_for_user['fave_author_phone'][0]; }?>">
                                <label for="form-client-phone">Phone</label>
                                <span class="helper-text">Add international code</span>
                            </div>
                            <div class="input-field col-xxs-6">
                                <input id="form-client-email" type="email" class="validate" required="" aria-required="true" name="email" value="<?php echo $current_user->user_email; ?>" >
                                <label for="form-client-email">Email</label>                                
                                <span class="helper-text" data-error="Error" data-success="Good!">Required</span>
                            </div>
                        </div>
                        <!--fields for non-logged users end here-->
                        <div class="row">
                            <div class="input-field col-xxs-12">
                                <input id="form-subjet" type="text" class="validate" required="" aria-required="true">
                                <label for="form-subjet">Subjet</label>
                                <span class="helper-text" data-error="Error" name="subjet" data-success="Good!">Required</span>
                            </div>
                            <div class="input-field col-xxs-12">
                                
                                <textarea id="form-message" class="materialize-textarea" " name="message" required="" aria-required="true" data-length="400"></textarea>
                                    <label class="active" for="form-message">Message</label>
                                <span class="helper-text" data-error="Error" data-success="Good!">Required</span>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xxs-12">                              

                                <div class="visit-form">
                                    <h4 class="txt-md">Schedule a Tour</h4>
                                    <a data-toggle="collapse" href="#collapse-book-visit" aria-expanded="false">
                                        <span><i class="tz-plus waves-effect waves-circle"></i></span>
                                        <span><i class="tz-minus-sm waves-effect waves-circle"></i></span>
                                    </a>
                                    <div class="row collapse" id="collapse-book-visit">
                                        <div class="input-field col-xs-6">
                                            <input name="schedule_date" class="datepicker" id="form-visit-date" type="text">
                                            <label for="form-visit-date">Date</label>
                                        </div>
                                        <div class="input-field col-xs-6">
                                            <input id="form-visit-time" name="schedule_time" type="text" class="timepicker">
                                            <!-- <select name="schedule_time" class="timepicker">
                                                <?php 
                                                $time_slots = explode(',', $schedule_time_slots); 
                                                foreach ($time_slots as $time) {
                                                    echo '<option value="'.trim($time).'">'.$time.'</option>';
                                                }
                                                ?>                                                
                                            </select> -->
                                            <label for="form-visit-time">Time</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xxs-12">
                                <div class="data-protection-eu-checkbox">
                                    <label for="form-accept-privacy-policy">
                                        <input id="form-accept-privacy-policy" type="checkbox" required=""  name="term_condition" aria-required="false"/>
                                        <!-- <input name="term_condition" type="checkbox"> -->
                                        <span>I have read and accept the <a href="" target="_blank">privacy policy</a>.</span>
                                    </label>
                                </div>
                                <!-- <a type="button" class="waves-effect waves-color-1 btn">Send request</a> -->
                                <button class="agent_contact_form btn waves-effect waves-color-1 btn">Send request</button>
                                <div class="data-protection-eu-alert">
                                    <h6>Basic information about data protection:</h6>
                                    <p>
                                        <?php echo $agent_forms_terms_gdpr_agreement; ?></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>                 
                </div>
            </div>
        </section> <!-- /container-->

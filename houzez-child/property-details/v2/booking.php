<?php
global $post;
$booking_shortcode = get_post_meta($post->ID, 'fave_booking_shortcode', true);

if(!empty($booking_shortcode)) {
?>
<section class="property-detail-booking">
        <div id="online-booking" class="id-link"></div>
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-xxs-12">
                    <h2 class="txt-lg text-center">Online Booking</h2>
                    <div class="booking-code">
                        
                        <!--Example content - DELETE-->
                        <style>
                            .booking-code{
                                text-align: center;
                            }
                        </style>
                        Shortcodes here
                        <!--DELETE UP HERE-->
                        <?php echo do_shortcode($booking_shortcode);?>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </section> <!-- /container-->
<?php  } ?>


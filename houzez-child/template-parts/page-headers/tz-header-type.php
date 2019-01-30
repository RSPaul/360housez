<?php
global $post, $splash_welcome_text, $page_head_subtitle, $adv_search_which_header_show, $adv_search_over_header_pages, $adv_search_selected_pages;

$image_id = get_post_meta($post->ID, 'fave_page_header_image', true);
$image_height = get_post_meta($post->ID, 'fave_page_header_image_height', true);
$img_url = wp_get_attachment_image_src($image_id, 'full');
$splash_welcome_text = get_post_meta($post->ID, 'fave_page_header_title', true);
$page_head_subtitle = get_post_meta($post->ID, 'fave_page_header_subtitle', true);
$page_head_search = get_post_meta($post->ID, 'fave_page_header_search', true);

$page_image_overlay = get_post_meta($post->ID, 'fave_page_header_image_overlay', true);
$page_image_opacity = get_post_meta($post->ID, 'fave_page_header_image_opacity', true);


$tz_left_image = wp_get_attachment_url (get_post_meta($post->ID, 'fave_tz_left_image', true) );
$tz_right_image = wp_get_attachment_url (get_post_meta($post->ID, 'fave_tz_right_image', true) );

$header_full_screen_type = 'screen_fix';


//Search Forms Variables 

if (houzez_search_needed()) {
    $adv_search_enable = get_post_meta($post->ID, 'fave_adv_search_enable', true);
    $adv_search = get_post_meta($post->ID, 'fave_adv_search', true);
}
if (houzez_search_needed()) {
    $adv_search_enable = get_post_meta($post->ID, 'fave_adv_search_enable', true);
    $adv_search = get_post_meta($post->ID, 'fave_adv_search', true);
    $adv_search_pos = get_post_meta($post->ID, 'fave_adv_search_pos', true);
}

if (isset($_GET['search_pos'])) {
    $search_enable = 1;
    $search_position = $_GET['search_pos'];
}



if (!is_404() && !is_search()) {
    $header_type = get_post_meta($post->ID, 'fave_header_type', true);
    $fave_header_full_screen = get_post_meta($post->ID, 'fave_header_full_screen', true);
    $header_full_screen_type = get_post_meta($post->ID, 'fave_header_full_screen_type', true);
}

if (isset($_GET['fullscreen']) && $_GET['fullscreen'] == 'yes') {
    $fave_header_full_screen = 'yes';
}

if (( $fave_header_full_screen == 'yes' && $header_full_screen_type == 'screen_fix')) {
    $fave_header_full_screen = 'banner-parallax-fix';
    $image_height = '';
} else if (( $fave_header_full_screen == 'yes' && $header_full_screen_type == 'auto_fix')) {
    $fave_header_full_screen = 'banner-parallax-auto';
    $image_height = '';
} else {
    $fave_header_full_screen = '';
    if (!empty($image_height)) {
        $image_height = 'height: ' . ( preg_match('/(px|em|\%|pt|cm)$/', $image_height) ? $image_height : $image_height . 'px' ) . ';';
    }
}

$style = '';



if (!empty($img_url[0])) {
    //$background = 'background-image: url('.esc_url( $img_url[0] ).'); ';
    //$style .= $background;
    //$style .= "position:absolute; left:";
}
?>

<?php //get_template_part('template-parts/advanced-search/half-map'); ?>

<div class="header-media-wrap">
    <div class="header-media">

        <!--My TZ Header Type start here = Add .tz-header-type class to put styles in this header-->      
            <header class="tz-header-type">
                <div class="container-fluid">
                    <!-- Middle dividing line -->
                    <div class="divisive-line"></div>

                    <div class="tz-header-wrapper">
                        <!-- Left/Up side (Sale)-->
                        <div class="visible-left">
                            <div class="tz-slides header-left" style="background-image:url(<?php echo $tz_left_image; ?>); background-size: cover; background-position: left top;">
                                <?php get_template_part('template-parts/advanced-search/desktop-left'); ?>
                            </div>                  
                        </div>
                        <!-- Right/Bottom side (Rent)-->
                        <div class="visible-right">
                            <div class="tz-slides header-right" style="background-image: url(<?php echo $tz_right_image; ?>); background-size: cover; background-position: right top;">
                                <?php get_template_part('template-parts/advanced-search/desktop-right'); ?>
                            </div>                  
                        </div>
                    </div>

                    <!-- Bottom background line -->
                    <div class="bottom-line"></div>
                </div>
            </header>
            <!-- My TZ Header Type ends here -->

    </div>
</div>

<script>
    jQuery(function ($) {
        document.getElementById('go_left').addEventListener('click', function (event){
            event.stopPropagation();
        });
        document.getElementById('go_right').addEventListener('click', function (event){
            event.stopPropagation();
        });


        $(".sale-options").click(function (event) {

            event.preventDefault();

            $(".content_style").hide('slow');
            
            $(".visible-left").animate({
                width: '100%'
            }, 1200);
            
            $(".visible-right").animate({
                width: '0%'
            }, 1100);
            
            $('.banner-search-main').show();
            
            setTimeout(function () {
                $(".visible-right").hide();                
                $(".sale-options").parents(".sale-half").next(".full-area").fadeIn("slow");
            }, 1100);
        });

        $(".show-rent-options").click(function (event) {

            event.preventDefault();

            $("p.show-rent-options").addClass('residence_vacation');
            $(".rent-info-text").hide();
            $(".rent-options").fadeIn('slow');

        });

        $(document).on("click", ".rent-options", function () {

            let status = $(this).attr('data-val');
            $('.selectpicker1').selectpicker();
            $('.status-select').hide();
            $('.'+status).show();
            $('.selectpicker1').selectpicker('val', status);
            
            if ( status == 'for-rent-vacations' ) {

                $('.rent-price').html('Price /night <span class="txt-xs txt-op-60">(USD $)</span>');
            } else {

                $('.rent-price').html('Price /month <span class="txt-xs txt-op-60">(USD $)</span>');
            }

            $(".content_style").hide('slow');
            $('.visible-right').animate({
                width: '100%'
            }, 1200);
            $(".visible-left").animate({
                width: '0%'
            }, 1100);
            $('.banner-search-main').show();
            
            setTimeout(function () {
                $(".visible-left").hide();
                $(".rent-options").parents(".rent-half").next(".full-area").fadeIn("slow");
            }, 1100);
        });


        if  (window.matchMedia('(max-width: 767px)').matches){
            $(".go_back.left").click(function(){
                $('.visible-right').delay(650).animate({"width": "100%"}, 500);
                $('.visible-left').delay(650).animate({"width": "100%"}, 500);
                $('.visible-right').show();

                setTimeout(function () {
                     $(".full-area").fadeOut("fast");
                },50);

                setTimeout(function () {               
                    
                    $(".content_left, .content_right").show('slow');
                }, 1100);
            });

            $(".go_back.right").click(function(){
                $('.visible-right').delay(650).animate({"width": "100%"}, 500);
                $('.visible-left').delay(650).animate({"width": "100%"}, 500);
                $('.visible-left').show();

                setTimeout(function () {
                     $(".full-area").fadeOut("fast");
                },50);

                setTimeout(function () {               
                    
                    $(".content_left, .content_right").show('slow');
                }, 1100);                          
            });

        } else {

            $(".go_back.left").click(function(){
            
                $(".visible-right").animate({
                    width: '50%'
                }, 1100);
                
                $('.visible-left').animate({
                    width: '50%'
                }, 1200);
                
                $(".visible-right").show();
                
                setTimeout(function () {
                     $(".full-area").fadeOut("fast");
                },50);

                setTimeout(function () {               
                    
                    $(".content_left, .content_right").show('slow');
                }, 1100);          

            });

            $(".go_back.right").click(function(){
                
                $(".visible-right").animate({
                    width: '50%'
                }, 1100);
                
                $('.visible-left').animate({
                    width: '50%'
                }, 1200);
                
                $(".visible-left").show();
                
                setTimeout(function () {
                     $(".full-area").fadeOut("fast");
                },50);

                setTimeout(function () {               
                    
                    $(".content_left, .content_right").show('slow');
                }, 1100);          

            });

        }



    });
</script>


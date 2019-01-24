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

<style type="text/css" scoped>
    .default_show.half-part-left h3 {

    padding: 10px;
    box-shadow: 0px 1px 2px #a7a7a7;

}
.default_show.half-part-left .half-area p {padding: 10px 0 0;}
.default_show.half-part-left h3 span {

    font-size: 15px;

}
.default_show.half-part-left .full-area form {margin: 10px;padding: 10px 10px 25px;
}
 .default_show.half-part-left h3 {margin:0;}
    .default_show.half-part-left{

  position:absolute;  width:100%;

}
.default_show.half-part-left .full-area {
    background: rgba(255,255,255,0.5); text-align: center; 
    max-width: 80%; width: 100%; margin:15% auto 0;
}
.default_show.half-part-left .half-area  {
    text-align: center;     background: rgba(255,255,255,0.5);   right:0; float:right;  max-width: 80%; width: 100%; margin-top:30%;
   
}

    .advanced-search {padding: 0; box-shadow: none;}
    .banner-inner-content .container {width:100%; position: absolute;}
    .banner-inner-content .banner-inner:before {
        <?php if ($page_image_overlay != '') { ?>
            background-color: <?php echo esc_attr($page_image_overlay); ?>;
        <?php } ?>
        opacity: <?php echo esc_attr($page_image_opacity); ?>;
    }
    .btn-group.bootstrap-select {
        display: none !important;
    }
    
</style>

<?php get_template_part('template-parts/advanced-search/half-map'); ?>

<div class="header-media-wrap">
    <div class="header-media">
        <div class="banner-parallax <?php echo esc_attr($fave_header_full_screen); ?>" 
        <?php
        if (!empty($image_height)) {
            echo "style='$image_height'";
        };
        ?>>
            <!--<div class="banner-caption" >
                <?php if ($page_head_search != 'yes') { ?>
                    <h1><?php echo esc_attr($splash_welcome_text); ?></h1>
                    <h2><?php echo esc_attr($page_head_subtitle); ?></h2>
                <?php } ?>
            </div>-->

            <div class="banner-bg-wrap">
                <div class="banner_inner banner-inner-left" style="background-image:url(<?php echo esc_url($img_url[0]); ?>); background-size: 100% 100%;">                    
                    <div class="banner-inner-content search-bar search-salebar">
                        <?php
                        if (houzez_search_needed()) {
                            if ((!empty($adv_search_enable) && $adv_search_enable != 'global')) {
                                if ($adv_search_pos == 'under_banner') {
                                    if ($adv_search == 'show' || $adv_search == 'hide_show') {
                                        get_template_part('template-parts/advanced-search', 'undermenu');
                                    }
                                }
                            } else {
                                if (!is_home() && !is_singular('post')) {
                                    if ($search_enable != 0 && $search_position == 'under_banner') {
                                        if ($search_pages == 'only_home') {

                                            if (is_front_page()) {
                                                get_template_part('template-parts/advanced-search', 'undermenu');
                                            }
                                        } elseif ($search_pages == 'all_pages') {
                                            get_template_part('template-parts/advanced-search', 'undermenu');
                                        } elseif ($search_pages == 'only_innerpages') {
                                            if (!is_front_page()) {
                                                get_template_part('template-parts/advanced-search', 'undermenu');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="banner_inner banner-inner-right" style="background-image:url(<?php echo site_url(); ?>/wp-content/uploads/revslider/home-hero/49.jpg); background-size: 100% 100%;">                    
                    <div class="banner-inner-content search-bar search-rentbar">
                        <div class="right_rent_part">
                            <?php
                            if (houzez_search_needed()) {
                                if ((!empty($adv_search_enable) && $adv_search_enable != 'global')) {
                                    if ($adv_search_pos == 'under_banner') {
                                        if ($adv_search == 'show' || $adv_search == 'hide_show') {
                                            get_template_part('template-parts/advanced-search', 'undermenu');
                                        }
                                    }
                                } else {
                                    if (!is_home() && !is_singular('post')) {
                                        if ($search_enable != 0 && $search_position == 'under_banner') {
                                            if ($search_pages == 'only_home') {

                                                if (is_front_page()) {
                                                    get_template_part('template-parts/advanced-search', 'undermenu');
                                                }
                                            } elseif ($search_pages == 'all_pages') {
                                                get_template_part('template-parts/advanced-search', 'undermenu');
                                            } elseif ($search_pages == 'only_innerpages') {
                                                if (!is_front_page()) {
                                                    get_template_part('template-parts/advanced-search', 'undermenu');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php
//    if ($adv_search_which_header_show['header_image'] != 0) {
//        if ($adv_search_over_header_pages == 'only_home') {
//            if (is_front_page()) {
//                get_template_part('template-parts/advanced-search/desktop', 'type2');
//            }
//        } else if ($adv_search_over_header_pages == 'all_pages') {
//            get_template_part('template-parts/advanced-search/desktop', 'type2');
//        } else if ($adv_search_over_header_pages == 'only_innerpages') {
//            if (!is_front_page()) {
//                get_template_part('template-parts/advanced-search/desktop', 'type2');
//            }
//        } else if ($adv_search_over_header_pages == 'specific_pages') {
//            if (is_page($adv_search_selected_pages)) {
//                get_template_part('template-parts/advanced-search/desktop', 'type2');
//            }
//        }
//    }
    ?>

</div>

<script>
    jQuery(function ($) {
        $(".banner-inner-left").click(function () {
            $(".half-area").hide();
            $(this).animate({
                width: '100%'
            }, 1200);
            
            $(".banner-inner-right").animate({
                width: '0%'
            }, 1100);
            
            $('.banner-search-main').show();
            
            setTimeout(function () {
                $(".banner-inner-right").hide();                
                $(".full-area").fadeIn("slow");
            }, 1100);
        });

        $(".banner-inner-right").click(function () {
            $(".banner-inner-left").animate({
                width: '0%'
            }, 1100);
            $(this).animate({
                width: '100%'
            }, 1200);
            $('.banner-search-main').show();
            setTimeout(function () {
                $(".banner-inner-left").hide();
            }, 1100);
        });

    });
</script>
<style type="text/css">
    .banner_inner {
        float: left;
        width: 50%;
        height: 100vh;
    }
</style>

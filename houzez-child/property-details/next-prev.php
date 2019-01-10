<div class="property-detail-fixed-nav bg-white sticky-navbar" id="sticky_navbar">
        <!-- <div class="container-fluid"> -->
            <div class="row">
                <div class="col-xxs-12">
                    <div class="fixed-inner-wrapp bg-black">
                        <div class="flex-container">
                            <!--Previus Property-->
                            <?php
                            $prevPost = get_previous_post(false);
                            if($prevPost) {
                                $args = array(
                                    'post_type' => 'property',
                                    'posts_per_page' => 1,
                                    'include' => $prevPost->ID
                                );
                                $prevPost = get_posts($args);
                                foreach ($prevPost as $post) {
                                setup_postdata($post);
                                ?>
                                <div class="flex-item">
                                    <a href="<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="right" title="Previous property"><i class="tz-chevron-left"></i></a>
                                </div>
                                <div class="flex-item">
                                    <ul class="list-block flex-container">
                                        <!--Title-->
                                        <li>
                                            <span class="txt-h-medium txt-md txt-white"><?php the_title(); ?></span>
                                        </li>
                                        <!--Property Type-->
                                        <li>
                                            <span class="txt-h-medium txt-sm txt-gray-1 text-uppercase">Type</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- <div class="prev-box pull-left">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><i class="tz-chevron-left"></i> <?php esc_html_e('PREVIOUS PROPERTY', 'houzez'); ?></a></h3>
                                            <h4><?php the_title(); ?></h4>
                                        </div>
                                    </div>
                                </div> -->
                                    <?php
                                    wp_reset_postdata();
                                } //end foreach
                            } // end if
                            ?>

                            <?php 
                                $nextPost = get_next_post(false);
                                if($nextPost) {
                                    $args = array(
                                        'post_type' => 'property',
                                        'posts_per_page' => 1,
                                        'include' => $nextPost->ID
                                    );
                                    $nextPost = get_posts($args);
                                    foreach ($nextPost as $post) {
                                    setup_postdata($post);
                                    ?>

                                    <div class="flex-item">
                                        <ul class="list-inline flex-container">
                                            <li>
                                                <a href="#contact-agent" class="btn waves-effect waves-color-1 z-depth-0 bd-white">Contact an Agent</a>
                                            </li>
                                            <li>
                                                <a href="#online-booking" class="btn waves-effect waves-color-1 z-depth-0 bd-gradient">Online Booking</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--Next Property-->
                                    <div class="flex-item">
                                        <a href=""<?php the_permalink(); ?>" data-toggle="tooltip" data-placement="left" title="Next property"><i class="tz-chevron-right"></i></a>
                                    </div>

                                    <!-- <div class="next-box pull-right">
                                        <div class="media">
                                            <div class="media-body media-middle text-right">
                                                <h3 class="media-heading"><a href="<?php the_permalink(); ?>"><?php esc_html_e('NEXT PROPERTY', 'houzez'); ?> <i class="tz-chevron-right"></i></a></h3>
                                                <h4><?php the_title(); ?></h4>
                                            </div>
                                            <div class="media-right">
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                            </div>
                                        </div>
                                    </div> -->
                                        <?php
                                        wp_reset_postdata();
                                    } //end foreach
                                } // end if
                                ?>                            
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>

<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("sticky_navbar");
    var sticky = header.offsetTop;

    function myFunction() {
        console.log('here ', sticky , window.pageYOffset);
      if (window.pageYOffset > 740) {
        header.classList.add("sticky_sec");
      } else {
        header.classList.remove("sticky_sec");
      }
    }
</script>
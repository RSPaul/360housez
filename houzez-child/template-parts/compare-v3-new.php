<?php

global $post, $prop_images, $houzez_local, $current_page_template, $taxonomy_name;

$disable_compare = houzez_option('disable_compare');

// echo "<pre>";
// print_r($_SESSION['houzez_compare_properties']);
// echo "</pre>";

// if( $disable_compare != 0 ) { ?>

    <a class="card-compare no-style compare-property" role="button"  title="<?php esc_html_e( 'Compare', 'houzez' ); ?>" data-toggle="tooltip" data-placement="left" data-propid="<?php echo esc_attr( $post->ID ); ?>">
        <i class="tz-compare waves-effect waves-circle"></i>
    </a>
    <!-- <li>
        <span id="compare-link-<?php echo esc_attr( $post->ID ); ?>" class="compare-property" data-propid="<?php echo esc_attr( $post->ID ); ?>" data-toggle="tooltip" data-placement="top" title="<?php esc_html_e( 'Compare', 'houzez' ); ?>">
            <i class="fa fa-plus"></i>
        </span>
    </li> -->
<?php //} ?>

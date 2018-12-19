<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/








// Get revolution sliders
if( !function_exists('houzez_get_revolution_slider') ) {
    function houzez_get_revolution_slider()
    {
        global $wpdb;
        $catList = array();
        //Revolution Slider
        if (is_plugin_active('revslider/revslider.php')) {
            $sliders = $wpdb->get_results($q = "SELECT * FROM " . $wpdb->prefix . "revslider_sliders ORDER BY id");

            // Iterate over the sliders
            $catList = array();
            foreach ($sliders as $key => $item) {
                $catList[$item->alias] = stripslashes($item->title);
            }
        }

        return $catList;
    }
}

/*-----------------------------------------------------------------------------------*/
// Get terms array
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'houzez_get_terms_array' ) ) {
    function houzez_get_terms_array( $tax_name, &$terms_array ) {
        $tax_terms = get_terms( $tax_name, array(
            'hide_empty' => false,
        ) );
        houzez_add_term_children( 0, $tax_terms, $terms_array );
    }
}


if ( ! function_exists( 'houzez_add_term_children' ) ) :
    function houzez_add_term_children( $parent_id, $tax_terms, &$terms_array, $prefix = '' ) {
        if ( ! empty( $tax_terms ) && ! is_wp_error( $tax_terms ) ) {
            foreach ( $tax_terms as $term ) {
                if ( $term->parent == $parent_id ) {
                    $terms_array[ $term->slug ] = $prefix . $term->name;
                    houzez_add_term_children( $term->term_id, $tax_terms, $terms_array, $prefix . '- ' );
                }
            }
        }
    }
endif;


/*------------------------------------------------------------------------
* Meta for rental, wpbookingcalendar plugin required
*-----------------------------------------------------------------------*/
add_filter( 'houzez_theme_meta', 'houzez_theme_meta_rental_filter', 8, 1 );

function houzez_theme_meta_rental_filter( $meta_boxes ) {

    $houzez_prefix = 'fave_';

    $meta_boxes[0]['tabs']['listing_rental'] = Array (
        'label' => esc_html__('Rental Details', 'houzez'),
        'icon' => 'dashicons-layout',
    );

    $meta_boxes[0]['fields'][450] = array(
            'id' => "{$houzez_prefix}booking_shortcode",
            'name' => esc_html__('Booking Shortcode', 'houzez'),
            'desc' => esc_html__('Enter booking form shortcode. E.g [booking]', 'houzez'),
            'type' => 'text',
            'placeholder' => '[booking]',
            'std' => "",
            'columns' => 12,
            'tab' => 'listing_rental',
        );

    $meta_boxes = apply_filters('houzez_theme_meta_rental', $meta_boxes);

    return $meta_boxes;

}

?>
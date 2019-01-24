<?php
//Template Name: Test


get_header();


echo "<br/><br/><br/><br/><br/>";
echo "<pre>";
?>






<?php 
$houzez_beach_terms = get_terms( array(
    'taxonomy' => 'beaches',
    'hide_empty' => false,
) );


$beach_array = array();
if (!empty($houzez_beach_terms)) {
    foreach ($houzez_beach_terms as $beach_texonomy ) {
    	$slug=$beach_texonomy->slug;
    	$name=$beach_texonomy->name;    	
        $beach_array[$slug] = $name;
    }
}


print_r($beach_array);

?>






<?php 
get_footer();
?>
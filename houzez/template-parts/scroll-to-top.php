<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 04/10/16
 * Time: 8:17 PM
 * Since v1.4.0
 */
$site_scroll_top = houzez_option('site_scroll_top');
if( $site_scroll_top != 0 ) {
?>
<a id="back-to-top" href="#" role="button" class="no-style back-to-top" title="Back to top" data-toggle="tooltip" data-placement="left">
	<i class="tz-chevron-up waves-effect waves-circle"></i>
</a>
<?php } ?>

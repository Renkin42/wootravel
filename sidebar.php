<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Woo_Traveller
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
</div>
<div class="col-sm-4">
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->

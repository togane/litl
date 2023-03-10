<?php
/**
 * The Page sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leanex Lite
 */
if ( ! is_active_sidebar( 'sidebar-page' ) ) {
	return;
} ?>

<aside id="secondary" class="widget-area col-md-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-page' ); ?>
</aside><!-- #secondary -->

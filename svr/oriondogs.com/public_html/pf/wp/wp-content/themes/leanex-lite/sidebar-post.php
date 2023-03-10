<?php
/**
 * The Post sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leanex Lite
 */

if ( ! is_active_sidebar( 'sidebar-post' ) ) {
	return;
} ?>

<aside id="secondary" class="widget-area col-md-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-post' ); ?>
</aside><!-- #secondary -->

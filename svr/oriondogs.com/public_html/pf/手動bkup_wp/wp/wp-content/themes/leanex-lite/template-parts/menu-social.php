<?php
/**
 * Template part for display social profiles menu.
 * @package Leanex Lite
 */
?>

<?php
/*
 * Social Media Icons
 */
if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
		'theme_location'  => 'social',
		'container_class' => 'footer-social', 
		'menu_id'         => 'menu-social',
		'depth'           => 1,
		'link_before'     => '<span class="screen-reader-text">',
		'link_after'      => '</span>',
		'fallback_cb'     => '',
		)
	);
}
?>
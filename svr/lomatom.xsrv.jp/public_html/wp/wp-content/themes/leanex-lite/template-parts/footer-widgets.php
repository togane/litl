<?php
/**
 * Template part for widgets area on the footer.
 * @package Leanex Lite
 */
?>

<?php if ( is_active_sidebar( 'footer' ) && ! get_theme_mod( 'footer-columns' ) ) { ?>
		<div class="row footer-widgets">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>
<?php } if ( get_theme_mod( 'footer-columns' ) == 'two-col' ) { ?>
		<div class="row footer-widgets">
			<?php dynamic_sidebar( 'footer-one' ); ?>
			<?php dynamic_sidebar( 'footer-two' ); ?>
		</div>
<?php } if ( get_theme_mod( 'footer-columns' ) == 'three-col' ) { ?>
		<div class="row footer-widgets">
			<?php dynamic_sidebar( 'footer-one' ); ?>
			<?php dynamic_sidebar( 'footer-two' ); ?>
			<?php dynamic_sidebar( 'footer-three' ); ?>
		</div>
<?php } if ( get_theme_mod( 'footer-columns' ) == 'four-col' ) { ?>
		<div class="row footer-widgets">
			<?php dynamic_sidebar( 'footer-one' ); ?>
			<?php dynamic_sidebar( 'footer-two' ); ?>
			<?php dynamic_sidebar( 'footer-three' ); ?>
			<?php dynamic_sidebar( 'footer-four' ); ?>
		</div>
<?php } ?>
<?php
/**
 * Template part for displaying front-page section.
 * @package Leanex Lite
 */
?>

<?php if ( is_active_sidebar( 'home-widgets-one' ) ) { ?>
<section id="home-widgets" class="section-widget text-left">
<div class="container">
<?php
	if ( get_theme_mod( 'section-widgets-title' ) || get_theme_mod( 'section-widgets-subtitle' ) ) {
?>
		<div class="section-title center">
	<?php
		if ( get_theme_mod( 'section-widgets-title' ) ) {
	?>
               			<h2><?php echo esc_html( get_theme_mod( 'section-widgets-title' ) ); ?></h2>
	<?php
		}
		if ( get_theme_mod( 'section-widgets-subtitle' ) ) {
	?>
               			<p><?php echo esc_html( get_theme_mod( 'section-widgets-subtitle' ) ); ?></p>
	<?php
		}
	?>
		</div>
<?php
	}
?>
		<div class="row">
<?php
	if ( get_theme_mod( 'section-one-layout' ) == '5' ) { ?>

<div class="col-md-8 col-md-offset-2">
<div id="widgets-slider-one" class="owl-carousel owl-theme">
<?php
	} ?>
			<?php dynamic_sidebar( 'home-widgets-one' ); ?>

<?php
	if ( get_theme_mod( 'section-one-layout' ) == '5' ) { ?>

</div>
</div>
<?php
	} ?>
		</div><!-- .row -->

</div>
</section>
<?php } ?>
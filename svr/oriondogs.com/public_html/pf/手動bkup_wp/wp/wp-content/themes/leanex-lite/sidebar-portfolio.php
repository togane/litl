<?php
/**
 * @package Planar
 */
if ( ! is_active_sidebar( 'portfolio' ) && get_theme_mod( 'layout-single-projects' ) != 'alt' ) {
	return;
} ?>

<aside id="secondary" class="widget-area col-md-4" role="complementary">	
	<?php
		if ( get_theme_mod( 'layout-single-projects' ) == 'alt' ) {
			do_action( 'portfolio_summary' );
			the_post_navigation( array(
				'next_text' => '<i class="fa fa-angle-right"></i>',
				'prev_text' => '<i class="fa fa-angle-left"></i>',
			) );
		}
		?>
		<?php dynamic_sidebar( 'portfolio' ); ?>
</aside><!-- #secondary -->


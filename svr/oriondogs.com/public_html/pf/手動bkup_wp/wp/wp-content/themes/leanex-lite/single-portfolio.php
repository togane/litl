<?php
/**
 * The Template for displaying all single projects.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header(); ?>

<?php get_template_part( 'template-parts/headline', 'portfolio' ); ?>

<div id="primary" class="content-area container">
	<div id="post-single" class="row">

	<main id="main" class="site-main col-md-8<?php if ( !is_active_sidebar( 'portfolio' ) && get_theme_mod( 'layout-single-projects' ) != 'alt' ) { ?> col-md-offset-2<?php } ?>" role="main">

<?php

		while ( have_posts() ) : the_post();


		if ( get_theme_mod( 'layout-single-projects' ) == 'alt' ) {
			get_template_part( 'template-parts/content-single-portfolio', 'alt' );
		} else {
			get_template_part( 'template-parts/content-single-portfolio' );
		}

		if ( get_theme_mod( 'layout-single-projects' ) != 'alt' ) {
			the_post_navigation( array(
					    'next_text' => '<i class="fa fa-angle-right"></i>',
					    'prev_text' => '<i class="fa fa-angle-left"></i>',
					) );
		}
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php if ( is_active_sidebar( 'portfolio' ) || get_theme_mod( 'layout-single-projects' ) == 'alt' ) { get_sidebar( 'portfolio' ); } ?>

	</div><!-- #post-single -->
</div><!-- #primary -->

<?php
get_footer();
<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Leanex Lite
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<div id="post-single" class="row">

	<main id="main" class="site-main col-md-8<?php leanex_lite_main_class(); ?>" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation( array(
					    'next_text' => '<i class="fa fa-angle-right"></i>',
					    'prev_text' => '<i class="fa fa-angle-left"></i>',
					) );


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php get_sidebar( 'post' ); ?>

	</div><!-- #post-single -->
</div><!-- #primary -->

<?php
get_footer();
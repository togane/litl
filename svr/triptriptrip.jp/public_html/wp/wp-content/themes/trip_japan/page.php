<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
	<div id="ming_menu">
		<div class="gnav_area"><?php get_template_part( 'template-parts/gnav' ); ?></div>
		<div class="page_breadcrumb"><div><?php breadcrumb(); ?></div></div>
	</div>

	<div class="sect_wrap">
		<section id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</section><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();

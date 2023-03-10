<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

	<div id="ming_menu">
		<div class="gnav_area">
			<?php get_template_part( 'template-parts/gnav' ); ?>
		</div>
	</div>

	<div class="sect_wrap">
		<section id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
						the_archive_title( '<h2 class="page-title">', '</h2>' );
					?>
				</header><!-- .page-header -->


				<?php
				// Start the Loop.
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content/content', 'excerpt' );

					// End the loop.
				endwhile;

				// Previous/next page navigation.
				twentynineteen_the_posts_navigation();

				// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>

			<div><?php dynamic_sidebar( 'sidebar-4' ); ?></div>
			</main><!-- #main -->
		</section><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();

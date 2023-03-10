<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leanex Lite
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">
	
	<?php //do_action( 'above_blog_section' ); ?>
	<img src="" alt="メインイメージ★">
		
	<!-- Blog Section -->
	<section id="blog" class="blog-section<?php if ( get_theme_mod( 'layout-blog' ) == 'list' ) { echo esc_html( ' text-center' ); } ?>">

	<?php do_action( 'top_blog_posts' ); ?>

<?php
	if ( have_posts() ) :

		if ( get_theme_mod( 'layout-blog' ) != 'list' ) {
			echo '<div id="blog-masonry" class="row">';
		} else {
			echo '<div id="blog-list" class="column-list">';
		}

	while ( have_posts() ) : the_post();

		if ( get_theme_mod( 'layout-blog' ) == 'list' ) {
			echo '<div class="row">';
		}
		
			get_template_part( 'template-parts/content', get_post_format() );

		if ( get_theme_mod( 'layout-blog' ) == 'list' ) {
			echo '</div>';
		}

	endwhile;
?>

			</div><!-- #blog -->

<?php
		leanex_lite_pagination();
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif; ?>

	</section>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
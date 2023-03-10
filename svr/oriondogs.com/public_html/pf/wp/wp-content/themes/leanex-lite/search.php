<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Leanex Lite
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main row" role="main">
	<div id="search-result" class="col-md-8 col-md-offset-2">

<?php
	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'search' );

		endwhile;

			leanex_lite_pagination();

	else :
			get_template_part( 'template-parts/content', 'none' );

	endif; ?>

	</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
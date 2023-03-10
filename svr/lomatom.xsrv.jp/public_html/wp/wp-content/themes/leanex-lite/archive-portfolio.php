<?php
/**
 * The Template for displaying project archives, including the main showcase page which is a post type archive.
 */
get_header(); ?>

<?php get_template_part( 'template-parts/headline', 'portfolio' ); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">
	
	<?php get_template_part( 'template-parts/content-archive', 'portfolio' ); ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
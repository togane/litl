<?php
/**
 * Template Name: Child Grid Page
 *
 * This is the template that displays grid of the child pages.
 *
 * @package Leanex Lite
 */

get_header(); ?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area container">
	<div id="page">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			
<!-- ChildGrid -->
	<?php
		$child_pages = new WP_Query( array(
			'post_type'      => 'page',
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
			'post_parent'    => $post->ID,
			'posts_per_page' => 999,
			'no_found_rows'  => true,
		) );
	?>

	<?php
		if ( $child_pages->have_posts() ) : ?>
		<div class="row">
				<?php
					while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
			<div class="col-md-6">
						<?php get_template_part( 'template-parts/content', 'child-page' ); ?>
			</div>
				<?php
					endwhile; ?>
		</div>
	<?php
		endif;
		wp_reset_postdata();
	?>
<!-- ChildGrid -->

		</main><!-- #main -->
	</div><!-- #page -->
</div><!-- #primary -->

<?php
get_footer();
<?php
/**
 * The template for displaying project content in the single-project.php template
 */
?>

<article id="project-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
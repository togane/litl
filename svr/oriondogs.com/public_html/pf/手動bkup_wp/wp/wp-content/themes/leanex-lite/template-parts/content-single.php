<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leanex Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'leanex-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //if ( 1 != get_theme_mod( 'hide-single-posted', 0 ) ) { leanex_lite_posted_on(); } ?>
		<?php //if ( 1 != get_theme_mod( 'hide-single-meta', 0 ) ) { leanex_lite_entry_footer(); } ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
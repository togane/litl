<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leanex Lite
 */
?>


<article id="post-<?php the_ID(); ?>">
	<h3>
		<a href="<?php the_permalink(); ?>" rel="bookmark">
			<?php
				if ( get_the_title() ) {
					the_title('', ': ');
				} else {
					esc_html_e( 'No Title: ', 'leanex-lite');
				} ?>
		</a>
	</h3>
</article>
<hr>

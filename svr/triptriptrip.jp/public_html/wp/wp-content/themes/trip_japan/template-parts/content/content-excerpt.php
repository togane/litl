<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php $cat = get_the_category(); $catname = $cat[0]->cat_name; $catslug = $cat[0]->slug; ?>
		
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<span class="date">
				<?php the_time('Y.m.d'); ?>
			</span>
			<span class="<?php echo $catslug; ?> label">
				<?php echo $catname; ?>
			</span>
			<span class="news-title">
				<?php echo wp_trim_words( get_the_title(), 56, '…' ); ?>
				<?php
				$span = "<span class='r_yazirusi'>＞</span>";
				echo $span; ?>
			</span>
		</a>
	</header><!-- .entry-header -->

	<?php twentynineteen_post_thumbnail(); ?>
	
	
	<footer class="entry-footer">
		<?php twentynineteen_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-${ID} -->

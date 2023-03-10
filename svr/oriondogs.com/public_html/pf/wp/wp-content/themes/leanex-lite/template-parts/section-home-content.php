<?php
/**
 * Front Page content section
 * 
 * @package Leanex Lite
 */
?>

<?php while ( have_posts() ) : the_post(); ?>

<section id="home-content">
<div class="container">

<?php
	if ( get_theme_mod( 'page-content-title' ) || get_theme_mod( 'page-content-subtitle' ) ) {
?>
		<div class="section-title center">
	<?php
		if ( get_theme_mod( 'page-content-title' ) ) {
	?>
               			<h2><?php echo esc_html( get_theme_mod( 'page-content-title' ) ); ?></h2>
	<?php
		}
		if ( get_theme_mod( 'page-content-subtitle' ) ) {
	?>
               			<p><?php echo esc_html( get_theme_mod( 'page-content-subtitle' ) ); ?></p>
	<?php
		}
	?>
		</div>
<?php
	}
?>

		<div class="entry-content">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_content(); ?>
				<?php edit_post_link( esc_html__( 'Edit', 'leanex-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
			</article><!-- #post-## -->
		</div><!-- .entry-content -->

</div>
</section>

<?php endwhile; // end of the loop. ?>
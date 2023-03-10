<?php
/**
 * Template part for displaying image format posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leanex Lite
 */
?>

<?php
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'leanex-lite-small' );
	if  ( $thumbnail ) {
		$thumbnail = $thumbnail[0];
	}
	if ( get_theme_mod( 'layout-blog' ) != 'list' ) {
		$layout = 'col-md-4 col-sm-6 post-box';
	} else {
		$layout = 'col-md-8 col-md-push-2 post-list';
	}
?>

<div class="<?php echo esc_html( $layout ); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( $thumbnail ) : ?>
		<a href="<?php the_permalink(); ?>">
			<div class="image-title"><?php the_title('<h3>','</h3>'); ?></div>
			<img src="<?php echo esc_url( $thumbnail ); ?>" class="img-responsive" />
			<span class="overlay-image"></span>
		</a>
	<?php endif; ?>

	</article>
</div>
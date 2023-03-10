<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leanex Lite
 */
?>

<?php
	if ( get_theme_mod( 'layout-blog' ) != 'list' ) {
		$layout = 'col-md-4 col-sm-6 post-box';
	} else {
		$layout = 'col-md-10 col-md-push-1 post-list';
	}
?>

<div class="<?php echo esc_html( $layout ); ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
	if ( has_post_thumbnail() ) :
	?>
		<a href="<?php the_permalink(); ?>">
			<?php
				$thumbnail_id = get_post_thumbnail_id();
					if ( get_theme_mod( 'layout-blog' ) == 'list' ) {
						$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'leanex-lite-horizont', true );
					} else {
						$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'leanex-lite-medium', true );
					}
				$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
				?>
			<img src="<?php echo esc_url( $thumbnail_url[0] ); ?>" alt="<?php echo esc_attr( $thumbnail_meta ); ?>" class="post-img" />
		</a>
<?php
	endif;
	// has_post_thumbnail()
	
	if ( get_theme_mod( 'layout-blog' ) == 'list' ) {
		echo '<div class="entry-box col-md-8 col-md-push-2 text-center">';
	}
	if ( get_theme_mod( 'layout-blog' ) != 'list' ) {
		echo '<div class="entry-frame">';
	}

	if ( 1 != get_theme_mod( 'hide-post-date', 0 ) ) {
		//leanex_lite_post_metadate();
	}
	
	the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

	if ( 1 != get_theme_mod( 'hide-post-author', 0 ) ) {
		//get_template_part( 'template-parts/post', 'meta-author' );
	}
	if ( 1 != get_theme_mod( 'hide-post-meta', 0 ) ) {
		//get_template_part( 'template-parts/post', 'meta-cat' );
	}

	if ( 1 != get_theme_mod( 'hide-excerpt', 0 ) ) {
	?>
		<!--<div class="entry-summary">
			<?php // the_excerpt(); ?>
		</div>-->
<?php
	}
	if ( 1 != get_theme_mod( 'hide-link-more', 0 ) && has_excerpt() ) { ?>
		<div class="footer-meta">
			<a href="<?php the_permalink(); ?>" class="read-more">
				<?php echo esc_html( get_theme_mod( 'custom-link-more' ) ); ?>
			</a>
		</div>
<?php
	}
	if ( get_theme_mod( 'layout-blog' ) == 'list' || has_post_thumbnail() && get_theme_mod( 'layout-blog' ) != 'list' ) {
		echo '</div>';
	}
?>

</article>
</div>
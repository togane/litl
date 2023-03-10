<?php
/**
 * Template part for displaying front-page section.
 * @package Leanex Lite
 */
?>

<!-- Blog Section -->
<section id="blog" class="blog-section">
<div class="container">

<?php
	if ( get_theme_mod( 'recent-posts-title' ) || get_theme_mod( 'recent-posts-subtitle' ) ) {
?>
		<div class="section-title center">
	<?php
		if ( get_theme_mod( 'recent-posts-title' ) ) {
	?>
               			<h2><?php echo esc_html( get_theme_mod( 'recent-posts-title' ) ); ?></h2>
	<?php
		}
		if ( get_theme_mod( 'recent-posts-subtitle' ) ) {
	?>
               			<p><?php echo esc_html( get_theme_mod( 'recent-posts-subtitle' ) ); ?></p>
	<?php
		}
	?>
		</div>
<?php
	}
?>

	<div class="home-section">
<?php
    	/*	$limit_num = esc_attr( get_theme_mod( 'num-posts', 6 ) );
    		$catID = esc_attr( get_theme_mod( 'recent-posts-category' ) );

			if ( $catID ) {
				$args = array(
					'posts_per_page'	=> $limit_num,
					'category__in' 		=> $catID,
					'post_status' 		=> 'publish',
				);
			} else {
				$args = array(
					'post_status' 		=> 'publish',
					'posts_per_page' 	=> $limit_num,
				);
			}
		$q = new WP_Query( $args );*/ ?>

<?php
		if ( $q->have_posts() ) : ?>

	<div id="blog-masonry" class="row">
<?php
		while( $q->have_posts() ): $q->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		endwhile; ?>

	</div>

<?php
		endif;
		wp_reset_postdata(); ?>

	</div><!-- .home-section -->

</div>
</section><!-- #blog -->
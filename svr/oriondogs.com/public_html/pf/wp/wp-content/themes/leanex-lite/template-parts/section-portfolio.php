<?php
/**
 * Template part for displaying front-page section.
 *
 * @package Leanex Lite
 */
?>

<!-- Portfolio Section -->

<section id="portfolio">
<div class="container">

<?php
	if ( get_theme_mod( 'portfolio-section-title' ) || get_theme_mod( 'portfolio-section-subtitle' ) ) {
		echo '<div class="section-title center">';

		if ( get_theme_mod( 'portfolio-section-title' ) ) {
			echo '<h2>' . esc_html( get_theme_mod( 'portfolio-section-title' ) ) . '</h2>';
		}
		if ( get_theme_mod( 'portfolio-section-subtitle' ) ) {
            echo '<p>' . esc_html( get_theme_mod( 'portfolio-section-subtitle' ) ) . '</p>';
		}
		echo '</div>';
	}
	?>

	<div class="categories">
		<div class="portfolio-cat filterable text-center">
		
				<?php
					if ( class_exists( 'Portfolio_Post_Type' ) ) {
						$loop_terms = 'portfolio_category';
						$terms = get_terms( 'portfolio_category' );
					?>
						<ol class="type">
							<li>
								<a href="javascript:void(0);" id="filter-close" class="active" data-filter="*"><?php esc_html_e( 'All' , 'leanex-lite' ); ?></a>
							</li>
				<?php
						foreach( $terms as $term ) {
							echo '<li><a href="javascript:void(0);" data-filter=".' . esc_attr( $term->term_id ) .'">' . esc_html( $term->name ) . '</a></li>';
						}
					}
					?>
						</ol>
		</div><!-- END .filter-group -->
      </div>

<?php
	$numberposts = esc_attr( get_theme_mod( 'num-projects', 6 ) );

	$args = array(
				'post_type'      => 'portfolio',
            	'post_status' => 'publish',
            	'numberposts' => $numberposts
        		);

        	$home_posts = get_posts($args);

	if( $home_posts ) {
	?>

		<div id="portfolio-masonry" class="row">

<?php
	foreach( $home_posts as $post ) : setup_postdata( $post );

		// get term for filter class
		$terms =  get_the_terms( $post->ID, 'portfolio_category' );
		$term_list = null;
			if( is_array($terms) ) {
				foreach( $terms as $term ) { $term_list .= $term->term_id; $term_list .= ' '; }
			}

	?>

          <div class="col-sm-6 col-md-4 col-lg-4<?php if ( $term_list ) { echo ' ' . esc_html( $term_list ); } ?>">
          <?php
				if ( get_theme_mod( 'front-layout-projects' ) == 'masonry-caption' ) {
					get_template_part( 'template-parts/portfolio-item', 'caption' );
				} else {
					get_template_part( 'template-parts/portfolio-item' );
				}
				?>
           </div><!-- .col-sm-6 -->

<?php

	endforeach;
	wp_reset_postdata();

	} // if( $home_posts )
	?>

		</div><!-- #portfolio-masonry -->

</div>
</section>
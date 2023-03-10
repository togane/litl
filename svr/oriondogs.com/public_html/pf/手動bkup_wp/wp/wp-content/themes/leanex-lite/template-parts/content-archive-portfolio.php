<?php
/**
 * The Template for displaying project archives, including the main showcase page which is a post type archive.
 */
?>

<?php
if ( have_posts() ) :
	if ( 1 != get_theme_mod( 'filterable-portfolio', 0 ) || is_tax( array( 'portfolio_category' ) ) ) {
	
		echo '<div id="project-top" class="portfolio-cat not-filterable text-center">';

		$args = array(
               'taxonomy' => 'portfolio_category',
               'orderby' => 'name',
               'order'   => 'ASC'
		);
		$cats = get_categories($args);

		foreach($cats as $cat) {
		?>
		<a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>"><?php echo esc_html( $cat->name ); ?></a>
<?php
		}
		
	} else {

		echo '<div id="project-top" class="portfolio-cat filterable text-center">';
			}
		if ( ! is_tax( array( 'portfolio_category' ) ) && 1 == get_theme_mod( 'filterable-portfolio', 0 ) ) {
		?>

              <ol class="type">
					<li>
						<a href="javascript:void(0);" id="filter-close" class="active" data-filter="*"><?php esc_html_e( 'All' , 'leanex-lite' ); ?></a>
					</li>

				<?php
					$args = array(
							'taxonomy' => 'portfolio_category',
							'hide_empty' => true,
					);
					$terms = get_terms( $args );

					foreach( $terms as $term ) {
						echo '<li><a href="javascript:void(0);" data-filter=".' . esc_attr( $term->term_id ) .'">' . esc_html( $term->name ) . '</a></li>';
					} ?>
                </ol>
<?php
		}
		?>
</div>
<!-- #project-top -->

<div id="portfolio-masonry" class="row">

<?php
	while ( have_posts() ) : the_post();

	if ( ! is_tax( array( 'portfolio_category' ) ) && 1 == get_theme_mod( 'filterable-portfolio', 0 ) ) {
	// get term for filter class
	$terms =  get_the_terms( $post->ID, 'portfolio_category' );
	$term_list = null;
		if( is_array($terms) ) {
			foreach( $terms as $term ) { $term_list .= $term->term_id; $term_list .= ' '; }
		}
	}
	?>
		<div class="col-sm-6 col-md-4 col-lg-4<?php if ( ! is_tax( array( 'portfolio_category' ) ) && 1 == get_theme_mod( 'filterable-portfolio', 0 ) && $term_list ) { echo ' ' . esc_html( $term_list ); } ?>">
           <?php
				if ( get_theme_mod( 'layout-projects' ) == 'masonry-caption' ) {
					get_template_part( 'template-parts/portfolio-item', 'caption' );
				} else {
					get_template_part( 'template-parts/portfolio-item' );
				}
				?>
		</div>

<?php
	endwhile;
	?>
</div>
<!-- .portfolio-masonry -->

<?php
		leanex_lite_pagination();

	else :
		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
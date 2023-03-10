<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear. Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leanex Lite
 */

if ( 'posts' == get_option( 'show_on_front' ) ) :
	get_template_part( 'index' );
else :
	get_header();
?>

<?php get_template_part( 'template-parts/headline' ); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

<?php
					// Get homepage blocks
					$sections = get_theme_mod( 'homesorter', 'content:1,blog:1' );

					// Turn blocks into array
					if ( $sections ) :
					
						$sections = explode( ',', $sections );

						foreach ( $sections as $section ) :

							if ( 'content:1' == $section ) :
							get_template_part( 'template-parts/section', 'home-content' );

							elseif ( 'widgets:1' == $section ) :
							get_template_part( 'template-parts/section', 'widgets' );

							elseif ( 'blog:1' == $section ) :
							get_template_part( 'template-parts/section', 'blog' );

							elseif ( 'widgets-two:1' == $section ) :
							get_template_part( 'template-parts/section', 'widgets-two' );

							elseif ( 'portfolio:1' == $section ) :
							get_template_part( 'template-parts/section', 'portfolio' );

							elseif ( 'wide:1' == $section ) :
							get_template_part( 'template-parts/section', 'wide' );

							endif;

						endforeach; ?>

					<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
endif;
get_footer();
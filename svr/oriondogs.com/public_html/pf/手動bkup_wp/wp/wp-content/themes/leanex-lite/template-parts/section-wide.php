<?php
/**
 * Template part for displaying front-page section.
 * @package Leanex Lite
 */
?>

<!-- Wide Section -->
<section id="wide" class="section-wide text-center" style="<?php if( get_theme_mod( 'wide-bg' ) ) { ?>background: url(<?php echo esc_url( get_theme_mod( 'wide-bg' ) ); ?>);<?php } ?><?php if( get_theme_mod( 'wide-bg-color' ) ) { ?>background-color: <?php echo esc_url( get_theme_mod( 'wide-bg-color' ) ); ?>;<?php } ?>">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<?php
						if ( is_active_sidebar( 'wide-section' ) && get_theme_mod( 'section-shows' ) == 'widgets' ) {
							dynamic_sidebar( 'wide-section' );
						} else {
							echo do_shortcode( wp_kses_post( get_theme_mod( 'wide-content' ) ) );
						}
					?>
				</div>
			</div>
		</div>
</section>
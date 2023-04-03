			<footer id="site-footer" role="contentinfo">

				<?php if ( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) : ?>

					<div class="footer-widgets-outer-wrapper section-inner">

						<div class="footer-widgets-wrapper">

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-one' ); ?>
							</div>

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-two' ); ?>
							</div>

							<div class="footer-widgets">
								<?php dynamic_sidebar( 'footer-three' ); ?>
							</div>

						</div><!-- .footer-widgets-wrapper -->

					</div><!-- .footer-widgets-outer-wrapper.section-inner -->

				<?php endif; ?>

				<p class="credits">
					Copyright ©TonegawaKotoe All Rights Reserved.
				</p><!-- .credits -->
				<!-- <figure id="top_btn" style="display: flex;">
					<div><img src="https://pf.oriondogs.com/wp/wp-content/uploads/2019/12/up_arrow.png" alt="矢印"></div>
					<figcaption>TOP</figcaption>
				</figure> -->

				<!-- <p class="credits">
					<?php
					/* Translators: $s = name of the theme developer */
					// printf( _x( 'Theme by %s', 'Translators: $s = name of the theme developer', 'koji' ), '<a href="https://andersnoren.se">' . __( 'Anders Norén', 'koji' ) . '</a>' ); ?>
				</p> --><!-- .credits -->

			</footer><!-- #site-footer -->
			
			<?php wp_footer(); ?>

		</div><!-- #site-wrapper -->

	</body>
</html>

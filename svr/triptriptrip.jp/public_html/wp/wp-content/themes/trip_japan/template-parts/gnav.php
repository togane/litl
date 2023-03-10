<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
			<div class="site_name_w">
				<div class="snw2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="site_logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo_icon.png" class="logo_img_pc" alt="新東京クリニック松飛台のサイトロゴ">
						<?php echo "医療法人社団 誠馨会"; ?>
					</div>
					<div class="site_name_area">
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">新東京クリニック松飛台</a></p>
					</div></a>
				</div>
				
				<div class="tggl_btn">
					<div id="nav-drawer">
						<input id="nav-input" type="checkbox" class="nav-unshown">
						<label id="nav-open" for="nav-input">
							<span></span>
							<span></span>
							<span></span>
						</label>
						<label class="nav-unshown" id="nav-close" for="nav-input"></label>
						<div id="nav-content">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_class'     => 'main-menu',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_class'     => 'main-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	<?php endif; ?>
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links-menu',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
					'depth'          => 1,
				)
			);
			?>
			
		</nav><!-- .social-navigation -->
	<?php endif; ?>


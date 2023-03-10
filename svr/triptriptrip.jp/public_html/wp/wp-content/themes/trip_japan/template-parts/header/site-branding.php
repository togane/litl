<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?>
<div class="site-branding">
	<header>
		
		<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) :
			?>
				<h1 class="site-description sp_none">
					<?php echo $description; ?>
				</h1>
		<?php endif; ?>
		
		<div  class="header_wrap">
			<div class="sitemap_link"><a href="<?php echo home_url(); ?>/sitemap">サイトマップ </a></div>
			<div class="head_l">
				<div class="head_tit_area">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="site_name_w">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo_icon.png" class="logo_img_pc" alt="新東京クリニック松飛台のサイトロゴ">
						<?php echo "医療法人社団 誠馨会"; ?>
					</div>
					<div class="site_name_area">
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">新東京クリニック松飛台</a></p>
					</div></a>
				</div>
				<a href="<?php echo home_url(); ?>/introduction"><p class="head_btn_area"><i class="far fa-clock"></i>診療時間</p></a>
			</div>
			<div class="head_r">
				<div >
					<p><a href="tel:03-3426-0220" onclick="ga('send', 'event', 'click', 'tel-tap', 'header_tel',1);"><span><i class="fas fa-phone fa-fw fa-flip-horizontal"></i></span><span>047-384-3111</span></a><br>
					<span><span>FAX</span><span>047-386-4615</span></span></p>
				</div>
				<p>〒 270-2215 千葉県松戸市串崎南町27</p>
			</div>
		</div>
		
		<div class="head_menu">
			<?php get_template_part( 'template-parts/gnav' ); ?>
		</div>
			
	</header>
</div><!-- .site-branding -->

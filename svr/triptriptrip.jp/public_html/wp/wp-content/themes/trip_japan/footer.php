<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

		<div id="map-area" class="footer-map-area">
			<div id="map_canvas">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6224.477301784313!2d139.96153484397084!3d35.77746412577423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601883c40df63957%3A0x48f653ba3caed8f!2z5pel5pys44CB44CSMjcwLTIyMTUg5Y2D6JGJ55yM5p2-5oi45biC5Liy5bSO5Y2X55S677yS77yX!5e0!3m2!1sja!2sus!4v1558928305484!5m2!1sja!2sus" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>

	<footer id="colophon" class="site-footer">
		
	<div class="f_clinic_info_wrap">
		<div class="f_clinic_info_l">
		</div>
		<div class="f_clinic_info_r">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="site_name_w">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo_icon.png" alt="ロゴイメージ">
					<?php echo "医療法人社団 誠馨会"; ?>
				</div>
				<div class="site_name_area">
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">新東京クリニック松飛台</a></p>
				</div>
			</a>
			<div class="clinic_info">
				<table>
					<tbody>
						<tr>
							<th>医院名</th>
							<td>医療法人社団 誠馨会　<span class="in_b">新東京クリニック松飛台</span></td>
						</tr>
						<tr>
							<th>診療案内</th>
							<td>内科、<span class="in_b">肝臓内科、</span><span class="in_b">整形外科、</span><span class="in_b">泌尿器科、</span><span class="in_b">循環器内科、</span><span class="in_b">糖尿病内科、</span><span class="in_b">皮膚科、</span><span class="in_b">もの忘れ外来、</span><span class="in_b">禁煙外来</span></td>
						</tr>
						<tr>
							<th>所在地</th>
							<td>〒 270-2215　千葉県松戸市串崎南町27</td>
						</tr>
						<tr>
							<th style="vertical-align: bottom;">お問い合わせ</th>
							<td><a href="tel:047-384-3111" class="foot_tel" onclick="ga('send', 'event', 'click', 'tel-tap', 'footer_tel',1);">047-384-3111</a></td>
						</tr>
					</tbody>
				</table>
				<div class="foot_linkbtn">
					<a href="<?php echo home_url(); ?>/introduction"><p><i class="far fa-clock"></i>診療時間<i class="fas fa-chevron-right"></i></p></a>
					<a href="<?php echo home_url(); ?>/access"><p><i class="fas fa-subway"></i>アクセス詳細<i class="fas fa-chevron-right"></i></p></a>
				</div>
			</div>
		</div>
	</div>
	<div class="page_top">
		<a href="#page"><span class="arrow_box"><i class="fas fa-arrow-alt-circle-up"></i></span>上へ戻る</a>
	</div>
		
		<div class="foot_link_wrap">
			<div class="foot_link_flex">
				<div class="no1"><a href="http://www.shin-tokyohospital.or.jp/" target="_blank"><img src="https://www.nth-matsuhidai.org/wp/wp-content/uploads/2019/07/foot_bnr01.jpg" alt="新東京病院のバナー"></a></div>
				<div><a href="http://www.shin-tokyohospital.or.jp/" target="_blank"><img src="https://www.nth-matsuhidai.org/wp/wp-content/uploads/2019/07/foot_bnr02.jpg" alt="新東京ハートクリニックのバナー"></a></div>
				<div><a href="http://www.shin-tokyohospital.or.jp/" target="_blank"><img src="https://www.nth-matsuhidai.org/wp/wp-content/uploads/2019/07/foot_bnr03.jpg" alt="新東京クリニックのバナー"></a></div>
			</div>
		</div>
		
		<div class="footer_menu_wrap">	
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
		
		<div class="site-info">
			<?php $blog_info = get_bloginfo( 'name' ); ?>
			<?php if ( ! empty( $blog_info ) ) : ?>
				<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo "Copyright © 新東京クリニック松飛台 All Rights Reserved." ?></a>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

	<ul class="fix_btn_area pc_none">
		<li><a href="<?php echo home_url(); ?>/access#map_area"><i class="fas fa-walking" style="margin-right: 5px;"></i>マップを見る</a></li>
		<li><a href="tel:047-384-3111" onclick="ga('send', 'event', 'click', 'tel-tap', 'spfix_tel',1);"><i class="fas fa-phone" style="margin-right: 5px;transform: rotate(100deg);"></i>電話をかける</a></li>
	</ul>
</div><!-- #page -->

<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="//typesquare.com/3/tsad/script/ja/typesquare.js?t-awa9GjGMY%3D" charset="utf-8"></script>
<script>
$(function() {
    $("#nav-open").on("click",function() {
        $(this).toggleClass("active");
    });
	$("#nav-open").on("click",function() {
        $("#menu-global-menu").toggleClass("active");
    });
	$("#nav-open").on("click",function() {
        $("#nav-drawer").toggleClass("active");
    });
});
</script>
<script>
	$(function() {
		$('#menu-global-menu').prepend('<li class="gnav_tit">MENU</li>');
});
</script>
<script>
$(function() {
	function slide01() {
		$('#menu-global-menu #menu-item-7 .sub-menu').slideToggle(300);
	}
		$('#menu-global-menu #menu-item-7').click(slide01);
		$("#menu-global-menu #menu-item-7").on("click",function() {
        $(this).toggleClass("active");
    });
	
	function slide02() {
		$('#menu-global-menu #menu-item-191 .sub-menu').slideToggle(300);
	}
		$('#menu-global-menu #menu-item-191').click(slide02);
		$("#menu-global-menu #menu-item-191").on("click",function() {
        $(this).toggleClass("active");
    });
	
});
</script>
<script>
$(document).ready(function(){
  $('label.nav-unshown').click(function () {
    $('#nav-open').removeClass('active');
  });
	$('label.nav-unshown').click(function () {
    $('#nav-drawer').removeClass('active');
  });
});
</script>

<!-- スライダー用 -->
<script>
var swiper = new Swiper('.swiper-container', {
   loop: true,
        pagination: '.swiper-pagination',
   paginationClickable: true,
   parallax: true,
   speed: 3000,
   autoplay: 5000,
   effect: 'fade',
        
        fade: {
             crossFade: true
        }
});
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144840868-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144840868-1');
</script>

</body>
</html>

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div id="page_wrap">
	
	<div id="ming_menu">
		<!--<div class="mimg_bg"></div>-->
		<div id="main_visual" class="swiper-container">
			<ul class="swiper-wrapper" style="margin:0;padding:0;">
				<li class="swiper-slide mimg01_sp"></li>
				<li class="swiper-slide mimg02_sp"></li>
				<!--<li class="swiper-slide mimg03_sp"></li>-->
			</ul>
			<div class="swiper-pagination">&nbsp;</div>
		</div><!-- main_visual -->
	</div>
	
	<div class="index-information-area">
		<div class="content container">
			<div class="info_w_bg">
				<div class="info_wrap">
					<div class="info_area_w">
						<div class="info1">
							<div class="area_tit">お知らせ</div>
							<div class="news-list">
								<?php $postsn = get_posts('cat=4&order=desc&posts_per_page=5'); ?>
								<ul>
									<?php foreach($postsn as $post): ?>
									<?php $cat = get_the_category(); $catname = $cat[0]->cat_name; $catslug = $cat[0]->slug; ?>
									<li>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<span class="date">
									<?php the_time('Y.m.d'); ?>
									</span>
									<span class="<?php echo $catslug; ?> label">
									<?php echo $catname; ?>
									</span>
									<span class="news-title">
									<?php echo wp_trim_words( get_the_title(), 23, '…' ); ?>
										<!--<?php
									$span = "<span class='r_yazirusi'>＞</span>";
									echo $span; ?>-->
									</span>
									</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
						<div class="info2">
							<div class="area_tit">代診・休診</div>
							<div class="news-list">
								<?php $postsn = get_posts('cat=6,7&order=desc&posts_per_page=5'); ?>
								<ul>
									<?php foreach($postsn as $post): ?>
									<?php $cat = get_the_category(); $catname = $cat[0]->cat_name; $catslug = $cat[0]->slug; ?>
									<li>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<span class="date">
									<?php the_time('Y.m.d'); ?>
									</span>
									<span class="<?php echo $catslug; ?> label">
									<?php echo $catname; ?>
									</span>
									<span class="news-title">
									<?php echo wp_trim_words( get_the_title(), 23, '…' ); ?>
										<!--<?php
									$span = "<span class='r_yazirusi'>＞</span>";
									echo $span; ?>-->
									</span>
									</a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>	
						</div>
					</div>
					<div class="news_btn_wrap">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>archives/category/info_all" class="news-button">お知らせ一覧へ<i class="fas fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			
			<div class="clinic_intro">
				<div class="area_tit"><h2>クリニック紹介</h2></div>
				<span><h3>Introduction</h3></span>
				<table class="deco">
					<tbody>
						<tr><td></td><td></td></tr>
						<tr><td></td><td></td></tr>
					</tbody>
				</table>
				<div class="intro_wrap">
					<div class="intro_img"><img src="<?php echo get_template_directory_uri(); ?>/images/intro_img.png" alt="新東京クリニック松飛台の院長写真"></div>
					<div class="intro_txt"><p>当院は、昭和５５年２月に開院し３４年目を迎えました。これはひとえに地元の皆さま及び医療関係者の方々のご理解・ご協力の賜物と心より感謝しております。開設以来、地域密着型の病院として職員全員が患者さまにとって役に立つ病院作りを理念に努力してまいりました。<br><br>平成２４年１２月、グループ病院である新東京病院が新病院をオープンしました。それに伴い当院病床７０床を新東京病院へ移転、入院機能を移行いたしました。<br>当院は平成２６年２月を以ってクリニックとして新たなスタートを切ることとなりました。<br>診療に於いては、新東京病院はもとより都内の大学附属病院や近隣の総合病院と密に連絡を取り合い様々な疾患に対応してまいりました。この３４年間当院の診療にご協力いただいた先生方の中には、博士号は勿論のこと海外留学の経験豊富で実績充分な先生方も多数おられました。<br><br>患者さま一人ひとりに対するきめ細かで柔軟な対応により、患者さま及びご家族の方々にとって、当院に受診して良かったと思って頂けるよう、良質で信頼される医療を提供すべく、職員一同自覚をもって努力していく所存です。新東京クリニック松飛台は心のこもった医療を継続してまいります。今後ともどうぞ宜しくお願いいたします。</p></div>
				</div>	
			</div>
			
			<div class="guidance float_off">
				<div class="guide_ww">
					<div class="area_tit"><h2>専門外来のご案内</h2></div>
					<span><h3>Medical gaidance</h3></span>
					<div class="deco_w">
						<table class="deco">
							<tbody>
								<tr><td></td><td></td></tr>
								<tr><td></td><td></td></tr>
							</tbody>
						</table>
					</div>
					<div class="guidance_wrap">
						<ul class="guide_btn_area">
							<li>
								<a href="<?php echo home_url(); ?>/introduction#monowasure"><div class="guide_img01"></div><p>物忘れ外来<!--<span class="arrow_icon"></span>--></p></a>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>/introduction#kinen"><div class="guide_img02"></div><p>禁煙外来</p></a>
							</li>
							<li>
								<a href="<?php echo home_url(); ?>/introduction#kahun"><div class="guide_img03"></div><p>花粉症治療</p></a>
							</li>
							
							<!--<li>
								<i class="fas fa-allergies"></i>
								<p>皮膚科</p>
								<span class="arrow_icon"></span>
							</li>
							<li>
								<i class="fas fa-question-circle"></i>
								<p>物忘れ外来</p>
								<span class="arrow_icon"></span>
							</li>
							<li>
								<i class="fas fa-smoking-ban"></i>
								<p>禁煙外来</p>
								<span class="arrow_icon"></span>
							</li>-->
							
						</ul>
					</div>	
				</div>
			</div>
			
			<div class="about_groupe">
				<div class="area_tit"><h2>誠馨会グループについて</h2></div>
				<span><h3>SEIKEIKAI groupe</h3></span>
				<div class="deco_w">
					<table class="deco">
						<tbody>
							<tr><td></td><td></td></tr>
							<tr><td></td><td></td></tr>
						</tbody>
					</table>
				</div>
				<div class="groupe_wrap">
					<p>医療サービスを通じて、地域社会への貢献に取り組んでいます。</p>
					<img src="<?php echo get_template_directory_uri(); ?>/images/group_img.png" alt="誠馨会グループのイメージ">
					<a href="<?php echo home_url(); ?>/about/groupe"><div>医療法人社団 誠馨会グループの<span class="in_b">ご案内</span><i class="fas fa-chevron-right"></i></div></a>
				</div>	
			</div>
			
			
		</div>
	</div>
</div>
<?php
get_footer();

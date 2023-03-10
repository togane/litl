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

get_header();
?>

	<div id="ming_menu">
		<div class="gnav_area"><?php get_template_part( 'template-parts/gnav' ); ?></div>
		<div class="page_breadcrumb"><div><?php breadcrumb(); ?></div></div>
	</div>

	<div class="sect_wrap">
		<section id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php
				// 記事のカテゴリー情報を取得する
				$cat = get_the_category();

				// 取得した配列から必要な情報を変数に入れる
				$cat_name = $cat[0]->cat_name; // カテゴリー名
				$cat_slug  = $cat[0]->category_nicename; // カテゴリースラッグ
				?>
				<div id="cat_<?php echo $cat_slug ?>">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div>

				<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content/content', 'single' );

					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation(
							array(
								/* translators: %s: parent post link */
								'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentynineteen' ), '%title' ),
							)
						);
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation(
							array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( '次の記事へ<i class="fas fa-chevron-right" style="margin-left: 5px;"></i>' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'twentynineteen' ) . '</span> <br/>' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '<i class="fas fa-chevron-left" style="margin-right: 5px;"></i>前の記事へ' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'twentynineteen' ) . '</span> <br/>' .
									'<span class="post-title">%title</span>',
							)
						);
					}

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile; // End of the loop.
				?>

			<?php dynamic_sidebar( 'sidebar-4' ); ?>
			</main><!-- #main -->
		</section><!-- #primary -->

		<?php get_sidebar(); ?>
	</div>

<?php
get_footer();

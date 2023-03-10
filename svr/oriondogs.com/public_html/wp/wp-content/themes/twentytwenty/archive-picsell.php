<?php
global $wp_query;
?>
<?php get_header();?>


<style>
  #gNavi .navi-picsell a {
   text-decoration: none;
 }

 #gNavi .navi-picsell a:after {
   display: block;
 }
</style>
<div class="pageTitle">
  <h1 class="inner"><span class="en">picsell</span><span class="jp">picsell</span></h1>
</div>
<section id="main">
  <div id="picsell">
    <div class="mainBox">
      <h3 class="headLine02">お家と暮らしを素敵にする<br class="sp">お庭づくりの秘訣、<br>庭のある暮らしの楽しみ方を<br class="sp">お伝えしていきます。</h3>
      <ul class="picsellList clearfix">
      <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $the_query = new WP_Query( array(
            'post_status' => 'publish',
            'post_type' => 'picsell', //　ページの種類（例、page、post、カスタム投稿タイプ名）
            'paged' => $paged,
            'posts_per_page' => 6, // 表示件数
            'orderby'     => 'date',
            'order' => 'DESC'
        ) );
      ?>

        <?php if(have_posts()): while (have_posts()) : the_post();?>
          <li><a href="<?php the_permalink(); ?>">

            <?php if ( has_post_thumbnail() ) { ?><?php the_post_thumbnail('large');?><?php } ?>

            <div class="txtBox">
              <?php
                // カスタム投稿のカテゴリー名を取得
                if ($terms = get_the_terms($post->ID, 'picsellcat')) {
                  foreach ( $terms as $term ) {
                    echo ('<p>');
                    echo esc_html($term->name);
                    echo ('</p>');
                  }
                }
              ?>
              <span class="tit_txt"><?php the_title(); ?></span>
              <span class="more_txt">READ MORE >></span>
            </div>

          </a></li>
        <?php endwhile; endif;?>
      </ul>
      <?php if(function_exists('wp_pagenavi')) { wp_pagenavi();}?>
    </div>
  </div>

  <div class="nav-links">
       <?php //ページリスト表示処理
       global $wp_rewrite;
       $paginate_base = get_pagenum_link(1);
       if(strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()){
           $paginate_format = '';
           $paginate_base = add_query_arg('paged','%#%');
       }else{
           $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
           user_trailingslashit('page/%#%/','paged');
           $paginate_base .= '%_%';
       }
       echo paginate_links(array(
           'base' => $paginate_base,
           'format' => $paginate_format,
           'total' => $the_query->max_num_pages,
           'mid_size' => 1,
           'current' => ($paged ? $paged : 1),
           'prev_text' => '< 前へ',
           'next_text' => '次へ >',
       ));
       ?>
   </div>
</section>

  <script>
    $(function() {
      // coming soonの文字列がある場合、リンクなしにする ＞ div.txtBoxにcomesクラス追加 ＞ span.more_txtの要素自体を削除
      $("span:contains('coming soon')").parents("a").attr('href', 'javascript: void(0)');
      $("span:contains('coming soon')").parents("div.txtBox").addClass('comes')
      $("span:contains('coming soon')").parents("li").addClass('comes_w')
      $('div.txtBox.comes').children('span.more_txt').remove();
    });
  </script>

<?php get_footer(); ?>
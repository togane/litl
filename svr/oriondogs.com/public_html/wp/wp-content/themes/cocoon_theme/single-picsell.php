<?php get_header();?>
<?php if(have_posts()): while (have_posts()) : the_post();?>

  <style>
  #gNavi .navi-picsell a {
   text-decoration: none;
 }

 #gNavi .navi-picsell a:after {
   display: block;
 }
</style>
<div class="pageTitle">
  <div class="inner"><span class="">PicSell</span></div>
</div>
<div id="picsell_p">
  <section id="main">
    <div id="picsellList">
      <div class="pageImg gardenPage" <?php if ( has_post_thumbnail() ) {
        ?>style="background-image: url(<?php $getThumbnail=wp_get_attachment_image_src( get_post_thumbnail_id($nowid),full);echo $getThumbnail[0];?>);<?php
          // 背景画像を右端から表示させる
          if($post->post_name === 'low-maintenance') {
        ?> background-position-x: right;<?php
        }
        }
      ?>">
    </div>
    <div class="mainBox">

      <!-- <div class="ttlArea">
        <h1 class="headLine06"><span class="jp"><?php the_title(); ?></span></h1>
        <p><?php if(get_field('ff_text')){ echo get_field('ff_text');}?></p>
      </div>
      <div class="markImg"><img src="<?php bloginfo('template_url');?>/img/voice/sp_h3_img.png" alt=""></div> -->

      <?php
      $inners = get_field('ff_inner');
      $nn=0;
      if($inners){
        foreach ($inners as $inner) {$nn++;?>
        <?php if($nn%2=='0'){?>
          <div class="imgBox imgBoxR">
            <div class="phoBox sp"><?php if($inner['photo']){ ?><img src="<?php echo $inner['photo']['url']; ?>" alt=""><?php } ?></div>
            <div class="txtBox">
              <?php if($inner['title']){?><h4 class="headLine08"><?php echo $inner['title'];?></h4><?php } ?>
              <p><?php if($inner['text']){echo $inner['text']; } ?></p>
            </div>
            <div class="phoBox pc"><?php if($inner['photo']){ ?><img src="<?php echo $inner['photo']['url']; ?>" alt=""><?php } ?></div>
          </div>
        <?php }else{?>
          <div class="imgBox">
            <div class="phoBox"><?php if($inner['photo']){ ?><img src="<?php echo $inner['photo']['url']; ?>" alt=""><?php } ?></div>
            <div class="txtBox">
              <?php if($inner['title']){?><h4 class="headLine08"><?php echo $inner['title'];?></h4><?php } ?>
              <p><?php if($inner['text']){echo $inner['text']; } ?></p>
            </div>
          </div>
        <?php }?>



      <?php } }?>

      <script>
      $('.phoBox.sp img').each(function(){
        var $yohaku_img = $(this);
        var imgsrc = $(this).attr('src');
        var windowWidth = parseInt($(window).width());
        if ($(this).attr('src').slice(-12) === '-padding.png' ) {
          $(this).attr('src',imgsrc.replace('-padding.png','.jpg'));
        }
      });
      </script>

      <div class="theTour"><?php the_content();?></div>

      <div class="nav-links">
        <?php 
          wp_link_pages( array(
            'before'            => '<div class="pagebreak-links pl_before">',
            'after'             => '</div>',
            'next_or_number'    => 'next',
            'previouspagelink'  => '<span class="prev_p">< 前へ</span>',
            'nextpagelink'      => '<span class="next_p">次へ ></span>',
          ) );
        ?>

        <?php wp_link_pages(); ?>

        <?php 
          wp_link_pages( array(
            'before'            => '<div class="pagebreak-links pl_next">',
            'after'             => '</div>',
            'next_or_number'    => 'next',
            'previouspagelink'  => '<span class="prev_p">< 前へ</span>',
            'nextpagelink'      => '<span class="next_p">次へ ></span>',
          ) ); 
        ?>
      </div>
      <!-- 右カラム用の記事一覧取得　ここから -->
      <!-- <?php
        $picsell_posts = get_posts('post_type=picsell&posts_per_page=5');
        if ( !empty($picsell_posts) ): ?>
        <ul>
        <?php 
        foreach ( $picsell_posts as $post ):
            setup_postdata($post); ?>
            <li><img src="<?php the_post_thumbnail_url() ?>"></li>
            <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
        <?php endforeach;
        wp_reset_postdata(); ?>
        </ul>
      <?php endif; ?> -->

      <!-- 右カラム用の記事一覧取得　ここまで -->

    </div>
  </div>
  </section>
</div>
<?php endwhile; endif;?>

  <script>
    //関数の定義
    function word_assassin(target,word){
      if(target.length){
        target.each(function(){
          var txt = $(this).html();
          $(this).html(
            txt.replace(word,'')//unicode escape sequence
          );
        });
      }
    }
    word_assassin($('p.post-nav-links'),'固定ページ:');//関数の呼び出し。第一引数に削除したい文字列を含む要素を、第二引数に削除したい文字列を代入してください
  </script>
  <script>
    $(function() {
      $(".pagebreak-links a:has(.prev_p)").addClass("prev page-numbers");
      $(".pagebreak-links a:has(.next_p)").addClass("next page-numbers");
    });
  </script>
<script>
    $(function() {
      if($(".theTour div:has(.sideBar)")) {
        $(".theTour div").addClass("sb_active")
      }
    });
  </script>

  
<?php get_footer(); ?>

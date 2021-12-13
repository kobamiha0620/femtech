<?php get_header(); ?>

<div class="container">
<main class="catephp" id="cateTop">
<?php if (is_category()) : ?>
  <div class="catephp__disc"><?php echo category_description(); ?></div>
<?php endif; ?>

  <!-- おすすめ -->
  <div id="js-newest"></div>
  <section id="categoryNew" class="articlesWrapper">
    <div class="articles" id="articles">
      <h2 class="articles__ttl">
          <span class="articles__ttl--en">NEW ARRIVAL</span>
          <span class="articles__ttl--jp"><?php single_cat_title(); ?>最新記事</span>
      </h2>            
      <ul class="articles__list" id="newArrival">
      <?php 
          $cat = get_queried_object();
          $cat_name = $cat -> name;
          $cat_slug = $cat -> slug;
      ?>

      <?php  if(have_posts()): while(have_posts()):the_post(); ?>
        <?php  get_template_part('template_parts/loop-content');?>
      <?php endwhile; endif; ?>
      
      </ul>

      <a href="/page-<?php echo $cat_slug; ?>/" class="articles__link"><?php echo  $cat_name; ?> の記事を全て見る ＞</a>

    </div><!-- articles -->

  </section><!-- categoryNew -->
  <!-- おすすめ -->


    <!-- EDITOR'S CHOICE ------------------------------------------------->
    <?php get_template_part('template_parts/cate-echoice'); ?>
    <!-- EDITOR'S CHOICE ------------------------------------------------->




</main>
    <div class="sp">
      <!-- ランキング記事 -->
      <div id="cateRanking"></div>
      <?php get_template_part('template_parts/ranking'); ?>

      <div class="index__inner"><!-- SP用padding Blc -->
      <section class="catephp__anchor">
          <ul class="catephp__anchor--list">
          <li><a href="#cateTop">・<?php single_cat_title(); ?>について</a></li>
          <li><a href="#categoryNew">・<?php single_cat_title(); ?>最新記事</a></li>
          <li><a href="#editors">・エディターおすすめ記事</a></li>
          <li><a href="#cateRanking">・ランキング</a></li>
          </ul>
      </section>
      </div>
    </div>

  </div><!--end contents-->

  <div class="pc"><?php get_sidebar(); ?></div>

</div><!--end container-->
<?php get_footer(); ?>

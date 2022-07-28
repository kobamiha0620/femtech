<?php get_header(); ?>
<div class="container">



  <?php if(have_posts()): the_post(); ?>

  <article <?php post_class( 'article-content' ); ?>>

      <!--本文取得-->
      <div class="single__contentsinner">
  
        <div class="page__luna--fv">
            <img src="https://femtech.tv/wp-content/uploads/2022/01/fv_runa.png" alt="月野ねこまんまの月占い ルナスコープ" width="100%">

            <p class="page__luna--ttl">太陽星座が私たちを導く道標だとしたら、月星座は本来の自分へ還る場所。人生には休息も必要です。柔らな月灯りのように、月星座の導きがあたたかく癒してくれるはず。</p>
            <a href="/news162/" target="_blank" class="catephp__link" rel="noopener">月星座についてもっと詳しく</a>

        </div>

        <div class="page__luna--intro">
    <p class="page__luna--intro-ttl">まずは自分の月星座を調べてみましょう。<br>「月星座」で検索すると簡単に調べられるので、試してみて。</p>
    </div>
    <div class="single__horoscope--snswrapper">
      <!-- sns共有 -->
      <?php get_template_part('/template_parts/sharesns'); ?>
      <!-- sns共有 -->
    </div>
        <?php the_content(); ?>


        <div class="pc" style="margin: 50px auto 80px;">
        <div class="page__luna--keisan">
            <img src="https://femtech.tv/wp-content/uploads/2022/01/moon.png" alt="Coming soon" width="100%">
        </div>
    </div>
    <div class="sp">
        <div class="page__luna--keisan">
            <img src="https://femtech.tv/wp-content/uploads/2022/01/moonSp.png" alt="Coming soon" width="100%">
        </div>
    </div>


    <div class="single__contents">




        <!-- 著者紹介 -->
        <?php get_template_part('/template_parts/fortuneteller'); ?>
        <!-- 著者紹介 -->



  <!-- EDITOR'S PICK ------------------------------------------------->
<!-- 
  <div class="single__epick">
  <?php
    
    #get_template_part('/template_parts/epick'); ?>
  </div> -->

  <!-- EDITOR'S PICK ------------------------------------------------->




      </div><!-- /.single__contents -->
    </div><!-- /#single -->
  </article>

  <?php endif; ?>

  <div class="index__inner">
    <!-- SP用padding Blc -->


    <!-- 最新記事 -->
    <section id="latestArticle" class="articlesWrapper">
      <div class="articles" id="articles">
        <h2 class="articles__ttl">
          <span class="articles__ttl--en">NEW ARRIVAL</span>
          <span class="articles__ttl--jp">最新記事</span>
        </h2>
        <ul class="articles__list">
          <?php
                //$argsのプロパティを変えていく
                $args = array(
                    'post_type' => 'post', 
                    'post_status'   => 'publish',
                    'posts_per_page' => 5,
                    'cat' => -430, //星占いカテゴリ
                    'no_found_rows' => true,  //ページャーを使う時はfalseに。
                );

                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) :
                  while ($the_query->have_posts()) : $the_query->the_post();
                    get_template_part('template_parts/newestArticle');

                  endwhile;
                endif;
                wp_reset_postdata();
                ?>
        </ul>
      </div>
    </section>
    <!-- 最新記事 -->

  </div>
  <!--end index__inner-->


</div>
<!--end contents-->




<div class="pc"><?php get_sidebar(); ?></div>

</div>
<!--end container-->


<?php get_footer(); ?>
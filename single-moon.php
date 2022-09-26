<?php get_header(); ?>
<div class="container">




  <?php if(have_posts()): the_post(); ?>

  <article <?php post_class( 'article-content' ); ?>>

    <div class="single__contents">
      <!--本文取得-->
      <div class="single__contentsinner">
  

        <?php if (in_category('aries')): ?>
        <!-- 牡羊座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/aries.png" alt="牡羊座">
        </p>

        <?php elseif (in_category('taurus')): ?>
        <!-- 牡牛座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/taurus.png" alt="牡牛座">
        </p>


        <?php elseif (in_category('gemini')): ?>
        <!-- 双子座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/genimi.png" alt="双子座">
        </p>


        <?php elseif (in_category('cancer')): ?>
        <!-- かに座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/cancer.png" alt="かに座">
        </p>


        <?php elseif (in_category('leo')): ?>
        <!-- しし座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/leo.png" alt="しし座">
        </p>


        <?php elseif (in_category('virgo')): ?>
        <!-- おとめ座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/virgo.png" alt="おとめ座">
        </p>


        <?php elseif (in_category('libra')): ?>
        <!-- てんびん座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/libra.png" alt="てんびん座">
        </p>


        <?php elseif (in_category('scorpio')): ?>
        <!-- 蠍座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/scorpio.png" alt="蠍座">
        </p>


        <?php elseif (in_category('sagittarius')): ?>
        <!-- いて座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/sagittarius.png" alt="いて座">
        </p>


        <?php elseif (in_category('capricorn')): ?>
        <!-- やぎ座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/capricorn.png" alt="やぎ座">
        </p>


        <?php elseif (in_category('aquarius')): ?>
        <!-- みずがめ座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/aquarius.png" alt="みずがめ座">
        </p>


        <?php elseif (in_category('pisces')): ?>
        <!-- うお座 -->
        <p class="luna__seiza">
          <img src="https://femtech.tv/wp-content/uploads/2022/01/pisces.png" alt="うお座">
        </p>
        <?php endif; ?>


        <div class="single__moon--snswrapper">
      <!-- sns共有 -->
      <?php get_template_part('/template_parts/sharesns'); ?>
      <!-- sns共有 -->
    </div>
      
        <h3 class="luna__month"><span>
            <b><?php
              $field_name = get_field('horo_month');
              if($field_name){
                echo $field_name;
              }
            ?></b>月</span>の運勢</h3>



        <p class="luna__subttl"><?php echo get_field('horo_feature'); ?></p>
        <?php the_content(); ?>



        <p class="luna__action"><?php
              $field_name = get_field('horo_month');
              if($field_name){
                echo $field_name;
              }
            ?>月の開運アクション</p>
        <p class="luna__luckyaction"><?php
              $field_name = get_field('horo_action');
              if($field_name){
                echo $field_name;
              }
            ?></p>



        <?php if (in_category('aries')): ?>
          <?php get_template_part('template_parts/horoscope/introaries'); ?>
        
        <?php elseif (in_category('taurus')): ?>
          <?php get_template_part('template_parts/horoscope/introtaurus'); ?>


        <?php endif; ?>



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
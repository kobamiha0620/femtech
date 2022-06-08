<?php get_header(); ?>
<div class="container">
  <div class="page" id="page">


    <?php if (is_page('horoscope')): ?>
    <?php get_template_part('template_parts/horoscopeTop'); ?>
    <?php elseif (is_page('horoscope/aries')): ?>
    <!-- 牡羊座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/aries.png" alt="牡羊座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>
    <?php elseif (is_page('horoscope/taurus')): ?>
    <!-- 牡牛座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/taurus.png" alt="牡牛座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/gemini')): ?>
    <!-- 双子座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/genimi.png" alt="双子座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/cancer')): ?>
    <!-- かに座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/cancer.png" alt="かに座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/leo')): ?>
    <!-- しし座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/leo.png" alt="しし座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/virgo')): ?>
    <!-- おとめ座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/virgo.png" alt="おとめ座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/libra')): ?>
    <!-- てんびん座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/libra.png" alt="てんびん座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/scorpio')): ?> 
    <!-- 蠍座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/scorpio.png" alt="蠍座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/sagittarius')): ?> 
    <!-- いて座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/sagittarius.png" alt="いて座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/capricorn')): ?> 
    <!-- やぎ座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/capricorn.png" alt="やぎ座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/aquarius')): ?> 
    <!-- みずがめ座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/aquarius.png" alt="みずがめ座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php elseif (is_page('horoscope/pisces')): ?> 
    <!-- うお座 -->
    <p class="page__luna--seiza">
      <img src="https://femtech.tv/wp-content/uploads/2022/01/pisces.png" alt="うお座">
    </p>
    <h3 class="page__luna--month"><span><b>6</b>月</span>の運勢</h3>

    <?php else: ?>
    <section class="page__fv">
      <!--タイトル-->
      <h2 class="page__fv--ttl"><?php the_title(); ?></h2>
    </section>
    <?php endif; ?>









    <div class="page__contents">
      <!--本文取得-->
      <?php if(have_posts()): the_post(); ?>
      <div class="page__contentsinner">
        <?php the_content(); ?>
      </div>
      <?php endif; ?>




      <?php if (is_page('horoscope/aries')): ?>
        <?php get_template_part('template_parts/horoscope/introaries'); ?>
      <?php endif; ?>


      <?php if(is_page('horoscope') || page_is_ancestor_of('horoscope')): ?>

      <!-- 著者紹介 -->
      <?php get_template_part('template_parts/fortuneteller'); ?>

      <?php endif; ?>


    </div><!-- /.page__contents -->
  </div><!-- /#page -->



  <div class="sp">
    <!-- KEYWORD -->
    <?php get_template_part('template_parts/keyword'); ?>
    <!-- ランキング記事 -->
    <?php get_template_part('template_parts/ranking'); ?>
    <!-- HOT TAG -->
    <?php get_template_part('template_parts/hottag'); ?>
    <!-- SERIES -->
    <?php get_template_part('template_parts/series'); ?>
  </div>


  <!-- EDITOR'S CHOICE ------------------------------------------------->
  <div class="index__inner">
    <!-- SP用padding Blc -->
    <?php get_template_part('/template_parts/echoice'); ?>
  </div><!-- index__inner -->
  <!-- EDITOR'S CHOICE ------------------------------------------------->

  
  <!--
  <div class="sp">
  /* get_template_part('template_parts/insta'); */
  </div>
  -->

</div>
<!--end contents-->




<div class="pc"><?php get_sidebar(); ?></div>


<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/page.js"></script> -->

<?php get_footer(); ?>
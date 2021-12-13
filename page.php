<?php get_header(); ?>
<div class="container">




    <div class="page" id="page">

      <section class="page__fv">

        <!--タイトル-->
        <h2 class="page__fv--ttl"><?php the_title(); ?></h2>

      </section>  


      <div class="page__contents">
        <!--本文取得-->
        <?php if(have_posts()): the_post(); ?>
        <div class="page__contentsinner">
          <?php the_content(); ?>
        </div>
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
  <div class="index__inner"><!-- SP用padding Blc -->
    <?php get_template_part('/template_parts/echoice'); ?>
  </div><!-- index__inner -->
  <!-- EDITOR'S CHOICE ------------------------------------------------->


  <div class="sp">
      <!-- INSTAGRAM -->
      <?php get_template_part('template_parts/insta'); ?>
  </div>



  </div><!--end contents-->




  <div class="pc"><?php get_sidebar(); ?></div>


  <!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/page.js"></script> -->

  <?php get_footer(); ?>
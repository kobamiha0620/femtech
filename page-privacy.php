<?php get_header(); ?>


    <div class="infoPage" id="infoPage">
      <div class="page__contents">
      <section class="page__fv">
        <h2 class="page__ttl">
            <span class="page__ttl--en">Privacy policy</span>
            <span class="page__ttl--jp">プライバシーポリシー</span>
        </h2>

        </section> 
        <!--本文取得-->
        <?php if(have_posts()): the_post(); ?>
        <div class="infoPage__contentsinner infoPage-privacy">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>

      </div><!-- /.page__contents -->
    </div><!-- /#page -->



  <?php get_footer(); ?>
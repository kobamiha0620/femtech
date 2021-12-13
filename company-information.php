<?php get_header(); ?>


    <div class="infoPage" id="infoPage">
      <div class="page__contents">
      <section class="page__fv">
        <h2 class="page__ttl">
            <span class="page__ttl--en">Company Information</span>
            <span class="page__ttl--jp">会社概要</span>
        </h2>

        </section> 
        <!--本文取得-->
        <?php if(have_posts()): the_post(); ?>
        <div class="infoPage__contentsinner infoPage-company">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>

      </div><!-- /.page__contents -->
    </div><!-- /#page -->



  <?php get_footer(); ?>
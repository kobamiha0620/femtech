<?php get_header(); ?>


<div class="container">
    <div class="infoPage" id="infoPage">
      <div class="page__contents">
      <section class="page__fv">
        <h2 class="page__ttl">
            <span class="page__ttl--en">Contact</span>
            <span class="page__ttl--jp">お問い合わせ</span>
        </h2>

        </section> 
        <!--本文取得-->
        <?php if(have_posts()): the_post(); ?>
        <div class="infoPage__contentsinner infoPage-contact">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>

      </div><!-- /.page__contents -->
    </div><!-- /#page -->
    </div>



  <?php get_footer(); ?>
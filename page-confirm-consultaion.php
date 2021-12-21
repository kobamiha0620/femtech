<?php get_header(); ?>
        <div>
        <h2 class="confirm">入力内容確認</h2>


        <!--本文取得-->
        <?php if(have_posts()): the_post(); ?>
        <div class="" style="width: 100%;">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>


        </div>

  <?php get_footer(); ?>
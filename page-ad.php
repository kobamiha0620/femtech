<?php get_header(); ?>



    <div class="infoPage" id="infoPage">
      <div class="page__contents">
      <section class="page__fv">
        <h2 class="page__ttl">
            <span class="page__ttl--en">Information</span>
            <span class="page__ttl--jp">メディア関係者の皆様へ</span>
        </h2>

        </section> 
        <!--本文取得-->
        <?php if(have_posts()): the_post(); ?>
        <div class="infoPage__contentsinner infoPage-ad">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>

      </div><!-- /.page__contents -->
    </div><!-- /#page -->








  <!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/page.js"></script> -->

  <?php get_footer(); ?>
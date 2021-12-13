<div class="articlesWrapper" id="latestAll">
<!-- <h2 class="articles__ttl">
          <span class="articles__ttl--en">NEW ARRIVAL</span></span>
          <span class="articles__ttl--jp">最新記事</span>
      </h2> -->
      <ul class="articles__list">

      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $the_query = new WP_Query( array(
          'post_status' => 'publish',
          'paged' => $paged,
          'posts_per_page' => 20, // 表示件数
          'orderby'     => 'date',
          'order' => 'DESC'
      ) );
        
        
      if ($the_query->have_posts()) :?><?php
          while ($the_query->have_posts()) : $the_query->the_post();?>

                  <?php get_template_part('template_parts/loop-content'); ?>

      <?php endwhile; ?>
      <?php endif; wp_reset_postdata();?> 
     </ul>




    <?php get_template_part('template_parts/page/page01'); ?>



      </div>

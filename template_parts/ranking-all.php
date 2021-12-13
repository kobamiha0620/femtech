<div class="articles" id="rankingall">
<h2 class="articles__ttl">
          <span class="articles__ttl--en">RANKING</span>
          <span class="articles__ttl--jp">人気記事</span>
      </h2>
      <div class="page__ranking">
            <!-- 全体ランキング -->
            <?php
              $arg = array (
              'post_type' => 'post',
              'limit' => 20, //表示数
              'range' => 'monthly', //期間
              'stats_date' => true,
              'stats_date_format' => 'Y.m.d',
              'title_length' => 45,
              'order_by' => 'views', 
              'excerpt_by_words'=> 45,
              'stats_category'  => true,
              'paged'          => $paged

              );
              wpp_get_mostpopular($arg);  
            ?>
            <!-- 全体ランキング -->
</div>
<?php get_template_part('template_parts/pager'); ?>


</div><!-- /#rankingall -->

<div class="articlesWrapper">
  <div class="index__inner"><!-- SP用padding Blc -->

    <h2 class="articles__ttl epicttl">
        <span class="articles__ttl--en">EDITOR's PICK</span>
        <span class="articles__ttl--jp">編集部員のお気に入り</span>
    </h2>
    </div><!-- index__inner -->

    <ul class="epick__list" id="epickList">

    <!-- サブループ　Ranking -->
    <?php
    $args = new WP_Query(
      array(
        'post_type' => 'post', // 投稿タイプ
        'post_status' => 'publish', //公開済みのページのみ取得
        'posts_per_page' => 12, // 表示件数
        'category_name' => 'pick', //editor's choiceの記事のみ
        'orderby' => 'date' // 表示順の基準
      )
    );
    if ( $args->have_posts() ):
    ?>

    <?php while ( $args->have_posts() ) : $args->the_post();?>

    <?php get_template_part('/template_parts/loop_pick'); ?>

    <?php endwhile; ?>
    <?php endif; wp_reset_postdata();?>

    </ul>
    <p class="epick__linktxt">
      <a href="/page-pick/"> 編集部員のお気に入りを全て見る ></a>
    </p>
</div>